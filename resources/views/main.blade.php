<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="it"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NHoLa | @yield('title')</title>
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="stylesheet" href="/css/template/bootstrap.min.css">
    <link rel="stylesheet" href="/css/template/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/css/template/normalize.css">
    <link rel="stylesheet" href="/css/template/font-awesome.min.css">
    <link rel="stylesheet" href="/css/template/owl.carousel.css">
    <link rel="stylesheet" href="/css/template/prettyPhoto.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/template/color.css">
    <link rel="stylesheet" href="/css/template/responsive.css">
    <link rel="stylesheet" href="/css/template/transitions.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="/css/custom.css">
    <script src="/js/template/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body @if(Route::getCurrentRoute()->uri() == '/') class="th-home" @endif >
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!--************************************
        Wrapper Start
*************************************-->
<div id="th-wrapper" class="th-wrapper th-haslayout">

    @include('header')

    @yield('content')

    @include('footer')

</div>
<!--************************************
        Wrapper End
*************************************-->
@include('appointment')

<script src="/js/template/vendor/jquery-library.js"></script>
<script src="/js/template/vendor/jquery-ui.min.js"></script>
<script src="/js/template/vendor/bootstrap.min.js"></script>
<script src="/js/template/moment-with-locales.js"></script>
<script src="/js/template/bootstrap-datetimepicker.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&language=en"></script>
<script src="/js/template/owl.carousel.min.js"></script>
<script src="/js/template/finalcountdown.js"></script>
<script src="/js/template/jquery.countTo.js"></script>
<script src="/js/template/isotope.pkgd.js"></script>
<script src="/js/template/parallax.min.js"></script>
<script src="/js/template/prettyPhoto.js"></script>
<script src="/js/template/appear.js"></script>
<script src="/js/template/gmap3.js"></script>
<script src="/js/template/themefunction.js"></script>
<script src="/js/jquery.newsTicker.min.js"></script>
<script src="/js/jquery.fancybox.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/custom.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#headSearch").autocomplete({
            source: {!! $doctorList !!},
            appendTo: $("#headSearch").next(),
            select: function( event, ui ) {
                $("#docId").val( ui.item.url);
                document.getElementById("appointmentForm").action = '/medici/'+ui.item.url+'/'+ui.item.value.toLowerCase().replace(/\s+/g, '-');
            }
        });
    });
</script>

@yield('scripts')

</body>
</html>
