<?php

use App\Helper\Telepon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Notifications;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;


use App\Exports\EventEnrollExport;
use App\Models\Blog;
use Illuminate\Support\Facades\Cookie;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Str;

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


Route::get('/homes', [App\Http\Controllers\HomeController::class, 'indexs'])->name('homes');

//PUBLIC AREA
Route::get('/', [Controllers\PublicController::class,'index'])->name('publicIndex');
Route::get('event', [Controllers\PublicController::class,'produk_list_event'])->name('produkListEvent');
Route::get('konsul', [Controllers\PublicController::class,'produk_list_detail_konsul'])->name('produkListKonsul');
// Route::get('konsul/detail', [Controllers\PublicController::class,'produk_detail_konsul'])->name('produkDetailKonsul');
//Route::get('konsul/tipe/{id}', [Controllers\PublicController::class,'produk_list_detail_konsul'])->name('produkListDetailKonsul');
Route::get('kelas', [Controllers\PublicController::class,'produk_list_kelas'])->name('produkListKelas');
Route::get('template', [Controllers\PublicController::class,'produk_list_template'])->name('produkListTemplate');
// Route::get('video/{id}', [Controllers\PublicController::class,'produk_detail_video'])->name('produkDetailVideo');



//blog
Route::get('blog', [Controllers\BlogController::class,'index'])->name('blog');
Route::get('blog-kategori', [Controllers\BlogController::class,'by_categori'])->name('blogKategori');
Route::post('blog/create', [Controllers\BlogController::class,'create'])->name('blogCreate');
Route::get('blog/detail/{id}/{link}', [Controllers\BlogController::class,'detail'])->name('blogDetail');

//ebook
Route::get('ebook', [Controllers\EbookController::class,'index'])->name('ebook');
Route::get('ebook-detail', [Controllers\EbookController::class,'detail'])->name('ebookDetail');
Route::get('ebook-download', [Controllers\EbookController::class,'download_auth'])->name('ebookDownload');

Route::get('faq', [Controllers\PublicController::class,'faq'])->name('faq');
Route::get('profile', [Controllers\PublicController::class,'profile'])->name('profile');
Route::get('term-and-condition', [Controllers\PublicController::class,'term_condition'])->name('term');
Route::get('privacy-policy', [Controllers\PublicController::class,'privacy'])->name('privacy');

//*Goes to
    Route::get('goes-to-sekolah', [Controllers\PublicController::class,'goes_sekolah'])->name('goes_sekolah');
    Route::get('goes-to-campus', [Controllers\PublicController::class,'goes_campus'])->name('goes_campus');
//End goes to

//*FORUM
    Route::get('forum', [Controllers\Forum\ForumController::class,'index'])->name('forumIndex');
    Route::get('forum-show', [Controllers\Forum\ForumController::class,'show'])->name('forumDetailAjax');
    Route::get('forum/{id}', [Controllers\Forum\ForumController::class,'detail'])->name('forumDetail');
    Route::post('forum/add', [Controllers\Forum\ForumController::class,'create'])->name('forumStore');
    Route::post('forum/jawaban', [Controllers\Forum\ForumController::class,'komentar'])->name('forumStoreKomentar');
    Route::get('jawaban/delete', [Controllers\Forum\ForumController::class,'deleteKomentar'])->name('forumDeleteKomentar');

    Route::post('forum/add-kategori', [Controllers\Forum\ForumController::class,'createKategori'])->name('forumStoreKategori');
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
    Route::get('produk/detail/{id}', [Controllers\Member\HomeController::class,'produk_detail'])->name('memberProdukDetail');
    Route::get('produk/enroll/{id}', [Controllers\Member\HomeController::class,'produk_detail_enroll'])->name('enrollProdukDetail');
    Route::get('course/{id}/materi/{ids}', [Controllers\Member\HomeController::class,'detail_kelas_materi'])->name('enrollMateriKelas');

    // Route::get('formulir', [Controllers\DaftarController::class,'form_member'])->name('memberForm');
    // Route::post('pendaftaran', [Controllers\Auth\RegisterDaftarController::class,'register'])->name('registerDaftar');
//end 

//*CV
    Route::get('cv',[Controllers\CVController::class,'index'])->name('cvIndex');
    Route::get('cv-print',[Controllers\CVController::class,'print'])->name('cvPrint');
    Route::get('cv-prints',[Controllers\CVController::class,'printPublicCV'])->name('printPublicCV');

    //Set Session
    Route::get('cv-session',[Controllers\CVController::class,'setCV'])->name('cvSet');

    //work
    Route::get('work-get',[Controllers\CVController::class,'getWork'])->name('getWork');
    Route::post('work-update',[Controllers\CVController::class,'editWork'])->name('editWork');

    //edu
    Route::get('edu-get',[Controllers\CVController::class,'getEdu'])->name('getEdu');
    Route::post('edu-update',[Controllers\CVController::class,'editEdu'])->name('editEdu');

    //train
    Route::get('train-get',[Controllers\CVController::class,'getTrain'])->name('getTrain');
    Route::post('train-update',[Controllers\CVController::class,'editTrain'])->name('editTrain');

    //skil
    Route::post('skil-update',[Controllers\CVController::class,'editSkil'])->name('editSkil');

    //Prestasi
    Route::get('acv-get',[Controllers\CVController::class,'getAcv'])->name('getAcv');
    Route::post('acv-update',[Controllers\CVController::class,'editAcv'])->name('editAcv');

    //Organisasi
    Route::get('org-get',[Controllers\CVController::class,'getOrg'])->name('getOrg');
    Route::post('org-update',[Controllers\CVController::class,'editOrg'])->name('editOrg');

    //Kontak
    Route::post('kontak-update',[Controllers\CVController::class,'editKontak'])->name('editKontak');

    Route::post('bio-update',[Controllers\CVController::class,'editBio'])->name('editBio');
    //Route::get('cv', [Controllers\CVControllers::class,'index'])->name('memberIndex');

//end cv


//*MEMBER AREA
Route::middleware(['auth'])->group(function () {
    Route::get('home', [Controllers\Member\HomeController::class,'index'])->name('memberIndex');
    Route::get('produk', [Controllers\Member\HomeController::class,'produk_list'])->name('memberProdukList');
    Route::get('cv-checker', [Controllers\Member\HomeController::class,'cv_checker'])->name('memberChecker');

    Route::post('daftar/beduk', [Controllers\DaftarController::class,'pendaftaran_beduk'])->name('daftarBeduk');
    Route::post('daftar/webinar', [Controllers\DaftarController::class,'pendaftaran_webinar'])->name('daftarWebinar');
    Route::post('daftar/konsultasi', [Controllers\DaftarController::class,'pendaftaran_konsultasi'])->name('daftarKonsultasi');
    Route::post('daftar/video', [Controllers\DaftarController::class,'pendaftaran_video'])->name('daftarVideo');


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
        
        Route::get('ebook', [Controllers\Member\HomeController::class,'ebook_saya'])->name('memberEbook');
        Route::get('konsultasi', [Controllers\Member\HomeController::class,'konsultasi_saya'])->name('memberKonsultasi');

        Route::get('template', [Controllers\Member\HomeController::class,'template_saya'])->name('memberTemplate');

        //Checker
        Route::post('saveCheck', [Controllers\CVCheckerController::class,'saveChecker'])->name('saveChecker');
        Route::get('cv-checker/riwayat', [Controllers\Member\HomeController::class,'cv_checker_riwayat'])->name('memberCheckerRiwayat');
        Route::get('cv-checker/detail/{id}', [Controllers\Member\HomeController::class,'cv_checker_detail'])->name('memberCheckerDetail');
        

        //Ujian
        Route::get('ujian/{id}', [Controllers\Member\UjianController::class,'index'])->name('memberAttemptTest');
        Route::get('ujian/hasil/{id}', [Controllers\Member\UjianController::class,'detailUjian'])->name('memberDetailUjian');
        Route::post('answer', [Controllers\Member\UjianController::class,'answer'])->name('answerTest');
    });

    //* Pembayaran
    Route::post('invoice', [Controllers\PembayaranController::class,'index'])->name('invoiceIndex');
    Route::get('pembayaran', [Controllers\PembayaranController::class,'transaksiTolak'])->name('pembayaranIndex');

    Route::get('invoice/detail', [Controllers\PembayaranController::class,'pay_bukti_invoice'])->name('payInvoiceDetail');
    Route::post('invoice/pays-1', [Controllers\PembayaranController::class,'pay_midtrans'])->name('payInvoiceMidtrans');
    Route::post('invoice/pays-2', [Controllers\PembayaranController::class,'pay_bukti'])->name('payInvoiceBukti');
    Route::post('cancel-payment', [Controllers\PembayaranController::class,'delete_transaksi'])->name('deleteTransaksi');

    //*Transfer
    Route::get('riwayat-pembayaran', [Controllers\TransferController::class,'index'])->name('transferIndex');
    Route::get('riwayat-pembayaran/detail/{id}', [Controllers\TransferController::class,'detail'])->name('transferDetail');

    //notification
    Route::prefix('notifications')->group(function(){
        Route::get('/',[Notifications::class,'index'])->name('notifications');
        Route::get('{id}',[Notifications::class,'show'])->name('detail-notifications');
    });
});

//* Group Middleware Admin and Expert

    //Produk
        //Event
            Route::post('save', [Controllers\Admin\ProdukController::class,'eventSave'])->name('saveEvent');
            Route::post('save/bundling', [Controllers\Admin\ProdukController::class,'eventBundlingSave'])->name('saveBundlingEvent');
            Route::get('end', [Controllers\Admin\ProdukController::class,'eventEnd'])->name('endEvent');
            Route::get('start', [Controllers\Admin\ProdukController::class,'eventStart'])->name('startEvent');
            Route::get('delete', [Controllers\Admin\ProdukController::class,'eventDelete'])->name('deleteEvent');
        //end event

        //Konsultasi
            Route::post('/', [Controllers\Admin\KonsultasiController::class,'expertStore'])->name('konsultasiExpertStore');
            Route::get('/delete/konsultasi/{id}', [Controllers\Admin\KonsultasiController::class,'expertDelete'])->name('konsultasiExpertDelete');
            Route::get('done', [Controllers\Admin\KonsultasiController::class,'done'])->name('konsultasiDone');
        //end konsultasi

        //Ebook
            Route::post('create', [Controllers\EbookController::class,'ebookCreate'])->name('ebookCreate');
            Route::get('detail', [Controllers\EbookController::class,'adminDetail'])->name('ebookDetailAdmin');
        //end book

//*End produk


//*Admin 
Route::get('adm/login', [Controllers\Auth\LoginAdminController::class,'index'])->name('logAdmin');
Route::post('adm/login', [Controllers\Auth\LoginAdminController::class,'login'])->name('loginAdmin');

Route::middleware(['admin'])->prefix('adm')->group(function () {
    Route::get('home', [Controllers\Admin\HomeController::class,'index'])->name('homeAdmin');

    //*Produk
        Route::prefix('kelas')->group(function(){ 
            Route::get('/', [Controllers\Admin\ProdukController::class,'index'])->name('kelasIndex');
            Route::get('/init', [Controllers\Admin\ProdukController::class,'init'])->name('kelasInit');
            Route::get('/delete', [Controllers\Admin\ProdukController::class,'delete'])->name('kelasDelete');
            Route::get('/detail/{id}', [Controllers\Admin\ProdukController::class,'detail'])->name('kelasDetail');
            Route::post('/update', [Controllers\Admin\ProdukController::class,'update'])->name('kelasUpdate');

            Route::prefix('bab')->group(function(){
                Route::post('/add', [Controllers\Admin\KelasBabController::class,'create'])->name('babCreate');
                Route::post('/edit', [Controllers\Admin\KelasBabController::class,'edit'])->name('babEdit');
                Route::get('/delete/{id}', [Controllers\Admin\KelasBabController::class,'delete'])->name('babDelete');
            });

            Route::prefix('materi')->group(function(){
                Route::get('/detail/{id}', [Controllers\Admin\KelasMateriController::class,'detail'])->name('materiDetail');
                Route::get('/create', [Controllers\Admin\KelasMateriController::class,'index'])->name('materiCreate');
                Route::get('/delete', [Controllers\Admin\KelasMateriController::class,'delete'])->name('materiDelete');
                Route::post('/store', [Controllers\Admin\KelasMateriController::class,'store'])->name('materiStore');
            });

            Route::prefix('ujian')->group(function(){
                Route::get('/init/{id}', [Controllers\Admin\KelasUjianController::class,'ujianInit'])->name('ujianInit');
                Route::get('/{id}', [Controllers\Admin\KelasUjianController::class,'ujianDetail'])->name('ujianDetail');
                Route::get('delete', [Controllers\Admin\KelasUjianController::class,'ujianDelete'])->name('ujianDelete');
                Route::post('store', [Controllers\Admin\KelasUjianController::class,'ujianStore'])->name('ujianStore');
            });

            Route::prefix('soal')->group(function(){
                Route::post('/', [Controllers\Admin\KelasUjianController::class,'soalCreate'])->name('soalCreate');
                Route::get('detail', [Controllers\Admin\KelasUjianController::class,'soalDetail'])->name('soalDetail');
                Route::get('delete', [Controllers\Admin\KelasUjianController::class,'soalDelete'])->name('soalDelete');
            });
        });

        Route::prefix('konsultasi')->group(function(){

            Route::get('/', [Controllers\Admin\KonsultasiController::class,'index'])->name('konsultasiIndex');
            Route::get('/add', [Controllers\Admin\KonsultasiController::class,'konsultasiAdd'])->name('konsultasiAdd');

            Route::prefix('tipe')->group(function(){
                Route::get('/', [Controllers\Admin\KonsultasiController::class,'tipeIndex'])->name('konsultasiTipeIndex');
                Route::post('/', [Controllers\Admin\KonsultasiController::class,'tipeStore'])->name('konsultasiTipeStore');
            });

            Route::prefix('expert')->group(function(){
                Route::get('/{id}', [Controllers\Admin\KonsultasiController::class,'expertIndex'])->name('konsultasiExpertIndex');
                Route::get('/detail/{id}', [Controllers\Admin\KonsultasiController::class,'expertDetail'])->name('konsultasiExpertDetail');
                //! Add event dipindah diatas ke group
            });
        });

        Route::prefix('cv-checker')->group(function(){
            Route::get('admin', [Controllers\Admin\ProdukController::class,'cvCheckerIndex'])->name('cvCheckerIndex');
            Route::post('admin', [Controllers\Admin\ProdukController::class,'cvCheckerSave'])->name('cvCheckerSave');
            Route::get('check/{id}', [Controllers\Admin\ProdukController::class,'cvCheckerDetail'])->name('cvCheckerDetail');
        });

        Route::prefix('event')->group(function(){
            Route::get('/', [Controllers\Admin\ProdukController::class,'event'])->name('eventAdmin');
            Route::get('past', [Controllers\Admin\ProdukController::class,'eventPast'])->name('eventPast');
            Route::get('restore', [Controllers\Admin\ProdukController::class,'eventRestore'])->name('restoreEvent');
            Route::get('edit', [Controllers\Admin\ProdukController::class,'eventEdit'])->name('editEvent');
            Route::get('add', [Controllers\Admin\ProdukController::class,'eventAdd'])->name('addEvent');


            Route::get('bundling', [Controllers\Admin\ProdukController::class,'eventBundling'])->name('eventBundling');
            Route::get('add/bundling', [Controllers\Admin\ProdukController::class,'eventAddBundling'])->name('addEventBundling');
            //! Store event dipindah diatas ke group
            
        });

        Route::prefix('template')->group(function(){
            Route::get('/', [Controllers\Admin\ProdukController::class,'template'])->name('templateAdmin');
            Route::get('add', [Controllers\Admin\ProdukController::class,'templateAdd'])->name('addTemplate');
            Route::get('/{id}', [Controllers\Admin\ProdukController::class,'templateEdit'])->name('editTemplate');
            Route::get('delete/{id}', [Controllers\Admin\ProdukController::class,'templateDelete'])->name('deleteTemplate');
            Route::post('create', [Controllers\Admin\ProdukController::class,'templateCreate'])->name('createTemplate');
        });

    //End produk

    //*Forum
        Route::prefix('forums')->group(function(){
            Route::get('/', [Controllers\Admin\ForumController::class,'index'])->name('forumAdmin');
            Route::post('/jawab', [Controllers\Admin\ForumController::class,'jawab'])->name('forumAdminJawab');
        });
    //End forum

    //*Transaksi
        Route::get('transaksi', [Controllers\TransferController::class,'transaksi'])->name('transaksiIndex');
        Route::get('transaksi-detail', [Controllers\TransferController::class,'transaksi_detail'])->name('transaksiDetail');
        Route::get('transaksi-delete', [Controllers\TransferController::class,'transaksi_delete'])->name('transaksiDelete');
        Route::get('transaksi-delete-multi', [Controllers\TransferController::class,'transaksi_delete_multi'])->name('transaksiDeleteMulti');
        Route::get('transaksi-konfirm-bank', [Controllers\TransferController::class,'transaksi_konfirmasi_bank'])->name('transaksiBankKonfirmasi');
        Route::get('transaksi-tolak-bank', [Controllers\TransferController::class,'transaksi_tolak'])->name('transaksiTolak');
        Route::get('transaksi-konfirm-mid', [Controllers\TransferController::class,'transaksi_konfirmasi_mid'])->name('transaksiMidKonfirmasi');
    //end 

    //*Pendaftaran
        Route::prefix('pendaftaran')->group(function(){ 
           
            //EVENT
            Route::get('event', [Controllers\Admin\PendaftaranController::class,'event'])->name('pendaftaranEvent');
            Route::get('event/delete', [Controllers\Admin\PendaftaranController::class,'deleteEnrollEvent'])->name('deleteEnrollEvent');
            Route::get('event/download', [Controllers\Admin\PendaftaranController::class,'downloadEvent'])->name('downloadEvent');
        
            //KELAS
            Route::get('kelas', [Controllers\Admin\PendaftaranController::class,'list_kelas'])->name('listKelas');
            Route::get('kelas-detail', [Controllers\Admin\PendaftaranController::class,'kelas'])->name('pendaftaranKelas');
            Route::get('kelas/delete', [Controllers\Admin\PendaftaranController::class,'deleteEnrollKelas'])->name('deleteEnrollKelas');

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

    //*Pendaftaran setting
        Route::prefix('setting')->group(function(){ 
            Route::prefix('form')->group(function(){ 
                Route::get('/', [Controllers\Admin\SettingFormController::class,'index'])->name('formSetting');
                Route::post('/', [Controllers\Admin\SettingFormController::class,'store'])->name('formSettingStore');
                Route::get('/add', [Controllers\Admin\SettingFormController::class,'init'])->name('formSettingAdd');
                Route::get('/delete', [Controllers\Admin\SettingFormController::class,'delete'])->name('formSettingDelete');

                Route::get('beduk', [Controllers\Admin\SettingFormController::class,'beduk'])->name('formBeduk');
                Route::get('beduk-detail', [Controllers\Admin\SettingFormController::class,'detail_beduk'])->name('detailBeduk');
                Route::post('beduk-save', [Controllers\Admin\SettingFormController::class,'edit_beduk'])->name('saveBeduk');
                Route::post('beduk-create', [Controllers\Admin\SettingFormController::class,'save_beduk'])->name('createBeduk');
                Route::get('switch-form-beduk', [Controllers\Admin\SettingFormController::class,'switch_setting_beduk'])->name('formBedukSwitch');

                Route::get('webinar', [Controllers\Admin\SettingFormController::class,'webinar'])->name('formWebinar');
                Route::get('webinar-detail', [Controllers\Admin\SettingFormController::class,'detail_webinar'])->name('detailWebinar');
                Route::post('webinar-save', [Controllers\Admin\SettingFormController::class,'edit_webinar'])->name('saveWebinar');
                Route::post('webinar-create', [Controllers\Admin\SettingFormController::class,'save_webinar'])->name('createWebinar');
                Route::get('switch-form-webinar', [Controllers\Admin\SettingFormController::class,'switch_setting_webinar'])->name('formWebinarSwitch');
            });
        });
    //end settting pendaftaran

    //*BLOG
        Route::get('blog', [Controllers\BlogController::class,'admin'])->name('blogAdmin');
        Route::get('blog/unpublish', [Controllers\BlogController::class,'admin_unpublish'])->name('blogAdminUnpublish');
        Route::get('blog-add', [Controllers\BlogController::class,'pageAdd'])->name('blogAdd');
        Route::get('blog-edit', [Controllers\BlogController::class,'editBlog'])->name('blogEdit');
        Route::post('blog-save', [Controllers\BlogController::class,'createBlog'])->name('blogStore');

        //action
        Route::get('blog-unpublish', [Controllers\BlogController::class,'unpublish'])->name('blogUnpublish');
        Route::get('blog-publish', [Controllers\BlogController::class,'publish'])->name('blogPublish');
        Route::get('blog-delete', [Controllers\BlogController::class,'delete'])->name('blogDelete');
    
        //setting
        Route::get('blog/kategori', [Controllers\BlogController::class,'setting_kat'])->name('blogKategori');
        Route::post('blog/kategori-add', [Controllers\BlogController::class,'saveKat'])->name('blogKategoriSave');
        Route::get('blog/kategori-delete/{id}', [Controllers\BlogController::class,'delKat'])->name('blogKategoriDel');

    //End blog

    //*EBOOK
        Route::prefix('ebook')->group(function(){
            Route::get('/', [Controllers\EbookController::class,'admin'])->name('ebookAdmin');
            Route::get('delete/{id}', [Controllers\EbookController::class,'ebookDelete'])->name('ebookDelete');
            //! Add event dipindah diatas ke group
            Route::get('add', [Controllers\EbookController::class,'pageAdd'])->name('ebookAdd');
            Route::get('edit', [Controllers\EbookController::class,'pageEdit'])->name('ebookEdit');
        });
    //End book

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

    Route::prefix('ebook')->group(function(){
        Route::get('/', [Controllers\Expert\ProdukController::class,'ebook'])->name('ebookExpert');
        Route::get('delete/{id}', [Controllers\Expert\ProdukController::class,'ebookDelete'])->name('ebookDeleteExpert');
        Route::post('create', [Controllers\Expert\ProdukController::class,'ebookCreate'])->name('ebookCreateExpert');
        Route::get('detail', [Controllers\Expert\ProdukController::class,'adminDetail'])->name('ebookDetailExpert');
        Route::get('add', [Controllers\Expert\ProdukController::class,'ebookAdd'])->name('ebookAddExpert');
        Route::get('edit', [Controllers\Expert\ProdukController::class,'ebookEdit'])->name('ebookEditExpert');
    });

    Route::get('pendaftaran', [Controllers\Expert\PendaftaranController::class,'index'])->name('pendaftaranExpert');

});



Route::get('formulir', [Controllers\FormulirController::class,'index'])->name('formIndex');
Route::get('pembayaran/{id}', [Controllers\TransaksiController::class,'cekForm'])->name('pembayaranCek');
Route::post('pembayaran', [Controllers\TransaksiController::class,'create'])->name('pembayaranCreate');
Route::post('pembayaran/cv-checker', [Controllers\TransaksiController::class,'pembayaranCvChecker'])->name('pembayaranCvChecker');
Route::post('pendaftaran/beduk', [Controllers\TransaksiController::class,'pembayaranBeduk'])->name('pembayaranBeduk');


Route::get('get/cookie', function(){
    dd(Cookie::get());
});

Route::get('slug', function(){
    $data = Blog::all();

    foreach ($data as $dt){
        $dt->link = Str::slug($dt->judul, '-');
        $dt->save();
    }

});






