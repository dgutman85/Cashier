<?php

namespace App\Http\Controllers\Admin;

use App\Box;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boxes = Box::all();
        return view('boxes.index', compact('boxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required']
        ]);

        Box::firstOrCreate([
            'name' => $request->name,
        ]);

        return redirect()->route('boxes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $box = Box::with(['money'=>function($query){return $query->orderBy('value','asc');}])->findOrFail($id);
        return view('boxes.show', compact('box'));
    }

    public function table($id)
    {
        $box = Box::with(['money'=>function($query){return $query->orderBy('value','asc');}])->findOrFail($id);
        return view('boxes.table', compact('box'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $box = Box::with(['money'=>function($query){return $query->orderBy('value','asc');}])->findOrFail($id);
        return view('boxes.edit', compact('box'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $box = Box::findOrFail($id);
        foreach ($request->money_id as $money => $quantity) {
            $box->money()->updateExistingPivot($money, ['quantity' => $quantity]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
