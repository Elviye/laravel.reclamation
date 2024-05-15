<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\reclamationController;

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
Route::post('/send-email', 'EmailController@sendEmail');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

}); // End group admin middleware
Route::middleware(['auth','role:agent'])->group(function(){
Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

}); // End group agent middleware

Route::get('/reclamation',[reclamationController::class,'index'])->name('reclamation.index');//create route for reclamations
Route::get('/reclamation/create',[reclamationController::class,'create'])->name('reclamation.create');//create route for creating reclamations
Route::post('/reclamation',[reclamationController::class,'store'])->name('reclamation.store');//create route to go back to the reclamation store
Route::get('/reclamation/{reclamation}/edit',[reclamationController::class,'edit'])->name('reclamation.edit');//create route to update and edit a reclamation
Route::put('/reclamation/{reclamation}/update',[reclamationController::class,'update'])->name('reclamation.update');//create route to update the edited data in the database
Route::delete('/reclamation/{reclamation}/destroy',[reclamationController::class,'destroy'])->name('reclamation.destroy');//create route to update the edited data in the database
Route::post('/admin/dashboard', [reclamationController::class,'treat'])->name('admin.admin_dashboard');
