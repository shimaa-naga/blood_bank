


@extends('admin.index')

@section('title')

    Edit User
    {{$client->name}}

@endsection



@section('header')



@endsection




@section('content')

    <section class="content-header">
        <h1>
            Edit User Data
            {{$client->name}}

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="{{url('/adminpanel/clients')}}">All Clients</a></li>
            <li ><a href="{{url('/adminpanel/client/create')}}">Add Client</a></li>
            <li class="active"><a href="{{url('/adminpanel/client/'.$client->id.'/edit')}}">Edit Client {{$client->name}}</a></li>

        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">



                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Client {{$client->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">





                        <form method="post" action="{{url('/adminpanel/client/'.$client->id)}}">
                            @csrf


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $client->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$client->email}}" required>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control{{ $errors->has('Phone') ? ' is-invalid' : '' }}" name="Phone" value="{{$client->phone}}" required>

                                    @if ($errors->has('Phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{$client->dob}}" required>

                                    @if ($errors->has('dob'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Donation Last Date') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="date" class="form-control{{ $errors->has('donation_last_date') ? ' is-invalid' : '' }}" name="donation_last_date" value="{{$client->donation_last_date}}" required>

                                    @if ($errors->has('dob'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('donation_last_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Blood Type :') }}</label>

                                <div class="col-md-6">

                                    <select  id="name" class="form-control{{ $errors->has('blood_type') ? ' is-invalid' : '' }}" name="blood_type"  required>
                                        <option {{old('blood_type','blood_type')=="A+"? 'selected':''}}  value="A+">A+</option>
                                        <option {{old('blood_type','blood_type')=="A-"? 'selected':''}}  value="A-">A-</option>
                                        <option {{old('blood_type','blood_type')=="B+"? 'selected':''}}  value="B+">B+</option>
                                        <option {{old('blood_type','blood_type')=="B-"? 'selected':''}}  value="B-">B-</option>
                                        <option {{old('blood_type','blood_type')=="O+"? 'selected':''}}  value="O+">O+</option>
                                        <option {{old('blood_type','blood_type')=="O-"? 'selected':''}}  value="O-">O-</option>
                                        <option {{old('blood_type','blood_type')=="AB+"? 'selected':''}}  value="AB+">AB+</option>
                                        <option {{old('blood_type','blood_type')=="AB-"? 'selected':''}}  value="AB-">AB-</option>

                                    </select>
                                    @if ($errors->has('blood_type'))
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('blood_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City :') }}</label>

                                <div class="col-md-6">

                                    <select  id="name" class="form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}" name="city_id"  required>
                                        <option {{old('city_id','city_id')=="1"? 'selected':''}}  value="1">ÿ‰ÿ«</option>
                                        <option {{old('city_id','city_id')=="2"? 'selected':''}}  value="2">«·„‰’Ê—…</option>
                                        <option {{old('city_id','city_id')=="3"? 'selected':''}}  value="3">»·ﬁ«”</option>
                                        <option {{old('city_id','city_id')=="4"? 'selected':''}}  value="4">œ”Êﬁ</option>
                                        <option {{old('city_id','city_id')=="5"? 'selected':''}}  value="5">”ÌœÌ ”«·„</option>

                                    </select>
                                    @if ($errors->has('city_id'))
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('city_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="submit">

                                        {{ __('Update') }}
                                    </button>


                                </div>
                            </div>



                        </form>



                    </div>

                </div>
            </div>
        </div>
    </section>






@endsection






@section('footer')





@endsection