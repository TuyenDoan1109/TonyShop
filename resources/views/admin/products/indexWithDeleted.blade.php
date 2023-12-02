@extends('admin.layouts.adminapp')

@section('content')

    {{--Start Table--}}
    <div class="row">
        <div class="col">
            <!-- DATA TABLE -->
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 style="color:#EE877C">Category > All With Deleted</h4>
                    <div>
                        <a class="btn btn-sm btn-primary" href="{{route('admin.categories.create')}}">
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
                        <a class="btn btn-sm btn-info" href="{{route('admin.categories.indexWithDeleted')}}">
                            All With Deleted
                        </a>

                    </div>
                </div>

                <div class="card-body row">
                    <form class="d-flex" action="#" method="post">
                        @csrf
                        <div class="col-sm-auto">
                            <div class="input-group">
                                <button class="btn btn-primary" type="button">Tìm theo tên</button>
                                <input type="text" name="search_name" class="form-control" placeholder="Tìm tên"
                                       value="">
                            </div>
                        </div>

                        <div class="col-sm-auto">
                            <input type="hidden" name="confirm_search" value="1">
                            <button class="btn btn-warning">Tìm Kiếm</button>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table table-sm table-bordered align-middle table-fit">
                                <thead class="table-light text-muted">
                                <tr>
                                    <th class="text-center px-3" scope="col">S\N:</th>
                                    <th class="text-center px-3" scope="col">Name</th>
                                    <th class="text-center px-3" scope="col">Status</th>
                                    <th class="text-center px-3" scope="col">Deleted</th>
                                    <th class="text-center px-3" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($categories)
                                    @foreach($categories as $key => $item)
                                        <tr>
                                            <th class="text-center px-3" scope="row">{{++$key}}</th>
                                            <td class="text-center px-3" style="white-space: nowrap;">{{$item->name}}</td>
                                            <td class="text-center px-3">
                                                @if($item->status == 1)
                                                    <i class="fa fa-thumbs-up"></i>
                                                @else
                                                    <i class="fa fa-thumbs-down"></i>
                                                @endif
                                            </td>
                                            <td class="text-center px-3">
                                                @if($item->deleted_at != null)
                                                    <i class="fa fa-check"></i>
                                                @endif
                                            </td>
                                            <td class="text-center px-3">
                                                @if($item->deleted_at != null)
                                                <div class="d-flex px-2">
                                                    <a href="{{route('admin.categories.restore', $item->id)}}" class="btn btn-sm btn-outline-success" style="margin-right: 5px">
                                                        <i class="fa fa-refresh"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-outline-danger"
                                                       onclick="
                                                        if(confirm('Delete Forever!\n Are you sure?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{$item->id}}').submit();
                                                        } else {
                                                            event.preventDefault();
                                                        }
                                                    ">
                                                        <icon class="fa fa-trash"></icon>
                                                    </a>
                                                    <form id="delete-form-{{$item->id}}" action="{{route('admin.categories.forceDelete', $item->id)}}" method="post">
                                                        @csrf
                                                    </form>
                                                </div>
                                                @endif
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
        </div>
    </div>
    {{--End Table--}}

@endsection

