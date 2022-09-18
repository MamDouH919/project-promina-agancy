<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $albums = Album::all();
        $medias = Media::all();
        return view('albums.index')->with('albums', $albums)->with('medias', $medias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'albumName' => 'required',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,jpg,png,gif,svg|max:3048',
        ]);

        $album = Album::create([
            'user_id' => Auth::id(),
            'album_name' => $request->albumName,
            'slug' => Str::slug($request->albumName)
        ]);
        if ($request->hasFile('filename')) {
            // dd($request->all());

            foreach ($request->file('filename') as $image) {
                //Available alpha caracters
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                // generate a pin based on 2 * 7 digits + a random character
                $pin = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $characters[rand(0, strlen($characters) - 1)];
                // shuffle the result
                $string = str_shuffle($pin);
                $newImage = $string . $image->getClientOriginalName();
                $image->move('uploads/albums', $newImage);
                $img = Media::create([
                    'album_id' => $album->id,
                    'photo_name' => 'uploads/albums/' . $string . $image->getClientOriginalName(),
                ]);
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // remove or delete from table 
        $post = Album::find($id);
        $post->delete();
        return redirect()->back();
    }
}
