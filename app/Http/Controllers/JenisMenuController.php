<?php

namespace App\Http\Controllers;

use App\Models\JenisMenu;
use App\Http\Requests\StoreJenisMenuRequest;
use App\Http\Requests\UpdateJenisMenuRequest;
use Illuminate\Http\Request;

class JenisMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JenisMenu::all();
        return view('jenismenu.jenismenu',compact('data'));
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
        $this->validate($request, [
            'jenis_menu' => 'required'
        ]);
        $data = JenisMenu::create($request->all());
        return redirect()->route('jenismenu.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisMenu  $jenisMenu
     * @return \Illuminate\Http\Response
     */
    public function show(JenisMenu $jenismenu)
    {

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
    public function update(Request $request,$id)
    {
        $data = JenisMenu::find($id);
        $data->update($request->all());
    
        return redirect()->route('jenismenu.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisMenu  $jenisMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JenisMenu::find($id);
        $data->delete();
        return redirect()->route('jenismenu.index');
    }
}
