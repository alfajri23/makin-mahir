@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 col-md-6">
            
                <div>
                    <div class="text-center">

                        <img src="https://img.icons8.com/fluency/96/000000/why-us-female.png"/>
                        <h3 class="fw-bold mt-3">Lupa Password Anda ?</h3>
                    </div>
                    
                    <h5 class="mt-5 pt-4">Ikuti langkah berikut</h5>
                    <ul class="ps-0">
                        <ol>1. Masukkan email Anda yang sudah terdaftar</ol>
                        <ol>2. Klik Reset Password</ol>
                        <ol>3. Cek email Anda, kami akan mengirim link untuk mereset password Anda</ol>
                        <ol>4. Isikan password baru Anda</ol>
                    </ul>
                </div>

                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        

                        <div class="my-3">
                            <label for="email" class="text-md-end">Masukkan Email Anda</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>
@endsection
