<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Edit Contact</title>
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

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }
    .form{
      background: #eee;
      border: 1px solid;
      padding: 20px 20px 10px 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Update Data Multitple Record in Laravel</h1>
    <form class="needs-validation" action="{{route('contact.update', $contactEdit->id)}}" method="POST">
      <div class="form-group">
        <label for="sel1">Number Record</label>
        <input type="number" class="form-control" name="record" value="{{App\Contacts::where('name',$contactEdit->name)->count()}}" placeholder="Number Record"
        required>
      </div>
{{--       @if($errors->count()> 0)
        {{dd($errors->all()) }}
      @endif --}}
      <div class="form">

       {{ csrf_field() }}
       <div class="form-row">
        <div class="col-md-6 mb-3">
          <label>First name</label>
          <input type="text" class="form-control" name="name" placeholder="First name"
          required value="{{$contactEdit->name}}">
        </div>
        <div class="col-md-6 mb-3">
          <label>Last name</label>
          <input type="text" class="form-control" name="lastname" placeholder="Last name" value="{{$contactEdit->lastname}}" >
        </div>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label" for="radio1">
          <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male"
          {{ ($contactEdit->gender=="Male")? "checked" : "" }}>Male
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label" for="radio2">
          <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female
          "  {{ ($contactEdit->gender=="Female")? "checked" : "" }}>Female
        </label>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label>Age</label>
          <input type="number" class="form-control" name="age" placeholder="Age" value="{{$contactEdit->age}}" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Phone</label>
          <input type="number" class="form-control" name="phone" placeholder="Phone" required value="{{$contactEdit->phone}}">
        </div>
      </div>
      <div class="form-row">
        <label>Address</label>
        <input type="text" class="form-control" name="address" placeholder="Address" required value="{{$contactEdit->address}}">
      </div>
      <br>
      <button class="btn btn-primary btn-sm" type="submit">Update</button>

    </div>
  </form>
</div>
</body>
</html>
