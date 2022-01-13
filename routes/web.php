<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

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

# AUTHENTIFICATION
Route::prefix("")->group(function () {
    Route::get('/devenir-membre-ou-beneficiare',        [AuthController::class, 'register'])->name('register');
    Route::post('/devenir-membre-ou-beneficiare/post',  [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/se-connecter',                         [AuthController::class, 'login'])->name('login');
    Route::post('/se-connecter/post',                   [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/se-deconnecter',                       [AuthController::class, 'logout'])->name('logout');
});

# VISITEUR
Route::prefix("")->group(function () {
    Route::get('/', [FrontController::class, 'home'])->name('home');

    Route::get('/historique', function () {
        return view('visitor.historique');
    })->name('histoire');

    Route::get('/bureau', function () {
        return view('visitor.organigramme');
    })->name('bureau');

    Route::get('/mot-du-president', function () {
        return view('visitor.message');
    })->name('message');

    Route::get('/nos-objectifs', function () {
        return view('visitor.objectif');
    })->name('objectif');

    Route::get('/journee-excellence', function () {
        return view('visitor.jde');
    })->name('jde');

    Route::get('/journee-du-troyen', function () {
        return view('visitor.jdt');
    })->name('jdt');

    Route::get('/ceremonie-hommage', function () {
        return view('visitor.ceremonie');
    })->name('hommage');

    Route::get('/etablissement-troyen', function () {
        return view('visitor.troyen');
    })->name('troyen');

    Route::get('/nos-actions', function () {
        return view('visitor.actions');
    })->name('actions');

    Route::get('/distinctions-et-laureats', function () {
        return view('visitor.distinction');
    })->name('distinction');

    Route::get('/espace-jeu-et-concours', function () {
        return view('visitor.concours');
    })->name('concours');

    Route::get('/nos-donateur', function () {
        return view('visitor.donateur');
    })->name('donateur');

    Route::get('/nos-photos', function () {
        return view('visitor.photos');
    })->name('photos');

    Route::get('/nos-videos', function () {
        return view('visitor.videos');
    })->name('videos');

    Route::get('/nous-contacter',                   [FrontController::class, 'contact'])->name('contact');
    Route::post('/nous-contacter/post',             [FrontController::class, 'contactPost'])->name('contact.post');
});

Route::prefix("dashboard")->as("admin.")->middleware('auth')->group(function () {
    Route::get('',                              [AdminController::class, 'index'])->name('dashboard');
    Route::get('membres',                       [AdminController::class, 'membres'])->name('membres.list_membre');
    Route::get('partenaires',                   [AdminController::class, 'partenaires'])->name('partenaires');
    Route::post('partenaires/save',             [AdminController::class, 'partenairesStore'])->name('partenaires.save');
    Route::get('partenaires/{user}/delete',     [AdminController::class, 'partenairesDelete'])->name('partenaires.delete');
    Route::get('blogs',                         [AdminController::class, 'blogs'])->name('blogs');
    Route::post('blogs/save',                   [AdminController::class, 'blogsPost'])->name('blogs.post');
    Route::get('blogs/delete/{post}',           [AdminController::class, 'blogsDelete'])->name('blogs.delete');
    Route::get('blogs/images',                  [AdminController::class, 'blogImages'])->name('blogs.images');
    Route::get('blogs/videos',                  [AdminController::class, 'blogImages'])->name('blogs.videos');
    Route::get('blogs/flashInfo',               [AdminController::class, 'flashInfo'])->name('flashInfo');
    Route::get('activites',                     [AdminController::class, 'activites'])->name('activites');
});
