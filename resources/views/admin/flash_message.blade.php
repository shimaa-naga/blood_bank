


@if(Session::has('flash_message'))

    <script>




        swal({
            //position: 'absolute',
            position: 'top-end',
            type: 'success',
            icon: "success",
            title: '{{Session::get('flash_message')}}',
            showConfirmButton: false,
            text:"this message will display after 5 seconds",
            timer: 5000
        })
    </script>


@endif