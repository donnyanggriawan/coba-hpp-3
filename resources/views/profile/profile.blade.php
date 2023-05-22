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
                                            <a class="nav-link active" href="#" data-toggle="tab">Edit</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <form class="form-horizontal" action="{{ route('profile.update') }}" method="post">
                                                @method("put")
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ old('name', Auth::user()->name) }}"/>
                                                    </div>
                                                    @error('name')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}    
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Username</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputEmail" placeholder="Username" value="{{ old('name', Auth::user()->username) }}"/>
                                                    </div>
                                                    @error('username')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}    
                                                    </div>
                                                    @enderror
                                                </div>                                                                                                
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">
                                                            Change Name
                                                        </button>
                                                    </div>
                                                </div>
                                                @if (session()->has('message'))
                                                    <button type="button" class="btn btn-success toastrDefaultSuccess">
                                                        {{ session('message') }}
                                                    </button>                                             
                                                @endif
                                            </form>
                                        </div>
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
