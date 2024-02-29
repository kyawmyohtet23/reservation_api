@extends('admin.layouts.master')

@section('content')
    <div class="col-6 mx-auto mt-5 card py-4 px-5">
        <h2 class="text-decoration-underline mb-3">Create Menu</h2>
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label fw-semibold">Image</label>
                <input type="file" name="image" class="form-control">
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
              </div>

            <div class="mb-3">
              <label for="" class="form-label fw-semibold">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="menu">
              {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-semibold">Price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="price">
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
              </div>

              <div class="mb-3">
                <label for="" class="form-label fw-semibold">Description</label> <span class="text-primary">(optional)</span>
                <textarea name="description" class="form-control" cols="6" rows="3" placeholder="description"></textarea>
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection