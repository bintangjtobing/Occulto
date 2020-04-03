@extends('welcome')
@section('title','Occulto | '.$user->name.' Timeline')
@section('metadesc','Help you send and receive honest words and always keeping you in Occulto')
@section('metakey','Occulto, Secret messages, Occulto Sarjanamalam')
<?php $tokens = bin2hex(openssl_random_pseudo_bytes(64)); ?>
@section('content')
<?php $encId = base64_encode($user->id); ?>
<section>
    <div class="container centerwebs" style="margin-top:0px !important;">
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-weight-400 m-b-0">Look what people have been sent to <b>{{$user->name}}</b>.</h2>
                <div class="list-group mt-2">
                    @foreach ($getUser as $item)
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <small>{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</small>
                        </div>
                        <p class="mb-1">{!!$item->message_thread!!}</p>
                    </a>
                    @endforeach
                </div>
                <div class="my-1">
                    {{$getUser->links()}}
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
