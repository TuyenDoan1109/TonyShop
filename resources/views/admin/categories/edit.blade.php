@extends('admin.layouts.adminapp')

@section('content')

    {{--Start Table--}}
    <div class="row">
        <div class="col">
            <!-- DATA TABLE -->
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>
                        <a href="{{route('admin.categories.index')}}" style="color:#EE877C">Danh mục</a> > Sửa danh mục
                    </h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('admin.categories.update', $category->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Tên:</label>
                                    <input name="name" type="text" class="form-control" placeholder="Tên..." value="{{$category->name}}">
                                    @if($errors->has('name'))
                                        <div class="bg-danger text-white text-center py-1">
                                            <span>{{$errors->first('name')}}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Chọn danh mục cha:</label>
                                    <select name="parent_id" id="select" class="form-control">
                                        <option value="0">---Chọn danh mục---</option>
                                        {!! $options !!}
                                    </select>
                                </div>

                                <br>
                                <div>
                                    <a href="{{route('admin.categories.index')}}" class="btn btn-sm btn-danger">Quay lại</a>
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

