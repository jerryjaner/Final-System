<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dishcontroller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\FacebookLoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ShippingFeeController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!+

for the login with google this client id belongs to env file

GOOGLE_CLIENT_ID="79659538822-s1f18c9l1d671dq7rtpbj1fo4bt72cng.apps.googleusercontent.com"
GOOGLE_CLIENT_SECRET="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"

*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group (function(){

	Auth::routes();
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* For Admin */

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory'] ],function(){

	Route::get('dashboard',[AdminController::class,'index'])->name('admin_dashboard');
	Route::get('manage',[AdminController::class,'manage'])->name('manage_user');
	Route::get('manageorder',[AdminController::class,'order'])->name('manage_order');

	/* Add user here */
	Route::post('add/user', [AdminController::class, 'create'])->name('save_user');
	Route::get('profile',[AdminController::class,'profile'])->name('admin_profile');
	Route::post('update', [AdminController::class, 'profile_update'])->name('profile_update');
	Route::get('change/password',[AdminController::class,'change_pass'])->name('change_password');
	Route::post('update/password', [AdminController::class, 'update_pass'])->name('password_update');

	/* Update Staff */
	Route::post('staff-update',[AdminController::class,'update_staff'])->name('update_staff');
	Route::post('change-staff-password', [AdminController::class, 'change_staff_password'])->name('change_staff_password');
	
	/* Category Start here */
	Route::get('/category/add', [CategoryController::class, 'index'])->name('show_cate_table');
	Route::post('/category/save', [CategoryController::class, 'save'])->name('cate_save');
	Route::get('/category/manage', [CategoryController::class, 'manage'])->name('manage_cate'); 
	Route::get('/category/active{category_id}', [CategoryController::class, 'active'])->name('category_active');
	Route::get('/category/Inactive{category_id}', [CategoryController::class, 'Inactive'])->name('Inactive_cate');
	Route::get('/category/delete{category_id}', [CategoryController::class, 'delete'])->name('cate_delete');
	Route::post('/category/update', [CategoryController::class, 'update'])->name('cate_update'); 

	/* Dish Start Here */
	Route::get('/dish/add', [Dishcontroller::class, 'index'])->name('show_dish_table');
	Route::post('/dish/save', [Dishcontroller::class, 'save_dish'])->name('save_dish_data');
	Route::get('/dish/manage', [Dishcontroller::class, 'manage_dish'])->name('manage_dish_table');
	Route::get('/dish/inactive{id}', [Dishcontroller::class, 'inactive_dish'])->name('dish_Inactive');
	Route::get('/dish/active{id}', [Dishcontroller::class, 'active_dish'])->name('dish_Active');
	Route::get('/dish/delete{id}', [Dishcontroller::class, 'delete_dish'])->name('dish_delete');
	Route::post('/dish/edit', [Dishcontroller::class, 'dish_update'])->name('update_dish');
	
	/* Order Starts Here  */
	Route::get('/orderManage', [OrderController::class, 'Manage_Order'])->name('show_order');
	Route::get('/view/order{id}', [OrderController::class, 'View_Order'])->name('view_order');
	Route::get('/order/delete{id}', [OrderController::class, 'delete_order'])->name('delete_order');
	Route::get('/view/invoice{id}', [OrderController::class, 'view_invoice'])->name('view_invoice');
	Route::get('/download/invoice{id}', [OrderController::class, 'download_invoice'])->name('download_invoice');

	/* Shipping Fee */
	Route::get('/shippingfee',[ShippingFeeController::class,'shippingfee_index'])->name('shipping_fee');
	Route::post('/add/shippingfee', [ShippingFeeController::class, 'add_shipping_fee'])->name('add_shippingfee');
	Route::post('shippinfgee/edit',[ShippingFeeController::class, 'edit_shippingfee'])->name('shippingfee_edit');
	Route::get('shippingfee/delete{id}',[ShippingFeeController::class, 'delete_shippingfee'])->name('shippingfee_delete');

	/* For the payment update */
	Route::post('/update/payment', [OrderController::class, 'update'])->name('order_update');

	/* For the order status update*/
    Route::post('/update/order', [OrderController::class, 'order_status'])->name('update_order_status');
    
    /* Report  for the client */
    Route::get('client/report',[ReportController::class,'client_report'])->name('client_report');
    Route::get('/download/clientReport', [ReportController::class, 'download_client'])->name('download_client');

    /* Report for the sales */
    Route::get('month/report',[ReportController::class,'month'])->name('month');
    Route::get('monthly/report',[ReportController::class,'monthly_report'])->name('monthly');

    Route::post('filter/report',[ReportController::class,'filter'])->name('filter');
    Route::get('filter', [ReportController::class, 'download_filtered'])->name('filtered');
    
    /* Message Customer */
    Route::get('message',[MessageController::class,'message_customer'])->name('message');
    Route::post('newMessage', [MessageController::class, 'new_message'])->name('send_smg');

    /* Customer feedback */
    Route::get('customer-feedback',[FeedbackController::class,'feedback'])->name('feedback');
    Route::post('feedback-filter',[FeedbackController::class,'feedback_filter'])->name('filter-feedback');
    // Route::get('customer-feedback-delete{id}',[FeedbackController::class,'feedback_delete'])->name('feedback_delete');



});


    /* Staff */
Route::group(['prefix'=>'staff','middleware'=>['isStaff','auth','PreventBackHistory'] ],function(){

	Route::get('dashboard',[StaffController::class,'index'])->name('staff_dashboard');
	Route::get('/customerOrder', [StaffController::class, 'CustomerOrder'])->name('manage_customer_orders');
	Route::get('/customerInvoice{id}', [StaffController::class, 'CustomerInvoice'])->name('customer_invoice');
	Route::get('/downloadInvoice{id}', [StaffController::class, 'DownloadCustomerInvoice'])->name('download_receipt');
	Route::post('/updatePayment', [StaffController::class, 'UpdatePayment'])->name('update_payment');
	Route::post('/updateOrder', [StaffController::class, 'UpdateOrder'])->name('update_order');

	//message

	Route::get('Messages',[StaffController::class,'message_index'])->name('msg_index');
	Route::post('Message-Customer', [StaffController::class, 'message_customer'])->name('msg_customer');

	});

    /* Customer  */

// Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory'] ],function(){


// 		});

	Route::get('/', [UserController::class, 'index'])->name('user_dashboard');
	Route::get('/category/dish/show{category_id}', [UserController::class, 'dish_show'])->name('category_dish');

	/*  Login in with Socialite which is Facebook and Google */
	Route::get('auth/google',[GoogleLoginController::class,'redirect'])->name('google_login');
	Route::get('auth/google/call-back',[GoogleLoginController::class, 'callback']);

	/*to contact us*/
	Route::get('Contact-Us', [UserController::class,'Contact_us'])->name('Contact_us');


	/* Cart Route */
	Route::post('/AddCart', [CartController::class, 'insert'])->name('add_to_cart');
	Route::get('/cartShow', [CartController::class, 'show'])->name('cart_show');
	Route::get('load-cart-data', [CartController::class, 'cartCount']);
	Route::get('/cartRemove{rowId}', [CartController::class, 'remove'])->name('remove_item');
	Route::post('/cartUpdate', [CartController::class, 'update'])->name('update_cart');
  

   /* Check out */
	Route::get('/checkOut/payment', [CheckOutController::class, 'payment'])->name('Checkout_payment');
	Route::post('/checkOut/NewOrder', [CheckOutController::class, 'order'])->name('new_order');
	Route::get('/checkoutComplete', [CheckOutController::class, 'complete'])->name('order_complete');
	

   /* shipping */
 	Route::get('/shipping', [UserController::class, 'shipping']);
 	Route::post('/shippingStore', [UserController::class, 'shipping_save'])-> name('store_shipping');

 	/* Notification */
 	Route::get('Notification/Message',[UserController::class,'Notification_Msg'])->name('notification');
 	Route::get('Message/Read{id}', [UserController::class, 'Mark_as_read'])->name('read_message');

   /*  view order */
   Route::post('cancel/order',[UserController::class,'cancel_order'])->name('cancel_customer_order');
   Route::get('customer/order',[UserController::class,'customerOrder'])->name('customer_order');
   Route::get('order/details{id}',[UserController::class,'viewOrder'])->name('view_order');
 
   // profile
    Route::get('profile',[UserController::class,'customerprofile'])->name('customer_profile');
    Route::post('update', [UserController::class, 'customer_profile_update'])->name('customer_update');
    Route::get('change/password',[UserController::class,'view_of_change_pass'])->name('view_of_changepassword');
    Route::post('update/password', [UserController::class, 'customer_update_password'])->name('update_pass');

   // Customer Feedback
	 Route::post('Feedback',[UserController::class,'customer_feedback'])->name('customer_feedback');



