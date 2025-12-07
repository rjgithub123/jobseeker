<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\JobSeekerAuthController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/test-mail', function () {
    Mail::raw('Test email', function ($message) {
        $message->to('josephson.1991@gmail.com')
                ->subject('Test');
    });
    return 'Mail sent';
});


Route::prefix('jobseeker')->group(function () {

  //  Route::resource('/register', JobSeekerController::class);

  Route::get('/register',[JobSeekerController::class,'showRegistrationForm'])
        ->name('jobseeker.register');

  Route::post('/register',[JobSeekerController::class,'store'])
        ->name('jobseeker.store');

    Route::get('/login',[JobSeekerAuthController::class,'showLoginForm'])
        ->name('jobseeker.login');

    Route::post('/login',[JobSeekerAuthController::class,'login']);



     Route::middleware('auth:web')->group(function(){

        Route::get('/dashboard',[JobSeekerController::class,'dashboard'])
            ->name('jobseeker.dashboard');

        Route::get('/profile/edit',
            [JobSeekerController::class,'editProfile'])
            ->name('jobseeker.editProfile');

        Route::post('/profile/update',
            [JobSeekerController::class,'updateProfile'])
            ->name('jobseeker.profile.update');

        Route::get('/change-password',
            [JobSeekerController::class,'showChangePasswordForm'])
            ->name('jobseeker.change.password.form');

        Route::post('/change-password',
            [JobSeekerController::class,'changePassword'])
            ->name('jobseeker.change.password');

        Route::post('/logout',[JobSeekerAuthController::class,'logout'])
            ->name('jobseeker.logout');
    });

});

Route::prefix('admin')->group(function () {

    Route::get('/login',[AdminAuthController::class,'showLoginForm'])
        ->name('admin.login');

    Route::post('/login',[AdminAuthController::class,'login']);




    Route::middleware('auth:admin')->group(function(){

        Route::get('/dashboard',[AdminController::class,'dashboard'])
            ->name('admin.dashboard');

        Route::get('/jobseekers',
            [JobSeekerController::class,'index'])
            ->name('admin.jobseekers');

        Route::get('/jobseeker/{id}',
            [JobSeekerController::class,'show'])
            ->name('admin.jobseeker.view');

        Route::delete('/jobseeker/{id}',
            [JobSeekerController::class,'destroy'])
            ->name('admin.jobseeker.destroy');

        Route::post('/logout',
            [AdminAuthController::class,'logout'])
            ->name('admin.logout');

    });

});
