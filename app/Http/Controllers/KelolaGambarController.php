<?php

namespace App\Http\Controllers;

use App\Models\Kegunaan;
use Illuminate\Http\Request;

class KelolaGambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        return view('kelolagambar.index',compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegunaan  $kegunaan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegunaan $kegunaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegunaan  $kegunaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegunaan $kegunaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegunaan  $kegunaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegunaan $kegunaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegunaan  $kegunaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegunaan $kegunaan)
    {
        //
    }
}
