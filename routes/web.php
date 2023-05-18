<?php

use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\NewsController;





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


// Admin


Route::get('/admin', [AdminController::class, 'dash']);
Route::get('signout', [BackController::class, 'signOut'])->name('signout');
// Route::get('/dashboard', function () {
// return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::middleware('auth')->group(function () {
// Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
// Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
// Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// require __DIR__.'/auth.php';

Route::get('/home', [ClientController::class, 'home']);
Route::get('/shop', [ClientController::class, 'shop']);
Route::get('/panier', [ClientController::class, 'panier']);
Route::get('/paiement', [ClientController::class, 'paiement']);
Route::get('/login1', [ClientController::class, 'login']);
Route::get('/signup', [ClientController::class, 'signup']);
Route::get('/orders', [ClientController::class, 'orders']);
Route::get('/ajouteraupanier/{id}', [ClientController::class, 'ajouteraupanier']);
Route::post('/modifier_quant/{id}', [ClientController::class, 'modifier_quant']);
Route::get('/suppdupanier/{id}', [ClientController::class, 'suppdupanier']);
Route::post('/creer_compte', [ClientController::class, 'creer_compte']);
Route::post('/acceder_compte',[ClientController::class, 'acceder_compte']);
Route::get('/logout',[ClientController::class, 'logout']);
Route::post('/payer',[ClientController::class, 'payer']);
Route::get('/detait', [ClientController::class, 'detait']);

Route::get('/addcontent', [ContentController::class, 'addcontent']);
Route::get('/contents', [ContentController::class, 'contents']);
Route::post('/savecontent' , [ContentController::class, 'savecontent']);
Route::get('/edit_content/{id}', [ContentController::class, 'edit_content']);
Route::post('/updatecontent',[ContentController::class, 'updatecontent']);
Route::get('/delete_content/{id}',[ContentController::class, 'delete_content']);
Route::get('/activer_content/{id}', [ContentController::class, 'activer_content']);
Route::get('/desactiver_content/{id}', [ContentController::class, 'desactiver_content']);


Route::get('/',[IndexController::class,'index']);
Route::get('/article/{titre}',[IndexController::class,'article']);
Route::get('/news',[IndexController::class,'news']);
Route::get('/select_par_cat/{category_name}', [productController::class, 'select_par_cat']);
Route::get('/contact',[IndexController::class,'create']);
Route::post('/contact',[IndexController::class,'store']);
Route::get('/test', function(){
    return  new ContactMessageCreated('ouss', 'oussama@gmail.com', 'messa');
});








//Route::get('/admin', [AdminController::class, 'dashboard']);
// Route::group(['middleware'=> 'auth'], function(){
Route::get('/addcategory', [CategoryController::class, 'addcategory']);
Route::get('/categories', [CategoryController::class, 'categories']);
Route::post('/savecategory', [CategoryController::class, 'savecategory']);
Route::get('/edit_category/{id}', [CategoryController::class, 'edit_category']);
Route::post('/updatecategory', [CategoryController::class, 'updatecategory']);
Route::get('/delete_category/{id}', [CategoryController::class, 'delete_category']);





Route::get('/addslider', [SliderController::class, 'addslider']);
Route::post('/saveslider', [SliderController::class, 'saveslider']);

Route::get('/sliders', [SliderController::class, 'sliders']);
Route::get('/edit_slider/{id}', [SliderController::class, 'edit_slider']);
Route::post('updateslider', [SliderController::class, 'updateslider']);
Route::get('/delete_slider/{id}',[SliderController::class, 'delete_slider']);
Route::get('/desactiver_slider/{id}',[SliderController::class, 'desactiver_slider']);
Route::get('/activer_slider/{id}',[SliderController::class, 'activer_slider']);


Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('dashboard');
Route::post('/saveproduct', [ProductController::class, 'saveproduct']);

Route::get('/products', [ProductController::class, 'products']);
Route::get('/edit_product/{id}', [ProductController::class, 'edit_product']);
Route::post('/updateproduct', [ProductController::class, 'updateproduct']);
Route::get('/delete_product/{id}', [ProductController::class, 'delete_product']);
Route::get('/activer_product/{id}', [ProductController::class, 'activer_product']);
Route::get('/desactiver_product/{id}', [ProductController::class, 'desactiver_product']);

Route::get('/voircommandepdf/{id}', [PdfController::class, 'view_pdf']);


// });

// BackOffice

Route::get('/backoffice',[BackController::class,'login'])->name('backofficce');
Route::post('custom-login', [BackController::class, 'customLogin'])->name('login.custom');

// News
Route::get('/newss',[NewsController::class,'news']);
Route::get('/addnews',[NewsController::class,'addnews']);
Route::post('/savenews',[NewsController::class,'savenews']);
Route::get('/edit_news/{id}',[NewsController::class,'edit_news']);
Route::post('/updatenews',[NewsController::class,'updatenews']);
Route::get('/delete_news/{id}',[NewsController::class,'delete_news']);
