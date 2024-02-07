<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Backend\SeoSettings;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\MenuConteroller;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\SettingSettings;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\JoiningController;
use App\Http\Controllers\Backend\MissionController;
use App\Http\Controllers\Backend\visitorController;
use App\Http\Controllers\Backend\YoutubeController;
use App\Http\Controllers\Backend\AbilitieController;
use App\Http\Controllers\Backend\BlogpostController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\IdeologyController;
use App\Http\Controllers\Backend\AboutPageController;
use App\Http\Controllers\Backend\AdminuserController;
use App\Http\Controllers\Backend\CountdownController;
use App\Http\Controllers\Backend\HomeAboutController;
use App\Http\Controllers\Backend\AskaboutusController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\FileManagerController;
use App\Http\Controllers\Backend\PartyMemberController;
use App\Http\Controllers\Backend\SocialMediaController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BookCategoryController;
use App\Http\Controllers\Backend\BookMangmentController;
use App\Http\Controllers\Backend\MediaPartnercontroller;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\RolesPermissionController;


Route::get('admin/login', 'App\Http\Controllers\Backend\AdminController@AdminLogin')->middleware(RedirectIfAuthenticated::class)->name('admin.login');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Backend', 'middleware' => ['auth', 'role:admin']], function () {

    Route::get('/', 'AdminController@index')->name('home');
    Route::get('logout', 'AdminController@AdminLogout')->name('logout');
    Route::get('profile', 'AdminController@AdminProfile')->name('profile');
    Route::post('profile/store', 'AdminController@AdminProfileStore')->name('profile.store');
    Route::get('change/password', 'AdminController@AdminChangePassword')->name('change.password');
    Route::post('update/password', 'AdminController@AdminUpdatePassword')->name('update.password');



    // Admin User all Route
    Route::controller(AdminuserController::class)->group(function(){
        Route::get('/adminuser','index')->name('adminuser');
        Route::get('/adminuser/create','create')->name('adminuser.create');
        Route::post('/adminuser/store','store')->name('adminuser.store');
        Route::get('/adminuser/edit/{id}','edit')->name('adminuser.edit');
        Route::post('/adminuser/update','update')->name('adminuser.update');
        Route::get('/adminuser/{id}','destroy')->name('adminuser.destroy');
        Route::get('/adminuser/inactive/{id}','inactive')->name('adminuser.inactive');
        Route::get('/adminuser/active/{id}','active')->name('adminuser.active');
    });



    // Permission
    Route::controller(PermissionController::class)->group(function(){
        Route::get('/permission','index')->name('permission');
        Route::get('/permission/create','create')->name('permission.create');
        Route::post('/permission/store','store')->name('permission.store');
        Route::get('/permission/edit/{id}','edit')->name('permission.edit');
        Route::post('/permission/update','update')->name('permission.update');
        Route::get('/permission/{id}','destroy')->name('permission.destroy');
    });

    //Roles
    Route::controller(RolesController::class)->group(function(){
        Route::get('/roles','index')->name('roles');
        Route::get('/roles/create','create')->name('roles.create');
        Route::post('/roles/store','store')->name('roles.store');
        Route::get('/roles/edit/{id}','edit')->name('roles.edit');
        Route::post('/roles/update','update')->name('roles.update');
        Route::get('/roles/{id}','destroy')->name('roles.destroy');

    });

    // Permission & Roles
    Route::controller(RolesPermissionController::class)->group(function(){
        Route::get('/role_permission','index')->name('role_permission');
        Route::get('/role_permission/create','create')->name('role_permission.create');
        Route::post('/role_permission/store','store')->name('role_permission.store');
        Route::get('/role_permission/edit/{id}','edit')->name('role_permission.edit');

        Route::post('/role_permission/update','update')->name('role_permission.update');
        Route::get('/role_permission/{id}','destroy')->name('role_permission.destroy');

    });

    // Menu Route
    Route::controller(MenuConteroller::class)->group(function(){
        Route::get('/menu','index')->name('menu');
        Route::get('/menu/create','create')->name('menu.create');
        Route::post('/menu/store','store')->name('menu.store');
        Route::get('/menu/edit/{id}','edit')->name('menu.edit');
        Route::post('/menu/update','update')->name('menu.update');
        Route::get('/menu/{id}','destroy')->name('menu.destroy');
        Route::get('/menu/inactive/{id}','inactive')->name('menu.inactive');
        Route::get('/menu/active/{id}','active')->name('menu.active');

        Route::get('/activemenu/create','activemenucreate')->name('activemenu.create');
        Route::post('/activemenu/store','activemenuStore')->name('activemenu.store');
        Route::get('/activemenu/inactive/{id}','ActiveMenuinactive')->name('activemenu.inactive');
        Route::get('/activemenu/active/{id}','ActiveMenuActive')->name('activemenu.active');
        Route::get('/activemenu/{id}','activemenudestroy')->name('activemenu.destroy');
        Route::get('/activemenu/edit/{id}','activemenuedit')->name('activemenu.edit');
        Route::post('/activemenu/update','activemenuupdate')->name('activemenu.update');
    });



    // Category Route
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category','index')->name('category');
        Route::get('/category/create','create')->name('category.create');
        Route::post('/category/store','store')->name('category.store');
        Route::get('/category/edit/{id}','edit')->name('category.edit');
        Route::post('/category/update','update')->name('category.update');
        Route::get('/category/{id}','destroy')->name('category.destroy');
        Route::get('/category/inactive/{id}','inactive')->name('category.inactive');
        Route::get('/category/active/{id}','active')->name('category.active');
        Route::get('/subcategory/ajax/{category_id}','GetSubCategory');
    });

    // Sub Category Route
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/subcategory','index')->name('subcategory');
        Route::get('/subcategory/create','create')->name('subcategory.create');
        Route::post('/subcategory/store','store')->name('subcategory.store');
        Route::get('/subcategory/edit/{id}','edit')->name('subcategory.edit');
        Route::post('/subcategory/update','update')->name('subcategory.update');
        Route::get('/subcategory/{id}','destroy')->name('subcategory.destroy');


    });

    // Blog post Route
    Route::controller(BlogpostController::class)->group(function(){
        Route::get('/blogpost','index')->name('blogpost');
        Route::get('blogpost/create','create')->name('blogpost.create');
        Route::post('blogpost/store/','store')->name('blogpost.store');
        Route::get('/blogpost/edit/{id}','edit')->name('blogpost.edit');
        Route::post('/blogpost/update','update')->name('blogpost.update');
        Route::get('/blogpost/{id}','destroy')->name('blogpost.destroy');
        Route::get('/blogpost/unpublish/{id}','unpublish')->name('blogpost.unpublish');
        Route::get('/blogpost/publish/{id}','publish')->name('blogpost.publish');
        Route::post('blogpost/upload', 'upload')->name('blogpost.upload');
    });





    // Slider
    Route::controller(SliderController::class)->group(function(){
        Route::get('/slider','index')->name('slider');
        Route::get('slider/create','create')->name('slider.create');
        Route::post('slider/store/','store')->name('slider.store');
        Route::get('/slider/edit/{id}','edit')->name('slider.edit');
        Route::post('/slider/update','update')->name('slider.update');
        Route::get('/slider/{id}','destroy')->name('slider.destroy');
        Route::get('/slider/unpublish/{id}','unpublish')->name('slider.unpublish');
        Route::get('/slider/publish/{id}','publish')->name('slider.publish');
    });


    // Feature
    Route::controller(FeatureController::class)->group(function(){
        Route::get('/feature','index')->name('feature');
        Route::get('feature/create','create')->name('feature.create');
        Route::post('feature/store/','store')->name('feature.store');
        Route::get('/feature/edit/{id}','edit')->name('feature.edit');
        Route::post('/feature/update','update')->name('feature.update');
        Route::post('/feature/updateimg','updateImg')->name('feature.updateimg');
        Route::post('/feature/updateimg2','updateImg2')->name('feature.updateimg2');
        Route::get('/feature/{id}','destroy')->name('feature.destroy');
        Route::get('/feature/unpublish/{id}','unpublish')->name('feature.unpublish');
        Route::get('/feature/publish/{id}','publish')->name('feature.publish');
    });

    //Home Mission
    Route::controller(MissionController::class)->group(function(){
        Route::get('/mission','index')->name('mission');
        Route::get('mission/create','create')->name('mission.create');
        Route::post('mission/store/','store')->name('mission.store');
        Route::get('/mission/edit/{id}','edit')->name('mission.edit');
        Route::post('/mission/updateimg','updateImg')->name('mission.updateimg');
        Route::post('/mission/update','update')->name('mission.update');
        Route::get('/mission/{id}','destroy')->name('mission.destroy');
        Route::get('/mission/unpublish/{id}','unpublish')->name('mission.unpublish');
        Route::get('/mission/publish/{id}','publish')->name('mission.publish');

    });


    //home about
    Route::controller(HomeAboutController::class)->group(function(){
        Route::get('/home-about','index')->name('home-about');
        Route::get('home-about/create','create')->name('home-about.create');
        Route::post('home-about/store/','store')->name('home-about.store');
        Route::get('/home-about/edit/{id}','edit')->name('home-about.edit');
        Route::post('/home-about/update','update')->name('home-about.update');
        Route::get('/home-about/{id}','destroy')->name('home-about.destroy');
        Route::get('/home-about/unpublish/{id}','unpublish')->name('home-about.unpublish');
        Route::get('/home-about/publish/{id}','publish')->name('home-about.publish');
    });

    // media_partner
    Route::controller(MediaPartnercontroller::class)->group(function(){
        Route::get('/media_partner','index')->name('media_partner');
        Route::get('/media_partner/create','create')->name('media_partner.create');
        Route::post('media_partner/store/','store')->name('media_partner.store');
        Route::get('/media_partner/edit/{id}','edit')->name('media_partner.edit');
        Route::post('/media_partner/update','update')->name('media_partner.update');
        Route::get('/media_partner/{id}','destroy')->name('media_partner.destroy');
        Route::get('/media_partner/unpublish/{id}','unpublish')->name('media_partner.unpublish');
        Route::get('/media_partner/publish/{id}','publish')->name('media_partner.publish');
    });


    //home about
    Route::controller(AbilitieController::class)->group(function(){
        Route::get('/abilities','index')->name('abilities');
        Route::get('abilities/create','create')->name('abilities.create');
        Route::post('abilities/store/','store')->name('abilities.store');
        Route::get('/abilities/edit/{id}','edit')->name('abilities.edit');
        Route::post('/abilities/update','update')->name('abilities.update');
        Route::get('/abilities/{id}','destroy')->name('abilities.destroy');
        Route::get('/abilities/unpublish/{id}','unpublish')->name('abilities.unpublish');
        Route::get('/abilities/publish/{id}','publish')->name('abilities.publish');
    });




    //SEO
    Route::controller(SeoSettings::class)->group(function(){
        Route::get('/seo/setting','index')->name('seo.setting');
        Route::post('/seo/update','update')->name('seo.update');
    });


    //Setting
    Route::controller(SettingSettings::class)->group(function(){
        Route::get('/setting','index')->name('setting');
        Route::get('/setting/bgimage','bgimage')->name('setting.bgimage');
        Route::post('/setting/update','update')->name('setting.update');


    });




    //Photo Gallery
    Route::controller(PhotoGalleryController::class)->group(function(){
        Route::get('/photo_gallery','index')->name('photo_gallery');
        Route::get('photo_gallery/create','create')->name('photo_gallery.create');
        Route::post('photo_gallery/store/','store')->name('photo_gallery.store');
        Route::get('/photo_gallery/edit/{id}','edit')->name('photo_gallery.edit');
        Route::post('/photo_gallery/update','update')->name('photo_gallery.update');
        Route::get('/photo_gallery/{id}','destroy')->name('photo_gallery.destroy');
        Route::get('/singelimage/edit/{id}','editsingelimage')->name('singelimage.edit');
        Route::post('/singelimage/update','singelimageupdate')->name('singelimage.update');
        Route::get('/singelimage/{id}','singelimagedestroy')->name('singelimage.destroy');
    });

    // Youtube Video
    Route::controller(YoutubeController::class)->group(function(){
        Route::get('/video','index')->name('video');
        Route::get('video/create','create')->name('video.create');
        Route::post('/video','store')->name('video.store');
        Route::get('/video/edit/{id}','edit')->name('video.edit');
        Route::post('/video/update','update')->name('video.update');

        Route::get('/video/{id}','destroy')->name('video.destroy');
        Route::get('/video/unpublish/{id}','unpublish')->name('video.unpublish');
        Route::get('/video/publish/{id}','publish')->name('video.publish');
    });





    Route::get('/cacheclear', 'SettingSettings@cacheClear')->name('settings.cacheclear');
    Route::get('/clearcache', 'SettingSettings@clearCache')->name('settings.cache.clear');
    Route::get('/routecache', 'SettingSettings@routeCache')->name('settings.clear.route');
    Route::get('/viewcache', 'SettingSettings@viewCache')->name('settings.clear.view');
    Route::get('/optimizeClear', 'SettingSettings@optimizeClear')->name('settings.clear.optimize');

    // storage link
    Route::get('/storage', function() {
        Artisan::call('storage:link');
        return back()->with('message','Storage link Create successfully');
    });

    //migrate
    Route::get('/migrate', function(){
        Artisan::call('migrate');
        return back()->with('message','migrate is successfully');
    });

    // //migrate
    // Route::get('/migrate/seed', function(){
    //     Artisan::call('db:seed', [
    //         '--class' => DiseaseSeeder::class
    //     ]);
    // });


    //PartyMember
    Route::controller(PartyMemberController::class)->group(function(){
        Route::get('/party_member', 'index')->name('party_member');
        Route::get('party_member/create','create')->name('party_member.create');
        Route::post('party_member/store/','store')->name('party_member.store');
        Route::get('/party_member/edit/{id}','edit')->name('party_member.edit');
        Route::post('/party_member/update','update')->name('party_member.update');
        Route::get('/party_member/{id}','destroy')->name('party_member.destroy');
        Route::get('/party_member/unpublish/{id}','unpublish')->name('party_member.unpublish');
        Route::get('/party_member/publish/{id}','publish')->name('party_member.publish');
    });


    //Countdown
    Route::controller(CountdownController::class)->group(function(){
        Route::get('/countdown', 'index')->name('countdown');
        Route::post('/countdown/update','update')->name('countdown.update');
    });

    //Social Media
    Route::controller(SocialMediaController::class)->group(function(){
        Route::get('/socialmedia', 'index')->name('socialmedia');
        Route::post('/socialmedia/update','update')->name('socialmedia.update');
    });


    // Message to All Subscriber
    Route::controller(SubscriberController::class)->group(function(){
        Route::get('/subscriber', 'index')->name('subscriber');
        Route::get('/subscriber/send-email','send_email')->name('subscriber.send-email');
        Route::get('/subscriber/read-at/{id}','read_at')->name('subscriber.read-at');
        Route::get('/subscriber/send-singel-email/{id}','send_singel_email')->name('subscriber.send-singel-email');
        Route::post('/subscriber/send-singel-email-submit',  'send_singel_email_submit')->name('subscriber.sendsingelemailsubmit');
        Route::post('/subscriber/send-email-submit', 'send_email_submit')->name('subscriber.sendemailsubmit');
    });

    // Get In Touch
    Route::controller(AskaboutusController::class)->group(function(){
        Route::get('/ask-about-us', 'index')->name('ask-about-us');
        Route::get('/ask-about-us/show/{id}', 'show')->name('ask-about-us.show');
        Route::get('/ask-about-us/read-at/{id}','read_at')->name('ask-about-us.read-at');
        Route::get('/ask-about-us/sendemail/{id}', 'sendemail')->name('ask-about-us.sendemail');
        Route::post('/ask-about-us/send-email-submit', 'send_email_submit')->name('ask-about-us.send-email-submit');
        Route::get('/ask-about-us/{id}','destroy')->name('ask-about-us.destroy');

    });

    // Joining
    Route::controller(JoiningController::class)->group(function(){
        Route::get('/joining', 'index')->name('joining');
        Route::get('/joining/show/{id}', 'show')->name('joining.show');
        Route::get('/joining/sendemail/{id}', 'sendemail')->name('joining.sendemail');
        Route::post('/joining/send-email-submit', 'send_email_submit')->name('joining.send-email-submit');
        Route::get('/joining/{id}','destroy')->name('joining.destroy');
        Route::get('/joining/read-at/{id}','read_at')->name('joining.read-at');

    });


    // Comments
    Route::controller(CommentController::class)->group(function(){
        Route::get('/comments', 'index')->name('comments');
        Route::get('/comments/show/{id}', 'show')->name('comments.show');
        Route::get('/comments/sendemail/{id}', 'sendemail')->name('comments.sendemail');
        Route::post('/comments/send-email-submit', 'send_email_submit')->name('comments.send-email-submit');
        Route::get('/comments/{id}','destroy')->name('comments.destroy');
        Route::get('/comments/read-at/{id}','read_at')->name('comments.read-at');
    });

    // Contact
    Route::controller(ContactController::class)->group(function(){
        Route::get('/contact', 'index')->name('contact');
        Route::get('/contact/show/{id}', 'show')->name('contact.show');
        Route::get('/contact/sendemail/{id}', 'sendemail')->name('contact.sendemail');
        Route::post('/contact/send-email-submit', 'send_email_submit')->name('contact.send-email-submit');
        Route::get('/contact/{id}','destroy')->name('contact.destroy');
        Route::get('/contact/read-at/{id}','read_at')->name('contact.read-at');
    });

    // Visitor
    Route::controller(visitorController::class)->group(function(){
        Route::get('/visitor', 'index')->name('visitor');
        Route::get('/visitor/{id}','destroy')->name('visitor.destroy');
        Route::get('/visitor/details/{id}', 'details')->name('visitor.details');
    });


    // About Page Controller
    Route::controller(AboutPageController::class)->group(function(){
        Route::get('/aboutus', 'index')->name('aboutus');
        Route::post('/aboutus/update','update')->name('aboutus.update');
        Route::post('aboutus/upload', 'upload')->name('aboutus.upload');

    });


    Route::get('filemanager', [FileManagerController::class, 'index'])->name('filemanager');


    //book_category
    Route::controller(BookCategoryController::class)->group(function(){
        Route::get('/book_category', 'index')->name('book_category');
        Route::get('book_category/create','create')->name('book_category.create');
        Route::post('book_category/store/','store')->name('book_category.store');
        Route::get('/book_category/edit/{id}','edit')->name('book_category.edit');
        Route::post('/book_category/update','update')->name('book_category.update');
        Route::get('/book_category/{id}','destroy')->name('book_category.destroy');

    });

    //book_mangment
    Route::controller(BookMangmentController::class)->group(function(){
        Route::get('/book_mangment', 'index')->name('book_mangment');
        Route::get('book_mangment/create','create')->name('book_mangment.create');
        Route::post('book_mangment/store/','store')->name('book_mangment.store');
        Route::get('/book_mangment/edit/{id}','edit')->name('book_mangment.edit');
        Route::post('/book_mangment/update','update')->name('book_mangment.update');
        Route::get('/book_mangment/{id}','destroy')->name('book_mangment.destroy');
        Route::get('/book_mangment/unpublish/{id}','unpublish')->name('book_mangment.unpublish');
        Route::get('/book_mangment/publish/{id}','publish')->name('book_mangment.publish');
    });


    //ideology
    Route::controller(IdeologyController::class)->group(function(){
        Route::get('/ideology', 'index')->name('ideology');
        Route::get('ideology/create','create')->name('ideology.create');
        Route::post('ideology/store/','store')->name('ideology.store');
        Route::get('/ideology/edit/{id}','edit')->name('ideology.edit');
        Route::post('/ideology/update','update')->name('ideology.update');
        Route::get('/ideology/{id}','destroy')->name('ideology.destroy');
        Route::get('/ideology/unpublish/{id}','unpublish')->name('ideology.unpublish');
        Route::get('/ideology/publish/{id}','publish')->name('ideology.publish');
    });




});//End Admin middleware

