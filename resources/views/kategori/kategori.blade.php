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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Kategori</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- jquery validation -->
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">Tambah Kategori</h3>
                                    </div>
                                    <form id="quickForm" action="{{ route('kategori.tambah') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group mb-0">
                                                <label for="nama_kategori">Nama Kategori</label>
                                                <input type="text" name="nama_kategori" class="form-control"
                                                    id="nama_kategori" placeholder="Nama Kategori"
                                                    value="{{ old('nama_kategori') }}">
                                                @error('nama_kategori')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer pb-3">
                                            <button type="submit" class="btn btn-secondary">Submit</button>
                                        </div>
                                        <div class="card-footer pb-3">
                                            @if (session()->has('success'))
                                                <div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">&times;</button>
                                                    <i class="icon fas fa-check"></i>
                                                    {{ session()->get('success') }}
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (left) -->
                            <!-- right column -->
                            <div class="col-md-6">

                            </div>
                            <!--/.col (right) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->

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
                                                    <th class="col-2">No</th>
                                                    <th class="col-4">Nama</th>
                                                    <th>Olah Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $number = 1;
                                                @endphp
                                                @foreach ($kategori as $key)
                                                    <tr>
                                                        <td>{{ $number }}</td>
                                                        <td>
                                                            {{ $key->nama_kategori }}
                                                        </td>
                                                        <td>
                                                            <div class="px3">
                                                                <button type="button" class="btn btn-block btn-primary btn-sm">Primary</button>
                                                                <button type="button" class="btn btn-block btn-danger btn-sm">Danger</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $number++;
                                                    @endphp
                                                @endforeach
                                            </tbody>
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
                </section>
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
            @include('template.footer')
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @include('template.script')

</body>

</html>
