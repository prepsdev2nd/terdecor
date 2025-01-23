<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TestimonyController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/survey', [SurveyController::class, 'form'])->name('survey.form');
Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');
Route::get('/testapi', [SurveyController::class, 'testapi'])->name('survey.testapi');
Route::get('/testimony', [TestimonyController::class, 'form'])->name('testimony.form');
Route::post('/testimony', [TestimonyController::class, 'userstore'])->name('testimonyuser.store');
Route::post('/complaint', [ComplaintController::class, 'userstore'])->name('complaint.userstore');

Route::get('/api/provinces', function () {
    try {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['message' => 'Failed to fetch provinces'], 500);
        }
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error fetching provinces: ' . $e->getMessage()], 500);
    }
});

Route::get('/api/kabupaten-kota/{provinceId}', function ($provinceId) {
    try {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['message' => 'Failed to fetch kabupaten/kota'], 500);
        }
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error fetching kabupaten/kota: ' . $e->getMessage()], 500);
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/admin/blog/getData', [BlogController::class, 'getData'])->name('admin.blog.getData');
    Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blog', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('/admin/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/admin/blog/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');
    Route::get('/admin/blog/getTags', [BlogController::class, 'getTags'])->name('admin.blog.getTags');

    Route::get('/admin/package', [PackageController::class, 'index'])->name('admin.package.index');
    Route::get('/admin/package/getData', [PackageController::class, 'getData'])->name('admin.package.getData');
    Route::get('/admin/package/create', [PackageController::class, 'create'])->name('admin.package.create');
    Route::post('/admin/package', [PackageController::class, 'store'])->name('admin.package.store');
    Route::get('/admin/package/edit/{id}', [PackageController::class, 'edit'])->name('admin.package.edit');
    Route::post('/admin/package/update/{id}', [PackageController::class, 'update'])->name('admin.package.update');
    Route::delete('/admin/package/{id}', [PackageController::class, 'destroy'])->name('admin.package.delete');

    Route::get('/admin/design', [DesignController::class, 'index'])->name('admin.design.index');
    Route::get('/admin/design/getData', [DesignController::class, 'getData'])->name('admin.design.getData');
    Route::get('/admin/design/create', [DesignController::class, 'create'])->name('admin.design.create');
    Route::post('/admin/design', [DesignController::class, 'store'])->name('admin.design.store');
    Route::get('/admin/design/edit/{id}', [DesignController::class, 'edit'])->name('admin.design.edit');
    Route::post('/admin/design/update/{id}', [DesignController::class, 'update'])->name('admin.design.update');
    Route::delete('/admin/design/{id}', [DesignController::class, 'destroy'])->name('admin.design.delete');
    Route::get('/admin/design/getTags', [DesignController::class, 'getTags'])->name('admin.design.getTags');

    Route::get('/admin/customer', [CustomerController::class, 'index'])->name('admin.customer.index');
    Route::get('/admin/customer/getData', [CustomerController::class, 'getData'])->name('admin.customer.getData');
    Route::delete('/admin/customer/{id}', [CustomerController::class, 'destroy'])->name('admin.customer.delete');

    Route::get('/admin/complaint', [ComplaintController::class, 'index'])->name('admin.complaint.index');
    Route::get('/admin/complaint/getData', [ComplaintController::class, 'getData'])->name('admin.complaint.getData');
    Route::delete('/admin/complaint/{id}', [ComplaintController::class, 'destroy'])->name('admin.complaint.delete');

    Route::get('/admin/testimony', [TestimonyController::class, 'index'])->name('admin.testimony.index');
    Route::get('/admin/testimony/getData', [TestimonyController::class, 'getData'])->name('admin.testimony.getData');
    Route::get('/admin/testimony/create', [TestimonyController::class, 'create'])->name('admin.testimony.create');
    Route::post('/admin/testimony', [TestimonyController::class, 'store'])->name('admin.testimony.store');
    Route::get('/admin/testimony/edit/{id}', [TestimonyController::class, 'edit'])->name('admin.testimony.edit');
    Route::post('/admin/testimony/update/{id}', [TestimonyController::class, 'update'])->name('admin.testimony.update');
    Route::delete('/admin/testimony/{id}', [TestimonyController::class, 'destroy'])->name('admin.testimony.delete');
});

require __DIR__ . '/auth.php';
