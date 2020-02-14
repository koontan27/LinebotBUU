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
    <div class = "container-fluid"> 
    <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class = "text-center" style="width:100px">ลำดับ</th> 
      <th scope="col" class = "text-center">รูป</th>
      <th scope="col" class = "text-center">ข้อมูล</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class = "text-center">1</th>
      <td class ="text-center">{{$pic}}</td>
      <td class ="text-center">
        <p>Otto</p>
        <p>Otto</p>
        <p>Otto</p>
      </td>
    </tr>
    <tr>
      <th scope="row" class = "text-center">2</th>
      <td class ="text-center">Jacob</td>
      <td class ="text-center">Thornton</td>
    </tr>
    <tr>
      <th scope="row" class = "text-center">3</th>
      <td class ="text-center">Larry</td>
      <td class ="text-center">the Bird</td>
    </tr>
  </tbody>
</table>
</div>



    </body>
</html>
