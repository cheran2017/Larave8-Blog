<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    

    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
    <a href="{{url('dashboard')}}" class="btn btn-xs btn-success">Create Post</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">title</th>
                <th scope="col">image</th>
                <th scope="col">status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($posts) >0)
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td><img heigh="100" width="100" src="{{asset('images/'.$post->image)}}" alt=""></td>
                    <td>
                        @if($post->status == 1)
                            deactivated
                        @else
                            active
                        @endif
                    </td>
                    <td>
                        <a href="{{url('edit-post')}}/{{$post->id}}" class="btn btn-xs btn-warning">edit</a>
                        <a href="{{url('delete-post')}}/{{$post->id}}" class="btn btn-xs btn-danger">delete</a>
                        <a href="{{url('activate-post')}}/{{$post->id}}" class="btn btn-xs btn-success">A</a>
                        <a href="{{url('deactivate-post')}}/{{$post->id}}" class="btn btn-xs btn-info">D</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">No Posts Found !</td>
            </tr>
        @endif
            
        </tbody>
        </table>
    </div>
</body>
</html>