<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Notice\NoticeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FakeNewsDetectionController;
use App\Http\Controllers\Register\RegisterFormController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::middleware('role:admin')->group(function () {
    Route::get('/email/welcome', [RegisterFormController::class, 'create']);
    Route::get('/listar-cadastros', [RegisterFormController::class, 'index'])->name('listar.cadastros');
    Route::get('/listar/download_arquivos/{user}', [RegisterFormController::class, 'downloadFiles'])
        ->name('baixar_dados');
//    Route::get('/listar/visualizar/{id}', [RegisterFormController::class, ''])->name('visualizar.dados');
    Route::get('/noticias/criar-noticia', [NoticeController::class, 'create'])->name('criar.noticia');
    Route::get('/noticias/noticia/{id}/editar', [NoticeController::class, 'edit'])
        ->name('atualizar.noticia');
    Route::post('/noticias/criar-noticia', [NoticeController::class, 'store'])->name('criar.noticia.store');
    Route::patch('/listar-cadastros/aprovar/{id}', [RegisterFormController::class, 'approveUserRegister'])
        ->name('deferir.cadastro');
    Route::patch('/listar-cadastros/indeferir/{id}', [RegisterFormController::class, 'rejectUserRegister'])
        ->name('indeferir.cadastro');
    Route::patch('/noticias/noticia/{id}/editar', [NoticeController::class, 'update'])
        ->name('atualizar.noticia.store');
    Route::delete('/noticias/noticia/{id}', [NoticeController::class, 'destroy'])->name('remover.noticia');

    Route::get('/fake-news-detection/fnd/list', [FakeNewsDetectionController::class, 'index'])->name('fake-news-detection.list');
    Route::get('/fake-news-detection/fnd', [FakeNewsDetectionController::class, 'create'])->name('fake-news-detection');
    Route::post('/fake-news-detection/fnd/create', [FakeNewsDetectionController::class, 'store'])->name('fake-news-detection.store');
    Route::get('/fake-news-detection/{id}/edit', [FakeNewsDetectionController::class, 'edit'])->name('fake-news-detection.edit');
    Route::put('/fake-news-detection/{id}', [FakeNewsDetectionController::class, 'update'])->name('fake-news-detection.update');
    Route::delete('/fake-news-detection/{id}', [FakeNewsDetectionController::class, 'destroy'])->name('fake-news-detection.destroy');
});
