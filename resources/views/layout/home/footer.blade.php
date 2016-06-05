@inject('controller', 'Iluminacao\Http\Controllers\RedeSocialController')

{{-- CHAMA REDES SOCIAIS CADASTRADAS--}}
{{--*/ $redes_sociais = $controller->getRedesSociais() /*--}}

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>

        <div class="row text-center">
            @foreach($redes_sociais as $rede_social)
                <a href="{{ $rede_social->link }}" class="rede-social" target="_blank">
                    <i class="{{ $rede_social->icone }}"></i>
                </a>
            @endforeach
        </div>

    </div>
</footer>

<!-- jQuery -->
<script src="{{ asset('build/js/jquery.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('build/js/bootstrap.min.js') }}"></script>

<!-- Jquery Mask Plugin -->
<script src="{{ asset('build/js/jquery.mask.js') }}"></script>

<!-- Nivo Lightbox Plugin -->
<script src="{{ asset('build/js/nivo-lightbox.min.js') }}"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })

    $(document).ready(function(){
        $('.galeria').nivoLightbox();
    });
</script>