<?php

use App\Http\Controllers\Administrador\Home\homeController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\resetPassword;
use App\Http\Controllers\Auth\forgotPassword;
use App\Http\Controllers\Desarrollo\Usuarios\usersHimalayaController;
use App\Http\Controllers\generalController;
use App\Http\Controllers\Desarrollo\Herramientas\Areas\areasController;
use App\Http\Controllers\Desarrollo\Herramientas\Roles\rolesController;
use App\Http\Controllers\fakeDataController;
use App\Http\Controllers\Desarrollo\Clientes\clientesController;
use App\Http\Controllers\desarrollo\Herramientas\Servicios\serviciosController;
use App\Http\Middleware\DisableCache;
use App\Http\Middleware\Guest;
use App\Http\Middleware\RememberMe;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Route::middleware(Guest::class, DisableCache::class)->group(function () {

    Route::get('/', [loginController::class, 'showLogin'])->name('login');
    Route::get('/login', [loginController::class, 'showLogin'])->name('Iniciar sesión');

    Route::post('/credentialsUser', [loginController::class, 'login'])->name('login.user.credentials');
    Route::get('/ResetPassword', [resetPassword::class, 'showResetPassword'])->name('Restablecer contraseña');
    Route::post('/storeRestorePassword', [resetPassword::class, 'storeResetPassword'])->name('store.reset.password');
    Route::get('/forgotPassword', [forgotPassword::class, 'index'])->name('¿Olvidó su contraseña?');
    Route::post('/storeForgotPassword', [forgotPassword::class, 'store'])->name('store.forgot.password');
});


Route::post('logout', function (Request $request) {

    Auth::logout();

    Session::invalidate();

    Session::regenerateToken();

    return redirect('/')->with('status', 'Sesión cerrada de forma segura.');

})->name('logout');


Route::middleware(['auth', DisableCache::class, RememberMe::class])->prefix('superadmin')->group(function () {


        Route::get('/home', [generalController::class, 'homeDevelopment'])->name('Página principal');
        Route::get('/profileDevelopment/{id}', [generalController::class, 'showProfileUser'])->name('Perfil');
        Route::put('/update-image', [generalController::class, 'updateImage'])->name('image.update');


    // Controladores de areas Superadministrador

    Route::controller(areasController::class)->group(function(){
        Route::get('/Areas','index')->name('Áreas');
        Route::get('/apiAreas','apiAreas')->name('areas.date');
        Route::get('/createArea','create')->name('Crear área');
        Route::post('/storeArea','store')->name('store.area');
        Route::get('/editarArea/{id}','edit')->name('Editar Área');
        Route::put('/actualizarArea/{id}','update')->name('actualizar.area');
    });

    Route::controller(serviciosController::class)->group(function(){
        Route::get('/servicios','index')->name('Servicios');
        Route::get('/apiServicios','apiServicios')->name('api.servicios');
        Route::get('/crearServicio','create')->name('Crear servicio');
        Route::post('/storeServicios','store')->name('store.servicios');
        Route::get('/editarServicio/{id}','edit')->name('Editar Servicio');
        Route::put('/actualizarServicio/{id}','update')->name('actualizar.servicio');

    });

    // Controladores de clientes SuperAdministrador

        Route::controller(clientesController::class)->group( function(){
            Route::get('/Clientes','index')->name('Clientes');
            Route::get('/apiClientes','apiClientes')->name('api.clientes');
            Route::get('/crearCliente','create')->name('Crear.cliente');
            Route::post('/crearCliente','store')->name('store.cliente');
            Route::get('/verCliente/{id}','show')->name('Tableros');
            Route::get('/obtener-servicios-relacionados/{id}','obtenerServiciosRelacionados')->name('obtener.servicios.relacionados');
        });

    // Controladores de usuarios SuperAdministrador

        Route::controller(usersHimalayaController::class)->group(function(){

            Route::get('/usuariosEquipo','index')->name('Usuarios');
            Route::get('/createUser','create')->name('Registrar nuevo usuario');
            Route::get('/editUser/{id}','edit')->name('Actualizar detalles del usuario');
            Route::post('/store.create.user','store')->name('store.crete.user');
            Route::put('/updateUser/{id}')->name('edit.update.user');
            Route::get('/profileDirectory/{id}','show')->name('Perfil de usuario');

        });

    // Controladores de Roles SuperAdministrador

        Route::controller(rolesController::class)->group(function(){

            Route::get('/roles', 'index')->name('Roles');
            Route::get('/apiRoles', 'apiRoles')->name('api.roles');
            Route::get('/createRoles','create')->name('Establecer un rol');
            Route::post('/storeRoles', 'store')->name('Roles.store');
            Route::get('/editRoles/{id}',  'roles')->name('Actualizar rol');
            Route::put('/updateRoles/{id}',  'update')->name('update.roles');
            Route::put('/obtener-servicios-relacionados/{id}',  'obtenerServiciosRelacionados')->name('get.fase.id');

        });


});

Route::middleware([DisableCache::class, 'auth'])->prefix('administrador')->group(function () {

    Route::get('/home',[homeController::class,'index'])->name('Home Administrador');
    Route::get('/',[homeController::class,'index'])->name('Home Administrador');


});


Route::middleware(['auth', DisableCache::class])->prefix('colaborador')->group(function () {

    Route::get('home',[homeController::class,'index'])->name('Home Colaborador');
    Route::get('/profileAdmin/{id}', [generalController::class, 'showProfileUser'])->name('Perfil');

});



//TESTING

Route::get('/test-session',function(){
    return dd(session()->all());
});


Route::get('testEmail', function () {
    return view('Mails.forgotPassword');
})->name('testEmail');

Route::get('/interface-restore',function(){
    return view('login.restorePassword');
});

//ERRORS VIEWS

Route::get('400', function () {
    return view('errors.400');
})->name('400');

Route::get('404', function () {
    return view('errors.404');
})->name('404');

Route::get('403', function () {
    return view('errors.403');
})->name('403');

Route::get('419', function () {
    return view('errors.419');
})->name('419');

Route::get('500', function () {
    return view('errors.500');
})->name('500');

Route::get('503', function () {
    return view('errors.503');
})->name('503');


//View Faker

Route::get('setFakeUsuarios',[fakeDataController::class,'usuarios']);
Route::get('setFakeTableros',[fakeDataController::class,'tableros']);
Route::get('setFakeRedes',[fakeDataController::class,'redes_sociales']);
Route::get('setFakeSolicitudes',[fakeDataController::class,'solicitudes']);
Route::get('setFakePerfiles',[fakeDataController::class,'img_perfiles']);
Route::get('setFakeClientes',[fakeDataController::class,'clientes']);
