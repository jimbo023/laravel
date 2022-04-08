@extends('layouts.admin')
@section('content')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Список заказов</h1>

</div>
@include('inc.messages')
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя заказчика</th>
      <th scope="col">Телефон</th>
      <th scope="col">Email</th>
      <th scope="col">Описание</th>
      <th scope="col">Статус</th>
      <th scope="col">Управление</th>
    </tr>
  </thead>
  @foreach ($orders as $order)
  <tr @if($order->status === 'work') class="bg-warning" @endif>
    <th scope="row">{{ $order->id }}</th>
    <td>{{ $order->name }}</td>
    <td>{{ $order->phone }}</td>
    <td>{{ $order->email }}</td>
    <td>{{ $order->discription }}</td>
    <td>{{ $order->status }}</td>
    <td>
      <a href="javascript:;" class="delete" rel="{{ $order->id }}">Уд.</a>
      <a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}" style="color: red;">Редакт.</a>
    </td>
  </tr>
  @endforeach
  <tbody>
  </tbody>
</table>
@endsection
@section('title') Заказы
    @parent
@endsection

@push('js')
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(){
    const el = document.querySelectorAll(".delete");
    el.forEach(function(element, index){
      element.addEventListener("click", function(){
        const id = this.getAttribute("rel");
        if(confirm(`Подтвердите удаление заказа с ID ${id}?`)){
          send(`/admin/orders/${id}`).then(()=> {
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