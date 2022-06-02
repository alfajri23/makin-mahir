@extends('layouts.public')

@section('content')

<style>
    .footer-wrapper{
        margin-top:0 !important;
    }
</style>

<div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-3">
    <div class="card-body pb-0">
        <div class="">
            <h2 class="fw-700 text-grey-800 display2-size display3-md-size lh-3 pt-lg--5 text-center">FAQ</h2>
        </div>

        <div class="row searchable">
            <div class="col-12">
                <div class="col-12 col-sm-6 mx-auto ">

                    <input type="text" class="form-control mx-auto" autofocus placeholder="🔍 Cari sesuatu"/>
                </div>
        
            </div>
            <div class="col-12 col-sm-8 mx-auto pb-5 offset-lg-1 page-title searchable-item style1">
                <h2 class="fw-700 text-grey-800 font-xl lh-3 pt-lg--5 mt-5">Makin Mahir</h2>

                <span class="searchable-item ">
                    <div class="row">
                        <i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>
                        <h4 class="fw-600 font-xs">Apa itu Makin Mahir ?</h4>
                    </div>
                 {{-- <h4 class="fw-600 font-xs mt-4 mb-2">
                     <i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>
                     Apa itu Makin Mahir ?
                 </h4> --}}
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Makin Mahir ID adalah platform perencanaan karir yang bisa membantu kamu atau siapapun memudahkan dalam melakukan perencanaan karir masa depan. Makin Mahir ID bisa memberikan rekomendasi karir terbaik berdasarkan assessment yang diikuti sampai dengan melakukan upgrade kompetensi agar pengguna berada pada level mahir sehingga mampu meraih karir impian.</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Siapa pengembang Makin Mahir ID ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Makin Mahir ID didirikan oleh perusahaan IT bernama PT. Bumi Tekno Indonesia, perusahaan yang bergerak di bidang Development Website, Software dan Aplikasi Mobile dan sudah berpengalaman lebih dari 10 tahun</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apa yang bisa Saya dapat dari Makin Mahir ID ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Kamu bisa melakukan Assessment secara gratis yang terdiri dari 3 jenis assessment, mendapatkan hasilnya serta rekomendasi karir terbaik berdasarkan assessment yang kamu ikuti. Kamu juga bisa melakukan upgrade kompentensi hingga mampu meraih karir impian, serta membuat CV standar HR baik gratis maupun berbayar. Jika ingin semua lebih optimal kamu juga bisa konsultasi karir kepada HR profesional di Makin Mahir ID.</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apa syarat menggunakan Makin Mahir ID ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Tidak ada syarat khusus. Semua orang bisa menggunakan layanan Makin Mahir ID dengan menghormati norma hukum dan sosial. Setiap pengguna Makin Mahir ID bisa masuk ke semua layanan gratis dan berbayar. Untuk layanan berbayar, pengguna harus membayar terlebih dulu sebelum menggunakannya. Untuk layanan gratis, pengguna bisa langsung menggunakan layanan yang tersedia.</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Bagaimana cara mendaftar Makin Mahir ID ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Caranya cukup klik menu Akun di pojok kanan bawah, lalu klik Daftar Sekarang. Kamu tinggal mendaftarkan diri dengan memasukkan User Name dan Password serta data diri yang diminta oleh platform.</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apakah ada biaya mendaftar keanggotaan di Makin Mahir ID ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Tidak ada biaya. Menjadi pengguna atau anggota di Makin Mahir ID tidak dikenakan biaya apapun. Gratis selamanya.</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Bagaimana keamnanan pembayaran data konsumen di Makin Mahir ID ? ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Dengan metode pembayaran transfer, Makin Mahir ID tidak menyimpan dan memproses data anda apapun sebagai nasabah sebuah bank. Makin Mahir ID hanya mengetahui  asal pembayaran dari jumlah yang anda bayarkan yang tercatat dalam mutasi rekening Makin Mahir ID. Makin Mahir ID tidak akan menggunakan, membagi, dan/atau mengkomersialkan data anda untuk kepentingan pihak di luar Makin Mahir ID. Model bisnis Makin Mahir ID adalah komisi penjualan kelas, bukan periklanan.</p>
                </span>
            </div>
        
            <div class="col-12 col-sm-8 mx-auto pb-5 offset-lg-1 page-title searchable-item style1">
                <h2 class="fw-700 text-grey-800 font-xl lh-3 pt-lg--5">Kelas</h2>
                
                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-5 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Bagaimana cara lulus di sebuah kelas ? ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Setiap kelas memiliki fitur berlatih seperti kuis dan tugas. Setiap kuis/tugas memiliki skornya masing-masing yang ditentukan oleh mentor. Skor ini akan diakumulasikan secara otomatis setelah anda mengerjakannya menjadi total skor. Setiap mentor berhak menentukan total skor minimal (passing grade) di kelasnya</p>
                </span>
                 <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apa yang saya dapatkan bila lulus kelas ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Anda akan mendapatkan lencana dan sertifikat kelas yang secara otomatis masuk di dashboard akun anda dan bisa anda download kapanpun</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Bagaimana pengakuan umum terhadap sertifikat Makin Mahir ID ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Sertifikat Makin Mahir ID tidak ditujukan sebagai pengakuan atau kompetensi. Sertifikat Makin Mahir ID dibuat sebagai tanda kelulusan kelas</p>
                </span>
                 
                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Saya sudah lulus dan menyelesaikan kelas,bisakah saya tetap mengakses konten di dalam kelas ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Bisa. Anda tetap bisa masuk ke dalam kelas dimana anda telah bergabung sesuai waktu keanggotaan anda dalam kelas tersebut. Misalnya kelas tersebut menyediakan akses tak terbatas, artinya meski anda sudah lulus anda tetap bisa masuk ke kelas tersebut selamanya.</p>
                </span>
                 
                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apakah Mahir Mahir ID membuka kelas offline ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Makin Mahir ID hanya sebatas penyedia tempat belajar mengajar online. Tapi, sangat mungkin seorang mentor mengkombinasikan Makin Mahir ID dengan kelas offline-nya seperti seminar, workshop, atau training. Kombinasi kelas offline dan online ini disebut sebagai kelas hibrid.</p>
                </span>

            </div>
        
            <div class="col-12 col-sm-8 mx-auto pb-5 offset-lg-1 page-title searchable-item style1">
                <h2 class="fw-700 text-grey-800 font-xl lh-3 pt-lg--5">Assesment</h2>
                    
                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-5 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apa itu Assesment Makin Mahir ID ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Assessment adalah tes psikologi yang terdiri dari 3 jenis, yaitu tes MBTI, RIASEC dan TPA untuk mengukur kepribadian, minat dan bakat pengguna.</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apa manfaat mengikuti Assesment Makin Mahir ID ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Dengan mengikuti Assessment Makin Mahir ID kamu bisa mendapatkan gambaran kepribadian, minat dan bakatmu serta rekomendasi karir terbaik. Kamu juga bisa berkonsultasi mengambil saran dari HR profesional dari Makin Mahir ID agar pemmilihan karirmu cocok dengan kepribadian, minat serta bakat.</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Saya pernah melakukan Assessment, Apa perlu mengambil Assessment lagi ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Untuk keperluan layanan Makin Mahir ID, sangat dianjurkan untuk mengambil Assessment terlebih dahulu. Data hasil Assessment ini akan digunakan sebagai acuan bagi Makin Mahir ID dalam melayani pengguna, seperti misalnya layanan Konsultasi.</p>
                </span>
                 
                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apakah Assesment ini Gratis ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Assessment Makin Mahir ID ini adalah layanan GRATIS tanpa dipungut biaya.</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Berapa kali Saya bisa mengambil Assesment ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Kamu hanya diperkenankan untuk mengambil satu kali untuk setiap jenis assessment.</p>
                </span>

            </div>
        
            <div class="col-12 col-sm-8 mx-auto pb-5 offset-lg-1 page-title searchable-item style1">
                <h2 class="fw-700 text-grey-800 font-xl lh-3 pt-lg--5">CV Maker</h2>
                
                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-5 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apa itu CV Maker Makin Mahir ID ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">CV Maker adalah layanan Makin Mahir ID dalam membuat CV Standar HR. Dengan layanan ini pengguna dapat membuat CV secara instan dan hasilnya sudah siap digunakan untuk melamar kerja.</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apa manfaat menggunakan CV Maker Makin Mahir ID ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">CV yang dihasilkan di CV Maker Makin Mahir ID merupakan CV Standar HR. Siapapun, meskipun tanpa keahlian desain, akan mampu membuat CV sendiri dengan desain modern sesuai dengan template yang disediakan.</p>
                </span>

                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apa bedanya dengan pembuat CV lain ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Di Makin Mahir ID, kamu bisa membuat CV yang menarik dan siap pakai secara GRATIS tanpa dipungut biaya. Meskipun demikian, untuk mengoptimalkan hasil CV buatanmu, kamu bisa mengambil konsultasi dengan HR Profesional Makin Mahir ID dengan membayar sejumlah biaya konsultasi.</p>
                </span>
                 
                <span class="searchable-item ">
                 <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Apakah ada jaminan CV Saya pasti dilirik HR ?</h4>
                 <p class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-4 w-100 w-xs-90">Diminati atau tidaknya CV sangat tergantung dari penilaian subyektif HR perusahaan yang dilamar. Oleh karena itu, Makin Mahir ID menyediakan layanan CV Maker untuk membantu pengguna agar meningkatkan peluang diterima kerja melalui pembuatan CV Standar HR.</p>
                </span>
            </div>
            
        </div>

    </div>
</div>

<script>
    ;(function search () {

        ;[...document.querySelectorAll('.searchable')].forEach(makeSearchable)
        function makeSearchable ($searchable) {
            const $searchableItems = [...$searchable.querySelectorAll('.searchable-item')]
            const $search = $searchable.querySelector('input')
            $search.addEventListener('keyup', (e) => {
                
                $searchableItems.forEach(function ($el) {
                    const text = $el.getAttribute('data-search') || $el.innerText
                    const show = new RegExp(e.target.value, 'i').test(text)
                    $el.style.display = show ? '' : 'none'
                })
            })
        }
    })()
</script>



@endsection