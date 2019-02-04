
@extends('admin.layout')

@section('title')

    Add Client

    @endsection



@section('header')



@endsection




@section('content')

    <section class="content-header">
        <h1>
            Add New User

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li ><a href="{{url('/adminpanel/clients')}}">All Clients</a></li>
            <li class="active"><a href="{{url('/adminpanel/client/create')}}">Add New Client</a></li>

        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">



                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add User With Full Data</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">




                        <form method="POST" action="{{ url('adminpanel/client/create') }}">

                        @include('admin.clients.form')

                        </form>



                     </div>

                </div>
            </div>
        </div>
    </section>





@endsection






@section('footer')





@endsection