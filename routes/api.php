<?php

use App\Http\Controllers\admin\LevelC;
use App\Http\Controllers\api\ApplyCollegeAc;
use App\Http\Controllers\api\BlogAc;
use App\Http\Controllers\api\DestinationAc;
use App\Http\Controllers\api\GalleryAc;
use App\Http\Controllers\api\SeoAc;
use App\Http\Controllers\api\ServiceAc;
use App\Http\Controllers\api\StudentAc;
use App\Http\Controllers\api\StudentLoginAc;
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
Route::get('/latest-blog/{no?}', [BlogAc::class, 'latestBlogs']);

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

Route::get('/seo/{page_name}', [SeoAc::class, 'index']);

Route::get('/levels/', [LevelC::class, 'levels']);


/* STUDENT ROUTES BEFORE LOGIN */

Route::post('/sign-up', [StudentLoginAc::class, 'register']);
Route::post('/login', [StudentLoginAc::class, 'signin']);
Route::post('/submit-email-otp', [StudentLoginAc::class, 'submitOtp']);
Route::post('/forget-password', [StudentLoginAc::class, 'forgetPassword']);
Route::post('/reset-password', [StudentLoginAc::class, 'resetPassword']);

/* STUDENT ROUTES AFTER LOGIN */

Route::prefix('/student')->group(function () {
  Route::get('/profile/{id}', [StudentAc::class, 'index']);
  Route::get('/schools/{id}', [StudentAc::class, 'schools']);
  Route::get('/documents/{id}', [StudentAc::class, 'documents']);
  Route::get('/delete-school/{id}', [StudentAc::class, 'deleteSchool']);
  Route::post('/change-password', [StudentAc::class, 'changePassword']);
  Route::get('/applied-college', [StudentAc::class, 'appliedCollege']);
  Route::get('/shortlist', [StudentAc::class, 'shortlist']);
  Route::post('/personal-information', [StudentAc::class, 'submitPersonalInfo']);
  Route::post('/education-summary', [StudentAc::class, 'submitEduSum']);
  Route::post('/add-school', [StudentAc::class, 'addSchool']);
  Route::post('/update-school', [StudentAc::class, 'updateSchool']);
  Route::post('/update-test-score', [StudentAc::class, 'updateTestScore']);
  Route::post('/update-background-info', [StudentAc::class, 'updateBI']);
  Route::post('/upload-documents', [StudentAc::class, 'updateDocs']);

  Route::get('/apply-college/{university_id}/{student_id}', [ApplyCollegeAc::class, 'index']);
  Route::get('/applied-colleges/{student_id}', [ApplyCollegeAc::class, 'colleges']);
  Route::get('/check-applied-college/{university_id}/{student_id}', [ApplyCollegeAc::class, 'check']);
});
