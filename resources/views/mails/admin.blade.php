@component('mail::message')
    # Новый тикет

    Пользователь {{ $ticket->user->name }} создал новый тикет

    @component('mail::panel')
        <h1>{{ $ticket->title }}</h1>
        {{ $ticket->body }}
    @endcomponent

    @component('mail::button', ['url' => route('ticket.show', ['id' => $ticket->id])])
        Подробнее
    @endcomponent

    Спасибо,<br>
    {{ config('app.name') }}
@endcomponent