<?php

use App\Http\Controllers\User\PlanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//require 'vendor/autoload.php';


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
Route::get('/cc', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('config:cache');
    return 'DONE';
});



//public plan
Route::get('/plan', [PlanController::class, 'showPlan'])->name('show.plan');

Route::get('/', 'HomeController@index')->name('home-locale');

Auth::routes();

// Pages
Route::get('faq', 'HomeController@faq')->name('faq');
Route::get('about', 'HomeController@about')->name('about');
Route::get('blog', 'HomeController@blog')->name('blog');
Route::get('blog/{slug}', 'HomeController@blogDetails')->name('blog.details');
Route::get('category/{category_slug}', 'HomeController@CategoryPost')->name('category.post');
Route::get('search', 'HomeController@SearchPost')->name('search.post');
Route::get('contact-us', 'HomeController@contact')->name('contact');
Route::post('user/contact/store', 'HomeController@CardContactStore')->name('card.contact.store');
Route::post('contact/store', 'HomeController@ContactStore')->name('contact.store');
Route::post('subscribe/store', 'HomeController@StoreSubscribe')->name('store.subscribe');
Route::get('support', 'HomeController@support')->name('support');
Route::get('privacy-policy', 'HomeController@privacyPolicy')->name('privacy.policy');
Route::get('terms-and-conditions', 'HomeController@termsAndConditions')->name('terms.and.conditions');
Route::get('legal-&-gdpr', 'HomeController@LegalGdpr')->name('legal.gdpr');

Route::get('refund-policy', 'HomeController@refundPolicy')->name('refund.policy');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    // Themes
    Route::get('themes', 'ThemeController@themes')->name('themes');
    // Plans
    Route::get('plans', 'PlanController@plans')->name('plans');
    Route::get('add-plan', 'PlanController@addPlan')->name('add.plan');
    Route::post('save-plan', 'PlanController@savePlan')->name('save.plan');
    Route::get('edit-plan/{id}', 'PlanController@editPlan')->name('edit.plan');
    Route::get('shareable-update/{id}', 'PlanController@shareableUpdate')->name('shareable-update');
    Route::post('update-plan', 'PlanController@updatePlan')->name('update.plan');
    Route::get('delete-plan', 'PlanController@deletePlan')->name('delete.plan');
    // Users
    Route::get('users', 'UserController@users')->name('users');
    Route::get('edit-user/{id}', 'UserController@editUser')->name('edit.user');
    Route::post('update-user', 'UserController@updateUser')->name('update.user');
    Route::get('view-user/{id}', 'UserController@viewUser')->name('view.user');
    Route::get('change-user-plan/{id}', 'UserController@ChangeUserPlan')->name('change.user.plan');
    Route::post('update-user-plan', 'UserController@UpdateUserPlan')->name('update.user.plan');
    Route::get('update-status', 'UserController@updateStatus')->name('update.status');
    Route::get('delete-user', 'UserController@deleteUser')->name('delete.user');
    Route::get('login-as/{id}', 'UserController@authAs')->name('login-as.user');






    // Payment Gateways
    Route::get('payment-methods', 'PaymentMethodController@paymentMethods')->name('payment.methods');
    Route::get('add-payment-method', 'PaymentMethodController@addPaymentMethod')->name('add.payment.method');
    Route::post('save-payment-method', 'PaymentMethodController@savePaymentMethod')->name('save.payment.method');
    Route::get('edit-payment-method/{id}', 'PaymentMethodController@editPaymentMethod')->name('edit.payment.method');
    Route::post('update-payment-method', 'PaymentMethodController@updatePaymentMethod')->name('update.payment.method');
    Route::get('delete-payment-method', 'PaymentMethodController@deletePaymentMethod')->name('delete.payment.method');
    // Transactions
    Route::get('transactions', 'TransactionsController@indexTransactions')->name('transactions');
    Route::get('transaction-status/{id}/{status}', 'TransactionsController@transactionStatus')->name('trans.status');
    Route::get('offline-transactions', 'TransactionsController@offlineTransactions')->name('offline.transactions');
    Route::get('offline-transaction-status/{id}/{status}', 'TransactionsController@offlineTransactionStatus')->name('offline.trans.status');
    Route::get('view-invoice/{id}', 'TransactionsController@viewInvoice')->name('view.invoice');
    // Account Setting
    Route::get('account', 'AccountController@account')->name('account');
    Route::get('edit-account', 'AccountController@editAccount')->name('edit.account');
    Route::post('update-account', 'AccountController@updateAccount')->name('update.account');
    Route::get('change-password', 'AccountController@changePassword')->name('change.password');
    Route::post('update-password', 'AccountController@updatePassword')->name('update.password');
    // Setting
    Route::get('pages', 'SettingsController@pages')->name('pages');
    Route::get('page/{id}', 'SettingsController@editPage')->name('edit.page');
    Route::post('save-page/{id}', 'SettingsController@savePage')->name('save.page');
    Route::get('settings', 'SettingsController@settings')->name('settings');
    Route::post('change-settings', 'SettingsController@changeSettings')->name('change.settings');
    Route::get('tax-setting', 'SettingsController@taxSetting')->name('tax.setting');
    Route::post('update-tex-setting', 'SettingsController@updateTaxSetting')->name('update.tax.setting');
    Route::post('update-email-setting', 'SettingsController@updateEmailSetting')->name('update.email.setting');
    Route::get('test-email', 'SettingsController@testEmail')->name('test.email');
    // Clear cache
    Route::get('clear', 'SettingsController@clear')->name('clear');

    // Contact
    Route::get('contacts', 'DashboardController@ContactMsg')->name('contact');
    Route::get('contacts/delete', 'DashboardController@ContactDestroy')->name('contact.destroy');

    // blog
    Route::get('blogs', 'BlogController@Index')->name('blog');
    Route::get('blog/create', 'BlogController@Create')->name('blog.create');
    Route::post('blog/store', 'BlogController@Store')->name('blog.store');
    Route::get('blog/edit/{id}', 'BlogController@Edit')->name('blog.edit');
    Route::post('blog/update/{id}', 'BlogController@Update')->name('blog.update');
    Route::get('blog/delete/', 'BlogController@Delete');

    // blog
    Route::get('categories', 'CategoryController@Index')->name('category.index');
    Route::get('category/create', 'CategoryController@Create')->name('category.create');
    Route::post('category/store', 'CategoryController@Store')->name('category.store');
    Route::get('category/edit/{id}', 'CategoryController@Edit')->name('category.edit');
    Route::post('category/update/{id}', 'CategoryController@Update')->name('category.update');
    Route::get('category/delete/', 'CategoryController@Delete');




    // subscriber list
    Route::get('subscribers', 'DashboardController@SubscriberList')->name('subscriber.index');

    Route::get('user-guide', 'DashboardController@UserGideVideo')->name('user.guide');
    Route::post('user-guide/update/{id}', 'DashboardController@UserGideVideoUpdate')->name('user.guide.update');



});

Route::post('send-card/{id}', 'ProfileController@emailCard')->name('email.card');


Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    // Business Cards

    Route::get('vcards', 'CardController@vcards')->name('vcards');
    Route::get('store-cards', 'CardController@storeCards')->name('store-cards');
    Route::get('card-status/{id}', 'CardController@cardStatus')->name('card.status');
    // Business Plans
    Route::get('plans', 'CardController@plans')->name('plans');
    Route::get('plan/cancel/{plan:plan_id}', 'CardController@cancelPlan')->name('cancel.plan');
    // Media
    Route::get('media', 'MediaController@media')->name('media');
    Route::get('add-media', 'MediaController@addMedia')->name('add.media');
    Route::post('upload-media', 'MediaController@uploadMedia')->name('upload.media');
    Route::get('delete-media/{id}', 'MediaController@deleteMedia')->name('media.delete');
    $sett = \DB::table('settings')->first();
    if ($sett->application_type == 'VCARD' || $sett->application_type == 'BOTH') {
        // Create Business Card
        Route::get('create-card', 'CardController@CreateCard')->name('create.card');
        Route::post('save-business-card', 'CardController@saveBusinessCard')->name('save.business.card');
        Route::get('social-links/{id}', 'CardController@socialLinks')->name('social.links');
        Route::post('save-social-links/{id}', 'CardController@saveSocialLinks')->name('save.social.links');
        Route::get('payment-links/{id}', 'CardController@paymentLinks')->name('payment.links');
        Route::post('save-payment-links/{id}', 'CardController@savePaymentLinks')->name('save.payment.links');
        Route::get('services/{id}', 'CardController@services')->name('services');
        Route::post('save-services/{id}', 'CardController@saveServices')->name('save.services');
        Route::get('galleries/{id}', 'CardController@galleries')->name('galleries');
        Route::post('save-galleries/{id}', 'CardController@saveGalleries')->name('save.galleries');
        Route::get('business-hours/{id}', 'CardController@businessHours')->name('business.hours');
        Route::post('save-business-hours/{id}', 'CardController@saveBusinessHours')->name('save.business.hours');
    }
    // Check link
    Route::post('check-link', 'CardController@checkLink')->name('check.link');
    // Edit Business Card
    Route::get('edit-card/{id}', 'EditCardController@editCard')->name('edit.card');
    Route::post('update-business-card/{id}', 'EditCardController@updateBusinessCard')->name('update.business.card');
    Route::get('edit-social-links/{id}', 'EditCardController@socialLinks')->name('edit.social.links');
    Route::post('update-social-links/{id}', 'EditCardController@updateSocialLinks')->name('update.social.links');
    Route::get('edit-payment-links/{id}', 'EditCardController@paymentLinks')->name('edit.payment.links');
    Route::post('update-payment-links/{id}', 'EditCardController@updatePaymentLinks')->name('update.payment.links');
    Route::get('edit-services/{id}', 'EditCardController@services')->name('edit.services');
    Route::post('update-services/{id}', 'EditCardController@updateServices')->name('update.services');
    Route::get('edit-galleries/{id}', 'EditCardController@galleries')->name('edit.galleries');
    Route::post('update-galleries/{id}', 'EditCardController@updateGalleries')->name('update.galleries');
    Route::get('edit-business-hours/{id}', 'EditCardController@businessHours')->name('edit.business.hours');
    Route::post('update-business-hours/{id}', 'EditCardController@updateBusinessHours')->name('update.business.hours');
    Route::get('clear-business-hours/{id}', 'EditCardController@clearBusinessHours')->name('clear.business.hours');

    $sett = \DB::table('settings')->first();

   if ($sett->application_type == 'STORE' || $sett->application_type == 'BOTH') {
       // Create Store
       Route::get('create-store', 'StoreController@CreateStore')->name('create.store');
       Route::post('save-store', 'StoreController@saveStore')->name('save.store');
       Route::get('products/{id}', 'StoreController@products')->name('products');
       Route::post('save-products/{id}', 'StoreController@saveProducts')->name('save.products');
   }

    // Modern card
    Route::get('modern-card/{id}', 'CardController@modernCard')->name('modern-card.edit');
    Route::post('modern-card-view/{id}', 'CardController@modernCardView')->name('modern-card.view');
    Route::post('modern-card/{id}', 'CardController@updateModernCard')->name('update.modern-card');

    // Edit Store
    Route::get('edit-store/{id}', 'StoreController@editStore')->name('edit.store');
    Route::post('update-store/{id}', 'StoreController@updateStore')->name('update.store');
    Route::get('edit-products/{id}', 'StoreController@editProducts')->name('edit.products');
    Route::post('update-products/{id}', 'StoreController@updateProducts')->name('update.products');

    //QR Maker
    Route::get('qr-maker', 'AccountController@qrMaker')->name('qr-maker');
    // Transactions
    Route::get('transactions', 'TransactionsController@indexTransactions')->name('transactions');
    Route::get('view-invoice/{id}', 'TransactionsController@viewInvoice')->name('view.invoice');
    // Billing
    Route::get('billing/{id}', 'TransactionsController@billing')->name('billing');
    Route::post('update-billing', 'TransactionsController@updateBilling')->name('update.billing');
    // Checkout
    Route::get('checkout/{id}', 'CardController@checkout')->name('checkout');

    // Save Upgrade Plan
    Route::post('save-upgrade/{id}', 'CardController@saveUpgrade')->name('save.upgrade.plan');

    // View Preview Business Card
    Route::get('view-preview/{id}', 'CardController@viewPreview')->name('view.preview');

    // Account Setting
    Route::get('account', 'AccountController@account')->name('account');
    Route::get('edit-account', 'AccountController@editAccount')->name('edit.account');
    Route::post('update-account', 'AccountController@updateAccount')->name('update.account');
    Route::get('change-password', 'AccountController@changePassword')->name('change.password');
    Route::post('update-password', 'AccountController@updatePassword')->name('update.password');

    // user gide video
    Route::get('user-guide', 'DashboardController@UserGide')->name('user.guide');

    // user Signatures
    Route::get('user-signatures', 'DashboardController@UserSignature')->name('user.signature');
    Route::get('user-templates', 'DashboardController@UserTemplate')->name('user.template');
    Route::get('user-signatures/create', 'DashboardController@UserSignatureCreate')->name('signature.create');
    Route::post('user-signature/store', 'DashboardController@UserSignatureStore')->name('signature.store');
    Route::get('user-signature/remove/{id}', 'DashboardController@UserSignatureRemove')->name('signature.remove');
    Route::get('user-own-signature/edit/{id}', 'DashboardController@UserOwnSignatureEdit')->name('own.signature.edit');
    Route::post('user-own-signature/update', 'DashboardController@UserOwnSignatureUpdate')->name('own.signature.update');


});

// Choose Payment Gateway
Route::post('/prepare-payment/{planId}', 'Payment\PaymentController@preparePaymentGateway')->name('prepare.payment.gateway');
Route::post('/prepare-payment/stripe/{planId}', 'Payment\StripeController@stripeCheckout')->name('prepare.payment.stripe');

// PayPal Payment Gateway
Route::get('/payment-paypal/{planId}', 'Payment\PaypalController@paywithpaypal')->name('paywithpaypal');
Route::get('/cancel-paypal/{agreementId}', 'Payment\PaypalController@cancelWithPaypal')->name('cancelWithPaypal');
Route::get('/payment/status', 'Payment\PaypalController@paypalPaymentStatus')->name('paypalPaymentStatus');
Route::get('/execute/agreement', 'Payment\PaypalController@executeAgreement')->name('execute-agreement');
Route::get('/test/{id}', 'Payment\PaypalController@test');

// RazorPay
Route::get('payment-razorpay/{planId}', 'Payment\RazorpayController@prepareRazorpay')->name('paywithrazorpay');
Route::get('razorpay-payment-status/{oid}/{paymentId}', 'Payment\RazorpayController@razorpayPaymentStatus')->name('razorpay.payment.status');

// Stripe
Route::get('/payment-stripe/{planId}', 'Payment\StripeController@stripeCheckout')->name('paywithstripe');
Route::post('/stripe-payment-status/{paymentId}', 'Payment\StripeController@stripePaymentStatus')->name('stripe.payment.status');
Route::get('/stripe-payment-cancel/{paymentId}', 'Payment\StripeController@stripePaymentCancel')->name('stripe.payment.cancel');
Route::post('/stripe-webhook', [\App\Http\Controllers\Payment\StripeWebhookController::class, 'webhook']);


// Offline
Route::get('/payment-offline/{planId}', 'Payment\OfflineController@offlineCheckout')->name('paywithoffline');
Route::post('/mark-offline-payment', 'Payment\OfflineController@markOfflinePayment')->name('mark.payment.payment');

// Google Auth
Route::get('/google-login', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('/sign-in-with-google', 'Auth\LoginController@handleProviderCallback');

// Profile
Route::get('{id}', 'ProfileController@profile', 'ShareWidget')->name('profile');

Route::get('/download/{id}', 'ProfileController@downloadVcard')->name('download.vCard');
