<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 CRUD - websolutionstuff.com</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <style>
    svg{
        display:none;
    }
    </style>
</head>
<body>
  
<div class="container" style="margin-top: 15px;">
    @yield('content')
</div>

<script type="text/javascript">

        $(document).ready(function() {
            $(".btn-submit").click(function(e){
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var title = $("#title").val();
                var body = $("#body").val();
              

                $.ajax({
                    url: "{{ route('ajaxCreatePost') }}",
                    type:'POST',
                    data: {_token:_token, title:title, body:body},
                    success: function(data) {
                      printMsg(data);
                    }
                });
            }); 

            function printMsg (msg) {
              if($.isEmptyObject(msg.error)){
                  console.log(msg.success);
                  $('.alert-block').css('display','block').append('<strong>'+msg.success+'</strong>');
              }else{
                $.each( msg.error, function( key, value ) {
                  $('.'+key+'_err').text(value);
                });
              }
            }
        });
    </script>
   
</body>
</html>