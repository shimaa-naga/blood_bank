
@extends('admin.layout')

@section('title')

    Contact Details

@endsection



@section('header')




@endsection




@section('content')

    <section class="content-header">
        <h1>
            Contact Details

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/contacts')}}"> All Contacts</a></li>

        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">



                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Contact Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">








                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name : ') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $contact_details->name}}" autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email : ') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="age" value="{{ $contact_details->email}}"  autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone : ') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('number_of_bags') ? ' is-invalid' : '' }}" name="number_of_bags" value="{{ $contact_details->phone}}"  autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title : ') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $contact_details->title}}" autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Client send Message : ') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('hospital_name') ? ' is-invalid' : '' }}" name="name" value="{{ optional($contact_details->client)->name}}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Message :') }}</label>

                                <div class="col-md-6">
                                         <textarea id="name" type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" value="{{ old('message') }}" >
                                                {{$contact_details->message }}
                                        </textarea>
                                    @if ($errors->has('message'))
                                        <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('message') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>



                        <a href="{{url('/adminpanel/contacts')}}" class="btn btn-success ">
                            Back
                        </a>

                        <a href="{{url('/adminpanel/contact/'.$contact_details->id.'/delete')}}" class="btn btn-danger ">
                            Delete Message
                        </a>



                    </div>

                </div>
            </div>
        </div>
    </section>





@endsection



