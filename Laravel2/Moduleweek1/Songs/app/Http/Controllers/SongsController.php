<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Songs::all();
        return view('songs.index', ['songs' => $songs], ['title' => 'Songs']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create',['title' => 'Songs']);
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
            'title' => 'required',
            'singer' => 'required',
        ]);

        $newSong = new Songs([
            'title' => $request->get('title'),
            'singer' => $request->get('singer'),
        ]);
        $newSong->save();

        return redirect()->route('songs.index',['title' => 'Songs'])
            ->with('success', 'Song created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function show(Songs $songs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $songs = Songs::find($id);
        return view('songs.edit', ['songs' => $songs],['title' => 'Songs']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'singer' => 'required',
        ]);

        $songs = Songs::find($id);
        $songs->title = $request->get('title');
        $songs->singer = $request->get('singer');
        $songs->save();

        return redirect()->route('songs.index',['title' => 'Songs'])
            ->with('success', 'Song updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Songs  $songs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $songs = Songs::find($id);
        $songs->delete();

        return redirect()->route('songs.index',['title' => 'Songs'])
            ->with('success', 'Song deleted successfully');
    }
}
