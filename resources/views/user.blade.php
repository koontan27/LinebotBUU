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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>ข้อมูลนิสิต</title>
</head>

<body>
  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    window.onload = function() {
      var getUsername = localStorage.getItem("username");
      document.getElementById('usernameShow').innerHTML = getUsername;
    };

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

    function message() {
      $.ajax({
        type: "GET",
        url: '/main/Userdata/message',
      });
    }

    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("myTable");
      switching = true;
      dir = "asc";
      while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              shouldSwitch = true;
              $("#sortBtn").attr('class', 'fa fa-sort-up');

              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              shouldSwitch = true;
              $("#sortBtn").attr('class', 'fa fa-sort-down');

              break;
            }
          }
        }
        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          switchcount++;
        } else {
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }
  </script>

  <nav class="navbar navbar-expand-lg sticky-top navbar-light" style="background-color: rgb(226, 196, 123);">
    <div class="container">
      <a class="navbar-brand" href="/main">LINE CHATBOT BUU</a>
    </div>
    <div class="dropdown">
      <button class="outline-primary my-2 my-sm-0 dropdown-toggle" style="margin-left:55px" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span id="usernameShow"></span>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <button class="dropdown-item" type="button" onclick="removeUname()">ออกจากระบบ</button>
      </div>
    </div>
    </div>
  </nav>

  <div class="container">
    <form class="form-inline">
      <div class="form-group mt-2 mb-2 ml-auto p-2" style="margin-right: 7px">
        <input class="form-control mr-sm-1 ml-auto" type="text" placeholder="กรอกชื่อผู้ใช้" id="myInput">
        <button class="btn btn-dark ml-auto" type="button" onclick="myFunction()">ค้นหา <i class="fa fa-search"></i></button>
      </div>
    </form>

    <div class="container-fluid">
      <table class="table table-bordered" id="myTable">
        <thead>
          <tr>
            <th onclick="sortTable(0)" scope="col" class="text-center" style="width:100px; cursor:pointer;">ชื่อผู้ใช้ <i id="sortBtn" class="fa fa-sort-down"></i></th>
            <th scope="col" class="text-center">รูปภาพ</th>
            <th scope="col" class="text-center">ชื่อ-นามสกุล</th>
            <th scope="col" class="text-center">ชื่อ line</th>
            <th scope="col" class="text-center">สถานะ</th>
            <th scope="col" class="text-center">วันและเวลาที่เข้าสู่ระบบ</th>
            <th scope="col" class="text-center">เครื่องมือ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($a2 as $item)
          <tr>
            <td class="text-center">{{$item->username}}</td>
            <td class="text-center"><img src="{{ $item->picture }}" width="120" height="120" /></td>
            <td class="text-center">
              {{$item->prefix_thai}}{{$item->name_thai}} {{$item->surname_thai}}
            </td>
            <td class="text-center">{{$item->displayName}}</td>

            <td class="text-center">{{$item->status}}</td>
            <td class="text-center">{{$item->updated_at}}</td>
            <td class="text-center">
              <a hidden="true">{{$item->userId}}</a>
              <button class="btn btn-info" type="button">ดูข้อมูล <i class="fa fa-info-circle"></i></button>
              <button class="btn btn-danger" type="button">ลบ <i class="fa fa-trash"></i></button>
              <button class="btn btn-success" style="margin-top:10px" type="button" data-toggle="modal" data-target="#messageModel">ส่งข้อความ <i class="fa fa-envelope"></i></button>
            </td>
          </tr>
          <div class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="messageModelLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="messageModelLabel">ส่งข้อความหาผู้ใช้</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">ข้อความ:</label>
                      <textarea class="form-control" id="message-text"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                  <button type="button" class="btn btn-primary" onclick="message()">ส่งข้อความ</button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</body>

</html>