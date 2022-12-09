<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;

class BandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', ['bands' => $bands], ['title' => 'Bands']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bands.create',['title' => 'Bands']);
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
            'genre' => 'required',
            'founded' => 'required',
            'active_till' => 'required',
        ]);

        $newBand = new Band([
            'name' => $request->get('name'),
            'genre' => $request->get('genre'),
            'founded' => $request->get('founded'),
            'active_till' => $request->get('active_till'),
        ]);


        $newBand->save();

        return redirect()->route('bands.index',['title' => 'Bands'])
            ->with('success', 'Band created successfully.');
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
        $bands = Band::find($id);
        return view('bands.edit', ['bands' => $bands],['title' => 'Bands']);
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
            'genre' => 'required',
            'founded' => 'required',
            'active_till' => 'required',
        ]);

        $bands = Band::find($id);
        $bands->name = $request->get('name');
        $bands->genre = $request->get('genre');
        $bands->founded = $request->get('founded');
        $bands->active_till = $request->get('active_till');
        $bands->save();

        return redirect()->route('bands.index',['title' => 'Bands'])
            ->with('success', 'Band updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bands = Band::find($id);
        $bands->delete();

        return redirect()->route('bands.index',['title' => 'Bands'])
            ->with('success', 'Band deleted successfully');
    }
}
