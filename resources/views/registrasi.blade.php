@extends('layout/master')
@section('title', 'Aplikasi Sistem Kependudukan | Registrasi')
@section('content')
<section class="registrasi-sistem">
  <main class="form-signin w-100 m-auto text-center">
    <form action="" method="POST">
      @csrf
      <img class="mb-4" src="{{ asset('img/logo_pemkot_serang.svg') }}" alt="" width="72" height="57">
      <h1 class="h5 mb-3 fw-normal">Sistem Informasi Kependudukan Kelurahan Serang</h1>

      <div class="form-floating">
        <input type="text" name="nik" class="form-control rounded-bottom-0 @error('nik') is-invalid @enderror" id="nik" placeholder="NIK" required maxlength="16" value="{{ old('nik') }}">
        @error('nik')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
        <label for="nik">NIK</label>
      </div>
      <div class="form-floating">
        <input type="text" name="fullname" class="form-control rounded-0 @error('fullname') is-invalid @enderror" id="fullname" placeholder="Nama Lengkap" required value="{{ old('fullname') }}">
        @error('fullname')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
        <label for="nik">Nama Lengkap</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Buat Password" required>
        @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
        <label for="password">Buat Password</label>
      </div>
  
      <div class="d-flex align-items-center justify-content-between mt-3">
        <button class="w-100 btn btn-lg btn-primary me-3" type="submit">Registrasi</button>
        <a href="/" class="w-100 btn btn-lg btn-secondary">Login</a>
      </div>
    </form>
  </main>
</section>
@stop

@section('script')
@stop