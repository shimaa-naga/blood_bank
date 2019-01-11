
@extends('admin.index')

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


                       {{--   {{test()}} --}}


                        <form action="{{url('/adminpanel/sitesetting')}}" method="post">
                            {{csrf_field()}}

                        @foreach($sitesetting as $setting)






                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('site_name') ? ' is-invalid' : '' }}" name="site_name" value="{{ $setting->site_name }}" required autofocus>

                                        @if ($errors->has('site_name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('site_name') }}</strong>
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



