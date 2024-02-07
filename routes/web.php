<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\EmamController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LangController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BooksController;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\Frontend\IssuesController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\JoiningController;

use App\Http\Controllers\Frontend\CampaignController;
use App\Http\Controllers\Frontend\IdeologyController;
use App\Http\Controllers\Frontend\AskaboutusController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\Frontend\EmamuzzamanController;
use App\Http\Controllers\Frontend\PartyMemberController;
use App\Http\Controllers\Frontend\PressConferenceController;
use App\Http\Controllers\Frontend\TermsConditionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Lang change
Route::get('/lang/change', [LangController::class, 'Change'])->name('changeLang');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/issues', [IssuesController::class, 'index'])->name('issues');
Route::get('/ideology', [IdeologyController::class, 'index'])->name('ideology');
Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/details/{id}/{slug}', [BlogController::class, 'blogDetails'])->name('blog.details');
Route::get('/blog/category/{id}/{slug}', [BlogController::class, 'blogCategory'])->name('blog.category');
Route::get('/blog/subcategory/{id}/{slug}', [BlogController::class, 'blogSubcategory'])->name('blog.subcategory');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/details/{id}/{slug}', [GalleryController::class, 'galleryDetails'])->name('gallery.details');

// Youtube Video
Route::controller(VideoController::class)->group(function(){
    Route::get('/video/','index')->name('video');
    Route::get('/video/category/{id}/{slug}','videoCategory')->name('blog.video');

    Route::get('/video/arabic','arabicVideo')->name('video.arabic');
    Route::get('/video/hindi','hindiVideo')->name('video.hindi');
    Route::get('/video/documentary','documentaryVideo')->name('video.documentary');
    Route::get('/video/education','educationVideo')->name('video.education');
    Route::get('/video/faith_is_belief','faithbeliefVideo')->name('video.faith_is_belief');
    Route::get('/video/press_conference','pressconferenceVideo')->name('video.press_conference');
    Route::get('/video/propaganda','propagandaVideo')->name('video.propaganda');
    Route::get('/video/religious','religiousVideo')->name('video.religious');
    Route::get('/video/attack_on','attackonVideo')->name('video.attack_on');
});


Route::get('/books', [BooksController::class, 'index'])->name('books');
Route::get('/books/details/{id}/{slug}', [BooksController::class, 'Details'])->name('books.details');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact/member/store', [ContactController::class, 'memberStore'])->name('contact.member.store');

Route::get('/terms-conditions', [TermsConditionsController::class, 'index'])->name('terms-conditions');


Route::post('/search', [SearchController::class, 'index'])->name('search');
Route::post('/search/results', [SearchController::class, 'SearchResults'])->name('search.results');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/press-conference', [PressConferenceController::class, 'index'])->name('press-conference');
Route::get('/press-conference/details/{id}/{slug}', [PressConferenceController::class, 'PcDetails'])->name('press-conference.details');

Route::get('/joining', [JoiningController::class, 'index'])->name('joining');
Route::post('/joining',[JoiningController::class, 'store'])->name('joining.store');

//Subscriber
Route::post('/subscriber',[SubscriberController::class, 'subscribeStore'])->name('subscriber.store');
Route::get('/subscriber/verify/{token}', [SubscriberController::class, 'verify'])->name('subscriber_verify');


Route::post('/askaboutus',[AskaboutusController::class, 'store'])->name('askaboutus.store');

Route::get('/htemam',[EmamController::class, 'index'])->name('htemam');
Route::get('/emamuzzaman',[EmamuzzamanController::class, 'index'])->name('emamuzzaman');


// Party-Member
Route::get('/party-member', [PartyMemberController::class, 'index'])->name('party-member');
Route::get('/party-member/{slug_name}', [PartyMemberController::class, 'Details'])->name('party-member.details');



require __DIR__.'/auth.php';


