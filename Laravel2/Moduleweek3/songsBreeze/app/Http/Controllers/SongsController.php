<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Song;
use App\Models\Songs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Termwind\Components\Dd;

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
    public function create(Request $request)
    {

            $songsFromAPI = [];
            // Maak een lege array voor de songs die via de API worden opgehaald.
            if($request->query->has('title')) {

                // Als er een 'title' parameter is meegegeven in de query...
                $api_key = '585457805ba32422207dd9a3ed5aec29';
                // Definieer de API key die we zullen gebruiken voor de zoekopdracht.
                $title = $request->query('title');
                // Haal de titel op uit de query parameter.
                $response = Http::get(
                    'http://ws.audioscrobbler.com/2.0/?method=track.search&track=' .
                    $title . '&api_key=' . $api_key . '&format=json'
                )->json();
                // Voer een GET request uit naar de Last.fm API met de titel als zoekterm.
                $songsFromAPI = $response["results"]["trackmatches"]["track"];
                // Haal de songs uit de response en sla ze op in de $songsFromAPI array.

            }
            $API = collect($songsFromAPI)->map(function ($song) {
                return [
                    'id' => $song['mbid'],
                    'title' => $song['name'],
                    'singer' => $song['artist'],
                ];
            });
            return view('songs.create',['songsFromAPI' => $API],['title' => 'Songs']);
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
