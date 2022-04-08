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
  <tr>
    <th scope="row">{{ $order->id }}</th>
    <td>{{ $order->name }}</td>
    <td>{{ $order->phone }}</td>
    <td>{{ $order->email }}</td>
    <td>{{ $order->discription }}</td>
    <td>{{ $order->status }}</td>
    <td>
      <a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">Редакт.</a>
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