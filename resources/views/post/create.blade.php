@extends('layouts.main')
@section('content')
  <div>
    <form action="{{ route('post.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea type="text" name="content" class="form-control" id="content" placeholder="Content"></textarea>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Image">
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select mb-3" id="category" name="category_id">
          @foreach ($categories as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
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