@extends('layouts.public')

@section('content')

<style>
    /* .nav-link{
        color: rgb(138, 138, 138) !important
    } */

    .layer-blue{
        z-index: 0;
        width: 100%;
        top: 300px;
        height: 70%;
    }

    .header-wrapper .nav-menu li a {
        color:#777 !important;
    }

    .hover:hover{
        background-color:#E2F3FF;

    }

    .owl-theme.owl-nav-link .owl-nav {
        top: 90% !important;
    }

    .owl-item.active.center{
        transform: scale(1.15);
    }

    .vh-banner{
        height: 70vh;
    }

    .border-no-1{
        border-bottom: 1px solid #E1E1F0;
        border-right: 1px solid #E1E1F0
    }

    .border-no-2{

    }

    .border-no-3{
        border-right: 1px solid #E1E1F0
    }

    .border-no-4{
        border-top: 1px solid #E1E1F0;
    }

    .border-no-5{
        border-top: 1px solid #E1E1F0;
        border-right: 1px solid #E1E1F0
    }

    .border-no-6{
        border-top: 1px solid #E1E1F0;
    }

    .layanan-card-mobile{
        width: 70px !important;
    }

    /* MOBILE */
    @media screen and (max-width: 767px) {
        .border-no-1{
            border-bottom: 1px solid #E1E1F0;
            border-right: none;
        }

        .border-no-2{
            border-bottom: 1px solid #E1E1F0;
        }

        .border-no-3{
            border-bottom: 1px solid #E1E1F0;
            border-right: none;
        }

        .border-no-4{
            border-bottom: 1px solid #E1E1F0;
            border-left: none;
        }

        .border-no-5{
            border-bottom: 1px solid #E1E1F0;
            border-top: none;
            border-right: none;
        }

        .border-no-6{
            border: none;
        }

        
        .vh-banner{
            height: 70vh;
        }
    }


</style>
    

    <div class="banner-wrapper vh-banner layer-after app-shape bg-home position-relative">
        {{-- <div class="ornamen position-absolute d-md-block d-none" style="top:-70%; left: -50px;">
            <img src="{{asset('asset/home/ornamen-circle-1.png')}}" alt="">
        </div> --}}
        <div class="ornamen position-absolute d-md-block d-none" style="top:-70%; right: -50px;">
            <img src="{{asset('asset/home/ornamen-circle-1.png')}}" style="transform: rotate(180deg);" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-12 pt-5 pt-sm-7 pb-2 pt-sm-7 mt-sm-5 mt-2 d-flex">
                    <div class="card w-100 border-0 bg-transparent">
                        <h2 class="poppins fw-600 text-white display3-size display2-md-size">Wujudkan Karier Impianmu
                            Bersama Makin Mahir
                        </h2>
                        <p class="font-xss font-md-xsss text-white">
                            Setiap orang memiliki kesempatan yang sama untuk bisa bekerja, Makin Mahir hadir sebagai platform ekosistem untuk membantu persiapan karir Anda.
                        </p>
                    </div>
                </div>

                <div class="col-md-5 col-10 mt-5 mt-sm-0 p-0 align-items-center justify-content-end d-flex position-absolute bottom-0 right-0">
                    <div class="card w-100 border-0 bg-transparent text-center d-block">
                        {{-- <img src="{{asset('asset/home/home-banner.png')}}" style="filter: opacity(0.2);"  alt="app-bg" class="w-100 d-lg-block" >     --}}
                    </div>
                </div>

                <div class="col-md-6 col-12">

                </div>

            </div>
        </div>
    </div>

    {{-- Layanan mobile --}}
    <div class="search-wrap position-relative d-block d-sm-none" style="top:-130px; ">
        <div class="container">

            <div class="row">
                <div class="loop-home owl-carousel owl-theme owl-loaded owl-drag">  
                   
                    <div class="layanan-card-mobile text-center mx-2">
                        <a href="{{route('produkListEvent')}}" class="card text-left border shadow-xs rounded-lg">
                            <div class="card-body p-1">
                                <img class="mx-auto" alt="icon" style="width:35px" src="data:image/png;base64,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">
                                <h4 class="fw-600 font-xsssss mb-2 mt-0 text-center">Event</h4>
                            </div>
                        </a>
                    </div>

                    <div class="layanan-card-mobile text-center mx-2">
                        <a href="{{route('produkListKonsul')}}" class="card text-left border shadow-xs rounded-lg">
                            <div class="card-body p-1">
                                <img class="mx-auto" alt="icon" style="width:35px" src="data:image/png;base64,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">
                                <h4 class="fw-600 font-xsssss mb-2 mt-0 text-center">Konsultasi</h4>
                            </div>
                        </a>
                    </div>

                    <div class="layanan-card-mobile text-center mx-2">
                        <a href="{{route('testIndex')}}" class="card text-left border shadow-xs rounded-lg">
                            <div class="card-body p-1">
                                <img class="mx-auto" alt="icon" style="width:35px" src="data:image/png;base64,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">
                                <h4 class="fw-600 font-xsssss mb-2 mt-0 text-center">Assesment</h4>
                            </div>
                        </a>
                    </div>

                    <div class="layanan-card-mobile text-center mx-2">
                        <a href="{{route('cvIndex')}}" class="card text-left border shadow-xs rounded-lg">
                            <div class="card-body p-1">
                                <img class="mx-auto" alt="icon" style="width:35px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAADiklEQVR4nO3ay08TURQG8G+K0RpaEp5RQRBCJGAQg4kJCZGgibBRXLhxp0vXbvgnjEuXujRijMIKE6gJrFhheBgwioCQAAViW5IWbMcFj6QJtlN6mDPT+X7Ldjjc3K+9d07vAEREREREREReYkgW61sxLxsGXgK4ByAoWdsBogBGUib6B6uNOamiYgEcTP4kgDKpmg61bZpo+1RtLEsU80kUAYCDT36hTz4AlBoGXkgVEwsA+8uOV/RIFZIMoNDW/ExKpApJBkAnwACUMQBlDEAZA1DGAJQxAGVnNP95PBrDzOgYwgv7XX15XQ2auzpQXFaqOSxbqQUQj8Yw9votduPxo9fWvv/E1vIKbj99DH8woDU0W6kFMDM6ljb5h/biCcyGxtH+oNdSnbUfvzA1HEIitpPXePzBAFp7ulHVUJdXnVyp7QGHy85xNhaWLNeZ/vwl78kH9r+RU8OhvOvkypGbsOghhcOpBVBeV/Pf9yrqay3Xae3pFtkv/MEAWnvv5F0nV2p7QHNXB7aWV7AXT6S9fva8Hy3dnZbrVDXU4e6zJ9LDs43Yt/3hqmnm+jfxaAyzofGjNb+yvhYt3Z2uuAP6eMkQmTvVANxMKgBHbsJeorYHpJJJLE5OY/XbPKIbWwCAYGUZqluaUNt2Db6iIkt13N4HqCxBidgOJgaGENkIH/t+SVUFbj26j3OB4qy1Rl69QTwasz7QDPzBgOUN3bVLUCqZzDj5ABBZD2Pi/RBSyaSNI9NhewCLk9MZJ/9QZD2Mpa8zWa9jH5Cj1dn5nK690n494zVu7wNs/wbENrcsXxsNb57iSJzB9gD+7u6dyrVuxT5Amf0B5HLz5oGfRW0P4MLVRmsTawAXmxpPfTzabL8Lutln7aTLK7gHKGMAyhiAMgagjAEos/0uSOr3e2meeS5I6jkeaXwuyKNsD0Dq93tpWucBfCrihFx7JEnpGIAyBqDMM32A1n1+Np7pA7Tu87PhEqTMM32A1n1+NuwDToh9QIFgAMoYgDLP9AHZ8DxAGc8DPMozfUA2PA9wGfYBBYIBKGMAyjzTB/A84ADPA9JxCVLmmT6A5wEFhn1AgWAAyhiAMgagjAEokwwgKljL6f5IFZIMYESwlrOZGJYqJRZAykQ/gG2peg626TPxXKqYWACD1cacaaINwACAiFRdB4nAxDtfCjc+1Bi/tQdDRERERERE5E7/AC5ePAB7BS02AAAAAElFTkSuQmCC">
                                <h4 class="fw-600 font-xsssss mb-2 mt-0 text-center">CV Maker</h4>
                            </div>
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>

    {{-- card layanan --}}
    <div class="search-wrap position-relative d-none d-sm-block" style="top:-100px; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-10 mx-auto mb-4">
                    <div class="card rounded-lg p-4 border-0 bg-no-repeat bg-white shadow-lg">
                        <div class="card-body w-100 p-0">
                            <h4 class="font-sm fw-600 text-center mb-3">Nikmati Berbagai Layanan Terbaik</h4>
                            <div class="container-fluid mb-4">
                                <div class="row justify-content-around">
                                   
                                    <div class="col-3">
                                        <div class="">
                                            <a href="{{route('produkListEvent')}}" class="hover card w140 p-0 rounded-lg text-center border">
                                                <div class="card-body">
                                                    <div class="btn-round-xl">
                                                        <img style="width:50px" src="data:image/png;base64,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">
                                                        {{-- <img src="{{asset('asset/home/icon-event.png')}}" alt="icon" style="width:40px" class=""> --}}
                                                    </div>
                                                    <h4 class="fw-600 font-xsss mt-3 mb-0">Event</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="">
                                            <a href="{{route('produkListKonsul')}}" class="hover card w140 p-0 rounded-lg text-center border">
                                                <div class="card-body">
                                                    <div class="btn-round-xl">
                                                        <img style="width:50px" src="data:image/png;base64,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">
                                                        {{-- <img src="{{asset('asset/home/icon-konsul.png')}}" alt="icon" class=""> --}}
                                                    </div>
                                                    <h4 class="fw-600 font-xsss mt-3 mb-0">Konsultasi</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="">
                                            <a href="{{route('testIndex')}}" class="hover card w140 p-0 rounded-lg text-center border">
                                                <div class="card-body">
                                                    <div class="btn-round-xl">
                                                        <img style="width:50px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAGtUlEQVR4nO2dTYwURRTH/1W1s4AyC+yKB5Y1MRJMMMrXgoSAZC/4AcYDCQbRswl+YBQNxsvcTIxC9GCiIejBj2Q9SEj4iiEEgxeQqMQNYdhoBNaEKF+7m3V2d5ry0DPTNTPdO13db2aqZ+oXJt3pqXm8eq+qXvWr6l7AYrFYLO0Ka7YCumROnep44PqdlzjYLjD2CAPAGPsdkJ/2LUx/NTAwkG+2jjokygEHBo93d8qp42BsDcDAGFB+lGcxSz61c+vWW83VNDy82QqEJZPJ8Fksf5RxsYZzDi44OBcVx461PN95NJPJJKZeiVH0ocfWvsi5eLxkcM4LH/dcFJwgOF+3bNXGnc3WNywkQ9DZ957oc/J8P4DNANLF61LK0DKG17ztKsMYGBjcf96RueOMe3SvHWGcvywEZ45z93MGPO3+tiBDLV86esNVzw/vAjX08/1WyjFAnuQO27vh458uha5gALEd4Bqf/Qqwble/8EYHCpWUEn+u21swtKuWYmjl6BlYCN637ZmBawBw6MTpPseRV9yvyg3N1N8q1+YfeydYn6qLvldvSYjlm/b9eFWrwhV0xPkxADh5vl9K2R2gehWlUhWVElz4Gtpr0QCUnlAJ59xzlo8T1N9WytAwulp+AYPzEYDtgQVDENsBUsrNNct4hQPLcM5RawhRe4OYvH34xBefvcAFZ5O58W+cOfP9DR3Qi3SMHqS1BJ6cseIhiO0AKGM+AKSX9KN3y2tIdfVoCfn79LnqVl/WostbtrynZ+XkvT0XiwbnqDR4eS8q6xWMYWXmmJZ+U6P/4OrhT3Dn8jnVUV1aQnwgnQVJAL1bXtU2PuD2AC6EclSmmKXZjnJeNv3kEEKZDXEOUZAjyuR68nTp7FqIvmdfL+sletHOn/hDUOnEPUt13RdJDufCf8wuzYKUa6joFX4xw2cmpcaHKHTOW0hidJX4Q5DmrCcIIThqBs6ZgnSAoVmVE5hRt/8UMYCEObNnY3JqWr9l12z11U6d1Rmz2kSNDiB0QFyVlj64CMNXrmNqarrK4MXAqWtov+GqMyWw+P550RU1PQZEpXveXKx9dG5cdepOy8aAdsWYGJA4iBqeMTEgMRQMT1VfuhgAtMVwZGNAi2FjQFRMigFt1QdsDGguNga0GIlZlDcSgsZH4gCpfJLImREHO47kMJgNsadLSsjih+D/po0BCeTMiIN956fhSODri64Dti8NNgt1fWmGICm9T4JQjV/k0HBjdzbGdwBxerZR+BlfMGDX8lRD9YjtANPH/8FsHjuO5HBmxCldCzL+m6tT2NArasqUShyIS8PvhJ//YAi//DFOImv1kjS+3bMs8PvBbL40ru87P126Htf4lNA4QEMpKuMDwPnhsRm///6yN5470nNCVOPXg5aOAa+sSEEoK/COpDU+RX0bHgNWL0nXLhSS/hqyNvQK7Okvd0IRzoDdq/SNL+HFAIpZX8NjwExjdj1Yv0hgTz/w4c/euM8Z8MaqFDYtjtDyiWMAXSrC4PsA1wluT4hl/DpAlowz0/Qe6xcJvL/RbW8PL6DZmmVTEZpQGJ5qG04RuyKmi7ExADA2BtRCKxtKTNvEgCB0s6FFqOpLdh+QRKJkQ0v1Tep9gClEzobaGKBHPbKhlJDEAB2zJz0bWsTMbSkhSHo2lHobTkvviqhLNpR4+bXhDkh6NpQamq2JGq0h8dlQ0E67498HGDjzqYQyG2re1sSEQJoNNfEpScD8O2KSNLRpi/Kl2/I2wqgY0ArG18mG2hhATKRsKGGjI39bSpKItDe0VZ+UbzRRs6Hm7Y42eDcE0A7ZUE1aJRtq3KJ8WHWSng2ljgG0S5KGDUX1yIZSb8eniwEhjW+zoeXYvaFRMW09wOTdEaR7Qwu9naq+bfOkPFU21LxUhMFGr4RqUy4lLb0mXHdM2ZiVnD5AgNFvS2kDzIsBQKLigGnYBZkmY2OALkRvSSlCkgtqJ2wMaDHIn5SfmJiILdJU6lE38ifls9lLyOVyccUaRy6XQzYb+69WVUGeDXWcuxgaGqIW27LQOaAwFKXTdPl+E7lNLI80GScBsNwoxNzu2GJNJD92g1wmeQy4eeognPGbccUaR37sBv49eYBcLsUQNAblb4n999dvGPlyd7TF6yiJLuIbI03uxBVAkI5mJ0unxdUiZcWopnEq3sMZypjE7+6MCoM8EVdGbAfcdeReSHmr3gaUhhhd4Uaed7wVV0hsBzx38MIlx5HLGcN3YBj1LaT2jIhGN4hRBjnocLFi24EL15qtjMVisVgsFovFYkke/wN2lGYVi4MNYQAAAABJRU5ErkJggg==">
                                                        {{-- <img src="{{asset('asset/home/icon-test.png')}}" alt="icon" class=""> --}}
                                                    </div>
                                                    <h4 class="fw-600 font-xsss mt-3 mb-0">Assesment</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="">
                                            <a href="{{route('cvIndex')}}" class="hover card w140 p-0 rounded-lg text-center border">
                                                <div class="card-body">
                                                    <div class="btn-round-xl">
                                                        <img style="width:50px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAADiklEQVR4nO3ay08TURQG8G+K0RpaEp5RQRBCJGAQg4kJCZGgibBRXLhxp0vXbvgnjEuXujRijMIKE6gJrFhheBgwioCQAAViW5IWbMcFj6QJtlN6mDPT+X7Ldjjc3K+9d07vAEREREREREReYkgW61sxLxsGXgK4ByAoWdsBogBGUib6B6uNOamiYgEcTP4kgDKpmg61bZpo+1RtLEsU80kUAYCDT36hTz4AlBoGXkgVEwsA+8uOV/RIFZIMoNDW/ExKpApJBkAnwACUMQBlDEAZA1DGAJQxAGVnNP95PBrDzOgYwgv7XX15XQ2auzpQXFaqOSxbqQUQj8Yw9votduPxo9fWvv/E1vIKbj99DH8woDU0W6kFMDM6ljb5h/biCcyGxtH+oNdSnbUfvzA1HEIitpPXePzBAFp7ulHVUJdXnVyp7QGHy85xNhaWLNeZ/vwl78kH9r+RU8OhvOvkypGbsOghhcOpBVBeV/Pf9yrqay3Xae3pFtkv/MEAWnvv5F0nV2p7QHNXB7aWV7AXT6S9fva8Hy3dnZbrVDXU4e6zJ9LDs43Yt/3hqmnm+jfxaAyzofGjNb+yvhYt3Z2uuAP6eMkQmTvVANxMKgBHbsJeorYHpJJJLE5OY/XbPKIbWwCAYGUZqluaUNt2Db6iIkt13N4HqCxBidgOJgaGENkIH/t+SVUFbj26j3OB4qy1Rl69QTwasz7QDPzBgOUN3bVLUCqZzDj5ABBZD2Pi/RBSyaSNI9NhewCLk9MZJ/9QZD2Mpa8zWa9jH5Cj1dn5nK690n494zVu7wNs/wbENrcsXxsNb57iSJzB9gD+7u6dyrVuxT5Amf0B5HLz5oGfRW0P4MLVRmsTawAXmxpPfTzabL8Lutln7aTLK7gHKGMAyhiAMgagjAEos/0uSOr3e2meeS5I6jkeaXwuyKNsD0Dq93tpWucBfCrihFx7JEnpGIAyBqDMM32A1n1+Np7pA7Tu87PhEqTMM32A1n1+NuwDToh9QIFgAMoYgDLP9AHZ8DxAGc8DPMozfUA2PA9wGfYBBYIBKGMAyjzTB/A84ADPA9JxCVLmmT6A5wEFhn1AgWAAyhiAMgagjAEokwwgKljL6f5IFZIMYESwlrOZGJYqJRZAykQ/gG2peg626TPxXKqYWACD1cacaaINwACAiFRdB4nAxDtfCjc+1Bi/tQdDRERERERE5E7/AC5ePAB7BS02AAAAAElFTkSuQmCC">
                                                        {{-- <img src="{{asset('asset/home/icon-cv.png')}}" alt="icon" class=""> --}}
                                                    </div>
                                                    <h4 class="fw-600 font-xsss mt-3 mb-0">CV Maker</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- tentang kami --}}
    <div class="feature-wrapper layer-after my-5 pt-lg--7 position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 order-lg-1 offset-lg-1">
                    <img src="{{asset('asset/logo/square.png')}}" alt="image" class="img-fluid">
                </div>

                <div class="col-lg-6 order-lg-2 offset-lg-1">
                    <h2 class="poppins text-mainblue fw-700 font-xl pb-3 mb-0 mt-3 d-block lh-3 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                        Selayang Pandang tentang Makin Mahir 
                    </h2>
                    <p class="fw-400 font-xss lh-28 text-grey-600 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">
                        Sudah mengirimkan lamaran kerja ratusan kali namun tidak ada yang diterima, pasti ada yang salah di CV, Interview atau minat karir Anda. Makin Mahir menjadi ruang yang tepat jadi <span class="text-primary fw-600">#TemanCariKerja</span> untuk jobseekers didampingi HR Specialist Recruiter dan Mentor Profesional. Nikmati beberapa fitur andalan Konsultasi Private, Assesment Test dan Event Edukasi Gratis. 
                    </p>
                </div>
            </div>
        </div>
        <div class="ornamen position-absolute top-0" style="left: -70px;">
            <img src="{{asset('asset/home/ornamen-circle-1.png')}}" alt="">
        </div>
    </div>


    {{-- why chose me --}}
    <div class="service-wrapper layer-after my-5 pt-lg--7 pt-5 position-relative">
        <div class="ornamen position-absolute top-0" style="right: -70px;">
            <img src="{{asset('asset/home/ornamen-1.png')}}" alt="">
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <h2 class="poppins text-mainblue fw-700 font-xl pb-3 mb-0 mt-3 d-block lh-3">Kenapa Memilih Konsultasi Bimbingan Karir di Makin Mahir ?</h2>
                    <p class="fw-300 font-xss lh-28 text-grey-600">Inilah beberapa hal yang menjadi keunikan kami dan kamu harus tahu
                    </p>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-6 col-12 border-no-1">
                        <div class="card shadow-none bg-transparent border-0 my-3 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <img alt="logo" style="width:70px" class="img-fluid rounded-lg" src="data:image/png;base64,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">
                                </div>
                                <div class="col-12 col-sm-8 pl-1">
                                    <h2 class="fw-600 text-grey-800 font-xss lh-3">Bimbingan Intens Sampai dapat Kerja</h2>
                                    <h6 class="font-xssss text-grey-600 fw-400 mt-0">Menyediakan berbagai ruang edukasi dan konsultasi yang dilakukan secara terjadwal, komunikasi dan bimbingan secara intens dilakukan melalui berbagai ruang sampai dapat kerja 
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 border-no-2">
                        <div class="card shadow-none bg-transparent border-0 my-3 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <img alt="logo" style="width:70px" class="img-fluid rounded-lg" src="data:image/png;base64,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">
                                </div>
                                <div class="col-12 col-sm-8 pl-1">
                                    <h2 class="fw-600 text-grey-800 font-xss lh-3">Mentor Profesional</h2>
                                    <h6 class="font-xssss text-grey-600 fw-400 mt-0">Kamu akan dibimbing oleh mentor profesional, sudah memiliki sertifikasi dan 
                                        berpengalaman di bidangnya selama 2 tahun lebih dari berbagai industri di Indonesia
                                        </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 border-no-3">
                        <div class="card shadow-none bg-transparent border-0 my-3 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <img alt="logo" style="width:70px" class="img-fluid rounded-lg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAT7UlEQVR4nO1ceZQcxX3+ftU9O7uzt3a1q9XB6uRFiIjDEqchYMDI4hLW0+JnJDBCliEvIYnzCO+R+AkfSYjz7MQQx+DHIQjEEJIA5jI2II5gIbADBgPWi8Sl1QGs7pV2Z6arfvmjr+qenp7u3hUkMJ9ea7qqq6q/31nVNT0L1FFHHXXU8WkF1WrQ/x8Pn0NEN4MwJfNdmO0P7TxQH1GXoc8gGKsHly97LDPPjwGidgu6aazKZzgK05XrHByuq9GHq/Rh5qkMvjkzz48JZq0GBEzNNLKjxCjvtU+5oi6uT6C+ep9pmbh+jKhpgNSISyuooXi9fox9/r9g/AxQw1PHpPjQ9Wp9GIBxxR8y8o1ArqEmV4ChDeadV3OeWv1C54Ok1Gr5o3+KnZPGboCkio+4nrZPheL1+iTeX1Ox+r0TKdkVwitq16cqopsBHBZHKbsBPpqVTaziq/aJ4Rs817y+mpIzGcQbr+aclN4ANZSYylMzzhdxfSIIRyizyn0C9dkigLVzrWFVpDNA3Momi+JD/cfSh6OMUCPlVPX6akpO5vURbaojmQHGsrLJoviI64kUn8KTx2mire714xYBzNkUr9ePoU+qtMXsH1X6BftmSzMVKSe2bTxqGiBKYR/VkjJTqqu4liRFaOcpjMORCj8EEeCfVvE6737JPTVWiWPpw5XcqvIYz4mWo9vWQqI5YNwUr9ePQ5+qxgrwG0OaifX6mH7h8xhkSkGxE2wWxev1Y0h1slQCqIqyDvVEGzgfzwgYr5VNFsWHrldTPABYxSKG334LIAMg+ggm2tr9xiUC7MGCSmTCI4MXffHcRH3HGcbXrtQsFToRBtg0AcPw66MUdygm2qgISID0KYi5rIT888R3GG/kGxGtTLKrTDNUny0C0k20hzICKgxAN24bGNhYs9+hgpEbBDnfUWSaaPXzWl4faut9jF8E1P5GTBuQmXexaf114tEPBQStBvNgpPI56pxjzt1B2fP6YMqJU752veLcvdU4RQD7wl67dWBgV80+hxDye3/3GP4PfvNFq654BODFQDLFu6gZAdoc8PrWvu5bM/L7xINZ/AkYJdYiIEkqqp2CmJW9ChJ/jNNPt8bI85OLW/95E4N/CMBPSQmQ5Ev566HU6OCKZevGRPDTAFn6FkRuOYCJABJFQM33gj4NeOKSKV3CLF4qQGeD6fcUczcYBjP2grGRmV5SpH76y1lDz113HVTsYCu/egWYf+SVb78lVsefegM8fXnPCoBvYEYHoGUP1hY33jRIbxCrb5/5r0P3VB1w2TIDLR2/BvgoMANrb/3oDfDkyp7PE+MaIfgYMNpB9lyjp8ZK4QBS+M4Zd3/4jUPBKQrPfLX7Ymb6FzBIX0nqyg8YwrmmGD9rQG7F6T/ZNhQ58CUrT4egpwAorL3ViGzjINlzQAo8vbLnTgP8uBD8ORA6ISBcMxMhaPJQmQV2jDefanh8RW8zM/0AHHLC0PzJ+qdTIGBRicsv/GzZxNmRg9952zow1gB0fS0eY46AX61Gbpi7vwJFK5gxH4R2ckYmd/SwZ+nnurcpvvKMu4duGiunODyzqmuuAp0tmD7LwFKg0sPDkRmVjpzzd0ylPnvGfTu3ZuUzJgOsu7z3SBJ8LxQf4RIkgaDyXUSEd+BTAcURHICk5Ysf+OCBsfCKwrOru/uUon8EY8CjFHDvzIZ4oavjw1MX/BjlLLwyp6BnL+86jkg9B8VHeJVhpZOWdmqYmhUAhWaA73nk/ImnZuUVhSdW9fTKEj3PCgPs7kZEKR+hOmjXolaUtrFOGNrVk3neymSAJ1b19CoS/4nQysHlSPpnwhizfP/Jg/DAg+f39GbhFgVh8Z1MmOHld+0w81SZFhGt9MhlvR0uVz+8tHdmJm6ZOin+W1aYwozKsIXmOXohBqoMsAz07TQY38zCLYynLum9AIzPe/twoaN9cg76tYAAiDCEbiS/tlGAv52FX2oDPLOqdwYxVuhepC/ZAuDaRlAWYJW0Jt44vOqh8zpj36tMAoa6Ws/p4aOlK4d8mxnwmooFA6INoTscgQceWzJpelp+qQ1gSV7KDDOcSwvtBrr68zBywifssosSAEC+xcSE6Y1o7jKiDGiQMi9Iy0/Hz788cQ6Ak6t5PzNg5HOYcVy7x7HCmaIMoVP125uK5NfSckz9bigpdXY4sffNa8KUo1ohhAGQgd1bitj+2304uKcE95slcsgbpkDH1AL6P9MOI08AS7CUeHvDfmx5ecQXjgEFLAZwY1qOHlfCUldhkfMRA42tDWjpbkTP4SW8/7v9dnWU8jlC6QjYCcT0ZQaupUSJ10ZqA7CimV7cMNDWl8PU+a0gYYKEASIDXTPy6J7ZAYBQHLZQHrW3TxpbTZiNAvZ3DApQEsz2EmnG8a3Yt8PC3q1ljz4BmSY2D4TTw4rSYTQItHQ1gQwTM0/uRWlYYteWg16HCuWHFhuBaLEbHPbwhT0n4P4P1ielmGUS7tVvetgxrSDDUb4wtXO73NTehLbeZrT1NqOhkAdRuK1TNkz0L2wOTuBAXwZ+AIB/WwYDjBMDqS+ksJ7ZLRBmDiRMGGYOcxf1o6u/tbbyQ+PowwvG2Wl4pjYAMxrcXFnoNtHclfcVKkwQGbaSyYDQDOEqWgj/OlHwWue0JrRMNDXhKJ+Wn4uO3MSZYLS6CgrnfmEQph49wYtaEgbMhhyOPGcmZpw0GcKgWOUHHEU3iOIz0/DMEgEH3Jt1T2+yH31dZZJwFC58zxbBiPDPnbYkQGQ47/MI9Mxq1IXbl4Gf3ZdpXmAhEDr6F3Yh35y3uQvhO4RhYPrCPhx/yZHomTMBhHhDBFaC9umx605LntozRABtc72oY3LeUaAAhHCM4QhTYQT93FW600cIb5zuWU26UINp+bkg4PBqq5/OwwqYfGSnzdVVfihaC50FHHnebBx/6Tz0ze+GYYpKQ0TPCU372nqOqMYrjPQRoLAJDOTyxE3tDY7CBQi+El2v9tOM4Ye6Hi2hviCBQmcOuUZitn1vc2p+Dljx1ChPbWrP4fDP9TqKpyAPh6PuSC3dzTjirOk4efU8zDp1MpracmGPr7iHUOr3k/JMbwDiV5mBQmfO8Vxnw8c7ROCg0BG+rvclIkAItPXmHSHpldT8XJrAlHAElCRj7lkTkWswnE0qd+dQ56sbxb+Wa2xA/4KJOGHl4Zi7qA9NHbnK7wzcImNWUp6pDUCM52EbwNnw9HfbvH+OEJVGcRXtCOr8C44BNPcYBAYEkHg5FwYzuoJLRGDdO6No6sz5O4QEz/B2JFLAaeDUeXydY9LcDixc3o+pR7VGLktJUeLlc2oDTDulsZEBNHWYAUGC288U+F9XNIXaAPoXNfZAhc4cSBDPurC5MS0/F8woeN4PYMteCxu2FQP3RUVJr43fRTRMwuw/6MLTW0cD84H9REaJ/7RDagPku3L/kO8QaGgW0N0ruFMYKMB74wzRbfy+9niFdoGmbqJCO9+Qlp8/Jhf0CFj3btG5TzAsvP/Z5cjOmzjKY+5qV2PsHS/uKGLj7rK2QiI7+hIiwzKUW5snGcg3C+1hxSXoC+EJxCpwBAUKtneHaigItEw1AEJ7en42FKPVjYAdwxLb9lu2T7Pzpp93KDAzGAreE7rLlZ06KKeP8vrpf0jkuW0jUMpWvi0KJ95KT78MJXqjeZJAQ8GOANdTKgTyhPA9ir3rIYE0zwMYDQVCy1QBAr2elp8LpdDu2nbz7rI9/dgSeI7AOj+lwCw1fi5/6VzT2mpORAQctBiDB6QfBSq542SZhF/NtQgI01egTcolyGAlHeL2J5QClArU2QcHDOQakExGvo3AwGtp+XlgNLk+8f4Baa93iPx7KS0ydb5RB0tASa29IwsrZ1xgcLjs+yGQ+Ak+/W4o0e0AloJ5kuslpBRACoD0VwUK9s+FSMF/8YA9g9nChIXSDAHscO6VCcSUY9hev6+oIAgQBLCSIBKOt9u7sQjxhcY3GLXS+wQrsJIQBBhEOGCxNpdR7KsoOlIboH9g868B9O19dM5OsJhA7OxoKkdCRSABLbdrSyTWUo0W9p6X+QLunLP8vcwbcc6tiGwGKCs4ioKnuMBKh+A7C5G3VmPPYVwjBCMD7Bt2xFKe8ynFiV92yPzHOpjVs6TkEg6t4yEAKA56U4UBNK8KhTuUBLF6JisvF5Zkzhn2jQUBhiAoZpTLZeRyun4YEAxAAGw/qwQXdO4ErXFlC6wkymULhiAY9vOj91Q8Kt2wqo3Mb0UIZX3Xz+VuDrWcI5g/vfqKPKvVawcI38/Ky8WIxcNuEOYFYBJgCsLg9qKtQJ2XdA5V5ai4bhth6/ZRmE5k5Ul4k3BRqj2J9ZhVwLbz3l3PSt5XoUxlQakyWJWhXPJuG2nZdarstLEqjcby3rbFm5/PysvFiMW/dSfhtryAKQBTAOtfGvaVWsG3DJb2OTvngWu6QZSF9S8dcMYlNBrkLQT3lFXiN8nH9Gpi6WBhJSvrzYDypU7UJq6kc3gCRrS1BdsoyVg9Fk4uJPO33RVua07AJIJJwBPPHsTQzpKnZCUdRctyVb6BNo4hhnaW8NR/HYApCKYAWnJ2BJQlY1dZ/lVSnmMyQM/A68NQ6hxW1ltBRWpkQx6lCx0K9U1s8qKuxZsyfwegY/VTux/bNSpfYSZ05Q3PU2VZ4cbbdqNYklDS8rl5vEo2N+dcV7rdxkKxZOGHt++GLLOd2ghodwywvVh++Du/2p/4R4xjfjm34/x33y5L6xRW8hWlEfUEchUvQ3VOW9vL5Ms5U53a+YV33hkrHx0FaZyytyTf63YMkBNAThC2bCnh+zftxGjRTntKWg6/ku/9nhOVNIeSKJUUbrxlF7ZsKXtjmoLQagi8P2q9tnv9nlRvcozb6+n86Oz8XqW+CfA1cHZEK99L1LYpvBURbugwjL+gxZuK48UljO+d1HHdm3uLX7AUH2cxYClAMjBtag7X/mk3zISrdksC1/9gCFsGyzDInlNMIpgGNsxpyj929Yt7Ur9MNu6/D/ifu2dwWwHI5+LbFcvAvoPAnIvfPiS/UYjC6rmFPgkcayl1TJn5GAU6es1f9s1sLQAtTfF9h0eA/QeBb/3N9rcM4pdzRK8IQ7xsSPz3j988uD0rp3EV/thfDM29a9vCNwAgZwJNeSCv/eUAKW3FjxSBsrNSvmjCS3NfO6/7d+PJIznf/XPv2jb/DcBexxfyQGPO/7G9ZQGjZeBg0d65OBR8x/ZnK69j8ZlT9p6pFC8H6CzFapJ7qWzZRy1IxW/OfeCD7azwCwLf9earPU/iOor/Hda48S17fJWyvXx4JH4Ia5z5ZoqAY57c3Q+FVQAuZeZp/m4y4yfvL0g11hdbN8D9dTrbD9DvKag7JPMtbw1Mfi8Lv1p8/S/TGfek5Hth6wZnDrPLzPwewJn5pjLA/Md3NAvkr2bia8BodPa+HSL2f/cOLUxFYEnzC87WhP8o75RLCnyTIfPf2LS8K9PS9JDwLazXeAbGK7HimwxOxzfxMvTon+/+CiG/mZnXsORGlgylnEM6h2KUKPm3iEU0QUkGO+OwZCip3HIDS1xlYXTj9LsGL008qM6X85sVqzUsuVHnOCa+of7slFlyAzNfZfHoxul3JOdbcw6Yt+6DFrNk3KakWqaHrv+dBAc89w3jKBxtbUh089fFUVCKwyHtj22XJ4GxdtrawUUlYa56/5JJB2ryHdX56mP7ZXYqUvOVHIiAsPxgTGJg7bTbBxeVjNp8YyNg/uM7esSIsU5ZvEz31IA3qeD53Q1XwEowt5cphzvEanDIk6qNqyR/ySyVnpp887buWnylsvlWjKWV2Smn4kurA32VVNX1IdWXRA2+QMwcMPvRnW2Nitcx41jngQmVObQypzKABdbz+Hr5OjTzcOTYB9CCv6c12EAn6p7jeWWUx9plBph+k2+Qp71z2YzAjmOAb8grY6ILYGCBrM33u7QGL+LEaK6hsrsgsRcV9JuREXnanj+bEblDGm0AZpr30ND9zLigUinRQoQJdWII58r7sFD9En28DQCwHVPwIp2EB7EUu3iCRr5aSvMF0Y2tGA9/eGX/+SByrU9HPDR0PxgXVOujjx11bQJ/iHPlv2MhV/J9gG2+NblWpiP32T/It5YB5t7/weUg3JJIQQGhkhGKVEykQat7MDEu+/CqGWtdvgzcEjtehWH8ciTXKoYKjx2toyid0WU7Hb6xBpj/+I7m0QNiMzH3RisvOuwqhY0WvrZiQsJXN/72gsrNmjAvJ0YP0GZi9EY5QU1DR5RTeXlo7BidbW/mhlmDX58WeNSrmH2K+8VFYO5VOomQgpIRiiAYSS5YjrsWMn7fMIoDzfvzBrPq5eg2oXKKuSzSyyvHS5EZ+oa5OADgjlgDSKWWJEoR4XKE8FW9vGa4IrqfxslOQ7xESmVUCOtxizN8xogMcKgme7R8irGkpgFY8oIohSX2nAgviDdoFUESGF8xL1SKRTXh03i57zRx94yeQyozgy5PoFzx2F1hAKW4O0UaqCCbKFzjBImJjoj5oUdJrunlNSMygaGSyB4eOywDgJ7aBpCcSzERphMkJFRYyIAgcQr1kWPFIcPHcA0ZqlpkJTFUSp4e39oGUGofGG1J0kC8F8QIEuPlMd4TCSVVpFemumdVw8TJF4ziWjwd7A1XVE7CEg8R88WJvTyBx0UJmcF7IpFgbyYi/aRzjrjUlAbM+Gm4rsIADcL6o2JJMIDzGWhLHK7QSEWWq3uPV84ApbItE7M8H4yB5z5mPJi3Gq6q8X1PHXXUUUcdddRRRx111FFHHXXUUUcdddRRxycU/wtUk7VXuNNhogAAAABJRU5ErkJggg==">
                                </div>
                                <div class="col-12 col-sm-8 pl-1">
                                    <h2 class="fw-600 text-grey-800 font-xss lh-3">Konsultasi 1 on 1</h2>
                                    <h6 class="font-xssss text-grey-600 fw-400 mt-0">Menyediakan ruang secara private untuk jobseekers melakukan sesi konsultasi untuk membuat cv, simulasi interview, psikotes dan membahas karir
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 border-no-4">
                        <div class="card shadow-none bg-transparent border-0 my-3 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <img alt="logo" style="width:70px" class="img-fluid rounded-lg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAGu0lEQVR4nO2dzW7jVBTH/3eSOG0S2kJbtaEfQ5FgM4gVC6R5BF6ABUJCSPMELJBmNezZMxvQsIAXGIkV4gnYIAESYmZoyVStaCn9SB3HH4eFneTavv5IfB3X7v1JaeNr58Q5f99zzr2+aQGFQqFQKBQKhUKhUCgUCsVtgcky9Gnv+w8cwmMAW7JsSqLHwB58vfPhD0WfiIg7sgw5hK9w85wPANsEelz0SUQhTQAA2xJtyWan6BOIQqYAihlQAhSMEqBg6rIM/bL/hyxTtwrVAwpGCVAwSoCCkZYDimJpsY2t1Q0AQO/0GJd6v+Azmo7S94Ct1Q00anU0anVsv7ZR9OlMTekFKDulF6B3egzTtmBaFnr/Hhd9OlNT+hxwqffxe+950acxM6XvAWVHCVAwSoCCKX0OUOOAglHjAEUmSi+AGgcUjBoHKDJR2h5AjgMybYAIoKLPZnZKKQCZNsi04BgWyLKLPp1MlE4Ash04QwvOtQnTuQ+b3gHQARgDYwAYwBhzl/wxeG0M955+Tm4bd5z7A8x7jbcJMIa1Lz/2ve/pZ9+CAT0Ce8KWlx/9/B4zZXye8glg2SDDhGnfh0nvw/Mv3DjkrbQkAo1EGL8QIMatxeQOH29ybYyFV20SsA3QQ7o4ZwAeyvg8N0KARa2JpVYHneYi6rU6GrUGAMC0TVi2hStDx4Xeh24MXOfaDiznHgACGPP7MsGxgJs2Qv4NGBEJMMahT1AFAVbaHWwur0FraML9zTsamg0N7YUWNpZXYZhDvDw8xNnlAA51Qk4MOXaUnBnnX76jgNwwxKk02h0rAEN36g8bQSECaPUGdte7aGkLU72u2dCws7aJJWj47aXbJnYswHxqeDsJIOY6/aO3lnC34/a0/SsT3z2/nLwRJQggkbkL0G4u4u7666jXajPbWNSa3JYb3N34PnG076r3DuPD0Mj5/HM+XFVSgM5CC3sb2/K+lACEY74gvgtjvtAWl1OqJoBWb2B3rSvV+cKYzwJPhW2CkVtAyHkJMLepiN31bqawE4ICT0m0g3c0jX+JBs4U3GDM/8iJuQiw0npl6oSbBAkcHXJiRFusXe8YxpjvkRdzCUGbK6u52U4b81PlAS4LVyYEtbSFyDo/M8EwlNhGgXDlt8U3V6YHLLU6+RgOJE3/XEPMtETodRGmq1IFtZtyYz/PeCTrboRHvEBiiRphuDoC1GuN5IMyIipHfRNvXhuvVchGYFqiMjlAaukpIrIc5dsE5WiErcleFnjkQ+4C5HXq5P/hNfLlqL8OTSxHA23zSsK5C2DZVj6Gg44VDW5TtoVMkECAnG575i7AMC8BeESj24RyNM7QqAriH3ndds5dgL6h52ZbHPNJ7GiiZCdyB1QmBF3ktlaTuDAUvtzjYn6a0BQWIJ8+kLsAujGAYQ7lG5415if4cSSmqAfE5Y9Zmctk3NF/p9JtJsZ8ErWl9GCVkjAAnF9f4jqnXJCpHI20hXkNA+Z3P+DgnyNYtuxFVBR27JSlZ9Dc6Je4Coq4mZCBuQkwtE3snxwiRS2SGlF8n64cjTJG4ipIvv/nuzi3P9Dx7LgnpyekmoIQHSy+BIJVU6VyAM/1QMefRwfoG4OZbeiGwW1FlaO+DIDwhpjkO2JylShkXdDQMvHs6ADLrQ42V9bQTHnDZmAOcXhyhLOTE/+0s9Q7Yu7TiKWJ/qluCRS6Mu78+grn11fjpYnt5iIatTrqNfe0LNuCaVvoD3Sc61cYDA04OjemSDHtHLloKwhhvGgLiLkf4L2nLG7E2lB9aEAfGskH8gSufNexCKsRsWgr0XRAALH97JT4GzJ8xI+flhhvTlWOBgYCorGFBG5ED8iK8I4Y4hdthWyMdnvGYifgJOaAEvcAj1nL0Qhb44FwVBVU1oGYbETOzlSOJs6GlngyLhc8BSYXd9g7094R422LB2KyM0CZBeDJMgXBHcVP7FXmjlieJMd8rjWNCjGTcfH2Z6fUAoTCUEI5GqdBKDRFrY6W3BUqUYaOSDUFkTCSHZWjwjI0h9GYNAHevfu2LFOp+PGnQIPIL6EpiNF21GU8GS2HBBBNe0ig3CEISXkgoRyNNBi/KkJmOVp6AYTlaIqYLzTFHRdZBUnOwqUVoKkJVlpElKOithfnk9e/uDB9aomrIOJt9SR8BAByk3APc/w/Mt3uMf7a5/41TIrZUQKBeYH8m1/PEPz7EPx3CEQ5YJJP2BNZn0NaD2BgDyDxykjizb197L1xgIUFQxCTU5ajoQ0k3RH7m4AvGquvPpLxGRQKhUKhUCgUCoVCoVAoFLeL/wGwuv9qpJyOZwAAAABJRU5ErkJggg==">
                                </div>
                                <div class="col-12 col-sm-8 pl-1">
                                    <h2 class="fw-600 text-grey-800 font-xss lh-3">Transaksi Mudah
                                    </h2>
                                    <h6 class="font-xssss text-grey-600 fw-400 mt-0">Menyediakan berbagai pilihan platform pembayaran sehingga mempermudah transaksi pengguna dan tidak pakai ribet</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 border-no-5">
                        <div class="card shadow-none bg-transparent border-0 my-3 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <img alt="logo" style="width:70px" class="img-fluid rounded-lg" src="data:image/png;base64,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">
                                </div>
                                <div class="col-12 col-sm-8 pl-1">
                                    <h2 class="fw-600 text-grey-800 font-xss lh-3">Terjangkau</h2>
                                    <h6 class="font-xssss text-grey-600 fw-400 mt-0">Menyediakan berbagai produk dan fitur yang bisa dijangkau oleh semua orang, nikmati layanan gratis dan konsultasi dengan harga terjangkau 
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 border-no-6">
                        <div class="card shadow-none bg-transparent border-0 my-3 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <img alt="logo" style="width:70px" class="img-fluid rounded-lg" src="data:image/png;base64,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">
                                </div>
                                <div class="col-12 col-sm-8 pl-1">
                                    <h2 class="fw-600 text-grey-800 font-xss lh-3">Persiapan Karir Lebih Matang</h2>
                                    <h6 class="font-xssss text-grey-600 fw-400 mt-0">Membantu jobseekers dalam membuat CV, Interview sampai mencari pekerjaan cocok melalui fitur Assesment
                                        </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ornamen position-absolute " style="left: -70px;">
            <img src="{{asset('asset/home/ornamen-1.png')}}" alt="">
        </div>
    </div>

    <div class="spacer"></div>

    {{-- Testomoni --}}
    <div class="feedback-wrapper layer-after pb-lg--7 pb-5 position-relative">
        <div class="ornamen position-absolute top-0 right-0">
            <img src="{{asset('asset/home/ornamen-2.png')}}" alt="">
        </div>
        <div class="ornamen position-absolute" style="right: 10%; top: 20%;">
            <img src="{{asset('asset/home/ornamen-3.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
                    <h2 class="text-mainblue fw-600 font-lg pb-3 mb-0 mt-3 d-block lh-3">Testimoni Mereka</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="loop owl-carousel owl-theme owl-loaded owl-drag">
                       
                    <div class="owl-items text-center my-5">
                        <div class="card w-100 p-4 p-md--5 text-left border shadow-xs rounded-lg">
                            <div class="card-body pl-0 pt-0">
                    
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Ibnu Hari Winartomo</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-600">Universitas Budi Luhur</h5>
                            </div>
                            <p class="font-xsss fw-400 text-grey-600 lh-28 mt-0 mb-0 ">
                                “ Setelah mengikuti kelas konsul ini saya jadi lebih paham cara membuat CV untuk membuat personal branding lebih menonjol dibandingkan kandidat lain. Selain itu masukan dari kak Aldino terkait portofolio sangat membantu saya.”
                            </p>
                        </div>
                    </div>

                    <div class="owl-items text-center my-5">
                        <div class="card w-100 p-4 p-md--5 text-left border shadow-xs rounded-lg">
                            <div class="card-body pl-0 pt-0">
                    
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Dalil AF</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-600">ISI Denpasar, Bali</h5>
                            </div>
                            <p class="font-xsss fw-400 text-grey-600 lh-28 mt-0 mb-0 ">
                                “Insighfull banget yah, jadi pikiran yang sebelumnya menurut saya sudah benar ternyata menurut HR ini kurang tepat. Jadi kelas bedah CV ini sangat membantu saya”
                            </p>
                        </div>
                    </div>

                    <div class="owl-items text-center my-5">
                        <div class="card w-100 p-4 p-md--5 text-left border shadow-xs rounded-lg">
                            <div class="card-body pl-0 pt-0">
                    
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Veronica Yolanda</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-600">UII Yogyakarta</h5>
                            </div>
                            <p class="font-xsss fw-400 text-grey-600 lh-28 mt-0 mb-0 ">“Saya jadi paham terkait pembuatan CV, baik yang ATS ataupun CV Kreatif. Terimakasih Makin Mahir”</p>
                        </div>
                    </div>

                    <div class="owl-items text-center my-5">
                        <div class="card w-100 p-4 p-md--5 text-left border shadow-xs rounded-lg">
                            <div class="card-body pl-0 pt-0">
                    
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Enzy Diwantama</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-600">Universitas Padjajaran</h5>
                            </div>
                            <p class="font-xsss fw-400 text-grey-600 lh-28 mt-0 mb-0 ">“Sangat membantu banget kak, dulu saat melakukan proses interview jawabnya sesuai dengan pemikiran saya saja, ternyata pemikirian saya gak semuanya itu benar. Dan setelah mengikuti arahan kelas private ini sangat membantu saya kedepannya”</p>
                        </div>
                    </div>

                    <div class="owl-items text-center my-5">
                        <div class="card w-100 p-4 p-md--5 text-left border shadow-xs rounded-lg">
                            <div class="card-body pl-0 pt-0">
                    
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Amelia Nofiani</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-600">Universitas Pekalongan</h5>
                            </div>
                            <p class="font-xsss fw-400 text-grey-600 lh-28 mt-0 mb-0 ">“Sangat bermanfaat kak menurut saya, dari program ini akhirnya saya bisa dapat ilmu tentang membuat cv yang benar, cara mengatasi agar tdk grogi saat interview dll.. semoga dengan program ini saya bisa mengubah diri saya supaya menjadi lebih baik lagi karena selama saya melamar pekerjaan kendalanya jika setelah interview terkadang tdk ada kabar lagi kak”</p>
                        </div>
                    </div>

                    <div class="owl-items text-center my-5">
                        <div class="card w-100 p-4 p-md--5 text-left border shadow-xs rounded-lg">
                            <div class="card-body pl-0 pt-0">
                    
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Arianto Sutomo</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-600">Institute Pertanian Bogor , 25+ IT Infrastucture</h5>
                            </div>
                            <p class="font-xsss fw-400 text-grey-600 lh-28 mt-0 mb-0 ">“Event di Makin Mahir sangat bermanfaat, bisa di ikuti dari mana pun, mudah di pahami dan menarik topik- topiknya.”</p>
                        </div>
                    </div>

                    <div class="owl-items text-center my-5">
                        <div class="card w-100 p-4 p-md--5 text-left border shadow-xs rounded-lg">
                            <div class="card-body pl-0 pt-0">
                    
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Deni Andrean</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-600">Politeknik Negeri Lampung , Analis Labolatorium</h5>
                            </div>
                            <p class="font-xsss fw-400 text-grey-600 lh-28 mt-0 mb-0 ">“Intinya sejak selesai ikut seminar dulu itu dan banyak masukan di bedah cv, atas dasar kritik di bedah cv dulu akhirnya saya rombaklah itu cv, ada perbedaan antara sebelum & sesudah dirombak, salah satunya perbandingan antara kirim lamaran kerja dengan dipanggil wawancara cukup meningkat”</p>
                        </div>
                    </div>

                    <div class="owl-items text-center my-5">
                        <div class="card w-100 p-4 p-md--5 text-left border shadow-xs rounded-lg">
                            <div class="card-body pl-0 pt-0">
                    
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Corina</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-600"></h5>
                            </div>
                            <p class="font-xsss fw-400 text-grey-600 lh-28 mt-0 mb-0 ">“Untuk materi yg diberikan oleh makin mahir sudah sesuai dan menjawab permasalahan dari para fresh graduate mengenai cv yg tepat utk diajukan saat melamar pekerjaan. pemateri yg membawakan materi jg handal dan terlihat sangat mendalami materi serta memiliki pembawaan yg baik sehingga mudah dimengerti”</p>
                        </div>
                    </div>

                    <div class="owl-items text-center my-5">
                        <div class="card w-100 p-4 p-md--5 text-left border shadow-xs rounded-lg">
                            <div class="card-body pl-0 pt-0">
                    
                                <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">Ericha</h4>    
                                <h5 class="font-xssss fw-500 mb-1 text-grey-600">Universitas Semarang</h5>
                            </div>
                            <p class="font-xsss fw-400 text-grey-600 lh-28 mt-0 mb-0 ">“Saya sangat terbantu sekali dengan adanya Webinar kemarin kak , saya lebih bisa memahami bagaimana perkembangan antr CV ats maupun kreatif ..Dan juga sangat membantu dalam melihat yg di perlukan di perusahaan menengah, atas dll .

                                Terimakasih telah menyelenggarakan kegiatan webinar ini, mohon selanjutnya diadakan kembali webinar spt ini entah membahas tntg interview atau tes yg lain yg berkaitan dg rekrutmen kerja untuk menambah wawasan
                                ”</p>
                        </div>
                    </div>
                    
                </div>
            </div>

           
        </div>
    </div>

    {{-- CTA --}}
    <div class="subscribe-wrapper pt-3 pt-lg--7 pb-3 pb-lg--5 position-relative">
        <div class="row">
            <div class="col-12">
                <div class="card w-100 p-4 p-lg--5 rounded-xxl bg-current border-0 position-relative">
                    <div class="ornamen position-absolute top-0" style="left: -70px;">
                        <img src="{{asset('asset/home/ornamen-circle-1.png')}}" alt="">
                    </div>
                    <div class="container py-1">
                        <div class="row ">
                            <div class="col-lg-7 text-left">
                                <h2 class="fw-600 text-white font-xl font-md-xs lh-3 mb-2 ">Jika Ada Pertanyaan Tim Kami siap Memberi pelayanan yang Terbaik</h2>
                            </div>

                            <div class="col-12 text-center mt-3 position-relative" style="z-index: 3;">
                                <div>
                                    <a href="https://wa.me/+6289619119692" class="btn border-0 p-2 px-4 text-primary fw-600 rounded-md font-xssss bg-white mt-3">Hubungi Kami</a>
                                </div>
                            </div>

                            <div class="col-md-4 col-10 mt-5 mt-sm-0 p-0 align-items-center justify-content-end d-md-flex position-absolute bottom-0 right-0">
                                <div class="card w-100 border-0 bg-transparent text-center d-block">
                                    <img src="{{asset('asset/home/call-banner.png')}}" style="filter: opacity(0.2);"  alt="app-bg" class="w-100 d-lg-block" >    
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    var owl = $('.owl-carousel');
    
    // owl.owlCarousel({
    //     items:3,
    //     loop:true,
    //     center:true, 
    //     margin:15,
    //     autoplay:true,
    //     autoplayTimeout:3000,
    // });

    $('.loop-home').owlCarousel({
        items:5,
        
        margin:7,
        loop:false,
        responsive:{
            0:{
                items:4,
            },
            600:{
                items:2,
            },
            1200:{
                items:3,
            }
        }
    });

    $('.loop').owlCarousel({
        center: true,
        items:3,
        loop:true,
        margin:50,
        autoplay:true,  
        dots:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1200:{
                items:3,
            }
        }
    });

    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 1000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 250;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0 solid #fff}";
        document.body.appendChild(css);
    };
</script>
   
    
    

@endsection