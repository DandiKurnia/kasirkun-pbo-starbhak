<?php

namespace App\Http\Controllers;

use App\Models\JenisMenu;
use App\Http\Requests\StoreJenisMenuRequest;
use App\Http\Requests\UpdateJenisMenuRequest;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


class JenisMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = JenisMenu::all();
        // return view('jenismenu.jenismenu',compact('data'));
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
     * @param  \App\Http\Requests\StoreJenisMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'jenis_menu' => 'required'
        // ]);
        // $data = JenisMenu::create($request->all());
        // return redirect()->route('jenismenu.index');

        //define validation rules
        $validator = Validator::make($request->all(), [
            'jenis_menu'     => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        $jenismenu = JenisMenu::create([
            'jenis_menu'     => $request->jenis_menu,
        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $jenismenu);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisMenu  $jenisMenu
     * @return \Illuminate\Http\Response
     */
    public function show(JenisMenu $jenismenu)
    {
        //return single post as a resource
        return new PostResource(true, 'Data Post Ditemukan!', $jenismenu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisMenu  $jenisMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisMenu $jenisMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisMenuRequest  $request
     * @param  \App\Models\JenisMenu  $jenisMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisMenu $jenismenu)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
        'jenis_menu' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // //check if image is not empty
        if ($request->hasFile('image')) {

            // //upload image
            // $image = $request->file('image');
            // $image->storeAs('public/posts', $image->hashName());

            //delete old image
            // Storage::delete('public/posts/' . $post->image);

            //update post with new image
            $jenismenu->update([
                // 'image'     => $image->hashName(),
                'jenis_menu'     => $request->jenis_menu,
            ]);
        } else {

            //update post without image
            $jenismenu->update([
                'jenis_menu'     => $request->jenis_menu,
            ]);
        }

        //return response
        return new PostResource(true, 'Data Post Berhasil Diubah!', $jenismenu);
    }
    // $data = JenisMenu::find($id);
    // $data->update($request->all());
    
    // return redirect()->route('jenismenu.index');

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisMenu  $jenisMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisMenu $jenismenu)
    {
        //delete post
        $jenismenu->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);

        // $data = JenisMenu::find($id);
        // $data->delete();
        // return redirect()->route('jenismenu.index');
    }
}
