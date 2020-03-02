@extends('layouts.app')

@section('content')
    <p>
        Здравствуйте, {{ $messageParameters->user }}, Вы выбраны для участия в акции {{ $messageParameters->actionTitle }}. Успейте до {{ $action->actionDateEnd }} принять участие
    </p>
@endsection
