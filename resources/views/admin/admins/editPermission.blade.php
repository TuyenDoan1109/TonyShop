@extends('admin.layouts.adminapp')

@section('content')

@php
    $permissionOfAdmin = [];

    // Direct Permissions
    $directPermission = [];
    foreach($admin->permissions as $item) {
        array_push($directPermission, $item->id);
    }

    // Permissions via Roles
    $permissionViaRole = [];
    foreach ($admin->roles as $item) {
        foreach ($item->permissions as $item){
            array_push($permissionViaRole, $item->id);
        }
    }

    $permissionOfAdmin = array_unique(array_merge($directPermission, $permissionViaRole));
@endphp

    {{--Start Table--}}
    <div class="row">
        <div class="col">
            <!-- DATA TABLE -->
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 style="color:#EE877C">Admin > Edit Permission</h4>
                </div>


                <div class="card-body card-block">
                    <h5>Role: {{$admin->name}}</h5>
                    <br>
                    @foreach($permissions as $permission)
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">{{$permission->name}}</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <label class="switch switch-3d switch-primary mr-3">
                                    <input data-filters="color" class="switch-input color-filter"
                                        @if(in_array($permission->id, $permissionOfAdmin))
                                            checked
                                        @endif
                                        @if(in_array($permission->id, $permissionViaRole))
                                            disabled
                                        @endif
                                        type="checkbox"  value="{{$permission->id}}">
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <br>
                    <form id="myForm" action="{{route('admin.admins.updatePermission')}}" method="post">
                        @csrf
                        <input id="newPermission" type="hidden" name="newPermission">
                        <input type="hidden" name="id" value="{{$admin->id}}">
                    </form>
                    <div>
                        <a href="#" class="btn btn-sm btn-danger">Cancel</a>
                        <a id="button" type="submit" class="btn btn-sm btn-primary text-white">Submit</a>
                    </div>
                </div>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
    {{--End Table--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#button').on('click', function () {
                var tempArray = [];
                $.each($("[data-filters='color']:checked:not(:disabled)"), function () {
                    tempArray.push($(this).val().toLowerCase());
                });
                // alert(tempArray);
                document.getElementById("newPermission").value = tempArray;
                document.getElementById("myForm").submit();
            });
        });
    </script>
@endsection

