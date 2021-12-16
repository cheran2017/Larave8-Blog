<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

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
                <a href="{{url('list-posts')}}" class="btn btn-xs btn-primary">View List</a>
                <form action="{{url('add-post')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group mt-2 ml-4">
                        <label for="title">Title :</label>
                        <input type="text" name="title"  class="form-control"> 
                    </div>
                    <div class="form-group mt-2 ml-4">
                        <label for="image-upload">Image upload :</label>
                        <input type="file" name="image"  class="form-control"> 
                    </div>
                    <div class="form-group mt-2 ml-4">
                        <label for="image-upload">Description :</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group mt-2 ml-4 mb-3">
                        <button class="btn btn-primary form-control" type="submit">Add Post</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
