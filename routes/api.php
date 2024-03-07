<?php

use App\Http\Controllers\api\BlogAc;
use App\Http\Controllers\api\DestinationAc;
use App\Http\Controllers\api\GalleryAc;
use App\Http\Controllers\api\ServiceAc;
use App\Http\Controllers\api\TestimonialAc;
use App\Http\Controllers\api\UniversityAc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/blog', [BlogAc::class, 'index']);
Route::get('/blog/{slug}', [BlogAc::class, 'detail']);

Route::get('/services', [ServiceAc::class, 'index']);
Route::get('/service/{slug}', [ServiceAc::class, 'detail']);

Route::get('/gallery', [GalleryAc::class, 'index']);

Route::get('/destinations', [DestinationAc::class, 'index']);
Route::get('/destination/{slug}', [DestinationAc::class, 'detail']);
Route::get('/destination-content/{page_id}', [DestinationAc::class, 'desContent']);
Route::get('/destination-gallery/{destination_id}', [DestinationAc::class, 'gallery']);
Route::get('/destination-faqs/{page_id}', [DestinationAc::class, 'faqs']);


Route::get('/universities', [UniversityAc::class, 'index']);
Route::get('/university/{slug}', [UniversityAc::class, 'detail']);
Route::get('/university-overviews/{university_id}', [UniversityAc::class, 'overviews']);
Route::get('/university-photos/{university_id}', [UniversityAc::class, 'photos']);
Route::get('/university-videos/{university_id}', [UniversityAc::class, 'videos']);

Route::get('/universities-by-destination/{destination_id}', [UniversityAc::class, 'universityBydestination']);

Route::get('/testimonials', [TestimonialAc::class, 'index']);
