@component('mail::message')
    # Новый тикет

    {{ $ticket->user->name }}! Вы создали новый тикет!

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