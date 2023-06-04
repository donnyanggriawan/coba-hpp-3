<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use Illuminate\Http\Request;

class BahanbakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Bahan Baku'
        ];

        return view('bahan.bahan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bahan = Bahanbaku::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(3)) , 3,"0") as bahan')->first();
        $addkode = new Bahanbaku();
        $addkode->bahan = 'KB'. $bahan->bahan;

        $data = [
            'title' => 'Tambah Bahan Baku',
            'kode' => $addkode
        ];

        return view('bahan.tambah', $data);
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
     * @param  \App\Models\Bahanbaku  $bahanbaku
     * @return \Illuminate\Http\Response
     */
    public function show(Bahanbaku $bahanbaku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahanbaku  $bahanbaku
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahanbaku $bahanbaku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bahanbaku  $bahanbaku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bahanbaku $bahanbaku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahanbaku  $bahanbaku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahanbaku $bahanbaku)
    {
        //
    }
}
