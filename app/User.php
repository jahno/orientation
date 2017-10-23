<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Image;
use Illuminate\Http\Request;
class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','nom_eleve','prenom_eleve','age','ville_residence_eleve','region_residence_eleve','contact_eleve','cv_eleve','experience_professionnel_eleve'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  
    public static function Generate_image($a){
          
    $image =time().'.'.$a->getClientOriginalExtension(); 
    Image::make($a)->resize(300, 300)->save(public_path('/avatars/'.$image));
    
        return $image;
    }


}