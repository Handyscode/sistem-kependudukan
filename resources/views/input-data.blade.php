@extends('layout/master')
@section('title', 'Aplikasi Sistem Kependudukan | Input Data')
@section('content')
  <!-- Page Wrapper -->
  <div id="wrapper">
    <x-sidebar-component></x-sidebar-component>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
      <x-topbar-component></x-topbar-component>
          <!-- Main Content -->
          <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">
              <!-- Page Heading -->
              <h1 class="h3 mb-4 text-gray-800">Input Data</h1>

              <!-- Basic Card Example -->
              <div class="row">
                <div class="col-8">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Input Data Penduduk</h6>
                    </div>
                    <div class="card-body">
                      <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                          <div class="col-md-6">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" required maxlength="16">
                            @error('nik')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-md-6">
                            <label for="no_kk" class="form-label">No KK</label>
                            <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" required maxlength="16">
                            @error('no_kk')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-md-12">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" required>
                            @error('nama')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-md-4">
                            <label for="inputAddress2" class="form-label">Jenis Kelamin</label>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                              <div class="form-check">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="lakiLaki" value="L" required>
                                <label class="form-check-label" for="lakiLaki">
                                  Laki - Laki
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="perempuan" value="P" required>
                                <label class="form-check-label" for="perempuan">
                                  Perempuan
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" required>
                            @error('alamat')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-md-3">
                            <label for="rt" class="form-label">RT</label>
                            <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt" required placeholder="000" maxlength="3" minlength="3">
                            @error('rt')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-md-3">
                            <label for="rw" class="form-label">RW</label>
                            <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw" id="rw" required placeholder="000" maxlength="3" minlength="3">
                            @error('rw')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-md-12">
                            <label for="fotoKTP" class="form-label">Foto KTP</label>
                            <input class="form-control @error('foto_ktp') is-invalid @enderror" type="file" name="foto_ktp" id="fotoKTP" onchange="readKTP(this)" required>
                            @error('foto_ktp')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                            <div class="img-preview mt-2">
                              <div class="title">
                                <p class="text-secondary mb-0">Preview:</p>
                              </div>
                              <div class="border border-secondary p-2" style="width: max-content;">
                                <img src="" width="100" class="preview" id="previewKTP">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <label for="fotoKK" class="form-label">Foto KK</label>
                            <input class="form-control @error('foto_kk') is-invalid @enderror" type="file" name="foto_kk" id="fotoKK" onchange="readKK(this)" required>
                            @error('foto_kk')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                            <div class="img-preview mt-2">
                              <div class="title">
                                <p class="text-secondary mb-0">Preview:</p>
                              </div>
                              <div class="border border-secondary p-2" style="width: max-content;">
                                <img src="" width="100" class="preview" id="previewKK">
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end">
                              <button type="submit" class="btn btn-primary">Upload Data</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.container-fluid -->
          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                      <span>Copyright &copy; Kelurahan Serang 2023</span>
                  </div>
              </div>
          </footer>
          <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
@stop

@section('script')
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>

    <script>
      function readKTP(input) {
       if (input.files && input.files[0]) {
         var reader = new FileReader();
 
         reader.onload = function (e) {
           $('#previewKTP')
           .attr('src', e.target.result);
         };
 
         reader.readAsDataURL(input.files[0]);
       }
     }
 
      function readKK(input) {
       if (input.files && input.files[0]) {
         var reader = new FileReader();
 
         reader.onload = function (e) {
           $('#previewKK')
           .attr('src', e.target.result);
         };
 
         reader.readAsDataURL(input.files[0]);
       }
     }
     </script>
@stop
