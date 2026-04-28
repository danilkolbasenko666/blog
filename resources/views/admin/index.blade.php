@extends('layouts.layout') 

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Управление тегами</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Теги</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список тегов</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if($tags->isNotEmpty())
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Название</th>
                                    <th>Slug (Транслит)</th>
                                    <th style="width: 140px">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td><span class="badge badge-info">{{ $tag->slug }}</span></td>
                                        <td>
                                            <a href="#" class="btn btn-xs btn-primary"></a>
                                            <a href="#" class="btn btn-xs btn-danger">️</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">Теги пока не добавлены. Создайте первый тег через код или форму.</div>
                    @endif
                </div>
                <div class="card-footer">
                    Всего тегов: <strong>{{ $tags->count() }}</strong>
                </div>
            </div>
        </div>
    </section>
@endsection