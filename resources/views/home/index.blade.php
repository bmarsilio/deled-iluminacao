@extends('layout.home.base')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">

                    @include('home.partial.banner')

                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">Business Casual</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By
                            <strong>Start Bootstrap</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        @include('home.partial.noticia')

    </div>

@endsection