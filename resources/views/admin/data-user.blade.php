@extends('layout/master')
@section('title', 'Aplikasi Sistem Kependudukan | Dashboard Admin')
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
              <h1 class="h3 mb-2 text-gray-800">Data User</h1>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>ID User</th>
                          <th>NIK</th>
                          <th>Email</th>
                          <th>Nama</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>ID User</th>
                          <th>NIK</th>
                          <th>Email</th>
                          <th>Nama</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($users as $user)
                          <tr class="text-center align-middle h-100">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->id_user }}</td>
                            <td>{{ $user->nik }}</td>
                            <td>{{ $user->email ? $user->email : '-' }}</td>
                            <td>{{ ucwords($user->name) }}</td>
                            <td>{{ $user->role }}</td>  
                            <td>
                              <div class="actionBtn d-flex align-items-center justify-content-center">
                                <div class="deleteBtn ms-2">
                                  <form action="/data-user/delete/{{ $user->id_user }}" method="post" id="deleteForm">
                                    @csrf
                                    <a href="#" class="btn btn-danger text-white" onclick="deleteBtn()"><i class="fa-solid fa-trash"></i></a>
                                  </form>
                                </div>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
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
    <script src="sweetalert2.all.min.js"></script>
    <script>
      function deleteBtn() {
        Swal.fire({
          title: 'Anda yakin ingin menghapus data?',
          text: "Data yang telah dihapus tidak dapat diubah kembali!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#e74a3b',
          cancelButtonColor: '#858796',
          cancelButtonText: 'Batal',
          confirmButtonText: 'Hapus Data'
        }).then((result) => {
          if (result.isConfirmed) {
            form = document.querySelector('#deleteForm')
            form.submit()
          }
        })
      }
    </script>
@stop
