<?php

require_once '../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en,{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">

  <title>หน้าหลัก</title>

  <script>
    function ready() {
      var getUsername = localStorage.getItem("username");
      document.getElementById('usernameShow').innerHTML = getUsername;
    }
    document.addEventListener("DOMContentLoaded", ready);

    function removeUname() {
      $.ajax({
        type: "GET",
        url: 'logout',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
          window.location.href = '/'
          console.log('logged out');
        }
      });
      localStorage.removeItem("username");
    }
  </script>
</head>

<body>

  <nav class="navbar navbar-expand-lg sticky-top navbar-light" style="background-color: rgb(226, 196, 123);">
    <div class="container">
      <a class="navbar-brand " href="/main">LINE CHATBOT BUU</a>
    </div>
    <div class="dropdown">
      <button class="outline-primary my-2 my-sm-0 dropdown-toggle" style="margin-left:55px" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span id="usernameShow"></span>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <button class="dropdown-item" name="submit" type="button" onclick="removeUname()">ออกจากระบบ</button>
      </div>
    </div>
    </div>
  </nav>
  <div class="limiter">
    <div class="container-main">
      <div class="wrap-login100 p-t-50 p-b-10">
        <span class="text-form p-b-51 ">ระบบสารสนเทศเพื่อจัดการ LINE CHATBOT</span>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <h5 class="card-header">จัดการผู้ใช้</h5>
          <div class="card-body">
            <div class="row row-cols-2">
              <div class="col text-center">
                <a href="/main/Admindata"><img src="https://i.imgur.com/Yb39ZCX.png" class="rounded-circle" style="cursor:pointer;" width="120" height="120">
                  <p class="text-left text-form text-center" style="margin-top:10px">จัดการเจ้าหน้าที่</p>
                </a>
              </div>
              <div class="col text-center">
                <a href="/main/Userdata"><img src="https://i.imgur.com/HxE3z2I.png" class="rounded-circle " style="cursor:pointer;" width="120" height="120">
                  <p class="text-left text-form text-center" style="margin-top:10px;">จัดการผู้ใช้ไลน์</p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <h5 class="card-header">จัดการริชเมนู</h5>
          <div class="card-body">
            <div class="col text-center">
              <a href="/main"><img src="https://i.imgur.com/OsYrKDx.png" class="rounded-circle " style="cursor:pointer;" width="120" height="120">
                <p class="text-left text-form text-center" style="margin-top:10px;">รายการริชเมนู</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container" style="margin-top:20px; margin-bottom:40px;">
    <div class="row">
      <div class="col">
        <div class="card">
          <h5 class="card-header">ตั้งค่า LINE CHATBOT</h5>
          <div class="card-body">
            <div class="col text-center">
              <a href="/main/Admindata" data-toggle="modal" data-target="#configModel"><img src="https://i.imgur.com/QK14qN0.png" class="rounded-circle" style="cursor:pointer;" width="120" height="120">
                <p class="text-left text-form text-center" style="margin-top:10px">ตั้งค่าการใช้งาน</p>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="configModel" tabindex="-1" role="dialog" aria-labelledby="configModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="configModelLabel">ตั้งค่าการใช้งาน</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Channel access token:</label>
                  <input class="form-control" id="message-text1"></input>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Channel secret:</label>
                  <input class="form-control" id="message-text2"></input>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-primary" >ยืนยัน</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
      </div>
    </div>
  </div>
</body>

</html>