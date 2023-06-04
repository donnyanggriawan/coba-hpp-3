<?php

namespace App\Http\Controllers;

use App\Models\Bahanbaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahanbakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahanbakus = DB::table('bahanbakus')->orderBy('id')->paginate(3);

        $data = [
            'title' => 'Bahan Baku',
            'bahanbakus' => $bahanbakus
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
        
        
        // $bahan = Bahanbaku::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(3)) , 3,"0") as bahan')->first();
        // $addkode = new Bahanbaku();
        // $addkode->bahan = 'KB'. $bahan->bahan;

        $data = [
            'title' => 'Tambah Bahan Baku'
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
        $validatedData = $request->validate([
            'kode_bahan' => ['required', 'alpha_num' , 'size:5' , 'unique:bahanbakus,kd_bahan'],
            'nama_bahan' => ['required', 'min:3'],
            'satuan' => ['required', 'max:12'],
            'harga' => ['required', 'numeric'],
            'per' => ['required', 'numeric']
        ]);

        $bahanbakus = Bahanbaku::create([
            'kd_bahan' => $request->kode_bahan,
            'nama_bahan' => $request->nama_bahan,
            'satuan' => $request->satuan,
            'harga' => ($request->harga / $request->per),
        ]);

        return redirect()->route('bahanbaku')->with('success', 'Added New Bahan');
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
