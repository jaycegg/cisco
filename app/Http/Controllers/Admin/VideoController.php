<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{  
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $videos = Video::all();
       return view('dash.videos.index', compact('videos'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('dash.videos.create');
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
           'nom' => 'required',
           'chemin' => 'required',
       ]);

       Video::create($request->all());

       return redirect()->route('videos.index')
           ->with('success', 'Video créé');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
        $video = Video::find($id);
        return view('dash.videos.show', compact('video'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
        $video = Video::find($id);
        return view('dash.videos.edit', compact('video'));
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
        'nom' => 'required',
        'chemin' => 'required',
       ]);

       $id->update($request->all());

       $video = Video::find($id);

       return redirect()->route('videos.index')
           ->with('success', 'Video modifié');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
        Video::where('id', $id)->delete();

       return redirect()->route('videos.index')
           ->with('success', 'Video supprimé');
   }
}