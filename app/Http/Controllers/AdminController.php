<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cour;
use App\Models\Seance;
use App\Models\Etudiant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Redirect Accueil
    public function redirect(){
        if (Auth::user()-> IsAdmin()) {
            return redirect()->intended('/adminAccueil');
        }else if (Auth::user()-> IsGestionnaire()) {
            return redirect()->intended('/gestionnaireAcceuil');
        }else if (Auth::user()-> IsEnseignant()) {
            return redirect()->intended('/enseignantAcceuil');
        }
    }

    //Valider un un user

    public function ValiderFormbis (){
        $users = DB::table('users')->where('type','NULL')->paginate(6);
            return view('Admin.Valider_form', ['Users' => $users]);
    }

    public function ValiderForm(Request $request, $n){
        $nom = User::findOrFail($n);
            return view('Admin.Valider',['Users'=> $nom]);
    }

    public function Valider(Request $request, $n)
    {
        $nom = User::findOrFail($n);
        $validated = $request-> validate([
            'type' => 'required|string',
        ]);
        $nom->type = $validated['type'];
        $nom->save();
        //si la modification a été effectuer
        $request-> session()->flash('etat','User Ajouté !');
            return redirect('/adminAccueil');
    }

    //Refuser un utilisateur

    public function RefuserForm($id){
        $users=  User::findorFail($id);
        return view('Admin.refuserform', ['Users'=> $users]);
    }

    public function Refuser(Request $request, $id){
         $user=  User::findorFail($id);

            if ($request -> has('Oui')){
            $user-> delete();
    //si la suppression a été effectuer
        $request-> session()->flash('etat','Refus réalisé avec succès !');
        } else {
            $request-> session()->flash('etat','Refus annulée');
        }

        return redirect ('/Valider');
    }

    //Creation d'un cours

    public function CreateForm(){
            return view('Admin.create');
    }

    public function Create(Request $request){
        $validated = $request-> validate([
            'intitule'=> 'required|string|max:30',
        ]);

        $u = new Cour();
        $u->intitule =$validated['intitule'];
         $u-> save();

        $request-> session()->flash('etat','Cours crée !');
            return redirect('/adminAccueil');
    }

    //Liste des cours 

    public function liste()
    {
        $users = Cour::paginate(5);
            return view('Admin.cours', ['Users' => $users]);

    }

    //Modifier un cours

    public function ModifycoursForm($id){
        $users=  Cour::findorFail($id);
        return view('Admin.modify_cours', ['Users'=> $users]);
    }

    public function Modifycours(Request $request, $id){
         $user=  Cour::findorFail($id);

            $request->validate([
            'intitule'=> 'required|string|max:30',
        ]);

        $user->intitule = $request->input('intitule');
        $user->save();

        return redirect ('/Listecours')->with('etat','Cours modifié ! ');
    }

    //Supprimer un cours

    public function SuppcoursForm($id){
        $users=  Cour::findorFail($id);
        return view('Admin.supprimer_cours', ['Users'=> $users]);
    }

    public function Suppcours(Request $request, $id){
         $cours = Cour::find($id);
        $cours -> cours_et() -> detach();
        $cours -> cours() -> detach();
        if ($request -> has('Oui')){
        $seances = $cours -> cours_seance;
        foreach ($seances as $s){
            $seance = Seance::findOrFail($s -> id);
            $presents = $seance -> seances;
            foreach ($presents as $present){
                $etu = Etudiant::findOrFail($present -> id);
                $seance -> seances() -> detach($etu -> id);
            }
            $seance -> seances_cours() -> dissociate();
        }
        $cours ->cours_seance() -> delete();
        $cours-> delete();


    //si la suppression a été effectuer
        $request-> session()->flash('etat','Cours supprimé !');
        } else {
            $request-> session()->flash('etat','Supression annulée');
        }

        return redirect ('/Listecours');
    }

    //Rechercher un cours 

     public function recherchecoursform(){
        return view('Admin.rechercheform_cours');
    }

    //Par son nom

    public function recherchecours(Request $request){
        $id = $request->validate([
            'intitule' => 'string',
        ]);
       $users = Cour::where('intitule', $id['intitule'])->get();

       return view('Admin.recherche_cours',['Users'=>$users]);
    }

    //Liste des Utilisateurs 

    public function listeuser()
    {
        $users = User::paginate(5);
            return view('Admin.liste_user', ['Users' => $users]);

    }

    public function listeuserens()
    {
        $users = User::where('type', 'enseignant')->paginate(5);
            return view('Admin.liste_user', ['Users' => $users]);

    }


    public function listeusergest()
    {
        $users = User::where('type', 'gestionnaire')->paginate(5);
            return view('Admin.liste_user', ['Users' => $users]);

    }

    //Rechercher un utilisateur

     public function rechercheform(){
        return view('Admin.rechercheform');
    }

    //Par son nom

    public function recherchenom(Request $request){
        $id = $request->validate([
            'nom' => 'string',
        ]);
       $users = User::where('nom', $id['nom'])->get();

       return view('Admin.recherche',['Users'=>$users]);
    }

    //Par son prénom

    public function rechercheprenom(Request $request){
        $id = $request->validate([
            'prenom' => 'string',
        ]);
       $users = User::where('prenom', $id['prenom'])->get();

       return view('Admin.recherche',['Users'=>$users]);
    }

    //Par son login

    public function recherchelogin(Request $request){
        $id = $request->validate([
            'login' => 'string',
        ]);
       $users = User::where('login', $id['login'])->get();

       return view('Admin.recherche',['Users'=>$users]);
    }

    //Créer un utilisateur

    public function FormulaireAjouterUser(){
        return view('Admin.create_user');
    }   

    public function AjouterUser(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'login' => 'required|string|max:100|unique:users',
            'mdp' => 'required|string|confirmed',
            'type' => 'required|alpha',
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->type = $request->type;
        $user->login = $request->login;
        $user->mdp = Hash::make($request->mdp);
        $user->save();

        session()->flash('etat', 'Utilisateur ajouté');
        return redirect()->route('admin.acceuil');
    }

    //Modifier un utilisateur

    public function ModifyuserForm($id){
        $users=  User::findorFail($id);
        return view('Admin.modify_user', ['Users'=> $users]);
    }

    public function Modifyuser(Request $request, $id){
         $user=  User::findorFail($id);

            $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'type' => 'required|alpha',
            'login' => 'required|string|max:100',
            'mdp' => 'required|string',
        ]);

        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->type = $request->input('type');
        $user->login = $request->input('login');
        $user->mdp = Hash::make($request->input('mdp'));
        $user->save();

        return redirect ('/Listeuser')->with('etat','Utilisateur modifié ! ');
    }

    //Supprimer un utilisateur

    public function SuppuserForm($id){
        $users=  User::findorFail($id);
        return view('Admin.supprimer_user', ['Users'=> $users]);
    }

    public function Suppuser(Request $request, $id){
         $user=  User::findorFail($id);

            if ($request -> has('Oui')){
                $user -> users() -> detach();
            $user-> delete();
    //si la suppression a été effectuer
        $request-> session()->flash('etat','Utilisateur supprimé !');
        } else {
            $request-> session()->flash('etat','Supression annulée');
        }

        return redirect ('/Listeuser');
    }
}
