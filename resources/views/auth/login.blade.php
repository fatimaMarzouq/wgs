<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Wgs</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<style type="text/css">
    body{
        background: #f1f8fe;
    }
.form-style input {
    border: 1px solid grey;
    height: 50px;
    border-radius: 0;
    /* border-bottom: 1px solid #ebebeb; */
}
.input-group .input-group-addon {
    border-radius: 0;
    border-color: #d2d6de;
    background-color: #dfecf4;
    padding: 10px;

}
.form-style input:focus{
border-bottom:1px solid #007bff;    
box-shadow:none;
outline:0;
background-color:#ebebeb;   
}
.sideline {
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    text-align: center;
    color:#ccc;
}
button{
height:50px;    
}
.sideline:before,
.sideline:after {
    content: '';
    border-top: 1px solid #ebebeb;
    margin: 0 20px 0 0;
    flex: 1 0 20px;
}

.sideline:after {
    margin: 0 0 0 20px;
}
.login-wrpr {
    min-height: 84vh;
    width: 450px;
    background: #fff;
    border-radius: 2px;
    position: relative;
    /*display: flex;*/
    align-items: center;
   padding: 0 18px;
    margin: 32px 116px;

}
@media (min-width: 768px){
.col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
}
}

@media(max-width: 768px){
    .frm{
        width: 250px;
    }
       
}
@media only screen and (min-width: 330px) and (max-width: 500px){
.login-wrpr {
    min-height: 84vh;
    width: 295px;
    background: #fff;
    border-radius: 2px;
    position: relative;
    /* display: flex; */
    align-items: center;
    padding: 12px;
    margin: 52px 47px;
} 

}
@media only screen and (min-width: 510px) and (max-width: 600px){
.login-wrpr {
    min-height: 84vh;
    width: 295px;
    background: #fff;
    border-radius: 2px;
    position: relative;
    /* display: flex; */
    align-items: center;
    padding: 12px;
    margin: 52px 112px;
} 

}
@media only screen and (min-width: 610px) and (max-width: 992px){
.login-wrpr {
    min-height: 84vh;
    width: 295px;
    background: #fff;
    border-radius: 2px;
    position: relative;
    /* display: flex; */
    align-items: center;
    padding: 12px;
    margin: 52px 47px;
} 

}
@media only screen and (min-width: 993px) and (max-width: 1024px){
    .login-wrpr{
            min-height: 84vh;
    width: 400px;
    background: #fff;
    border-radius: 2px;
    position: relative;
    /* display: flex; */
    align-items: center;
    padding: 0 18px;
    margin: 20px 55px;
    }
}
@media only screen and (min-width: 1400px) and (max-width: 1440px){
    .login-wrpr{
    min-height: 68vh;
    margin: 144px 136px;
    }
}
@media only screen and (min-width: 1600px) and (max-width: 1990px){
.login-wrpr {
   min-height: 62vh;
    width: 400px;
    background: #fff;
    border-radius: 2px;
    position: relative;
    /*display: flex;*/
    align-items: center;
   padding: 0 18px;
    margin: 169px 245px;
} 

}
@media only screen and (min-width: 2000px) and (max-width: 3390px){
.login-wrpr {
    min-height: 41vh;
    width: 836px;
    background: #fff;
    border-radius: 2px;
    position: relative;
    /* display: flex; */
    align-items: center;
    padding: 0 18px;
    margin: 407px 379px;
}
}
@media only screen and (min-width: 4000px) and (max-width: 5550px){
.login-wrpr {
    min-height: 55vh;
    width: 800px;
    background: #fff;
    border-radius: 2px;
    position: relative;
    /* display: flex; */
    align-items: center;
    padding: 0 18px;
    margin: 285px 910px;
}

}
@media(max-width: 320px){
.login-wrpr {
    min-height: 84vh;
    width: 295px;
    background: #fff;
    border-radius: 2px;
    position: relative;
    /* display: flex; */
    align-items: center;
    padding: 12px;
    margin: 52px 14px;
} 

}
@media(max-width: 280px){
.login-wrpr {
    min-height: 84vh;
    width: 271px;
    background: #fff;
    border-radius: 2px;
    position: relative;
    /* display: flex; */
    align-items: center;
    padding: 12px;
    margin: 52px 14px;
} 

}
</style>    
<body style="width:99%;">
<div class="container-fluid p-0">
      @if(Session::has('error_flash_message'))
              <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{ Session::get('error_flash_message') }}
              </div>
              @endif
              <form method="POST" action="{{ route('login') }}">
                    @csrf
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        
     
        <div class="row">

        <!-- <div class="hidden-xs hidden-sm col-md-8">

          <img class="img-fluid login-image" src="https://bulletinline.com/wp-content/uploads/2020/08/Container-Runtime-Software.jpg">
      </div> -->
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
         
<div class="login-wrpr" style="display: block;"> 
    <div class="backgroundsec" style="background-image: linear-gradient(rgba(255, 0, 0, 0.45), 
    rgba(255, 0, 0, 0.45)),url('http://cvs-global.com/alpha/nichefield/images/company/logo/Capture.JPG');height: 200px;">
        
    </div>
        <div class="text-left" >
           
                  <img src="http://cvs-global.com/alpha/nichefield/images/company/logo/61ee32c80db5a.png" style="width: 185px;margin: -25px 0 0 17px;" alt="logo">
                 
                </div>
        
<div class="form-style">

  <div class="form-group ">
  <label>Email</label>    
    <input id="email" type="text" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email"  autofocus  style="padding:10px;"/>
     @error('email')
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror   
  </div>
  <!-- <div class="form-group pb-3">   
    <input type="password" placeholder="Password" class="form-control" id="exampleInputPassword1">
   <i class="fa fa-eye-slash" id="togglePassword" style="cursor: pointer; margin-left: -30px; z-index: 100;"></i>
   <i class="fa fa-eye" aria-hidden="true"></i>
  </div> -->

    <div class="form-group">
    <label>Password</label>
    <!-- <div class="input-group" id="show_hide_password"> -->
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="current-password" style="padding:10px;" />
      <div class="input-group-addon">
        <a href=""><i class="fa fa-eye-slash" aria-hidden="true" style="color: black;font-weight: 700;"></i></a>
      </div>
       @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    <!-- </div> -->
  </div>

  <div class="d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center"><input name="" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Remember Me</span></div>

</div>
   <div class="pb-2">
  <button type="submit" id="login" class="btn btn-primary w-100 font-weight-bold mt-2">Login</button><br>

   </div>

  
  <div>
  <!-- <div><a href="">Forgot Password?</a></div> -->
  </div>
                        
    
     
</div>
</div>
 </div> 
<div class="col-md-3">
      </div>
</div>
</form>
</div>
<footer class="text-center">
    <b>@2022 <span >Niche </span></b>
        <!-- <strong>Copyright &copy; 2020-2021. All rights
          reserved. -->
      </footer>
<script type="text/javascript">
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>
</body>
</html>