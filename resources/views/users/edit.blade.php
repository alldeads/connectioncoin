@extends('layouts.app')

@section('content')
<script src="{{ asset('js/croppie.js') }}" defer></script>
<form id="profile_form" method="POST" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container-fluid container-profile100 py-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                @include('users.partials.sidebar')
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        @sharedAlerts

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control form-control-lg input100" name="first_name" id="first_name" placeholder="Enter first name" value="{{ $user->first_name }}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control form-control-lg" name="last_name" id="last_name" placeholder="Enter last name" value="{{ old('last_name') ?? $user->last_name }}">
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea class="form-control form-control-lg" name="bio" id="bio" placeholder="Enter bio">{{ $user->bio }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Enter email" value="{{ $user->email }}">
                            <small id="passwordHelp" class="form-text text-muted">You need to verify your email address again if you updated your email.</small>
                        </div>
                        <div class="form-group" style="display: none; text-align: center;">
                            <div id="upload-demo-profile"></div>
                            <button class="btn btn-info rotate_profile" data-deg="-90"> Rotate Left</button>
                            <button class="btn btn-info rotate_profile" data-deg="90"> Rotate Right</button>
                        </div>
                        <div class="form-group">
                            <label for="image">Profile Picture</label>
                            <input type="hidden" value="1" id="photo_crop" name="crop_photo">
                            <input type="file" class="form-control form-control-lg" name="photo" accept="image/x-png,image/gif,image/jpeg" id="profile" />
                            <small id="passwordHelp" class="form-text text-muted">Leave this blank if you don't want to update your profile picture.</small>
                        </div>
                        <div class="form-group" style="display: none; text-align: center;">
                            <div id="upload-demo-cover"></div>
                            <button class="btn btn-info rotate_cover" data-deg="-90"> Rotate Left</button>
                            <button class="btn btn-info rotate_cover" data-deg="90"> Rotate Right</button>
                        </div>
                        <div class="form-group">
                            <label for="coverphoto">Cover Photo</label>
                            <input type="hidden" value="1" id="cover_crop" name="crop_cover">
                            <input type="file" class="form-control form-control-lg" name="coverphoto" accept="image/x-png,image/gif,image/jpeg" id="cover"/>
                            <small id="passwordHelp" class="form-text text-muted">Leave this blank if you don't want to update your cover photo.</small>
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control form-control-lg" name="facebook" id="facebook" placeholder="Enter facebook url" value="{{ optional($user->socialmedialinks)->facebook }}">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control form-control-lg" name="twitter" id="twitter" placeholder="Enter twitter url" value="{{ optional($user->socialmedialinks)->twitter }}">
                        </div>
                        <div class="form-group">
                            <label for="linkedin">LinkedIn</label>
                            <input type="text" class="form-control form-control-lg" name="linkedin" id="linkedin" placeholder="Enter linkedin url" value="{{ optional($user->socialmedialinks)->linkedin }}">
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control form-control-lg" name="instagram" id="instagram" placeholder="Enter instagram url" value="{{ optional($user->socialmedialinks)->instagram }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter password">
                            <small id="passwordHelp" class="form-text text-muted">Leave this blank if you don't want to update your password.</small>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password_confirmation" placeholder="Confirm password">
                        </div>
                        <button type="submit" id="updateBtn" class="btn btn-primary btn-lg">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            var profile = $('#upload-demo-profile').croppie({
                enableExif: true,
                enableOrientation: true,  
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 200,
                    height: 200,
                    type: 'circle' //square
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });

            var cover = $('#upload-demo-cover').croppie({
                enableExif: true,
                enableOrientation: true,
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 350,
                    height: 300,
                    type: 'square' //square
                },
                boundary: {
                    width: 400,
                    height: 350
                }
            });

            $('#profile').on('change', function () { 
                $("#upload-demo-profile").parent().show();
                var reader = new FileReader();

                reader.onload = function (e) {
                    profile.croppie('bind',{
                        url: e.target.result,
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }

                reader.readAsDataURL(this.files[0]);
            });

            $('#cover').on('change', function () { 
                $("#upload-demo-cover").parent().show();
                var reader = new FileReader();

                reader.onload = function (e) {
                    cover.croppie('bind',{
                        url: e.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }

                reader.readAsDataURL(this.files[0]);
            });

            $(".rotate_profile").on( 'click', function (e) {
                e.preventDefault();

                profile.croppie('rotate', parseInt($(this).data('deg')));
            } );

            $(".rotate_cover").on( 'click', function (e) {
                e.preventDefault();

                cover.croppie('rotate', parseInt($(this).data('deg')));
            } );

            $("#updateBtn").on('mouseover', function () {
                profile.croppie('result', {
                    type: 'canvas',
                    size: 'original',
                    quality: 1
                }).then(function (img) {
                    $("#photo_crop").val(img);
                });

                cover.croppie('result', {
                    type: 'canvas',
                    size: 'original',
                    quality: 1
                }).then(function (img) {
                    $("#cover_crop").val(img);
                });
            });
        });
</script>
@endsection
