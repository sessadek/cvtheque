<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Http\UploadedFile;

use App\Cv;
use App\Formation;


class FormationController extends Controller
{
    /*Formations functions*/

     public function getFormations($id){
        $cv = Cv::find($id);
        return $cv->formations()->orderBy('debut','desc')->get();

     }

     public function addFormations(Request $request){

        $formation = new Formation;
         
        $formation->cv_id          = $request->cv_id;
        $formation->diplome        = $request->diplome;
        $formation->etablissement  = $request->etablissement;
        $formation->ville          = $request->ville;
        $formation->pays           = $request->pays;
        $formation->debut          = $request->debut;
        $formation->fin            = $request->fin;
       
        $formation->save();
       // dd($request->all());
        return Response()->json(['etat' => true,'id' => $formation->id]);

     }

     public function updateFormations(Request $request){
        $formation = Formation::find($request->id);
        
        $formation->cv_id          = $request->cv_id;
        $formation->diplome        = $request->diplome;
        $formation->etablissement  = $request->etablissement;
        $formation->ville          = $request->ville;
        $formation->pays           = $request->pays;
        $formation->debut          = $request->debut;
        $formation->fin            = $request->fin;
       
        $formation->save();
       

        return Response()->json(['etat'=>true]);

     }

     public function deleteFormations($id){
        $formation = Formation::find($id);
        $formation->delete();

        return Response()->json(['etat'=>true]);

     }

}
