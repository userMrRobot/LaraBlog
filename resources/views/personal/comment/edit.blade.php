@extends('personal.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарии</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Home</a></li>

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
                <div class="row">

                    <div class="col-12">

                        <form action="{{route('personal.comment.update',$comment->id)}}" method="post" class="w-50">
                            @csrf
                            @method('patch')
                            <div class="from-group">
                                <textarea class="form-control"
                                    name="message" cols="30" rows="10">{{$comment->message}}</textarea>
                            </div>


                            <button type="submit" class="btn btn-primary mt-4">Изменить</button>
                            <a href="{{route('personal.comment.index', $comment->id)}}" class="btn btn-primary mt-4">Назад</a>
                            <div class="mt-3">
                                @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </form>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
