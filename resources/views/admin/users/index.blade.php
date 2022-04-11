@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Пользователи</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
  </div>
</div>
@include('inc.messages')
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя пользователя</th>
      <th scope="col">Почта пользователя</th>
      <th scope="col">Роль пользователя</th>
      <th scope="col">Дата создания</th>
      <th scope="col">Управление</th>
    </tr>
  </thead>
  @foreach ($users as $user)
  <tr>
    <th scope="row">{{ $user->id }}</th>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if($user->is_admin) Админ @endif
      @if(!$user->is_admin) Пользователь @endif
    </td>
    <td>{{ $user->created_at }}</td>
    <td>
      <a href="javascript:;" class="delete" rel="{{ $user->id }}">Уд.</a>
      <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" style="color: red;">Ред.</a>
    </td>
  </tr>
  @endforeach
  <tbody>
  </tbody>
</table>
@endsection
@section('title') Пользователи
@parent

@endsection

@push('js')
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(){
    const el = document.querySelectorAll(".delete");
    el.forEach(function(element, index){
      element.addEventListener("click", function(){
        const id = this.getAttribute("rel");
        if(confirm(`Подтвердите удаление пользователя с ID ${id}?`)){
          send(`/admin/users/${id}`).then(()=> {
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