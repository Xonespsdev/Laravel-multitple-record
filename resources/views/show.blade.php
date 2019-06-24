<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>All Contacts - Show: @if(app('request')->get('record') <= $total) {{  app('request')->get('record') }} @else {{ $total }} @endif  of Total: {{ $total }} Records - Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        .title h1 {
            font-size: 38px;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="title">
        <h1>All Data - Show: @if(app('request')->get('record') <= $total) {{  app('request')->get('record') }} @else {{ $total }} @endif  of Total: {{ $total }} Records - Laravel.</h1>
    </div>
    <br>
    <a class="btn btn-primary btn-sm" href="{{ route('guest.home') }}">All Contacts</a>
    <div class="mt-4">
        <h4>Show data with specific record(s).</h4>
        <form class="needs-validation" action="{{ route('contact.show') }}" method="GET">
            <div class="form-group">
                <label for="sel1">Number Record</label>
                <input min="1" max="{{ $total }}" type="number" class="form-control" name="record"
                       value="{{ app('request')->get('record') }}"
                       placeholder="Number Record"
                       required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Show</button>
            </div>
        </form>
    </div>


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
                <td scope="row">{{$idx + 1 + (( (app('request')->get('page') ?: 1) * 10) - 10)}}</td>
                <td> {{$contact->name }}</td>
                <td>{{$contact->lastname }}</td>
                <td>{{$contact->gender }}</td>
                <td>{{$contact->age }}</td>
                <td>{{$contact->phone }}</td>
                <td>{{$contact->address }}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-success" href="{{route ('contact.edit', $contact->id)}}">Edit</a>
                    </div>
                    <div class="btn-group">
                        <form action="{{route('contact.delete',$contact->name)}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="delete">
                            <button onclick="return confirmdelete()" type="submit" class="btn btn-danger">Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        function confirmdelete() {
            return confirm('Are you sure you want to delete?');
        }
    </script>
</div>
</body>
</html>