<?php

use App\Models\Role;
use App\Models\SideMenue;
use App\Models\Permission;
use App\Models\UserRolePermission;
use App\Models\SideMenuHasPermission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\SellRoomController;
use App\Http\Controllers\Admin\SubAdminController;
use App\Http\Controllers\Admin\SellARoomController;
use App\Http\Controllers\Admin\HowItWorksController;
use App\Http\Controllers\Admin\CustomFormsController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\SellerProtectionController;
use App\Http\Controllers\Admin\CancellationGuideController;

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

// | Web Routes
Route::get('/index',[HomeController::class ,'index'])->name('index');
Route::get('/hotel',[HomeController::class ,'hotelinfo'])->name('hotel');




/*Admin routes
 * */

Route::get('/admin', [AuthController::class, 'getLoginPage']);
Route::post('/login', [AuthController::class, 'Login']);
Route::get('/admin-forgot-password', [AdminController::class, 'forgetPassword']);
Route::post('/admin-reset-password-link', [AdminController::class, 'adminResetPasswordLink']);
Route::get('/change_password/{id}', [AdminController::class, 'change_password']);
Route::post('/admin-reset-password', [AdminController::class, 'ResetPassword']);
// routes/web.php
Route::get('admin/users/{id}/form-responses', [UserController::class, 'formResponsesIndex'])
    ->name('users.form_responses');
Route::get('admin/users/form-responses/{id}', [UserController::class, 'show'])->name('form_responses.show');


Route::prefix('admin')->middleware(['admin', 'check.subadmin.status'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'getdashboard'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'getProfile']);
    Route::post('update-profile', [AdminController::class, 'update_profile']);

    // ############ Privacy-policy #################
    Route::get('privacy-policy', [SecurityController::class, 'PrivacyPolicy'])->middleware('check.permission:Privacy & Policy,view');
    Route::get('privacy-policy-edit', [SecurityController::class, 'PrivacyPolicyEdit'])->middleware('check.permission:Privacy & Policy,edit');
    Route::post('privacy-policy-update', [SecurityController::class, 'PrivacyPolicyUpdate']) ->middleware('check.permission:Privacy & Policy,edit');
    Route::get('privacy-policy-view', [SecurityController::class, 'PrivacyPolicyView']) ->middleware('check.permission:Privacy & Policy,view');

    // ############ Role Permissions #################

	// ########## Form Details #################
    Route::get('/companies', [CustomFormsController::class, 'index'])->name('admin.companies.index');
	Route::get('/companies-details/{form_no}', [CustomFormsController::class, 'show'])->name('admin.companies.show');
	Route::delete('/admin/form-fields/{id}', [CustomFormsController::class, 'destroy'])->name('admin.form-fields.destroy');


// form controller routes

    Route::get('/companies-forms-create', [CustomFormsController::class, 'createView'])->name('forms.create');
	Route::post('/forms-store', [CustomFormsController::class, 'store'])->name('forms.store');


            // ############ Roles #################

        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index')->middleware('check.permission:Roles,view');

        Route::get('/roles-create', [RoleController::class, 'create'])->name('create.role')->middleware('check.permission:Roles,create');

        Route::post('/store-role', [RoleController::class, 'store'])->name('store.role')->middleware('check.permission:Roles,create');


        Route::get('/roles-permissions/{id}', [RoleController::class, 'permissions'])->name('role.permissions')->middleware('check.permission:Roles,edit');


        //////////////////////////////////////////
        Route::post('/admin/roles/{id}/permissions/store', [RoleController::class, 'storePermissions'])->name('roles.permissions.store')->middleware('check.permission:role,create');


        Route::delete('/delete-role/{id}', [RoleController::class, 'delete'])->name('delete.role')->middleware('check.permission:role,delete');

    

    // ############ Term & Condition #################
    Route::get('term-condition', [SecurityController::class, 'TermCondition']) ->middleware('check.permission:Terms & Conditions,view');
    Route::get('term-condition-edit', [SecurityController::class, 'TermConditionEdit']) ->middleware('check.permission:Terms & Conditions,edit');
    Route::post('term-condition-update', [SecurityController::class, 'TermConditionUpdate']) ->middleware('check.permission:Terms & Conditions
,edit');
    Route::get('term-condition-view', [SecurityController::class, 'TermConditionView']) ->middleware('check.permission:Terms & Conditions
,view');

    // ############ About Us #################
    Route::get('about-us', [SecurityController::class, 'AboutUs']) ->middleware('check.permission:About us,view');
    Route::get('about-us-edit', [SecurityController::class, 'AboutUsEdit']) ->middleware('check.permission:About us,edit');
    Route::post('about-us-update', [SecurityController::class, 'AboutUsUpdate']) ->middleware('check.permission:About us,edit');
    Route::get('about-us-view', [SecurityController::class, 'AboutUsView']) ->middleware('check.permission:About us,view');

    Route::get('logout', [AdminController::class, 'logout']);

        // ############ Faq #################
    Route::get('faq', [FaqController::class, 'Faq'])->middleware('check.permission:Faqs,view');
    Route::get('faq-edit/{id}', [FaqController::class, 'FaqsEdit'])->name('faq.edit') ->middleware('check.permission:Faqs,edit');
    Route::post('faq-update/{id}', [FaqController::class, 'FaqsUpdate'])->middleware('check.permission:Faqs,edit');
    Route::get('faq-view', [FaqController::class, 'FaqView']) ->middleware('check.permission:Faqs,view');
    Route::get('faq-create', [FaqController::class, 'Faqscreateview']) ->middleware('check.permission:Faqs,create');
    Route::post('faq-store', [FaqController::class, 'Faqsstore']) ->middleware('check.permission:Faqs,create');
      Route::delete('faq-destroy/{id}', [FaqController::class, 'faqdelete'])->name('faq.destroy');
    Route::post('/faqs/reorder', [FaqController::class, 'reorder'])->name('faq.reorder');

    // ############ Users #################

    Route::get('/user', [UserController::class, 'Index'])->name('user.index') ->middleware('check.permission:Users,view');
Route::get('/user-create', [UserController::class, 'createview'])->name('user.createview') ->middleware('check.permission:Users,create');
Route::post('/user-store', [UserController::class, 'create'])->name('user.create') ->middleware('check.permission:Users,create');
Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('user.edit') ->middleware('check.permission:Users,edit');
Route::post('/user-update/{id}', [UserController::class, 'update'])->name('user.update') ->middleware('check.permission:Users,edit');
Route::delete('/users-destory/{id}', [UserController::class, 'delete'])->name('user.delete') ->middleware('check.permission:Users,delete');
// Route::get('/users/trashed', [UserController::class, 'trashed']);
// Route::post('/users/{id}/restore', [UserController::class, 'restore']);
Route::delete('/users/{id}/force', [UserController::class, 'forceDelete'])->name('user.forceDelete')->middleware('check.permission:Users,delete');

Route::post('/users/toggle-status', [UserController::class, 'toggleStatus'])->name('user.toggle-status');

// ############ Hotel Info #################
Route::get('/hotel-info', [SellRoomController::class, 'hotelInfoIndex'])->name('hotelinfo.index')->middleware('check.permission:HotelInfo,view');
Route::post('/hotel/toggle-status', [SellRoomController::class, 'toggleStatus'])->name('hotel.toggle-status');

// ############ Reservation Info #################
Route::get('/reservation-info', [SellRoomController::class, 'reservationInfoIndex'])->name('reservationinfo.index')->middleware('check.permission:ReservationInfo,view');
// ############ Payment Info #################
Route::get('/payment-info/{reservation}', [SellRoomController::class, 'paymentInfoIndex'])->name('paymentinfo.index');

// ############ Bookings  #################
Route::get('/bookings', [BookingController::class, 'bookingIndex'])->name('booking.index')->middleware('check.permission:Bookings,view');
Route::get('/booking/count', [BookingController::class, 'bookingCounter'])->name('booking.counter');
Route::post('/booking/approve/{id}', [BookingController::class, 'approve'])->name('booking.approve');
Route::post('/booking/reject/{id}', [BookingController::class, 'reject'])->name('booking.reject');

// ############ Selling #################
Route::get('/selling', [HowItWorksController::class, 'sellingMain'])->name('selling.index')->middleware('check.permission:Selling,view');
Route::get('/selling-edit/{id}', [HowItWorksController::class, 'edit'])->name('selling.edit')->middleware('check.permission:Selling,edit');
Route::post('/selling-update/{id}', [HowItWorksController::class, 'update'])->name('selling.update')->middleware('check.permission:Selling,edit');
Route::get('/selling-show/{id}', [HowItWorksController::class, 'show'])->name('selling.show')->middleware('check.permission:Selling,show');
Route::get('/sellingshow-edit/{id}', [HowItWorksController::class, 'editsellingshow'])->name('sellingshow.edit')->middleware('check.permission:Selling,edit');
Route::post('/sellingshow-update/{id}', [HowItWorksController::class,  'updatesellingshow'])->name('sellingshow.update')->middleware('check.permission:Selling,edit');

// ############ Buying #################
Route::get('/buying', [HowItWorksController::class, 'buyingMain'])->name('buying.index')->middleware('check.permission:Buying,view');
Route::get('/buying-edit/{id}', [HowItWorksController::class, 'edit'])->name('buying.edit')->middleware('check.permission:Buying,edit');
Route::post('/buying-update/{id}', [HowItWorksController::class, 'update'])->name('buying.update')->middleware('check.permission:Buying,edit');
Route::get('/buying-show/{id}', [HowItWorksController::class, 'showbuying'])->name('buying.show')->middleware('check.permission:Buying,show');
Route::get('/buyingshow-edit/{id}', [HowItWorksController::class, 'editbuyingshow'])->name('buyingshow.edit')->middleware('check.permission:Buying,edit');
Route::post('/buyingshow-update/{id}', [HowItWorksController::class,  'updatebuyingshow'])->name('buyingshow.update')->middleware('check.permission:Buying,edit');

// ############ Questions #################
Route::get('/questions', [HowItWorksController::class, 'questionsIndex'])->name('questions.index')->middleware('check.permission:Questions,view');
Route::get('/questions-edit/{id}', [HowItWorksController::class, 'questionsEdit'])->name('questions.edit')->middleware('check.permission:Questions,edit');
Route::post('/questions-update/{id}', [HowItWorksController::class, 'questionsUpdate'])->name('questions.update')->middleware('check.permission:Questions,edit');

// ############ Seller Protection Introduction #################
Route::get('/seller-protection-intro', [SellerProtectionController::class, 'sellerProtectionIntroIndex'])->name('sellerprotectionintro.index')->middleware('check.permission:Seller Protection Introduction,view');
Route::get('/seller-protection-intro-edit/{id}', [SellerProtectionController::class, 'sellerProtectionIntroEdit'])->name('sellerprotectionintro.edit')->middleware('check.permission:Seller Protection Introduction,edit');
Route::post('/seller-protection-intro-update/{id}', [SellerProtectionController::class, 'sellerProtectionIntroUpdate'])->name('sellerprotectionintro.update')->middleware('check.permission:Seller Protection Introduction,edit');

// ############ Seller Protection Section One #################
Route::get('/seller-protection-section-one', [SellerProtectionController::class, 'sellerProtectionSectionOneIndex'])->name('sellerprotectionsectionone.index')->middleware('check.permission:Seller Protection Section One,view');
Route::get('/seller-protection-section-one-edit/{id}', [SellerProtectionController::class, 'sellerProtectionSectionOneEdit'])->name('sellerprotectionsectionone.edit')->middleware('check.permission:Seller Protection Section One,edit');
Route::post('/seller-protection-section-one-update/{id}', [SellerProtectionController::class, 'sellerProtectionSectionOneUpdate'])->name('sellerprotectionsectionone.update')->middleware('check.permission:Seller Protection Section One,edit');
Route::get('/seller-protection-section-one-show/{id}', [SellerProtectionController::class, 'sellerProtectionSectionOneShow'])->name('sellerprotectionsectionone.show')->middleware('check.permission:Seller Protection Section One,show');
Route::get('/seller-protection-section-one-show-edit/{id}', [SellerProtectionController::class, 'sellerProtectionSectionOneShowEdit'])->name('sellerprotectionsectionone.showedit')->middleware('check.permission:Seller Protection Section One,edit');
Route::post('/seller-protection-section-one-show-update/{id}', [SellerProtectionController::class, 'sellerProtectionSectionOneShowUpdate'])->name('sellerprotectionsectionone.showupdate')->middleware('check.permission:Seller Protection Section One,edit');

// ############ Seller Protection Section Two #################
Route::get('/seller-protection-section-two', [SellerProtectionController::class, 'sellerProtectionSectionTwoIndex'])->name('sellerprotectionsectiontwo.index')->middleware('check.permission:Seller Protection Section Two,view');
Route::get('/seller-protection-section-two-edit/{id}', [SellerProtectionController::class, 'sellerProtectionSectionTwoEdit'])->name('sellerprotectionsectiontwo.edit')->middleware('check.permission:Seller Protection Section Two,edit');  
Route::post('/seller-protection-section-two-update/{id}', [SellerProtectionController::class, 'sellerProtectionSectionTwoUpdate'])->name('sellerprotectionsectiontwo.update')->middleware('check.permission:Seller Protection Section Two,edit');
Route::get('/seller-protection-section-two-show/{id}', [SellerProtectionController::class, 'sellerProtectionSectionTwoShow'])->name('sellerprotectionsectiontwo.show')->middleware('check.permission:Seller Protection Section Two,show');
Route::get('/seller-protection-section-two-show-edit/{id}', [SellerProtectionController::class, 'sellerProtectionSectionTwoShowEdit'])->name('sellerprotectionsectiontwo.showedit')->middleware('check.permission:Seller Protection Section Two,edit');
Route::post('/seller-protection-section-two-show-update/{id}', [SellerProtectionController::class, 'sellerProtectionSectionTwoShowUpdate'])->name('sellerprotectionsectiontwo.showupdate')->middleware('check.permission:Seller Protection Section Two,edit');

// ############ Seller Protection Section Three #################
Route::get('/seller-protection-section-three', [SellerProtectionController::class, 'sellerProtectionSectionThreeIndex'])->name('sellerprotectionsectionthree.index')->middleware('check.permission:Seller Protection Section Three,view');
Route::get('/seller-protection-section-three-edit/{id}', [SellerProtectionController::class, 'sellerProtectionSectionThreeEdit'])->name('sellerprotectionsectionthree.edit')->middleware('check.permission:Seller Protection Section Three,edit');  
Route::post('/seller-protection-section-three-update/{id}', [SellerProtectionController::class, 'sellerProtectionSectionThreeUpdate'])->name('sellerprotectionsectionthree.update')->middleware('check.permission:Seller Protection Section Three,edit');
Route::get('/seller-protection-section-three-show/{id}', [SellerProtectionController::class , 'sellerProtectionSectionThreeShow'])->name('sellerprotectionsectionthree.show')->middleware('check.permission:Seller Protection Section Three,show');
Route::get('/seller-protection-section-three-show-edit/{id}', [SellerProtectionController::class, 'sellerProtectionSectionThreeShowEdit'])->name('sellerprotectionsectionthree.showedit')->middleware('check.permission:Seller Protection Section Three,edit');
Route::post('/seller-protection-section-three-show-update/{id}', [SellerProtectionController::class, 'sellerProtectionSectionThreeShowUpdate'])->name('sellerprotectionsectionthree.showupdate')->middleware('check.permission:Seller Protection Section Three,edit');

// ############ Cancellation Guide #################
Route::get('/cancellation-guide', [CancellationGuideController::class, 'cancellationGuideIndex'])->name('cancellationguide.index')->middleware('check.permission:Cancellation Guide,view');
Route::get('/cancellation-guide-edit/{id}', [CancellationGuideController::class, 'cancellationGuideEdit'])->name('cancellationguide.edit')->middleware('check.permission:Cancellation Guide,edit');
Route::post('/cancellation-guide-update/{id}', [CancellationGuideController::class, 'cancellationGuideUpdate'])->name('cancellationguide.update')->middleware('check.permission:Cancellation Guide,edit');
Route::get('/cancellation-guide-show/{id}', [CancellationGuideController::class, 'cancellationGuideShow'])->name('cancellationguide.show')->middleware('check.permission:Cancellation Guide,show');
Route::get('/cancellation-guide-show-edit/{id}', [CancellationGuideController::class, 'cancellationGuideShowEdit'])->name('cancellationguide.showedit')->middleware('check.permission:Cancellation Guide,edit');
Route::post('/cancellation-guide-show-update/{id}', [CancellationGuideController::class, 'cancellationGuideShowUpdate'])->name('cancellationguide.showupdate')->middleware('check.permission:Cancellation Guide,edit');

// ############ Sell a room #################
Route::get('/sell-a-room', [SellARoomController::class, 'sellARoomIndex'])->name('sellaroom.index')->middleware('check.permission:Sell a Room,view');
Route::get('/sell-a-room-edit', [SellARoomController::class, 'sellARoomEdit'])->name('sellaroom.edit')->middleware('check.permission:Sell a Room,edit');
Route::post('/sell-a-room-update', [SellARoomController::class, 'sellARoomUpdate'])->name('sellaroom.update')->middleware('check.permission:Sell a Room,edit');
Route::get('/sell-a-room-view', [SellARoomController::class, 'sellARoomView']) ->middleware('check.permission:Sell a Room,view');

    // ############ Sub Admin #################
    Route::controller(SubAdminController::class)->group(function () {
        Route::get('/subadmin',  'index')->name('subadmin.index') ->middleware('check.permission:Sub Admins,view');
        Route::get('/subadmin-create',  'create')->name('subadmin.create') ->middleware('check.permission:Sub Admins,create');
        Route::post('/subadmin-store',  'store')->name('subadmin.store') ->middleware('check.permission:Sub Admins,create');
        Route::get('/subadmin-edit/{id}',  'edit')->name('subadmin.edit') ->middleware('check.permission:Sub Admins,edit');
        Route::post('/subadmin-update/{id}',  'update')->name('subadmin.update') ->middleware('check.permission:Sub Admins,edit');
        Route::delete('/subadmin-destroy/{id}',  'destroy')->name('subadmin.destroy') ->middleware('check.permission:Sub Admins,delete');

        Route::post('/update-permissions/{id}', 'updatePermissions')->name('update.permissions');

        Route::post('/subadmin-StatusChange', 'StatusChange')->name('subadmin.StatusChange')->middleware('check.permission:Sub Admins,edit');

        Route::post('/admin/subadmin/toggle-status', [SubAdminController::class, 'toggleStatus'])->name('admin.subadmin.toggleStatus');

    });


            // ############ Blogs #################

    Route::get('/blogs-index', [BlogController::class, 'index'])->name('blog.index')->middleware('check.permission:Blogs,view');

    Route::get('/blogs-create', [BlogController::class, 'create'])->name('blog.createview')->middleware('check.permission:Blogs,create');

    Route::post('/blogs-store', [BlogController::class, 'store'])->name('blog.store')->middleware('check.permission:Blogs,create');

    Route::get('/blogs-edit/{id}', [BlogController::class, 'edit'])->name('blog.edit')->middleware('check.permission:Blogs,edit');
    Route::post('/blogs-update/{id}', [BlogController::class, 'update'])->name('blog.update')->middleware('check.permission:Blogs,edit');
    Route::delete('/blogs-destroy/{id}', [BlogController::class, 'delete'])->name('blog.destroy')->middleware('check.permission:Blogs,delete');

    Route::post('/blogs/toggle-status', [BlogController::class, 'toggleStatus'])->name('blog.toggle-status');
Route::post('/blogs/reorder', [BlogController::class, 'reorder'])->name('blog.reorder');


 // ############ Notifications #################

    Route::controller(NotificationController::class)->group(function () {

        Route::get('/notification',  'index')->name('notification.index') ->middleware('check.permission:Notifications,view');

        Route::post('/notification-store',  'store')->name('notification.store')->middleware('check.permission:Notifications,create');

        Route::delete('/notification-destroy/{id}',  'destroy')->name('notification.destroy') ->middleware('check.permission:Notifications,delete');
        Route::delete('/notifications/delete-all', 'deleteAll')->name('notifications.deleteAll');
        Route::get('/get-users-by-type', 'getUsersByType');

    });

    // ############ Seo Routes #################

     Route::get('/seo', [SeoController::class, 'index'])->name('seo.index');
    Route::get('/seo/{id}/edit', [SeoController::class, 'edit'])->name('seo.edit');
    Route::post('/seo/{id}', [SeoController::class, 'update'])->name('seo.update');
    Route::get('/admin/seo/page/{id}', [SeoController::class, 'getPage'])->name('seo.page');


    // ############ Web Routes #################

         Route::get('admin/home-page', [WebController::class, 'homepage'])->name('web.homepage');
         Route::get('admin/about-page', [WebController::class, 'Aboutpage'])->name('web.aboutpage');
         Route::get('/contact-page', [WebController::class, 'contactpage'])->name('web.contactpage');
		Route::get('admin/terms-conditions', [WebController::class, 'termsConditionspage'])->name('terms.conditions');
		Route::get('admin/privacy-policy', [WebController::class, 'privacyPolicy'])->name('privacy.policy');
		Route::get('admin/contactUs', [WebController::class, 'Contactuspage'])->name('contact.us');
		

    // ############ Contact Us #################
Route::get('/admin/contact-us', [ContactController::class, 'index'])->name('contact.index') ->middleware('check.permission:Contact us,view');
Route::get('/admin/contact-us-create', [ContactController::class, 'create'])->name('contact.create') ->middleware('check.permission:Contact us,create');
Route::post('/admin/contact-us-store', [ContactController::class, 'store'])->name('contact.store') ->middleware('check.permission:Contact us,create');
Route::get('/admin/contact-us-edit/{id}', [ContactController::class, 'updateview'])->name('contact.updateview') ->middleware('check.permission:Contact us,edit');
Route::post('/admin/contact-us-update/{id}', [ContactController::class, 'update'])->name('contact.update') ;



});
