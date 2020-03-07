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
Auth::routes(['verify' => true]);
Route::get('invitation/{invitation}')->name('invitation')->uses([\Frisk\Http\Controllers\Auth\RegisterController::class, 'invitation']);
Route::post('register/{invitation}')->name('frisk-register')->uses([\Frisk\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/account')->uses(\Frisk\Http\Controllers\User\AccountViewController::class)->middleware('auth')->name('account_view');
Route::post('/account')->uses(\Frisk\Http\Controllers\User\AccountUpdateController::class)->middleware('auth')->name('account_update');


//home
Route::get('/')->uses(\Frisk\Http\Controllers\HomeController::class)->name('home');
Route::get('/api')->uses(\Frisk\Http\Controllers\Api\ApiStatusController::class)->name('api_status');


//projects
Route::get('/projects')->uses(\Frisk\Http\Controllers\Project\ProjectListController::class)->middleware('auth')->name('projects_list');
Route::get('/projects/create')->uses([\Frisk\Http\Controllers\Project\ProjectCreateController::class, 'show'])->name('project_create');
Route::post('/projects/create')->uses([\Frisk\Http\Controllers\Project\ProjectCreateController::class, 'create']);
Route::delete('/projects/delete/{project}')->uses(\Frisk\Http\Controllers\Project\ProjectDeleteController::class)->name('project_delete');
Route::get('/{project}')->uses(\Frisk\Http\Controllers\Project\ProjectViewController::class)->middleware('auth')->where('project', '^(?!api$)([a-zA-Z0-9-_]+)')->name('project_view');
Route::post('/{project}')->uses(\Frisk\Http\Controllers\Project\ProjectViewController::class)->where('project', '^(?!api$)([a-zA-Z0-9-_]+)')->middleware('auth');
Route::get('/{project}/settings/{tab?}')->uses(\Frisk\Http\Controllers\Project\ProjectSettingsController::class)->middleware('auth')->name('project_settings');
Route::post('/{project}/settings')->uses(\Frisk\Http\Controllers\Project\ProjectSettingsUpdateController::class)->middleware('auth')->name('update_project_settings');


//shares
Route::get('/share/{share}/{key?}')->uses(\Frisk\Http\Controllers\Share\ShareViewController::class)->name('share_view');
Route::delete('/share/{share}/{key}')->uses(\Frisk\Http\Controllers\Share\ShareDeleteController::class)->name('share_delete');
Route::post('/{project}/{issue}/{session}/share')->uses(\Frisk\Http\Controllers\Share\ShareCreateController::class)->name('share_create')->middleware('auth');


//issue
Route::get('/{project}/{issue}/{session?}')->uses(\Frisk\Http\Controllers\Issue\IssueViewController::class)->middleware('auth')->name('issue_view')->where('session', '[0-9]+');
Route::post('/{project}/{issue}/{session?}')->uses(\Frisk\Http\Controllers\Issue\IssueViewController::class)->middleware('auth')->where('session', '[0-9]+');
Route::post('/{project}/update/issues')->uses(\Frisk\Http\Controllers\Issue\IssueStatusUpdateController::class)->middleware('auth')->name('issue_status_update');
Route::get('/{project}/update/issues')->uses(\Frisk\Http\Controllers\Issue\IssueStatusUpdateController::class)->middleware('auth')->name('quick_issue_status_update');


//sessions
Route::get('/{project}/{issue}/sessions')->uses(\Frisk\Http\Controllers\Issue\SessionsListController::class)->middleware('auth')->name('sessions_list');
Route::post('/{project}/{issue}/sessions')->uses(\Frisk\Http\Controllers\Issue\SessionsListController::class)->middleware('auth');
