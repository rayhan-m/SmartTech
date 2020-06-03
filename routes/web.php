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

// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();


Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('dashboard', 'BackEndController@Dashboard')->name('admin.dashboard');
    // System Setting Routes
    Route::get('general-setting', 'GeneralSettingController@index')->name('general_setting');
    Route::POST('update-general-setting', 'GeneralSettingController@update')->name('update-general-setting');
    Route::POST('update-logo', 'GeneralSettingController@updateLogo')->name('update-logo');
    Route::POST('update-fav', 'GeneralSettingController@updateFav')->name('update-fav');

    // Product Category Routes
    Route::get('product-category', 'CategoryController@ProductCategory')->name('product.category');
    Route::POST('product-category', 'CategoryController@ProductCategoryStore')->name('product_category_submit');
    Route::get('category-active/{id}', 'CategoryController@ProductCategoryActive');
    Route::get('category-deactive/{id}', 'CategoryController@ProductCategoryDeactive');
    Route::get('category-delete/{id}', 'CategoryController@ProductCategoryDelete');
    Route::post('category-update', 'CategoryController@ProductCategoryUpdate');
    // Product Routes
    Route::get('product', 'ProductController@ProductList')->name('product');
    Route::POST('product', 'ProductController@ProductStore')->name('product_submit');
    Route::get('product-active/{id}', 'ProductController@ProductActive');
    Route::get('product-deactive/{id}', 'ProductController@ProductDeactive');
    Route::get('product-delete/{id}', 'ProductController@ProductDelete');
    Route::post('product-update', 'ProductController@ProductUpdate');

    // Stock Routes
    Route::get('stock', 'ProductController@StocktList')->name('stock');
    Route::POST('stock', 'ProductController@StockStore')->name('stock_submit');
    Route::post('stock-update', 'ProductController@StockUpdate');
    Route::get('stock-updated/{id}/{product_id}/{quantity}', 'ProductController@StockUpdated');

    // Order Routes
    
    Route::get('all-orders', 'BackEndController@AllOrders')->name('all_orders');
    Route::get('pending-orders', 'BackEndController@PendingOrders')->name('pending_orders');
    Route::get('delivered-orders', 'BackEndController@DeliveredOrders')->name('delivered_orders');
    Route::get('delivery-active/{id}', 'BackEndController@DeliveryActive');
    // Route::get('delivery-deactive/{id}', 'BackEndController@DeliveryDeactive');

    // Payment Route 
    Route::get('payment', 'BackEndController@Payment')->name('payment');
    Route::post('payment-create', 'BackEndController@OrderInfo');
    Route::get('payment-create', 'BackEndController@PaymentCreate')->name('payment_create');
    Route::POST('payment', 'BackEndController@PaymentStore')->name('payment_submit');
    Route::get('payment-delete/{id}', 'BackEndController@PaymentDelete');
    Route::get('payment-active/{id}', 'BackEndController@PaymentActive');
    Route::get('payment-deactive/{id}', 'BackEndController@PaymentDeactive');
    // Staff Payment Route 
    Route::get('staff-payment', 'StaffPaymentController@StaffPayment')->name('staff_payment');
    Route::post('staff-payment-create', 'StaffPaymentController@StaffInfo');
    Route::get('staff-payment-create', 'StaffPaymentController@StaffPaymentCreate')->name('staff_payment_create');
    Route::POST('staff-payment', 'StaffPaymentController@StaffPaymentStore')->name('staff_payment_submit');
    Route::get('staff-payment-delete/{id}', 'StaffPaymentController@StaffPaymentDelete');
    Route::get('staff-payment-active/{id}', 'StaffPaymentController@StaffPaymentActive');
    Route::get('staff-payment-deactive/{id}', 'StaffPaymentController@StaffPaymentDeactive');

    // customer Routes 
    Route::get('customer-list', 'StaffController@CustomerList')->name('customer_list');
    // Staff Route
    
    Route::get('staff-list', 'StaffController@index')->name('staff_list');
    Route::get('add-staff', 'StaffController@create')->name('add_staff');
    Route::post('add-staff', 'StaffController@store')->name('staff_create');
    Route::get('edit-staff/{id}', 'StaffController@edit');
    Route::get('staff-delete/{id}', 'StaffController@destroy');
    Route::post('update-staff', 'StaffController@update')->name('staff_update');
    Route::get('view-staff/{id}', 'StaffController@show');

    // Inoice
    Route::get('invoice/{id}', 'BackEndController@Invoice');

    // Expenses Type Routes
    Route::get('expense-type', 'ExpenseController@ExpenseType')->name('expense_type');
    Route::POST('expense-type', 'ExpenseController@ExpenseTypeStore')->name('expense_type_submit');
    Route::get('expense-type-active/{id}', 'ExpenseController@ExpenseTypeActive');
    Route::get('expense-type-deactive/{id}', 'ExpenseController@ExpenseTypeDeactive');
    Route::get('expense-type-delete/{id}', 'ExpenseController@ExpenseTypeDelete');
    Route::post('expense-type-update', 'ExpenseController@ExpenseTypeUpdate');

    // Expenses Routes
    Route::get('expenses', 'ExpenseController@Expenses')->name('expenses');
    Route::POST('expenses', 'ExpenseController@ExpensesStore')->name('expenses_submit');
    Route::get('expenses-active/{id}', 'ExpenseController@ExpensesActive');
    Route::get('expenses-deactive/{id}', 'ExpenseController@ExpensesDeactive');
    Route::get('expenses-delete/{id}', 'ExpenseController@ExpensesDelete');
    Route::post('expenses-update', 'ExpenseController@ExpensesUpdate');


    // Report Routes 
    Route::post('sell-report', 'ReportController@SellReport')->name('sell_report');
    Route::get('sell-report-search', 'ReportController@SellReportSearch')->name('sell_report_search');

    Route::post('expense-report', 'ReportController@ExpenseReport')->name('expense_report');
    Route::get('expense-report-search', 'ReportController@ExpenseReportSearch')->name('expense_report_search');
    
    Route::get('income-summery-search', 'ReportController@IncomeSummerySearch')->name('income_summery_search');
    Route::post('income-summery', 'ReportController@IncomeSummery')->name('income_summery');


    // News Latter Routes
    Route::get('news-latter', 'NewsLetterController@News_Latter')->name('news_latter');
    Route::POST('news-latter', 'NewsLetterController@NewsLatterStore')->name('news_latter_submit');
    Route::get('news-latter-active/{id}', 'NewsLetterController@NewsLatterActive');
    Route::get('news-latter-deactive/{id}', 'NewsLetterController@NewsLatterDeactive');
    Route::get('news-latter-delete/{id}', 'NewsLetterController@NewsLatterDelete');
    Route::post('news-latter-update', 'NewsLetterController@NewsLatterUpdate');

    // Profile 
    Route::get('profile', 'GeneralSettingController@Profile');
    Route::POST('update-profile-image', 'GeneralSettingController@updateprofileImage')->name('update-profile-image');
    Route::POST('update-profile-info', 'GeneralSettingController@updateprofileInfo')->name('update-profile-info');
    Route::post('change-pass', 'GeneralSettingController@passwordUpdate');

    // Blog Routes
    Route::get('blog', 'BlogController@BlogList')->name('blog');
    Route::POST('blog', 'BlogController@BlogStore')->name('blog_submit');
    Route::get('blog-active/{id}', 'BlogController@BlogActive');
    Route::get('blog-deactive/{id}', 'BlogController@BlogDeactive');
    Route::get('blog-delete/{id}', 'BlogController@BlogDelete');
    Route::post('blog-update', 'BlogController@BlogUpdate');
});


    Route::get('/', 'HtmlController@index');
    Route::get('blog-details/{id}', 'HtmlController@BlogDetails');
    Route::get('blog-list', 'HtmlController@BlogList');
    Route::get('product-details/{id}', 'HtmlController@ProductDetails');
    Route::get('products/{id}', 'HtmlController@ProducList');
    Route::post('products/by_search', 'HtmlController@SearchProducList');

    Route::get('about-us', 'HtmlController@AboutUs');
    Route::get('contact', 'HtmlController@Contact');
    // Route::resource('/cart', 'CartController');
    Route::get('cart', 'CartController@index')->name('cart');
    Route::any('cart-store/{id}/{qty}', 'CartController@store');
    Route::any('cart-delete/{id}', 'CartController@destroy');
    Route::any('cart-update/{id}', 'CartController@update');
    Route::get('cart-payment', 'CartController@cartPayment');
    Route::POST('payment-method', 'CartController@PaymentMethod');
    Route::get('delivery-method', 'CartController@DeliveryMethod');
    Route::post('delivery-method', 'CartController@DeliveryMethodSubmit');
    Route::get('confirmation', 'CartController@Confirmation');
    // subscribe

    Route::post('subscribe', 'NewsLetterController@SubscribeStore');


Route::group(['middleware'=>['auth','customer']], function () {
    Route::get('checkout-success', 'CartController@CheckoutSuccess');

    Route::get('user-profile', 'HtmlController@UserProfile');
    Route::POST('update-image', 'HtmlController@updateImage')->name('update-image');
    Route::POST('update-profile', 'HtmlController@updateprofile')->name('update_profile');
    Route::post('change-password', 'HtmlController@password_update');
});