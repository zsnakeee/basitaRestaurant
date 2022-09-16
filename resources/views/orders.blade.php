@extends('layouts.app')
@section('title', 'طلبك عندنا')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex" style="margin: 10px 0;">
                <div class="point"></div>
                <p class="me-2 mb-0"> الطلبات</p>
            </div>

            <div class="card">
                <div class="card-body">
                    @if($orders->count() > 0)
                        <div class="col-12">
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                    <td>#</td>
                                    <td>الاسم</td>
                                    <td>الصورة</td>
                                    <td>الكمية</td>
                                    <td>اجمالي السعر</td>
                                    <td>الحاله</td>
                                    <td>تاريخ الطلب</td>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>
                                            <img width="30px" height="30px"
                                                 src="{{ Storage::url($order->product->image) }}"
                                                 alt="">
                                        </td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->quantity * $order->price }} ج.م</td>
                                        <td>
                                            @if($order->status == 0)
                                                <span class="badge bg-info">جاري التحضير</span>
                                            @elseif($order->status == 1)
                                                <span class="badge bg-success">تم التحضير</span>
                                            @elseif($order->status == 2)
                                                <span class="badge bg-danger">تم الغاء الطلب</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromDate($order->created_at)->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else

                        <div class="text-center">
                            <div class="col-md-12 text-center">
                                <img src="{{ asset('assets/images/box.png') }}" width="200px" alt="">
                                <p class="text-secondary">ليس لديك اي طلبات ...</p>
                                <a href="{{ route('home') }}" class="btn btn-primary main-btn">تسوق الان</a>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
