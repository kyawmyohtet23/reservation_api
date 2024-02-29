@extends('admin.layouts.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
<style>
    .images {
        max-width: 20rem;
        /* background-color: red; */
        /* width: auto; */
        max-height: 20rem;
    }
</style>

@endsection

@section('content')
    <div>
        <h1 class="text-center mt-3 fw-bold">Your Gallery</h1>

        <div class="col-4">
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <label for="">Create Images</label>
                <input type="file" class="form-control" placeholder="image" name="images[]" multiple>

                <button type="submit" class="btn btn-sm btn-primary mt-2">Upload</button>
            </form>
        </div>
    </div>


    <div class="container-fluid mt-5 card py-4 px-2 bg-secondary">
        <div class="row">
            @foreach ($images as $image)
            <div class="col">
                <img src="{{ $image->image_url }}" class="images" alt="">
              </div>
            @endforeach
        </div>
      </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('#image').select2();

    })
</script>
@endsection