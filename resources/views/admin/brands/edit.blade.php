@extends('admin.layouts.adminapp')

@section('content')
    <style>
        .brand-image-150-100{
            width: 100px;
            /*height: 100px;*/
            object-fit: cover;
        }
    </style>

    {{--Start Table--}}
    <div class="row">
        <div class="col-6">
            <!-- DATA TABLE -->
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>
                        <a href="{{route('admin.brands.index')}}" style="color:#EE877C">Thương hiệu</a> > Sửa
                    </h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('admin.brands.update', $brand->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Tên:</label>
                                    <input name="name" type="text" class="form-control" placeholder="Tên..." value="{{$brand->name}}">
                                    @if($errors->has('name'))
                                        <div class="bg-danger text-white text-center py-1">
                                            <span>{{$errors->first('name')}}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Ảnh thương hiệu:</label>
                                    <input name="image" type="file" class="form-control-file">
                                    @if($errors->has('image'))
                                        <div class="bg-danger text-white text-center py-1">
                                            <span>{{$errors->first('image')}}</span>
                                        </div>
                                    @endif
                                </div>

                                {{-- Show Image --}}
                                <div class="form-group">
                                    <img class="brand-image-150-100" src="{{ asset($brand->image_path) }}" alt="">
                                </div>

                                <br>
                                <div>
                                    <a href="{{route('admin.brands.index')}}" class="btn btn-sm btn-danger">Quay lại</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Sửa</button>
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

