@extends('layouts.master')
@section('title','Create Category')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Category</label>
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category') }}" placeholder="Insert Category">
                        
                            <!-- error message untuk title -->
                            @error('category_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Parent Category</label>
                            <textarea class="form-control @error('parent_category') is-invalid @enderror" name="parent_category" rows="5" placeholder="Insert parent Category">{{ old('parent_category') }}</textarea>
                        
                            <!-- error message untuk content -->
                            @error('parent_category')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SAVE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection