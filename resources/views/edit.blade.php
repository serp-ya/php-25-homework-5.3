@extends('master')

@section('title', 'Редактировать контакт')

@section('content')
  <div class="content">
    <div class="title m-b-md">
        Редактировать контакт id: {{ $id }}
    </div>

    <form class="edit-form" action="/edit" method="POST">  
      <div>
        Имя: 
        <input type="text" name="name" value="{{ $contact->name }}">
      </div>
    
      <div>
        Телефон: 
        <input type="text" name="phone" value="{{ $contact->phone }}">
      </div>

      <input type="hidden" name="id" value="{{ $contact->id }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" value="Изменить">
    </form>
  </div>

  <style>
    .edit-form {
      display: flex;
      justify-content: space-between;
      margin: 0 auto;
      width: 70%;
    }
  </style>
@endsection