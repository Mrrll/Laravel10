<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Http\Requests\EmailVerificationRequest;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use App\Mail\ContactanosMailable;
// use Illuminate\Support\Facades\Mail;

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

// Rutas web

Route::get('/', HomeController::class)->name('home');

Route::view('nosotros', 'nosotros')->name('nosotros');

Route::resource('contactanos', ContactanosController::class);

// Rutas para prueba middleware

Route::get('prueba', function () {
    return 'Has accedido correctamente a esta ruta';
})->middleware('age');

Route::get('no-autorizado', function () {
    return 'Usted no es mayor de edad';
});

// Rutas de Autentificación

Route::resource('register', RegisterController::class);

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'Authenticate')->name('login.authenticate');
});

// Rutas Protegidas

Route::group(
    ['middleware' => ['auth', 'auth.session', 'verified']],
    function () {
        Route::get('logout', [LoginController::class, 'logout'])->name(
            'logout'
        );
        Route::resource('cursos', CursoController::class);
    }
);

// Rutas Email

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verification', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('cursos');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    try {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', [
            'type' => 'success',
            'title' => 'Éxito !',
            'message' =>
                'Enlace de verificación a sido enviado correctamente!!! Revise su bandeja de entrada.',
        ]);
    } catch (\Throwable $th) {
        return back()->with('message', [
            'type' => 'danger',
            'title' => 'Error !',
            'message' =>
                'Ha ocurrido un error revise los datos y vuelva a intentarlo si no se soluciona contacte con su administrador.',
        ]);
    }
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Rutas Reset Password

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? back()->with([
            'status' => __($status),
            'message' => [
            'type' => 'success',
            'title' => 'Éxito !'
            ]
            ])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (
    Request $request,
    string $token
) {
    return view('auth.reset-password', [
        'token' => $token,
        'email' => (string) $request->query('email'),
    ]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user
                ->forceFill([
                    'password' => Hash::make($password),
                ])
                ->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()
            ->route('login')
            ->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
