<!--************************************
            Header Start
    *************************************-->
<header id="th-header" class="th-header th-haslayout">
    <div class="th-topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <strong class="th-logo">
                        <a href="/"><img src="/images/logo.png" alt="image description"></a>
                    </strong>
                    <div class="th-rightarea">
                        <div class="th-topinfo">
                            <ul class="th-emails">
                                <li><i class="fa fa-envelope-o"></i><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">{{ setting('informazioni-generali.email') }}</a></li>
                                <!-- <li><i class="fa fa-life-ring"></i><a href="#">Help Desk</a></li> -->
                            </ul>
                            <!--
                            <ul class="th-socialicons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            -->
                            <div class="dropdown th-themedropdown" style="margin-left: 5px;">
                                <a id="th-languages" class="th-btndropdown th-btnlanguages" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-commenting-o"></i>
                                    <span>{{ trans('app.Language') }}</span>
                                    <i class="fa  fa-angle-down"></i>
                                </a>
                                <ul id="langageSwitcher" class="dropdown-menu th-dropdownmenu" aria-labelledby="th-languages">
                                    <li><a id="it"><img src="/images/icon/ita-flag.png" alt="Italian flag">{{ trans('app.Italian') }}</a></li>
                                    <li><a id="en"><img src="/images/icon/uk-flag.png" alt="UK flag">{{ trans('app.English') }}</a></li>
                                </ul>
                                <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                            </div>
                            <ul class="newsticker">
                                @foreach($posts as $post)
                                    <li><a href="/news{{ $post->slug }}">{{ $post->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <ul class="th-addressbox">
                            <li>
                                <span class="th-addressicon"><a href="/contatti"><i class="fa fa-map-marker"></i></a></span>
                                <div class="th-addresscontent">
                                    {!! setting('informazioni-generali.address') !!}
                                </div>
                            </li>
                            <li>
                                <span class="th-addressicon"><a href="/contatti"><i class="fa fa-phone"></i></a></span>
                                <div class="th-addresscontent">
                                    <strong>{{ setting('informazioni-generali.reception') }}</strong>
                                    <span>{{ trans('app.OpeningTime') }}: {{ setting('informazioni-generali.time') }}</span>
                                </div>
                            </li>
                            <li>
                                <a class="th-btnappointment" href="javascript:void(0);" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-calendar-plus-o"></i>
                                    <em>{{ trans('app.Appointments') }}</em>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="th-navigationarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <nav id="th-nav" class="th-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#th-navigation" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        {{ menu('main_'.App::getLocale(), 'layouts.main_nav') }}
                    </nav>
                    <div class="th-widgetsearch">
                        <form action="" method="POST" id="appointmentForm">
                            {{ csrf_field() }}
                            <fieldset>
                                <input id="headSearch" type="text" name="search" class="form-control" placeholder="{{ trans('app.FindDoctor') }}">
                                <button type="submit"><i class="fa fa-search"></i></button>
                                <input id="docId" type="hidden" name="id">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--************************************
        Header End
*************************************-->
