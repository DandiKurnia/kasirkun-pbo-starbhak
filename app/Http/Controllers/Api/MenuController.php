<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Models\JenisMenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::latest()->paginate(5);
        $jenismenu = JenisMenu::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $menu, $jenismenu);
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
        //define validation rules
        $validator = Validator::make($request->all(), [
            'gambar'     => 'required|max:2048',
            'kode_menu' => 'required',
            'nama_menu' => 'required',
            'jenis_menu_id' => 'required',
            'deskripsi' => 'required',
            'satuan' => 'required',
            'harga' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/posts', $gambar->hashName());

        //create post
        $menu = Menu::create([
            'gambar'     => $gambar->hashName(),
            'kode_menu'     => $request->kode_menu,
            'nama_menu'   => $request->nama_menu,
            'jenis_menu_id'   => $request->jenis_menu_id,
            'deskripsi'   => $request->deskripsi,
            'satuan'   => $request->satuan,
            'harga'   => $request->harga
        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $menu);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return new PostResource(true, 'Data Post Ditemukan!', $menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete('public/posts/' . $menu->image);
        //delete post
        $menu->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
