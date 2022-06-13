<?php

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

// Authentication Routes...
Route::get('login', [
  'as' => 'login',
  'uses' => 'Auth\Admin\LoginController@showLoginForm'
]);
Route::post('login', [
  'as' => '',
  'uses' => 'Auth\Admin\LoginController@login'
]);
Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\Admin\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
  'as' => 'password.email',
  'uses' => 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\Admin\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
  'as' => 'password.update',
  'uses' => 'Auth\Admin\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\Admin\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
  'as' => 'register',
  'uses' => 'Auth\Admin\RegisterController@showRegistrationForm'
]);
Route::post('register', [
  'as' => '',
  'uses' => 'Auth\Admin\RegisterController@register'
]);

Route::group(['middleware' => ['auth']], function () { 

    /* Dashboard Section */
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    /* Dashboard Section */

    /* Settings Section */
    Route::get('settings', 'Admin\SettingsController@index')->name('settings');
    Route::post('settings', 'Admin\SettingsController@store')->name('update_settings');

    Route::get('website-logo-settings', 'Admin\SettingsController@websiteLogo')->name('logo_settings');
    Route::post('website-logo-settings', 'Admin\SettingsController@updateWebsiteLogo')->name('update_logo_settings');

    Route::get('terms-policy-settings', 'Admin\SettingsController@termsPolicy')->name('terms_policy_settings');
    Route::post('terms-policy-settings', 'Admin\SettingsController@updateTermsPolicy')->name('update_terms_policy');

    Route::get('currency-settings', 'Admin\SettingsController@currencySettings')->name('currency_settings');
    Route::post('currency-settings', 'Admin\SettingsController@updateCurrencySettings')->name('update_currency_settings');

    Route::get('email-settings', 'Admin\SettingsController@emailSettings')->name('email_settings');
    Route::post('email-settings', 'Admin\SettingsController@updateemailSettings')->name('update_email_settings');

    Route::get('other-settings', 'Admin\SettingsController@otherSettings')->name('other_settings');
    Route::post('other-settings', 'Admin\SettingsController@updateOtherSettings')->name('update_other_settings');

     Route::get('theme-settings', 'Admin\ThemesController@index')->name('theme_settings');
    Route::post('theme-settings', 'Admin\ThemesController@store')->name('update_theme_settings');
    /* Dashboard Section */

    /* Module Section */
    Route::get('module/{id}', 'Admin\ModulesController@index')->name('modules');
    Route::post('modules', 'Admin\ModulesController@store')->name('update_modules');

    Route::get('custom-modules/{id}', 'Admin\ModulesController@customModule')->name('custom_modules');

    Route::post('save-custom-module', 'Admin\ModulesController@saveCustomModule')->name('save_custom_modules');

    Route::post('auto-save-custom-module/{id}', 'Admin\ModulesController@autoSaveCustomModule')->name('autosavecustommodule');

    Route::get('auto-load-custom-module/{id}', 'Admin\ModulesController@autoLoadCustomModule')->name('autoloadcustommodule');

    Route::get('test-modules', 'Admin\ModulesController@test')->name('test_modules');

    Route::post('upload-fiel-from-frapes', 'Admin\ModulesController@uploadFileGrapes')->name('upload_files_grapes');

    Route::get('select-page', 'Admin\ModulesController@selectPage')->name('select_page');
    /* Module Section */

    /* Pages Section */
    Route::get('pages', 'Admin\PagesController@index')->name('pages');
    Route::get('add-page/{id?}', 'Admin\PagesController@add')->name('add_page');
    Route::post('store-page', 'Admin\PagesController@store')->name('store_page');

    Route::get('set-sections/{id}', 'Admin\PagesController@setSection')->name('setsection');
    Route::post('set-sections', 'Admin\PagesController@storeSection')->name('storesection');

    Route::post('delete-sections', 'Admin\PagesController@deleteSection')->name('deletesection');




    /* Pages Section */


    /* Menues Section */
    Route::get('menues/{id?}', 'Admin\MenuesController@index')->name('menues');
    Route::post('menues', 'Admin\MenuesController@store')->name('add_menu');

    Route::get('menue-list', 'Admin\MenuesController@menuList')->name('menue_list');

    Route::get('set-menu-item/{id}', 'Admin\MenuesController@setMenuItem')->name('setmenuitem');

    Route::post('set-menu-item', 'Admin\MenuesController@savemenuItem')->name('savemenuitem');
    /*Route::get('add-page/{id?}', 'Admin\PagesController@add')->name('add_page');
    Route::post('store-page', 'Admin\PagesController@store')->name('store_page');

    Route::get('set-sections/{id}', 'Admin\PagesController@setSection')->name('setsection');
    Route::post('set-sections', 'Admin\PagesController@storeSection')->name('storesection');

    Route::post('delete-sections', 'Admin\PagesController@deleteSection')->name('deletesection');*/


    /* Pages Section */

    /* elfinder route */
    Route::get('glide/{path}', function($path){
    $server = \League\Glide\ServerFactory::create([
        'source' => app('filesystem')->disk('public')->getDriver(),
    'cache' => storage_path('glide'),
    ]);
    return $server->getImageResponse($path, Input::query());
    })->where('path', '.+');
    /* elfinder route */
});