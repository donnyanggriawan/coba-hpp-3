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

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i> {{ session()->get('message') }}
                </div>
            @endif

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if (auth()->user()->level == 'admin')
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset('img/admin.png') }}" alt="User profile picture" />
                                        @else
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset('img/barista.jpg') }}" alt="User profile picture" />
                                        @endif

                                    </div>
                                    <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                                    @if (auth()->user()->level == 'admin')
                                        <p class="text-muted text-center">Admin</p>
                                    @else
                                        <p class="text-muted text-center">Barista</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile" data-toggle="tab">Edit
                                                Password</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">

                                        {{-- Edit Password --}}
                                        <div class="active tab-pane" id="profile">
                                            <form id="quickForm" class="form-horizontal"
                                                action="{{ route('password.update') }}" method="post">
                                                @method('put')
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="current_password"
                                                        class="col-sm-2 col-form-label">Current Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="current_password"
                                                            class="form-control" id="current_password"
                                                            placeholder="Current Password" />
                                                        @error('current_password')
                                                            <div class="text-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password" class="col-sm-2 col-form-label">New
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="password" class="form-control"
                                                            id="password" placeholder="New Password" />
                                                        @error('password')
                                                            <div class="text-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password_confirmation"
                                                        class="col-sm-2 col-form-label">Validation Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control" id="password_confirmation"
                                                            placeholder="Validation Password" />
                                                        @error('password_confirmation')
                                                            <div class="text-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">
                                                            Change
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        {{-- End --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        @include('template.script')

</body>

</html>
