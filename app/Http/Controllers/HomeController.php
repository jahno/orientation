<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importation du namespace Auth
use Auth;
use Image;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // lES PAGES QUI Sont dans le middleware sont des pages
    // qui seront accessible lorsque l'utilisateur sera logged


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function annonces_profil()
    {
        return view('Layouts.profil', array('user' => Auth::user()) );
    }

 public function mise_a_jour_avatar(Request $request)
    {
       if($request->hasFile('avatar'))
       {
           $avatar = $request->file('avatar');
           $filename = time().'.'.$avatar->getClientOriginalExtension();
           Image::make($avatar)->resize(300, 300)->save(public_path('/avatars/'.$filename));

           $user = Auth::user();
           $user->avatar = $filename;
           $user->save();

       }
        return view('Layouts.profil', array('user' => Auth::user()) );
    }


}
