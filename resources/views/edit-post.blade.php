<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
        <div class="container mt-5">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
            <form action="{{url('update-post')}}" method="post" enctype="multipart/form-data">
                @csrf 
                <input type="hidden" value="{{$post->id}}" name="id">
                <div class="form-group mt-2 ml-4">
                    <label for="title">Title :</label>
                    <input type="text" name="title" value="{{$post->title}}"  class="form-control"> 
                </div>
                <div class="form-group mt-2 ml-4">
                    <label for="image-upload">Image upload :</label>
                    <img src="{{asset('images/'.$post->image)}}" height="100" width="100" alt="">
                    <input type="file" name="image"  class="form-control"> 
                </div>
                <div class="form-group mt-2 ml-4">
                    <label for="image-upload">Description :</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$post->description}}
                    </textarea>
                </div>
                <div class="form-group mt-2 ml-4 mb-3">
                    <button class="btn btn-primary form-control" type="submit">Update Post</button>
                </div>
                
            </form>
        </div>
</body>
</html>