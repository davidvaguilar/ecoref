@component('mail::message')
# Se genero una Orden de Trabajo desde {{ config('app.name') }}

Se adjunta Archivo en Pdf del Reporte

Gracias,<br>
{{ config('app.name') }}


{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
    © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.

    Si no deseas recibir más correos, puedes [modificar tus preferencias][unsubscribe].

    [unsubscribe]: {{ url('/configuracion') }}
    @endcomponent
@endslot

@endcomponent

