<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = DB::table('kategoris')->orderBy('id')->paginate(3);

        $data = [
            'title' => 'Kategori',
            'kategori' => $kategori
        ];

        return view('kategori.kategori', $data);
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
     * @param  \App\Http\Requests\StoreKategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => ['required', 'min:3' ,'unique:kategoris,nama_kategori']
        ]);

        $kategoris = Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori')->with('success', 'Added New Category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);

        $data = [
            'title' => 'Edit Kategori',
            'kategori' => $kategori,
        ];
     
        return view('kategori.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriRequest  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::whereId($id)->first();

        if ($kategori->nama_kategori == $request->nama_kategori) {
            return redirect()->route('kategori');
        } else {
            $request->validate([
                'nama_kategori' => ['required', 'min:3' ,'unique:kategoris,nama_kategori']
            ]);

            $kategori->update([
                'nama_kategori' => $request->nama_kategori
            ]);
    
            return redirect()->route('kategori')->with('successUpdate', 'Update Category');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id); // Mengambil kategori berdasarkan ID

        $kategori->delete();

        return redirect()->route('kategori')->with('successDelete', 'Deleted Category');
    }
}
