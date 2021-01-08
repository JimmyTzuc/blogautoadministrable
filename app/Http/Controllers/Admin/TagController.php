<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors =[
            'red' => 'Color Rojo',
            'yellow' => 'Color Amarillo',
            'green' =>'Color Verde',
            'blue' => 'Color Azul',
            'indigo' => 'Color Indigo',
            'purple' => 'Color Purpura',
            'pink' => 'Color Rosa',
        ];

        return view('admin.tags.create',compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags'
        ]);
            
        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.edit',$tag)->with('info', 'La categoría se registró con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {

        $colors =[
            'red' => 'Color Rojo',
            'yellow' => 'Color Amarillo',
            'green' =>'Color Verde',
            'blue' => 'Color Azul',
            'indigo' => 'Color Indigo',
            'purple' => 'Color Purpura',
            'pink' => 'Color Rosa',
        ];

        return view('admin.tags.edit', compact('tag','colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tag  $tag)
    {


        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id"
        ]);
            
        $tag->update($request->all());

        return redirect()->route('admin.tags.edit',$tag)->with('info', 'La categoría se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info', 'La categoría se Eliminó con éxito');
    }
}
