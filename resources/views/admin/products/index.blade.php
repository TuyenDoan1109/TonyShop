@extends('admin.layouts.adminapp')

@section('title')
    T | Product
@endsection

@section('content')
    <style>
        .product-image-150-100{
            width: 100px;
            /*height: 100px;*/
            object-fit: cover;
        }
    </style>

{{--Start Table--}}
<div class="row">
    <div class="col">
        <!-- DATA TABLE -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>
                    <a href="{{route('admin.products.index')}}" style="color:#EE877C">Sản phẩm</a> > Danh sách
                </h4>
                <div>
                    <a class="btn btn-sm btn-primary" href="{{route('admin.products.create')}}">
                        Thêm sản phẩm
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
{{--                    <a class="btn btn-sm btn-info" href="{{route('admin.products.indexWithDeleted')}}">--}}
{{--                        All With Deleted--}}
{{--                    </a>--}}

                </div>
            </div>

{{--            <div class="card-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <form class="d-flex" action="#" method="post">--}}
{{--                            @csrf--}}
{{--                            <div class="col-sm-auto">--}}
{{--                                <div class="input-group">--}}
{{--                                    <button class="btn btn-primary" type="button">Keyword</button>--}}
{{--                                    <input type="text" name="search_name" class="form-control" placeholder="Find by name,code..."--}}
{{--                                           value="">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-sm-auto">--}}
{{--                                <input type="hidden" name="confirm_search" value="1">--}}
{{--                                <button class="btn btn-warning">Search</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="table table-sm table-bordered align-middle table-fit">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="text-center px-3" scope="col">STT</th>
                                    <th class="text-center px-3" scope="col">Tên</th>
                                    <th class="text-center px-3" scope="col">Giá(VNĐ)</th>
                                    <th class="text-center px-3" scope="col">Ảnh</th>
                                    <th class="text-center px-3" scope="col">Danh mục</th>
                                    <th class="text-center px-3" scope="col">Thương hiệu</th>
                                    <th class="text-center px-3" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($products) > 0)
                                @php
                                    $index = $products->firstItem();
                                @endphp
                                @foreach($products as $key => $item)
                                    <tr>
                                        <td class="text-center px-3" scope="row">{{ $index++ }}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{$item->name}}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{ number_format($item->price) }}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">
                                            <img class="product-image-150-100" src="{{ asset($item->feature_image_path) }}" alt="">
                                        </td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{ optional($item->category)->name ?? ''}}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{ optional($item->brand)->name ?? ''}}</td>
                                        <td class="text-center px-3">
                                            <div class="d-flex px-2">
                                                <a href="{{route('admin.products.edit', $item->id)}}" class="btn btn-sm btn-outline-primary" title="Sửa" style="margin-right: 5px">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button title="Xóa" class="btn btn-sm btn-outline-danger submitDeleteForm">
                                                    <icon class="fa fa-times"></icon>
                                                </button>
                                                <form action="{{route('admin.products.destroy', $item->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center">Không có sản phẩm!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- END DATA TABLE -->

        <div class="d-flex justify-content-between">
            <div>
                Showing {{$products->firstItem()}} to {{$products->lastItem()}} of {{$products->total()}} entries
            </div>
            <div>
                {{ $products->links('vendor.pagination.custom') }}
            </div>
        </div>

    </div>
</div>
{{--End Table--}}

@endsection

