@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
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

                        <form action="{{route('admin.user.update',$user->id)}}" method="post" class="w-25">
                            @csrf
                            @method('patch')
                            <label for="exampleInputEmail1">{{$user->name}}</label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="Введите новое имя пользователя" value="{{$user->name}}">
                            <div class="mt-3">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <label for="exampleInputEmail1">{{$user->email}}</label>
                            <input type="email" class="form-control" name="email"
                                   placeholder="Введите новый email" value="{{$user->email}}">
                            <div class="mt-3">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Выберите роль</label>
                                <select class="form-control w-50" name="role">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}" {{$id == $user->role ? 'selected' : ''}}>
                                            {{$role}}</option>
                                    @endforeach


                                </select>
                                @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Изменить</button>
                            <a href="{{route('admin.user.show', $user->id)}}" class="btn btn-primary mt-4">Назад</a>


                        </form>
                    </div>
                </div>
                <!-- general form elements -->


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
