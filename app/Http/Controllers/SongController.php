<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SongCollection;
use App\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SongCollection(Song::latest()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $song = new Song([
            'track_id' => $request->get('trackId'),
            'artwork_url100' => $request->get('artworkUrl100'),
            'track_name' => $request->get('trackName'),
            'artist_name' => $request->get('artistName'),
            'kasi' => $request->get('kasi'),
            'comment' => $request->get('comment')
        ]);

        $song->save();
        return response()->json('success');
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
        $song = Song::find($id);
        return response()->json($song);
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
        $task = Song::find($id);
        $task->update($request->all());
        return response()->json('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Song::find($id);
        $task->delete();
        return response()->json('deleted');
    }

    public function data()
    {
        // $client = new Client();
        // $sourceUrl = `https://itunes.apple.com/search?term=${this.$route.params.keyword}&media=music&country=jp&lang=ja_jp&limit=10`;
        // // $sourceUrl = "https://itunes.apple.com/search?trackName=Fuzzy&term=SCANDAL&media=music&entity=musicTrack&country=jp&lang=ja_jp&limit=10";
        // $responseData = $client -> request("GET", $sourceUrl);
        // $responseBody = json_decode($responseData -> getBody() -> getContents(), true);
        // return [
        //  "status" => "OK",
        //  "data" => $responseBody,
        // ];
    }

    public function search()
    {
    }
}
