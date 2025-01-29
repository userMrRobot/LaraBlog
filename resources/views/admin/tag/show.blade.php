@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Тэги</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                        <a href="{{route('admin.tag.index')}}" class="btn btn-block btn-primary">Назад</a>
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
                                        <th>Название</th>
                                        <th>Действие</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->title}}</td>
                                        <td> <a href="{{route('admin.category.show',$tag->id)}}" class="btn btn-block btn-primary">Открыть</a></td>
                                        <td> <a href="{{route('admin.category.edit', $tag->id)}}" class="btn btn-block btn-success">Изменить</a></td>
{{--                                        <td> <a href="{{route('admin.category.delete',$category->id)}}" class="btn btn-block btn-danger">Удалить</a></td>--}}

                                    </tr>

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
