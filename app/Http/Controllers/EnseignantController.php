<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cour;
use App\Models\CoursUser;
use App\Models\Etudiant;
use App\Models\Seance;
use App\Models\Presence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EnseignantController extends Controller
{
    //Modifier mot de passe
     public function ModifymdpForm(){
        $id =  Auth::user();
        return view('Enseignant.Modifymdp');
    }

    public function Modifymdp(Request $request){
        $user = Auth::user();

        if (Hash::check($request->mdp , $user->mdp)) {

            $request->validate([
                'newmdp' => 'required|string',
            ]);
         $user->mdp = Hash::make($request->newmdp);
         $user->save();

        }else{
        
            return redirect ('/ModifierEnseignantmdp')->with('etat','Invalide ! ');
        }
        return redirect ('/enseignantAcceuil')->with('etat','Mot de passe modifié ! ');
    }

    //modifier nom/prenom

public function ModifymdpFormnp(){
        $id =  Auth::user();
        return view('Enseignant.modifynp', ['Users'=> $id]);
    }

    public function Modifymdpnp(Request $request){
        $user = Auth::user();

            $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
            ]);
         $user->nom = $request->input('nom');
         $user->prenom = $request->input('prenom');;
         $user->save();

        return redirect ('/enseignantAcceuil')->with('etat','Vos informations ont été modifiées ! ');
    }

    //Liste des cours associés à un enseignant

    
    public function Listeassoccours(Request $request){
        
        $id = AUTH::id();
        $users = User::findorfail($id);
        $cours =  $users -> users ;
            return view('Enseignant.liste_ens_cours', ['Cours' => $cours]);
         
    } 

    //Liste des séances associées au cours

    public function Listeseanceassoc(Request $request, $id){
        
        $cours = Cour::findorfail($id);
        $seance = $cours -> cours_seance;
        
            return view('Enseignant.liste_seances', ['Seance' => $seance, 'Cours' => $cours  ]);
    }  

    //Liste des inscrits dans un cours

    public function Listesinscritform(Request $request){
        
        $cours = Cour::paginate(5);

            return view('Enseignant.liste_inscritform', [ 'Cours' => $cours]);
         
    }

    public function Listesinscrit(Request $request, $id){
        
        $cours = Cour::findorfail($id);
        $etudiant =  $cours -> cours_et;
            return view('Enseignant.liste_inscrit', [ 'Cours' => $cours,  'Etudiant' => $etudiant ]);
         
    }

    //Liste des élèves associés

    public function Listesetudiantassoc(Request $request, $id, $idd){
        
        $seances = Seance::findOrFail($id);
        $cours = Cour::findorfail($idd);
        // $cours = Cour::findOrFail($id->cours_id);
        $etudiant =  $cours -> cours_et;

            return view('Enseignant.liste_et', ['Seance' => $seances,  'Etudiant' => $etudiant, 'Cours' => $cours]);
         
    }


     //Pointage multiple et individuel

    public function Pointageperso(Request $request, $id, $idd)
    {

    $request -> validate([

    'Etudiant' => 'required',
    ]);


        $seance = Seance::findOrFail($id);



        foreach ($request -> input('Etudiant') as $n) {
         $etudiant = Etudiant::findOrFail($n);
          $seance -> seances() -> attach($etudiant);
          $seance ->save();
        }


        session()->flash('etat', 'Elève(s) noté(s) présent(s) !');
        return redirect()->route('listeassocenscours.enseignant');
    }



    //Liste des présences

    public function Listeassoccoursbis(Request $request){
        
        $id = AUTH::id();
        $users = User::findorfail($id);
        $cours =  $users -> users ;
            return view('Enseignant.listeassoccoursbis', ['Cours' => $cours]);
         
    } 

    public function Listeseance(Request $request, $id){
        

        $cours = Cour::findorfail($id);

        $seance = $cours -> cours_seance;

        // Calcul du total de présence par cours 1.3
        $total = 0;
        foreach ($seance as $n) {
            //Recuperation de la séance
            $s = Seance::findorfail($n -> id);
            //Nombre d'etudiant présent dans la liste
            $presence = $s -> seances -> count();
            //Ajout du nombre au compteur
            $total += $presence;
        }

            return view('Enseignant.liste_seancebis', ['Seance' => $seance, 'Cours' => $cours, 'Total' =>  $total]);
         
    } 

     public function Listesetudiantpres(Request $request, $id, $idd){

         $cours = Cour::findorfail($idd);
        $users = Seance::findOrFail($id);

        //Liste des élèves présent à la séance
        $seance = $users -> seances;

        //Pour le total de présence:
         $total = 0;
        foreach ($seance as $n) {
                       
                        $total ++;

                    }

            return view('Enseignant.liste_present', ['Seance' => $seance,  'Users' => $users,'Total' => $total]);
         
    }

    public function Listesetudiantabs(Request $request, $id, $idd){

         $cours = Cour::findorfail($idd);
        $users = Seance::findOrFail($id);

        //Liste de tous les étudiants inscrit au cours
        $etID = $cours -> cours_et;
        
        //Liste des élèves présent à la séance
        $seance = $users -> seances;

        $total= 0;
        $abscence = null;
        if(!$seance->isEmpty()) {

        $presence = [];
         
        foreach ($seance as $id => $x) {
                       $presence[$id] = $x -> id;
                    }

                   $abscence = DB::table('cours_etudiants')
            ->where('cours_id', $idd)
            ->whereNotIn('etudiant_id', $presence)->get();

            //Pour le total d'abscence':
            foreach ($abscence as $n) {
               foreach ($etID as $c) {
                   if ($c->id == $n -> etudiant_id) {
                        $total ++;
        
                   }
               }
            }

        } 

            return view('Enseignant.liste_absent', ['Seance' => $seance,  'Users' => $users,'Total' => $total, 'Abscence' => $abscence, 'EtID' => $etID   ]);
         
    }




  
    } 


