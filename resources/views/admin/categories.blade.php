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
                <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">اضافه صنف جديد</a>

                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">الصورة</th>
                        <th scope="col">تاريخ الاضافه</th>
                        <th scope="col">تاريخ التعديل</th>
                        <th scope="col">التحكم</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <img width="30px" height="30px" src="{{ Storage::url($category->image) }}" alt="">
                            </td>
                            <td>{{ \Carbon\Carbon::createFromDate($category->created_at)->diffForHumans() }}</td>
                            <td>{{ \Carbon\Carbon::createFromDate($category->updated_at)->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-secondary btn-sm"
                                   href="{{ route('admin.categories.update' , ['id' => $category->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-sm"
                                   onclick="return confirm('هل انت متاكد من حذف هذا الصنف؟')"
                                   href="{{ route('admin.categories.delete', ['id' => $category->id]) }}">
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
