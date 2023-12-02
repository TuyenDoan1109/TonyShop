@extends('admin.layouts.adminapp')

@section('title')
    T | Brand
@endsection

@section('content')

{{--Start Table--}}
<div class="row">
    <div class="col">
        <!-- DATA TABLE -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    <a href="{{route('admin.brands.index')}}" style="color:#EE877C">Thương hiệu</a> > Danh sách
                </h4>
                <div>
                    <a class="btn btn-sm btn-primary" href="{{route('admin.brands.create')}}">
                        Thêm mới
                    </a>
                    <a class="btn btn-sm btn-success dropdown-toggle" type="button" id="excel" data-bs-toggle="dropdown"
                       data-bs-auto-close="true" aria-expanded="false">
                        <i class="ri-file-excel-2-line"></i>
                        Excel
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="excel">
                        <li><a class="dropdown-item" href="#">Nhập Excel</a></li>
                        <li><a class="dropdown-item" href="#">Xuất Excel</a></li>
                    </ul>
                </div>
            </div>

{{--            <div class="card-body row">--}}
{{--                <form class="d-flex" action="#" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="col-sm-auto">--}}
{{--                        <div class="input-group">--}}
{{--                            <button class="btn btn-primary" type="button">Keyword</button>--}}
{{--                            <input type="text" name="search_name" class="form-control" placeholder="Find by name,code..."--}}
{{--                                   value="">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-sm-auto">--}}
{{--                        <input type="hidden" name="confirm_search" value="1">--}}
{{--                        <button class="btn btn-warning">Search</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="table table-sm table-bordered align-middle table-fit">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="text-center px-3" scope="col">STT</th>
                                    <th class="text-center px-3" scope="col">Tên</th>
                                    <th class="text-center px-3" scope="col">Ảnh</th>
                                    <th class="text-center px-3" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @isset($brands)
                                @php
                                    $index = $brands->firstItem();
                                @endphp
                                @foreach($brands as $key => $item)
                                    <tr>
                                        <td class="text-center px-3" scope="row">{{ $index++ }}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{$item->name}}</td>
                                        <td class="text-center px-3">
                                            Ảnh
                                        </td>
                                        <td class="text-center px-3">
                                            <div class="d-flex justify-content-center px-2">
                                                <a href="{{route('admin.brands.edit', $item->id)}}" class="btn btn-sm btn-outline-primary" title="Sửa" style="margin-right: 5px">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button title="Xóa" class="btn btn-sm btn-outline-danger submitDeleteForm">
                                                    <icon class="fa fa-times"></icon>
                                                </button>
                                                <form action="{{route('admin.brands.destroy', $item->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- END DATA TABLE -->

        <div class="d-flex justify-content-between">
            <div>
                Showing {{$brands->firstItem()}} to {{$brands->lastItem()}} of {{$brands->total()}} entries
            </div>
            <div>
                {{ $brands->links('vendor.pagination.custom') }}
            </div>
        </div>

    </div>
</div>
{{--End Table--}}

@endsection

