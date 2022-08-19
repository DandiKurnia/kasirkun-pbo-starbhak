<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PostResource;
use App\Models\JenisMenu;



class JenisMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get posts
        $jenismenu = JenisMenu::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $jenismenu);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JenisMenu $jenismenu)
    {
        return new PostResource(true, 'Data Post Ditemukan!', $jenismenu);
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
    public function update(Request $request, JenisMenu $jenismenu)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisMenu $jenismenu)
    {
        //delete post
        $jenismenu->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
