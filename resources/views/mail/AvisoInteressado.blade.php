@component('mail::message')
    <h1>O bolo {{ $interessado->bolo->nome  }} já está disponível 👏👏</h1>
    <p>Fique atento pois temos somente {{ $interessado->bolo->quantidade  }} em estoque!</p>
@endcomponent
