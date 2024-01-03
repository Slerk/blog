@extends('admin.layouts.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователяы</h1>
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
            <div class="row">

                <div class="col-12">

                    <form action="{{route('admin.user.update', $user->id )}}" method="post" class="w-25">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" class="form-control" name='name'  placeholder="Название категории" value="{{$user->name}}">
                        </div>
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror

                        <div class="form-group">
                            <input type="text" value="{{$user->email}}" class="form-control" name='email'  placeholder="Email">
                        </div>
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror


                        <div class="form-group w-50">

                            <input type="hidden" name="user_id" value="{{$user->id}}">

                            <label>Выберите роль</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $key=>$value)
                                    <option value="{{$key}}" {{$key === $user->role ? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror



                            </div>




                    <input type="submit" class="btn btn-primary" value="Обновить">
                    </form>
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection