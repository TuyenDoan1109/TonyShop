@if(count($products) > 0)
    @foreach($products as $product)
        <a class="bbb" href="/product/{{$product->id}}">
            <li class="list-group-item d-flex flex-row">
                <img class="mr-2" width="50px" height="50px" src="{{asset('storage/backend/img/' . $product->image_1)}}" alt="">
                <div class="">
                    {{$product->product_name}} - {{$product->product_size}} - {{$product->product_color}}
                    <h6>{{number_format($product->discount_price)}} VNĐ</h6>
                </div>
            </li>
        </a>
    @endforeach
@else
    <li class="list-group-item">No Results Found</li>
@endif