
@extends('main')

@section('title', 'LA STRUTTURA')

@section('content')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-main th-haslayout">
        
        @if(App::isLocale('it'))
            @include('widgets.it_la_struttura')
        @endif
        @if(App::isLocale('en'))
            @include('widgets.en_la_struttura')
        @endif

    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection
