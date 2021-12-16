<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <div class="row">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="col-md-4 mt-3">
                        <div class="card" >
                            <img  src="{{asset('images/'.$post->image)}}" class="card-img-top" alt="Image">
                            <div class="card-body">
                                <a href="{{url('blog-details')}}/{{$post->id}}" class="">{{$post->title}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-12 mt-4">
                {{$posts->links()}}
                </div>
            @else
                <h1>No Posts Found !</h1>
            @endif
        </div>
    </div>
</body>
</html>