@extends('layouts.auth')
@section('title', 'تسجيل دخول')

@section('content')
    <h1 class="text-center mb-3">تسجيل دخول</h1>

    <form method="POST">
        @csrf
        <div class="card">
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group w-50 m-auto mb-2">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" class="form-control mt-1" id="email" name="email"
                           placeholder="example@domain.com">
                </div>

                <div class="form-group w-50 m-auto mb-2">
                    <label for="password">كلمة المرور</label>
                    <input type="password" class="form-control mt-1" id="password" name="password"
                           placeholder="***********">
                </div>

                <div class="text-center">
                    <button type="submit" style="background-color: #FC3901; border-color: #FC3901"
                            class="btn btn-primary w-50 mt-2">تسجيل الدخول
                    </button>
                </div>


                <div class="text-center mt-2">
                    <a href="{{ route('register') }}" class="text-secondary mt-2">هل انت جديد؟ انشاء حساب</a>
                </div>
            </div>
        </div>
    </form>

@endsection
