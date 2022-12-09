<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Song;
use Database\Seeders\AlbumsSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $albums = Album::all();

        return view('albums.index', ['albums' => $albums],['title' => 'Albums']);
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
            'band_id' => 'required',
        ]);

        $newAlbum = new Album([
            'name' => $request->get('name'),
            'year' => $request->get('year'),
            'times_sold' => $request->get('times_sold'),
            'band_id' => $request->get('band_id'),
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
        $albums = Album::find($id);
        $songs = Song::wheredoesntHave('albums', function ($query) use ($id) {
            $query->where('album_id', $id);
        })->get();

        return view('albums.edit', ['albums' => $albums,'songs' => $songs ], ['title' => 'Albums']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Album $album)
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'times_sold' => 'required',
        ]);

        $albums = Album::find($album->id);
        $albums->name = $request->get('name');
        $albums->year = $request->get('year');
        $albums->times_sold = $request->get('times_sold');
        $albums->save();

        return redirect()->route('albums.index' ,['title' => 'Albums'])
            ->with('success', 'Album updated successfully');
    }

    public function AttachSong(Album $album, Song $song)
    {
        $album->songs()->attach($song);
        return redirect()->route('albums.edit', $album);
    }

    public function DetachSong(Album $album, Song $song)
    {
        $album->songs()->detach($song);
        return redirect()->route('albums.edit', $album);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albums = Album::find($id);
        $albums->delete();

        return redirect()->route('albums.index',['title' => 'Albums'])
            ->with('success', 'Album deleted successfully');
    }
}
