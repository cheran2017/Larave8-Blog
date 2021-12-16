<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Deleted Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    

    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">title</th>
                <th scope="col">image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($posts) >0)
            <a href="{{url('post-restore-all')}}" class="btn btn-xs btn-success">Restore all</a>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td><img heigh="100" width="100" src="{{asset('images/'.$post->image)}}" alt=""></td>
                    <td>
                        <a href="{{url('restore-post')}}/{{$post->id}}" class="btn btn-xs btn-warning">restore</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">No Posts Found !</td>
            </tr>
        @endif
            
        </tbody>
        </table>
    </div>
</body>
</html>