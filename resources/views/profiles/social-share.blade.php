@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h2 class="text-center mt-3 mb-5">Cliquez sur le lien ci-dessous pour partager facilement cette annonce sur vos réseaux sociaux préférés 
            ou vous pouvez également copier le lien et l'utiliser</s></h2>
    </div>
    <ul>
        <li>
            @if (isset($facebook))
            <span><strong>Lien => </strong></span><a href="{{ $facebook }}">{{ $facebook }}</a>
    
            @elseif (isset($twitter))
            <span><strong>Lien =>  </strong></span><a href="{{ $twitter }}">{{ $twitter }}</a>
    
            @elseif (isset($linkedin))
            <span><strong>Lien =>  </strong></span><a href="{{ $linkedin }}">{{ $linkedin }}</a>
    
            @elseif (isset($whatsapp))
            <span><strong>Lien =>  </strong></span><a href="{{ $whatsapp }}">{{ $whatsapp }}</a>
    
            @elseif (isset($telegram))
            <span><strong>Lien =>  </strong></span><a href="{{ $telegram }}">{{ $telegram }}</a>
    
            @else
    
            <p>Désolé votre lien a rencontré un probleme</p>
            @endif
        </li>
    </ul>
    {{-- <div style="margin-top: 7%">.</div> --}}
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="{{ asset('assets/js/jquery/jquery-3.3.1.min.js') }}">\x3C/script>')
</script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/js/vendors.min.js') }}"></script>

<!-- include custom script for site  -->
<script src="{{ asset('assets/js/main.min.js') }}"></script>



{{-- <ul>
    @foreach ($socialShare as $key => $value)
        <li>
            <a href="{{ $value }}" target="_blank">{{Str::ucfirst($key) }}</a>
        </li>
    @endforeach
</ul> --}}

