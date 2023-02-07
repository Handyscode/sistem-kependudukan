@extends('layout/master')
@section('title', 'Aplikasi Sistem Kependudukan | Dashboard User')
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
              <h1 class="h3 mb-2 text-gray-800">Data Saya</h1>
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
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Penduduk</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIK</th>
                          <th>No.KK</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>RT</th>
                          <th>RW</th>
                          <th>Foto KTP</th>
                          <th>Foto KK</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>NIK</th>
                          <th>No.KK</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>RT</th>
                          <th>RW</th>
                          <th>Foto KTP</th>
                          <th>Foto KK</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($penduduks as $penduduk)
                          <tr class="text-center align-middle h-100">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penduduk->nik }}</td>
                            <td>{{ $penduduk->no_kk }}</td>
                            <td>{{ $penduduk->nama }}</td>
                            <td>{{ $penduduk->jenis_kelamin }}</td>
                            <td>{{ $penduduk->alamat }}</td>
                            <td>{{ $penduduk->rt }}</td>
                            <td>{{ $penduduk->rw }}</td>
                            <td><img src="{{ asset('storage/' . $penduduk->foto_ktp) }}" width="75"></td>
                            <td><img src="{{ asset('storage/' . $penduduk->foto_kk) }}" width="75"></td>
                            <td>
                              @if ($penduduk->status == 'verified')
                              <p class="text-success mb-0"><i class="fas fa-check fa-2xl me-2"></i></p>
                              @elseif($penduduk->status == 'proses')
                              <p class="text-info mb-0"><i class="fa-solid fa-spinner fa-2xl me-2"></i></p>
                              @else
                              <p class="text-danger mb-0"><i class="fa-solid fa-times fa-2xl me-2"></i></p>
                              @endif
                            </td>
                            <td>
                              <div class="actionBtn d-flex align-items-center justify-content-center">
                                @if ($penduduk->status == 'proses')
                                  <div class="editBtn">
                                    <a href="/dashboard/edit/{{ $penduduk->id_penduduk }}" class="btn btn-primary text-decoration-none text-white"><i class="fa-solid fa-pencil"></i></a>
                                  </div>
                                @else
                                  -
                                @endif
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="keterangan mt-3">
                    <h5 class="fw-bold">Keterangan Status</h5>
                    <p class="text-success mt-3"><i class="fas fa-check fa-lg"></i> = Terverifikasi</p>
                    <p class="text-info"><i class="fas fa-spinner fa-lg"></i> = Proses Verifikasi</p>
                    <p class="text-danger"><i class="fas fa-times fa-lg me-2"></i> = Data Tidak Sesuai</p>
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
@stop
