@extends('layouts.admin')
@section('content')
<div class="title-feedback" style="width: 100%; text-align: center">
    <h1>Добавить источник</h1>
</div>
<br>
@include('inc.messages')
<form method="post" action="{{ route('admin.users.update', ["user" => $user]) }}">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="name">Имя пользователя</label>
        <input type="text" class="form-control" id="name" name="name" required="required" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" required="required" value="{{ $user->email }}">
    </div>
    <div class="form-group">
        <label for="is_admin">Роль</label>
        <select name="is_admin" id="is_admin" class="form-control" required="required">
            <option value="{{ $user->is_admin = 1 }}" @if($user->is_admin === 1)) selected @endif>Админ</option>
            <option value="{{ $user->is_admin = 0 }}" @if($user->is_admin === 0) selected @endif>Пользователь</option>
        </select>
    </div>
    <br />
    <button type="submit" class="btn btn-secondary btn-sm" style="margin: auto; display: flex">Сохранить</button>
</form>
@endsection