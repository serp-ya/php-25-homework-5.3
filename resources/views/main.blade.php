@extends('master')

@section('title', 'Список контактов')

@section('content')
  <div class="content">
      <div class="title m-b-md">
          Контакты
      </div>

      <form method="POST">
        <h2>Добавить новый</h2>
        <input type="text" name="name" placeholder="Имя" require>
        <input type="text" name="phone" placeholder="Телефон" require>
        <input type="submit" value="Отправить">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </form>

      <ol>
        @foreach ($contactsList as $contact)
          <li style="display: flex; justify-content: space-between">
            {{ $contact->name }} - {{ $contact->phone }}

            <form action="/edit" method="GET">
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
@endsection