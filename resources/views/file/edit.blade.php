<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Upload Image laravel</title>
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
        .container #btn:hover {
            background-color: red;
        }
        img {
            width: 600px;
            height: 300px;
            margin-bottom: 10px;
        }
        .form {
            border: 1px solid;
            padding: 20px 20px 10px 10px;
        }
    </style>

</head>
<body>
<div class="container mt-4">
    <h1>Laravel Edit Upload File</h1>
    <br>
    <a class="btn btn-primary btn-sm  mb-3" href="{{ route('file.index') }}">All Files</a>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$error}}.
        </div>
    @endforeach
    <form class="needs-validation" action="{{route('file.update', $file->id)}}" method="POST"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form">
            <div class="form-row">
                <div class="col-md-12">
                    <label for="validationTooltip04">Choose a File</label>
                    <div class="form-group">
                        <input type="file" class="form-control-file border" name="file">
                    </div>
                </div>
                <br>
                <button class="btn btn-primary btn-sm" type="submit">Update</button>
            </div>
        </div>
    </form>
    <br>
    <div class="row">
        <div class="text-center" style="padding-left: 1rem;">
            <a style="white-space: pre-line;" class="badge badge-primary mb-3" href="{{url('/files')}}/{{$file->url}}" target="-_blank">{{ $file->name }}</a>
        </div>
    </div>
</div>
</body>
</html>