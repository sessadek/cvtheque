<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Http\UploadedFile;

use App\Cv;
use App\Experience;

class ExperienceController extends Controller
{
   /*Experiences functions*/

     public function getExperiences($id){
        $cv = Cv::find($id);
        return $cv->experiences()->orderBy('debut','desc')->get();

     }

     public function addExperience(Request $request){

        $experience = new Experience;
         
        $experience->cv_id = $request->cv_id;
        $experience->titre = $request->titre;
        $experience->body  = $request->body;
        $experience->debut = $request->debut;
        $experience->fin   = $request->fin;
       
        $experience->save();
       // dd($request->all());
        return Response()->json(['etat' => true,'id' => $experience->id]);

     }

     public function updateExperience(Request $request){
        $experience = Experience::find($request->id);
        
        $experience->titre = $request->titre;
        $experience->body  = $request->body;
        $experience->debut = $request->debut;
        $experience->fin   = $request->fin;
        $experience->cv_id = $request->cv_id;

        $experience->save();

        return Response()->json(['etat'=>true]);

     }

     public function deleteExperience($id){
        $experience = Experience::find($id);
        $experience->delete();

        return Response()->json(['etat'=>true]);

     }
}
