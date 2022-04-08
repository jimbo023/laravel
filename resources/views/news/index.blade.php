@extends('layouts.main')
@section('content')
@forelse ($newsList as $news)
<div class="col">
    <div class="card shadow-sm">
      <a href="{{ route('news.show', ['id' => $news->id, 'category' => $news->category->title]) }}">
          <img src="{{ $news->image }}" width="100%" height="100%">
      </a>
      <div class="card-body">
        <p class="card-text">{{ $news->discription }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a href="{{ route('news.show', ['id' => $news->id, 'category' => $news->category]) }}">
            <button type="button" class="btn btn-sm btn-outline-secondary">Прочитать</button>
            </a>
          </div>
          <small class="text-muted">Автор: {{ $news->author }}</small>
        </div>
      </div>
    </div>
</div>
@empty
    <h2>Новостей данной категории нет</h2>
@endforelse
<br>
{{ $newsList->links()}}
@endsection

