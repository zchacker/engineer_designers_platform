<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

// Route::get('/', function () {
//     return view('welcome');
// });

App::setLocale('ar');

Route::get('/', function () {
    return view('guest.home');
})->name('home');

// Route::get('/', [\App\Http\Controllers\RegisterController::class, 'register'])->name('home');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login/action', [\App\Http\Controllers\AuthController::class, 'login_action'])->name('login.action');

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register.user');
Route::post('/register/action', [\App\Http\Controllers\RegisterController::class, 'register_action'])->name('register.user.action');




Route::group(['middleware' => ['auth:client'], 'prefix' => 'client'], function () {

    // engineers data
    Route::get('/engineers/list', [\App\Http\Controllers\Clients\EngineersController::class, 'list_engineers'])->name('client.engineers.list');
    Route::get('/engineers/details/{engineer_id}', [\App\Http\Controllers\Clients\EngineersController::class, 'details'])->name('client.engineers.details');
    Route::get('/engineers/work/details/{engineer_id}/{work_id}', [\App\Http\Controllers\Clients\EngineersController::class, 'work_details'])->name('client.engineers.work.details');

    // orders data
    Route::get('/orders/list', [\App\Http\Controllers\Clients\OrdersController::class, 'list'])->name('client.order.list');
    Route::get('/orders/create/{engineer_id}', [\App\Http\Controllers\Clients\OrdersController::class, 'create'])->name('client.order.create');
    Route::post('/orders/create/{engineer_id}/action', [\App\Http\Controllers\Clients\OrdersController::class, 'create_action'])->name('client.order.create.action');

    Route::get('/orders/details/{order_id}', [\App\Http\Controllers\Clients\OrdersController::class, 'details'])->name('client.order.details');
    Route::post('/orders/add_comment/{order_id}', [\App\Http\Controllers\Clients\OrdersController::class, 'add_comment'])->name('client.order.add_comment');

    Route::delete('/orders/destroy/{order}', [\App\Http\Controllers\Clients\OrdersController::class, 'destroy'])->name('client.order.destroy');

    // contract
    Route::get('/contract/list', [\App\Http\Controllers\Clients\ContractsController::class, 'list'])->name('client.contract.list');
    Route::get('/contract/details/{contract_id}', [\App\Http\Controllers\Clients\ContractsController::class, 'details'])->name('client.contract.details');
    Route::post('/contract/update/{contract_id}/action', [\App\Http\Controllers\Clients\ContractsController::class, 'update_action'])->name('client.contract.update.action');
   


    // update settings
    Route::get('/settings', [\App\Http\Controllers\Shared\SettingsController::class, 'client_update_data'])->name('client.settings');
    Route::post('/settings/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_data_action'])->name('client.settings.action');

    // update password
    Route::get('/password', [\App\Http\Controllers\Shared\SettingsController::class, 'client_update_passwords'])->name('client.password');
    Route::post('/password/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_passwords_action'])->name('client.password.action');



    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'client_logout'])->name('client.logout');
});


Route::group(['middleware' => ['auth:engineer'], 'prefix' => 'engineer'], function () {

    // orders
    Route::get('/orders/list', [\App\Http\Controllers\Engineer\OrdersController::class, 'orders_list'])->name('engineer.orders.list');
    Route::get('/orders/details/{order_id}', [\App\Http\Controllers\Engineer\OrdersController::class, 'details'])->name('engineer.orders.details');
    Route::post('/orders/add_comment/{order_id}', [\App\Http\Controllers\Engineer\OrdersController::class, 'add_comment'])->name('engineer.order.add_comment');
    Route::post('/orders/update_status/{order_id}', [\App\Http\Controllers\Engineer\OrdersController::class, 'update_status'])->name('engineer.order.status.update');

    // works
    Route::get('/work/list', [\App\Http\Controllers\Engineer\WorksController::class, 'list'])->name('engineer.work.list');
    Route::get('/work/create', [\App\Http\Controllers\Engineer\WorksController::class, 'create'])->name('engineer.work.create');
    Route::post('/work/create/action', [\App\Http\Controllers\Engineer\WorksController::class, 'create_action'])->name('engineer.work.create.action');
    Route::get('/work/edit/{work_id}', [\App\Http\Controllers\Engineer\WorksController::class, 'edit'])->name('engineer.work.edit');
    Route::post('/work/edit/{work_id}/action', [\App\Http\Controllers\Engineer\WorksController::class, 'edit_action'])->name('engineer.work.edit.action');
    Route::delete('/work/delete/{work_id}', [\App\Http\Controllers\Engineer\WorksController::class, 'delete'])->name('engineer.work.delete');

    // contract
    Route::get('/contract/list', [\App\Http\Controllers\Engineer\ContractsController::class, 'list'])->name('engineer.contract.list');
    Route::get('/contract/details/{contract_id}', [\App\Http\Controllers\Engineer\ContractsController::class, 'details'])->name('engineer.contract.details');
    Route::get('/contract/create/{order_id}', [\App\Http\Controllers\Engineer\ContractsController::class, 'create'])->name('engineer.contract.create');
    Route::post('/contract/create/{order_id}/action', [\App\Http\Controllers\Engineer\ContractsController::class, 'create_action'])->name('engineer.contract.create.action');
    Route::delete('/contract/cancel/{contract}', [\App\Http\Controllers\Engineer\ContractsController::class, 'update_status'])->name('engineer.contract.status.update');
    
    // messages
    Route::post('/conversation/create', [\App\Http\Controllers\Engineer\ConversationController::class, 'initiateConversation'])->name('engineer.conversation.create');
    Route::get('/conversation/list', [\App\Http\Controllers\Engineer\ConversationController::class, 'listConversations'])->name('engineer.conversation.list');
    Route::get('/conversation/view/{conversationId}', [\App\Http\Controllers\Engineer\ConversationController::class, 'viewConversation'])->name('engineer.conversation.view');
    Route::post('/conversation/message/create/{conversationId}', [\App\Http\Controllers\Engineer\ConversationController::class, 'sendMessage'])->name('engineer.conversation.message.send');


    // update settings
    Route::get('/settings', [\App\Http\Controllers\Shared\SettingsController::class, 'update_data'])->name('engineer.settings');
    Route::post('/settings/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_data_action'])->name('engineer.settings.action');

    // update password
    Route::get('/password', [\App\Http\Controllers\Shared\SettingsController::class, 'update_passwords'])->name('engineer.password');
    Route::post('/password/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_passwords_action'])->name('engineer.password.action');


    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'engineer_logout'])->name('engineer.logout');
});


Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function () {

    Route::get('/engineers/list', [\App\Http\Controllers\Admin\EngineersController::class, 'list'])->name('admin.engineers.list');
    Route::get('/engineers/create', [\App\Http\Controllers\Admin\EngineersController::class, 'create'])->name('admin.engineers.create');
    Route::post('/engineers/create/action', [\App\Http\Controllers\Admin\EngineersController::class, 'create_action'])->name('admin.engineers.create.action');

    Route::get('/clients/list', [\App\Http\Controllers\Admin\ClientsController::class, 'list'])->name('admin.clients.list');


    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'admin_logout'])->name('admin.logout');
});
