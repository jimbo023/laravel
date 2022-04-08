@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Список категорий</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="{{ route('admin.sources.create') }}" class=" btn btn-sm btn-outline-secondary">Добавить источник</a>
    </div>
  </div>
</div>
@include('inc.messages')
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Источник</th>
      <th scope="col">Ссылка на источник</th>
      <th scope="col">ID новости</th>
      <th scope="col">Управление</th>
    </tr>
  </thead>
  @foreach ($sources as $source)
  <tr>
    <th scope="row">{{ $source->id }}</th>
    <td>{{ $source->name }}</td>
    <td>{{ $source->urlSource }}</td>
    <td>
      @if($source->news)
      @foreach($source->news as $origin)
      {{ $origin->id }}
      @endforeach
      @endif
    </td>
    <td>
      <a href="javascript:;" class="delete" rel="{{ $source->id }}">Уд.</a>
      <a href="{{ route('admin.sources.edit', ['source' => $source->id]) }}" style="color: red;">Ред.</a>
    </td>
  </tr>
  @endforeach
  <tbody>
  </tbody>
</table>
{{$sources->links()}}
@endsection
@section('title') Категории
@parent

@endsection

@push('js')
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(){
    const el = document.querySelectorAll(".delete");
    el.forEach(function(element, index){
      element.addEventListener("click", function(){
        const id = this.getAttribute("rel");
        if(confirm(`Подтвердите удаление источника с ID ${id}?`)){
          send(`/admin/sources/${id}`).then(()=> {
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