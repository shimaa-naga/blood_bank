
@extends('admin.layout')

@section('title')

    Edit Site Setting

@endsection



@section('header')
    <style>
        #map {
            height: 400px;
            width: 700px;
            padding: 5px 5px 5px 5px;
        }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js"></script>



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








                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $order->name}}" autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $order->age}}"  autofocus>

                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Bags Number') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('number_of_bags') ? ' is-invalid' : '' }}" name="number_of_bags" value="{{ $order->number_of_bags}}"  autofocus>

                                    @if ($errors->has('number_of_bags'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_of_bags') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Blood Type') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('blood_type') ? ' is-invalid' : '' }}" name="blood_type" value="{{ $order->blood_type}}" autofocus>

                                    @if ($errors->has('blood_type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('blood_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hospital Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('hospital_name') ? ' is-invalid' : '' }}" name="hospital_name" value="{{ $order->hospital_name}}" autofocus>

                                    @if ($errors->has('hospital_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hospital_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $order->phone}}" required autofocus>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}" name="city_id" value="{{optional($order->city)->name}}"  autofocus>

                                        @if ($errors->has('city_id'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Details :') }}</label>

                                <div class="col-md-6">
                                         <textarea id="name" type="text" class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" name="details" value="{{ old('details') }}" >
                                                {{$order->details }}
                                        </textarea>
                                    @if ($errors->has('details'))
                                        <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('details') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Place') }}</label>

                                <div id="map" ></div>


                                    <script>
                                        function initMap() {

                                            var uluru = {lat: {{$order->latitude}}, lng: {{$order->longitude}}};
                                            {{-- var uluru = {lat: 30.042238, lng: 31.241463}; --}}
                                            var map = new google.maps.Map(document.getElementById('map'), {
                                                zoom: 4,
                                                center: uluru
                                            });
                                            var marker = new google.maps.Marker({
                                                position: uluru,
                                                map: map
                                            });
                                        }
                                    </script>
                                    <script async defer
                                            src=
                                            "https://maps.googleapis.com/maps/api/js?key=
                                            AIzaSyB2bXKNDezDf6YNVc-SauobynNHPo4RJb8&callback=initMap">
                                    </script>


                                </div>



                        <button type="button" class="btn  btn-primary"><a href="{{url('/adminpanel/orders')}}"> Back </a></button>

                        <button type="button" class="btn  btn-danger"><a href="{{url('/adminpanel/order/'.$order->id.'/delete')}}">Delete Order</a></button>



                    </div>

                </div>
            </div>
        </div>
    </section>





@endsection



