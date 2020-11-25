<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function dash(){
        $this->middleware('admin');
        return view('dash.dashboard');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $users = User::all();
       return view('dash.users.index', compact('users'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('dash.users.create');
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
        'prenom' => 'required',
        'email' => 'required',
        'campuses_id' => 'required',
        'roles_id' => 'required',
       ]);

       User::create($request->all());

       return redirect()->route('dash.users.index')
           ->with('success', 'Utilisateur créé');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       return view('dash.users.show', compact('id'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       return view('dash.users.edit', compact('id'));
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
        'prenom' => 'required',
        'email' => 'required',
        'campuses_id' => 'required',
        'roles_id' => 'required',
       ]);

       $id->update($request->all());

       return redirect()->route('dash.users.index')
           ->with('success', 'Utilisateur modifié');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $id->delete();

       return redirect()->route('dash.users.index')
           ->with('success', 'Utilisateur supprimé');
   }
}