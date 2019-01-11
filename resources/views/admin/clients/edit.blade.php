


@extends('admin.index')

@section('title')

    Edit User
    {{$user->name}}

@endsection



@section('header')



@endsection




@section('content')

    <section class="content-header">
        <h1>
            Edit User Data
            {{$user->name}}

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="{{url('/adminpanel/users')}}">All Users</a></li>
            <li ><a href="{{url('/adminpanel/users/create')}}">Add Users</a></li>
            <li class="active"><a href="{{url('/adminpanel/users/'.$user->id.'/edit')}}">Edit User {{$user->name}}</a></li>

        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">



                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit User {{$user->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">





                        <form method="post" action="{{url('/adminpanel/users/'.$user->id)}}">
                            @csrf


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

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
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
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








    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">



                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Change User Password {{$user->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        {!! Form::open(['url'=>"/adminpanel/users/'.$user->id", 'method'=>'post']) !!}
                        <input type="hidden" value="{{$user->id}}" name="user_id">




                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="submit">

                                    {{ __('Change Password') }}
                                </button>


                                @if($user->id != 1)
                                    <a href="{{url('/adminpanel/users/'.$user->id.'/delete')}}" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i> delete user</a>
                                @endif


                            </div>
                        </div>


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>












@endsection






@section('footer')





@endsection