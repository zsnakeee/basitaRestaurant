@extends('layouts.app')
@section('title', 'طلبك عندنا')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex" style="margin: 10px 0;">
                <div class="point"></div>
                <p class="me-2 mb-0"> الاصناف</p>
            </div>

            <div class="col-12">
                <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">اضافه منتج جديد</a>

                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">الصنف</th>
                        <th scope="col">السعر</th>
                        <th scope="col">الصورة</th>
                        <th scope="col">تاريخ الاضافه</th>
                        <th scope="col">تاريخ التعديل</th>
                        <th scope="col">التحكم</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}ج</td>
                            <td>
                                <img width="30px" height="30px" src="{{ Storage::url($product->image) }}" alt="">
                            </td>
                            <td>{{ \Carbon\Carbon::createFromDate($product->created_at)->diffForHumans() }}</td>
                            <td>{{ \Carbon\Carbon::createFromDate($product->updated_at)->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-secondary btn-sm"
                                   href="{{ route('admin.products.update' , ['id' => $product->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm"
                                   onclick="return confirm('هل انت متاكد من حذف هذا المنتج؟')"
                                   href="{{ route('admin.products.delete', ['id' => $product->id]) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
