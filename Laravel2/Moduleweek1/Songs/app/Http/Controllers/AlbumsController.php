<?php

namespace App\Http\Controllers;
use App\Models\Albums;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Albums::all();
        return view('albums.index', ['albums' => $albums], ['title' => 'Albums']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create',['title' => 'Albums']);
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
            'year' => 'required',
            'times_sold' => 'required',
        ]);

        $newAlbum = new Albums([
            'name' => $request->get('name'),
            'year' => $request->get('year'),
            'times_sold' => $request->get('times_sold'),
        ]);

        $newAlbum->save();

        return redirect()->route('albums.index',['title' => 'Albums'])
            ->with('success', 'Album created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $albums = Albums::find($id);
        return view('albums.edit', ['albums' => $albums], ['title' => 'Albums']);
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
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'times_sold' => 'required',
        ]);

        $albums = Albums::find($id);
        $albums->name = $request->get('name');
        $albums->year = $request->get('year');
        $albums->times_sold = $request->get('times_sold');
        $albums->save();

        return redirect()->route('albums.index',['title' => 'Albums'])
            ->with('success', 'Album updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albums = Albums::find($id);
        $albums->delete();

        return redirect()->route('albums.index',['title' => 'Albums'])
            ->with('success', 'Album deleted successfully');
    }
}
