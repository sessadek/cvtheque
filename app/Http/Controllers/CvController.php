<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\UploadedFile;
use App\Http\Requests\CvRequest;
use App\Http\Requests\ExperienceRequest;

use App\Experience;
use App\Formation;
use App\Competence;
use App\Cv;
use App\Langue;
use App\User;

use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CvController extends Controller
{

    //constructeur
    public function __construct(){
         $this->middleware('auth')->only(['create']);
    }

	/*Lister les CVs*/

    public function index(){

        //$listecv = Cv::where('user_id', Auth::user()->id)->get(); //récuperer tt les cvs de la personne authentifiée

        /*afficher tous les cv pour le compte admin*/
        /*afficher les cvs propres au utilisateurs seuls*/
       // $utilisateurs = User::all();

        if(Auth::user()->is_admin){
            $listecv = Cv::all();
        }
        else{
          //$listecv = Auth::user()->cvs; 
          $listecv = Cv::where('user_id', Auth::user()->id)->get(); 
         // $utilisateurs = User::where('user_id', Auth::user()->id)->get();
        }
        
        return view('cv.index',['cvs'=> $listecv]);
    }

     /*Affiche le formulaire de creation de cv*/
    
     public function create(){
        return view('cv.create');
     }
     /**************************************************/

     /*Enregistrer un cv*/
     public function store(CvRequest $request){
       $cv = new Cv();

       $cv->titre = $request->input('titre');
       $cv->presentation = $request->input('presentation');
       $cv->user_id = FacadesAuth::user()->id; // récuperer le ID de celui qui crée le CV

       /*upload photo*/
       if($request->hasFile('image')){
        $cv->image = $request->image->store('image');
       }

       $cv->save();

        session()->flash('success','Le cv a été bien enregistré !'); //flash message est une variable session, sa durée de vite est une seule requête HTTP

       return redirect('cvs');
     }


     /**************************************************/

     /*Récuperer un cv puis le mettre dans un formulaire*/
     public function edit($id){
        $cv = Cv::find($id);
        $this->authorize('update',$cv);
        return view('cv.edit',['cv' => $cv]);

     }


     /**************************************************/

     /*Modifier un cv*/
     public function update(CvRequest $request, $id){
        $cv = Cv::find($id);
        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');
        /*upload photo*/
       if($request->hasFile('image')){
        $cv->image = $request->image->store('image');
       }
        $cv->save();
        return redirect('cvs');


     }

     /**************************************************/

     public function show($id){
        
        return view('cv.show', ['id' => $id]);
     }


     /**************************************************/

     /*Supprimer un cv*/
     public function destroy(Request $request, $id){
        $cv = Cv::find($id);
        $this->authorize('delete',$cv);
        $cv->delete();

        return redirect('cvs');
     }

     /* En développement c'est déconseiller de supprimer les informations de la base de données, c'est mieux d'ajouter une variable booléenne pour indiquer la/la non suppression de l'information en gardant cette dernière dans la BDD, cette méthode s'appelle la suppression logique (SoftDEELETES) et non pas physique*/
     /**************************************************/

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



     public function search(Request $request){
        $search = $request->get('search');
        $cvs = DB::table('cvs')->where('titre','like','%'.$search.'%')->paginate(5);
        return view('cv.index',['cvs' => $cvs]);
     }

     public function about(){
        return view('cv.about');
     }


}
