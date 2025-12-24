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
use App\Http\Controllers\Admin\PressController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\SellRoomController;
use App\Http\Controllers\Admin\SubAdminController;
use App\Http\Controllers\Admin\SellARoomController;
use App\Http\Controllers\Admin\HowItWorksController;
use App\Http\Controllers\Admin\CustomFormsController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\TrustAndSafetyController;
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

// ############ Cancellation Guide One #################
Route::get('/cancellation-guide-one', [CancellationGuideController::class, 'cancellationGuideIndex'])->name('cancellationguide.index')->middleware('check.permission:Cancellation Guide,view');
Route::get('/cancellation-guide-edit/{id}', [CancellationGuideController::class, 'cancellationGuideEdit'])->name('cancellationguide.edit')->middleware('check.permission:Cancellation Guide,edit');
Route::post('/cancellation-guide-update/{id}', [CancellationGuideController::class, 'cancellationGuideUpdate'])->name('cancellationguide.update')->middleware('check.permission:Cancellation Guide,edit');
Route::get('/cancellation-guide-show/{id}', [CancellationGuideController::class, 'cancellationGuideShow'])->name('cancellationguide.show')->middleware('check.permission:Cancellation Guide,show');
Route::get('/cancellation-guide-show-edit/{id}', [CancellationGuideController::class, 'cancellationGuideShowEdit'])->name('cancellationguide.showedit')->middleware('check.permission:Cancellation Guide,edit');
Route::post('/cancellation-guide-show-update/{id}', [CancellationGuideController::class, 'cancellationGuideShowUpdate'])->name('cancellationguide.showupdate')->middleware('check.permission:Cancellation Guide,edit');

// ############ Cancellation Guide Two #################
Route::get('/cancellation-guide-two', [CancellationGuideController::class, 'cancellationGuideTwoIndex'])->name('cancellationguidetwo.index')->middleware('check.permission:Cancellation Guide Two,view');
Route::get('/cancellation-guide-two-edit', [CancellationGuideController::class, 'cancellationGuideTwoEdit'])->name('cancellationguidetwo.edit')->middleware('check.permission:Cancellation Guide Two,edit');
Route::post('/cancellation-guide-two-update', [CancellationGuideController::class, 'cancellationGuideTwoUpdate'])->name('cancellationguidetwo.update')->middleware('check.permission:Cancellation Guide Two,edit');
Route::get('/cancellation-guide-two-view', [CancellationGuideController::class, 'cancellationGuideTwoView']) ->middleware('check.permission:Cancellation Guide Two,view');

// ############ Sell a room #################
Route::get('/sell-a-room', [SellARoomController::class, 'sellARoomIndex'])->name('sellaroom.index')->middleware('check.permission:Sell a Room,view');
Route::get('/sell-a-room-edit', [SellARoomController::class, 'sellARoomEdit'])->name('sellaroom.edit')->middleware('check.permission:Sell a Room,edit');
Route::post('/sell-a-room-update', [SellARoomController::class, 'sellARoomUpdate'])->name('sellaroom.update')->middleware('check.permission:Sell a Room,edit');
Route::get('/sell-a-room-view', [SellARoomController::class, 'sellARoomView']) ->middleware('check.permission:Sell a Room,view');

// ############ Sell Reservation #################
Route::get('/sell-reservation', [SellRoomController::class, 'sellReservationIndex'])->name('sellreservation.index')->middleware('check.permission:Sell Reservation,view');
Route::get('/sell-reservation-edit/{id}', [SellRoomController::class, 'sellReservationEdit'])->name('sellreservation.edit')->middleware('check.permission:Sell Reservation,edit');
Route::post('/sell-reservation-update/{id}', [SellRoomController::class, 'sellReservationUpdate'])->name('sellreservation.update')->middleware('check.permission:Sell Reservation,edit');

// ############ How Roomeno Works #################
Route::get('/roomeno-works', [SellRoomController::class, 'roomenoWorksIndex'])->name('roomenoworks.index')->middleware('check.permission:How Roomeno Works,view');
Route::get('/roomeno-works-edit/{id}', [SellRoomController::class, 'roomenoWorksEdit'])->name('roomenoworks.edit')->middleware('check.permission:How Roomeno Works,edit');
Route::post('/roomeno-works-update/{id}', [SellRoomController::class, 'roomenoWorksUpdate'])->name('roomenoworks.update')->middleware('check.permission:How Roomeno Works,edit');
Route::get('/roomeno-works-show/{id}', [SellRoomController::class, 'roomenoWorksShow'])->name('roomenoworks.show')->middleware('check.permission:How Roomeno Works,show');
Route::get('/roomeno-works-show-edit/{id}', [SellRoomController::class, 'roomenoWorksShowEdit'])->name('roomenoworks.showedit')->middleware('check.permission:How Roomeno Works,edit');
Route::post('/roomeno-works-show-update/{id}', [SellRoomController::class, 'roomenoWorksShowUpdate'])->name('roomenoworks.showupdate')->middleware('check.permission:How Roomeno Works,edit');

// ############ We Protect Our Sellers ############
Route::get('/protect-sellers', [SellRoomController::class, 'protectSellersIndex'])->name('protectsellers.index')->middleware('check.permission:We Protect Our Sellers,view');
Route::get('/protect-sellers-edit/{id}', [SellRoomController::class, 'protectSellersEdit'])->name('protectsellers.edit')->middleware('check.permission:We Protect Our Sellers,edit');
Route::post('/protect-sellers-update/{id}', [SellRoomController::class, 'protectSellerUpdate'])->name('protectsellers.update')->middleware('check.permission:We Protect Our Sellers,edit');
Route::get('/protect-sellers-show/{id}', [SellRoomController::class, 'protectSellersShow'])->name('protectsellers.show')->middleware('check.permission:We Protect Our Sellers,show');
Route::get('/protect-sellers-show-edit/{id}', [SellRoomController::class, 'protectSellersShowEdit'])->name('protectsellers.showedit')->middleware('check.permission:We Protect Our Sellers,edit');
Route::post('/protect-sellers-show-update/{id}', [SellRoomController::class, 'protectSellersShowUpdate'])->name('protectsellers.showupdate')->middleware('check.permission:We Protect Our Sellers,edit');

// ############ Cancellation Policy ############
Route::get('/cancellation-policy', [CancellationGuideController::class, 'cancellationPolicyIndex'])->name('cancellationpolicy.index')->middleware('check.permission:Cancellation Policy,view');
Route::get('/cancellation-policy-edit', [CancellationGuideController::class, 'cancellationPolicyEdit'])->name('cancellationpolicy.edit')->middleware('check.permission:Cancellation Policy,edit');
Route::post('/cancellation-policy-update', [CancellationGuideController::class, 'cancellationPolicyUpdate'])->name('cancellationpolicy.update')->middleware('check.permission:Cancellation Policy,edit');
Route::get('/cancellation-policy-show/{id}', [CancellationGuideController::class, 'cancellationPolicyShow'])->name('cancellationpolicy.show')->middleware('check.permission:Cancellation Policy,show');
Route::get('/cancellation-policy-show-edit/{id}', [CancellationGuideController::class, 'cancellationPolicyShowEdit'])->name('cancellationpolicy.showedit')->middleware('check.permission:Cancellation Policy,edit');
Route::post('/cancellation-policy-show-update/{id}', [CancellationGuideController::class, 'cancellationPolicyShowUpdate'])->name('cancellationpolicy.showupdate')->middleware('check.permission:Cancellation Policy,edit');

// ############ Career ############ 
Route::get('/career', [CareerController::class, 'careerIndex'])->name('career.index')->middleware('check.permission:Career,view');
Route::get('/career-edit/{id}', [CareerController::class, 'careerEdit'])->name('career.edit')->middleware('check.permission:Career,edit');
Route::post('/career-update/{id}', [CareerController::class, 'careerUpdate'])->name('career.update')->middleware('check.permission:Career,edit');
Route::get('/career-show/{id}', [CareerController::class, 'careerShow'])->name('career.show')->middleware('check.permission:Career,show');
Route::get('/career-show-edit/{id}', [CareerController::class, 'careerShowEdit'])->name('career.showedit')->middleware('check.permission:Career,edit');
Route::post('/career-show-update/{id}', [CareerController::class, 'careerShowUpdate'])->name('career.showupdate')->middleware('check.permission:Career,edit');

// ############ Partner with us Introduction ############ 

Route::get('/partner-introduction', [PartnerController::class, 'partnerIntroductionIndex'])->name('partnerintroduction.index')->middleware('check.permission:Partner Introduction,view');
Route::get('/partner-introduction-edit/{id}', [PartnerController::class, 'partnerIntroductionEdit'])->name('partnerintroduction.edit')->middleware('check.permission:Partner Introduction,edit');
Route::post('/partner-introduction-update/{id}', [PartnerController::class, 'partnerIntroductionUpdate'])->name('partnerintroduction.update')->middleware('check.permission:Partner Introduction,edit');

// ############ Roomeno helps hotels ############ 
Route::get('/roomeno-helps-hotels', [PartnerController::class, 'helpHotelIndex'])->name('helphotel.index')->middleware('check.permission:Roomeno helps hotels,view');
Route::get('/roomeno-helps-hotels-edit/{id}', [PartnerController::class, 'helpHotelEdit'])->name('helphotel.edit')->middleware('check.permission:Roomeno helps hotels,edit');
Route::post('/roomeno-helps-hotels-update/{id}', [PartnerController::class, 'helpHotelUpdate'])->name('helphotel.update')->middleware('check.permission:Roomeno helps hotels,edit');
Route::get('/roomeno-helps-hotels-show/{id}', [PartnerController::class, 'helpHotelShow'])->name('helphotel.show')->middleware('check.permission:Roomeno helps hotels,show');
Route::get('/roomeno-helps-hotels-show-edit/{id}', [PartnerController::class, 'helpHotelShowEdit'])->name('helphotel.showedit')->middleware('check.permission:Roomeno helps hotels,edit');
Route::post('/roomeno-helps-hotels-show-update/{id}', [PartnerController::class, 'helpHotelShowUpdate'])->name('helphotel.showupdate')->middleware('check.permission:Roomeno helps hotels,edit');

// ############ Roomeno Helps Agencies ############ 
Route::get('/roomeno-helps-agencies', [PartnerController::class, 'helpAgencyIndex'])->name('helpagency.index')->middleware('check.permission:Roomeno helps Agencies,view');
Route::get('/roomeno-helps-agencies-edit/{id}', [PartnerController::class, 'helpAgencyEdit'])->name('helpagency.edit')->middleware('check.permission:Roomeno helps Agencies,edit');
Route::post('/roomeno-helps-agencies-update/{id}', [PartnerController::class, 'helpAgencyUpdate'])->name('helpagency.update')->middleware('check.permission:Roomeno helps Agencies,edit');
Route::get('/roomeno-helps-agencies-show/{id}', [PartnerController::class, 'helpAgencyShow'])->name('helpagency.show')->middleware('check.permission:Roomeno helps Agencies,show');
Route::get('/roomeno-helps-agencies-show-edit/{id}', [PartnerController::class, 'helpAgencyShowEdit'])->name('helpagency.showedit')->middleware('check.permission:Roomeno helps Agencies,edit');
Route::post('/roomeno-helps-agencies-show-update/{id}', [PartnerController::class, 'helpAgencyShowUpdate'])->name('helpagency.showupdate')->middleware('check.permission:Roomeno helps Agencies,edit');

// ############ Roomeno Solutions ############ 
Route::get('/roomeno-solutions', [PartnerController::class, 'roomenoSolutionIndex'])->name('roomenosolution.index')->middleware('check.permission:Roomeno Solutions,view');
Route::get('/roomeno-solutions-edit/{id}', [PartnerController::class, 'roomenoSolutionEdit'])->name('roomenosolution.edit')->middleware('check.permission:Roomeno Solutions,edit');
Route::post('/roomeno-solutions-update/{id}', [PartnerController::class, 'roomenoSolutionUpdate'])->name('roomenosolution.update')->middleware('check.permission:Roomeno Solutions,edit');
Route::get('/roomeno-solutions-show/{id}', [PartnerController::class, 'roomenoSolutionShow'])->name('roomenosolution.show')->middleware('check.permission:Roomeno Solutions,show');
Route::get('/roomeno-solutions-show-edit/{id}', [PartnerController::class, 'roomenoSolutionShowEdit'])->name('roomenosolution.showedit')->middleware('check.permission:Roomeno Solutions,edit');
Route::post('/roomeno-solutions-show-update/{id}', [PartnerController::class, 'roomenoSolutionShowUpdate'])->name('roomenosolution.showupdate')->middleware('check.permission:Roomeno Solutions,edit');

// ############ Press ############ 
Route::get('/press', [PressController::class, 'pressIndex'])->name('press.index')->middleware('check.permission:Press,view');
Route::get('/press-edit/{id}', [PressController::class, 'pressEdit'])->name('press.edit')->middleware('check.permission:Press,edit');
Route::post('/press-update/{id}', [PressController::class, 'pressUpdate'])->name('press.update')->middleware('check.permission:Press,edit');

// ############ Trust & Safety Introduction ############ 
Route::get('/trust-and-safety-introduction', [TrustAndSafetyController::class, 'trustIntroIndex'])->name('trustintro.index')->middleware('check.permission:Trust & Safety,view');
Route::get('/trust-and-safety-introduction-edit/{id}', [TrustAndSafetyController::class, 'trustIntroEdit'])->name('trustintro.edit')->middleware('check.permission:Trust & Safety,edit');
Route::post('/trust-and-safety-introduction-update/{id}', [TrustAndSafetyController::class, 'trustIntroUpdate'])->name('trustintro.update')->middleware('check.permission:Trust & Safety,edit');

// ############ Trust & Safety Protect our buyers ############ 
Route::get('/protect-our-buyers', [TrustAndSafetyController::class, 'protectBuyerIndex'])->name('protectbuyer.index')->middleware('check.permission:Protect our buyers,view');
Route::get('/protect-our-buyers-edit/{id}', [TrustAndSafetyController::class, 'protectBuyerEdit'])->name('protectbuyer.edit')->middleware('check.permission:Protect our buyers,edit');
Route::post('/protect-our-buyers-update/{id}', [TrustAndSafetyController::class, 'protectBuyerUpdate'])->name('protectbuyer.update')->middleware('check.permission:Protect our buyers,edit');
Route::get('/protect-our-buyers-show/{id}', [TrustAndSafetyController::class, 'protectBuyerShow'])->name('protectbuyer.show')->middleware('check.permission:Protect our buyers,show');
Route::get('/protect-our-buyers-show-edit/{id}', [TrustAndSafetyController::class, 'protectBuyerShowEdit'])->name('protectbuyer.showedit')->middleware('check.permission:Protect our buyers,edit');
Route::post('/protect-our-buyers-show-update/{id}', [TrustAndSafetyController::class, 'protectBuyerShowUpdate'])->name('protectbuyer.showupdate')->middleware('check.permission:Protect our buyers,edit');

// ############ Trust & Safety Protect our sellers ############ 
Route::get('/protect-our-sellers', [TrustAndSafetyController::class, 'protectSellerIndex'])->name('protectseller.index')->middleware('check.permission:Protect our sellers,view');
Route::get('/protect-our-sellers-edit/{id}', [TrustAndSafetyController::class, 'protectSellerEdit'])->name('protectseller.edit')->middleware('check.permission:Protect our sellers,edit');
Route::post('/protect-our-sellers-update/{id}', [TrustAndSafetyController::class, 'protectSellerUpdate'])->name('protectseller.update')->middleware('check.permission:Protect our sellers,edit');
Route::get('/protect-our-sellers-show/{id}', [TrustAndSafetyController::class, 'protectSellerShow'])->name('protectseller.show')->middleware('check.permission:Protect our sellers,show');
Route::get('/protect-our-sellers-show-edit/{id}', [TrustAndSafetyController::class, 'protectSellerShowEdit'])->name('protectseller.showedit')->middleware('check.permission:Protect our sellers,edit');
Route::post('/protect-our-sellers-show-update/{id}', [TrustAndSafetyController::class, 'protectSellerShowUpdate'])->name('protectseller.showupdate')->middleware('check.permission:Protect our sellers,edit');

// ############ Trust & Safety Not real reservation ############ 
Route::get('/not-real-reservation', [TrustAndSafetyController::class, 'realReservationIndex'])->name('realreservation.index')->middleware('check.permission:Verified Reservations,view');
Route::get('/not-real-reservation-edit/{id}', [TrustAndSafetyController::class, 'realReservationEdit'])->name('realreservation.edit')->middleware('check.permission:Verified Reservations,edit');
Route::post('/not-real-reservation-update/{id}', [TrustAndSafetyController::class, 'realReservationUpdate'])->name('realreservation.update')->middleware('check.permission:Verified Reservations,edit');
Route::get('/not-real-reservation-show/{id}', [TrustAndSafetyController::class, 'realReservationShow'])->name('realreservation.show')->middleware('check.permission:Verified Reservations,show');
Route::get('/not-real-reservation-show-edit/{id}', [TrustAndSafetyController::class, 'realReservationShowEdit'])->name('realreservation.showedit')->middleware('check.permission:Verified Reservations,edit');
Route::post('/not-real-reservation-show-update/{id}', [TrustAndSafetyController::class, 'realReservationShowUpdate'])->name('realreservation.showupdate')->middleware('check.permission:Verified Reservations,edit');

// ############ Trust & Safety roomeno benefits everyone ############ 
Route::get('/roomeno-benefits-everyone', [TrustAndSafetyController::class, 'roomenoBenefitsIndex'])->name('roomenobenefits.index')->middleware('check.permission:Roomeno benefits everyone,view');
Route::get('/roomeno-benefits-everyone-edit/{id}', [TrustAndSafetyController::class, 'roomenoBenefitsEdit'])->name('roomenobenefits.edit')->middleware('check.permission:Roomeno benefits everyone,edit');
Route::post('/roomeno-benefits-everyone-update/{id}', [TrustAndSafetyController::class, 'roomenoBenefitsUpdate'])->name('roomenobenefits.update')->middleware('check.permission:Roomeno benefits everyone,edit');
Route::get('/roomeno-benefits-everyone-show/{id}', [TrustAndSafetyController::class, 'roomenoBenefitsShow'])->name('roomenobenefits.show')->middleware('check.permission:Roomeno benefits everyone,show');
Route::get('/roomeno-benefits-everyone-show-edit', [TrustAndSafetyController::class, 'roomenoBenefitsShowEdit'])->name('roomenobenefits.showedit')->middleware('check.permission:Roomeno benefits everyone,edit');
Route::post('/roomeno-benefits-everyone-show-update', [TrustAndSafetyController::class, 'roomenoBenefitsShowUpdate'])->name('roomenobenefits.showupdate')->middleware('check.permission:Roomeno benefits everyone,edit');

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
