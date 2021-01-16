<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
      #tblPegawai_wrapper{
          width: 100%
      }
  </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="index3.html" class="brand-link">
            <img src="{{url('/dashboard/dist/img/logo_baba.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="{{url('/dashboard/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">Afif Dharmawan</a>
              </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Data Master
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{URL::to('/pegawai')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pegawai</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{URL::to('/blog')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Blog</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Simple Link
                      <span class="right badge badge-danger">New</span>
                    </p>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>

    @yield('content')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dashboard/dist/js/adminlte.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function() {
        $('#tblPegawai').DataTable();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        getDataTable()
        getDataModal()
    });



    //GetDataTable
    function getDataTable(){
      let type = "GET";
      let ajaxurl = 'pegawai/data';
      $.ajax({
          type: type,
          url: ajaxurl,
          success: function (data) {
            //Untuk menghapus datatable
            $('#tblPegawai').DataTable().clear().destroy();

            //untuk menaruh view dari controller ke html
            $('#tbbody').html(data)

            //Untuk inisialis ulang datatable
            $('#tblPegawai').DataTable({
                "order": [[ 0, "desc" ]]
            });
          },
          error: function (data) {
              console.log(data)
          }
      });
    }

    //GetDataModal
    function getDataModal(){
      let type = "GET";
      let ajaxurl = 'pegawai/modal';
      $.ajax({
          type: type,
          url: ajaxurl,
          success: function (data) {
            //Untuk bersihin tampilan modal yang ada
            $('#modalPlace').html("")

            //Untuk ambil ulang modal yang ada di views
            $('#modalPlace').html(data)
            // alert(data);
          },
          error: function (data) {
            console.log(data)
          }
      });
    }

    // CREATE
    $("#myForm").submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let type = "POST";
        let ajaxurl = '/pegawai/store';

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
              if(data!=null){
                // alert("Data berhasil ditambahkan")
                getDataTable()
                getDataModal()

                Swal.fire('Sukses', 'Data berhasil di tambahkan !', 'success');
                $('#myForm').trigger("reset");
                $('#exampleModal').modal('hide')
              }

            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    //EDIT
    function editData(idData){

        var form = $('#myFormEdit'+idData)[0]
        let formData = new FormData(form)
        console.log(formData)

        $.ajax({
            type: 'POST',
            url: '/pegawai/update',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
              if(data!=null){
                getDataTable()
                getDataModal()
                swal.fire("Sukses", "Data berhasil di edit !", "success");

                $('#myFormEdit').trigger("reset");
                $('#editModal'+idData).modal('hide')
              }

            },
            error: function (data) {
                // alert("error")
                console.log(data)
            }
        });
    }

    //DELETE
    function deleteData(idData){
      $.ajax({
          type: "GET",
          url: '/pegawai/hapus/'+idData,
          success: function (data) {
            // alert("Data telah dihapus")

            getDataTable()
            getDataModal()

            swal.fire("Sukses", "Data berhasil di hapus !", "success");
            $('#myFormDelete'+idData).trigger("reset");
            $('#hapusModal'+idData).modal('hide')
          },
          error: function (data) {
            console.log('Error:', data);
          }
      });

    }

</script>
</body>
</html>
