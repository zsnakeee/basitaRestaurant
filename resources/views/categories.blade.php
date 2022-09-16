@extends('layouts.app')
@section('title', 'الاصناف')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex" style="margin: 10px 0;">
                <div class="point"></div>
                <p class="me-2 mb-0">الاصناف</p>
            </div>

            @foreach($categories as $category)
                <div class="col-md-3 mb-3">
                    <a class="card" href="{{ route('categories.view', ['id' => $category->id]) }}" style="cursor: pointer">
                        <div class="card-header text-center text-dark">
                            <h5 class="card-title fw-bold">{{ $category->name }}</h5>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ Storage::url($category->image) }}" width="100px" height="100px"
                                 style="object-fit: contain" alt="{{ $category->name }}">
                        </div>
                        <div class="card-footer text-center">
                            <p class="card-text fw-bold" style="color: #FF3A00;">{{ $category->products->count() }} منتجات</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
