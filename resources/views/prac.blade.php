Hello, {{ $name }}. <br>

{{ '<strong>힘세고 강한 아침</strong>' }}<br>

{!! '<strong>힘세고 강한 아침</strong>' !!}<br>

{{ $noname or 'Default' }}<br>

현재 시각은 {{ date('H:i', time()) }}
