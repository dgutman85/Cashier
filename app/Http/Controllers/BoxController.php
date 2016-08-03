<?php

namespace App\Http\Controllers;

use App\Box;
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
}
