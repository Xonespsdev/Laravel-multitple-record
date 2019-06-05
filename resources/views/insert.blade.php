<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .form{
                background: #eee;
                border: 1px solid;
                padding: 20px 20px 10px 10px;
            }
            .title h1{
              font-size: 38px;
              font-weight: 600;
            }
        </style>
    </head>
    <body>
        <div class="container">
           <div class="title"> <h1>Add Data Multitple Record</h1></div>
{{--             @if(count($errors->all())>0)
            {{dd($errors->all())}}
            @endif
 --}}
 <form class="needs-validation" action="{{route('contact.save')}}" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="sel1">Number Record</label>
        <input type="number" class="form-control" name="record" placeholder="Number Record"
        required>
</div>
  <div class="form">
 {{ csrf_field() }}
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label>First name</label>
      <input type="text" class="form-control" name="name" placeholder="First name"
        required>
    </div>
    <div class="col-md-6 mb-3">
      <label>Last name</label>
      <input type="text" class="form-control" name="lastname" placeholder="Last name">
    </div>
  </div>
      <div class="form-check-inline">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male" checked>Male
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female">Female
      </label>
    </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label>Age</label>
      <input type="number" class="form-control" name="age" placeholder="Age" required>
    </div>
    <div class="col-md-6 mb-3">
      <label>Phone</label>
      <input type="number" class="form-control" name="phone" placeholder="Phone" required>
    </div>
  </div>
  <div class="form-row">
    <label>Address</label>
      <input type="text" class="form-control" name="address" placeholder="Address" required>
  </div>
<br>
 <button class="btn btn-primary btn-sm" type="submit">Save</button>
</div>
</form>
        </div>
    </body>
</html>
