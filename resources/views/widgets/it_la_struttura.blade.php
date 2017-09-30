<!--************************************
					Tab Start
			*************************************-->
<section class="th-sectionspace th-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="th-featuresarea">
                    <ul class="th-featuresnav" role="tablist">
                        <li role="presentation" @if($anchor == 'mission')class="active" @endif>
                            <a href="#mission" role="tab" data-toggle="tab">
                                <i><img src="/images/icon/img-11.png" alt="image description"></i>
                                <span>Mission</span>
                            </a>
                        </li>
                        <li role="presentation" @if($anchor == 'impegni')class="active" @endif>
                            <a href="#impegni" role="tab" data-toggle="tab">
                                <i><img src="/images/icon/img-12.png" alt="image description"></i>
                                <span>Impegni & Programmi</span>
                            </a>
                        </li>
                        <li role="presentation" @if($anchor == 'azienda')class="active" @endif>
                            <a href="#azienda" role="tab" data-toggle="tab">
                                <i><img src="/images/icon/img-13.png" alt="image description"></i>
                                <span>L' Azienda</span>
                            </a>
                        </li>
                        <li role="presentation" @if($anchor == 'gruppo')class="active" @endif>
                            <a href="#gruppo" role="tab" data-toggle="tab">
                                <i><img src="/images/icon/img-14.png" alt="image description"></i>
                                <span>Il Gruppo Garofalo</span>
                            </a>
                        </li>
                        <li role="presentation" @if($anchor == 'gallery')class="active" @endif>
                            <a href="#gallery" role="tab" data-toggle="tab">
                                <i><img src="/images/icon/img-15.png" alt="image description"></i>
                                <span>La Gallery</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content th-featurestabcontent">
                        <div role="tabpanel" class="tab-pane @if($anchor == 'mission')active @endif " id="mission">
                            <h2>La <span>Mission</span></h2>
                            {!! $bodySlug['mission'] !!}
                        </div>
                        <div role="tabpanel" class="tab-pane @if($anchor == 'impegni')active @endif " id="impegni">
                            <h2>Impegni & <span>Programmi</span></h2>
                            {!! $bodySlug['impegni'] !!}
                        </div>
                        <div role="tabpanel" class="tab-pane @if($anchor == 'azienda')active @endif " id="azienda">
                            <h2>L' <span>Azienda</span></h2>
                            {!! $bodySlug['azienda'] !!}
                        </div>
                        <div role="tabpanel" class="tab-pane @if($anchor == 'gruppo')active @endif " id="gruppo">
                            <h2>Il Gruppo <span> Garofalo</span></h2>
                            {!! $bodySlug['gruppo'] !!}
                        </div>
                        <div role="tabpanel" class="tab-pane @if($anchor == 'gallery')active @endif " id="gallery">
                            <h2>La <span>Gallery</span></h2>
                            {!! $bodySlug['gallery'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Tab End
*************************************-->
