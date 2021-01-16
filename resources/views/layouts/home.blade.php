@extends('layouts.master')

@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Pegawai</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
              @if (session('sukses'))
              <div class="alert alert-success" role="alert">
              {{session('sukses')}}
              </div>
              @endif
              <div class="col-12">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#exampleModal">
                      Tambah Data Pegawai
                  </button>
              </div>
              <table id="tblPegawai" class="display" style="width:100%">
                  <thead>
                      <tr class="bg-info">
                          <th>No</th>
                          <th>Nama</th>
                          <th>No Telp</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody id="tbbody">
                      {{-- Table body --}}
                  </tbody>
              </table>
          </div>

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Afif Dharmawan
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="myForm" method="post" enctype="multipart/form-data">
                  {{ csrf_field()}}
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pegawai</label>
                      <input type="text" name="nama" class="form-control" id="input-nama"
                      aria-describedby="emailHelp" placeholder="Masukkan Nama Pegawai">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">No Telepon</label>
                      <input type="text" name="notelp" class="form-control" id="input-notelp" placeholder="Masukkan No Telepon Pegawai">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="email" name="email" class="form-control" id="input-email" placeholder="Masukkan Email Pegawai">
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlTextarea1">Alamat Pegawai</label>
                      <textarea class="form-control" name="alamat" id="input-alamat" rows="3" placeholder="Masukkan Alamat Pegawai"></textarea>
                  </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" id="save-btn" class="btn btn-primary">Simpan Data Pegawai</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <div id="modalPlace">
      {{-- Modal edit dan hapus --}}
  </div>

@endsection
