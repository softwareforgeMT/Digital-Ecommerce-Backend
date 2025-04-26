<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CareerEventController;
use App\Http\Controllers\Admin\CareerEventRegistrationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseGalleryController;
use App\Http\Controllers\Admin\CourseModulesController;

use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\ProductOptionTypesController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Nostalgia\NostalgiaCategoryController;
use App\Http\Controllers\Admin\Nostalgia\NostalgiaItemController;
use App\Http\Controllers\Admin\Services\ServiceCategoryController;
use App\Http\Controllers\Admin\Services\ServiceItemController;

use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\JobListingController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;


use App\Http\Controllers\Admin\QuizBankController;
use App\Http\Controllers\Admin\QuizGroupController;
use App\Http\Controllers\Admin\QuizManagementController;
use App\Http\Controllers\Admin\SubFeaturesController;
use App\Http\Controllers\Admin\SubPlanController;
use App\Http\Controllers\Admin\TutorAppointmentController;
use App\Http\Controllers\Admin\TutorController;
use App\Http\Controllers\Admin\TutorScheduleController;

use App\Http\Controllers\Admin\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Blog\BlogController;

use App\Http\Controllers\User\TicketController as UserTicketController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Vendor\Chatify\MessagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\User\SubscriptionCheckoutController;

// BitLog Controllers
use App\Http\Controllers\Admin\BitScheme\BitTaskController;
use App\Http\Controllers\Admin\BitScheme\BitSubmissionController;
use App\Http\Controllers\User\BitTaskController as UserBitTaskController;
use App\Http\Controllers\User\BitWalletController;

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

Route::prefix('management0712')->group(function() {
  //------------ ADMIN LOGIN SECTION ------------

  Route::get('/login',  [LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login',[LoginController::class, 'login'])->name('admin.login.submit');
  Route::get('/forgot',[LoginController::class, 'showForgotForm'])->name('admin.forgot');
  Route::post('/forgot',[LoginController::class, 'forgot'])->name('admin.forgot.submit');
  Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');


  Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

  Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
  Route::post('/profile/update',[AdminController::class, 'profileupdate'] )->name('admin.profile.update');
  Route::get('/password/',[AdminController::class, 'passwordreset'])->name('admin.password');
  Route::post('/password/update',[AdminController::class, 'changepass'])->name('admin.password.update');


  Route::group(['middleware'=>'permissions:social_settings'],function(){
   // Vendor Social
    Route::get('/social', [AdminController::class, 'social'])->name('admin.social');
    Route::post('/social/update',[AdminController::class, 'socialupdate'])->name('admin.social.update');
  });

  Route::group(['middleware'=>'permissions:general_settings'],function(){
    Route::get('/generalsettings',[AdminController::class, 'generalsettings'])->name('admin.generalsettings');
    Route::post('/generalsettings',[AdminController::class, 'generalsettingsupdate'])->name('admin.generalsettings.update');
  });




  //Admin banner section Routes
  Route::group(['middleware'=>'permissions:media'],function(){
    Route::get('/banner/datatables',[BannerController::class, 'datatables'])->name('admin.banner.datatables');
    Route::get('/banner/index/{file_type?}',[BannerController::class, 'index'])->name('admin.banner.index');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
    Route::post('/banner/create',[BannerController::class, 'store'])->name('admin.banner.store');
    Route::get('/banner/edit/{id}',[BannerController::class, 'edit'])->name('admin.banner.edit');
    Route::post('/banner/edit/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
    Route::get('/banner/delete/{id}',[BannerController::class, 'destroy'])->name('admin.banner.delete');
    Route::get('/banner/status/{id1}/{id2}',[BannerController::class, 'status'])->name('admin.banner.status');
  });


 Route::group(['prefix' => 'custompage', 'as' => 'admin.custompage.', 'middleware'=>'permissions:custom_page'], function () {
      Route::get('/datatables/',[PageController::class, 'datatables'])->name('datatables');
      Route::get('/',[PageController::class, 'index'])->name('index');
      Route::get('/create/', [PageController::class, 'create'])->name('create');
      Route::post('/create/',[PageController::class, 'store'])->name('store');
      Route::get('/edit/{id}',[PageController::class, 'edit'])->name('edit');
      Route::post('/edit/{id}', [PageController::class, 'update'])->name('update');
      Route::get('/delete/{id}',[PageController::class, 'destroy'])->name('delete');
      Route::get('/status/{id1}/{id2}',[PageController::class, 'status'])->name('status');
  });

  Route::group(['middleware'=>'permissions:subscriptions'],function(){
    Route::get('/subplan/datatables',[SubPlanController::class, 'datatables'])->name('admin.subplan.datatables');
    Route::get('/subplan',[SubPlanController::class, 'index'])->name('admin.subplan.index');
    Route::get('/subplan/create', [SubPlanController::class, 'create'])->name('admin.subplan.create');
    Route::post('/subplan/create',[SubPlanController::class, 'store'])->name('admin.subplan.store');
    Route::get('/subplan/edit/{id}',[SubPlanController::class, 'edit'])->name('admin.subplan.edit');
    Route::post('/subplan/edit/{id}', [SubPlanController::class, 'update'])->name('admin.subplan.update');
    Route::get('/subplan/delete/{id}',[SubPlanController::class, 'destroy'])->name('admin.subplan.delete');
    Route::get('/subplan/status/{id1}/{id2}',[SubPlanController::class, 'status'])->name('admin.subplan.status');


    Route::get('/subfeatures/datatables',[SubFeaturesController::class, 'datatables'])->name('admin.subfeature.datatables');
    Route::get('/subfeature',[SubFeaturesController::class, 'index'])->name('admin.subfeature.index');
    Route::get('/subfeatures/create', [SubFeaturesController::class, 'create'])->name('admin.subfeature.create');
    Route::post('/subfeatures/create',[SubFeaturesController::class, 'store'])->name('admin.subfeature.store');
    Route::get('/subfeatures/edit/{id}',[SubFeaturesController::class, 'edit'])->name('admin.subfeature.edit');
    Route::post('/subfeatures/edit/{id}', [SubFeaturesController::class, 'update'])->name('admin.subfeature.update');
    Route::get('/subfeatures/delete/{id}',[SubFeaturesController::class, 'destroy'])->name('admin.subfeature.delete');
    Route::get('/subfeatures/status/{id1}/{id2}',[SubFeaturesController::class, 'status'])->name('admin.subfeature.status');
  });
  Route::group(['middleware'=>'permissions:company'],function(){
    //Company Routes
    Route::get('/company/datatables',[CompanyController::class, 'datatables'])->name('admin.company.datatables');
    Route::get('/companies',[CompanyController::class, 'index'])->name('admin.company.index');
    Route::get('/company/create', [CompanyController::class, 'create'])->name('admin.company.create');
    Route::post('/company/create',[CompanyController::class, 'store'])->name('admin.company.store');
    Route::get('/company/edit/{id}',[CompanyController::class, 'edit'])->name('admin.company.edit');
    Route::post('/company/edit/{id}', [CompanyController::class, 'update'])->name('admin.company.update');
    Route::get('/company/delete/{id}',[CompanyController::class, 'destroy'])->name('admin.company.delete');
    Route::get('/company/status/{id1}/{id2}',[CompanyController::class, 'status'])->name('admin.company.status');
  });  

  Route::group(['middleware'=>'permissions:job_listings'],function(){
    //Company Routes
     // Job Routes (Add these routes for job management)
    Route::get('/job/listing/datatables', [JobListingController::class, 'datatables'])->name('admin.job.listings.datatables');
    Route::get('/job/listings', [JobListingController::class, 'index'])->name('admin.job.listings.index');
    Route::get('/job/listing/create', [JobListingController::class, 'create'])->name('admin.job.listings.create');
    Route::post('/job/create', [JobListingController::class, 'store'])->name('admin.job.listings.store');
    Route::get('/job/listing/edit/{id}', [JobListingController::class, 'edit'])->name('admin.job.listings.edit');
    Route::post('/job/edit/{id}', [JobListingController::class, 'update'])->name('admin.job.listings.update');
    Route::get('/job/listing/delete/{id}', [JobListingController::class, 'destroy'])->name('admin.job.listings.delete');

    Route::get('/job/listing/status/{id1}/{id2}', [JobListingController::class, 'status'])->name('admin.job.listings.status');
  });
  Route::group(['middleware'=>'permissions:job_applications'],function(){
     // JobApplication Routes 
    Route::get('/job/application/datatables', [JobApplicationController::class, 'datatables'])->name('admin.job.applications.datatables');
    Route::get('/job/applications', [JobApplicationController::class, 'index'])->name('admin.job.applications.index');
    Route::get('/job/application/create', [JobApplicationController::class, 'create'])->name('admin.job.applications.create');
    Route::post('/job/application/store', [JobApplicationController::class, 'store'])->name('admin.job.applications.store');
    Route::get('/job/application/edit/{id}', [JobApplicationController::class, 'edit'])->name('admin.job.applications.edit');
    Route::post('/job/application/edit/{id}', [JobApplicationController::class, 'update'])->name('admin.job.applications.update');

    Route::get('/job/application/duplicate/{id}', [JobApplicationController::class, 'duplicateJobApplication'])->name('admin.job.applications.duplicate');

    Route::get('/job/application/delete/{id}', [JobApplicationController::class, 'destroy'])->name('admin.job.applications.delete');
    Route::get('/job/application/status/{id1}/{id2}', [JobApplicationController::class, 'status'])->name('admin.job.applications.status');
    

    Route::get('jobs/get-service-lines', [JobApplicationController::class, 'getServiceLines'])->name('jobs.get-service-lines');
    Route::get('jobs/get-locations', [JobApplicationController::class, 'getLocations'])->name('jobs.get-locations');
    Route::get('jobs/get-job-titles', [JobApplicationController::class, 'getJobTitles'])->name('jobs.get-job-titles');

  });


  Route::group(['middleware' => 'permissions:product_category'], function () {
    // Product Routes
    Route::get('/product-categories/datatables', [ProductCategoryController::class, 'datatables'])->name('admin.product-categories.datatables');
    Route::get('/product-categories', [ProductCategoryController::class, 'index'])->name('admin.product-categories.index');
    Route::get('/product-categories/create', [ProductCategoryController::class, 'create'])->name('admin.product-categories.create');
    Route::post('/product-categories/create', [ProductCategoryController::class, 'store'])->name('admin.product-categories.store');
    Route::get('/product-categories/edit/{id}', [ProductCategoryController::class, 'edit'])->name('admin.product-categories.edit');
    Route::post('//product//edit/{id}', [ProductCategoryController::class, 'update'])->name('admin.product-categories.update');
    Route::get('/product-categories/delete/{id}', [ProductCategoryController::class, 'destroy'])->name('admin.product-categories.delete');
    Route::get('/product-categories/status/{id1}/{id2}', [ProductCategoryController::class, 'status'])->name('admin.product-categories.status');
  });


  Route::group(['middleware' => 'permissions:option_types'], function () {
      // Option Type Routes
      Route::get('/option-types/datatables', [ProductOptionTypesController::class, 'datatables'])->name('admin.option-types.datatables');
      Route::get('/option-types', [ProductOptionTypesController::class, 'index'])->name('admin.option-types.index');
      Route::get('/option-types/create', [ProductOptionTypesController::class, 'create'])->name('admin.option-types.create');
      Route::post('/option-types', [ProductOptionTypesController::class, 'store'])->name('admin.option-types.store');
      Route::get('/option-types/edit/{id}', [ProductOptionTypesController::class, 'edit'])->name('admin.option-types.edit');
      Route::post('/option-types/edit/{id}', [ProductOptionTypesController::class, 'update'])->name('admin.option-types.update');
      Route::get('/option-types/delete/{id}', [ProductOptionTypesController::class, 'destroy'])->name('admin.option-types.delete');
      
      // Option Type Status Route
      Route::get('/option-types/status/{id1}/{id2}', [ProductOptionTypesController::class, 'updateStatus'])->name('admin.option-types.status');
  });




  Route::group(['middleware' => 'permissions:products'], function () {
    // Product Routes
    Route::get('/products/datatables', [ProductController::class, 'datatables'])->name('admin.product.datatables');
    Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    Route::get('/product/status/{id1}/{id2}', [ProductController::class, 'status'])->name('admin.product.status');
    
  });



  Route::group(['middleware'=>'permissions:support'],function(){
    Route::get('tickets/datatables', [AdminTicketController::class, 'datatables'])->name('admin.tickets.datatables');
    Route::get('/tickets/datatables', [AdminTicketController::class, 'datatables'])->name('admin.tickets.datatables');
    Route::get('/tickets', [AdminTicketController::class, 'index'])->name('admin.tickets.index');
    Route::get('/tickets/{id}', [AdminTicketController::class, 'show'])->name('admin.tickets.show');
    Route::post('/tickets/{id}/reply', [AdminTicketController::class, 'reply'])->name('admin.tickets.reply');
    Route::post('/tickets/{id}/status', [AdminTicketController::class, 'updateStatus'])->name('admin.tickets.status');
});





  Route::group(['middleware'=>'permissions:orders'],function(){
    //Order Routes
    Route::get('/orders/datatables',[OrderController::class, 'datatables'])->name('admin.orders.datatables');
    Route::get('/orders',[OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/show/{id}',[OrderController::class, 'show'])->name('admin.orders.show');
    Route::get('/orders/invoice/{id}',[OrderController::class, 'invoice'])->name('admin.orders.invoice');
    Route::get('/orders/download-invoice/{id}',[OrderController::class, 'downloadInvoice'])->name('admin.orders.download-invoice');
    Route::post('/orders/status/',[OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
    Route::get('/orders/delete/{id}',[OrderController::class, 'delete'])->name('admin.orders.delete');
  });  

  Route::group(['middleware'=>'permissions:coupon'],function(){
    //Company Routes
    Route::get('/coupon/datatables',[CouponController::class, 'datatables'])->name('admin.coupon.datatables');
    Route::get('/coupon',[CouponController::class, 'index'])->name('admin.coupon.index');
    Route::get('/coupon/create', [CouponController::class, 'create'])->name('admin.coupon.create');
    Route::post('/coupon/create',[CouponController::class, 'store'])->name('admin.coupon.store');
    Route::get('/coupon/edit/{id}',[CouponController::class, 'edit'])->name('admin.coupon.edit');
    Route::post('/coupon/edit/{id}', [CouponController::class, 'update'])->name('admin.coupon.update');
    Route::get('/coupon/delete/{id}',[CouponController::class, 'destroy'])->name('admin.coupon.delete');
    Route::get('/coupon/status/{id1}/{id2}',[CouponController::class, 'status'])->name('admin.coupon.status');
  });  


  //Quiz Management Routes
  Route::group(['middleware'=>'permissions:quiz_management'],function(){
    Route::get('/quiz/management/datatables',[QuizManagementController::class, 'datatables'])->name('admin.quiz.management.datatables');
    Route::get('/quiz/management',[QuizManagementController::class, 'index'])->name('admin.quiz.management.index');
    Route::get('/quiz/management/create', [QuizManagementController::class, 'create'])->name('admin.quiz.management.create');
    Route::post('/quiz/management/create',[QuizManagementController::class, 'store'])->name('admin.quiz.management.store');
    Route::get('/quiz/management/edit/{id}',[QuizManagementController::class, 'edit'])->name('admin.quiz.management.edit');
    Route::post('/quiz/management/edit/{id}', [QuizManagementController::class, 'update'])->name('admin.quiz.management.update');
    Route::get('/quiz/management/delete/{id}',[QuizManagementController::class, 'destroy'])->name('admin.quiz.management.delete');
    Route::get('/quiz/management/status/{id1}/{id2}',[QuizManagementController::class, 'status'])->name('admin.quiz.management.status');

    //Duplicate Quiz
    Route::get('/admin/management/duplicate/{id}', [QuizManagementController::class, 'duplicateQuizManagement'])->name('admin.quiz.management.duplicate');

     //Bulk Edit
    Route::post('/quiz/management/bulk/actions',[QuizManagementController::class, 'bulkaction'])->name('admin.quiz.management.bulk.action');


    //Quiz group Routes
    Route::get('/quiz/group/datatables',[QuizGroupController::class, 'datatables'])->name('admin.quiz.group.datatables');
    Route::get('/quiz/group',[QuizGroupController::class, 'index'])->name('admin.quiz.group.index');
    Route::get('/quiz/group/create', [QuizGroupController::class, 'create'])->name('admin.quiz.group.create');
    Route::post('/quiz/group/create',[QuizGroupController::class, 'store'])->name('admin.quiz.group.store');
    Route::get('/quiz/group/edit/{id}',[QuizGroupController::class, 'edit'])->name('admin.quiz.group.edit');
    Route::post('/quiz/group/edit/{id}', [QuizGroupController::class, 'update'])->name('admin.quiz.group.update');
    Route::get('/quiz/group/delete/{id}',[QuizGroupController::class, 'destroy'])->name('admin.quiz.group.delete');
    Route::get('/quiz/group/status/{id1}/{id2}',[QuizGroupController::class, 'status'])->name('admin.quiz.group.status');

      //Quizbank Routes
    Route::get('/quizbank/datatables/{quizmanagement_slug?}',[QuizBankController::class, 'datatables'])->name('admin.quizbank.datatables');
    Route::get('/quizbank/{quizmanagement_slug?}',[QuizBankController::class, 'index'])->name('admin.quizbank.index');
    Route::get('/quizbank/create/{quizmanagement_slug}', [QuizBankController::class, 'create'])->name('admin.quizbank.create');
    Route::post('/quizbank/create',[QuizBankController::class, 'store'])->name('admin.quizbank.store');
    Route::get('/quizbank/edit/{id}',[QuizBankController::class, 'edit'])->name('admin.quizbank.edit');
    Route::post('/quizbank/edit/{id}', [QuizBankController::class, 'update'])->name('admin.quizbank.update');
    Route::get('/quizbank/delete/{id}',[QuizBankController::class, 'destroy'])->name('admin.quizbank.delete');
    Route::get('/quizbank/status/{id1}/{id2}',[QuizBankController::class, 'status'])->name('admin.quizbank.status');
 

    //Bulk Edit
    Route::post('/quizbank/bulk/actions',[QuizBankController::class, 'bulkaction'])->name('admin.quizbank.bulk.action');

    //Import
    Route::get('/quizbank/csv/import', [QuizBankController::class, 'createImport'])->name('admin.quizbank.import.create');
    Route::post('/quizbank/csv/import',[QuizBankController::class, 'importSubmit'])->name('admin.quizbank.import.store');
  }); 

  Route::group(['middleware'=>'permissions:tutor_management'],function(){
    //Tutor Routes
    Route::get('/tutor/datatables',[TutorController::class, 'datatables'])->name('admin.tutor.datatables');
    Route::get('/tutor',[TutorController::class, 'index'])->name('admin.tutor.index');
    Route::get('/tutor/create', [TutorController::class, 'create'])->name('admin.tutor.create');
    Route::post('/tutor/create',[TutorController::class, 'store'])->name('admin.tutor.store');
    Route::get('/tutor/edit/{id}',[TutorController::class, 'edit'])->name('admin.tutor.edit');
    Route::post('/tutor/edit/{id}', [TutorController::class, 'update'])->name('admin.tutor.update');
    Route::get('/tutor/delete/{id}',[TutorController::class, 'destroy'])->name('admin.tutor.delete');
    Route::get('/tutor/status/{id1}/{id2}',[TutorController::class, 'status'])->name('admin.tutor.status');
     //Bulk Edit
    Route::post('/tutor/bulk/actions',[TutorController::class, 'bulkaction'])->name('admin.tutor.bulk.action');
    
    //Tutor availability/Schedule
    Route::get('tutor/availability/{tutor_id}', [TutorScheduleController::class, 'create'])->name('admin.tutor.schedule.create');
    Route::post('tutor/availability/{tutor_id}', [TutorScheduleController::class, 'store'])->name('admin.tutor.schedule.store'); 
    Route::get('/tutor/availability/edit/v1/{id?}',[TutorScheduleController::class, 'edit'])->name('admin.tutor.schedule.edit');
    Route::get('/tutor/delete/{id}',[TutorScheduleController::class, 'destroy'])->name('admin.tutor.schedule.delete');
   
    //Tutor Apoointments Booking/Schedule
    Route::get('tutor/appointments/{tutor_id}', [TutorAppointmentController::class, 'index'])->name('admin.tutor.appointment.index');
    Route::get('tutor/appointments/edit/{tutor_id}/{appointment_id}', [TutorAppointmentController::class, 'edit'])->name('admin.tutor.appointment.edit');
    Route::post('tutor/appointments/store/{tutor_id}', [TutorAppointmentController::class, 'store'])->name('admin.tutor.appointment.store');
    Route::get('tutor/appointments/delete/{tutor_id}', [TutorAppointmentController::class, 'destroy'])->name('admin.tutor.appointment.delete');
  });



  //CareerEvents Routes
  Route::group(['middleware'=>'permissions:career_events'],function(){
    Route::get('/career/event/datatables',[CareerEventController::class, 'datatables'])->name('admin.career.event.datatables');
    Route::get('/career/events',[CareerEventController::class, 'index'])->name('admin.career.event.index');
    Route::get('/career/event/create', [CareerEventController::class, 'create'])->name('admin.career.event.create');
    Route::post('/career/event/create',[CareerEventController::class, 'store'])->name('admin.career.event.store');
    Route::get('/career/event/edit/{id}',[CareerEventController::class, 'edit'])->name('admin.career.event.edit');
    Route::post('/career/event/edit/{id}', [CareerEventController::class, 'update'])->name('admin.career.event.update');
    Route::get('/career/event/delete/{id}',[CareerEventController::class, 'destroy'])->name('admin.career.event.delete');
    Route::get('/career/event/status/{id1}/{id2}',[CareerEventController::class, 'status'])->name('admin.career.event.status');

     //Bulk Edit
    Route::post('/career/event/bulk/actions',[CareerEventController::class, 'bulkaction'])->name('admin.career.event.bulk.action');

    Route::get('/career/event/calender', [CareerEventController::class, 'viewEventCalender'])->name('admin.career.event.calender');

    Route::get('/career/event/registration/datatables/{id?}',[CareerEventRegistrationController::class, 'datatables'])->name('admin.career.event.registered_users.datatables');
    Route::get('/career/events/registered/participants/{id?}',[CareerEventRegistrationController::class, 'index'])->name('admin.career.event.registered_users');

    
  });



  // Route::get('/listing',[App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.index');
 //Admin learn section Routes
  Route::get('/courses/datatables',[CoursesController::class, 'datatables'])->name('admin.courses.datatables');
  Route::get('/courses',[CoursesController::class, 'index'])->name('admin.courses.index');
  Route::get('/courses/create', [CoursesController::class, 'create'])->name('admin.courses.create');
  Route::post('/courses/create',[CoursesController::class, 'store'])->name('admin.courses.store');
  Route::get('/courses/edit/{id}',[CoursesController::class, 'edit'])->name('admin.courses.edit');
  Route::post('/courses/edit/{id}', [CoursesController::class, 'update'])->name('admin.courses.update');
  Route::get('/courses/delete/{id}',[CoursesController::class, 'destroy'])->name('admin.courses.delete');
  Route::get('/courses/status/{id1}/{id2}',[CoursesController::class, 'status'])->name('admin.courses.status');


    Route::get('/course/modules/datatables',[CourseModulesController::class, 'datatables'])->name('admin.course.modules.datatables');
  Route::get('/course/modules',[CourseModulesController::class, 'index'])->name('admin.course.modules.index');
  Route::get('/course/modules/create', [CourseModulesController::class, 'create'])->name('admin.course.modules.create');
  Route::post('/course/modules/create',[CourseModulesController::class, 'store'])->name('admin.course.modules.store');
  Route::get('/course/modules/edit/{id}',[CourseModulesController::class, 'edit'])->name('admin.course.modules.edit');
  Route::post('/course/modules/edit/{id}', [CourseModulesController::class, 'update'])->name('admin.course.modules.update');
  Route::get('/course/modules/delete/{id}',[CourseModulesController::class, 'destroy'])->name('admin.course.modules.delete');
  Route::get('/course/modules/status/{id1}/{id2}',[CourseModulesController::class, 'status'])->name('admin.course.modules.status');

  Route::get('/course/gallery/datatables',[CourseGalleryController::class, 'datatables'])->name('admin.course.gallery.datatables');
  Route::get('/course/gallery',[CourseGalleryController::class, 'index'])->name('admin.course.gallery.index');
  Route::get('/course/gallery/create', [CourseGalleryController::class, 'create'])->name('admin.course.gallery.create');
  Route::post('/course/gallery/create',[CourseGalleryController::class, 'store'])->name('admin.course.gallery.store');
  Route::get('/course/gallery/edit/{id}',[CourseGalleryController::class, 'edit'])->name('admin.course.gallery.edit');
  Route::post('/course/gallery/edit/{id}', [CourseGalleryController::class, 'update'])->name('admin.course.gallery.update');
  Route::get('/course/gallery/delete/{id}',[CourseGalleryController::class, 'destroy'])->name('admin.course.gallery.delete');
  Route::get('/course/gallery/status/{id1}/{id2}',[CourseGalleryController::class, 'status'])->name('admin.course.gallery.status');



  
  Route::group(['middleware'=>'permissions:users'],function(){
    Route::get('/users/datatables',[App\Http\Controllers\Admin\UserController::class, 'usersDataTables'])->name('admin.users.datatables');
    Route::get('/users',[App\Http\Controllers\Admin\UserController::class, 'users'])->name('admin.users.index');

    Route::get('/users/show/{id}',[App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.users.show');

    Route::post('/users/update/{id}',[App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update'); 

    Route::post('/users/update/membership/{id}',[App\Http\Controllers\Admin\UserController::class, 'updateMembership'])->name('admin.users.membership.update'); 

     Route::get('/users/status/{id1}/{id2}',[App\Http\Controllers\Admin\UserController::class, 'status'])->name('admin.user.status');
     
     //Email Campaign
     Route::get('/users/email/campaign',[App\Http\Controllers\Admin\UserController::class, 'emailCampaign'])->name('admin.users.email.campaign');
      Route::post('/users/email/campaign',[App\Http\Controllers\Admin\UserController::class, 'sendCampaignEmail'])->name('admin.users.email.campaign.submit');
    
    Route::get('/users/secret/login/{id}',[App\Http\Controllers\Admin\UserController::class, 'secret'])->name('admin.user.secret');
    
    // Route::get('/secret/{email}',[App\Http\Controllers\Admin\UserController::class, 'secretlogin'])->name('admin.users.secretlogin');

    Route::get('/users/delete/{id}',[App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/subscribed/users/datatables',[App\Http\Controllers\Admin\UserController::class, 'subscribedusersDataTables'])->name('admin.users.subscribed.datatables');
    Route::get('/subscribed/users',[App\Http\Controllers\Admin\UserController::class, 'subscribedusers'])->name('admin.users.subscribed.index');
  });

  // ROLE SECTION
  Route::group(['middleware'=>'permissions:super'],function(){

    Route::get('/cache/clear', function() {
      Artisan::call('cache:clear');
      Artisan::call('config:clear');
      Artisan::call('route:clear');
      Artisan::call('view:clear');
      return redirect()->route('admin.dashboard')->with('info','System Cache Has Been Removed.');
    })->name('admin.cache.clear');

    Route::get('/role/datatables',[App\Http\Controllers\Admin\RoleController::class, 'datatables'])->name('admin.role.datatables');
    Route::get('/role',[App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/role/create',[App\Http\Controllers\Admin\RoleController::class, 'create'] )->name('admin.role.create');
    Route::post('/role/create',[App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.role.store');
    Route::get('/role/edit/{id}',[App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('admin.role.edit');
    Route::post('/role/edit/{id}',[App\Http\Controllers\Admin\RoleController::class, 'update'])->name('admin.role.update');
    Route::get('/role/delete/{id}',[App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('admin.role.delete');
  });

    //ADMIN STAFF SECTION 

  Route::group(['middleware'=>'permissions:manage_staffs'],function(){
    Route::get('/staff/datatables',[App\Http\Controllers\Admin\StaffController::class, 'datatables'])->name('admin.staff.datatables');
    Route::get('/staff',[App\Http\Controllers\Admin\StaffController::class, 'index'])->name('admin.staff.index');
    Route::get('/staff/create',[App\Http\Controllers\Admin\StaffController::class, 'create'])->name('admin.staff.create');
    Route::post('/staff/create',[App\Http\Controllers\Admin\StaffController::class, 'store'])->name('admin.staff.store');
    Route::get('/staff/edit/{id}', [App\Http\Controllers\Admin\StaffController::class, 'edit'])->name('admin.staff.edit');
    Route::post('/staff/update/{id}',[App\Http\Controllers\Admin\StaffController::class, 'update'])->name('admin.staff.update');
    Route::get('/staff/show/{id}', [App\Http\Controllers\Admin\StaffController::class, 'show'])->name('admin.staff.show');
    Route::get('/staff/delete/{id}', [App\Http\Controllers\Admin\StaffController::class, 'destroy'])->name('admin.staff.delete');
  });


  //LiveChat Routes
  Route::group(['middleware'=>'permissions:live_chat'],function(){
     // $liveChatRoute = 'admin.live.chat';
     Route::get('/tawk/chat', [AdminController::class, 'tawk'])->name('admin.live.chat.tawk');
     Route::get('/support/chat', [MessagesController::class, 'index'])->name('admin.live.chat');
     // include __DIR__.'/chatify.php';      
  });

  Route::group(['middleware' => 'permissions:nostalgia'], function () {
    Route::prefix('nostalgia')->name('admin.nostalgia.')->group(function () {
        // Category Routes
        Route::get('/categories/datatables', [NostalgiaCategoryController::class, 'datatables'])->name('category.datatables');
        Route::get('/categories', [NostalgiaCategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [NostalgiaCategoryController::class, 'create'])->name('category.create');
        Route::post('/category/store', [NostalgiaCategoryController::class, 'store'])->name('category.store');
        Route::get('/category/edit/{id}', [NostalgiaCategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/update/{id}', [NostalgiaCategoryController::class, 'update'])->name('category.update');
        Route::get('/category/delete/{id}', [NostalgiaCategoryController::class, 'destroy'])->name('category.delete');
        Route::get('/category/status/{id1}/{id2}', [NostalgiaCategoryController::class, 'status'])->name('category.status');
        Route::get('/category/parents', [NostalgiaCategoryController::class, 'getParentCategories'])->name('category.parents');

        // Item Routes
        Route::get('/items/datatables', [NostalgiaItemController::class, 'datatables'])->name('item.datatables');
        Route::get('/items', [NostalgiaItemController::class, 'index'])->name('item.index');
        Route::get('/item/create', [NostalgiaItemController::class, 'create'])->name('item.create');
        Route::post('/item/store', [NostalgiaItemController::class, 'store'])->name('item.store');
        Route::get('/item/edit/{id}', [NostalgiaItemController::class, 'edit'])->name('item.edit');
        Route::post('/item/update/{id}', [NostalgiaItemController::class, 'update'])->name('item.update');
        Route::get('/item/delete/{id}', [NostalgiaItemController::class, 'destroy'])->name('item.delete');
        Route::get('/item/status/{id1}/{id2}', [NostalgiaItemController::class, 'status'])->name('item.status');
        Route::get('/get-subcategories/{category_id}', [NostalgiaItemController::class, 'getSubcategories'])->name('item.subcategories');
        Route::get('/get-childcategories/{subcategory_id}', [NostalgiaItemController::class, 'getChildcategories'])->name('item.childcategories');
    });
  });

  Route::group(['middleware' => 'permissions:services'], function () {
    // Service Category Routes
    Route::prefix('service')->name('admin.service.')->group(function () {
        // Category Routes
        Route::get('/categories/datatables', [ServiceCategoryController::class, 'datatables'])->name('category.datatables');
        Route::get('/categories', [ServiceCategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [ServiceCategoryController::class, 'create'])->name('category.create');
        Route::post('/category/store', [ServiceCategoryController::class, 'store'])->name('category.store');
        Route::get('/category/edit/{id}', [ServiceCategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/update/{id}', [ServiceCategoryController::class, 'update'])->name('category.update');
        Route::get('/category/delete/{id}', [ServiceCategoryController::class, 'destroy'])->name('category.delete');
        Route::get('/category/status/{id1}/{id2}', [ServiceCategoryController::class, 'status'])->name('category.status');

        // Service Item Routes
        Route::get('/items/datatables', [ServiceItemController::class, 'datatables'])->name('item.datatables');
        Route::get('/items', [ServiceItemController::class, 'index'])->name('item.index');
        Route::get('/item/create', [ServiceItemController::class, 'create'])->name('item.create');
        Route::post('/item/store', [ServiceItemController::class, 'store'])->name('item.store');
        Route::get('/item/edit/{id}', [ServiceItemController::class, 'edit'])->name('item.edit');
        Route::post('/item/update/{id}', [ServiceItemController::class, 'update'])->name('item.update');
        Route::get('/item/delete/{id}', [ServiceItemController::class, 'destroy'])->name('item.delete');
        Route::get('/item/status/{id1}/{id2}', [ServiceItemController::class, 'status'])->name('item.status');
    });
  });

  Route::group(['middleware' => 'permissions:blog'], function () {
    Route::prefix('blog')->name('admin.blog.')->group(function () {
        // Blog Category Routes
        Route::get('/categories/datatables', [BlogCategoryController::class, 'datatables'])->name('category.datatables');
        Route::get('/categories', [BlogCategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [BlogCategoryController::class, 'create'])->name('category.create');
        Route::post('/category/store', [BlogCategoryController::class, 'store'])->name('category.store');
        Route::get('/category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/update/{id}', [BlogCategoryController::class, 'update'])->name('category.update');
        Route::get('/category/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('category.delete');
        Route::get('/category/status/{id1}/{id2}', [BlogCategoryController::class, 'status'])->name('category.status');

        // Blog Post Routes
        Route::get('/posts/datatables', [BlogController::class, 'datatables'])->name('datatables');
        Route::get('/posts', [BlogController::class, 'index'])->name('index');
        Route::get('/post/create', [BlogController::class, 'create'])->name('create');
        Route::post('/post/store', [BlogController::class, 'store'])->name('store');
        Route::get('/post/edit/{id}', [BlogController::class, 'edit'])->name('edit');
        Route::post('/post/update/{id}', [BlogController::class, 'update'])->name('update');
        Route::get('/post/delete/{id}', [BlogController::class, 'destroy'])->name('delete');
        Route::get('/post/status/{id1}/{id2}', [BlogController::class, 'status'])->name('status');
    });
  });


  Route::group(['middleware' => 'permissions:bit_logs'], function () {
      Route::name('admin.')->group(function () {
      // Admin BitLog Routes
        Route::get('/bit-tasks/datatables', [BitTaskController::class, 'datatables'])->name('bit-tasks.datatables');
        Route::get('/bit-tasks', [BitTaskController::class, 'index'])->name('bit-tasks.index');
        Route::get('/bit-tasks/create', [BitTaskController::class, 'create'])->name('bit-tasks.create');
        Route::post('/bit-tasks/store', [BitTaskController::class, 'store'])->name('bit-tasks.store');
        Route::get('/bit-tasks/edit/{id}', [BitTaskController::class, 'edit'])->name('bit-tasks.edit');
        Route::post('/bit-tasks/update/{id}', [BitTaskController::class, 'update'])->name('bit-tasks.update');
        Route::get('/bit-tasks/delete/{id}', [BitTaskController::class, 'destroy'])->name('bit-tasks.delete');
        Route::get('/bit-tasks/status/{id}/{status}', [BitTaskController::class, 'status'])->name('bit-tasks.status');

        // Bit Submissions
        Route::get('/bit-submissions/datatables', [BitSubmissionController::class, 'datatables'])->name('bit-submissions.datatables');
        Route::get('/bit-submissions', [BitSubmissionController::class, 'index'])->name('bit-submissions.index');
        Route::get('/bit-submissions/pending', [BitSubmissionController::class, 'pending'])->name('bit-submissions.pending');
        Route::get('/bit-submissions/{id}', [BitSubmissionController::class, 'show'])->name('bit-submissions.show');
        Route::post('/bit-submissions/review/{id}', [BitSubmissionController::class, 'review'])->name('bit-submissions.review');
    });
  });

  // Add the Bit Management System Routes
  Route::group(['middleware'=>'permissions:bit_management'],function(){
      // Bit Tasks Admin Routes
      Route::get('/bit-tasks/datatables',[BitTaskController::class, 'datatables'])->name('admin.bit-tasks.datatables');
      Route::get('/bit-tasks',[BitTaskController::class, 'index'])->name('admin.bit-tasks.index');
      Route::get('/bit-tasks/create',[BitTaskController::class, 'create'])->name('admin.bit-tasks.create');
      Route::post('/bit-tasks/create',[BitTaskController::class, 'store'])->name('admin.bit-tasks.store');
      Route::get('/bit-tasks/edit/{id}',[BitTaskController::class, 'edit'])->name('admin.bit-tasks.edit');
      Route::post('/bit-tasks/edit/{id}',[BitTaskController::class, 'update'])->name('admin.bit-tasks.update');
      Route::get('/bit-tasks/delete/{id}',[BitTaskController::class, 'destroy'])->name('admin.bit-tasks.delete');
      Route::get('/bit-tasks/status/{id}/{status}',[BitTaskController::class, 'status'])->name('admin.bit-tasks.status');
      
      // Bit Submissions Admin Routes
      Route::get('/bit-submissions/datatables',[BitSubmissionController::class, 'datatables'])->name('admin.bit-submissions.datatables');
      Route::get('/bit-submissions',[BitSubmissionController::class, 'index'])->name('admin.bit-submissions.index');
      Route::get('/bit-submissions/pending',[BitSubmissionController::class, 'pending'])->name('admin.bit-submissions.pending');
      Route::get('/bit-submissions/show/{id}',[BitSubmissionController::class, 'show'])->name('admin.bit-submissions.show');
      Route::post('/bit-submissions/review/{id}',[BitSubmissionController::class, 'review'])->name('admin.bit-submissions.review');
  });

  // Reviews management
  Route::group(['prefix' => 'reviews', 'as' => 'admin.reviews.'], function () {
      Route::get('/', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('index');
      Route::get('/datatables', [App\Http\Controllers\Admin\ReviewController::class, 'datatables'])->name('datatables');
      Route::get('/{id}/edit', [App\Http\Controllers\Admin\ReviewController::class, 'edit'])->name('edit');
      Route::post('/{id}/update', [App\Http\Controllers\Admin\ReviewController::class, 'update'])->name('update');
      Route::get('/{id}/delete', [App\Http\Controllers\Admin\ReviewController::class, 'delete'])->name('delete');
      Route::post('/bulk-approve', [App\Http\Controllers\Admin\ReviewController::class, 'bulkApprove'])->name('bulk-approve');
      Route::post('/bulk-reject', [App\Http\Controllers\Admin\ReviewController::class, 'bulkReject'])->name('bulk-reject');
  });

});







// User Auth Routes
Route::group(['as' => 'user.'], function () {
  Route::get('/login',[App\Http\Controllers\User\LoginController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [App\Http\Controllers\User\LoginController::class, 'login'])->name('login.submit');
  Route::post('/logout', [App\Http\Controllers\User\LoginController::class, 'logout'])->name('logout');

  Route::get('/register',[App\Http\Controllers\User\RegisterController::class, 'showRegisterForm'])->name('register');
  Route::post('/register',[App\Http\Controllers\User\RegisterController::class, 'register'])->name('register.submit');

  Route::get('/forgot',[App\Http\Controllers\User\ForgotController::class, 'showForgotForm'])->name('forgot');
  Route::post('/forgot',[App\Http\Controllers\User\ForgotController::class, 'forgot'])->name('forgot.submit');
  Route::get('/reset-password/{token}',[App\Http\Controllers\User\ForgotController::class, 'getPassword'])->name('password.reset');
  Route::post('/reset-password',[App\Http\Controllers\User\ForgotController::class, 'updatePassword'])->name('password.reset.update');

   // Route::get('/verify/email/',[App\Http\Controllers\User\LoginController::class, 'verifyEmail'])->name('verify');
  Route::post('/verify/email/',[App\Http\Controllers\User\LoginController::class, 'authenticationToken'])->name('verify.email');
  Route::get('resend/verify/email/{email}',[App\Http\Controllers\User\LoginController::class, 'newAuthenticationToken'])->name('resend.verify');
});
// User Auth Routes ends

// Social Login
Route::group(['middleware' => 'guest'], function() {
    Route::get('oauth/{provider}',[App\Http\Controllers\User\Auth\SocialAuthController::class, 'redirect'])->where('provider', '(facebook|google|twitter)$');
    Route::get('oauth/{provider}/callback',[App\Http\Controllers\User\Auth\SocialAuthController::class, 'callback'])->where('provider', '(facebook|google|twitter)$');
});//<--- End Group guest





Route::group(['prefix' => 'user', 'middleware' => ['auth'] ], function() {
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('user.dashboard');


 
   
    // User Profile
    Route::get('/profile',[App\Http\Controllers\User\DashboardController::class, 'profile'] )->name('user.profile');

    Route::get('/account-settings',[App\Http\Controllers\User\DashboardController::class, 'accountSettings'] )->name('user.account-settings');
    Route::post('/account-settings/update', [App\Http\Controllers\User\DashboardController::class, 'accountSettingsUpdate'])->name('user.account-settings.update');
    
    Route::get('/change-password', [App\Http\Controllers\User\DashboardController::class, 'changePassword'])->name('user.change-password');
    Route::post('/change-password/update', [App\Http\Controllers\User\DashboardController::class, 'changePasswordUpdate'])->name('user.change-password.update');

   


    // User Order Routes
    Route::get('/orders', [App\Http\Controllers\User\OrderController::class, 'index'])->name('user.orders.index');
    Route::get('/orders/{orderNumber}', [App\Http\Controllers\User\OrderController::class, 'show'])->name('user.orders.show');

    // Bit Tasks User Routes
    Route::get('/bit-tasks', [App\Http\Controllers\User\BitTaskController::class, 'index'])->name('user.bit-tasks.index');
    Route::get('/bit-tasks/{task}', [App\Http\Controllers\User\BitTaskController::class, 'show'])->name('user.bit-tasks.show');
    Route::post('/bit-tasks/{task}/submit', [App\Http\Controllers\User\BitTaskController::class, 'submit'])->name('user.bit-tasks.submit');
    Route::get('/bit-tasks-history', [App\Http\Controllers\User\BitTaskController::class, 'history'])->name('user.bit-tasks.history');
    
    // Bit Wallet User Routes
    Route::get('/bit-wallet', [App\Http\Controllers\User\BitWalletController::class, 'index'])->name('user.bit-wallet.index');

   

      Route::get('/tickets', [UserTicketController::class, 'index'])->name('user.tickets.index');
      Route::get('/tickets/create', [UserTicketController::class, 'create'])->name('user.tickets.create');
      Route::post('/tickets', [UserTicketController::class, 'store'])->name('user.tickets.store');
      Route::get('/tickets/{id}', [UserTicketController::class, 'show'])->name('user.tickets.show');
      Route::post('/tickets/{id}/reply', [UserTicketController::class, 'reply'])->name('user.tickets.reply');

      // Reviews
      Route::group(['prefix' => 'reviews', 'as' => 'user.reviews.'], function () {
          Route::get('/', [App\Http\Controllers\User\ReviewController::class, 'index'])->name('index');
          Route::post('/store', [App\Http\Controllers\User\ReviewController::class, 'store'])->name('store');
          Route::get('/edit/{id}', [App\Http\Controllers\User\ReviewController::class, 'edit'])->name('edit');
          Route::post('/update/{id}', [App\Http\Controllers\User\ReviewController::class, 'update'])->name('update');
          Route::get('/delete/{id}', [App\Http\Controllers\User\ReviewController::class, 'delete'])->name('delete');
      });

   
    //Favorite Controller
    Route::post('/favorite/{type}/{id}', [App\Http\Controllers\User\FavoriteController::class, 'favorite']) ->withoutMiddleware(['UserAuthenticated']);;
    Route::post('/unfavorite/{type}/{id}', [App\Http\Controllers\User\FavoriteController::class, 'unfavorite'])->withoutMiddleware(['UserAuthenticated']);



    // LiveChat Routes
    Route::group([], function(){

       // $liveChatRoute = 'admin.live.chat';
       Route::get('/support/chat', [MessagesController::class, 'index'])->name('user.live.chat');           
       // $liveChatRoute = 'user.live.chat';
       // include __DIR__.'/chatify.php';      
    });

    

    

});




Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('front.index');


Route::get('/subcategories/{categoryId}', [App\Http\Controllers\Front\HomeController::class, 'getSubcategories'])->name('front.getSubcategories');

Route::post('/error/report', [App\Http\Controllers\Front\ErrorReportController::class, 'store'])->name('error.report');
Route::post('dropzone/media',  [App\Http\Controllers\Front\HomeController::class, 'dropzoneStoreMedia'])->name('dropzone.storeMedia');


// Product Routes
Route::group(['prefix' => 'products'], function() {
    Route::get('/', [App\Http\Controllers\Front\ProductController::class, 'index'])->name('front.products.index');
    Route::get('/{slug}', [App\Http\Controllers\Front\ProductController::class, 'show'])->name('front.products.show');
    Route::post('/get-variant-price', [App\Http\Controllers\Front\ProductController::class, 'getVariantPrice'])->name('front.products.variant-price');
});

// Service Routes
Route::get('/services', [App\Http\Controllers\Front\ServiceController::class, 'index'])->name('front.services.index');
Route::get('/service/{slug}', [App\Http\Controllers\Front\ServiceController::class, 'show'])->name('front.services.show');

// Blog Routes
Route::get('/blog', [App\Http\Controllers\Front\BlogController::class, 'index'])->name('front.blog.index');
Route::get('/blog/{slug}', [App\Http\Controllers\Front\BlogController::class, 'show'])->name('front.blog.show');

// Nostalgia Routes
Route::get('/nostalgia', [App\Http\Controllers\Front\NostalgiaController::class, 'index'])->name('front.nostalgia.index');
Route::get('/nostalgia/{slug}', [App\Http\Controllers\Front\NostalgiaController::class, 'show'])->name('front.nostalgia.show');
Route::get('/nostalgia/categories/{category}/subcategories', [App\Http\Controllers\Front\NostalgiaController::class, 'getSubcategories'])->name('front.nostalgia.subcategories');
Route::get('/nostalgia/subcategories/{subcategory}/children', [App\Http\Controllers\Front\NostalgiaController::class, 'getChildcategories'])->name('front.nostalgia.childcategories');

// Cart Routes
Route::group(['prefix' => 'cart', 'as' => 'front.cart.'], function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::post('/update/{item}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove/{item}', [CartController::class, 'remove'])->name('remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('clear');
});

// Order Routes
// Route::group(['prefix' => 'orders', 'as' => 'front.orders.', 'middleware' => 'auth'], function () {
//     Route::get('/', [App\Http\Controllers\Front\OrderController::class, 'index'])->name('index');
//     Route::get('/{order:order_number}', [App\Http\Controllers\Front\OrderController::class, 'show'])->name('show');
//     Route::get('/success/{order:order_number}', [App\Http\Controllers\Front\OrderController::class, 'success'])->name('success');
//     Route::get('/cancel/{order:order_number}', [App\Http\Controllers\Front\OrderController::class, 'cancel'])->name('cancel');
// });

// Checkout Routes
Route::group(['prefix' => 'checkout', 'as' => 'front.checkout.'], function () {
    Route::get('/', [App\Http\Controllers\Front\CheckoutController::class, 'index'])->name('index');
    Route::post('/process', [App\Http\Controllers\Front\CheckoutController::class, 'process'])->name('process');
    // Route::get('/success/{orderNumber}', [App\Http\Controllers\Front\CheckoutController::class, 'success'])->name('success');
    Route::get('/cancel/{orderNumber}', [App\Http\Controllers\Front\CheckoutController::class, 'cancel'])->name('cancel');
});


// Payment Routes
Route::prefix('payment')->name('front.payment.')->middleware('auth')->group(function () {

  Route::get('/stripe/success/{orderNumber}', [App\Http\Controllers\Front\StripeController::class, 'callback'])->name('stripe.success');
  Route::get('/paypal/success/{orderNumber}', [App\Http\Controllers\Front\PaypalController::class, 'callback'])->name('paypal.success');
    
});

// Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);



// Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details in profile section
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');




Route::view('/page-not-found', 'errors.404')->name('front.404');

// Route::get('/support',[App\Http\Controllers\vendor\Chatify\MessagesController::class, 'index']);
include __DIR__.'/chatify.php';  




Route::middleware(['auth'])->group(function () {
    // Display the subscription checkout page.
    Route::get('/subscription/checkout', [SubscriptionCheckoutController::class, 'show'])
         ->name('subscription.checkout.show');

    // AJAX endpoint for dynamic price recalculation.
    Route::post('/subscription/checkout/calculate', [SubscriptionCheckoutController::class, 'calculatePrice'])
         ->name('checkout.calculate');

    // Process the subscription payment.
    Route::post('/subscription/checkout/process', [SubscriptionCheckoutController::class, 'processPayment'])
         ->name('subscription.process.payment');
});



// Help Center Routes
Route::prefix('help')->name('front.help.')->group(function () {
    Route::get('/', [App\Http\Controllers\Front\HelpController::class, 'index'])->name('overview');
    Route::get('/faqs', [App\Http\Controllers\Front\HelpController::class, 'faqs'])->name('faqs');
    Route::get('/guides', [App\Http\Controllers\Front\HelpController::class, 'guides'])->name('guides');
    Route::get('/terms', [App\Http\Controllers\Front\HelpController::class, 'terms'])->name('terms');
    Route::get('/privacy', [App\Http\Controllers\Front\HelpController::class, 'privacy'])->name('privacy');
});

Route::get('/about', function () {
  return view('front.about');
})->name('front.about');


// Route::view('/test/page', 'front.test');
Route::get('{any}', [App\Http\Controllers\Front\HomeController::class, 'page'])->name('front.page');



// Route::group([
//     'prefix' => 'admin/support/chat',
//     'middleware' => ['auth:admin'],
//     'namespace' => 'App\Http\Controllers\vendor\Chatify',
// ], function () {
//     Route::get('/', [MessagesController::class, 'index'])->name('user');
//     Route::get('/{id}', [MessagesController::class, 'idFetchData'])->name('idFetchData');
// });


// Include Chatify routes




