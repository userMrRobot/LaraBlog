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

                        <form action="{{route('admin.post.update',$post->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group w-25">
                                <label for="exampleInputEmail1">{{$post->title}}</label>
                                <input type="text" class="form-control" name="title"
                                       placeholder="Введите новое название категории" value="{{$post->title}}">
                                <div class="mt-3">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea id="summernote" name="content">{{$post->content}}</textarea>
                            </div>
                            <div class="mt-3">
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label class="mb-3" for="exampleInputFile">Добавить превью</label>
                                <div class="w-25 mb-4">
                                    <img src="{{asset('storage/' . $post->preview_image)}}" alt="preview_image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image" >
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>

                                </div>
                            </div>
                            @error('preview_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group w-50">
                                <label class="mb-3" for="exampleInputFile">Добавить главное изображение</label>
                                <div class="w-50 mb-4">
                                    <img src="{{asset('storage/'. $post->main_image)}}" alt="main_image" class="w-50">

                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image" >
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>

                                </div>
                            </div>
                            @error('main_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label>Выберите категорию</label>
                                <select class="form-control w-50" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}} >
                                            {{$category->title}}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                <select class="select2" name="tag_id[]" multiple="multiple"
                                        data-placeholder="Выберите теги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray())
                                                ? 'selected' : ''}}
                                                value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach

                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary mt-4">Изменить</button>
                            <a href="{{route('admin.post.show', $post->id)}}" class="btn btn-primary mt-4">Назад</a>


                        </form>
                    </div>
                </div>
                <!-- general form elements -->


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
