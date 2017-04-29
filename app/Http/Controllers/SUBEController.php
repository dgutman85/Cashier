<?php

namespace App\Http\Controllers;

use App\SUBE;
use Illuminate\Http\Request;

use App\Http\Requests;

class SUBEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $subes = SUBE::where($req->all())->paginate();

        return view('sube.index', compact(['subes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sube.create');
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
            'id_pos' => 'required|unique:sube,id_pos',
            'sn' => 'required|unique:sube,sn'
        ]);

        SUBE::create($request->all());

        return redirect()->route('sube.index');
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
        $sube = SUBE::findOrFail($id);

        return view('sube.edit', compact(['sube']));
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
            'id_pos' => 'required|unique:sube,id_pos,' . $id,
            'sn' => 'required|unique:sube,sn,' . $id
        ]);

        $sube = SUBE::findOrFail($id);

        $sube->update($request->all());

        return redirect()->route('sube.index');
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
