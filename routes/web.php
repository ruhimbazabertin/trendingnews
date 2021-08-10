<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\DistrictController;
use App\Http\Controllers\backend\SubDistrictController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\WebsiteController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\frontend\ExtraController;

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

Route::get('/', function () {
    return view('main.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin Route

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

//Admin Category All Routes

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/add/category', [CategoryController::class, 'addCategory'])->name('add.category');
Route::post('/create/category', [CategoryController::class, 'storeCategory'])->name('store.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');

//Admin SubCategory All Routes

Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories');
Route::get('/add/subcategories', [SubCategoryController::class, 'addSubcategory'])->name('add.subcategory');
Route::post('/create/subcategories', [SubCategoryController::class, 'storeSubcategory'])->name('store.subcategory');
Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'editSubcategory'])->name('edit.subcategory');
Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'updatesubcategory'])->name('update.subcategory');
Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'deletesubcategory'])->name('delete.subcategory');

//Admin District All Routes

Route::get('/districts', [DistrictController::class, 'index'])->name('district');
Route::get('/add/district', [DistrictController::class, 'addDistrict'])->name('add.district');
Route::post('/create/district', [DistrictController::class, 'storedistrict'])->name('store.district');
Route::get('/edit/district/{id}', [DistrictController::class, 'editDistrict'])->name('edit.district');
Route::post('/update/district/{id}', [DistrictController::class, 'updateDistrict'])->name('update.district');
Route::get('/delete/district/{id}', [DistrictController::class, 'deleteDistrict'])->name('delete.district');

//Admin SubDistrict All Routes

Route::get('/subdistricts', [SubDistrictController::class, 'index'])->name('subdistrict');
Route::get('/add/subdistrict', [SubDistrictController::class, 'addSubdistrict'])->name('add.subdistrict');
Route::post('/create/subdistrict', [SubDistrictController::class, 'storeSubdistrict'])->name('store.subdistrict');
Route::get('/edit/subdistrict/{id}', [SubDistrictController::class, 'editSubdistrict'])->name('edit.subdistrict');
Route::post('/update/subdistrict/{id}', [SubDistrictController::class, 'updateSubdistrict'])->name('update.subdistrict');
Route::get('/delete/subdistrict/{id}', [SubDistrictController::class, 'deleteSubdistrict'])->name('delete.subdistrict');


//JSON DATA FOR CATEGORY AND DISTRICT
Route::get('/get/subcategory/{category_id}', [PostController::class, 'getSubCategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class, 'getSubdistrict']);

//Admin Post All Routes
Route::get('/all/post', [PostController::class, 'index'])->name('all.post');
Route::get('/add/post', [PostController::class, 'createPost'])->name('create.post');
Route::post('/create/post', [PostController::class, 'storePost'])->name('store.post');
Route::get('/edit/post/{id}', [PostController::class, 'editPost'])->name('edit.post');
Route::post('/update/post/{id}', [PostController::class, 'updatePost'])->name('update.post');
Route::get('/delete/post/{id}', [PostController::class, 'deletePost'])->name('delete.post');

//Social Setting
Route::get('/social/setting', [SettingController::class, 'socialSetting'])->name('social.setting');
Route::post('/update/social/{id}', [SettingController::class, 'socialUpdate'])->name('update.social');

//Seo setting Routes
Route::get('/seo/setting', [SettingController::class, 'seoSetting'])->name('seo.setting');
Route::post('/update/seo/{id}', [SettingController::class, 'seoUpdate'])->name('seo.update');

//prayers settings Route
Route::get('/prayer/setting', [SettingController::class, 'prayerSetting'])->name('prayer.setting');
Route::post('/update/prayer/{id}', [SettingController::class, 'updatePrayer'])->name('update.prayer');

//live tv settings Routes
Route::get('/livetv/setting', [SettingController::class, 'liveTvSetting'])->name('livetv.setting');
Route::post('update/livetv/setting/{id}', [SettingController::class, 'updateLiveTv'])->name('update.livetv');
//Activate and disactivate live tv settings route
Route::get('/activate/tv/setting/{id}', [SettingController::class, 'activateTvSetting'])->name('activated.livetv');
Route::get('/desactivate/tv/setting/{id}', [SettingController::class, 'desactivateTvSetting'])->name('Desactive.livetv');

//Notice Setting
Route::get('/notice/setting', [SettingController::class, 'noticeSetting'])->name('notice.setting');
Route::post('update/notice/setting/{id}', [SettingController::class, 'updateNotice'])->name('update.notice');
Route::get('/activate/notice/setting/{id}', [SettingController::class, 'activateNotice'])->name('activate.notice');
Route::get('/desactivate/notice/setting/{id}', [SettingController::class, 'desactivateNotice'])->name('Desactive.notice');

//Website Routes
Route::get('/website', [WebsiteController::class, 'websiteSetting'])->name('all.website');
Route::get('/add/website', [WebsiteController::class, 'addWebsite'])->name('add.website');
Route::post('/create/website', [WebsiteController::class, 'storeWebsite'])->name('store.website');
Route::get('/delete/website/{id}', [WebsiteController::class, 'deleteWebsite'])->name('delete.website');


//Photo Gallery Routes
Route::get('/photo/gallery', [GalleryController::class, 'photoGallery'])->name('photo.gallery');
Route::get('/add/photo/gallery', [GalleryController::class, 'addPhoto'])->name('add.photo');
Route::post('/store/photo/gallery', [GalleryController::class, 'storePhoto'])->name('store.photo');
Route::get('/delete/photo/{id}', [GalleryController::class, 'deletePhoto'])->name('delete.photo');

//Video Gallery Routes
Route::get('/video/gallery', [GalleryController::class, 'videoGallery'])->name('video.gallery');
Route::get('/add/video/gallery', [GalleryController::class, 'addVideo'])->name('add.video');
Route::post('/store/video/gallery', [GalleryController::class, 'storeVideo'])->name('store.video');
Route::get('/delete/video/{id}', [GalleryController::class, 'deleteVideo'])->name('delete.video');



//FRONTEND
//multilanguage routes
Route::get('/lang/french', [ExtraController::class, 'french'])->name('lang.english');
Route::get('/lang/english', [ExtraController::class, 'english'])->name('lang.french');

