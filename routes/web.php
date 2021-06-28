<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('fontend-page.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//category
Route::get('admin/Category', 'App\Http\Controllers\Admin\CategoryController@category')->name('Category');
Route::post('Category/store', 'App\Http\Controllers\Admin\CategoryController@Storecategory')->name('store.category');
Route::get('/edit/category/{id}', 'App\Http\Controllers\Admin\CategoryController@Editcategory');
Route::post('update/category/{id}', 'App\Http\Controllers\Admin\CategoryController@Updatecategory');
Route::get('delete/category/{id}', 'App\Http\Controllers\Admin\CategoryController@Deletecategory');



//subcategory
Route::get('admin/SubCategory', 'App\Http\Controllers\Admin\CategoryController@Subcategory')->name('SubCategory');
Route::post('SubCategory/store', 'App\Http\Controllers\Admin\CategoryController@StoreSubcategory')->name('store.subcategory');

Route::get('edit/subcategory/{id}', 'App\Http\Controllers\Admin\CategoryController@EditSubcategory');
Route::post('update/subcategory/{id}', 'App\Http\Controllers\Admin\CategoryController@UpdateSubcategory');

Route::get('delete/subcategory/{id}', 'App\Http\Controllers\Admin\CategoryController@DeleteSubcategory');

//setting
Route::get('admin/Setting', 'App\Http\Controllers\Admin\Setting\SettingController@Setting')->name('setting');
Route::post('Setting/store', 'App\Http\Controllers\Admin\Setting\SettingController@StoreSetting')->name('store.Setting');
Route::get('Setting/store', 'App\Http\Controllers\Admin\Setting\SettingController@ShowSetting')->name('show.setting');




//inactive active
Route::get('inactive/product/{id}', 'App\Http\Controllers\Admin\Setting\SettingController@InactiveSetting');
Route::get('active/product/{id}', 'App\Http\Controllers\Admin\Setting\SettingController@ActiveSetting');

Route::get('edit/setting/{id}', 'App\Http\Controllers\Admin\Setting\SettingController@EditSettingy');
Route::post('update/setting/{id}', 'App\Http\Controllers\Admin\Setting\SettingController@UpdateSetting');
Route::get('delete/setting/{id}', 'App\Http\Controllers\Admin\Setting\SettingController@DeleteSetting');



//contact us
Route::post('contact-us/', 'App\Http\Controllers\Admin\Contact\ContactController@contactSubmit')->name('contact.submit');
Route::post('contactus/', 'App\Http\Controllers\Admin\Contact\ContactController@contactusSubmit')->name('contactus.submit');




//slidder slidder
Route::get('admin/slidder', 'App\Http\Controllers\Admin\Slidder\SlidderController@slidder')->name('slidder');
Route::post('slidder/store', 'App\Http\Controllers\Admin\Slidder\SlidderController@StoreSlidder')->name('store.slidder');
Route::get('slidder/allshow', 'App\Http\Controllers\Admin\Slidder\SlidderController@ShowSlidder')->name('show.slidder');
Route::get('edit/slidder/{id}', 'App\Http\Controllers\Admin\Slidder\SlidderController@EditSlidder');
Route::post('update/slidder/{id}', 'App\Http\Controllers\Admin\Slidder\SlidderController@UpdateSlidder');
Route::get('delete/slidder/{id}', 'App\Http\Controllers\Admin\Slidder\SlidderController@DeleteSlidder');




// Middle category fortune 
Route::get('middle/category/', 'App\Http\Controllers\Admin\Fortune\FortuneController@middleCategory')->name('middleCategory');
Route::post('middle/category/', 'App\Http\Controllers\Admin\Fortune\FortuneController@Storefortune')->name('store.fortune');
Route::get('edit/fortune/{id}', 'App\Http\Controllers\Admin\Fortune\FortuneController@EditFortune');
Route::post('update/fortune/{id}', 'App\Http\Controllers\Admin\Fortune\FortuneController@UpdateFortune');
Route::get('delete/fortune/{id}', 'App\Http\Controllers\Admin\Fortune\FortuneController@DeleteFortune');




//image content show.image
Route::get('gallery/image', 'App\Http\Controllers\Admin\ImageGallery\ImageGalleryController@Gallery')->name('image');
Route::post('gallery/image/store', 'App\Http\Controllers\Admin\ImageGallery\ImageGalleryController@StoreImage')->name('store.galleryimage');
Route::get('gallery/image/store', 'App\Http\Controllers\Admin\ImageGallery\ImageGalleryController@ShowImage')->name('show.image');
Route::get('edit/gallery/{id}', 'App\Http\Controllers\Admin\ImageGallery\ImageGalleryController@EditGallerys');
Route::get('delete/gallery/{id}', 'App\Http\Controllers\Admin\ImageGallery\ImageGalleryController@DeleteGallery');
Route::post('update/gallery/{id}', 'App\Http\Controllers\Admin\ImageGallery\ImageGalleryController@UpdateGallery');




// team & Faq 
Route::get('Team/Faq', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@create')->name('Team_Faq');
Route::get('Faq', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@createfaq')->name('Faq');
Route::post('store/team', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@storeteam')->name('store.team');
Route::get('all/Team', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@showallTeam')->name('all.Team');
Route::get('edit/team/{id}', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@EditTeam');
Route::post('update/team/{id}', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@UpdateTeam');
Route::get('delete/team/{id}', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@DeleteTeam');



Route::post('store/faq', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@storefaq')->name('store.faq');
Route::get('all/faq', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@showallFaq')->name('all.Faq');
Route::get('edit/faq/{id}', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@EditFaq');
Route::post('update/faq/{id}', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@UpdateFaq');
Route::get('delete/faq/{id}', 'App\Http\Controllers\Admin\Team_Faq\Team_FaqController@DeleteFaq');



//News
Route::get('News/', 'App\Http\Controllers\Admin\News\NewsController@create')->name('news');
Route::post('News/store', 'App\Http\Controllers\Admin\News\NewsController@store')->name('store.news');
Route::get('All/News/', 'App\Http\Controllers\Admin\News\NewsController@showallNews')->name('all.news');
Route::get('edit/news/{id}', 'App\Http\Controllers\Admin\News\NewsController@EditNews');
Route::post('update/news/{id}', 'App\Http\Controllers\Admin\News\NewsController@UpdateNews');
Route::get('delete/news/{id}', 'App\Http\Controllers\Admin\News\NewsController@DeleteNews');




//services
Route::get('Services/', 'App\Http\Controllers\Admin\Services\ServicesController@create')->name('services');
Route::post('Services/store', 'App\Http\Controllers\Admin\Services\ServicesController@StoreServices')->name('store.services');
Route::get('all/Services/', 'App\Http\Controllers\Admin\Services\ServicesController@showallServices')->name('all.services');
Route::get('edit/service/{id}', 'App\Http\Controllers\Admin\Services\ServicesController@EditServices');
Route::post('update/services/{id}', 'App\Http\Controllers\Admin\Services\ServicesController@UpdateServices');
Route::get('delete/service/{id}', 'App\Http\Controllers\Admin\Services\ServicesController@DeleteServices');




// about Section 
Route::get('abouts/', 'App\Http\Controllers\Admin\About\AboutController@create')->name('abouts');
Route::post('about/store', 'App\Http\Controllers\Admin\About\AboutController@AboutStore')->name('store.about');
Route::get('all/about', 'App\Http\Controllers\Admin\About\AboutController@Allshow')->name('all.about');
Route::get('edit/about/{id}', 'App\Http\Controllers\Admin\About\AboutController@editabout');
Route::post('update/about/{id}', 'App\Http\Controllers\Admin\About\AboutController@updateabout');
Route::get('delete/about/{id}', 'App\Http\Controllers\Admin\About\AboutController@deleteabout');




// frontend about page 
//Route::get('/about', 'App\Http\Controllers\Admin\About\AboutController@aboutpage');
// frontendcontactus page 
//Route::get('/contact', 'App\Http\Controllers\Admin\About\AboutController@contactpage');
Route::get('/about', 'App\Http\Controllers\Frontend\FrontendController@aboutpage');
Route::get('/career', 'App\Http\Controllers\Frontend\FrontendController@careerpage');
Route::get('contact/', 'App\Http\Controllers\Frontend\FrontendController@contactpage');
Route::get('service/{id}', 'App\Http\Controllers\Frontend\FrontendController@service');



Route::get('{companyname?}/{id}', 'App\Http\Controllers\Frontend\FrontendController@servicehpmepage');



Route::get('{name?}/{id}', 'App\Http\Controllers\Frontend\FrontendController@services');
Route::get('search/', 'App\Http\Controllers\Frontend\FrontendController@action');
Route::get('autocomplate/', 'App\Http\Controllers\Frontend\FrontendController@autocomplate')->name('autocomplate');
Route::get('team/', 'App\Http\Controllers\Frontend\FrontendController@team');
Route::get('bankers/', 'App\Http\Controllers\Frontend\FrontendController@bankers');
Route::get('companyview/', 'App\Http\Controllers\Frontend\FrontendController@companyview');
Route::get('fortunes/chairman/profile/', 'App\Http\Controllers\Frontend\FrontendController@chairman_profile')->name('chairman_profile');
Route::get('chairmans/profile/', 'App\Http\Controllers\Frontend\FrontendController@chairmans_profile')->name('chairmans_profile');
Route::get('managing/director/profile', 'App\Http\Controllers\Frontend\FrontendController@managing_director_profile')->name('managing_director_profile');
Route::get('fortunes/chairmans/message', 'App\Http\Controllers\Frontend\FrontendController@chairman_message')->name('chairman_message');
Route::get('achievements/', 'App\Http\Controllers\Frontend\FrontendController@achievements')->name('achievements');
Route::get('tvcs/', 'App\Http\Controllers\Frontend\FrontendController@tvcs')->name('tvcs');
Route::get('prassads/', 'App\Http\Controllers\Frontend\FrontendController@pressads')->name('prassads');
Route::get('newsevents/', 'App\Http\Controllers\Frontend\FrontendController@newsevents')->name('newsevents');
Route::get('latestsnews/', 'App\Http\Controllers\Frontend\FrontendController@latestnews')->name('latestsnewss');
Route::get('blogs/', 'App\Http\Controllers\Frontend\FrontendController@blogs')->name('blogs');
Route::get('faqs/', 'App\Http\Controllers\Frontend\FrontendController@faqs')->name('faqs');
Route::get('csrs/', 'App\Http\Controllers\Frontend\FrontendController@csrs')->name('csrs');
Route::get('news/details/{id}', 'App\Http\Controllers\Frontend\FrontendController@newsdetails');
Route::get('blog/details/{id}', 'App\Http\Controllers\Frontend\FrontendController@blogdetails');
Route::get('latest/news/details/{id}', 'App\Http\Controllers\Frontend\FrontendController@latestnewsdetails');

Route::get('achievements/details/show/all', 'App\Http\Controllers\Frontend\FrontendController@achievementdetails')->name('achievementdetail');











// job 
Route::post('apply/job/', 'App\Http\Controllers\Frontend\FrontendController@applyjob')->name('store.applyinfo');




// image Category  Route here 
Route::get('images/', 'App\Http\Controllers\Admin\CategoryImage\FortuneCtegoryImageCntroller@index')->name('category.image');
Route::post('categary/image/store', 'App\Http\Controllers\Admin\CategoryImage\FortuneCtegoryImageCntroller@storeimage')->name('store.fortuneimages');
Route::get('delete/fortuneimage/{id}', 'App\Http\Controllers\Admin\CategoryImage\FortuneCtegoryImageCntroller@Destroyimage');
Route::get('edit/fortuneimage/{id}', 'App\Http\Controllers\Admin\CategoryImage\FortuneCtegoryImageCntroller@Editimage');
Route::post('update/fortuneimage/{id}', 'App\Http\Controllers\Admin\CategoryImage\FortuneCtegoryImageCntroller@updateimage');



//banker & patners
Route::get('banker/', 'App\Http\Controllers\BankerAndPartnerController@banker')->name('banker');
Route::post('store/banker/', 'App\Http\Controllers\BankerAndPartnerController@storebanker')->name('store.bankerimages');
Route::get('delete/bankerimage/{id}', 'App\Http\Controllers\BankerAndPartnerController@deletebanker');
Route::get('edit/bankerimage/{id}', 'App\Http\Controllers\BankerAndPartnerController@editbanker');
Route::post('update/bankerimage/{id}', 'App\Http\Controllers\BankerAndPartnerController@updatebanker');




// patner route here 
Route::get('partner/', 'App\Http\Controllers\BankerAndPartnerController@partner')->name('partner');
Route::post('store/partner/', 'App\Http\Controllers\BankerAndPartnerController@storepartner')->name('store.partnerimages');
Route::get('delete/partnerimage/{id}', 'App\Http\Controllers\BankerAndPartnerController@deletepartner');
Route::get('edit/partnerimage/{id}', 'App\Http\Controllers\BankerAndPartnerController@editpartner');
Route::post('update/partner/{id}', 'App\Http\Controllers\BankerAndPartnerController@updatepartner');




//settlement banks here

Route::get('settlement/', 'App\Http\Controllers\BankerAndPartnerController@settlement')->name('settlement');
Route::post('store/settlement/', 'App\Http\Controllers\BankerAndPartnerController@storesettlement')->name('store.settlement');
Route::get('delete/settlement/{id}', 'App\Http\Controllers\BankerAndPartnerController@deletesettlement');
Route::get('edit/settlement/{id}', 'App\Http\Controllers\BankerAndPartnerController@editsettlement');
Route::post('update/settlement/{id}', 'App\Http\Controllers\BankerAndPartnerController@updatesettlement');




// insurers route here 
Route::get('insurers/', 'App\Http\Controllers\BankerAndPartnerController@insurers')->name('insurers');
Route::post('store/insurers/', 'App\Http\Controllers\BankerAndPartnerController@storeinsurers')->name('store.insurers');
Route::get('delete/insurers/{id}', 'App\Http\Controllers\BankerAndPartnerController@deleteinsurers');
Route::get('edit/insurers/{id}', 'App\Http\Controllers\BankerAndPartnerController@editinsurers');
Route::post('update/insurers/{id}', 'App\Http\Controllers\BankerAndPartnerController@updateinsurers');




// auditots route here 
Route::get('auditors/', 'App\Http\Controllers\BankerAndPartnerController@auditors')->name('auditors');
Route::post('store/auditors/', 'App\Http\Controllers\BankerAndPartnerController@storeauditors')->name('store.auditors');
Route::get('delete/auditors/{id}', 'App\Http\Controllers\BankerAndPartnerController@deleteauditors');
Route::get('edit/auditors/{id}', 'App\Http\Controllers\BankerAndPartnerController@editauditors');
Route::post('update/auditors/{id}', 'App\Http\Controllers\BankerAndPartnerController@updateauditors');




//advisors route here
Route::get('advisors/', 'App\Http\Controllers\BankerAndPartnerController@advisors')->name('advisors');
Route::post('store/advisors/', 'App\Http\Controllers\BankerAndPartnerController@storeadvisors')->name('store.advisors');
Route::get('delete/advisors/{id}', 'App\Http\Controllers\BankerAndPartnerController@deleteadvisors');
Route::get('edit/advisors/{id}', 'App\Http\Controllers\BankerAndPartnerController@editadvisors');
Route::post('update/advisors/{id}', 'App\Http\Controllers\BankerAndPartnerController@updateadvisors');





//investment route here
Route::get('investment/', 'App\Http\Controllers\BankerAndPartnerController@investment')->name('investment');
Route::post('store/investment/', 'App\Http\Controllers\BankerAndPartnerController@storeinvestment')->name('store.investment');
Route::get('delete/investment/{id}', 'App\Http\Controllers\BankerAndPartnerController@deleteinvestment');
Route::get('edit/investment/{id}', 'App\Http\Controllers\BankerAndPartnerController@editinvestment');
Route::post('update/investment/{id}', 'App\Http\Controllers\BankerAndPartnerController@updateinvestment');
//award_achievement

Route::get('awardachievement/', 'App\Http\Controllers\AwardAchievementController@achievement')->name('achievement');
Route::post('store/achievement/', 'App\Http\Controllers\AwardAchievementController@storeachievement')->name('store.achievement');
Route::get('delete/achievement/{id}', 'App\Http\Controllers\AwardAchievementController@deleteachievement');
Route::get('edit/achievement/{id}', 'App\Http\Controllers\AwardAchievementController@editachievement');
Route::post('update/achievement/{id}', 'App\Http\Controllers\AwardAchievementController@updateachievement');




//tvc_av
Route::get('tvc/', 'App\Http\Controllers\AwardAchievementController@tvc_av')->name('tvc_av');
Route::post('store/tvc/', 'App\Http\Controllers\AwardAchievementController@storetvc_av')->name('store.tvc_av');
Route::get('delete/tvc/{id}', 'App\Http\Controllers\AwardAchievementController@deletetvc');
Route::get('edit/tvc/{id}', 'App\Http\Controllers\AwardAchievementController@edittvc');
Route::post('update/tvc/{id}', 'App\Http\Controllers\AwardAchievementController@updatetvc');




//prassad route here 
Route::get('prassad/', 'App\Http\Controllers\AwardAchievementController@prassad')->name('prassad');
Route::post('store/prass/', 'App\Http\Controllers\AwardAchievementController@storeprassad')->name('store.prassad');
Route::get('delete/prassad/{id}', 'App\Http\Controllers\AwardAchievementController@deleteprassad');
Route::get('edit/prassad/{id}', 'App\Http\Controllers\AwardAchievementController@editprassad');
Route::post('update/prassad/{id}', 'App\Http\Controllers\AwardAchievementController@updateprassad');





// news event rote here 
Route::get('events/', 'App\Http\Controllers\NewsEventController@news_event')->name('news_event');
Route::post('store/events/', 'App\Http\Controllers\NewsEventController@Storenews_event')->name('store.news_event');
Route::get('edit/event/{id}', 'App\Http\Controllers\NewsEventController@Editnews_event');
Route::post('update/event/{id}', 'App\Http\Controllers\NewsEventController@Updatenews_event');
Route::get('delete/event/{id}', 'App\Http\Controllers\NewsEventController@Deletenews_event');




// latest news here 
Route::get('latestnews/', 'App\Http\Controllers\LatestNewsController@latest_news')->name('latest_news');
Route::post('store/latestnews/', 'App\Http\Controllers\LatestNewsController@Storelatest_news')->name('store.latestnews');
Route::get('edit/latestnews/{id}', 'App\Http\Controllers\LatestNewsController@Editlatest_news');
Route::post('update/latestnews/{id}', 'App\Http\Controllers\LatestNewsController@Updatelatest_news');
Route::get('delete/latestnews/{id}', 'App\Http\Controllers\LatestNewsController@Deletelatest_news');

// CSR controller 
Route::get('crs/', 'App\Http\Controllers\BankerAndPartnerController@crs')->name('crs');
Route::post('store/crs/', 'App\Http\Controllers\BankerAndPartnerController@storecrs')->name('store.crs');
Route::get('edit/crs/{id}', 'App\Http\Controllers\BankerAndPartnerController@editcrs');
Route::post('update/crs/{id}', 'App\Http\Controllers\BankerAndPartnerController@updatecrs');
Route::get('delete/crs/{id}', 'App\Http\Controllers\BankerAndPartnerController@deletecrs');

// business_product Route here
Route::get('product/', 'App\Http\Controllers\ProductBusinessController@business')->name('business_product');
Route::post('store/business/', 'App\Http\Controllers\ProductBusinessController@Storebusiness')->name('store.business');
Route::get('edit/business/{id}', 'App\Http\Controllers\ProductBusinessController@Editbusiness');
Route::post('update/business/{id}', 'App\Http\Controllers\ProductBusinessController@Updatebusiness');

Route::get('delete/business/{id}', 'App\Http\Controllers\ProductBusinessController@Deletebusiness');


// blog rote here 
Route::get('blog/', 'App\Http\Controllers\BlogController@blog')->name('blog');
Route::post('store/blog/', 'App\Http\Controllers\BlogController@Storeblog')->name('store.blog');
Route::get('edit/blog/{id}', 'App\Http\Controllers\BlogController@Editblog');
Route::post('update/blog/{id}', 'App\Http\Controllers\BlogController@Updateblog');
Route::get('delete/blog/{id}', 'App\Http\Controllers\BlogController@Deleteblog');



// profile compamy manager etc
Route::get('profile/', 'App\Http\Controllers\profileController@profile')->name('addprofile');
Route::post('store/profile/', 'App\Http\Controllers\profileController@storeprofile')->name('store.storeprofile');
Route::get('delete/profileimage/{id}', 'App\Http\Controllers\profileController@deleteprofile');
Route::get('edit/profileimage/{id}', 'App\Http\Controllers\profileController@editprofile');
Route::post('update/profile/{id}', 'App\Http\Controllers\profileController@updateprofile');








// company over view

Route::get('company/overviews/add', 'App\Http\Controllers\companyViewController@companyoverview')->name('companyoverview');
Route::post('store/company/overview/', 'App\Http\Controllers\companyViewController@storecompanyoverview')->name('store.companyoverview');
Route::get('delete/company/overview/{id}', 'App\Http\Controllers\companyViewController@deletecompanyoverview');
Route::get('edit/company/overview/{id}', 'App\Http\Controllers\companyViewController@editcompanyoverview');
Route::post('update/company/overview{id}', 'App\Http\Controllers\companyViewController@updatecompanyoverview');

// project category
Route::get('/projects/cat/add', 'App\Http\Controllers\ProjectCategoryController@createCategory')->name('pro_cat');
Route::post('store/pro/category/', 'App\Http\Controllers\ProjectCategoryController@storeprocategory')->name('store.procategory');

Route::get('edit/pro/category/{id}', 'App\Http\Controllers\ProjectCategoryController@editprocategory');
Route::post('update/pro/categorys/{id}', 'App\Http\Controllers\ProjectCategoryController@updateprocategory');
Route::get('delete/pro/category/{id}', 'App\Http\Controllers\ProjectCategoryController@deleteprocategory');

// project sub category

Route::get('/projects/category/add', 'App\Http\Controllers\ProjectCategoryController@create')->name('projects');

Route::post('store/project/category/', 'App\Http\Controllers\ProjectCategoryController@storeprojectcategory')->name('store.projectcategory');
Route::get('edit/project/category/{id}', 'App\Http\Controllers\ProjectCategoryController@editprojectcategory');
Route::post('update/project/categorys/{id}', 'App\Http\Controllers\ProjectCategoryController@updateprojectcategory');
Route::get('delete/project/category/{id}', 'App\Http\Controllers\ProjectCategoryController@deleteprojectcategory');






//chairmanmessage
Route::get('company/messages/add', 'App\Http\Controllers\ChairmanMessageController@chairmanmessage')->name('chairmanmessage ');
Route::post('store/company/message/', 'App\Http\Controllers\ChairmanMessageController@storechairmanmessage')->name('store.chairmanmessage');
Route::get('all/chairman/message/', 'App\Http\Controllers\ChairmanMessageController@showchairmanmessage')->name('chairmanmessageshow');
Route::get('edit/chairman/message/{id}', 'App\Http\Controllers\ChairmanMessageController@editchairmanmessage');
Route::get('delete/chairman/message/{id}', 'App\Http\Controllers\ChairmanMessageController@deletechairmanmessage');
Route::post('update/chairmaninfo/{id}', 'App\Http\Controllers\ChairmanMessageController@updatechairmanmessage');
// spasific slider 
Route::get('add/company/slidder', 'App\Http\Controllers\Admin\Slidder\SlidderController@companyslidder')->name('companyslidder');
Route::post('company/slidder/store', 'App\Http\Controllers\Admin\Slidder\SlidderController@StorecompanySlidder')->name('store.companyslidder');
Route::get('company/slidder/allshow', 'App\Http\Controllers\Admin\Slidder\SlidderController@ShowcompanySlidder')->name('show.companyslidder');
Route::get('edit/company/slidder/{id}', 'App\Http\Controllers\Admin\Slidder\SlidderController@EditcompanySlidder');
Route::post('update/company/slidder/{id}', 'App\Http\Controllers\Admin\Slidder\SlidderController@UpdatecompanySlidder');
Route::get('delete/company/slidder/{id}', 'App\Http\Controllers\Admin\Slidder\SlidderController@DeletecompanySlidder');


// show job info
Route::get('show/job/info/', 'App\Http\Controllers\profileController@showjobinfo')->name('showjobinfo');
Route::get('{id}', 'App\Http\Controllers\profileController@showjob');
Route::get('delete/job/{id}', 'App\Http\Controllers\profileController@deletejob');