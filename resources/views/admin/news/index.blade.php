@extends('layouts.admin')
@section('content')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Список новостей</h1>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
    <a href="{{ route('admin.news.create') }}"" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
  </div>
</div>
</div>
@include('inc.messages')
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Категория</th>
      <th scope="col">Название</th>
      <th scope="col">Автор</th>
      <th scope="col">Описание</th>
      <th scope="col">Управление</th>
    </tr>
  </thead>
  @foreach ($newsList as $news)
  <tr>
    <th scope="row">{{ $news->id }}</th>
    <td>{{ $news->category->title }}</td>
    <td>{{ $news->title }}</td>
    <td>{{ $news->author }}</td>
    <td>{{ $news->discription }}</td>
    <td>
      <a href="javascript:;" class="delete" rel='{{ $news->id }}'>Уд.</a>
      <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}" style="color: red;">Ред.</a>
    </td>
  </tr>
  @endforeach
  <tbody>
  </tbody>
</table>
{{$newsList->links()}}
@endsection
@section('title') Новости
    @parent
@endsection

@push('js')
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(){
    const el = document.querySelectorAll(".delete");
    el.forEach(function(element, index){
      element.addEventListener("click", function(){
        const id = this.getAttribute("rel");
        if(confirm(`Подтвердите удаление новости с ID ${id}?`)){
          send(`/admin/news/${id}`).then(()=> {
            alert("Запись удалена");
            location.reload();
          })
        }
      })
    });
  })

  async function send(url){
    let response = await fetch(url, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }
    })

    let result = await response.json();
    return result.ok;
  }
</script>
@endpush