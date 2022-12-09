<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Song;
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
        $songs = Song::all();
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

        $newSong = new Song([
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
     * @param  \App\Models\Song  $songs
     * @return \Illuminate\Http\Response
     */
    public function show(Song $songs)
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
        $songs = Song::find($id);
        $albums = Album::wheredoesntHave('songs', function ($query) use ($id) {
            $query->where('song_id', $id);
        })->get();

        return view('songs.edit', ['songs' => $songs, 'albums' => $albums],['title' => 'Songs']);
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

        $songs = Song::find($id);
        $songs->title = $request->get('title');
        $songs->singer = $request->get('singer');
        $songs->save();

        return redirect()->route('songs.index',['title' => 'Songs'])
            ->with('success', 'Song updated successfully');
    }

    public function AttachAlbum(Song $song, Album $album)
    {
        $song->albums()->attach($album);
        return redirect()->route('songs.edit', $song);
    }

    public function DetachAlbum(Song $song, Album $album)
    {
        $song->albums()->detach($album);
        return redirect()->route('songs.edit', $song);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $songs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $songs = Song::find($id);
        $songs->delete();

        return redirect()->route('songs.index',['title' => 'Songs'])
            ->with('success', 'Song deleted successfully');
    }
}
