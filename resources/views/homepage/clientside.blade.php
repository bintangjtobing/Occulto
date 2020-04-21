@extends('welcome')
@section('title','Occulto | Send your words secretly to '. $getUser->name)
@section('metadesc','Help you send and receive honest words and always keeping you in Occulto')
@section('metakey','Occulto, Secret messages, Occulto Sarjanamalam')
<?php $tokens = bin2hex(openssl_random_pseudo_bytes(64)); ?>
@section('content')
<?php $encId = base64_encode($getUser->id); ?>
<section>
    <div class="container centerwebs">
        <div class="row">
            <div class="col-md-7 mb-5">
                <div class="hidden">
                    <h2 class="font-weight-400 m-b-0">Send your words to <span
                            style="font-weight:700; cursor:pointer;">{!!$getUser->name!!}</span>.</h2>
                    <h2 class="font-weight-400 m-b-0">
                        <b>{!!$getUser->name!!}</b> will not seen who sent this.
                    </h2>
                </div>
                @if(session('sukses'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <span style="font-weight:600;"><i class="far fa-check-circle"></i></span> <b>Successfully sent
                        messages!</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                @endif
                <form action="/{{$encId}}/send-messages" method="post">

                    @csrf
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Gender</label>
                            <select class="form-control" name="gender" required>
                                <option value="">Select your gender</option>
                                <option value="P">Female</option>
                                <option value="L">Male</option>
                                <option value="NS">Rather not say</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="">Your name</label>
                            <input class="form-control" name="name" placeholder="Your name" type="text" required>
                            <small class="muted-text"><span><i class="fas fa-exclamation-triangle"></i></span> Calm
                                down. Your name will not showing when <b>{{$getUser->name}}</b>
                                see
                                your
                                messages.</small>
                        </div>
                    </div>
                    <div class="input-group">
                        <textarea class="form-control" name="messages" placeholder="Write your words here..." autofocus
                            required></textarea>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary"><span><i class="far fa-paper-plane"></i></span>
                            &nbsp;Send
                            this messages</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5 text-center">
                <h2>Want to know what people say to you?</h2>
                <p><a href="/" class="btn btn-primary">Let's get started!</a></p>
            </div>
        </div>
    </div>
</section>
@endsection
