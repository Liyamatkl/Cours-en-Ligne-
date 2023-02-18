<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\AuthentificatedSessionController;
use App\Http\Controllers\RegisterUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Accueil

Route::view('/', 'Modele.accueilbis')->name('login');

//Auth
Route::get('/login', [AuthentificatedSessionController::class,'showForm'])->name('login');
Route::post('/login', [AuthentificatedSessionController::class,'login'])->name('loginside');
Route::get('/logout', [AuthentificatedSessionController::class,'logout'])->name('logout')->middleware('auth');

//Register
Route::get('/register', [RegisterUserController::class,'showForm'])->name('register');
Route::post('/register', [RegisterUserController::class,'store']);

// Enseignant Home
Route::view('/enseignantAcceuil','Enseignant.enseignant')
    ->name('enseignant.acceuil')->middleware('auth')->middleware('IsEnseignant');
// Admin HOME
Route::view('/adminAccueil','Admin.admin')->name('admin.acceuil')->middleware('auth')->middleware('IsAdmin');
// Gestionnaire HOME
Route::view('/gestionnaireAcceuil','Gestionnaire.gestionnaire')
    ->name('gestionnaire.acceuil')->middleware('auth')->middleware('IsGestionnaire'); 
    
//redirect Accueil
Route::get('/redirect', [AdminController::class,'redirect'])->name('redirect'); 

//Admin-------------------------------------------------------------------------------------------//

//Valider un User

Route::get('/Valider',[AdminController::class, 'ValiderFormbis'] ) -> name('ValiderFormbis.user')-> middleware('auth')->middleware('IsAdmin');
Route::post('/Valider/{id}',[AdminController::class, 'ValiderForm'] ) -> name('ValiderForm.user')-> middleware('auth')->middleware('IsAdmin');
Route::post('/Valider/{id}/valider',[AdminController::class, 'Valider'] )-> name('Valider.user')-> middleware('auth')->middleware('IsAdmin');

//Refuser l'inscription d'un User

Route::post('/Valider/Refuser/{id}',[AdminController::class, 'RefuserForm'] ) -> name('refuserform.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/Valider/Refuser/{id}/refus',[AdminController::class, 'Refuser'] ) -> name('refuser.admin')->middleware('auth')->middleware('IsAdmin');

//Creer un cours

Route::get('/Creer',[AdminController::class, 'CreateForm'] ) -> name('createform.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/Creer',[AdminController::class, 'Create'] )-> name('create.admin')->middleware('auth')->middleware('IsAdmin');

//Liste des cours

Route::get('/Listecours',[AdminController::class, 'liste'] ) -> name('listecours.admin')->middleware('auth')->middleware('IsAdmin');

//Modifier un cours

Route::post('/Listecours/Modifier/{id}',[AdminController::class, 'ModifycoursForm'] ) -> name('modifycoursform.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/Listecours/Modifier/{id}/mod',[AdminController::class, 'Modifycours'] ) -> name('modifycours.admin')->middleware('auth')->middleware('IsAdmin');

//Supprimer un cours

Route::post('/Listecours/Supprimer/{id}',[AdminController::class, 'SuppcoursForm'] ) -> name('suppcoursform.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/Listecours/Supprimer/{id}/supp',[AdminController::class, 'Suppcours'] ) -> name('suppcours.admin')->middleware('auth')->middleware('IsAdmin');

//Recherche d'un cours

Route::get('/Recherchecours',[AdminController::class, 'recherchecoursform'] ) -> name('recherchecoursform.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/Recherchecours/resultat',[AdminController::class, 'recherchecours'] ) -> name('recherchecours.admin')->middleware('auth')->middleware('IsAdmin');

//Liste des Utilisateurs

Route::get('/Listeuser',[AdminController::class, 'listeuser'] ) -> name('listeuser.admin')->middleware('auth')->middleware('IsAdmin');
Route::get('/Listeuser/enseignant',[AdminController::class, 'listeuserens'] ) -> name('listeuserens.admin')->middleware('auth')->middleware('IsAdmin');
Route::get('/Listeuser/gestionnaire',[AdminController::class, 'listeusergest'] ) -> name('listeusergest.admin')->middleware('auth')->middleware('IsAdmin');

//Modifier un utilisateur

Route::post('/Listeuser/Modifier/{id}',[AdminController::class, 'ModifyuserForm'] ) -> name('modifyuserform.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/Listeuser/Modifier/{id}/mod',[AdminController::class, 'Modifyuser'] ) -> name('modifyuser.admin')->middleware('auth')->middleware('IsAdmin');

//Supprimer un utilisateur

Route::post('/Listeuser/Supprimer/{id}',[AdminController::class, 'SuppuserForm'] ) -> name('suppuserform.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/Listeuser/Supprimer/{id}/supp',[AdminController::class, 'Suppuser'] ) -> name('suppuser.admin')->middleware('auth')->middleware('IsAdmin');

//Créer un utilisateur

Route::get('/CreateUser', [AdminController::class,'FormulaireAjouterUser'])->name('formulaireajouteruser.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/CreateUser', [AdminController::class,'AjouterUser'])->name('ajouteruser.admin')->middleware('auth')->middleware('IsAdmin');

//Recherche d'un utilisateur

Route::get('/Rechercheuser',[AdminController::class, 'rechercheform'] ) -> name('rechercheform.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/Rechercheuser/resultatNom',[AdminController::class, 'recherchenom'] ) -> name('recherchenom.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/Rechercheuser/resultatPrenom',[AdminController::class, 'rechercheprenom'] ) -> name('rechercheprenom.admin')->middleware('auth')->middleware('IsAdmin');
Route::post('/Rechercheuser/resultatLogin',[AdminController::class, 'recherchelogin'] ) -> name('recherchelogin.admin')->middleware('auth')->middleware('IsAdmin');


//Gestionnaire-------------------------------------------------------------------------------------------//

//Partie Enseignant
Route::get('/Enseignant', [GestionnaireController::class,'enseignant']) ->name('enseignant.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Partie Etudiant
Route::get('/Etudiant', [GestionnaireController::class,'etudiant']) ->name('etudiant.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Partie Seance
Route::get('/Seance', [GestionnaireController::class,'ptseance']) ->name('ptseance.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Modification mot de passe Gestionnaire

Route::get('/ModifierGestionnairemdp', [GestionnaireController::class,'ModifymdpForm']) ->name('Modifymdp_form.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/ModifierGestionnairemdp/modifier', [GestionnaireController::class,'Modifymdp']) ->name('Modifymdp.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Modification nom/prenom

Route::get('/ModifierGestionnairenp', [GestionnaireController::class,'ModifymdpFormnp']) ->name('Modifymdp_formnp.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/ModifierGestionnairenp/modifier', [GestionnaireController::class,'Modifymdpnp']) ->name('Modifymdpnp.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Ajouter un étudiant


Route::get('/Add',[GestionnaireController::class, 'AddForm'] ) -> name('addform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/Add',[GestionnaireController::class, 'Add'] )-> name('add.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Creer une séance


Route::get('/AddSeance',[GestionnaireController::class, 'CreateFormbis'] ) -> name('createformbis.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/AddSeance/{id}',[GestionnaireController::class, 'CreateForm'] ) -> name('createform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/Addeance/{id}',[GestionnaireController::class, 'Create'] )-> name('create.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Associer étudiants et cours


Route::get('/AssocierEtudiant',[GestionnaireController::class, 'AssocierFormbis'] ) -> name('associerformbis.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::get('/AssocierEtudiant/{id}',[GestionnaireController::class, 'AssocierForm'] ) -> name('associerform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/AssocierEtudiant/{id}',[GestionnaireController::class, 'Associer'] )-> name('associer.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');


//Liste des étudiants associés au cours


Route::get('/ListeAssocier',[GestionnaireController::class, 'Listeassocform'] ) -> name('listeassocform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::get('/ListeAssocier/{id}',[GestionnaireController::class, 'Listeassoc'] ) -> name('listeassoc.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Supprimer Etudiant associer au Cours

Route::post('/ListeAssocier/{id}',[GestionnaireController::class, 'Supprimer'] ) -> name('supprimer.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Associer enseignant et cours

Route::get('/AssocierEnseignant',[GestionnaireController::class, 'AssocierensFormbis'] ) -> name('associerensformbis.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/AssocierEnseignant/{id}',[GestionnaireController::class, 'AssocierensForm'] ) -> name('associerensform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/AssocierEnseignant/{id}/{idd}',[GestionnaireController::class, 'Associerens'] )-> name('associerens.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Liste des enseignants associés au cours

Route::get('/ListeAssocierEnseignant',[GestionnaireController::class, 'Listeassocensform'] ) -> name('listeassocensform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/ListeAssocierEnseignant/{id}',[GestionnaireController::class, 'Listeassocens'] ) -> name('listeassocens.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Supprimer Enseignant

Route::post('/ListeAssocierEnseignant/{idd}/{id}',[GestionnaireController::class, 'Supprimerens'] ) -> name('supprimerens.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Liste des étudiants avec pagination

Route::get('/ListeEtudiant',[GestionnaireController::class, 'Listeet'] ) -> name('listeet.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Liste des séances avec pagination

Route::get('/ListeSeance',[GestionnaireController::class, 'Listeseance'] ) -> name('listeseance.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Modifier une séance 

Route::post('/ListeSeance/Modifier/{id}',[GestionnaireController::class, 'ModifyseanceForm'] ) -> name('modifyseanceform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/ListeSeance/Modifier/{id}/mod',[GestionnaireController::class, 'Modifyseance'] ) -> name('modifyseance.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Modifier un étudiant

Route::post('/ListeEtudiant/Modifier/{id}',[GestionnaireController::class, 'ModifyetudiantForm'] ) -> name('modifyetudiantform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/ListeEtudiant/Modifier/{id}/mod',[GestionnaireController::class, 'Modifyetudiant'] ) -> name('modifyetudiant.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Supprimer un étudiant

Route::post('/ListeEtudiant/Supprimer/{id}',[GestionnaireController::class, 'SuppetudiantForm'] ) -> name('suppetudiantform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/ListeEtudiant/Supprimer/{id}/supp',[GestionnaireController::class, 'Suppetudiant'] ) -> name('suppetudiant.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Supprimer une séance

Route::post('/ListeSeance/Supprimer/{id}',[GestionnaireController::class, 'SuppseanceForm'] ) -> name('suppseanceform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/ListeSeance/Supprimer/{id}/supp',[GestionnaireController::class, 'Suppseance'] ) -> name('suppseance.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Liste des cours avec pagination

Route::get('/ListeCours',[GestionnaireController::class, 'Listecours'] ) -> name('listecours.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Liste des séances associées aux cours

Route::get('/ListeCours/{id}',[GestionnaireController::class, 'Listeassoseance'] ) -> name('listeassoseance.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Recherche d'un étudiant

Route::get('/Rechercheetudiant',[GestionnaireController::class, 'rechercheform'] ) -> name('rechercheform.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/Rechercheetudiant/resultat',[GestionnaireController::class, 'recherche'] ) -> name('recherche.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Liste des présences (des étudiants) par séance

Route::get('/Listeseances', [GestionnaireController::class,'Listeseancebis']) ->name('listeseancebis.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/Listeseances/{id}/eleves', [GestionnaireController::class,'Listesetudiantbis']) ->name('listesetudiantbis.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Liste des présences (des étudiants) par cours

Route::get('/Listedescours', [GestionnaireController::class,'Listecoursbis']) ->name('Listecoursbis.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/Listedescours/{id}/eleves', [GestionnaireController::class,'Listesetudiantbisbis']) ->name('Listesetudiantbisbis.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Liste des présences détaillé par étudiants

Route::get('/Listeetudiant', [GestionnaireController::class,'Listeetbis']) ->name('listeetbis.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/Listeetudiant/{id}/eleves', [GestionnaireController::class,'ListeCouretu']) ->name('listecouretu.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');
Route::post('/Listeetudiant/{id}/eleves/{idd}/pres', [GestionnaireController::class,'nbdePresence']) ->name('nbdepresence.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Liste des abscences détaillé par étudiants

Route::post('/Listeetudiant/{id}/eleves/{idd}/abs', [GestionnaireController::class,'nbdeAbscence']) ->name('nbdeabscence.gestionnaire')->middleware('auth')->middleware('IsGestionnaire');

//Enseignant-------------------------------------------------------------------------------------------//

//Modification mot de passe Enseignant

Route::get('/ModifierEnseignantmdp', [EnseignantController::class,'ModifymdpForm']) ->name('Modifymdp_form.enseignant')->middleware('auth')->middleware('IsEnseignant');
Route::post('/ModifierEnseignantmdp/modifier', [EnseignantController::class,'Modifymdp']) ->name('Modifymdp.enseignant')->middleware('auth')->middleware('IsEnseignant');

//Modification nom/prenom

Route::get('/ModifierEnseignantnp', [EnseignantController::class,'ModifymdpFormnp']) ->name('Modifymdp_formnp.enseignant')->middleware('auth')->middleware('IsEnseignant');
Route::post('/ModifierEnseignantnp/modifier', [EnseignantController::class,'Modifymdpnp']) ->name('Modifymdpnp.enseignant')->middleware('auth')->middleware('IsEnseignant');


//--POINTAGE INDIVIDUEL

//Liste des cours associés à l'enseignant

Route::get('/ListeCoursAssocier',[EnseignantController::class, 'Listeassoccours'] ) -> name('listeassocenscours.enseignant')->middleware('auth')->middleware('IsEnseignant');

//Liste des séances associées

Route::get('/ListeCoursAssocier/{id}',[EnseignantController::class, 'Listeseanceassoc'] ) -> name('listeseanceassoc.enseignant')->middleware('auth')->middleware('IsEnseignant');

//Liste des élèves inscrits au cours  

Route::get('/ListeCoursAssocier/{id}/{idd}',[EnseignantController::class, 'Listesetudiantassoc'] ) -> name('listesetudiantassoc.enseignant')->middleware('auth')->middleware('IsEnseignant');

//Pointage d'un étudiant 

Route::post('/ListeCoursAssocier/{id}/{idd}',[EnseignantController::class, 'Pointageperso'] ) -> name('pointageperso.enseignant')->middleware('auth')->middleware('IsEnseignant');

//Liste des inscrits dans un cours

Route::get('/ListeInscrits',[EnseignantController::class, 'Listesinscritform'] ) -> name('listesinscritform.enseignant')->middleware('auth')->middleware('IsEnseignant');
Route::post('/ListeInscrits/{id}',[EnseignantController::class, 'Listesinscrit'] ) -> name('listesinscrit.enseignant')->middleware('auth')->middleware('IsEnseignant');

//Liste des étudiants présents

Route::get('/Listecourbis', [EnseignantController::class,'Listeassoccoursbis']) ->name('listeassoccoursbis.enseignant')->middleware('auth')->middleware('IsEnseignant');
Route::get('/Listecourbis/Listeseance/{id}', [EnseignantController::class,'Listeseance']) ->name('listeseance.enseignant')->middleware('auth')->middleware('IsEnseignant');
Route::post('/Listecourbis/Listeseance/{id}/{idd}/pres', [EnseignantController::class,'Listesetudiantpres']) ->name('listesetudiantpres.enseignant')->middleware('auth')->middleware('IsEnseignant');

//Liste des étudiants absents

Route::post('/Listecourbis/Listeseance/{id}/{idd}/abs', [EnseignantController::class,'Listesetudiantabs']) ->name('listesetudiantabs.enseignant')->middleware('auth')->middleware('IsEnseignant');
