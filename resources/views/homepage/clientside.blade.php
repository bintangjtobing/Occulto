@extends('welcome')
@section('title','Occulto | Send your words secretly to '.$getUser->name)
@section('metadesc','Help you send and receive honest words and always keeping you in Occulto')
@section('metakey','Occulto, Secret messages, Occulto Sarjanamalam')
<?php $tokens = bin2hex(openssl_random_pseudo_bytes(64)); ?>
@section('content')
<?php $encId = base64_encode($getUser->id); ?>
<section>
    <div class="container centerwebs" style="margin-top:50px !important;">
        <div class="row">
            <div class="col-md-8">
                <h2 class="font-weight-400 m-b-0">Send your words to <span
                        style="font-weight:700; cursor:pointer;">{!!$getUser->name!!}</span>.</h2>
                <h2 class="font-weight-400 m-b-0">
                    <b>{!!$getUser->name!!}</b> will not seen who sent this.
                </h2>
            </div>
        </div>
    </div>
    @if(session('sukses'))
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <span style="font-weight:600;"><i class="far fa-check-circle"></i></span> <b>Successfully sent
                        messages!</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="container">
        <form action="/{{$encId}}/send-messages" method="post">
            @csrf
            <div class="row my-2">
                <div class="col-md-7">
                    <div class="input-group">
                        <textarea class="form-control" name="messages" placeholder="Write your words here..." autofocus
                            required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary"><span><i class="far fa-paper-plane"></i></span>
                        &nbsp;Send
                        this messages</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
