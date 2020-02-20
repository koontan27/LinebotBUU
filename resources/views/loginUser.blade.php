<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Login</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
	  <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">

    <script src="https://static.line-scdn.net/liff/edge/2.0/sdk.js"></script>

  </head>
  <body onload="getId()">
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90">
            <span class="login100-form-title p-b-51">เข้าสู่ระบบ</span>

            <form action="/Login/user" method="post">@csrf
            <div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
              <input class="input100" id="uname" type="text" name="userN" placeholder="รหัสประจำตัว">
            </div>
            
            <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
              <input class="input100" id="pword" type="password" name="passW" autocomplete  ="off" placeholder="รหัสผ่าน">
            </div>
            
              <input type="submit" value="เข้าสู่ระบบ" name="submit" id="smit" class="login100-form-btn" >
            </form>
        </div>
      </div>
    </div>
  </body>
</html>
