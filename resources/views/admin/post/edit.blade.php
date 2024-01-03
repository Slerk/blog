@extends('admin.layouts.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование поста</h1>
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

                    <form action="{{route('admin.post.update', $post->id )}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('patch')
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name='title'  placeholder="Название категории"
                                   value="{{ $post->title}}">
                        </div>
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">

                            <textarea id="summernote" name="content">{{ $post->content}}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Добавить превью</label>
                            <div class="w-25">
                                <img src="{{ url('storage/'.$post->preview_img)}} " alt="preview_image" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_img">
                                    <label class="custom-file-label" >Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>
                        @error('preview_img')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Добавить основное изображение</label>
                            <div class="w-25">
                                <img src="{{ url('storage/'.$post->main_img) }} " alt="main_img" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_img">
                                    <label class="custom-file-label" >Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>
                        @error('main_img')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group w-50">
                            <label>Выберите категорию</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $key)
                                    <option value="{{$key->id}}" {{$key->id === $post->category_id ? 'selected' : ''}}>{{$key->title}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Теги</label>
                            <select class="select2" name="tags_id[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                                @foreach($tag as $key)
                                    <option {{is_array($post->tags->pluck('id')->toArray()) && in_array($key->id,$post->tags->pluck('id')->toArray()) ? 'selected' : '' }} value="{{$key->id}}" >{{$key->title}}</option>
                                @endforeach
                            </select>
                            @error('tags_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </div>
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
