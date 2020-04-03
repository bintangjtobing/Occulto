@extends('welcome')
@section('title','Occulto | Share words secretly')
@section('metadesc','Help you send and receive honest words and always keeping you in Occulto')
@section('metakey','Occulto, Secret messages, Occulto Sarjanamalam')
<?php $tokens = bin2hex(openssl_random_pseudo_bytes(64)); ?>
@section('content')
<section>
    <div class="container centerwebs">
        <h2 class="font-weight-400 m-b-0">Everything
            is <span data-toggle="tooltip" data-placement="top" title="Occulto is equal to secret in Italian"
                style="font-weight:700; cursor:pointer;">Occulto</span>.</h2>
        <h2 class="font-weight-400 m-b-0">
            We always keeping you in privacy and secret.
        </h2>
        <h2 class="font-weight-400">No need to <span class="text-rotator font-weight-700" data-animation="flash"
                data-speed="5000">make a fake account.,afraid of get caught.,worry to lose your friendship.</span></h2>
    </div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-7">
                <form action="/send-name" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Your name</span>
                            </div>
                            <input type="text" name="user_name" class="form-control"
                                placeholder="Input your name here..." autofocus required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
