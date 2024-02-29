

@extends('admin.layouts.master')

@section('css')
    <style>
        .card {
            width: 20rem;
            max-height: 30rem;
            /* background-color: red */
        }

        .card img {
            max-height: 23rem;
        }
    </style>
@endsection

@section('content')

<div class="bg-primary py-3 px-4 d-flex justify-content-between">

    <div>
        <a href="{{ route('menu.create') }}" class="btn btn-dark">Create Menu</a>

    </div>
    {{-- <div class="mt-1 d-flex">
        <input type="text" class="form-control rounded-pill w-100 h-75">

    </div> --}}
</div>



{{-- menus --}}

<div class="container-fluid my-4">
    <div class="row gap-3">
        @foreach ($menus as $menu)
        <div class="card col-3 py-2">
            <img src="{{ $menu->image_url }}" class="" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
              <h4 class="card-title w-50">{{ $menu->name }}</h4>
              <div>
                <span class="bg-dark text-white px-2 pb-1 rounded-4">
                    <small>
                        {{ $menu->price }} Ks
                    </small>
                </span>
            </div>
                </div>
    
              <p>
                {{ $menu->description }}
              </p>
            </div>
          </div>
        @endforeach
    </div>
</div>
    
@endsection