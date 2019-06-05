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
            .title h1{
              font-size: 38px;
              font-weight: 600;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="title">
              <h1>All Data Multitple Record</h1>
            </div>
            <br>
            <a type="submit" class="btn btn-primary btn-sm" href="{{route ('contact.add')}}">Add Contact</a>
           <a type="submit" class="btn btn-primary btn-sm" href="{{route ('image.index')}}">Add Image</a>
            <!-- <input class="form-control" type="text" placeholder="Search" aria-label="Search"> -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Gender</th>
     <th scope="col">Age</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
     <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach($contacts as $idx => $contact)
    <tr>
      <td scope="row">{{$idx+1}}</td>
      <td> {{$contact->name }}</td>
      <td>{{$contact->lastname }}</td>
     <td>{{$contact->gender }}</td>
      <td>{{$contact->age }}</td>
      <td>{{$contact->phone }}</td>
     <td>{{$contact->address }}</td>
      <td>
        <div class="btn-group">
                         <a class="btn btn-success" href="{{route ('contact.edit', $contact->id)}}" >Edit</a>
        </div>
             <div class="btn-group">
                    <form action="{{route('contact.delete',$contact->name)}}" method="POST">
                 {{ csrf_field() }}   
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="delete">
                 <button onclick="return confirmdelete()" type="submit" class="btn btn-danger">Delete</button>
               </form>
             </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <section class="container-paginate">
    <nav class="nav-lef-right wrap-paginate js-center" aria-label="Page navigation activity">
        {{ $contacts->links() }}
    </nav>
  </section>
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
