@if(session()->has('success'))
    <x-alert type="success" :message="session()->get('success')"></x-alert>
@endif

@if(session()->has('danget'))
    <x-alert type="danger" :message="session()->get('error')"></x-alert>
@endif

@if($errors->any())
@foreach ($errors as $error)
<x-alert type="danger" :message="$error"></x-alert>
@endforeach
@endif