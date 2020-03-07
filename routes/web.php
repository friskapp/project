<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


//auth + user
Route::get('login', [\Frisk\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\Frisk\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [\Frisk\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::get('password/reset', [\Frisk\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [\Frisk\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [\Frisk\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [\Frisk\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/confirm', [\Frisk\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [\Frisk\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);


Route::get('email/verify', [\Frisk\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [\Frisk\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [\Frisk\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');


Route::get('invitation/{invitation}', [\Frisk\Http\Controllers\Auth\RegisterController::class, 'invitation'])->name('invitation');
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register/{invitation}', [\Frisk\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('/account', \Frisk\Http\Controllers\User\AccountViewController::class)->middleware('auth')->name('account_view');
Route::post('/account', \Frisk\Http\Controllers\User\AccountUpdateController::class)->middleware('auth')->name('account_update');


//home
Route::get('/', \Frisk\Http\Controllers\HomeController::class)->name('home');
Route::get('/api', \Frisk\Http\Controllers\Api\ApiStatusController::class)->name('api_status');


//projects
Route::get('/projects', \Frisk\Http\Controllers\Project\ProjectListController::class)->middleware('auth')->name('projects_list');
Route::get('/projects/create', [\Frisk\Http\Controllers\Project\ProjectCreateController::class, 'show'])->name('project_create');
Route::post('/projects/create', [\Frisk\Http\Controllers\Project\ProjectCreateController::class, 'create']);
Route::delete('/projects/delete/{project}', \Frisk\Http\Controllers\Project\ProjectDeleteController::class)->name('project_delete');
Route::get('/{project}', \Frisk\Http\Controllers\Project\ProjectViewController::class)->middleware('auth')->where('project', '^(?!api$)([a-zA-Z0-9-_]+)')->name('project_view');
Route::post('/{project}', \Frisk\Http\Controllers\Project\ProjectViewController::class)->where('project', '^(?!api$)([a-zA-Z0-9-_]+)')->middleware('auth');
Route::get('/{project}/settings/{tab?}', \Frisk\Http\Controllers\Project\ProjectSettingsController::class)->middleware('auth')->name('project_settings');
Route::post('/{project}/settings', \Frisk\Http\Controllers\Project\ProjectSettingsUpdateController::class)->middleware('auth')->name('update_project_settings');


//shares
Route::get('/share/{share}/{key?}', \Frisk\Http\Controllers\Share\ShareViewController::class)->name('share_view');
Route::delete('/share/{share}/{key}', \Frisk\Http\Controllers\Share\ShareDeleteController::class)->name('share_delete');
Route::post('/{project}/{issue}/{session}/share', \Frisk\Http\Controllers\Share\ShareCreateController::class)->name('share_create')->middleware('auth');


//issue
Route::get('/{project}/{issue}/{session?}', \Frisk\Http\Controllers\Issue\IssueViewController::class)->middleware('auth')->name('issue_view')->where('session', '[0-9]+');
Route::post('/{project}/{issue}/{session?}', \Frisk\Http\Controllers\Issue\IssueViewController::class)->middleware('auth')->where('session', '[0-9]+');
Route::post('/{project}/update/issues', \Frisk\Http\Controllers\Issue\IssueStatusUpdateController::class)->middleware('auth')->name('issue_status_update');
Route::get('/{project}/update/issues', \Frisk\Http\Controllers\Issue\IssueStatusUpdateController::class)->middleware('auth')->name('quick_issue_status_update');


//sessions
Route::get('/{project}/{issue}/sessions', \Frisk\Http\Controllers\Issue\SessionsListController::class)->middleware('auth')->name('sessions_list');
Route::post('/{project}/{issue}/sessions', \Frisk\Http\Controllers\Issue\SessionsListController::class)->middleware('auth');
