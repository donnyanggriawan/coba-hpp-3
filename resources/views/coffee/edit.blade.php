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
                            <h1>Edit Menu Coffee</h1>
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
                                    <h3 class="card-title">Edit Menu Coffee</h3>
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
                                <form id="quickForm" action="{{ route('coffee.update', $coffees['id']) }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group mb-0">
                                            <label for="kode_coffee">Kode Coffee</label>
                                            <input type="text" name="kode_coffee" class="form-control mb-2"
                                                id="kode_coffee" placeholder="Kode Coffee"
                                                value="{{ $coffees['kd_coffee'] }}" readonly>
                                            @error('kode_coffee')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="nama_coffee">Nama Coffee</label>
                                            <input type="text" name="nama_coffee" class="form-control mb-2"
                                                id="nama_coffee" placeholder="Nama Coffee"
                                                value="{{ $coffees['nama_coffee'] }}">
                                            @error('nama_coffee')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="kategori">Kategori</label>
                                            <select name="kategori" class="form-control select2 mb-2" style="width: 100%;" required>
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($kategoris as $kat)
                                                    <option value="{{ $kat->id }}" {{ ($coffees->kategori_id == $kat->id ) ? 'selected' : null }}>{{ $kat->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kategori')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control mb-2"
                                                id="keterangan" placeholder="Keterangan"
                                                value="{{ $coffees['keterangan'] }}">
                                            @error('keterangan')
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
