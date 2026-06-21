<?php

namespace App\Http\Controllers;

use App\Models\Beat;

class BeatController extends Controller
{
    /**
     * Display a listing of the active beats.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $beats = Beat::active()->get();

        return view('catalog.index', ['beats' => $beats]);
    }

    /**
     * Display the specified beat.
     *
     * @param  \App\Models\Beat  $beat
     * @return \Illuminate\View\View
     */
    public function show(Beat $beat)
    {
        return view('catalog.show', ['beat' => $beat]);
    }
}
