@extends('layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новая статья</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Новая статья</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Создание статьи</h3>
                        </div>
                        <!-- /.card-header -->
                        
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                
                                <!-- Поле: Название -->
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" 
                                           name="title" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           placeholder="Название статьи"
                                           value="{{ old('title') }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Поле: Описание -->
                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea name="description" 
                                              class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              rows="3" 
                                              placeholder="Краткое описание...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Поле: Контент -->
                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea name="content" 
                                              class="form-control @error('content') is-invalid @enderror" 
                                              id="content" 
                                              rows="7" 
                                              placeholder="Основной текст статьи...">{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Выбор: Категория -->
                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" 
                                            id="category_id" 
                                            name="category_id">
                                        <option value="" disabled selected>Выберите категорию</option>
                                        @foreach($categories as $id => $title)
                                            <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                                {{ $title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Выбор: Теги (Select2) -->
                                <div class="form-group">
                                    <label for="tags">Теги</label>
                                    <select name="tags[]" 
                                            id="tags" 
                                            class="select2 form-control @error('tags') is-invalid @enderror" 
                                            multiple="multiple" 
                                            data-placeholder="Выбор тегов" 
                                            style="width: 100%;">
                                        @foreach($tags as $id => $title)
                                            <option value="{{ $id }}">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Загрузка: Изображение -->
                                <div class="form-group">
                                    <label for="thumbnail">Изображение (превью)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" 
                                                   name="thumbnail" 
                                                   class="custom-file-input @error('thumbnail') is-invalid @enderror" 
                                                   id="thumbnail">
                                            <label class="custom-file-label" for="thumbnail">Выберите файл</label>
                                        </div>
                                    </div>
                                    @error('thumbnail')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить статью</button>
                                <a href="{{ route('posts.index') }}" class="btn btn-default">Отмена</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection