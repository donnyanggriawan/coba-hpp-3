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
                            <h1>Edit Bahan Baku</h1>
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
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Bahan Baku</h3>
                                </div>
                                {{-- @php
                                    $connection = mysqli_connect('localhost', 'root', '', 'coba-hpp-3');
                                    $auto = mysqli_query($connection, 'SELECT max(kd_bahan) AS max_code FROM bahanbakus');
                                    $data = mysqli_fetch_array($auto);
                                    $code = $data['max_code'];
                                    $urutan = (int) substr($code, 2, 3);
                                    $urutan++;
                                    $huruf = 'KD';
                                    $kd_kat = $huruf . sprintf('%03s', $urutan);
                                @endphp --}}
                                <form id="quickForm" action="{{ route('bahanbaku.update', $bahanbakus['id']) }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group mb-0">
                                            <label for="kode_bahan">Kode Bahan</label>
                                            <input type="text" name="kode_bahan" class="form-control mb-2"
                                                id="kode_bahan" placeholder="Kode Bahan" value="{{ $bahanbakus['kd_bahan'] }}"
                                                readonly>
                                            @error('kode_bahan')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="nama_bahan">Nama Bahan</label>
                                            <input type="text" name="nama_bahan" class="form-control mb-2"
                                                id="nama_bahan" placeholder="Nama Bahan"
                                                value="{{ $bahanbakus['nama_bahan'] }}">
                                            @error('nama_bahan')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="satuan">Satuan</label>
                                            <input type="text" name="satuan" class="form-control mb-2"
                                                id="satuan" placeholder="Satuan" value="{{ $bahanbakus['satuan'] }}">
                                            @error('satuan')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="harga">Harga</label>
                                            <input type="number" name="harga" class="form-control mb-2"
                                                id="harga" placeholder="Harga" value="{{ $bahanbakus['harga'] * $bahanbakus['per'] }}">
                                            @error('harga')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="per">Per</label>
                                            <input type="number" name="per" class="form-control" id="per"
                                                placeholder="Per" value="{{ $bahanbakus['per'] }}">
                                            @error('per')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-secondary">Update</button>
                                    </div>
                                    <div class="card-footer pb-3">
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
