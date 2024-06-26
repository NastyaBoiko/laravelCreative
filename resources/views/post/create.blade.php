@extends('layouts.main')
@section('content')
  <div>
    <form action="{{ route('post.store') }}" method="POST" class="needs-validation">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input 
          value="{{ old('title') }}"
          type="text" name="title" class="form-control" id="title" placeholder="Title">

        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror

      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea type="text" name="content" class="form-control" id="content" placeholder="Content">{{ old('content') }}</textarea>
        @error('content')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input 
          value="{{ old('image') }}"
          type="text" name="image" class="form-control" id="image" placeholder="Image">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select mb-3" id="category" name="category_id">
          @foreach ($categories as $category)
            <option 
            {{ old('category_id') == $category->id ? 'selected' : '' }}
            value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select class="form-select mb-3" multiple id="tags" name="tags[]">
          @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
@endsection