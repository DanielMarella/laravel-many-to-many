@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{route('admin.projects.update', $project->id)}}" method="POST">
                @csrf
                @method('PUT')

                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="mb-3">
                    <label for="title" class="form-label">
                        Title
                    </label>
                    <input type="text" class="form-control" id="title" placeholder="Insert your project's title" name="title" value="{{old('title' , $project->title)}}">
                </div>
                @error('image')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" class="form-control" id="image" placeholder="insert image link" name="image" value="{{old('image' , $project->image)}}">
                </div>
                @error('content')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" rows="7" name="content" >
                       {{old('content' , $project->content)}}
                    </textarea>
                </div>
                <button type="submit">Create new project</button>
                <button type="reset">Reset</button>

            </form>
        </div>
    </div>
</div>
@endsection
