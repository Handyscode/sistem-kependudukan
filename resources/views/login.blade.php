@extends('layout/master')
@section('title', 'Aplikasi Sistem Kependudukan | Login')
@section('content')
<section class="login-sistem">
  <main class="form-signin w-100 m-auto text-center">
    <form action="" method="POST">
      @csrf
      <img class="mb-4" src="{{ asset('img/logo_pemkot_serang.svg') }}" alt="" width="72" height="57">
      <h1 class="h5 mb-3 fw-normal">Sistem Informasi Kependudukan Kelurahan Serang</h1>
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="form-floating">
        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror rounded-bottom-0" id="nik" placeholder="NIK">
        @error('nik')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        <label for="nik">NIK</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        <label for="password">Password</label>
      </div>
  
      <div class="d-flex align-items-center justify-content-between mt-3">
        <button class="w-100 btn btn-lg btn-primary me-3" type="submit">Login</button>
        <a href="/registrasi" class="w-100 btn btn-lg btn-secondary">Registrasi</a>
      </div>
    </form>
  </main>
</section>
@stop

@section('script')
@stop