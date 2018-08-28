@extends('master')

@section('title', 'Список контактов')

@section('content')
  <div class="content">
      <div class="title m-b-md">
          Контакты
      </div>

      <form action="{{ route('addContact') }}" method="POST">
        <h2>Добавить новый</h2>

        @if ($errors->any())
          <div style="width: 50%; margin: 0 auto;">
            <h3>Ознакомьтесь с ошибками!</h3>
              @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
              @endforeach
          </div>
        @endif

        <input type="text" name="name" placeholder="Имя" require>
        <input type="text" name="phone" placeholder="Телефон" require>
        <input type="submit" value="Отправить">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>

      <ol>
        @foreach ($contactsList as $contact)
          <li style="display: flex; justify-content: space-between">
            {{ $contact->name }} - {{ $contact->phone }}

            <form action="{{ route('editContact') }}">
              <input 
                type="hidden" 
                name="id" 
                value="{{ $contact->id }}"
              >
              <input type="submit" value="Изменить">
            </form>
          </li>

        @endforeach
      </ol>
  </div>

  <style>
    .error {
      color: red;
    }
  </style>
@endsection