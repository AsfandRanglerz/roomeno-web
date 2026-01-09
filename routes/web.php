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
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\WebPartnerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PressController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\SellRoomController;
use App\Http\Controllers\Admin\SubAdminController;
use App\Http\Controllers\Admin\ComissionController;
use App\Http\Controllers\Admin\SellARoomController;
use App\Http\Controllers\Admin\HowItWorksController;
use App\Http\Controllers\Admin\CustomFormsController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\RefundHistoryController;
use App\Http\Controllers\Admin\SellerHistoryController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\TrustAndSafetyController;
use App\Http\Controllers\Admin\BuyerProtectionController;
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
Route::post('/admin/login', [AuthController::class, 'Login']);
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
    Route::post('term-condition-update', [SecurityController::class, 'TermConditionUpdate']) ->middleware('check.permission:Terms & Conditions,edit');
    Route::get('term-condition-view', [SecurityController::class, 'TermConditionView']) ->middleware('check.permission:Terms & Conditions,view');

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
Route::get('/hotel-info', [SellRoomController::class, 'hotelInfoIndex'])->name('hotelinfo.index')->middleware('check.permission:Hotel Info,view');
Route::post('/hotel/toggle-status', [SellRoomController::class, 'toggleStatus'])->name('hotel.toggle-status');

// ############ Reservation Info #################
Route::get('/reservation-info', [SellRoomController::class, 'reservationInfoIndex'])->name('reservationinfo.index')->middleware('check.permission:Reservation Info,view');

// ############ Commission #################
Route::get('/commission', [ComissionController::class, 'commissionIndex'])->name('commissions.index')->middleware('check.permission:Commission,view');
Route::get('/commission/edit/{id}', [ComissionController::class, 'commissionEdit'])->name('commissions.edit')->middleware('check.permission:Commission,edit');
Route::post('/commission/update/{id}', [ComissionController::class, 'commissionUpdate'])->name('commissions.update')->middleware('check.permission:Commission,edit');

// ############ Payment Info #################
Route::get('/payment-info/{reservation}', [SellRoomController::class, 'paymentInfoIndex'])->name('paymentinfo.index');

//  ############ Listing #################
Route::get('/listing', [ListingController::class, 'listingIndex'])->name('listing.index')->middleware('check.permission:Listings,view');
Route::get('/listing/count', [ListingController::class, 'listingCounter'])->name('listing.counter');
Route::post('/listing/reset-counter', [ListingController::class, 'resetListingCounter'])->name('listing.reset-counter');
Route::get('/listing-edit/{id}', [ListingController::class, 'listingEdit'])->name('listing.edit')->middleware('check.permission:Listings,edit');
Route::post('/listing-update/{id}', [ListingController::class, 'listingUpdate'])->name('listing.update')->middleware('check.permission:Listings,edit');
Route::post('/listing/toggle-status', [ListingController::class, 'toggleStatus'])->name('listing.toggle-status');
Route::post('/listing/toggle-feature', [ListingController::class, 'toggleFeature'])->name('listing.toggle-feature');

// ############ Bookings  #################
Route::get('/bookings', [BookingController::class, 'bookingIndex'])->name('booking.index')->middleware('check.permission:Bookings,view');
Route::get('/booking/count', [BookingController::class, 'bookingCounter'])->name('booking.counter');
Route::post('/booking/approve/{id}', [BookingController::class, 'approve'])->name('booking.approve');
Route::post('/booking/reject/{id}', [BookingController::class, 'reject'])->name('booking.reject');
Route::post('/booking/{id}/payment', [BookingController::class, 'payment'])->name('booking.payment');
Route::post('/booking/{id}/refund', [BookingController::class, 'refund'])->name('booking.refund');

// ############ Seller History  #################
Route::get('/seller-history', [SellerHistoryController::class, 'index'])->name('sellerhistory.index')->middleware('check.permission:Sellers Payment History,view');

// ############ Refund History  #################
Route::get('/refund-history', [RefundHistoryController::class, 'index'])->name('refundhistory.index')->middleware('check.permission:Refund History,view');

// ############ Buyer Protection Guarantee Protection #################
Route::get('/guarantee-protection', [BuyerProtectionController::class, 'guaranteeProtectionIndex'])->name('guaranteeprotection.index')->middleware('check.permission:Guarantee Protection,view');
Route::get('/guarantee-protection-edit/{id}', [BuyerProtectionController::class, 'guaranteeProtectionEdit'])->name('guaranteeprotection.edit')->middleware('check.permission:Guarantee Protection,edit');
Route::post('/guarantee-protection-update/{id}', [BuyerProtectionController::class, 'guaranteeProtectionUpdate'])->name('guaranteeprotection.update')->middleware('check.permission:Guarantee Protection,edit');

// ############ Buyer Protection Customer Protection & Guarantees #################
Route::get('/service-guarantees', [BuyerProtectionController::class, 'customerProtectionIndex'])->name('customerprotection.index')->middleware('check.permission:Service Guarantees,view');
Route::get('/service-guarantees-edit/{id}', [BuyerProtectionController::class, 'customerProtectionEdit'])->name('customerprotection.edit')->middleware('check.permission:Service Guarantees,edit');
Route::post('/service-guarantees-update/{id}', [BuyerProtectionController::class, 'customerProtectionUpdate'])->name('customerprotection.update')->middleware('check.permission:Service Guarantees,edit');

// ############ Buyer Protection Buyer Protection Questions #################
Route::get('/buyer-protection-questions', [BuyerProtectionController::class, 'protectionQuestionsIndex'])->name('protectionquestions.index')->middleware('check.permission:Buyer Protection Questions,view');
Route::get('/buyer-protection-questions-edit/{id}', [BuyerProtectionController::class, 'protectionQuestionsEdit'])->name('protectionquestions.edit')->middleware('check.permission:Buyer Protection Questions,edit');
Route::post('/buyer-protection-questions-update/{id}', [BuyerProtectionController::class, 'protectionQuestionsUpdate'])->name('protectionquestions.update')->middleware('check.permission:Buyer Protection Questions,edit');
Route::get('/buyer-protection-questions-show/{id}', [BuyerProtectionController::class, 'protectionQuestionsShow'])->name('protectionquestions.show')->middleware('check.permission:Buyer Protection Questions,show');
Route::get('/buyer-protection-questionsshow-edit/{id}', [BuyerProtectionController::class, 'protectionQuestionsShowEdit'])->name('protectionquestions.showedit')->middleware('check.permission:Buyer Protection Questions,edit');
Route::post('/buyer-protection-questionsshow-update/{id}', [BuyerProtectionController::class,  'protectionQuestionsShowUpdate'])->name('protectionquestions.showupdate')->middleware('check.permission:Buyer Protection Questions,edit');

// ############ Selling #################
Route::get('/selling', [HowItWorksController::class, 'sellingMain'])->name('selling.index')->middleware('check.permission:How It Works,view');
Route::get('/selling-edit/{id}', [HowItWorksController::class, 'edit'])->name('selling.edit')->middleware('check.permission:How It Works,edit');
Route::post('/selling-update/{id}', [HowItWorksController::class, 'update'])->name('selling.update')->middleware('check.permission:How It Works,edit');
Route::get('/selling-show/{id}', [HowItWorksController::class, 'show'])->name('selling.show')->middleware('check.permission:How It Works,show');
Route::get('/sellingshow-edit/{id}', [HowItWorksController::class, 'editsellingshow'])->name('sellingshow.edit')->middleware('check.permission:How It Works,edit');
Route::post('/sellingshow-update/{id}', [HowItWorksController::class,  'updatesellingshow'])->name('sellingshow.update')->middleware('check.permission:How It Works,edit');

// ############ Buying #################
Route::get('/buying', [HowItWorksController::class, 'buyingMain'])->name('buying.index')->middleware('check.permission:Buying,view');
Route::get('/buying-edit/{id}', [HowItWorksController::class, 'editbuying'])->name('buying.edit')->middleware('check.permission:Buying,edit');
Route::post('/buying-update/{id}', [HowItWorksController::class, 'updatebuying'])->name('buying.update')->middleware('check.permission:Buying,edit');
Route::get('/buying-show/{id}', [HowItWorksController::class, 'showbuying'])->name('buying.show')->middleware('check.permission:Buying,show');
Route::get('/buyingshow-edit/{id}', [HowItWorksController::class, 'editbuyingshow'])->name('buyingshow.edit')->middleware('check.permission:Buying,edit');
Route::post('/buyingshow-update/{id}', [HowItWorksController::class,  'updatebuyingshow'])->name('buyingshow.update')->middleware('check.permission:Buying,edit');

// ############ Questions #################
Route::get('/questions', [HowItWorksController::class, 'questionsIndex'])->name('questions.index')->middleware('check.permission:Questions,view');
Route::get('/questions-edit/{id}', [HowItWorksController::class, 'questionsEdit'])->name('questions.edit')->middleware('check.permission:Questions,edit');
Route::post('/questions-update/{id}', [HowItWorksController::class, 'questionsUpdate'])->name('questions.update')->middleware('check.permission:Questions,edit');

// ############ Seller Protection Introduction #################
Route::get('/seller-protection-intro', [SellerProtectionController::class, 'sellerProtectionIntroIndex'])->name('sellerprotectionintro.index')->middleware('check.permission:Seller Protection,view');
Route::get('/seller-protection-intro-edit/{id}', [SellerProtectionController::class, 'sellerProtectionIntroEdit'])->name('sellerprotectionintro.edit')->middleware('check.permission:Seller Protection,edit');
Route::post('/seller-protection-intro-update/{id}', [SellerProtectionController::class, 'sellerProtectionIntroUpdate'])->name('sellerprotectionintro.update')->middleware('check.permission:Seller Protection,edit');

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
Route::get('/seller-protection-section-three', [SellerProtectionController::class, 'sellerProtectionSectionThreeIndex'])->name('sellerprotectionsectionthree.index')->middleware('check.permission:Seller Protection Questions,view');
Route::get('/seller-protection-section-three-edit/{id}', [SellerProtectionController::class, 'sellerProtectionSectionThreeEdit'])->name('sellerprotectionsectionthree.edit')->middleware('check.permission:Seller Protection Questions,edit');  
Route::post('/seller-protection-section-three-update/{id}', [SellerProtectionController::class, 'sellerProtectionSectionThreeUpdate'])->name('sellerprotectionsectionthree.update')->middleware('check.permission:Seller Protection Questions,edit');
Route::get('/seller-protection-section-three-show/{id}', [SellerProtectionController::class , 'sellerProtectionSectionThreeShow'])->name('sellerprotectionsectionthree.show')->middleware('check.permission:Seller Protection Questions,show');
Route::get('/seller-protection-section-three-show-edit/{id}', [SellerProtectionController::class, 'sellerProtectionSectionThreeShowEdit'])->name('sellerprotectionsectionthree.showedit')->middleware('check.permission:Seller Protection Questions,edit');
Route::post('/seller-protection-section-three-show-update/{id}', [SellerProtectionController::class, 'sellerProtectionSectionThreeShowUpdate'])->name('sellerprotectionsectionthree.showupdate')->middleware('check.permission:Seller Protection Questions,edit');

// ############ Cancellation Guide One #################
Route::get('/cancellation-guide-one', [CancellationGuideController::class, 'cancellationGuideIndex'])->name('cancellationguide.index')->middleware('check.permission:Cancellation Guide One,view');
Route::get('/cancellation-guide-one-edit/{id}', [CancellationGuideController::class, 'cancellationGuideEdit'])->name('cancellationguide.edit')->middleware('check.permission:Cancellation Guide One,edit');
Route::post('/cancellation-guide-one-update/{id}', [CancellationGuideController::class, 'cancellationGuideUpdate'])->name('cancellationguide.update')->middleware('check.permission:Cancellation Guide One,edit');
Route::get('/cancellation-guide-one-show/{id}', [CancellationGuideController::class, 'cancellationGuideShow'])->name('cancellationguide.show')->middleware('check.permission:Cancellation Guide One,show');
Route::get('/cancellation-guide-one-show-edit/{id}', [CancellationGuideController::class, 'cancellationGuideShowEdit'])->name('cancellationguide.showedit')->middleware('check.permission:Cancellation Guide One,edit');
Route::post('/cancellation-guide-one-show-update/{id}', [CancellationGuideController::class, 'cancellationGuideShowUpdate'])->name('cancellationguide.showupdate')->middleware('check.permission:Cancellation Guide One,edit');

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
Route::get('/changed-travel-plans', [SellRoomController::class, 'sellReservationIndex'])->name('sellreservation.index')->middleware('check.permission:Changed Travel Plans,view');
Route::get('/changed-travel-plans-edit/{id}', [SellRoomController::class, 'sellReservationEdit'])->name('sellreservation.edit')->middleware('check.permission:Changed Travel Plans,edit');
Route::post('/changed-travel-plans-update/{id}', [SellRoomController::class, 'sellReservationUpdate'])->name('sellreservation.update')->middleware('check.permission:Changed Travel Plans,edit');

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
Route::get('/trust-and-safety-introduction', [TrustAndSafetyController::class, 'trustIntroIndex'])->name('trustintro.index')->middleware('check.permission:Trust & Safety Introduction,view');
Route::get('/trust-and-safety-introduction-edit/{id}', [TrustAndSafetyController::class, 'trustIntroEdit'])->name('trustintro.edit')->middleware('check.permission:Trust & Safety Introduction,edit');
Route::post('/trust-and-safety-introduction-update/{id}', [TrustAndSafetyController::class, 'trustIntroUpdate'])->name('trustintro.update')->middleware('check.permission:Trust & Safety Introduction,edit');

// ############ Trust & Safety Protect our buyers ############ 
Route::get('/protect-our-buyers', [TrustAndSafetyController::class, 'protectBuyerIndex'])->name('protectbuyer.index')->middleware('check.permission:We Protect our buyers,view');
Route::get('/protect-our-buyers-edit/{id}', [TrustAndSafetyController::class, 'protectBuyerEdit'])->name('protectbuyer.edit')->middleware('check.permission:We Protect our buyers,edit');
Route::post('/protect-our-buyers-update/{id}', [TrustAndSafetyController::class, 'protectBuyerUpdate'])->name('protectbuyer.update')->middleware('check.permission:We Protect our buyers,edit');
Route::get('/protect-our-buyers-show/{id}', [TrustAndSafetyController::class, 'protectBuyerShow'])->name('protectbuyer.show')->middleware('check.permission:We Protect our buyers,show');
Route::get('/protect-our-buyers-show-edit/{id}', [TrustAndSafetyController::class, 'protectBuyerShowEdit'])->name('protectbuyer.showedit')->middleware('check.permission:We Protect our buyers,edit');
Route::post('/protect-our-buyers-show-update/{id}', [TrustAndSafetyController::class, 'protectBuyerShowUpdate'])->name('protectbuyer.showupdate')->middleware('check.permission:We Protect our buyers,edit');

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

// ############ Testimonials Review Section One ############
Route::get('/review-one', [TestimonialController::class, 'reviewOneIndex'])->name('reviewone.index')->middleware('check.permission:Review Section One,view');
Route::get('/review-one-edit/{id}', [TestimonialController::class, 'reviewOneEdit'])->name('reviewone.edit')->middleware('check.permission:Review Section One,edit');
Route::post('/review-one-update/{id}', [TestimonialController::class, 'reviewOneUpdate'])->name('reviewone.update')->middleware('check.permission:Review Section One,edit');

// ############ Testimonials Review Section Two ############
Route::get('/review-two', [TestimonialController::class, 'reviewTwoIndex'])->name('reviewtwo.index')->middleware('check.permission:Review Section Two,view');
Route::get('/review-two-edit/{id}', [TestimonialController::class, 'reviewTwoEdit'])->name('reviewtwo.edit')->middleware('check.permission:Review Section Two,edit');
Route::post('/review-two-update/{id}', [TestimonialController::class, 'reviewTwoUpdate'])->name('reviewtwo.update')->middleware('check.permission:Review Section Two,edit');

// ############ Testimonials Review Section Three ############
Route::get('/review-three', [TestimonialController::class, 'reviewThreeIndex'])->name('reviewthree.index')->middleware('check.permission:Review Section Three,view');
Route::get('/review-three-edit/{id}', [TestimonialController::class, 'reviewThreeEdit'])->name('reviewthree.edit')->middleware('check.permission:Review Section Three,edit');
Route::post('/review-three-update/{id}', [TestimonialController::class, 'reviewThreeUpdate'])->name('reviewthree.update')->middleware('check.permission:Review Section Three,edit');

// ############ Testimonials Review Section Four ############
Route::get('/review-four', [TestimonialController::class, 'reviewFourIndex'])->name('reviewfour.index')->middleware('check.permission:Review Section Four,view');
Route::get('/review-four-edit/{id}', [TestimonialController::class, 'reviewFourEdit'])->name('reviewfour.edit')->middleware('check.permission:Review Section Four,edit');
Route::post('/review-four-update/{id}', [TestimonialController::class, 'reviewFourUpdate'])->name('reviewfour.update')->middleware('check.permission:Review Section Four,edit');


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

// ############ Hotel #################
Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/hotels',              [HotelController::class, 'index'])->name('hotels.index');
    Route::get('/hotels/create',       [HotelController::class, 'create'])->name('hotels.create');
    Route::post('/hotels',             [HotelController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/{id}/edit',    [HotelController::class, 'edit'])->name('hotels.edit');
    Route::post('/hotels/{id}',        [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('/hotels/{id}',      [HotelController::class, 'destroy'])->name('hotels.destroy');

});
});
// ############ Web Auth Routes #################

Route::get('/sign-up', [WebAuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/sign-up', [WebAuthController::class, 'storeSignup'])->name('signup.store');
Route::get('/login', [WebAuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [WebAuthController::class, 'login'])->name('login.submit');
Route::get('/send-otp', [WebAuthController::class, 'sendOtpForm'])->name('send.otp.form');
Route::post('/send-otp', [WebAuthController::class, 'sendOtp'])->name('send.otp');

Route::get('/verify-otp/{token}', [WebAuthController::class, 'verifyOtpForm'])->name('verify.otp.form');
Route::post('/verify-otp', [WebAuthController::class, 'verifyOtp'])->name('verify.otp');

Route::post('/resend-otp', [WebAuthController::class, 'resendOtp'])->name('resend.otp');
Route::get('/reset-password/{token}', [WebAuthController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('/reset-password-submit', [WebAuthController::class, 'resetPasswordSubmit'])->name('reset.password.submit');


Route::get('partner/signup', [WebPartnerController::class, 'showSignup'])
    ->name('partner.signup');

Route::post('partner/signup', [WebPartnerController::class, 'signup'])
    ->name('partner.signup.store');
    Route::get('partner/login', [WebPartnerController::class, 'showLogin'])->name('partner.login');

// Login Submit
Route::post('partner/login', [WebPartnerController::class, 'loginSubmit'])->name('partner.login.submit');

/* ADMIN → PARTNER INDEX */

Route::prefix('admin')->group(function () {

    // Partner Index
    Route::get('partner', [WebPartnerController::class, 'index'])->name('partner.index');

    Route::delete('partner/{id}', [WebPartnerController::class, 'destroy'])->name('partner.destroy');
    Route::post('admin/partner/toggle-status', [WebPartnerController::class, 'toggleStatus'])
     ->name('partner.toggleStatus');
   
    // Optional: Create/Edit/Update if needed
    Route::get('partner/create', [WebPartnerController::class, 'create'])->name('partner.create');
    Route::post('partner', [WebPartnerController::class, 'store'])->name('partner.store');
    Route::get('partner/{id}/edit', [WebPartnerController::class, 'edit'])->name('partner.edit');
    Route::put('partner/{id}', [WebPartnerController::class, 'update'])->name('partner.update');


});
