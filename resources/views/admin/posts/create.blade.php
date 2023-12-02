@extends('admin.layouts.adminapp')

@section('content')

    {{--Start Table--}}
    <div class="row">
        <div class="col">
            <!-- DATA TABLE -->
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 style="color:#EE877C">Category > Create</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <form action="{{route('admin.categories.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Name:</label>
                                <input name="name" type="text" class="form-control" placeholder="Name..." value="{{old('name')}}">
                                @if($errors->has('name'))
                                    <div class="bg-danger text-white text-center py-1">
                                        <span>{{$errors->first('name')}}</span>
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div>
                                <a href="{{route('admin.categories.index')}}" class="btn btn-sm btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
    {{--End Table--}}

@endsection

