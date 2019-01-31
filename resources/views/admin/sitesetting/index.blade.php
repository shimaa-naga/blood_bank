
@extends('admin.layout')

@section('title')

    Edit Site Setting

@endsection



@section('header')



@endsection




@section('content')

    <section class="content-header">
        <h1>
            Edit Site Setting

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/sitesetting')}}">Edit Site Setting</a></li>

        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">



                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Site Setting</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">



                        <form action="{{url('/adminpanel/sitesetting')}}" method="post">
                            {{csrf_field()}}

                        @foreach($sitesetting as $setting)



                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Site Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('site_name') ? ' is-invalid' : '' }}" name="site_name" value="{{ $setting->site_name}}" required autofocus>

                                        @if ($errors->has('site_name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('site_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $setting->phone}}" required autofocus>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('E_mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $setting->email}}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Android App URL') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('android_app_url') ? ' is-invalid' : '' }}" name="android_app_url" value="{{ $setting->android_app_url}}" required autofocus>

                                        @if ($errors->has('android_app_url'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('android_app_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('IOS App URL') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('ios_app_url') ? ' is-invalid' : '' }}" name="ios_app_url" value="{{ $setting->ios_app_url}}" required autofocus>

                                        @if ($errors->has('ios_app_url'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ios_app_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Facebook URL') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('facebook_url') ? ' is-invalid' : '' }}" name="facebook_url" value="{{ $setting->facebook_url}}" required autofocus>

                                        @if ($errors->has('facebook_url'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('facebook_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Whatsapp URL') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('whatsapp_url') ? ' is-invalid' : '' }}" name="whatsapp_url" value="{{ $setting->whatsapp_url}}" required autofocus>

                                        @if ($errors->has('whatsapp_url'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('whatsapp_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Instgram URL') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('instgram_url') ? ' is-invalid' : '' }}" name="instgram_url" value="{{ $setting->instgram_url}}" required autofocus>

                                        @if ($errors->has('instgram_url'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('instgram_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Youtube URL') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('youtube_url') ? ' is-invalid' : '' }}" name="youtube_url" value="{{ $setting->youtube_url}}" required autofocus>

                                        @if ($errors->has('youtube_url'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('youtube_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Twitter URL') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('twitter_url') ? ' is-invalid' : '' }}" name="twitter_url" value="{{ $setting->twitter_url}}" required autofocus>

                                        @if ($errors->has('twitter_url'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('twitter_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('About Blood Bank') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" name="about" value="{{ $setting->about}}" required autofocus>

                                        @if ($errors->has('about'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>




                            @endforeach

                            <button class="btn btn-app"  name="submit" type="submit"  >
                                <i class="fa fa-save" > save site setting</i>

                            </button>

                        </form>



                    </div>

                </div>
            </div>
        </div>
    </section>




























@endsection



