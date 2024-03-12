<?php

use App\Http\Controllers\AffectationController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DestinataireController;
use App\Http\Controllers\ExpediteursController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImputationController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\NatureCourrierController;
use App\Http\Controllers\PasswordChangedController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // groupe de routes pour les administrateurs uniquement avec middleware admin
    Route::group([
        'middleware' => ['can:admin'],
        'as' => 'admin.'
    ], function () {

        Route::group(
            ['prefix' => 'users', 'as' => 'users.'],
            function () {
                //Route::get('/', Utilisateurs::class)->name('users')->middleware("can:admin");
                Route::get('/', [UserController::class, 'index'])->name('users');
                Route::get('/create', [UserController::class, 'create'])->name('users.create');
                Route::get('/edit_user/{user}', [UserController::class, 'edit'])->name('users.edit');
                Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
            }
            // le nom des routes ici commence par : admin.users. et se termine par users.index, users.create, users.edit, users.show
        );

        Route::group(
            ['prefix' => 'profils', 'as' => 'profils.'],
            function () {
                Route::get('/', [ProfilController::class, 'index'])->name('profils');
                Route::get('/create', [ProfilController::class, 'create'])->name('profils.create');
                Route::get('/edit-profil/{profil}', [ProfilController::class, 'edit'])->name('profils.edit');
                Route::get('/{profil}', [ProfilController::class, 'show'])->name('profils.show');
            }
            // le nom des routes ici commence par : admin.users. et se termine par users.index, users.create, users.edit, users.show
        );

        Route::group(
            ['prefix' => 'departements'],
            function () {
                Route::get('/', [DepartementController::class, 'index'])->name('departements');
                Route::get('/create', [DepartementController::class, 'create'])->name('departements.create');
                Route::get('/edit-departement/{departement}', [DepartementController::class, 'edit'])->name('departements.edit');
                Route::get('/{departement}', [DepartementController::class, 'show'])->name('departements.show');
            }
            // le nom des routes ici commence par : admin.users. et se termine par users.index, users.create, users.edit, users.show
        );

        Route::group(
            [
                'prefix' => 'services',
            ],
            function () {
                Route::get('/', [ServiceController::class, 'index'])->name('services');
                Route::get('/create', [ServiceController::class, 'create'])->name('services.create');
                Route::get('/edit-service/{service}', [ServiceController::class, 'edit'])->name('services.edit');
                Route::get('/{service}', [ServiceController::class, 'show'])->name('services.show');
            }
            // le nom des routes ici commence par : admin.users. et se termine par users.index, users.create, users.edit, users.show
        );
    });
    // Fin des routes gérées par le middlewire admin(adminMidlleware)

     // routes pour les pages de gestion des expéditeurs
     Route::prefix('expediteurs')->group(
        function () {
            Route::get('/', [ExpediteursController::class, 'index'])->name('expediteurs');
            Route::get('/create', [ExpediteursController::class, 'create'])->name('expediteurs.create');
            Route::get('/edit-expediteur/{expediteur}', [ExpediteursController::class, 'edit'])->name('expediteurs.edit');
            Route::get('/{expediteur}', [ExpediteursController::class, 'show'])->name('expediteurs.show');
        }
    );

       // routes pour les pages de gestion des destinataires
     Route::prefix('destinataires')->group(
        function () {
            Route::get('/', [DestinataireController::class, 'index'])->name('destinataires');
            Route::get('/create', [DestinataireController::class, 'create'])->name('destinataires.create');
            Route::get('/edit-destinataire/{destinataire}', [DestinataireController::class, 'edit'])->name('destinataires.edit');
            Route::get('/{destinataire}', [DestinataireController::class, 'show'])->name('destinataires.show');
        }
    );


    // routes pour gerer les instructions
   //  Route::prefix('instructions')->group(
    //     function () {
    //         Route::get('/', [InstructionController::class, 'index'])->name('instructions');
    //         Route::get('/create', [InstructionController::class, 'create'])->name('instructions.create');
    //         Route::get('/edit-instruction/{instruction}', [InstructionController::class, 'edit'])->name('instructions.edit');
    //         Route::get('/{instruction}', [InstructionController::class, 'show'])->name('instructions.show');
    //     }
    // );

    // routes pour les natures de courriers
    Route::prefix('natures_courriers')->group(
        function () {
            Route::get('/', [NatureCourrierController::class, 'index'])->name('natures_courriers');
            Route::get('/create', [NatureCourrierController::class, 'create'])->name('natures_courriers.create');
            Route::get('/edit-nature_courrier/{nature_courrier}', [NatureCourrierController::class, 'edit'])->name('natures_courriers.edit');
            Route::get('/{nature_courrier}', [NatureCourrierController::class, 'show'])->name('natures_courriers.show');
        }
    );

    // routes pour la page d'affection
    Route::prefix('affectations')->group(
        function () {
            Route::get('/', [AffectationController::class, 'index'])->name('affectations');
            Route::get('/create', [AffectationController::class, 'create'])->name('affectations.create');
        }
    );


    // routes pour les pages de gestion des courriers
    Route::prefix('courriers')->group(
        function () {
            Route::get('/', [CourrierController::class, 'index'])->name('courriers');
            Route::get('/create', [CourrierController::class, 'create'])->name('courriers.create');
            Route::get('/edit-courrier/{courrier}', [CourrierController::class, 'edit'])->name('courriers.edit');
            Route::get('/{courrier}', [CourrierController::class, 'show'])->name('courriers.show');
        }
    );

    // routes pour enregistrer les courriers
    Route::prefix('traitements')->group(
        function () {
            Route::post('/', [TraitementController::class, 'index'])->name('traitements');
            Route::post('/store', [TraitementController::class, 'store'])->name('traitements.store');
            Route::put('/update/{traitement}', [TraitementController::class, 'update'])->name('traitements.update');
        }
    );

    // routes pour gestion des imputations
    Route::prefix('imputations')->group(
        function () {
            Route::get('/', [ImputationController::class, 'index'])->name('imputations');
            Route::get('/create', [ImputationController::class, 'create'])->name('imputations.create');
            Route::get('/edit-imputation/{imputation}', [ImputationController::class, 'edit'])->name('imputations.edit');
            Route::get('/{imputation}', [ImputationController::class, 'show'])->name('imputations.show');
        }
    );

    Route::get('/password-change', [PasswordChangedController::class, 'index'])->name('password.change');
    Route::post('/password-changement', [PasswordChangedController::class, 'changePassword'])->name('password.changement');


});
