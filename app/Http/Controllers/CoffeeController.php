<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCoffeeRequest;
use App\Http\Requests\UpdateCoffeeRequest;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$coffees = DB::table('coffees')->orderBy('id')->paginate(3);

        $coffees = Coffee::paginate(3);

        $data = [
            'title' => 'Coffee',
            'coffees' => $coffees
        ];

        return view('coffee.coffee', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();

        $data = [
            'title' => 'Tambah Coffee',
            'kategoris' => $kategori
        ];

        return view('coffee.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCoffeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_coffee' => ['required', 'alpha_num' , 'size:5'],
            'nama_coffee' => ['required', 'min:3', 'unique:coffees,nama_coffee'],
            'kategori' => ['required'],
            'keterangan' => ['required', 'min:3', 'max:1000']
        ]);

        $coffees = Coffee::create([
            'kd_coffee' => $request->kode_coffee,
            'nama_coffee' => $request->nama_coffee,
            'kategori_id' => $request->kategori,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('coffee')->with('success', 'Added New Menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function show(Coffee $coffee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function edit(Coffee $coffee, $id)
    {
        $coffees = Coffee::find($id);

        $kategoris = Kategori::all();

        $data = [
            'title' => 'Edit Menu Coffee',
            'coffees' => $coffees,
            'kategoris' => $kategoris
        ];
     
        return view('coffee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoffeeRequest  $request
     * @param  \App\Models\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoffeeRequest $request, Coffee $coffee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coffee $coffee)
    {
        //
    }
}
