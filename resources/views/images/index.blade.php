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
    .container #btn:hover {
      background-color: red;
    }
    img{
      width: 100%;
      height: 150px;
      margin-bottom: 10px;
    }
    .form{
      border: 1px solid;
      padding: 20px 20px 10px 10px;
    }
    button{
      margin-left: 4px;
    }
  </style>

</head>
<body>
  <div class="container">
    <h1>All images</h1>
    <br>
    <!-- <input class="form-control" type="text" placeholder="Search" aria-label="Search"> -->
    <form class="needs-validation" action="{{route('image.save')}}" method="POST" enctype="multipart/form-data">
     {{ csrf_field() }}
     <div class="form">
      <div class="form-row">
       <div class="col-md-12">
        <label for="validationTooltip04">Upload Image</label>
        <div class="form-group">
          <input type="file" class="form-control-file border" name="image" required>
        </div>
      </div>
      <br>
      <button class="btn btn-primary btn-sm" type="submit">Save</button>
    </div>
  </div>
</form>
<br>
<div class="row">
  @foreach($images as $img)
  <div class="col-md-3">
    <div class="text-center">
      <img src="images/{{$img->image}}" class="rounded" alt="image">
      <div class="form-row">
        {{--      <button style="margin-right: 8px;margin-left: 10px;" action="{{route('image.delete',$img->id)}}" method="POST" class="btn btn-danger" onclick="return confirmdelete()">Delete</button> --}}

        <div class="btn-group">
         <a href="{{route('image.edit',$img->id)}}" class="btn btn-success">Edit</a>
         <form action="{{route('image.delete',$img->id)}}" method="POST">
           {{ csrf_field() }}   
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <input type="hidden" name="_method" value="delete">
           <button onclick="return confirmdelete()" type="submit" class="btn btn-danger">Delete</button>
         </form>
       </div>
     </div>
   </div>
 </div>
 @endforeach
</div>
</div>

<script>
  function textchange(){
    var xicon = document.getElementById('icon').value;

    document.getElementById('iconshow').value = xicon;
  }
  function confirmdelete(){
    var result = confirm('Are you sure you want to delete?');
    if(result){
      return true;
    }else{
      return false;
    }
  }
</script>
</div>
</body>
</html>
