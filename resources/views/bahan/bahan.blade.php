<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    @include('template.header')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('template.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Bahan Baku</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>
        
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">List Data Category</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="col-5">Nama</th>
                                                <th class="col-7">Olah Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($kategori) && $kategori->count())
                                                @foreach ($kategori as $key => $data)
                                                    <tr>
                                                        <td>{{ $kategori->firstItem() + $key }}</td>
                                                        <td>
                                                            {{ $data->nama_kategori }}
                                                        </td>
                                                        <td>
                                                            <div class="px3">
                                                                <a href="{{ route('kategori.edit', $data->id) }}"
                                                                    class="btn btn-primary btn-sm col-2"><i
                                                                        class="nav-icon fas fa-solid fa-pen-to-square"></i>
                                                                    Edit
                                                                </a>
                                                                <a href="{{ route('kategori.delete', ['id' => $data->id]) }}"
                                                                    class="btn btn-danger btn-sm col-2"
                                                                    onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i
                                                                        class="nav-icon fas fa-solid fa-trash"></i>
                                                                    Delete
                                                                </a>
                                                                <form id="delete-form"
                                                                    action="{{ route('kategori.delete', ['id' => $data->id]) }}"
                                                                    method="POST" style="display: none;">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td>Tidak ada Data</td>
                                                    <td>Tidak ada Data</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            {{-- <div class="row">{{ $kategori->links() }}</div> --}}
                                            
                                            @if (session()->has('successDelete'))
                                                <div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">&times;</button>
                                                    <i class="icon fas fa-check"></i>
                                                    {{ session()->get('successDelete') }}
                                                </div>
                                            @endif
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
              <!-- /.container-fluid -->
            </section>
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
            @include('template.footer')
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @include('template.script')

</body>

</html>
