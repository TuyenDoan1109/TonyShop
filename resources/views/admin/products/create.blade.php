@extends('admin.layouts.adminapp')

@section('customCss')
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container{
            display: block !important;
            width: 100% !important;
        }
    </style>
@endsection

@section('content')

    {{--Start Table--}}
    <div class="row">
        <div class="col">
            <!-- DATA TABLE -->
            <div class="card">
                <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header d-flex justify-content-between">
                        <h4>
                            <a href="{{route('admin.products.index')}}" style="color:#EE877C">Sản phẩm</a> > Thêm mới
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Tên:</label>
                                    <input name="name" type="text" class="form-control" placeholder="Tên..." value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <div class="bg-danger text-white text-center py-1">
                                            <span>{{$errors->first('name')}}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Chọn danh mục:</label>
                                    <select name="category_id" class="form-control select2-category">
                                        <option value="0">---Chọn danh mục---</option>
                                        {!! $options !!}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Chọn thương hiệu:</label>
                                    <select name="brand_id" class="form-control select2-brand">
                                        <option value="0">---Chọn thương hiệu---</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Từ khóa:</label>
                                    <select name="tag[]" class="form-control tags-product-input" multiple="multiple"></select>
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Giá:</label>
                                    <input name="price" type="number" class="form-control" placeholder="Price..." value="{{ old('price') }}">
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Ảnh đại diện:</label>
                                    <input name="feature_image" type="file" class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Ảnh chi tiết:</label>
                                    <input name="detail_image[]" multiple type="file" class="form-control-file">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class=" form-control-label">Chi tiết sản phẩm:</label>
                                    <textarea name="content_product" class="form-control product-content" rows="20" value="{{ old('content') }}"></textarea>
                                </div>

                                <br>

                                <div>
                                    <a href="{{route('admin.products.index')}}" class="btn btn-sm btn-danger">Quay lại</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Thêm mới</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
    {{--End Table--}}

@endsection

@section('customJs')
    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script
        type="text/javascript"
        src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js'
        referrerpolicy="origin">
    </script>

    <script>
        $(document).ready(function () {
            $(".tags-product-input").select2({
                tags: true,
                tokenSeparators: [',']
            });

            $(".select2-category").select2({
                placeholder: "Select category",
                allowClear: true
            });

            $(".select2-brand").select2({
                placeholder: "Select brand",
                allowClear: true
            });

            /* TinyMCE5 */
            let editor_config = {
                path_absolute : "/",
                selector: 'textarea.product-content',
                relative_urls: false,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                file_picker_callback : function(callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    let cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.openUrl({
                        url : cmsURL,
                        title : 'Filemanager',
                        width : x * 0.8,
                        height : y * 0.8,
                        resizable : "yes",
                        close_previous : "no",
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            };

            tinymce.init(editor_config);
            /* END TinyMCE5 */

        });
    </script>
@endsection

