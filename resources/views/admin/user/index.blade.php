@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                            <li class="breadcrumb-item active">Пользователи</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="col-1">
                    <div class="row">
                        <a href="{{route('admin.user.create')}}" class="btn btn-block btn-primary">Добавить</a>
                    </div>

                </div>
                <div class="col-12 mt-4">
                    <div class="row">

                        <div class="card col-6">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Действие</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td> <a href="{{route('admin.user.show',$user->id)}}" class="btn btn-block btn-primary">Открыть</a></td>
                                        <td> <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-block btn-success">Изменить</a></td>
                                        <td>
                                            <form action="{{route('admin.user.delete',$user->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-block btn-danger"> Удалить </button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
