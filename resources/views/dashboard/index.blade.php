@extends('layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">


                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$boardsNumber}}</h3>

                                <p>Boards</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-copy"></i>
                            </div>
                            <a href="{{route('boards.all')}}" class="small-box-footer">See All <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$boardsCompleted}}</h3>

                                <p>Boards completed</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <a href="{{route('boards.all')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$usersNumber}}</h3>

                                <p>Total users</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-users"></i>
                            </div>
                            @if (\Illuminate\Support\Facades\Auth::user()->role === \App\Models\User::ROLE_ADMIN)
                                <a href="{{route('users.all')}}" class="small-box-footer">See all <i class="fas fa-arrow-circle-right"></i></a>
                            @else
                                <a class="small-box-footer">&nbsp</a>
                            @endif
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$tasksNumber}}</h3>

                                <p>Tasks</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-tasks"></i>
                            </div>
                            <a href="{{route('boards.all')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>


            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection