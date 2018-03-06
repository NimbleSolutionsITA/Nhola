
@extends('main')

@section('title', 'HOME')

@section('content')

    @include('pages.partials.home_slider')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-main th-haslayout">

        @include('pages.partials.departments')

        @include('pages.partials.services')

        @include('pages.partials.statistics')

        @include('pages.partials.latest_news')

        @include('pages.partials.doctor_team')

    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection
