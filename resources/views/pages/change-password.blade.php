@extends('layouts.app')

@section('content')

<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Cập nhật Mật Khẩu</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form action="/user/update-password" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Mật khẩu cũ: </label>
                        <input name="oldPassword" type="password" class="form-control" id="oldPassword" value="{{old('oldPassword')}}">
                        <span class="text-danger">@error('oldPassword') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Mật khẩu mới: </label>
                        <input name="newPassword" type="password" class="form-control" id="newPassword" value="{{old('newPassword')}}">
                        <span class="text-danger">@error('newPassword') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="confirmNewPassword">Xác Nhận Mật khẩu mới:</label>
                        <input name="confirmNewPassword" type="password" class="form-control" id="confirmNewPassword" value="{{old('confirmNewPassword')}}">
                        <span class="text-danger">@error('confirmNewPassword') {{$message}} @enderror</span>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection
