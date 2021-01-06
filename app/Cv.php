<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


//Model singulier avec la premère lettre majuscule = connexion avec la BDD


class Cv extends Model
{
   use SoftDeletes;
   protected $dates = ['deleted_at'];

   public function user(){
   	return $this->belongsTo('App\User');
   }

   public function experiences(){
   	return $this->hasMany('App\Experience');
   }

   public function formations(){
   	return $this->hasMany('App\Formation');
   }

   public function competences(){
      return $this->hasMany('App\Competence');
   }

   public function langues(){
      return $this->hasMany('App\Langue');
   }
}
