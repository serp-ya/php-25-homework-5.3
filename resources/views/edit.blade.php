@extends('master')

@section('title', 'Редактировать контакт')

@section('content')
  <div class="content">
    <div class="title m-b-md">
        Редактировать контакт id: {{ $id }}
    </div>

    @if ($errors->any())
      <div style="width: 50%; margin: 0 auto;">
        <h3>Ознакомьтесь с ошибками!</h3>
          @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
          @endforeach
      </div>
    @endif

    <form class="edit-form" action="{{ route('updateContact') }}" method="POST">  
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
    .error {
      color: red;
    }
  </style>
@endsection