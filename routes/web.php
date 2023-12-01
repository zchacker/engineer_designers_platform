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

Route::get('/test', function () {
    return view('errors.404');
})->name('test');

// Route::get('/', [\App\Http\Controllers\RegisterController::class, 'register'])->name('home');

// Route::group(['prefix' => '{locale?}'], function () {

    Route::get('/', [\App\Http\Controllers\Public\PagesController::class, 'home'])->name('home');
    Route::get('/services', [\App\Http\Controllers\Public\PagesController::class, 'services'])->name('services');
    Route::get('/about', [\App\Http\Controllers\Public\PagesController::class, 'about'])->name('about');
    Route::get('/projects', [\App\Http\Controllers\Public\PagesController::class, 'projects'])->name('projects');
    Route::get('/engineers', [\App\Http\Controllers\Public\PagesController::class, 'engineers'])->name('engineers');
    Route::get('/contact-us', [\App\Http\Controllers\Public\PagesController::class, 'contact'])->name('contact-us');

    // engineer works details
    Route::get('/engineers/details/{engineer_id}', [\App\Http\Controllers\Public\PagesController::class, 'details'])->name('engineers.details');
    Route::get('/engineers/work/details/{engineer_id}/{work_id}', [\App\Http\Controllers\Public\PagesController::class, 'work_details'])->name('engineers.work.details');

    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login/action', [\App\Http\Controllers\AuthController::class, 'login_action'])->name('login.action');

    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register.user');
    Route::post('/register/action', [\App\Http\Controllers\RegisterController::class, 'register_action'])->name('register.user.action');


    Route::get('/forgotpassword', [\App\Http\Controllers\AuthController::class, 'forgot_password'])->name('password.forgot');
    Route::post('/forgotpassword/action', [\App\Http\Controllers\AuthController::class, 'forgot_password_action'])->name('password.forgot.action');

    Route::get('/resetpassword/{id}/{token}', [\App\Http\Controllers\AuthController::class, 'reset_password'])->name('reset.password.link');
    Route::post('/set_password', [\App\Http\Controllers\AuthController::class, 'rest_password_new'])->name('set.new.password');

    Route::get('/privacy', function () {
        return view('public.privacy');
    })->name('privacy');

    Route::get('/terms', function () {
        return view('public.terms');
    })->name('terms');

    Route::group(['middleware' => ['auth:client,engineer']], function () {

        Route::get('/confirm_email', [\App\Http\Controllers\AuthController::class, 'confirm_email'])->name('confirm.email');
        Route::post('/confirm_email/action', [\App\Http\Controllers\AuthController::class, 'confirm_email_action'])->name('confirm.email.action');
        Route::get('/confirm_email/resend', [\App\Http\Controllers\AuthController::class, 'confirm_email_resend'])->name('confirm.email.resend.action');
    });
// });


// public invoice
Route::get('/invoices/show/{invoice_id}', [\App\Http\Controllers\Shared\InvoicesController::class, 'show'])->name('invoices.show');

Route::group(['middleware' => ['auth:client', 'account'], 'prefix' => 'client'], function () {

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

    // meetings
    Route::get('/meetings/list', [\App\Http\Controllers\Clients\MeetingsController::class, 'list'])->name('client.meeting.list');

    // messages
    Route::post('/conversation/create', [\App\Http\Controllers\Clients\ConversationController::class, 'initiateConversation'])->name('client.conversation.create');
    Route::get('/conversation/list', [\App\Http\Controllers\Clients\ConversationController::class, 'listConversations'])->name('client.conversation.list');
    Route::get('/conversation/view/{conversationId}', [\App\Http\Controllers\Clients\ConversationController::class, 'viewConversation'])->name('client.conversation.view');
    Route::post('/conversation/message/create/{conversationId}', [\App\Http\Controllers\Clients\ConversationController::class, 'sendMessage'])->name('client.conversation.message.send');


    // update settings
    Route::get('/settings', [\App\Http\Controllers\Shared\SettingsController::class, 'client_update_data'])->name('client.settings');
    Route::post('/settings/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_data_action'])->name('client.settings.action');

    // update password
    Route::get('/password', [\App\Http\Controllers\Shared\SettingsController::class, 'client_update_passwords'])->name('client.password');
    Route::post('/password/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_passwords_action'])->name('client.password.action');



    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'client_logout'])->name('client.logout');
});


Route::group(['middleware' => ['auth:engineer', 'account'], 'prefix' => 'engineer'], function () {

    // orders
    Route::get('/orders/list', [\App\Http\Controllers\Engineer\OrdersController::class, 'orders_list'])->name('engineer.orders.list');
    Route::get('/orders/details/{order_id}', [\App\Http\Controllers\Engineer\OrdersController::class, 'details'])->name('engineer.orders.details');
    Route::post('/orders/add_comment/{order_id}', [\App\Http\Controllers\Engineer\OrdersController::class, 'add_comment'])->name('engineer.order.add_comment');
    Route::post('/orders/update_status/{order_id}', [\App\Http\Controllers\Engineer\OrdersController::class, 'update_status'])->name('engineer.order.status.update');

    // works
    Route::get('/work/list', [\App\Http\Controllers\Engineer\WorksController::class, 'list'])->name('engineer.work.list');
    Route::get('/work/create', [\App\Http\Controllers\Engineer\WorksController::class, 'create'])->name('engineer.work.create');
    Route::get('/work/details/{work_id}', [\App\Http\Controllers\Engineer\WorksController::class, 'details'])->name('engineer.work.details');
    Route::post('/work/create/action', [\App\Http\Controllers\Engineer\WorksController::class, 'create_action'])->name('engineer.work.create.action');
    Route::get('/work/edit/{work_id}', [\App\Http\Controllers\Engineer\WorksController::class, 'edit'])->name('engineer.work.edit');
    Route::post('/work/edit/{work_id}/action', [\App\Http\Controllers\Engineer\WorksController::class, 'edit_action'])->name('engineer.work.edit.action');
    Route::delete('/work/delete/{work}', [\App\Http\Controllers\Engineer\WorksController::class, 'delete'])->name('engineer.work.delete');

    // contract
    Route::get('/contract/list', [\App\Http\Controllers\Engineer\ContractsController::class, 'list'])->name('engineer.contract.list');
    Route::get('/contract/details/{contract_id}', [\App\Http\Controllers\Engineer\ContractsController::class, 'details'])->name('engineer.contract.details');
    Route::get('/contract/create/{order_id}', [\App\Http\Controllers\Engineer\ContractsController::class, 'create'])->name('engineer.contract.create');
    Route::post('/contract/create/{order_id}/action', [\App\Http\Controllers\Engineer\ContractsController::class, 'create_action'])->name('engineer.contract.create.action');
    Route::delete('/contract/cancel/{contract}', [\App\Http\Controllers\Engineer\ContractsController::class, 'update_status'])->name('engineer.contract.status.update');

    // messages
    Route::get('/conversation/list', [\App\Http\Controllers\Engineer\ConversationController::class, 'listConversations'])->name('engineer.conversation.list');
    Route::post('/conversation/create', [\App\Http\Controllers\Engineer\ConversationController::class, 'initiateConversation'])->name('engineer.conversation.create');
    Route::get('/conversation/view/{conversationId}', [\App\Http\Controllers\Engineer\ConversationController::class, 'viewConversation'])->name('engineer.conversation.view');
    Route::post('/conversation/message/create/{conversationId}', [\App\Http\Controllers\Engineer\ConversationController::class, 'sendMessage'])->name('engineer.conversation.message.send');


    // update settings
    Route::get('/settings', [\App\Http\Controllers\Shared\SettingsController::class, 'update_data'])->name('engineer.settings');
    Route::post('/settings/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_data_action'])->name('engineer.settings.action');

    // update password
    Route::get('/password', [\App\Http\Controllers\Shared\SettingsController::class, 'update_passwords'])->name('engineer.password');
    Route::post('/password/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_passwords_action'])->name('engineer.password.action');

    // meetings
    Route::get('/meetings/list', [\App\Http\Controllers\Engineer\MeetingsController::class, 'list'])->name('engineer.meeting.list');
    Route::get('/meetings/details/{meeting_id}', [\App\Http\Controllers\Engineer\MeetingsController::class, 'show'])->name('engineer.meeting.show');
    Route::get('/google/create/{client_id}', [\App\Http\Controllers\Engineer\MeetingsController::class, 'create'])->name('engineer.meeting.create');
    Route::post('/google/create/{client_id}', [\App\Http\Controllers\Engineer\MeetingsController::class, 'create_action'])->name('engineer.meeting.create.action');

    Route::get('/meetings/cancel/{meeting_id}', [\App\Http\Controllers\Engineer\MeetingsController::class, 'cancel_meeting'])->name('engineer.meeting.cancel');

    Route::get('/google/request/token', [\App\Http\Controllers\Engineer\MeetingsController::class, 'redirectToGoogle'])->name('engineer.google.request.token');
    Route::get('/google/get/token', [\App\Http\Controllers\Engineer\MeetingsController::class, 'handleGoogleCallback'])->name('engineer.google.get.token');


    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'engineer_logout'])->name('engineer.logout');
});


Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function () {

    // engineers
    Route::get('/engineers/list', [\App\Http\Controllers\Admin\EngineersController::class, 'list'])->name('admin.engineers.list');
    Route::get('/engineers/create', [\App\Http\Controllers\Admin\EngineersController::class, 'create'])->name('admin.engineers.create');
    Route::post('/engineers/create/action', [\App\Http\Controllers\Admin\EngineersController::class, 'create_action'])->name('admin.engineers.create.action');
    Route::get('/engineers/edit/{id}', [\App\Http\Controllers\Admin\EngineersController::class, 'edit'])->name('admin.engineers.edit');
    Route::post('/engineers/edit/action', [\App\Http\Controllers\Admin\EngineersController::class, 'edit_action'])->name('admin.engineers.edit.action');
    Route::delete('/engineers/delete/{user}', [\App\Http\Controllers\Admin\EngineersController::class, 'delete'])->name('admin.engineers.delete');

    Route::get('/engineers/details/{engineer_id}', [\App\Http\Controllers\Admin\EngineersController::class, 'details'])->name('admin.engineers.details');
    Route::get('/engineers/work/details/{engineer_id}/{work_id}', [\App\Http\Controllers\Admin\EngineersController::class, 'work_details'])->name('admin.engineers.work.details');

    // clients
    Route::get('/clients/list', [\App\Http\Controllers\Admin\ClientsController::class, 'list'])->name('admin.clients.list');
    Route::get('/clients/edit/{id}', [\App\Http\Controllers\Admin\ClientsController::class, 'edit'])->name('admin.clients.edit');
    Route::post('/clients/edit/action', [\App\Http\Controllers\Admin\ClientsController::class, 'edit_action'])->name('admin.clients.edit.action');
    Route::delete('/clients/delete/{user}', [\App\Http\Controllers\Admin\ClientsController::class, 'delete'])->name('admin.clients.delete');

    // orders
    Route::get('/orders/list', [\App\Http\Controllers\Admin\OrdersController::class, 'orders_list'])->name('admin.orders.list');
    Route::get('/orders/details/{order_id}', [\App\Http\Controllers\Admin\OrdersController::class, 'details'])->name('admin.order.details');
    Route::post('/orders/add_comment/{order_id}', [\App\Http\Controllers\Admin\OrdersController::class, 'add_comment'])->name('admin.order.add_comment');
    Route::post('/orders/update_status/{order_id}', [\App\Http\Controllers\Admin\OrdersController::class, 'update_status'])->name('admin.order.status.update');

    // works
    Route::get('/work/list', [\App\Http\Controllers\Admin\WorksController::class, 'list'])->name('admin.work.list');
    Route::get('/work/details/{work_id}', [\App\Http\Controllers\Admin\WorksController::class, 'details'])->name('admin.work.details');
    Route::put('/work/update/{work}', [\App\Http\Controllers\Admin\WorksController::class, 'publish_unpublish_work'])->name('admin.work.update');

    // meetings
    Route::get('/meetings/list', [\App\Http\Controllers\Admin\MeetingsController::class, 'list'])->name('admin.meeting.list');

    // messages
    Route::get('/conversation/list', [\App\Http\Controllers\Admin\ConversationController::class, 'listConversations'])->name('admin.conversation.list');
    Route::get('/conversation/view/{conversationId}', [\App\Http\Controllers\Admin\ConversationController::class, 'viewConversation'])->name('admin.conversation.view');

    // My messages
    Route::post('/my/conversation/create', [\App\Http\Controllers\Admin\MyConversationController::class, 'initiateConversation'])->name('admin.my.conversation.create');
    Route::get('/my/conversation/list', [\App\Http\Controllers\Admin\MyConversationController::class, 'listConversations'])->name('admin.my.conversation.list');
    Route::get('/my/conversation/view/{conversationId}', [\App\Http\Controllers\Admin\MyConversationController::class, 'viewConversation'])->name('admin.my.conversation.view');
    Route::post('/my/conversation/message/create/{conversationId}', [\App\Http\Controllers\Admin\MyConversationController::class, 'sendMessage'])->name('admin.my.conversation.message.send');

    // contracts
    Route::get('/contract/list', [\App\Http\Controllers\Admin\ContractsController::class, 'list'])->name('admin.contract.list');
    Route::get('/contract/details/{contract_id}', [\App\Http\Controllers\Admin\ContractsController::class, 'details'])->name('admin.contract.details');

    // update settings
    Route::get('/services/list', [\App\Http\Controllers\Admin\ServicesController::class, 'list'])->name('admin.services.list');
    Route::get('/services/create', [\App\Http\Controllers\Admin\ServicesController::class, 'create'])->name('admin.services.create');
    Route::post('/services/create', [\App\Http\Controllers\Admin\ServicesController::class, 'create_action'])->name('admin.services.create.action');
    Route::get('/services/edit/{service_id}', [\App\Http\Controllers\Admin\ServicesController::class, 'edit'])->name('admin.services.edit');
    Route::post('/services/edit/{service_id}', [\App\Http\Controllers\Admin\ServicesController::class, 'edit_action'])->name('admin.services.edit.action');
    Route::delete('/services/delete/{service}', [\App\Http\Controllers\Admin\ServicesController::class, 'delete'])->name('admin.services.delete');


    // update settings
    Route::get('/settings', [\App\Http\Controllers\Shared\SettingsController::class, 'admin_update_data'])->name('admin.settings');
    Route::post('/settings/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_data_action'])->name('admin.settings.action');

    // supervisors    
    Route::get('/supervisors/list', [\App\Http\Controllers\Admin\SupervisorController::class, 'list'])->name('admin.supervisors.list');
    Route::get('/supervisors/create', [\App\Http\Controllers\Admin\SupervisorController::class, 'create'])->name('admin.supervisors.create');
    Route::post('/supervisors/create/action', [\App\Http\Controllers\Admin\SupervisorController::class, 'create_action'])->name('admin.supervisors.create.action');
    Route::get('/supervisors/edit/{id}', [\App\Http\Controllers\Admin\SupervisorController::class, 'edit'])->name('admin.supervisors.edit');
    Route::post('/supervisors/edit/action', [\App\Http\Controllers\Admin\SupervisorController::class, 'edit_action'])->name('admin.supervisors.edit.action');
    Route::delete('/supervisors/delete/{user}', [\App\Http\Controllers\Admin\SupervisorController::class, 'delete'])->name('admin.supervisors.delete');

    // update password
    Route::get('/password', [\App\Http\Controllers\Shared\SettingsController::class, 'admin_update_passwords'])->name('admin.password');
    Route::post('/password/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_passwords_action'])->name('admin.password.action');

    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'admin_logout'])->name('admin.logout');

});


Route::group(['middleware' => ['auth:supervisor'], 'prefix' => 'supervisor'], function () {

    // engineers list
    Route::get('/engineers/list', [\App\Http\Controllers\Supervisor\EngineersController::class, 'list'])->name('supervisor.engineers.list');
  
    // clients  
    Route::get('/clients/list', [\App\Http\Controllers\Supervisor\ClientsController::class, 'list'])->name('supervisor.clients.list');
    
    // orders list
    Route::get('/orders/list', [\App\Http\Controllers\Supervisor\OrdersController::class, 'orders_list'])->name('supervisor.orders.list');
    Route::get('/orders/details/{order_id}', [\App\Http\Controllers\Supervisor\OrdersController::class, 'details'])->name('supervisor.order.details');
    Route::post('/orders/add_comment/{order_id}', [\App\Http\Controllers\Supervisor\OrdersController::class, 'add_comment'])->name('supervisor.order.add_comment');
    Route::post('/orders/update_status/{order_id}', [\App\Http\Controllers\Supervisor\OrdersController::class, 'update_status'])->name('supervisor.order.status.update');

    // invoices
    Route::get('/invoices/list', [\App\Http\Controllers\Supervisor\InvoicesController::class, 'list'])->name('supervisor.invoices.list');    
    Route::get('/invoices/create/{order_id}', [\App\Http\Controllers\Supervisor\InvoicesController::class, 'create'])->name('supervisor.invoices.create');
    Route::post('/invoices/create/{order_id}', [\App\Http\Controllers\Supervisor\InvoicesController::class, 'create_action'])->name('supervisor.invoices.create');

    // contracts
    Route::get('/contract/list', [\App\Http\Controllers\Supervisor\ContractsController::class, 'list'])->name('supervisor.contract.list');
    Route::get('/contract/details/{contract_id}', [\App\Http\Controllers\Supervisor\ContractsController::class, 'details'])->name('supervisor.contract.details');

    // meetings
    Route::get('/meetings/list', [\App\Http\Controllers\Supervisor\MeetingsController::class, 'list'])->name('supervisor.meeting.list');

    // My messages
    Route::post('/my/conversation/create', [\App\Http\Controllers\Supervisor\MyConversationController::class, 'initiateConversation'])->name('supervisor.my.conversation.create');
    Route::get('/my/conversation/list', [\App\Http\Controllers\Supervisor\MyConversationController::class, 'listConversations'])->name('supervisor.my.conversation.list');
    Route::get('/my/conversation/view/{conversationId}', [\App\Http\Controllers\Supervisor\MyConversationController::class, 'viewConversation'])->name('supervisor.my.conversation.view');
    Route::post('/my/conversation/message/create/{conversationId}', [\App\Http\Controllers\Supervisor\MyConversationController::class, 'sendMessage'])->name('supervisor.my.conversation.message.send');

    // settings
    Route::get('/settings', [\App\Http\Controllers\Shared\SettingsController::class, 'supervisor_update_data'])->name('supervisor.settings');
    Route::post('/settings/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_data_action'])->name('supervisor.settings.action');

    // password
    Route::get('/password', [\App\Http\Controllers\Shared\SettingsController::class, 'supervisor_update_passwords'])->name('supervisor.password');
    Route::post('/password/action', [\App\Http\Controllers\Shared\SettingsController::class, 'update_passwords_action'])->name('supervisor.password.action');


    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'supervisor_logout'])->name('supervisor.logout');

});