<?php

namespace App\Http\Controllers;

use App\DTE;
use Illuminate\Http\Request;

use App\Http\Requests;

class DTEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $dtes = DTE::where($req->all())->paginate();

        return view('dte.index', compact(['dtes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dte.create');
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
            'sim' => 'required|unique:dte,sim',
            'imei' => 'required|unique:dte,imei'
        ]);

        DTE::create($request->all());

        return redirect()->route('dte.index');
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
        $dte = DTE::findOrFail($id);

        return view('dte.edit', compact(['dte']));
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
        $this->validate($request, [
            'sim' => 'required|unique:dte,sim,' . $id,
            'imei' => 'required|unique:dte,imei,' . $id
        ]);

        $dte = DTE::findOrFail($id);

        $dte->update($request->all());

        return redirect()->route('dte.index');
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
