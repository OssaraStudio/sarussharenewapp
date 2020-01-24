@extends('layouts.app')

@section('content')



<div class="row mt-4">

        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('save-post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mt-4">
                            <label for="post_title" class="col-md-2 col-form-label">Post Title</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="post_title" placeholder="Post Title" name="post_title" required>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="post_content" class="col-md-2 col-form-label">Post Content</label>
                            <div class="col-md-10">
                                <textarea placeholder="Post Content" name="post_content" class="form-control" id="post_content" cols="30" rows="10" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="post_category" class="col-md-2 col-form-label">Post Category</label>
                            <div class="col-md-10">
                                <select class="form-control" name="post_category" id="post_category" required>
                                    <option selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="post_tags" class="col-md-2 col-form-label">Post Tags</label>
                            <div class="col-md-10">
                                <select class="form-control" name="post_tags[]" id="post_tags" multiple>
                                    <option selected>Select Tags</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">
                                            {{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="post_images" class="col-md-2 col-form-label">Post Images</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="post_images[]" id="post_images" multiple>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="post_category" class="col-md-2 col-form-label"></label>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">Save New Post</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>

</div>


@endsection
