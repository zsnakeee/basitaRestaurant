@extends('layouts.app')
@section('title', 'طلبك عندنا')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex" style="margin: 10px 0;">
                <div class="point"></div>
                <p class="me-2 mb-0"> الطلبات</p>
            </div>

            <div class="col-12">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <td>#</td>
                        <td>المستخدم</td>
                        <td>الاسم</td>
                        <td>الصوره</td>
                        <td>الكمية</td>
                        <td>اجمالي السعر</td>
                        <td>الحاله</td>
                        <td>تاريخ الطلب</td>
                        <td >تاريخ التعديل</td>
                        <td>التحكم</td>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>
                                <img width="30px" height="30px" src="{{ Storage::url($order->product->image) }}" alt="">
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
                            <td>{{ \Carbon\Carbon::createFromDate($order->updated_at)->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-success btn-sm" title="تم التحضير"
                                   href="{{ route('admin.orders.update' , ['id' => $order->id, 'status' => 1]) }}">
                                    <i class="fa fa-check"></i>
                                </a>

                                <a class="btn btn-info btn-sm" title="جاري التحضير"
                                   href="{{ route('admin.orders.update' , ['id' => $order->id, 'status' => 0]) }}">
                                    <i class="fa fa-spinner"></i>
                                </a>

                                <a class="btn btn-danger btn-sm" title="الغاء الطلب"
                                   href="{{ route('admin.orders.update', ['id' => $order->id, 'status' => 2]) }}">
                                    <i class="fa fa-xmark"></i>
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
