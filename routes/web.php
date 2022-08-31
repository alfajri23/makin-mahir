<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Notifications;
use App\Models\Admin;
use App\Notifications\WelcomeEmailNotification;


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

Auth::routes();

Route::post('/register/custom', [Controllers\Auth\Custom\RegisterCustomController::class, 'register'])->name('registerCustom');

Route::prefix('oauth')->group(function(){
    Route::get('google/redirect', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'redirectToGoogle'])->name('redirectToGoogle');
    Route::get('google/callback', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'callbackToGoogle'])->name('callbackToGoogle');

    Route::get('facebook/redirect', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'redirectToFacebook'])->name('redirectToFacebook');
    Route::get('facebook/callback', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'callbackToFacebook'])->name('callbackToFacebook');

    Route::get('twitter/redirect', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'redirectToTwitter'])->name('redirectToTwitter');
    Route::get('twitter/callback', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'callbackToTwitter'])->name('callbackToTwitter');
});

Route::get('callback', [Controllers\Transaksi\User\TransaksiUserController::class,'callbackSuccess'])->name('callbackSuccessXendit');
Route::get('callback-expired', [Controllers\Transaksi\User\TransaksiUserController::class,'callbackExpired'])->name('callbackExpiredXendit');

//PRODUK AREA
Route::get('/', [Controllers\PublicController::class,'index'])->name('publicIndex');
Route::get('event', [Controllers\Event\User\EventUserController::class,'list'])->name('produkListEvent');
Route::get('konsul', [Controllers\Konsultasi\User\KonsultasiUserController::class,'list'])->name('produkListKonsul');
//Route::get('kelas', [Controllers\PublicController::class,'produk_list_kelas'])->name('produkListKelas');
Route::get('template', [Controllers\Template\User\TemplateUserController::class,'list'])->name('produkListTemplate');



//Blog
Route::get('blog', [Controllers\Blog\User\BlogUserController::class,'index'])->name('blog');
Route::get('blog/page/{$no}', [Controllers\Blog\User\BlogUserController::class,'pagination'])->name('blogPagination');
Route::get('blog/{slug}/{slug_1?}', [Controllers\Blog\User\BlogUserController::class,'cek_url'])->name('blogCek');
Route::get('blog-kategori', [Controllers\Blog\User\BlogUserController::class,'by_categori'])->name('blogKategori');
Route::post('blog/create/new', [Controllers\Blog\User\BlogUserController::class,'create'])->name('blogCreate');
Route::get('blog/detail/{id}/{link?}', [Controllers\Blog\User\BlogUserController::class,'detail'])->name('blogDetail');


Route::get('faq', [Controllers\PublicController::class,'faq'])->name('faq');
Route::get('profile', [Controllers\PublicController::class,'profile'])->name('profile');
Route::get('term-and-condition', [Controllers\PublicController::class,'term_condition'])->name('term');
Route::get('privacy-policy', [Controllers\PublicController::class,'privacy'])->name('privacy');

//*Goes to
    Route::get('goes-to-sekolah', [Controllers\PublicController::class,'goes_sekolah'])->name('goes_sekolah');
    Route::get('goes-to-campus', [Controllers\PublicController::class,'goes_campus'])->name('goes_campus');
//End goes to

//*FORUM
    Route::get('forum', [Controllers\Forum\User\ForumUserController::class,'index'])->name('forumIndex');
    Route::get('forum-show', [Controllers\Forum\User\ForumUserController::class,'show'])->name('forumDetailAjax');
    Route::get('forum/{id}', [Controllers\Forum\User\ForumUserController::class,'detail'])->name('forumDetail');
    Route::post('forum/delete', [Controllers\Forum\User\ForumUserController::class,'delete'])->name('forumDelete');
    Route::post('forum/add', [Controllers\Forum\User\ForumUserController::class,'create'])->name('forumStore');
    Route::post('forum/jawaban', [Controllers\Forum\User\ForumUserController::class,'komentar'])->name('forumStoreKomentar');
    Route::get('jawaban/delete', [Controllers\Forum\User\ForumUserController::class,'deleteKomentar'])->name('forumDeleteKomentar');

    Route::post('forum/add-kategori', [Controllers\Forum\User\ForumUserController::class,'createKategori'])->name('forumStoreKategori');
//End forum

//*Assessment
    Route::get('test', [Controllers\TestController::class,'index'])->name('testIndex');

    //MBTI
    Route::get('test/mbti', [Controllers\TestController::class,'mbti_test'])->name('mbtiTest');
    Route::get('test/mbti-save', [Controllers\TestController::class,'save_mbti'])->name('saveMbtiTest');
    Route::get('download/mbti', [Controllers\TestController::class,'mbti_print'])->name('mbtiPrint');

    //RIASEC
    Route::get('test-minat', [Controllers\TestController::class,'riasec_test'])->name('riasecTest');
    Route::get('test-minat/save', [Controllers\TestController::class,'save_riasec'])->name('saveRiasecTest');
    Route::get('test-minat/download', [Controllers\TestController::class,'riasec_print'])->name('riasecPrint');
//end assesment

//* Untuk detail belum beli
    Route::get('produk/{link}', [Controllers\Member\HomeController::class,'produk_detail'])->name('memberProdukDetail');
    Route::get('produk/enroll/{link}', [Controllers\Member\HomeController::class,'produk_detail_enroll'])->name('enrollProdukDetail');
    //Route::get('course/{id}/materi/{ids}', [Controllers\Member\HomeController::class,'detail_kelas_materi'])->name('enrollMateriKelas');

    // Route::get('formulir', [Controllers\DaftarController::class,'form_member'])->name('memberForm');
    // Route::post('pendaftaran', [Controllers\Auth\RegisterDaftarController::class,'register'])->name('registerDaftar');
//end 

//*CV
    Route::get('cv',[Controllers\CVMaker\CVMakerController::class,'index'])->name('cvIndex');
    Route::get('cv-print',[Controllers\CVMaker\CVMakerController::class,'print'])->name('cvPrint');
    Route::get('cv-prints',[Controllers\CVMaker\CVMakerController::class,'printPublicCV'])->name('printPublicCV');

    //Set Session
    Route::get('cv-session',[Controllers\CVMaker\CVMakerController::class,'setCV'])->name('cvSet');

    //bio
    Route::get('bio-get',[Controllers\CVMaker\CVMakerController::class,'getBio'])->name('getBio');

    //work
    Route::get('work-get',[Controllers\CVMaker\CVMakerController::class,'getWork'])->name('getWork');
    Route::post('work-update',[Controllers\CVMaker\CVMakerController::class,'editWork'])->name('editWork');

    //edu
    Route::get('edu-get',[Controllers\CVMaker\CVMakerController::class,'getEdu'])->name('getEdu');
    Route::post('edu-update',[Controllers\CVMaker\CVMakerController::class,'editEdu'])->name('editEdu');

    //train
    Route::get('train-get',[Controllers\CVMaker\CVMakerController::class,'getTrain'])->name('getTrain');
    Route::post('train-update',[Controllers\CVMaker\CVMakerController::class,'editTrain'])->name('editTrain');

    //skil
    Route::post('skil-update',[Controllers\CVMaker\CVMakerController::class,'editSkil'])->name('editSkil');

    //Prestasi
    Route::get('acv-get',[Controllers\CVMaker\CVMakerController::class,'getAcv'])->name('getAcv');
    Route::post('acv-update',[Controllers\CVMaker\CVMakerController::class,'editAcv'])->name('editAcv');

    //Organisasi
    Route::get('org-get',[Controllers\CVMaker\CVMakerController::class,'getOrg'])->name('getOrg');
    Route::post('org-update',[Controllers\CVMaker\CVMakerController::class,'editOrg'])->name('editOrg');

    //Kontak
    Route::post('kontak-update',[Controllers\CVMaker\CVMakerController::class,'editKontak'])->name('editKontak');

    Route::post('bio-update',[Controllers\CVMaker\CVMakerController::class,'editBio'])->name('editBio');
    //Route::get('cv', [Controllers\CVMaker\CVMakerControllers::class,'index'])->name('memberIndex');

//end cv

//* Pembaayaran
Route::get('pembayaran/{link}', [Controllers\Transaksi\User\TransaksiUserController::class,'cekForm'])->name('pembayaranCek');


//*MEMBER AREA
Route::middleware(['auth'])->group(function () {
    Route::get('home', [Controllers\Member\HomeController::class,'index'])->name('memberIndex');
    Route::get('produk', [Controllers\Member\HomeController::class,'produk_list'])->name('memberProdukList');

    //*Profile dan sudah enrool
    Route::prefix('my')->group(function(){
        Route::get('/', [Controllers\Member\HomeController::class,'profile'])->name('memberProfile');
        Route::post('update', [Controllers\UserController::class,'update'])->name('memberUpdate');
        Route::post('update/nama', [Controllers\UserController::class,'updateNama'])->name('memberUpdateNama');
        
        Route::get('event', [Controllers\Member\HomeController::class,'riwayat_event'])->name('memberEventHistori');
        Route::get('event/detail', [Controllers\Member\HomeController::class,'detail_riwayat'])->name('memberEventDetail');
        
        Route::get('kelas', [Controllers\Member\HomeController::class,'kelas_saya'])->name('memberKelas');
        Route::get('kelas/detail', [Controllers\Member\HomeController::class,'detail_kelas'])->name('memberKelasDetail');
        Route::get('kelas/detail/{id}/{sub}', [Controllers\Member\HomeController::class,'detail_sub_kelas'])->name('memberKelasSubDetail');
        
        Route::get('konsultasi', [Controllers\Member\HomeController::class,'konsultasi_saya'])->name('memberKonsultasi');
        Route::get('template', [Controllers\Member\HomeController::class,'template_saya'])->name('memberTemplate');

        //Ujian
        Route::get('ujian/{id}', [Controllers\Member\UjianController::class,'index'])->name('memberAttemptTest');
        Route::get('ujian/hasil/{id}', [Controllers\Member\UjianController::class,'detailUjian'])->name('memberDetailUjian');
        Route::post('answer', [Controllers\Member\UjianController::class,'answer'])->name('answerTest');
    });

    //* Pembayaran lama
    // Route::post('invoice', [Controllers\PembayaranController::class,'index'])->name('invoiceIndex');
    // Route::get('pembayaran', [Controllers\PembayaranController::class,'transaksiTolak'])->name('pembayaranIndex');

    
    //*Transaksi
    Route::post('cancel-payment', [Controllers\Transaksi\User\TransaksiUserController::class,'delete_transaksi'])->name('deleteTransaksi');
   
    Route::post('pembayaran/bukti', [Controllers\Transaksi\User\TransaksiUserController::class,'create'])->name('pembayaranCreate');
    Route::post('pembayaran/gateway', [Controllers\Transaksi\User\TransaksiUserController::class,'createGateway'])->name('pembayaranCreateGateway');
    // Route::post('pembayaran/cv-checker', [Controllers\Transaksi\User\TransaksiUserController::class,'pembayaranCvChecker'])->name('pembayaranCvChecker');
    // Route::post('pendaftaran/beduk', [Controllers\Transaksi\User\TransaksiUserController::class,'pembayaranBeduk'])->name('pembayaranBeduk');

    //*Transfer
    Route::get('riwayat-pembayaran', [Controllers\Transaksi\User\TransaksiUserController::class,'index'])->name('transferIndex');
    Route::get('riwayat-pembayaran/detail/{id}', [Controllers\Transaksi\User\TransaksiUserController::class,'detail'])->name('transferDetail');

    //*Notification
    Route::prefix('notifications')->group(function(){
        Route::get('/',[Notifications::class,'index'])->name('notifications');
        Route::get('{id}',[Notifications::class,'show'])->name('detail-notifications');
    });
});

//* Group Middleware Admin and Expert

    //Produk
        

    //Konsultasi
        Route::post('/', [Controllers\Admin\KonsultasiController::class,'expertStore'])->name('konsultasiExpertStore');
        Route::get('/delete/konsultasi/{id}', [Controllers\Admin\KonsultasiController::class,'expertDelete'])->name('konsultasiExpertDelete');
        Route::get('done', [Controllers\Admin\KonsultasiController::class,'done'])->name('konsultasiDone');
    //end konsultasi


//*End produk


//*Admin 
Route::get('adm/login', [Controllers\Auth\LoginAdminController::class,'index'])->name('logAdmin');
Route::post('adm/login', [Controllers\Auth\LoginAdminController::class,'login'])->name('loginAdmin');

Route::middleware(['admin'])->prefix('adm')->group(function () {
    Route::get('home', [Controllers\Admin\HomeController::class,'index'])->name('homeAdmin');

    //*Produk

        Route::prefix('konsultasi')->group(function(){
            Route::get('/', [Controllers\Konsultasi\Admin\KonsultasiAdminController::class,'konsultasi'])->name('adminKonsultasi');
            Route::get('past', [Controllers\Konsultasi\Admin\KonsultasiAdminController::class,'konsultasiPast'])->name('pastKonsultasi');
            Route::get('restore', [Controllers\Konsultasi\Admin\KonsultasiAdminController::class,'konsultasiRestore'])->name('restoreKonsultasi');
            Route::get('edit', [Controllers\Konsultasi\Admin\KonsultasiAdminController::class,'konsultasiEdit'])->name('editKonsultasi');
            Route::get('add', [Controllers\Konsultasi\Admin\KonsultasiAdminController::class,'konsultasiAdd'])->name('addKonsultasi');

            Route::post('save', [Controllers\Konsultasi\Admin\KonsultasiAdminController::class,'konsultasiSave'])->name('saveKonsultasi');
            Route::get('end', [Controllers\Konsultasi\Admin\KonsultasiAdminController::class,'konsultasiEnd'])->name('endKonsultasi');
            Route::get('start', [Controllers\Konsultasi\Admin\KonsultasiAdminController::class,'konsultasiStart'])->name('startKonsultasi');
            Route::get('delete', [Controllers\Konsultasi\Admin\KonsultasiAdminController::class,'konsultasiDelete'])->name('deleteKonsultasi');
        });

        Route::prefix('event')->group(function(){
            Route::get('/', [Controllers\Event\Admin\EventAdminController::class,'event'])->name('eventAdmin');
            Route::get('past', [Controllers\Event\Admin\EventAdminController::class,'eventPast'])->name('eventPast');
            Route::get('restore', [Controllers\Event\Admin\EventAdminController::class,'eventRestore'])->name('restoreEvent');
            Route::get('edit', [Controllers\Event\Admin\EventAdminController::class,'eventEdit'])->name('editEvent');
            Route::get('add', [Controllers\Event\Admin\EventAdminController::class,'eventAdd'])->name('addEvent');

            Route::post('save', [Controllers\Event\Admin\EventAdminController::class,'eventSave'])->name('saveEvent');
            Route::get('end', [Controllers\Event\Admin\EventAdminController::class,'eventEnd'])->name('endEvent');
            Route::get('start', [Controllers\Event\Admin\EventAdminController::class,'eventStart'])->name('startEvent');
            Route::get('delete', [Controllers\Event\Admin\EventAdminController::class,'eventDelete'])->name('deleteEvent');
    
            //! Store event dipindah diatas ke group
            
        });

        Route::prefix('template')->group(function(){
            Route::get('/', [Controllers\Template\Admin\TemplateAdminController::class,'template'])->name('templateAdmin');
            Route::get('add', [Controllers\Template\Admin\TemplateAdminController::class,'templateAdd'])->name('addTemplate');
            Route::get('/{id}', [Controllers\Template\Admin\TemplateAdminController::class,'templateEdit'])->name('editTemplate');
            Route::get('delete/{id}', [Controllers\Template\Admin\TemplateAdminController::class,'templateDelete'])->name('deleteTemplate');
            Route::post('create', [Controllers\Template\Admin\TemplateAdminController::class,'templateCreate'])->name('createTemplate');
            Route::get('delete/file/index', [Controllers\Template\Admin\TemplateAdminController::class,'deleteFileTemplate'])->name('deleteFileTemplate');
        });

    //End produk

    //*Forum
        Route::prefix('forums')->group(function(){
            Route::get('/', [Controllers\Forum\Admin\ForumAdminController::class,'index'])->name('forumAdmin');
            Route::post('/jawab', [Controllers\Forum\Admin\ForumAdminController::class,'jawab'])->name('forumAdminJawab');
        });
    //End forum

    //*Transaksi
        Route::get('transaksi', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'transaksi'])->name('transaksiIndex');
        Route::get('transaksi-detail', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'transaksi_detail'])->name('transaksiDetail');
        Route::get('transaksi-delete', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'transaksi_delete'])->name('transaksiDelete');
        Route::get('transaksi-delete-multi', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'transaksi_delete_multi'])->name('transaksiDeleteMulti');
        Route::get('transaksi-konfirm-bank', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'transaksi_konfirmasi_bank'])->name('transaksiBankKonfirmasi');
        Route::get('transaksi-tolak-bank', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'transaksi_tolak'])->name('transaksiTolak');
        Route::get('transaksi-konfirm-mid', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'transaksi_konfirmasi_mid'])->name('transaksiMidKonfirmasi');
    //end 

    //*Pendaftaran
        Route::prefix('pendaftaran')->group(function(){ 
           
            //EVENT
            Route::get('event', [Controllers\Admin\PendaftaranController::class,'event'])->name('pendaftaranEvent');
            Route::get('event/delete', [Controllers\Admin\PendaftaranController::class,'deleteEnrollEvent'])->name('deleteEnrollEvent');
            Route::get('event/download', [Controllers\Admin\PendaftaranController::class,'downloadEvent'])->name('downloadEvent');
        
            //KOSULTASI
            Route::get('konsultasi', [Controllers\Admin\PendaftaranController::class,'konsultasi'])->name('pendaftaranKonsultasi');
            Route::get('konsultasi/download', [Controllers\Admin\PendaftaranController::class,'downloadKonsultasi'])->name('downloadKonsultasi');
            Route::get('konsultasi/done', [Controllers\Admin\PendaftaranController::class,'konsultasiDone'])->name('doneKonsultasi');
            Route::get('konsultasi/delete', [Controllers\Admin\PendaftaranController::class,'deleteEnrollKonsultasi'])->name('deleteEnrollKonsultasi');
        
            //TEMPLATE
            Route::get('template', [Controllers\Admin\PendaftaranController::class,'template'])->name('pendaftaranTemplate');
            Route::get('template/delete', [Controllers\Admin\PendaftaranController::class,'deleteEnrollTemplate'])->name('deleteEnrollTemplate');
        });
    //end pendaftaran

    //* Setting
        Route::prefix('setting')->group(function(){ 
            Route::prefix('form')->group(function(){ 
                Route::get('/', [Controllers\Admin\SettingFormController::class,'index'])->name('formSetting');
                Route::post('/', [Controllers\Admin\SettingFormController::class,'store'])->name('formSettingStore');
                Route::get('/add', [Controllers\Admin\SettingFormController::class,'init'])->name('formSettingAdd');
                Route::get('/delete', [Controllers\Admin\SettingFormController::class,'delete'])->name('formSettingDelete');
            });

            Route::prefix('metode')->group(function(){ 
                Route::get('pembayaran', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'admin'])->name('settingPembayaranAdmin');
                Route::get('pembayaran/detail/{id}', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'detail'])->name('settingDetailPembayaranAdmin');
                Route::get('pembayaran/switch', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'switch'])->name('settingPembayaranSave');
                Route::post('pembayaran/method', [Controllers\Transaksi\Admin\TransaksiAdminController::class,'saveMethod'])->name('settingPembayaranAdminSaveMethod');
            });
        });
    //end settting 

    //*BLOG
        Route::get('blog', [Controllers\Blog\Admin\BlogAdminController::class,'admin'])->name('blogAdmin');
        Route::get('blog/unpublish', [Controllers\Blog\Admin\BlogAdminController::class,'admin_unpublish'])->name('blogAdminUnpublish');
        Route::get('blog-add', [Controllers\Blog\Admin\BlogAdminController::class,'pageAdd'])->name('blogAdd');
        Route::get('blog-edit', [Controllers\Blog\Admin\BlogAdminController::class,'editBlog'])->name('blogEdit');
        Route::post('blog-save', [Controllers\Blog\Admin\BlogAdminController::class,'createBlog'])->name('blogStore');

        //action
        Route::get('blog-unpublish', [Controllers\Blog\Admin\BlogAdminController::class,'unpublish'])->name('blogUnpublish');
        Route::get('blog-publish', [Controllers\Blog\Admin\BlogAdminController::class,'publish'])->name('blogPublish');
        Route::get('blog-delete', [Controllers\Blog\Admin\BlogAdminController::class,'delete'])->name('blogDelete');
    
        //setting
        Route::get('blog/kategori', [Controllers\Blog\Admin\BlogAdminController::class,'setting_kat'])->name('blogKategori');
        Route::post('blog/kategori-add', [Controllers\Blog\Admin\BlogAdminController::class,'saveKat'])->name('blogKategoriSave');
        Route::get('blog/kategori-delete/{id}', [Controllers\Blog\Admin\BlogAdminController::class,'delKat'])->name('blogKategoriDel');

    //End blog

    //*NOTIFIKASI
        Route::get('notifikasi', [Controllers\Admin\NotifikasiUserController::class,'index'])->name('notifikasiIndex');
        Route::get('notifikasi/add', [Controllers\Admin\NotifikasiUserController::class,'add'])->name('notifikasiAdd');
        Route::post('notifikasi/store', [Controllers\Admin\NotifikasiUserController::class,'store'])->name('notifikasiStore');
        Route::get('notifikasi/delete', [Controllers\Admin\NotifikasiUserController::class,'delete'])->name('notifikasiDelete');
    //edn noti

    //*Member
        Route::get('member', [Controllers\UserController::class,'admin'])->name('memberAdminIndex');
        Route::get('member-detail', [Controllers\UserController::class,'detail'])->name('memberAdminDetail');
        Route::get('list-member', [Controllers\UserController::class,'getUser'])->name('listMember');
    //end member

    //*EXPERT
    Route::prefix('expert')->group(function(){ 
        Route::get('/', [Controllers\Admin\ExpertController::class,'admin'])->name('expertAdminIndex');
        Route::get('detail/{id}', [Controllers\Admin\ExpertController::class,'detail'])->name('expertAdminDetail');
        Route::post('/', [Controllers\Admin\ExpertController::class,'store'])->name('expertAdminStore');
        Route::get('/add', [Controllers\Admin\ExpertController::class,'create'])->name('expertAdminCreate');
        Route::get('reset-pass', [Controllers\Admin\ExpertController::class,'resetPass'])->name('expertAdminReset');
    });
});

//*Expert
Route::get('exp/login', [Controllers\Auth\LoginExpertController::class,'index'])->name('logExpert');
Route::post('exp/login', [Controllers\Auth\LoginExpertController::class,'login'])->name('loginExpert');

Route::middleware(['expert'])->prefix('exp')->group(function () {
    Route::get('home', [Controllers\Expert\HomeController::class,'index'])->name('homeExpert');
    
    //*Produk
    Route::prefix('event')->group(function(){
        Route::get('/', [Controllers\Expert\ProdukController::class,'event'])->name('eventExpert');
        Route::get('add', [Controllers\Expert\ProdukController::class,'eventAdd'])->name('addEventExpert');
        Route::get('edit', [Controllers\Expert\ProdukController::class,'eventEdit'])->name('editEventExpert');
        Route::get('past', [Controllers\Expert\ProdukController::class,'eventPast'])->name('eventPastExpert');
    });

    Route::prefix('konsultasi')->group(function(){
        Route::get('/', [Controllers\Expert\ProdukController::class,'konsultasi'])->name('konsultasiExpert');
        Route::prefix('expert')->group(function(){
            Route::get('/{id}', [Controllers\Expert\ProdukController::class,'expertIndex'])->name('konsultasiExperts');
            Route::get('/detail/{id}', [Controllers\Expert\ProdukController::class,'expertDetail'])->name('konsultasiExpertDetails');
        });
    });


    Route::get('pendaftaran', [Controllers\Expert\PendaftaranController::class,'index'])->name('pendaftaranExpert');
});



Route::get('formulir', [Controllers\FormulirController::class,'index'])->name('formIndex');


Route::post('callback-test',function(){
    $xenditXCallbackToken = 'hPADmzWZEo5cdkrbmjkDXtZQhw5cTSAzJ2zYVAGZiJzEnxzB';

    // This section is to get the callback Token from the header request, 
    // which will then later to be compared with our xendit callback verification token
    $reqHeaders = getallheaders();
    $xIncomingCallbackTokenHeader = isset($reqHeaders['X-CALLBACK-TOKEN']) ? $reqHeaders['X-CALLBACK-TOKEN'] : "";
    // return response()->json([
    //     'nama' => $xIncomingCallbackTokenHeader
    // ]);

    // In order to ensure the request is coming from xendit
    // You must compare the incoming token is equal with your xendit callback verification token
    // This is to ensure the request is coming from Xendit and not from any other third party.
    if($xIncomingCallbackTokenHeader === $xenditXCallbackToken){
    // Incoming Request is verified coming from Xendit
    // You can then perform your checking and do the necessary, 
    // such as update your invoice records
        
    // This line is to obtain all request input in a raw text json format
    $rawRequestInput = file_get_contents("php://input");
    // This line is to format the raw input into associative array
    $arrRequestInput = json_decode($rawRequestInput, true);
    print_r($arrRequestInput);
    
    $_id = $arrRequestInput['id'];
    $_externalId = $arrRequestInput['external_id'];
    $_userId = $arrRequestInput['user_id'];
    $_status = $arrRequestInput['status'];
    $_paidAmount = $arrRequestInput['paid_amount'];
    $_paidAt = $arrRequestInput['paid_at'];
    $_paymentChannel = $arrRequestInput['payment_channel'];
    $_paymentDestination = $arrRequestInput['payment_destination'];
    

    Admin::updateOrCreate(['id'=>2],[
        'nama' => $arrRequestInput['external_id']
    ]);
    
    // return response()->json([
    //     'nama' => $arrRequestInput
    // ]);

    // You can then retrieve the information from the object array and use it for your application requirement checking
        
    }else{
    // Request is not from xendit, reject and throw http status forbidden
        http_response_code(403);
        
    }
})->name('callback-test');







