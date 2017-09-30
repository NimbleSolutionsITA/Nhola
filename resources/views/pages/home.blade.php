
@extends('main')

@section('title', 'HOME')

@section('content')

    @include('widgets.home_slider')

    <!--************************************
            Main Start
    *************************************-->
    <main id="th-main" class="th-main th-haslayout">

        @include('widgets.features_and_table')

        @include('widgets.statistics')

        @include('widgets.services')

        @include('widgets.newsletter')

        @include('widgets.gallery')

        @include('widgets.doctor_team')

        @include('widgets.testimonial')

        @include('widgets.departments')

        @include('widgets.latest_news')

    </main>
    <!--************************************
            Main End
    *************************************-->

@endsection
