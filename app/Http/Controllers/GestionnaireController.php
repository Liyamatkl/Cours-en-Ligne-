<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seance;
use App\Models\Cour;
use App\Models\Etudiant;
use App\Models\CoursEtudiant;
use App\Models\CoursUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GestionnaireController extends Controller
{

    //Partie Enseignant
    public function enseignant(){
        return view('Gestionnaire.enseignant');
    }
    //Partie Etudiant
    public function etudiant(){
        return view('Gestionnaire.etudiant');
    }
    //Partie Seance
    public function ptseance(){
        return view('Gestionnaire.ptseance');
    }

    //Modifier mot de passe 
     public function ModifymdpForm(){
        $id =  Auth::user();
        return view('Gestionnaire.modifymdp');
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
        
            return redirect ('/ModifierGestionnairemdp')->with('etat','Invalide ! ');
        }
        return redirect ('/gestionnaireAcceuil')->with('etat','Mot de passe modifié ! ');
    }

    //modifier nom/prenom

public function ModifymdpFormnp(){
        $id =  Auth::user();
        return view('Gestionnaire.modifynp', ['Users'=> $id]);
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

        return redirect ('/gestionnaireAcceuil')->with('etat','Vos informations ont été modifiées ! ');
    }

    //Ajout d'un étudiant

    public function AddForm(){
        return view('Gestionnaire.add');
    }   

    public function Add(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'noet' => 'required|string|max:9',
        ]);

        $user = new Etudiant();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->noet = $request->noet;
        $user->save();

        session()->flash('etat', 'Etudiant ajouté');
        return redirect()->route('gestionnaire.acceuil');
    }

    //Modifier un étudiant

public function ModifyetudiantForm($id){
        $users=  Etudiant::findorFail($id);
        return view('Gestionnaire.modify_etudiant', ['Users'=> $users]);
    }

    public function Modifyetudiant(Request $request, $id){
         $user=  Etudiant::findorFail($id);

            $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'noet' => 'required|string|max:9',
            ]);
         $user->nom = $request->input('nom');
         $user->prenom = $request->input('prenom');
         $user->noet = $request->input('noet');
         $user->save();

        return redirect ('/ListeEtudiant')->with('etat','Information modifiée ! ');
    }

     //Supprimer un étudiant

public function SuppetudiantForm($id){
        $users=  Etudiant::findorFail($id);
        return view('Gestionnaire.supprimer_etudiant', ['Users'=> $users]);
    }

    public function Suppetudiant(Request $request, $id){
         $user=  Etudiant::findorFail($id);
        
            if ($request -> has('Oui')){
            $user -> etudiants() -> detach();
            $user -> etudiants_sea() -> detach();
            $user-> delete();
    //si la suppression a été effectuer
        $request-> session()->flash('etat','Utilisateur supprimé !');
        } else {
            $request-> session()->flash('etat','Supression annulée');
        }

        return redirect ('/ListeEtudiant');
    }

    //Creer une nouvelle séance  de cours

    public function Createformbis(){
        
        $users = Cour::paginate(5);
            return view('Gestionnaire.seance', ['Users' => $users]);
    }  
    
    public function Createform(Request $request, $id){
        
        $users = Cour::findorfail($id);
            return view('Gestionnaire.seance_form', ['Users' => $users]);
    }  

    public function Create(Request $request, $id)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);

        $user = new Seance();
        $user ->cours_id = $id;
        $user->date_debut = $request->date_debut;
        $user->date_fin = $request->date_fin;
        $user->save();

        session()->flash('etat', 'Séance ajouté');
        return redirect()->route('gestionnaire.acceuil');
    }

     //Associer des étudiants au cours (individuellement et mulitple)

    public function Associerformbis(){
        
        $users = Cour::paginate(5);
            return view('Gestionnaire.associer', ['Cours' => $users]);
    }  
    
    public function Associerform(Request $request, $id){
        
        $cours = Cour::findorfail($id);
        $etudiant = Etudiant::all();
            return view('Gestionnaire.associer_form', ['Cours' => $cours, 'Etudiant' => $etudiant]);
    }  

    public function Associer(Request $request, $id)
    {

        
        $request -> validate([

    'Etudiant' => 'required',
    ]);



        foreach ($request -> input('Etudiant') as $n) {
         
             $cours = Cour::findOrFail($id);
        $etudiant = Etudiant::findOrFail($n);
        $etudiant-> etudiants() -> attach($cours);
        }
        session()->flash('etat', 'Association réalisé avec succès !');
        return redirect()->route('etudiant.gestionnaire');
    }

    // Liste des étudiants associer à un cours
    
    public function Listeassocform(){
        
        $users = Cour::paginate(5);
            return view('Gestionnaire.liste', ['Users' => $users]);
    }  
    
    public function Listeassoc(Request $request, $id){
        
        $users = Cour::findorfail($id);
        $etudiant = $users -> cours_et;
            return view('Gestionnaire.liste_form', ['Etudiant' => $etudiant, 'Users' => $users ]);
    }  

     // Supprimer l'association (individuellement et mulitple)
    

    public function Supprimer(Request $request, $id){
        

    $request -> validate([

    'Etudiant' => 'required',
    
    ]);

        foreach ($request -> input('Etudiant') as $n) {
         
             $cours = Cour::findOrFail($id);
        $etudiant = Etudiant::findOrFail($n);
        $cours-> cours_et() -> detach($etudiant);
        }

        
    //si la suppression a été effectuer
        $request-> session()->flash('etat','Suppression effectuée !');
         return redirect()->route('listeassocform.gestionnaire');
    }  


     //Associer des enseignats au cours (individuellement)

    public function Associerensformbis(){
        
        $users = User::where('type', 'enseignant')->paginate(4);
            return view('Gestionnaire.associer_ens', ['Users' => $users]);
    }  
    
    public function Associerensform(Request $request, $id){
        
        $users = User::findorfail($id);
        $cours = Cour::all();
            return view('Gestionnaire.associer_ens_form', ['Users' => $users, 'Cours' => $cours]);
    }  

    public function Associerens(Request $request, $id,$idd)
    {


        $user = new CoursUser();
        $user ->cours_id = $idd;
        $user->user_id = $id;
        $user->save();

        session()->flash('etat', 'Association réalisé avec succès !');
        return redirect()->route('gestionnaire.acceuil');
    }

    // Liste des enseignant associer à un cours
    
    public function Listeassocensform(){
        
        $users = Cour::paginate(5);
            return view('Gestionnaire.liste_ens', ['Users' => $users]);
    }  
    
    public function Listeassocens(Request $request, $id){
        
        $users = Cour::findorfail($id);
        $associer = [];
        foreach($users->cours as $etudiant){
    
            $associer[$etudiant->id] = $etudiant;
        
            }
            return view('Gestionnaire.liste_ens_form', ['Associer' => $associer, 'Users' => $users ]);
    }  

     // Supprimer l'association 
    

    public function Supprimerens(Request $request, $id, $idd){
        
        $users = Cour::findOrFail($id);
        $intitule = User::findOrFail($idd);
        $users-> cours() -> detach($intitule);
    //si la suppression a été effectuer
        $request-> session()->flash('etat','Suppression effectuée !');
         return redirect()->route('listeassocensform.gestionnaire');
    }  

    //Liste des étudiant avec pagination

    public function Listeet(Request $request){
        
        $users = Etudiant::paginate(5);
            return view('Gestionnaire.liste_et', ['Users' => $users]);
    }  

     //Liste des cours avec pagination

    public function Listecours(Request $request){
        
        $users = Cour::paginate(5);
            return view('Gestionnaire.liste_cours', ['Users' => $users]);
    }  

    //Liste des séances avec pagination

    public function Listeseance(Request $request){
        
        $users = Seance::paginate(5);
            return view('Gestionnaire.liste_seances', ['Seance' => $users]);
    }  

    //Modifier une séance

    public function ModifyseanceForm($id){
        $users=  Seance::findorFail($id);
        return view('Gestionnaire.modify_seance', ['Users'=> $users]);
    }

    public function Modifyseance(Request $request, $id){
         $user=  Seance::findorFail($id);

            $request->validate([
               'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            ]);
         $user->date_debut = $request->input('date_debut');
         $user->date_fin = $request->input('date_fin');
         $user->save();

        return redirect ('/ListeSeance')->with('etat','Séance modifiée ! ');
    }

    //Supprimer une séance

public function SuppseanceForm($id){
        $users=  Seance::findorFail($id);
        return view('Gestionnaire.supprimer_seance', ['Users'=> $users]);
    }

    public function Suppseance(Request $request, $id){
         $seance =  Seance::findorFail($id);
        $etudiant = $seance -> seances;
        
            if ($request -> has('Oui')){
            $seance -> seances() -> detach();
            $seance-> delete();


    //si la suppression a été effectuer
        $request-> session()->flash('etat','Seance supprimé !');
        } else {
            $request-> session()->flash('etat','Supression annulée');
        }

        return redirect ('/ListeSeance');
    }

    //Liste des séances associées aux cours 

    public function Listeassoseance(Request $request, $id){
        
         $cours = Cour::findorfail($id);
        $seance = $cours -> cours_seance()->paginate( 4);
            return view('Gestionnaire.liste_assoseance', ['Seance' => $seance, 'Cours' => $cours ]);
    }  

    //Recherche d'un étudiant 


    public function rechercheform(){
        return view('Gestionnaire.rechercheform');
    }

    public function recherche(Request $request){
        $id = $request->validate([
            'nom' => 'string',
            'prenom' => 'string',
        ]);
       $users = Etudiant::where('nom', $id['nom'])->get();
       $users = Etudiant::where('prenom', $id['prenom'])->get();

       return view('Gestionnaire.recherche',['Users'=>$users]);
    }

    //Liste des présences (des étudiants) par séance

    public function Listeseancebis(Request $request){
        
        $users = Seance::paginate(5);
            return view('Gestionnaire.liste_seancebis', ['Seance' => $users]);
         
    } 

     public function Listesetudiantbis(Request $request, $id){
        
        $users = Seance::findOrFail($id);
        // $cours = Cour::findOrFail($id->cours_id);
        $seance = $users -> seances;

            return view('Gestionnaire.liste_present', ['Seance' => $seance,  'Users' => $users  ]);
         
    }

    //Liste des présences (des étudiants) par cours
    public function Listecoursbis(Request $request){
        
        $users = Cour::paginate(5);
            return view('Gestionnaire.liste_coursbis', ['Users' => $users]);
    }  

    public function Listesetudiantbisbis(Request $request, $id){
        
        $cours = Cour::findOrFail($id);
        $etudiants = $cours -> cours_et()->get();
        $seance = $cours->cours_seance()->get();

            return view('Gestionnaire.liste_presentbis', ['Seance' => $seance,  'Cours' => $cours, 'Etudiant' => $etudiants]);
         
    }

    //Liste des présences détaillé par étudiants

    public function Listeetbis(Request $request){
        
        $users = Etudiant::paginate(5);
            return view('Gestionnaire.liste_etbis', ['Users' => $users]);
    }  

     public function ListeCouretu(Request $request,$id){
        
        $etudiant = Etudiant::findOrFail($id);
        $cours =  $etudiant -> etudiants;
            return view('Gestionnaire.liste_etcours', ['Cours' => $cours, 'Etudiant'=> $etudiant]);
    }  

    //Fiche détaillée des présences

     public function nbdePresence(Request $request,$id,$idd){
        
            $etudiant = Etudiant::findOrFail($idd);
            $cours = Cour::findOrFail($id);

            $seance = $cours -> cours_seance;

            $tab = [];
            foreach ($seance as $id => $x) {
                       $tab[$id] = $x -> id;
                    }

            
        
            
            $presence = DB::table('presences')
            ->where('etudiant_id', $idd)->whereIN('seance_id', $tab)->get();




        $total = 0;
        foreach ($presence as $n) {
                       
                        $total ++;

                    }

            return view('Gestionnaire.liste_presence', ['Cours' => $cours, 'Etudiant'=> $etudiant, 'Seance' => $seance, 'Presence' => $presence, 'Total' => $total]);
    } 
 

    //Fiche détaillée des abscences

    public function nbdeAbscence(Request $request,$id,$idd){
        
        $etudiant = Etudiant::findOrFail($idd);
            $cours = Cour::findOrFail($id);

            //Liste des presences de l'etudiant
        $seance = $cours -> cours_seance;

            $tab = [];
            foreach ($seance as $id => $x) {
                       $tab[$id] = $x -> id;
                    }


        $total = 0;
        foreach ($tab as $n) {
                       
                        $total ++;

                    }

                  $presence = DB::table('presences')
            ->where('etudiant_id', $idd)->whereIN('seance_id', $tab)->count(); 
            
            $totalbis = $total - $presence ;

            return view('Gestionnaire.liste_absence', ['Cours' => $cours, 'Etudiant'=> $etudiant, 'Seance' => $seance, 'Total' => $totalbis]);
    } 
}
