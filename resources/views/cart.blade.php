@extends('layouts.app')
@section('title', 'اسئله والاجوبة')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="card">
                    <div class="card-header text-center text-dark">
                        <h5 class="card-title fw-bold">عربة التسوق</h5>
                    </div>
                    <div class="card-body">
                        @if(session()->has('cart') && count(session()->get('cart')) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>المنتج</th>
                                    <th>القميه</th>
                                    <th>السعر</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(session('cart') as $id => $product)
                                    <tr>
                                        <td>
                                            <img src="{{ Storage::url($product['image']) }}"
                                                 alt="{{ $product['name'] }}"
                                                 width="100px"/>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-sm" style="color: #FC3901"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown();
                                                            update_cart({{ $id }}, this.parentNode.querySelector('input[type=number]').value)">
                                                    <i class="fa fa-minus"></i>
                                                </button>

                                                <input type="number" class="form-control me-2 ms-2" style="width: 70px"
                                                       min="1" value="{{ $product['quantity'] }}"
                                                       oninput="update_cart({{ $id }}, this.value)">


                                                <button class="btn btn-sm" style="color: #FC3901"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp();
                                                    update_cart({{ $id }}, this.parentNode.querySelector('input[type=number]').value)">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td id="price_{{ $id }}">{{ $product['price'] * $product['quantity'] }} ج.م</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm me-1 mb-2"
                                                    onclick="remove_from_cart_2({{ $id }})">حذف
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center">
                                <div class="col-md-12 text-center">
                                    <img src="{{ asset('assets/images/box.png') }}" width="200px" alt="">
                                    <p class="text-secondary">سله التسويق فارغه ...</p>
                                    <a href="{{ route('home') }}" class="btn btn-primary main-btn">تسوق الان</a>
                                </div>
                            </div>
                        @endif

                    </div>

                    @if(session()->has('cart') && count(session()->get('cart')) > 0)
                        <form action="" method="POST">
                            @csrf
                            <div class="card-footer text-center">
                                <p class="card-text fw-bold text-muted" id="total">الاجمالي: {{ $total }} ج.م</p>
                                <button type="submit" class="btn btn-success btn-sm me-1 mb-2">
                                    تأكيد الطلب
                                    <i class="fas fa-circle-check"></i>
                                </button>
                            </div>
                        </form>
                    @endif

                </div>

            </div>

        </div>
    </div>
@endsection

@push('js')
    <script>
        function remove_from_cart_2(id) {
            @if(!Auth::check())
                window.location.href = '{{ route('login') }}';
            @else
            $.ajax({
                url: '{{ route('cart.remove') }}',
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function (data) {
                    location.reload();
                }
            });
            @endif
        }

        function update_cart(id, value) {
            console.log(id);
            @if(!Auth::check())
                window.location.href = '{{ route('login') }}';
            @else
            $.ajax({
                url: '{{ route('cart.update') }}',
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: value
                },
                success: function (data) {
                    $('#total').html('الاجمالي: ' + data.total + ' ج.م');
                    $('#price_' + id).html(data.price + ' ج.م');
                }
            });
            @endif
        }
    </script>
@endpush
