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
                                    <h3 class="card-title">Edit Menu</h3>
                                </div>
                                {{-- @php
                                    $connection = mysqli_connect('localhost', 'root', '', 'coba-hpp-3');
                                    $auto = mysqli_query($connection, 'SELECT max(kd_bahan) AS max_code FROM menus');
                                    $data = mysqli_fetch_array($auto);
                                    $code = $data['max_code'];
                                    $urutan = (int) substr($code, 2, 3);
                                    $urutan++;
                                    $huruf = 'KD';
                                    $kd_kat = $huruf . sprintf('%03s', $urutan);
                                @endphp --}}
                                <form id="quickForm" action="{{ route('menu.update', $menus['id']) }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group mb-0">
                                            <label for="kode_bahan">Kode Menu</label>
                                            <input type="text" name="kode_menu" class="form-control mb-2"
                                                id="kode_bahan" placeholder="Kode Menu"
                                                value="{{ $menus['kd_menu'] }}" readonly>
                                            @error('kode_bahan')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <label for="nama_bahan">Nama Menu</label>
                                            <input type="text" name="nama_menu" class="form-control mb-2"
                                                id="nama_menu" placeholder="Nama Menu" value="{{ $menus['nama_menu'] }}">
                                            @error('nama_bahan')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <label for="kategori">Kategori</label>
                                            <select class="form-control select2 select2-hidden-accessible mb-2"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true" id="kategori" name="id_kategori">
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id }}" @if($menus->kategori_id == $kat->id) selected @endif>{{ $kat->nama_kategori }}</option>
                                                @endforeach
                                            </select>

                                            <label for="keterangan">Keterangan</label>
                                            <textarea class="form-control" rows="3" placeholder="Keterangan" name="keterangan" id="keterangan">{{ $menus['keterangan'] }}</textarea>
                                            @error('keterangan')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
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
