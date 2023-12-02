@extends('admin.layouts.adminapp')

@section('content')

    {{--Start Table--}}
    <div class="row">
        <div class="col">
            <!-- DATA TABLE -->
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>
                        <a href="{{route('admin.brands.index')}}" style="color:#EE877C">Thương hiệu</a> > Thêm thương hiệu
                    </h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('admin.brands.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Tên:</label>
                                    <input name="name" type="text" class="form-control" placeholder="Tên..." value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <div class="bg-danger text-white text-center py-1">
                                            <span>{{$errors->first('name')}}</span>
                                        </div>
                                    @endif
                                </div>
                                <br>
                                <div>
                                    <a href="{{route('admin.brands.index')}}" class="btn btn-sm btn-danger">Quay lại</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Thêm mới</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
    {{--End Table--}}

@endsection

