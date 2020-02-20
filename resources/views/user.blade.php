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

  <title>Laravel</title>
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
</script>
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">LINE CHAT BOT BUU</a>
  </div>
</nav>

  <div class="container">
    <form class="form-inline">
      <div class="form-group mt-2 mb-2 ml-auto p-2">
        <input class="form-control mr-sm-1 ml-auto" type="text" placeholder="กรอกรหัสนิสิต" id="myInput">
        <button class="btn btn-outline-success ml-auto" type="button" onclick="myFunction()">ค้นหา</button>
      </div>
    </form>

    <div class="container-fluid">
      <table class="table table-bordered" id="myTable">
        <thead>
          <tr>
            <th scope="col" class="text-center" style="width:100px">รหัสนิสิต</th>
            <th scope="col" class="text-center">รูปภาพ</th>
            <th scope="col" class="text-center">ชื่อ-นามสกุล</th>
            <th scope="col" class="text-center">ชื่อ line</th>
            <th scope="col" class="text-center">สถานะ</th>
            <th scope="col" class="text-center">เครื่องมือ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($a2 as $index => $item)
          <tr>
            <td class="text-center">{{$item->username}}</td>
            <td class="text-center"><img src="{{ $item->picture }}" width="120" height="120" /></td>
            <td class="text-center">
              {{$item->prefix_thai}}{{$item->name_thai}} {{$item->surname_thai}}
            </td>
            <td class="text-center">{{$item->displayName}}</td>

            <td class="text-center">{{$item->status}}</td>
            <td class="text-center">
              <button class="btn btn-warning" type="button">Edit</button>
              <button class="btn btn-danger" type="button">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>