<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.send-btn').click(function(){         
   
    


  }); 
});
</script>

</head>
<body>

<div class="secure">Secure Login form</div>
{!! Form::open(array('url'=>'ajaxtest','method'=>'POST', 'id'=>'myform')) !!}
<div class="control-group">
  <div class="controls">
     {!! Form::text('email','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Email')) !!}
  </div>
</div>
<div class="control-group">
  <div class="controls">
  {!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
  </div>
</div>
{!! Form::button('Login', array('class'=>'send-btn')) !!}
{!! Form::close() !!}




<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>

</body>
</html>