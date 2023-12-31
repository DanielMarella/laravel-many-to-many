@extends('layouts.app')

@section('content')
<div class="container" id="posts-container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header"> <strong> ID: </strong> {{ $project->id }}
                    <p class="mt-3">
                        <strong>Slug:</strong> <span class="mx-1">-{{ $project->slug }}-</span>
                    </p>
                    <p class="mt-3">
                        <strong>Type:</strong> <span class="mx-1">-{{ $project->type ? $project->type->name : '' }}-</span>
                    </p>
                    <p class="mt-3">
                       <strong>Technology:</strong>
                        @foreach ($project->technologies as $technology)
                            <span class="mx-1">-{{$technology->name}}-</span>
                        @endforeach
                    </p>
                </h5>

                @if (str_starts_with($project->image, 'http'))
                    <img src="{{$project -> image}}" class="card-img-top" alt="{{$project -> title}}">
                @else
                    <img src="{{asset('storage/' . $project -> image)}}" class="card-img-top" alt="{{$project -> title}}">
                @endif

                <div class="card-body">
                    <h5 class="card-title">
                        ID: {{$project -> id}}
                    </h5>
                    <h5 class="card-title">
                        Title: {{$project -> title}}
                    </h5>
                    <h5 class="card-title">
                        Slug: {{$project -> slug}}
                    </h5>
                    <p class="card-text">
                        {{$project -> content}}
                    </p>
                    <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-sm btn-success">
                        Edit
                    </a>
                    <form  class="d-inline-block" action="{{ route('admin.projects.destroy', $project) }} " method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
