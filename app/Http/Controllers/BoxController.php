<?php

namespace App\Http\Controllers;

use App\Box;
use App\Money;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BoxController extends Controller
{
    public function getIncomingForm($id)
    {
        $box = Box::with(['money'=>function($query){return $query->orderBy('value','asc');}])->findOrFail($id);

        return view('boxes.incoming', compact('box'));
    }

    public function incoming(Request $request, $id)
    {
        foreach ($request->money_id as $money => $quantity) {
            if (is_numeric($quantity)) {
                DB::table('box_moneys')
                    ->where(['money_id'=>$money, 'box_id'=>$id])
                    ->increment('quantity',$quantity);
            }
        }

        $this->reportCreate('incoming', $request);

        return redirect()
            ->route('boxes.show', Auth::user()->box_id);
    }

    public function getOutgoingForm($id)
    {
        $box = Box::with(['money'=>function($query){return $query->orderBy('value','asc');}])->findOrFail($id);

        return view('boxes.outgoing', compact('box'));
    }

    public function outgoing(Request $request, $id)
    {
        if ($this->approve($request, $id)) {
            foreach ($request->money_id as $money => $quantity) {
                if (is_numeric($quantity)) {
                    DB::table('box_moneys')
                        ->where(['money_id' => $money, 'box_id' => $id])
                        ->decrement('quantity', $quantity);
                }
            }

            $this->reportCreate('outgoing', $request);


            return redirect()
                ->route('boxes.show', Auth::user()->box_id);
        }

        return redirect()->back();
    }

    private function approve($request, $id) {
        foreach ($request->money_id as $money => $quantity) {

            $currentQuantity = DB::table('box_moneys')
                ->select('quantity')
                ->where(['money_id' => $money, 'box_id' => $id])
                ->get()[0]->quantity;

            if ($currentQuantity < $quantity) {
                return false;
            }
        }

        return true;
    }

    private function getAmount($items)
    {
        $amount = 0;
        foreach ($items as $money => $quantity) {
            $value = Money::where('id', $money)->get()[0]->value;
            $amount += $value * $quantity;
        }

        return $amount;
    }

    private function reportCreate($type, $request)
    {
        Report::create([
            'type' => $type,
            'motive' => $request->motive,
            'amount' => $this->getAmount($request->money_id),
            'responsable' => Auth::user()->name,
            'box_id' => Auth::user()->box_id,
            'detail' => json_encode($request->money_id),
        ]);
    }
}
