<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;
use App\Http\Requests\UserRequest;


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


    public function view_edit(){
       return view('Layouts.edit')->withUser(Auth::user());
       
    }

    public function edit(UserRequest $request){
    
    $image = User::Generate_image($request->file('avatar'));        
     User::findOrFail(Auth::user()->id)
     ->update([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=> bcrypt($request->password),
           'avatar'=>$image,
           'nom_eleve'=>$request->nom,
           'prenom_eleve'=>$request->prenom,
           'age'=>$request->age,
           'ville_residence_eleve'=>$request->vile,
           'region_residence_eleve'=>$request->region,
           'contact_eleve'=>$request->contact,
           'cv_eleve'=>$request->cv,
           'experience_professionnel_eleve'=>$request->experience
      ]);

 return view('Layouts.profil')->withUser(Auth::user());

        
    }





}
