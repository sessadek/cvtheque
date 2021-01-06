<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Http\UploadedFile;

use App\Cv;
use App\Competence;

class CompetenceController extends Controller
{
     //Competence functions

     public function getCompetences($id){
        $cv = Cv::find($id);
        return $cv->competences()->get();

     }

     public function addCompetences(Request $request){

        $competence = new Competence;
         
        $competence->cv_id          = $request->cv_id;
        $competence->titre        = $request->titre;
        $competence->commentaire  = $request->commentaire;
     
       
        $competence->save();
       // dd($request->all());
        return Response()->json(['etat' => true,'id' => $competence->id]);

     }

     public function updateCompetences(Request $request){
        $competence = Competence::find($request->id);
        
        $competence->cv_id          = $request->cv_id;
        $competence->titre        = $request->titre;
        $competence->commentaire  = $request->commentaire;;
       
        $competence->save();
       

        return Response()->json(['etat'=>true]);

     }

     public function deleteCompetences($id){
        $competence = Competence::find($id);
        $competence->delete();

        return Response()->json(['etat'=>true]);

     }
}
