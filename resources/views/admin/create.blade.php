@extends('admin.layouts.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('content')
    
<div class="mt-4 px-2">
    <div class="border-bottom pb-3 ms-4">
        <a href="" class="btn btn-dark">Back</a>
    </div>

    <div class="mt-3">
        <form action="{{ route('restaurant.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="card p-4">
                        
                        <div class="form-group">
                            <label for="">Enter Restaurant Name</label>
                            <input type="text" placeholder="Restaurant Name" name="name" class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="">Choose Product Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" placeholder="Description" class="form-control" id="description" cols="5" rows="2"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Choose Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">City</label>
                            <select name="city_id" id="city_id" class="form-control">
                                <option value="">Choose Your City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
            
                    
                </div>


            </div>

            <div class="col-4">
                <div class="card p-4">
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" placeholder="Phone Numbers" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" id="address" cols="5" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Type</label>
                        <input type="text" placeholder="Restaurant Type" value="" name="type" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary my-3">Create</button>
            </div>


        </div>
    </form>
    </div>

</div>


@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function(){
        $('#supplier').select2();
        $('#category').select2();
        $('#color').select2();
        $('#brand').select2();
        $('#category_id').select2();
        $('#city_id').select2();

        $('#description').summernote();
        $('#address').summernote();
    })
</script>
@endsection