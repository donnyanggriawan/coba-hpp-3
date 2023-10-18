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
                            <h1>Menu</h1>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">List Data Bahan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th class="col1">No</th>
                                                <th class="col2">Kode Menu</th>
                                                <th class="col3">Nama Menu</th>
                                                <th class="col2">Kategori</th>
                                                <th class="col3">Keterangan</th>
                                                <th class="col4">Olah Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($menus) && $menus->count())
                                                @foreach ($menus as $key => $data)
                                                    <tr>
                                                        <td>{{ $menus->firstItem() + $key }}</td>
                                                        <td>
                                                            {{ $data->kd_menu }}
                                                        </td>
                                                        <td>
                                                            {{ $data->nama_menu }}
                                                        </td>
                                                        <td>
                                                            {{ $data->kategori->nama_kategori }}
                                                        </td>
                                                        <td>
                                                            {{ $data->keterangan }}
                                                        </td>
                                                        <td>
                                                            <div class="px3">
                                                                <a
                                                                    href="{{ route('menu.edit', $data->id) }}"class="btn btn-primary btnku"><i
                                                                        class="fas fa-edit"></i></a>
                                                                <a href="{{ route('menu.delete', $data->id) }}"
                                                                    class="btn btn-danger btnku"
                                                                    onclick="return confirm('are u sure?')"><i
                                                                        class="fas fa-trash"></i></a>
                                                                {{-- <form
                                                                    action="{{ route('menu.delete', $data->id) }}"
                                                                    method="post" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="button"
                                                                        class="btn btn-danger"
                                                                        onclick="return confirm('Are u Sure?')"><i
                                                                            class="fas fa-trash"></i></button>
                                                                </form> --}}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td>Tidak ada Data</td>
                                                    <td>Tidak ada Data</td>
                                                    <td>Tidak ada Data</td>
                                                    <td>Tidak ada Data</td>
                                                    <td>Tidak ada Data</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                        <tfoot>

                                            @if (session()->has('success'))
                                                <div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">&times;</button>
                                                    <i class="icon fas fa-check"></i>
                                                    {{ session()->get('success') }}
                                                </div>
                                            @elseif (session()->has('successUpdate'))
                                                <div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">&times;</button>
                                                    <i class="icon fas fa-check"></i>
                                                    {{ session()->get('successUpdate') }}
                                                </div>
                                            @endif
                                        </tfoot>

                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('menu.tambah') }}">
                                        <button type="submit" class="btn btn-secondary">Tambah</button>
                                    </a>
                                    <div class="float-sm-right">{{ $menus->links() }}</div>
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
