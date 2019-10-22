<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SongCollection;
use App\Song;
use Weidner\Goutte\GoutteFacade as GoutteFacade;
use GuzzleHttp\Client;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SongCollection(Song::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $goutte = GoutteFacade::request('GET', 'https://www.uta-net.com/song/262853/');

        $images = array();
        $song_name = array();
        $artist_name = array();
        $kasi = array();

        // ジャケット写真
        $goutte->filter('#view_amazon>a>img')->each(function ($node) use (&$images) {
            $images[] = $node->attr('src');
        });
        preg_match_all('/(https?)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)\.(jpg|gif|png)/', $images[0], $match);

        // 曲名
        $goutte->filter('.prev_pad')->each(function ($node) use (&$song_name) {
            $song_name[] = $node->text();
        });
        // アーティスト名
        $goutte->filter('.kashi_artist>h3')->each(function ($node) use (&$artist_name) {
            $artist_name[] = $node->text();
        });
        // 歌詞
        $goutte->filter('#kashi_area')->each(function ($node) use (&$kasi) {
            $kasi[] = $node->text();
        });
        $params = [
            'matchs' => $match[0],
            'song_name' => $song_name[0],
            'artist_name' => $artist_name[0],
            'kasi' => $kasi[0],
        ];
        return response()->json($params);
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
            'user_id' => $request->get('user_id'),
            'image' => $request->get('image'),
            'artist_name' => $request->get('artist_name'),
            'song_name' => $request->get('song_name'),
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
            $client = new Client();
            $sourceUrl = "http://api.musixmatch.com/ws/1.1/track.search?q_artist=Aimer&page_size=12&page=1&apikey=ff85a9e764fab54af3ab72c3210745f1";
            $responseData = $client -> request("GET", $sourceUrl);
            $responseBody = json_decode($responseData -> getBody() -> getContents(), true);
            return [
             "status" => "OK",
             "data" => $responseBody,
            ];
    }

}
