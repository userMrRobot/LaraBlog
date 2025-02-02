@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление пользователя</h1>
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

                        <form action="{{route('admin.user.store')}}" method="post" class="w-25">
                            @csrf
                            <label for="exampleInputEmail1">Введите имя пользователя</label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="Введите имя пользователя" value="{{old('name')}}">
                            <div class="mt-3">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="exampleInputEmail1">Введите email пользователя</label>
                            <input type="email" class="form-control" name="email"
                                   placeholder="Введите email пользователя" value="{{old('email')}}">
                            <div class="mt-3">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Выберите роль</label>
                                <select class="form-control w-50" name="role">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}" {{$id == old('role') ? 'selected' : ''}}>
                                            {{$role}}</option>
                                    @endforeach


                                </select>
                                @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Добавить</button>


                        </form>
                    </div>
                </div>
                <!-- general form elements -->


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
