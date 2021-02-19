<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    //localizaiton
    Route::get('localization/{locale}/', 'LocalizationController@index')->name('localization.index');


    Route::middleware(['is_member'])->group(function () {

        Route::get('/member/pending', 'MemberController@pending')->name('pending-approval');

        Route::get('/member/home', 'MemberController@index')->name('member-home');
        Route::get('/member/pledges', 'MemberController@pledges')->name('member.pledges');
        Route::get('/member/pledges/create', 'MemberController@create')->name('member.pledges.create');
        Route::post('/member/pledges', 'MemberController@pledgeStore')->name('member.pledges.store');
        Route::get('/member/payments', 'MemberController@payments')->name('member.payments');

    });


    Route::middleware(['is_admin'])->group(function () {
         
        Route::get('admin/dashboard', 'HomeController@index')->name('home');

        //Person controller
        Route::get('admin/people/pending', 'PersonController@pending')->name('people.pending');
        Route::post('admin/people/approve', 'PersonController@approve')->name('people.approve');
        Route::post('admin/people/search', 'PersonController@search')->name('people.search');
        Route::resource('admin/people', 'PersonController');

        Route::get('admin/get-kanda', 'OuController@getKanda')->name('getKanda');
        Route::get('admin/get-community', 'OuController@getCommunity')->name('getCommunity');


        
        //dependats
        Route::get('admin/dependants', 'DependantsController@index')->name('dependants.index');
        Route::get('admin/dependants/{id}', 'DependantsController@create')->name('dependants.create');
        Route::post('admin/dependants', 'DependantsController@store')->name('dependants.store');
        Route::post('admin/dependant', 'DependantsController@store2')->name('dependants.store2');
        Route::post('admin/dependant/delete', 'DependantsController@delete')->name('dependants.delete');

        //vyama vya kitume
        Route::resource('admin/services', 'ServiceController');
  
        //sms template
        Route::get('admin/sms/templates', 'SmsTemplateController@getTemplate')->name('template.get');
        Route::get('admin/sms/template-create', 'SmsTemplateController@createTemplate')->name('template.create');
        Route::post('admin/sms/template', 'SmsTemplateController@storeTemplate')->name('template.store');
        Route::get('admin/sms/edit/{id}', 'SmsTemplateController@editTemplate')->name('template.edit');
        Route::put('admin/sms/template-update', 'SmsTemplateController@updateTemplate')->name('template.update');
        Route::post('admin/sms/template-delete', 'SmsTemplateController@deleteTemplate')->name('template.delete');
        //sms
        Route::get('admin/sms', 'SmsController@create')->name('sms.create');
        Route::post('admin/sms', 'SmsController@send')->name('sms.send');
        Route::get('admin/sms/outbox', 'SmsController@outbox')->name('sms.outbox');



        //envets
        Route::resource('admin/event-types', 'EventTypeController');
        Route::resource('admin/events', 'EventController');
 

        Route::get('admin/events-calender', 'EventController@calender')->name('calender');

        //pledges
        Route::resource('admin/pledges', 'PledgeController');

        Route::resource('admin/fund-activities', 'FundActivityController')->only([
            'index', 'store','update','destroy'
        ]);

        //payments
        Route::resource('admin/payments', 'PaymentController');
        Route::post('admin/payments/pledges', 'PaymentController@getPledges')->name('payments.pledges');

        //user roles
        Route::get('admin/user-roles', 'RoleController@index')->name('roles.index');
        Route::get('admin/user-roles/create', 'RoleController@create')->name('roles.create');
        Route::post('admin/user-roles', 'RoleController@store')->name('roles.store');
        Route::get('admin/user-roles/{id}/edit', 'RoleController@edit')->name('roles.edit');
        Route::post('admin/user-roles/update', 'RoleController@update')->name('roles.update');
        Route::delete('admin/user-roles/delete', 'RoleController@destroy')->name("roles.destroy");
        
        //users routes
        Route::get('admin/users', 'UserController@index')->name('users.index');
        Route::post('admin/users/register', 'UserController@store')->name("users.store");
        Route::post('admin/users/update', 'UserController@update')->name("users.update");
        Route::put('admin/users/delete', 'UserController@delete')->name("users.delete");
        Route::post('admin/users/de-actiavate', 'UserController@deActivate')->name("users.deactivate");
        Route::post('admin/users/change-password', 'UserController@changePassword')->name('change-password');
        Route::get('admin/users/change-password', 'UserController@changePasswordForm')->name('change-pass-form');
        Route::post('admin/user-profile/update', 'UserController@updateProfile')->name("update-profile");
        Route::get('admin/users/search', 'UserController@search')->name("users.search");
        Route::post('admin/users/user-role-id', 'UserController@getRoleID')->name('getRoleID');
     });
  


});