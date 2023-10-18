<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::paginate(3);

        $data = [
            'title' => 'Menu',
            'menus' => $menu
        ];

        return view('menu.menu', $data);
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
            'title' => 'Tambah Menu',
            'kategori' => $kategori
        ];

        return view('menu.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_menu' => ['required', 'alpha_num' , 'size:5' , 'unique:menus,kd_menu'],
            'nama_menu' => ['required', 'min:3'],
            'id_kategori' => ['required'],
            'keterangan' => ['required']
        ]);

        $menu = Menu::create([
            'user_id' => Auth::user()->id,
            'kategori_id' => $request->id_kategori,
            'kd_menu' => $request->kode_menu,
            'nama_menu' => $request->nama_menu,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('menu')->with('success', 'Added New Menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu, $id)
    {
        $menus = Menu::find($id);
        $kategori = Kategori::all();

        $data = [
            'title' => 'Edit Menu',
            'menus' => $menus,
            'kategori' => $kategori
        ];
     
        return view('menu.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menus = Menu::whereId($id)->first();

        $validatedData = $request->validate([
            'kode_menu' => ['required'],
            'nama_menu' => ['required'],
            'id_kategori' => ['required'],
            'keterangan' => ['required']
        ]);

        $menus->update([
            'user_id' => $menus->user_id,
            'kategori_id' => $request->id_kategori,
            'kd_menu' => $request->kode_menu,
            'nama_menu' => $request->nama_menu,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('menu')->with('successUpdate', 'Update Menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('menus')->where('id', $id)->delete();

        // $id = $request->input('delete_makanan');
        // Menu::whereId($id)->delete();

        return redirect()->route('menu')->with('success', 'New Menu has been deleted!');
    }
}
