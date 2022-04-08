@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Список категорий</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="{{ route('admin.categories.create') }}"" class=" btn btn-sm btn-outline-secondary">Добавить категорию</a>
    </div>
  </div>
</div>
@include('inc.messages')
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">Описание</th>
      <th scope="col">Кол-во новостей</th>
      <th scope="col">Управление</th>
    </tr>
  </thead>
  @foreach ($categories as $category)
  <tr>
    <th scope="row">{{ $category->id }}</th>
    <td>{{ $category->title }}</td>
    <td>{{ $category->discription }}</td>
    <td>{{ $category->news_count }}</td>
    <td>
      <a href="#">Уд.</a>
      <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" style="color: red;">Ред.</a>
    </td>
  </tr>
  @endforeach
  <tbody>
  </tbody>
</table>
{{$categories->links()}}
@endsection
@section('title') Категории
@parent

@endsection