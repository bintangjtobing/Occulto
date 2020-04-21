@extends('welcome')
@section('title','Occulto | Send words secretly to '. $getUser->name)
@section('metadesc','Help you send and receive honest words and always keeping you in Occulto')
@section('metakey','Occulto, Secret messages, Occulto Sarjanamalam')
<?php $tokens = bin2hex(openssl_random_pseudo_bytes(64)); ?>
@section('content')
<?php $encId = base64_encode($getUser->id); ?>
<section>
    <div class="container centerwebs">
        <div class="row">
            <div class="col-md-8 my-2">
                <h2 class="font-weight-400 m-b-0">Hello, Congratulations <span data-toggle="tooltip"
                        data-placement="top" title="Hi {!!$getUser->name!!}, welcome to Occulto!"
                        style="font-weight:700; cursor:pointer;">{!!$getUser->name!!}</span>.</h2>
                <h2 class="font-weight-400 m-b-0">
                    Let your friends give their words by
                </h2>
                <h2 class="font-weight-400 m-b-0">
                    share your Occulto account.
                </h2>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
                    </div>
                    <input data-toggle="tooltip" data-placement="top"
                        title="Hi {!!$getUser->name!!}, click this link to copy." type="text" name="valueLink"
                        id="valueLink" class="form-control" aria-describedby="basic-addon1"
                        value="<?php echo url("/{$encId}") ?>" onclick="copyTo()" readonly>
                </div>
                <p style="color:#000;">Or share this link to your social media</p>
                <div
                    class="mb-4 social-icons social-icons-large social-icons-border social-icons-rounded social-icons-colored-hover">
                    <ul>
                        <li class="social-instagram"><a data-target="#instagrammod" data-toggle="modal" href="#"><i
                                    class="fa fa-instagram"></i></a></li>
                        <li class="social-whatsapp"><a
                                href="whatsapp://send?text=Send your words secretly to {{$getUser->name}}, and believe us. We always keeping you in privacy and secret. *Join Occulto*. Click this link to send the words <?php echo url("/{$encId}") ?>"><i
                                    class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 text-left">
                <h2 class="font-weight-400 m-b-0">See what your friends sent to you</h2>
                <a href="/{{$encId}}/timeline" class="btn btn-primary mt-3">See your timeline</a>
            </div>
        </div>
    </div>
</section>
{{-- MODAL INSTAGRAM --}}
<div class="modal fade" id="instagrammod" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-label">Share by Instagram</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="offset-1 col-md-11">
                        <p>
                            <ul>
                                <li>Copy this link <span onclick=copyTo() id="valueLink" data-toggle="tooltip"
                                        data-placement="top"
                                        title="Click this link to copy."><b><?php echo url("/{$encId}") ?></b></span>
                                </li>
                                <li>Open your instagram app</li>
                                <li>Go on your profile</li>
                                <li>Click on Edit Profile</li>
                                <li>On Website section, paste your account link</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-b" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>

@endsection
