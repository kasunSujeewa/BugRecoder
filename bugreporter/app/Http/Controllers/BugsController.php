<?php

namespace App\Http\Controllers;

use App\Bugs;
use Illuminate\Http\Request;

class BugsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Bugs::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bugs::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bugs  $bugs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bug = Bugs::find($id);
        return view('Bugs.show', compact('bug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bugs  $bugs
     * @return \Illuminate\Http\Response
     */
    public function edit(Bugs $bugs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bugs  $bugs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bug = Bugs::find($id);
        $bug->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bugs  $bugs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bug = Bugs::find($id);
        $bug->delete();
    }
}
