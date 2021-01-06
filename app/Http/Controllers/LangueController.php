<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Http\UploadedFile;

use App\Cv;
use App\Langue;

class LangueController extends Controller
{
    //Langue functions

     public function getLangues($id){
        $cv = Cv::find($id);
        return $cv->langues()->get();

     }

     public function addLangues(Request $request){

        $langue = new Langue;
         
        $langue->cv_id         = $request->cv_id;
        $langue->langue        = $request->langue;
        $langue->niveau        = $request->niveau;
     
       
        $langue->save();
       // dd($request->all());
        return Response()->json(['etat' => true,'id' => $langue->id]);

     }

     public function updateLangues(Request $request){
        $langue = Langue::find($request->id);
        
        $langue->cv_id         = $request->cv_id;
        $langue->langue        = $request->langue;
        $langue->niveau        = $request->niveau;;
       
        $langue->save();
       

        return Response()->json(['etat'=>true]);

     }

     public function deleteLangues($id){
        $langue = Langue::find($id);
        $langue->delete();

        return Response()->json(['etat'=>true]);

     }
}
