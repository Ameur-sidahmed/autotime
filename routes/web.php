<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ControlleTechController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RendezVousController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// admin Controller
Route::get('/admin', [AdminController::class, 'home']);
Route::get('/admin/ajouteControleTech',[AdminController::class,'ajouteControleTech']);
Route::get('/admin/analitique',[AdminController::class,'analitique']);
Route::get('/admin/controleTech',[AdminController::class,'controleTech']);
Route::get('/admin/parametre',[AdminController::class,'parametre']);
Route::get('/admin/rendezVous',[AdminController::class,'rendezVous']);
Route::get('/admin/utilisateurs',[AdminController::class,'utilisateurs']);
Route::get('/admin/messagevisit', [AdminController::class, 'messagevisit']);
Route::post('/admin/addcontroletech', [AdminController::class, 'addcontroletech']);
Route::delete('/admin/deletecontroletech/{id}', [AdminController::class, 'deletecontroletech']);
Route::get('/admin/modifiercontroletech/{id}', [AdminController::class, 'modifiercontroletech']);
Route::post('/admin/editcontroletech/{id}', [AdminController::class, 'editcontroletech']);
Route::get('/admin/utilisateurs/voirrdv/{id}', [AdminController::class, 'voirrdv']);
Route::get('/admin/rendezVous/voirrdvct/{id}', [AdminController::class, 'voirrdvct']);



// controletechnique Controller
Route::get('/controletech', [ControlleTechController::class, 'home']);
Route::get('/controletech/ajouterendezvous',[ControlleTechController::class,'ajouterendezvous']);
Route::get('/controletech/analitique',[ControlleTechController::class,'analitique']);
Route::get('/controletech/planing',[ControlleTechController::class,'planing']);
Route::get('/controletech/planing/unactivatecreneau/{creneau}/{idct}',[ControlleTechController::class,'unactivatecreneau']);
Route::get('/controletech/planing/activatecreneau/{creneau}/{idct}',[ControlleTechController::class,'activatecreneau']);
Route::get('/controletech/parametre',[ControlleTechController::class,'parametre']);
Route::get('/controletech/rendezVous',[ControlleTechController::class,'rendezVous']);
Route::get('/controletech/utilisateurs',[ControlleTechController::class,'utilisateurs']);
Route::get('/controletech/rendezVous/confirme/{id}',[ControlleTechController::class,'confirme']);
Route::get('/controletech/rendezVous/annulle/{id}',[ControlleTechController::class,'annulle']);
Route::get('/controletech/rendezVous/supprimerrdv/{id}/{creneau}',[ControlleTechController::class,'supprimerrdv']);
Route::get('/controletech/rendezVous/modifierrendezvous/{id}',[ControlleTechController::class,'modifierrendezvous']);
Route::post('/controletech/ajouterendezvous/rdvsave',[ControlleTechController::class,'rdvsave']);
Route::put('/controletech/rendezVous/modifierrendezvous/rdvupdate/{id}', [ControlleTechController::class, 'rdvupdate']);



// client Controller
Route::get('/accueil', [ClientController::class, 'accueil']);
Route::get('/accueil/carteCT', [ClientController::class, 'carteCT']);
Route::get('/accueil/formulaire/{jours}/{hours}/{id}/{nom}', [ClientController::class, 'formulaire']);
Route::post('/accueil/ajouterdv/{creneau}/{id}/{nom}', [ClientController::class, 'ajouterdv']);
Route::get('/accueil/historique', [ClientController::class, 'historique']);
Route::post('/accueil/savecontact', [ClientController::class, 'savecontact']);
Route::get('/accueil/historique/editrdv/{id}/{creneau}/{idct}', [ClientController::class, 'editrdv']);
Route::get('/accueil/historique/formulairemod/{id}/{creneau}/{nom}', [ClientController::class, 'formulairemod']);
Route::put('/accueil/historique/formulairemod/modfrdv/{id}/{creneau}', [ClientController::class, 'modfrdv']);


// login Controller
Route::get('/accueil/login', [LoginController::class, 'login']);
Route::get('/loginadmin', [LoginController::class, 'loginadmin']);
Route::get('/accueil/logout', [LoginController::class, 'logout']);
Route::get('/admin/logoutadmin', [LoginController::class, 'logoutadmin']);
Route::post('/accueil/nouveauclient', [LoginController::class, 'nouveauclient']);
Route::post('/admin/nouveauadmin', [LoginController::class, 'nouveauadmin']);
Route::post('/accueil/clientaccee', [LoginController::class, 'clientaccee']);
Route::post('/admin/adminaccee', [LoginController::class, 'adminaccee']);
Route::get('/logincontrole',[LoginController::class, 'logincontrole']);
Route::post('/controletech/controletechaccee',[LoginController::class, 'controletechaccee']);
Route::get('/controletech/logoutcontrole',[LoginController::class, 'logoutcontrole']);


// pdf controller
Route::get('/pdf/rendezvous/{id}', 'App\Http\Controllers\PdfController@generatePdf')->name('pdf.rendezvous');

// email controller
Route::get('/controletech/rendezVous/email/{id}', [EmailController::class, 'sendRendezVousEmail']);




