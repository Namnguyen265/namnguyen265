<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\BlogsController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\MailController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Admin\OrderHistoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controlllers\Auth\LoginController;
use App\Models\Users;
use App\Models\Rate;

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
// frontend

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', [UserController::class, 'user']);
Route::group([
    'namespace' => 'Frontend'
], function(){
    
    Route::get('/log', [MemberController::class, 'Func']);
    Route::get('/account', [MemberController::class, 'Account'])->name('account');
    Route::post('/account' , [MemberController::class, 'Update']);
    
    

    Route::get('/index', [HomeController::class, 'index'])->name('home');
    
    Route::get('/productdetail/{id}', [ProductsController::class, "Detail"])->name('product_detail');

    
    Route::get('/cart', [CartController::class, 'ShowCart'])->name('showcart');
    
    Route::get('/member-checkout', [CheckoutController::class, 'Checkout'])->name('checkout');
    
    Route::post('/checkout/order', [MailController::class, 'Order'])->name('store2');
    
    
    Route::post('/search', [SearchController::class, 'Search'])->name('view_search');
    Route::get('/search_advanced', [SearchController::class, 'Search_Advanced'])->name('search_advanced');
    Route::post('/search_advanced', [SearchController::class, 'Search_Advanced_Click'])->name('advanced');


    Route::get('/blog', [BlogsController::class, 'blog'])->name('bloglist');
    Route::get('/blog-single/{id}', [BlogsController::class, 'show'])->name('blogsingle');
    
    Route::get('/tag/{blog_tags}', [BlogsController::class, 'Tag']);

    Route::post('/cart/ajax', [CartController::class, 'AddToCart']);
    Route::post('/searchprice/ajax', [SearchController::class, 'Search_Price']);
    Route::post('/ajax/product_by_category', [SearchController::class, 'Product_By_Category']);
    Route::get('/product-by-category/{id}', [SearchController::class, 'Product_Category'])->name('product_category');
    Route::get('/product-by-brand/{id}', [SearchController::class, 'Product_Brand'])->name('product_company');

    
    Route::group(['middleware' => 'memberNotLogin'], function () {
        Route::get('/member-register',[MemberController::class, 'RegisterForm'])->name('registerform');
        Route::post('/member-register', [MemberController::class, 'Register']);
        Route::get('/member-login', [MemberController::class, 'LoginForm'])->name('loginform');
        Route::post('/member-login', [MemberController::class, 'Login'])->name('loginpost');

        Route::post('/checkout/login', [MailController::class, 'Login'])->name('store');
        Route::post('/checkout/register', [MailController::class, 'Registering'])->name('store3');
});


    Route::group(['middleware' => 'member'], function () {
        Route::get('/product', [ProductsController::class, 'Show'])->name('product');
        Route::get('/createproduct', [ProductsController::class, 'Create'])->name('createproduct');
        Route::post('/createproduct', [ProductsController::class, 'Store']);
        Route::get("/deleteproduct/{id}", [ProductsController::class, 'Delete'])->name('delete_product');
        Route::get('/updateproduct/{id}', [ProductsController::class, 'Edit'])->name('updateform');
        Route::post('/updateproduct/{id}', [ProductsController::class, 'Update']);


        Route::get('/account', [MemberController::class, 'Account'])->name('account');
        Route::post('/account' , [MemberController::class, 'Update']);
        Route::get('/logout', [MemberController::class, "Logout"])->name('out');

        Route::post('/blog/comment', [BlogsController::class, 'blogcomment']);
        Route::post('/product/comment', [ProductsController::class, 'Product_Comment']);
        // Route::get('/blog-single/{id}', [BlogsController::class, 'show'])->name('blogsingle');
        Route::post('/blog/ajax', [BlogsController::class, 'blograte']);
        Route::post('/productdetail/ajax', [ProductsController::class, 'Rate_Product']);

        Route::get('/member-history', [MemberController::class, 'History'])->name('member_history');
        Route::get('/member-history/{id}', [MemberController::class, 'Detail_History'])->name('history_detail');
        Route::get('/delete-history/{id}', [MemberController::class, 'Cancel_History'])->name('history_cancel');
    });
});

// Route::get('/dashboard', function () {
//     return view('admin.user.dashboard');
// })->name('dashboard');




// Route::group(['middleware' => 'member'], function () {

// });


// backend 
Auth::routes();

// Route::group([
//     'prefix' => 'admin',
//     'namespace' => 'Auth'
// ], function () {
//     Route::get('/', 'LoginController@showLoginForm');
//     Route::get('/login', [Auth\LoginController::class, 'showLoginForm']);
//     Route::post('/login', [Auth\LoginController::class, 'login'])->name('login');
//     Route::get('/logout', 'LoginController@logout');
// });
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['admin']
], function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('home', [App\Http\Controllers\HomeController::class, 'index']);
    
    Route::get('/logout', [DashboardController::class, 'Logout'])->name('logout_admin');
    // Route::get('/dash', [DashboardController::class, 'index']);
    
    Route::get('profile' , [UserController::class , 'profile_country'])->name('edit');
    Route::post('profile', [UserController::class, 'Up']);
    
    
    // Route::get('/show' , [UserController::class , 'show']);
    
    // Route::get('/upload' , [DashboardController::class, 'UploadFile'])->name('upload');
    

    // Route::prefix('country')->group(function() {
        Route::get('/country', [CountryController::class, 'country'])->name('country');
        Route::get('/country/add', [CountryController::class, 'addcountry'])->name('addcountry');
        Route::post('/country/add', [CountryController::class, 'insert_country'])->name('insert_country');
    // });
    Route::get('deletecountry/{id}', [CountryController::class, 'delete_country'])->name('delete_country');
    
    Route::get('auth', [CountryController::class, 'profile_country']);
    
    
    
    Route::get('blog', [BlogController::class, 'blog'])->name('blog');
    Route::get('addblog', [BlogController::class, 'addblog'])->name('addblog');
    Route::post('addblog',[BlogController::class, 'insertblog'])->name('insertblog');
    Route::get('deleteblog/{id}', [BlogController::class, 'deleteblog'])->name('deleteblog');
    
    
    Route::get('editblog/{id}', [BlogController::class, 'editblog'])->name('editblog');
    Route::post('editblog/{id}', [BlogController::class, 'updateblog'])->name('updateblog');

    Route::get('/category', [CategoryController::class, 'Category'])->name('category');
    Route::get('/category/add', [CategoryController::class, 'AddCategory'])->name('addcategory');
    Route::post('/category/add', [CategoryController::class, 'InsertCategory'])->name('insert_category');

    Route::get('deletecategory/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete_category');

    Route::get('/brand', [BrandController::class, 'Brand'])->name('brand');
    Route::get('/brand/add', [BrandController::class, 'AddBrand'])->name('addbrand');
    Route::post('/brand/add', [BrandController::class, 'InsertBrand'])->name('insert_brand');
    Route::get('deletebrand/{id}', [BrandController::class, 'DeleteBrand'])->name('delete_brand');

    Route::post('',[]);
    
    Route::get('/history', [OrderHistoryController::class, 'View'])->name('view_history');
    Route::get('history/{id}', [OrderHistoryController::class, 'Detail'])->name('detail_order');
    Route::post('/history/{id}', [OrderHistoryController::class, 'Update']);

    Route::get('/product', [ProductController::class, 'View'])->name('admin_product');
    Route::get('/createproduct', [ProductController::class, 'Create'])->name('create_product');
    Route::post('/createproduct', [ProductController::class, 'Store']);
    Route::get('/updateproduct/{id}', [ProductController::class, 'Edit'])->name('update_product');
    Route::post('/updateproduct/{id}', [ProductController::class, 'Update']);
    Route::get('/deleteproduct/{id}', [ProductController::class, 'Delete'])->name('delete_product');

    
    Route::post('/search-admin-product', [ProductController::class, 'Search'])->name('search_admin_product');

    Route::get('/comment-product',[CommentController::class, 'View_Comment'])->name('admin_comment');
    Route::get('/delete-comment-product/{id}', [CommentController::class, 'Delete_Comment'])->name('delete_product_comment');
    Route::get('/comment-blog', [CommentController::class, 'View_Comment_Blog'])->name('admin_comment_blog');
    Route::get('/list-customer', [CustomerController::class,'List_Customer'])->name('list_customer');
    Route::get('/delete-customer/{id}', [CustomerController::class, 'Delete_Customer'])->name('delete_customer');

    Route::post('/filter-date/ajax', [DashboardController::class, "Filter"]);
    Route::post('/30dayorder/ajax', [DashboardController::class, 'Filter30days']);
    Route::post('/ajax/dashboard_filter', [DashboardController::class, 'Dashboard_Filter']);
});
// Route::prefix('admin')-> group(function() {

    
    
//     Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

//     Route::get('home', [App\Http\Controllers\HomeController::class, 'index']);
    
//     Route::get('/logout', [DashboardController::class, 'Logout'])->name('logout_admin');
//     // Route::get('/dash', [DashboardController::class, 'index']);
    
//     Route::get('profile' , [UserController::class , 'profile_country'])->name('edit');
//     Route::post('profile', [UserController::class, 'Up']);
    
    
//     // Route::get('/show' , [UserController::class , 'show']);
    
//     // Route::get('/upload' , [DashboardController::class, 'UploadFile'])->name('upload');
    

//     // Route::prefix('country')->group(function() {
//         Route::get('/country', [CountryController::class, 'country'])->name('country');
//         Route::get('/country/add', [CountryController::class, 'addcountry'])->name('addcountry');
//         Route::post('/country/add', [CountryController::class, 'insert_country'])->name('insert_country');
//     // });
//     Route::get('deletecountry/{id}', [CountryController::class, 'delete_country'])->name('delete_country');
    
//     Route::get('auth', [CountryController::class, 'profile_country']);
    
    
    
//     Route::get('blog', [BlogController::class, 'blog'])->name('blog');
//     Route::get('addblog', [BlogController::class, 'addblog'])->name('addblog');
//     Route::post('addblog',[BlogController::class, 'insertblog'])->name('insertblog');
//     Route::get('deleteblog/{id}', [BlogController::class, 'deleteblog'])->name('deleteblog');
    
    
//     Route::get('editblog/{id}', [BlogController::class, 'editblog'])->name('editblog');
//     Route::post('editblog/{id}', [BlogController::class, 'updateblog'])->name('updateblog');

//     Route::get('/category', [CategoryController::class, 'Category'])->name('category');
//     Route::get('/category/add', [CategoryController::class, 'AddCategory'])->name('addcategory');
//     Route::post('/category/add', [CategoryController::class, 'InsertCategory'])->name('insert_category');

//     Route::get('deletecategory/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete_category');

//     Route::get('/brand', [BrandController::class, 'Brand'])->name('brand');
//     Route::get('/brand/add', [BrandController::class, 'AddBrand'])->name('addbrand');
//     Route::post('/brand/add', [BrandController::class, 'InsertBrand'])->name('insert_brand');
//     Route::get('deletebrand/{id}', [BrandController::class, 'DeleteBrand'])->name('delete_brand');

//     Route::post('',[]);
    
//     Route::get('/history', [OrderHistoryController::class, 'View'])->name('view_history');

// });




