@extends('layouts.app')

@section('content')


    <form action="{{ route('save-category') }}" method="post">
        @csrf

        <div class="form-group row mt-4">
            <label for="category_title" class="col-md-2 col-form-label">Category Title</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="category_title" placeholder="Category Title" name="category_title" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="category_color" class="col-md-2 col-form-label">Category Color</label>
            <div class="col-md-10">
                <input type="color" class="form-control" id="category_color" placeholder="Category Color" name="category_color" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-md-2 col-form-label"></label>
            <div class="col-md-10">
                <button type="submit" class="btn btn-primary">Save New Category</button>
            </div>
        </div>

    </form>


    <div class="row">

        @foreach ($categories as $category)
            <div class="col-md-3 mt-2 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5>
                            {{ $category->title }}
                            <div style="background-color: {{ $category->color }};
                            width: 50px; height: 25px"></div>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
