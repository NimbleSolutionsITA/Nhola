
@extends('main')

@section('title', 'ATTIVITÀ')

@section('content')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-main th-haslayout">

        @if(App::isLocale('it'))
            @include('widgets.it_attivita')
        @endif
        @if(App::isLocale('en'))
            @include('widgets.en_attivita')
        @endif

    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection
