<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDonacionesController;
use App\Http\Controllers\Admin\AdminEstadisticasController;
use App\Http\Controllers\Admin\AdminInventarioController;
use App\Http\Controllers\Admin\AdminPaquetesController;
use App\Http\Controllers\Admin\AdminProyectosController;
use App\Http\Controllers\Admin\AdminTestimoniosController;
use App\Http\Controllers\Admin\AdminVentasController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DonacionesController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\TestimoniosController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthUser;
use App\Http\Middleware\NotLogin;
use Illuminate\Routing\ResolvesRouteDependencies;
use Illuminate\Support\Facades\Route;

//Pagina principal
Route::view('/', 'index')->name('home');
Route::view('/centros de acopio', 'centros_acopio')->name('centros');
Route::view('/estadisticas', 'estadisticas')->name('estadisticas');
Route::get('/galeria de imagenes', [GaleriaController::class, 'index'])->name('galeria');
Route::get('/proyectos', [ProyectosController::class, 'index'])->name('proyectos');
Route::get('/testimonios', [TestimoniosController::class, 'index'])->name('testimonios');


Route::middleware([NotLogin::class])->group(function () {
    //Inicio de sesion
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.user');

    //Crear cuenta
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.user');

    //Con google
    Route::get('auth/google', [GoogleController::class, 'redirectToGoole'])->name('auth.google');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');

    //Actualizar contraseña
    Route::view('password/reset', 'auth.reset')->name('reset');
    Route::post('password/reset', [ResetPasswordController::class, 'sendMail'])->name('reset.send');
    Route::get('/password/reset/{email}/{token}', [ResetPasswordController::class, 'index'])->name('password');
    Route::post('/password/reset/update', [ResetPasswordController::class, 'updatePassword'])->name('reset.password');
});

//Cerrer sesion
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware(AuthUser::class);

//Donar dispositivos
Route::get('/donar dispositivo', [DonacionesController::class, 'index'])->name('donacion');
Route::middleware([AuthUser::class])->group(function () {
    Route::post('/donar dispositivo', [DonacionesController::class, 'donacion'])->name('donacion.user');
    Route::get('/donaciones/historial', [DonacionesController::class, 'historial'])->name('donacion.historial');
    Route::put('/donaciones/historial', [DonacionesController::class, 'cancelar'])->name('donacion.cancelar');
});


//Administradores
Route::prefix('/admin')->middleware([AuthAdmin::class])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.inicio');

    //Inventario
    Route::get('/dispositivos', [AdminInventarioController::class, 'index'])->name('admin.inventario');
    Route::put('/dispositivos', [AdminInventarioController::class, 'update'])->name('admin.inventario.put');
    Route::delete('/dispositivos', [AdminInventarioController::class, 'delete'])->name('admin.inventario.delete');

    //Paquetes
    Route::get('/paquetes', [AdminPaquetesController::class, 'index'])->name('admin.paquetes');
    Route::post('/paquetes', [AdminPaquetesController::class, 'create'])->name('admin.paquetes.post');
    Route::put('/paquetes', [AdminPaquetesController::class, 'update'])->name('admin.paquetes.put');
    Route::delete('/paquetes', [AdminPaquetesController::class, 'delete'])->name('admin.paquetes.delete');

    //Donaciones
    Route::get('/donaciones', [AdminDonacionesController::class, 'index'])->name('admin.donaciones');
    Route::put('/donaciones', [AdminDonacionesController::class, 'update'])->name('admin.donaciones.put');

    Route::get('/estadisticas', [AdminEstadisticasController::class, 'index'])->name('admin.estadisticas');

    //Ventas
    Route::get('/ventas', [AdminVentasController::class, 'index'])->name('admin.ventas');

    //Proyectos
    Route::get('/proyectos', [AdminProyectosController::class, 'index'])->name('admin.proyectos');
    Route::post('/proyectos', [AdminProyectosController::class, 'create'])->name('admin.proyectos.post');
    Route::put('/proyectos', [AdminProyectosController::class, 'put'])->name('admin.proyectos.put');
    Route::delete('/proyectos', [AdminProyectosController::class, 'delete'])->name('admin.proyectos.delete');

    //Testimonios
    Route::get('/testimonios', [AdminTestimoniosController::class, 'index'])->name('admin.testimonios');
    Route::post('/testimonios', [AdminTestimoniosController::class, 'create'])->name('admin.testimonios.post');
    Route::delete('/testimonios', [AdminTestimoniosController::class, 'delete'])->name('admin.testimonios.delete');
});
