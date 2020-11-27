<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TesterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZipController;
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

Route::get('/', function () {
    return view('welcome');
});

//Eloquent Route
Route::get('/students',[StudentController::class,'fetchStudents'])->name('allstudents');

//CRUD OPERATION ELOQUENT ROUTE
Route::get('/add-post',[PostController::class,'addPost'])->name('post.add');
Route::post('/create-post',[PostController::class,'createPost'])->name('post.create');
Route::get('/posts',[PostController::class,'getPost'])->name('post.get');
Route::get('/posts/{id}',[PostController::class,'getPostById'])->name('post.singlepost');
Route::get('/delete-post/{id}',[PostController::class,'deletePost'])->name('post.delete');
Route::get('/edit-post/{id}',[PostController::class,'editPost'])->name('post.edit');
Route::post('/update-post',[PostController::class,'updatePost'])->name('post.update');

//RelationShip One to One
Route::get('/add-user',[UserController::class,'insertRecord'])->name('record.insert');
Route::get('/get-phone/{id}',[UserController::class,'fetchPhoneById'])->name('record.getphonebyid');

//RelationShip One to Many
Route::get('/add-comment/{id}',[PostController::class,'addComment'])->name('comment.add');
Route::get('/get-comment/{id}',[PostController::class,'getCommentsByPost'])->name('comment.get');

//RelationShip Many to Many
Route::get('/add-roles',[RoleController::class,'addRole'])->name('role.addrole');
Route::get('/add-users',[RoleController::class,'addUser'])->name('role.adduser');
Route::get('/rolesbyuser/{id}',[RoleController::class,'getAllRolesByUser'])->name('role.rolesbyuser');
Route::get('/usersbyrole/{id}',[RoleController::class,'getAllUsersByRole'])->name('role.usersbyrole');


//Export Data in Excel and CSV
Route::get('/add-employee',[EmployeeController::class,'addEmployee'])->name('employee.add');
Route::get('/export-excel',[EmployeeController::class,'exportIntoExcel'])->name('excel.export');
Route::get('/export-csv',[EmployeeController::class,'exportIntoCsv'])->name('excel.export');

//Export Data in PDF
Route::get('/get-all-employee',[EmpController::class,'getAllEmployees'])->name('getallemployee');
Route::get('/download-pdf',[EmpController::class,'downloadPDF'])->name('download.pdf');

//Export Data in Excel and CSV
Route::get('/import-form',[EmployeeController::class,'importForm'])->name('form.import');
Route::post('/import',[EmployeeController::class,'import'])->name('employee.import');

// Rezise Image
Route::get('/resize-image',[ImageController::class,'resizeImage'])->name('resize.image');
Route::post('/resize-image',[ImageController::class,'resizeImageSubmit'])->name('resize.imagesubmit');

//Dropzone
Route::get('/dropzone',[DropzoneController::class,'dropzone'])->name('dropzone');
Route::post('/dropzone-zone',[DropzoneController::class,'dropzoneStore'])->name('dropzone.store');

//Gallery
Route::get('/gallery',[GalleryController::class,'gallery'])->name('gallery');

//Editor
Route::get('/editor',[EditorController::class,'editor'])->name('editor');

//Image CRUD

Route::get('/add-eleve',[EleveController::class,'addEleve'])->name('eleve.add');
Route::post('/add-eleve',[EleveController::class,'storeEleve'])->name('eleve.store');
Route::get('/all-eleves',[EleveController::class,'eleves'])->name('eleve.all');
Route::get('/edit-eleve/{id}',[EleveController::class,'editEleve'])->name('eleve.edit');
Route::post('/update-eleve',[EleveController::class,'updateEleve'])->name('eleve.update');

// Route::get('/eleves/{id}',[EleveController::class,'getEleveById'])->name('eleve.singleeleve');
Route::get('/delete-eleve/{id}',[EleveController::class,'deleteEleve'])->name('eleve.delete');

//Formulaire d'envoi d'email
Route::get('/contact-us',[ContactController::class,'contact'])->name('contact.email');
Route::post('/send-email',[ContactController::class,'sendEmail'])->name('email.send');

//Helpers
Route::get('/get-name',[TestController::class,'getFirstLastName'])->name('getname');

//Autocomplete search
Route::get('/add-products',[ProductController::class,'addProducts'])->name('addproducts');
Route::get('/search',[ProductController::class,'search'])->name('search');
Route::get('/autocomplete',[ProductController::class,'autocomplete'])->name('autocomplete');

//Create and Dowload Zip File
Route::get('/zip',[ZipController::class,'zipFile'])->name('zip');

//Datatables
Route::get('/employee',[EmployeeController::class,'index'])->name('datatable.index');

//CRUD AJAX

Route::get('/etudiants',[EtudiantController::class,'index'])->name('etudiant.index');
Route::post('/ajout-etudiant',[EtudiantController::class,'ajoutEtudiant'])->name('etudiant.ajout');
Route::get('/etudiants/{id}',[EtudiantController::class,'getEtudiantById'])->name('etudiant.getetudiantbyid');
Route::put('/etudiant',[EtudiantController::class,'updateEtudiant'])->name('etudiant.update');
Route::delete('/etudiants/{id}',[EtudiantController::class,'deleteEtudiant'])->name('etudiant.delete');

//Delete Multiple Record Using Checkbox
Route::delete('/selected-etudiants',[EtudiantController::class,'deleteCheckedEtudiants'])->name('etudiant.deleteSelected');

//Client Side Form validation
Route::get('/register',[AuthController::class,'index'])->name('register');
Route::post('/register',[AuthController::class,'registeForm'])->name('auth.registersubmit');

//HighCharts
Route::get('/chart',[ChartController::class,'index'])->name('chart');
//BarCharts
Route::get('/bar-chart',[ChartController::class,'barChart'])->name('bar-chart');

//Multiple Database Connection
Route::get('/add-developer',[TesterController::class,'addDeveloper'])->name('adddeveloper');
Route::get('/add-article',[TesterController::class,'addArticle'])->name('addarticle');
Route::get('/developers',[TesterController::class,'getDeveloper'])->name('getdevelopers');
Route::get('/articles',[TesterController::class,'getArticle'])->name('getarticles');

//Multi Step Form
Route::get('/form',[FormController::class,'index'])->name('stepform.index');
Route::post('/form',[FormController::class,'formSubmit'])->name('stepform.submit');

//Accessors and Mutators
Route::get('/ajout-dev',[DeveloperController::class,'addDeveloper'])->name('ajout-dev');
Route::get('/dev',[DeveloperController::class,'getDeveloper'])->name('dev');


