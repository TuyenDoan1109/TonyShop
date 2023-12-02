@extends('admin.layouts.adminapp')

@section('title')
    T | Admin
@endsection

@section('content')

{{--Start Table--}}
<div class="row">
    <div class="col">
        <!-- DATA TABLE -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 style="color:#EE877C">Admin</h4>
                <div>
                    <a class="btn btn-sm btn-primary" href="{{route('admin.admins.create')}}">
                        Create
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
                    <a class="btn btn-sm btn-info" href="{{route('admin.admins.indexWithDeleted')}}">
                        All With Deleted
                    </a>

                </div>
            </div>

            <div class="card-body row">
                <form class="d-flex" action="#" method="post">
                    @csrf
                    <div class="col-sm-auto">
                        <div class="input-group">
                            <button class="btn btn-primary" type="button">Keyword</button>
                            <input type="text" name="search_name" class="form-control" placeholder="Find by name,code..."
                                   value="">
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <input type="hidden" name="confirm_search" value="1">
                        <button class="btn btn-warning">Search</button>
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
                                <th class="text-center px-3" scope="col">Email</th>
                                <th class="text-center px-3" scope="col">Address</th>
                                <th class="text-center px-3" scope="col">Phone</th>
                                <th class="text-center px-3" scope="col">Social_id</th>
{{--                                <th class="text-center px-3" scope="col">Posts</th>--}}
                                <th class="text-center px-3" scope="col">Roles</th>
                                <th class="text-center px-3" scope="col">Permissions</th>
                                <th class="text-center px-3" scope="col">Status</th>
                                <th class="text-center px-3" scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($admins)
                                @php
                                    $index = $admins->firstItem();
                                @endphp
                                @foreach($admins as $key => $item)
                                    <tr>
                                        <th class="text-center px-3" scope="row">{{ $index++ }}</th>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{$item->name}}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{$item->email}}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{$item->info->phone ?? ''}}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{$item->info->address ?? ''}}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{$item->info->social_id ?? ''}}</td>
{{--                                        <td class="text-center px-3" style="white-space: nowrap;">--}}
{{--                                            @if($item->posts)--}}
{{--                                                @foreach($item->posts as $post)--}}
{{--                                                    {{$post->name}}--}}
{{--                                                    <br>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
                                        <td>
                                            @if($item->roles)
                                                @foreach($item->roles as $role)
                                                    {{$role->name}}
                                                    <br>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->roles)
                                                @foreach($item->roles as $role)
                                                    @foreach($role->permissions as $permission)
                                                        {{$permission->name}}
                                                        <br>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                            <hr>
                                            @foreach($item->permissions as $permission)
                                                    {{$permission->name}}
                                                    <br>
                                            @endforeach
                                        </td>
                                        <td class="text-center px-3">
{{--                                            @if($item->status == 1)--}}
{{--                                                <i class="fa fa-2x fa-toggle-on text-success"></i>--}}
{{--                                            @else--}}
{{--                                                <i class="fa fa-2x fa-toggle-off text-danger"></i>--}}
{{--                                            @endif--}}

{{--                                            {{ $item->status == 1 ? 'Active' : 'Inactive' }}--}}

                                            {{ $item->status }}
                                        </td>
                                        <td class="text-center px-3">
                                            <div class="d-flex px-2">
                                                <a href="{{route('admin.admins.editRole', $item->id)}}" class="btn btn-sm btn-primary" style="margin-right: 5px">
                                                    Edit Role
                                                </a>
                                                <a href="{{route('admin.admins.editPermission', $item->id)}}" class="btn btn-sm btn-primary" style="margin-right: 5px">
                                                    Edit Permission
                                                </a>
                                                <a href="{{route('admin.admins.edit', $item->id)}}" class="btn btn-sm btn-outline-primary" title="Edit" style="margin-right: 5px">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button title="Delete" class="btn btn-sm btn-outline-danger submitDeleteForm">
                                                    <icon class="fa fa-times"></icon>
                                                </button>
                                                <form action="{{route('admin.admins.destroy', $item->id)}}" method="post">
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
                Showing {{$admins->firstItem()}} to {{$admins->lastItem()}} of {{$admins->total()}} entries
            </div>
            <div>
                {{ $admins->links('vendor.pagination.custom') }}
            </div>
        </div>

    </div>
</div>
{{--End Table--}}

@endsection

