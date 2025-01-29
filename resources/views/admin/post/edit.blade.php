@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменение поста</h1>
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


                <div class="row">

                    <div class="col-12">

                        <form action="{{route('admin.post.update',$post->id)}}" method="post" class="w-25">
                            @csrf
                            @method('patch')
                            <label for="exampleInputEmail1">{{$post->title}}</label>
                            <input type="text" class="form-control" name="title"
                                   placeholder="Введите новое название категории" value="{{old('title')}}">
                            <button type="submit" class="btn btn-primary mt-4">Изменить</button>
                            <a href="{{route('admin.post.show', $post->id)}}" class="btn btn-primary mt-4">Назад</a>
                            <div class="mt-3">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </form>
                    </div>
                </div>
                <!-- general form elements -->


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
