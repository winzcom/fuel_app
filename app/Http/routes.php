<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as'=>'home','uses'=>'HomeController@getHome']);
Route::get('about-us',['as'=>'about-us','uses'=>'HomeController@getAboutUs']);
Route::get('contact',['as'=>'contact','uses'=>'HomeController@getContact']);
Route::post('contact',['as'=>'contact','uses'=>'HomeController@postContact']);

/* Route For Admin */
Route::get('admin',['as'=>'login','uses'=>'AdminController@getLogin']);
Route::post('admin', ['as'=>'login', 'uses'=>'AdminController@postLogin']);
Route::get('admin/logout', ['as'=>'logout','uses'=>'AdminController@logout']);

/* Admin password Change*/
Route::get('changepass', ['as'=>'change-pass', 'uses'=>'WebSettingController@getChangePass']);
Route::post('changepass', ['as'=>'change-pass', 'uses'=>'WebSettingController@postChangePass']);

/** Stock Routes*/

Route::get('stock', ['as' => 'stockform', 'uses' => 'DashboardController@addStockForm']);
Route::post('stock', ['as' => 'stock', 'uses' => 'DashboardController@addStock']);


/*Dashboard Route List*/
Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@getDashboard']);

/* WebSetting Controller */
Route::get('general-setting',['as'=>'general_setting','uses'=>'WebSettingController@getGeneralSetting']);
Route::put('general-setting/{id}',['as'=>'update_general','uses'=>'WebSettingController@putGeneralSetting']);

/* Home Page Route */
Route::get('home-page-setting',['as'=>'home_page_setting','uses'=>'WebSettingController@getHomePageSetting']);
Route::put('home-page-setting/{id}',['as'=>'update_home_page_setting','uses'=>'WebSettingController@putHomePageSetting']);

/* About Us Page Route List*/
Route::get('about-page-setting',['as'=>'about_page_setting','uses'=>'WebSettingController@getAboutPageSetting']);
Route::put('about-page-setting/{id}',['as'=>'update_about_page_setting','uses'=>'WebSettingController@putAboutPageSetting']);

/* Menu Route List*/
Route::get('menu-create',['as'=>'menu_create','uses'=>'WebSettingController@getMenuCreate']);
Route::post('menu-create',['as'=>'menu_create','uses'=>'WebSettingController@postMenuCreate']);
Route::get('menu-show',['as'=>'menu_show','uses'=>'WebSettingController@showMenuCreate']);
Route::get('menu-edit/{id}',['as'=>'menu-edit','uses'=>'WebSettingController@editMenuCreate']);
Route::put('menu-edit/{id}',['as'=>'menu-update','uses'=>'WebSettingController@updateMenuCreate']);
Route::delete('menu-delete/{id}',['as'=>'menu-delete','uses'=>'WebSettingController@deleteMenuCreate']);

/* Partner Route List*/
Route::get('partner-create',['as'=>'partner-create','uses'=>'WebSettingController@getPartnerCreate']);
Route::post('partner-create',['as'=>'partner-create','uses'=>'WebSettingController@postPartnerCreate']);
Route::get('partner-show',['as'=>'partner-show','uses'=>'WebSettingController@showPartnerCreate']);
Route::get('partner-edit/{id}',['as'=>'partner-edit','uses'=>'WebSettingController@editPartnerCreate']);
Route::put('partner-edit/{id}',['as'=>'partner-update','uses'=>'WebSettingController@updatePartnerCreate']);
Route::delete('partner-delete',['as'=>'partner_delete','uses'=>'WebSettingController@deletePartnerCreate']);

/* Currency Route List */
Route::get('currency-create', ['as'=>'currency_create','uses'=>'DashboardController@createCurrency']);
Route::post('currency-create', ['as'=>'currency_store','uses'=>'DashboardController@storeCurrency']);
Route::get('currency', ['as'=>'currency_show','uses'=>'DashboardController@showCurrency']);
Route::get('currency-edit/{id}', ['as'=>'currency_edit','uses'=>'DashboardController@editCurrency']);
Route::put('currency-edit/{id}', ['as'=>'currency_update','uses'=>'DashboardController@updateCurrency']);
Route::delete('currency-delete', ['as'=>'currency_delete','uses'=>'DashboardController@deleteCurrency']);

/* Fuel Route List */
Route::get('fuel-create',['as'=>'fuel-create','uses'=>'DashboardController@createFuel']);
Route::post('fuel-create',['as'=>'fuel-store','uses'=>'DashboardController@storeFuel']);
Route::get('fuel-show',['as'=>'fuel-show','uses'=>'DashboardController@showFuel']);
Route::get('fuel-edit/{id}',['as'=>'fuel-edit','uses'=>'DashboardController@editFuel']);
Route::put('fuel-edit/{id}',['as'=>'fuel-update','uses'=>'DashboardController@updateFuel']);

/* Machine Route List */
Route::get('machine-create',['as'=>'machine-create','uses'=>'DashboardController@createMachine']);
Route::post('machine-create',['as'=>'machine-store','uses'=>'DashboardController@storeMachine']);
Route::get('machine-show',['as'=>'machine-show','uses'=>'DashboardController@showMachine']);
Route::get('machine-edit/{id}',['as'=>'machine-edit','uses'=>'DashboardController@editMachine']);
Route::put('machine-edit/{id}',['as'=>'machine-update','uses'=>'DashboardController@updateMachine']);
Route::delete('machine-delete',['as'=>'machine-delete','uses'=>'DashboardController@deleteMachine']);

/* Customer Route List */
Route::get('customer-create',['as'=>'customer-create','uses'=>'DashboardController@createCustomer']);
Route::post('customer-create',['as'=>'customer-store','uses'=>'DashboardController@storeCustomer']);
Route::get('customer-show',['as'=>'customer-show','uses'=>'DashboardController@showCustomer']);
Route::get('customer-edit/{id}',['as'=>'customer-edit','uses'=>'DashboardController@editCustomer']);
Route::put('customer-edit/{id}',['as'=>'customer-update','uses'=>'DashboardController@updateCustomer']);

Route::get('customer-invoice/{id}',['as'=>'customer-invoice','uses'=>'DashboardController@customerInvoice']);
Route::post('customer-invoice',['as'=>'customer-invoice-update','uses'=>'DashboardController@customerInvoiceUpdate']);
Route::get('customerId-invoice/{id}',['as'=>'customerId-invoice','uses'=>'DashboardController@customerInvoiceId']);

Route::get('report-invoice/{date}',['as'=>'report-invoice','uses'=>'DashboardController@getReportInvoice']);

/* Seller Route List */
Route::get('seller-create',['as'=>'seller-create','uses'=>'DashboardController@createSeller']);
Route::post('seller-create',['as'=>'seller-store','uses'=>'DashboardController@storeSeller']);
Route::get('seller-show',['as'=>'seller-show','uses'=>'DashboardController@showSeller']);
Route::get('seller-edit/{id}', ['as'=>'staff_edit', 'uses'=>'DashboardController@editStaff']);
Route::put('seller-update/{id}', ['as'=>'staff_update', 'uses'=>'DashboardController@updateStaff']);
Route::delete('seller-delete', ['as'=>'staff_delete', 'uses'=>'DashboardController@deleteStaff']);

/* Seller Password Change */
Route::get('seller-change-password/{id}', ['as'=>'staff_change_pass', 'uses'=>'DashboardController@getChangeStaffPassword']);
Route::put('seller-change-password/{id}', ['as'=>'staff_change_pass_update', 'uses'=>'DashboardController@updateChangeStaffPassword']);

/* Seller Active & Inactive Route */
Route::get('seller-inactive/{id}', ['as'=>'staff_inactive', 'uses' =>'DashboardController@inactiveStaff']);
Route::get('seller-active/{id}', ['as'=>'staff_active', 'uses' =>'DashboardController@activeStaff']);

/* Machine Add Reading Route */
Route::get('start-reading',['as'=>'start-reading','uses'=>'DashboardController@getStartReading']);
Route::get('add-start-reading/{id}',['as'=>'add-start-reading','uses'=>'DashboardController@addStartReading']);
Route::post('update-start-reading',['as'=>'update-start-reading','uses'=>'DashboardController@updateStartReading']);

/* Machine End Reading Route */
Route::get('end-reading',['as'=>'end-reading','uses'=>'DashboardController@getEndReading']);
Route::get('add-end-reading/{id}',['as'=>'add-end-reading','uses'=>'DashboardController@addEndReading']);
Route::post('update-end-reading',['as'=>'update-end-reading','uses'=>'DashboardController@updateEndReading']);

/* Machine View Reading History*/
Route::get('view-reading',['as'=>'view-reading','uses'=>'DashboardController@viewReading']);
Route::post('reading-search',['as'=>'reading-search','uses'=>'DashboardController@searchReading']);

/* Expense Route List */
Route::get('expense-create',['as'=>'expense-create','uses'=>'DashboardController@createExpense']);
Route::post('expense-create',['as'=>'expense-store','uses'=>'DashboardController@storeExpense']);
Route::get('expense-show',['as'=>'expense-show','uses'=>'DashboardController@showExpense']);
Route::get('expense-edit/{id}',['as'=>'expense-edit','uses'=>'DashboardController@editExpense']);
Route::put('expense-edit/{id}',['as'=>'expense-update','uses'=>'DashboardController@updateExpense']);
Route::post('expense-search',['as'=>'expense-search','uses'=>'DashboardController@searchExpense']);

/* Income Report */
Route::get('income-report',['as'=>'income-report','uses'=>'DashboardController@incomeReport']);

/* ------------- Route For Seller --------------- */
Route::get('seller',['as'=>'seller-login','uses'=>'Auth\AuthController@getLogin']);
Route::post('seller',['as'=>'seller-login','uses'=>'Auth\AuthController@postLogin']);
Route::get('seller/logout', ['as'=>'seller-logout','uses'=>'Auth\AuthController@getLogout']);

/* Seller Dashboard Route List */
Route::get('seller-dashboard',['as'=>'seller-dashboard','uses'=>'SellerController@getDashboard']);

/* Seller Machine Route List*/
Route::get('seller-machine/{id}',['as'=>'seller-machine','uses'=>'SellerController@getSellerMachine']);

/* Seller Fuel Sell Route List*/
Route::get('seller-sell/{id}',['as'=>'seller-sell','uses'=>'SellerController@getSellerMachineSell']);
Route::post('seller-sell/{id}',['as'=>'seller-sell','uses'=>'SellerController@postSellerMachineSell']);
Route::get('seller-sell-show/{id}',['as'=>'seller-sell-show','uses'=>'SellerController@sellerAllSell']);

/* Seller Invoice */
Route::get('seller-customer-invoice/{id}',['as'=>'seller-customer-invoice','uses'=>'SellerController@getSellerCustomerInvoice']);

/* Seller Machine Reading */
Route::get('seller-machine-reading/{id}',['as'=>'seller-machine-reading','uses'=>'SellerController@getSellerMachineReading']);
Route::post('seller-reading-search',['as'=>'seller-reading-search','uses'=>'SellerController@sellerReadingSearch']);

/* Seller Expense Create Route List */
Route::get('seller-expense-create',['as'=>'seller-expense-create','uses'=>'SellerController@createSellerExpense']);
Route::post('seller-expense-create',['as'=>'seller-expense-store','uses'=>'SellerController@storeSellerExpense']);

Route::get('/menu/{id}/{name}','HomeController@menu');



