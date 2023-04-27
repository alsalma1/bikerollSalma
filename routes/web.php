<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\principalPageController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\aseguradoraController;
use App\Http\Controllers\sponsorController;
use App\Http\Controllers\corredorController;
use App\Http\Controllers\carreraController;
use App\Http\Controllers\pictureController;
use App\Http\Controllers\inscripcionController;
use App\Http\Controllers\patronizeController;
use App\Http\Controllers\pdfController;
use App\Models\Inscription;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


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

Route::get('/', principalPageController::class , 'show');

Route::get('paginaPrincipal', [principalPageController::class , 'showPrincipalPage'])->name('paginaPrincipal')->middleware('admin');
Route::get('paginaPrincipalAdmin', [principalPageController::class , 'showPrincipalPage'])->name('paginaPrincipalAdmin')->middleware('admin');

Route::get('altaCorredor/{id}', [corredorController::class , 'showForm']);
Route::post('altaCorredor/{id}', [corredorController::class , 'showForm']);

Route::get('/formAdmin', [adminController::class , 'show'])->name('formAdmin');
Route::post('/formAdmin', [adminController::class , 'create']);

Route::get('logout', [adminController::class , 'logout']);

//Aseguradores
Route::get('anyadirAseguradora', [aseguradoraController::class , 'create'])->middleware('admin');
Route::post('anyadirAseguradora', [aseguradoraController::class , 'create']);

Route::get('mostrarTodosAs', [aseguradoraController::class , 'index'])->name('mostrarTodosAs')->middleware('admin');
Route::post('mostrarTodosAs', [aseguradoraController::class , 'index'])->name('mostrarTodosAs')->middleware('admin');

Route::get('editarAseguradora/{id}' , [aseguradoraController::class , 'edit'])->middleware('admin');
Route::post('editarAseguradora/{id}' , [aseguradoraController::class , 'edit']);
Route::get('activarAseguradora/{id}' , [aseguradoraController::class , 'activate'])->middleware('admin');

//Sponsors
Route::get('anyadirSponsor' , [sponsorController::class , 'create'])->middleware('admin');
Route::post('anyadirSponsor' , [sponsorController::class , 'create']);

Route::get('mostrarSponsors', [sponsorController::class , 'index'])->name('mostrarSponsors')->middleware('admin');
Route::post('mostrarSponsors', [sponsorController::class , 'index'])->name('mostrarSponsors')->middleware('admin');

Route::get('editarSponsor/{id}' , [sponsorController::class , 'edit'])->middleware('admin');
Route::post('editarSponsor/{id}' , [sponsorController::class , 'edit']);
Route::get('activarSponsor/{id}' , [sponsorController::class , 'activate'])->middleware('admin');
Route::get('editarLogo/{id}' , [sponsorController::class , 'editLogo'])->middleware('admin');
Route::post('editarLogo/{id}' , [sponsorController::class , 'editLogo']);

//seleccionar las carreras
Route::post('chooseRaces/{id}' , [patronizeController::class , 'showRaces']);
Route::get('chooseRaces/{id}' , [patronizeController::class , 'showRaces']);

//Carrera
Route::get('anyadirCarrera', [carreraController::class , 'showAddRace'])->middleware('admin');
Route::get('eliminarCarrera/{id_race}/{id_sponsor}', [patronizeController::class , 'deleteRace']);

Route::post('anyadirCarrera', [carreraController::class , 'addRace']);

//cambiar estado carrera
Route::get('editarCarrera', [carreraController::class , 'showEditRace'])->name('editarCarrera')->middleware('admin');
Route::post('editarCarrera', [carreraController::class , 'showEditRace'])->name('editarCarrera')->middleware('admin');
Route::get('estadoCarrera/{id}', [carreraController::class , 'changeState'])->middleware('admin');

//editar datos carrera
Route::get('datosCarrera/{id}', [carreraController::class , 'editRace'])->middleware('admin');
Route::post('datosCarrera/{id}', [carreraController::class , 'editRace']);

//editar imagen carrera
Route::get('imagenCarrera/{id}', [carreraController::class , 'editImage'])->middleware('admin');
Route::post('imagenCarrera/{id}', [carreraController::class , 'editImage']);

//editar cartel de promoción carrera
Route::get('cartelCarrera/{id}', [carreraController::class , 'editProm'])->middleware('admin');
Route::post('cartelCarrera/{id}', [carreraController::class , 'editProm']);

//subir fotos
Route::get('subirFotos/{id}', [pictureController::class , 'uploadF'])->middleware('admin');
Route::post('subirFotos/{id}', [pictureController::class , 'uploadF']);

//Subir fotos Salma

//ver fotos
Route::get('verFotos/{id}', [pictureController::class , 'viewF']);

//Ver corredores apuntados
Route::get('verCorredores' , [carreraController::class , 'showAllRaces'])->middleware('admin');
Route::post('verCorredores' , [carreraController::class , 'showAllRaces']);

Route::get('runnersRace/{id}' , [inscripcionController::class , 'showRunners'])->middleware('admin');
Route::post('runnersRace/{id}' , [inscripcionController::class , 'showRunners']);

Route::get('infoRace/{id}' , [carreraController::class , 'showInfoRace'])->name('inforace');

//Sponsors-Carrera
Route::get('sponsorCarrera' , [patronizeController::class , 'showSponsors'])->middleware('admin');
Route::get('carreras-sponsor/{id}', [patronizeController::class , 'carreraSponsor'])->name('carreraSponsor')->middleware('admin');
Route::post('carreras-sponsor/{id}', [patronizeController::class , 'carreraSponsor'])->name('carreraSponsor')->middleware('admin');

//Mostrar informacion carrera
Route::get('fotosRace/{id}', [pictureController::class , 'viewPage']);

//inscripcion
Route::get('inscribir', [inscripcionController::class, 'inscribir'])->name('ins');
Route::post('inscribir', [inscripcionController::class, 'inscribir'])->name('ins');

//escoger aseguradora carrera
Route::get('aseguradoraC/{id}', [aseguradoraController::class, 'precioCarrera'])->middleware('admin');
Route::post('aseguradoraC/{id}', [aseguradoraController::class, 'precioCarrera']);

//qrcarreras
Route::get('generarQr/{id}', [inscripcionController::class , 'generarQr']);
//Mostrar datos qr
Route::get('datosQr/{id_runner}/{id_race}', [inscripcionController::class , 'mostrarDatosQr'])->name('datosQr');

//Elegir carreras de sponsor
Route::get('selectRaces/{id}' , [patronizeController::class , 'showRaces'])->middleware('admin');

//Paypal
Route::get('/paypal/pay', 'App\Http\Controllers\PaymentController@payWithPayPal')->name('paypal');
Route::get('/paypal/status', 'App\Http\Controllers\PaymentController@payPalStatus')->name('status');
Route::get('/paypal/results', 'App\Http\Controllers\PaymentController@payPalView')->name('results');

//Factura corredor
Route::get('facturaCorredor/{runner}/{race}' ,[inscripcionController::class , 'facturaCorredor'])->name('facturaCorredor');

//descargar pdf
Route::get('download-pdf/{id}', [patronizeController::class, 'downloadPdf'])->name('download-pdf');

//ver fotos gente
Route::get('fotosPublicas/{id}' ,[pictureController::class , 'publica']);

//pagina Clasificaciones
Route::get('clasificaciones', [carreraController::class, 'clasif']);
Route::get('clasificacionSexo/{id}', [carreraController::class, 'clasificacionSexo'])->name('clasi-sexo');
Route::get('clasificaciones/{id}', [carreraController::class, 'clasificaciones'])->name('clasi');

//escoger aseguradora desde cero
Route::post('estadoCarrera/{id}', [aseguradoraController::class, 'precioCarrera']);

//Route::post('/upload-image', [sponsorController::class, 'uploadImage'])->name('uploadImage');
//Pdf clasificaciones
Route::get('pdfClasi', [carreraController::class, 'imprimirPdfClasificaciones']);


Route::get('imprimirDorsales/{id}' , [carreraController::class, 'printDorsales']);
?>