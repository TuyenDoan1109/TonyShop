@extends('admin.layouts.adminapp')

@section('title')
    T | Post
@endsection

@section('content')

{{--Start Table--}}
<div class="row">
    <div class="col">

        <!-- DATA TABLE -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 style="color:#EE877C">Post</h4>
                <div>
                    <a class="btn btn-sm btn-primary" href="{{route('admin.posts.create')}}">
                        Create
                    </a>
                    <a class="btn btn-sm btn-primary" href="{{route('admin.posts.excelExport')}}">
                        Excel
                    </a>
                    <a class="btn btn-sm btn-info" href="{{route('admin.posts.indexWithDeleted')}}">
                        All With Deleted
                    </a>

                </div>
            </div>

            <div class="card-body row">
                <form class="d-flex" action="{{route('admin.posts.search')}}" method="post">
                    @csrf
                    <div class="col-sm-auto">
                        <div class="input-group">
                            <button class="btn btn-primary" type="button">Keyword</button>
                            <input type="text" name="key_search" class="form-control" placeholder="Find by name, code..."
                                   value="{{session('key_search')}}">
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <input type="hidden" name="confirm_search" value="1" />
                        <button type="submit" class="btn btn-warning">Search</button>
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
                                    <th class="text-center px-3" scope="col">Content</th>
                                    <th class="text-center px-3" scope="col">Admin</th>
                                    <th class="text-center px-3" scope="col">Time</th>
                                    <th class="text-center px-3" scope="col">Status</th>
                                    <th class="text-center px-3" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @isset($posts)
                                @php
                                    $index = $posts->firstItem();
                                @endphp
                                @foreach($posts as $key => $item)
                                    <tr>
                                        <td class="text-center px-3">{{ $index++ }}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{$item->name}}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{$item->content}}</td>
                                        <td class="text-center px-3" style="white-space: nowrap;">{{$item->admin->name ?? ''}}</td>
                                        <td class="text-center">
                                            {{ $item->created_at }}
                                        </td>
                                        <td class="text-center px-3">
                                            @if($item->status == 1)
                                                <i class="fa fa-2x fa-toggle-on text-success"></i>
                                            @else
                                                <i class="fa fa-2x fa-toggle-off text-danger"></i>
                                            @endif
                                        </td>
                                        <td class="text-center px-3">
                                            <div class="d-flex px-2">
                                                <a href="{{route('admin.posts.edit', $item->id)}}" class="btn btn-sm btn-outline-primary" title="Edit" style="margin-right: 5px">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button title="Delete" class="btn btn-sm btn-outline-danger submitDeleteForm">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                <form action="{{ route('admin.posts.destroy', $item->id) }}" method="post">
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
                Showing {{$posts->firstItem()}} to {{$posts->lastItem()}} of {{$posts->total()}} entries
            </div>
            <div>
                {{ $posts->links('vendor.pagination.custom') }}
            </div>
        </div>

    </div>
</div>
{{--End Table--}}

@endsection

