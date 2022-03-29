@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Список категорий</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="{{ route('admin.sources.create') }}"" class=" btn btn-sm btn-outline-secondary">Добавить источник</a>
    </div>
  </div>
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Источник</th>
      <th scope="col">Ссылка на источник</th>
      <th scope="col">Управление</th>
    </tr>
  </thead>
  @foreach ($sources as $source)
  <tr>
    <th scope="row">{{ $source->id }}</th>
    <td>{{ $source->name }}</td>
    <td>{{ $source->urlSource }}</td>
    <td>
      <a href="#">Уд.</a>
      <a href="{{ route('admin.categories.edit', ['category' => $source->id]) }}" style="color: red;">Ред.</a>
    </td>
  </tr>
  @endforeach
  <tbody>
  </tbody>
</table>

@endsection
@section('title') Категории
@parent

@endsection