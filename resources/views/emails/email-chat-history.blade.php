<h2>Historial de {{ $messageOfTheDay['chat'] }}</h2>

@foreach ($messageOfTheDay['messages'] as $message )
    <p><span style="font-weight:bold">{{ $message['user']['name'] }}:</span> {{ $message['message'] }}</p>
    <span style="font-size:12px;">Enviado: {{ $message['created_at'] }}</span>  
@endforeach
