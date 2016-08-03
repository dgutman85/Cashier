<?php

namespace App\Http\Controllers\Admin;

use App\Box;
use App\Http\Controllers\Controller;
use App\Money;
use Illuminate\Http\Request;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moneys = Money::with('box')->orderBy('value','asc')->get();
        return view('moneys.index', compact('moneys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moneys.create');
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
            'name'  => ['required'],
            'value' => ['required']
        ]);

        Money::firstOrCreate([
            'name'  => $request->name,
            'value' => $request->value
        ]);

        return redirect()->route('moneys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $money = Money::with('box')->findOrFail($id);
        $boxes = Box::lists('name', 'id');
        return view('moneys.edit', compact('money', 'boxes'));
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
        $money = Money::findOrFail($id);
        $money->box()->sync($request->boxes);
        $money->save();
        return redirect()->route('moneys.index');
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
