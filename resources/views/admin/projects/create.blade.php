@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="mb-3">
                    <label for="title" class="form-label">
                        Title
                    </label>
                    <input type="text" class="form-control" id="title" placeholder="Insert your project's title" name="title" value="{{ old('title', '')}}">
                </div>

                @error('type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="type_id" class="form-label">
                        Title
                    </label>
                    <select class='form-select' name="type_id" id="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                @error('technologies')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror   
                <select class="form-select" name="technologies[]" multiple>
                    @foreach ($technologies as $technology)
                        <option value="{{ $technology->id }}" {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>
                            {{ $technology->name }}
                        </option>
                    @endforeach
                </select>



                @error('image')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    {{-- <input type="text" class="form-control" id="image" placeholder="insert image link" name="image"> --}}
                    <input type="file" name="image" id="image" class="form-control" placeholder="Upload your image">
                </div>

                @error('content')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" rows="7" name="content" >
                    {{ old('content', '')}}
                    </textarea>
                </div>
                <button type="submit">Create new project</button>
                <button type="reset">Reset</button>

            </form>
        </div>
    </div>
</div>
@endsection
