@extends('dashboard.user.template')

@section('content')
    <div class="container p-5  mb-4">
        <div class="row">
            <div class="col-12">
                <h3>Reviews</h3>
                <hr>
            </div>
        </div>
        @forelse ($products_not_reviewed as $product)
            <div class="container shadow p-4 mb-4">
                <div class="row">
                    <div class="col-2 d-flex align-items-start">
                        <img class="img-thumbnail image-product-transaction w-100" src="{{ asset('storage/'.$product->image_name) }}" alt="...">
                    </div>
                    <div class="col-10">
                        <span><a href="{{ route('home.product_detail',['category'=>$product->categories->first(),'product'=>$product]) }}">{{ $product->product_name }}</a></span>
                        <span class="d-block mb-3" style="font-size: 0.8em">Rp. {{ number_format($product->price) }}</span>
                        <a href="" role="button" class="rounded text-white px-2 py-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $product->id }}">
                            Beri Ulasan
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{ $product->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title text-center" id="exampleModalLabel">Review</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row mb-3">
                                            <div class="col-2">
                                                <img src="{{ asset('storage/'.$product->image_name) }}" class="img-thumbnail image-product-transaction w-100" alt="...">
                                            </div>
                                            <div class="col-10">
                                                <span>
                                                    {{ $product->product_name }}
                                                </span>
                                                <span class="d-block mt-2">
                                                    Harga : Rp.
                                                    {{ number_format($product->price) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container p-0 mb-3 d-flex justify-content-center">
                                        <span class="fa fa-star me-2 1" style="font-size: 1.5em"></span>
                                        <span class="fa fa-star me-2 2" style="font-size: 1.5em"></span>
                                        <span class="fa fa-star me-2 3" style="font-size: 1.5em"></span>
                                        <span class="fa fa-star me-2 4" style="font-size: 1.5em"></span>
                                        <span class="fa fa-star me-2 5" style="font-size: 1.5em"></span>
                                    </div>
                                    <form action="{{ route('user.product.review',$product) }}" id="reviewForm{{ $product->id }}" method="POST">
                                        @csrf
                                        <input type="text" value="0" name="rate" hidden>
                                        <textarea name="content" id="" style="width: 100%" placeholder="Katakan sesuatu tentang produk ini"></textarea>
                                    </form>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('reviewForm{{ $product->id }}').submit();">Upload</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse

        @forelse ($reviews as $review)
            <div class="container shadow p-4 mb-4">
                <div class="row">
                    <div class="col-2 d-flex align-items-start">
                        <img class="img-thumbnail image-product-transaction w-100" src="{{ asset('storage/'.$review->product_detail->image_name) }}" alt="...">
                    </div>
                    <div class="col-10">
                        <span><a href="{{ route('home.product_detail',['category'=>$review->product_detail->categories->first(),'product'=>$review->product_detail]) }}">{{ $review->product_detail->product_name }}</a></span>
                        <span class="d-block" style="font-size: 0.8em">Rp. {{ number_format($review->product_detail->price) }}</span>
                        <div class="container p-0 mb-3">
                            <span class="fa fa-star {{ $review->rate >=1 ? 'checked':'' }}"></span>
                            <span class="fa fa-star {{ $review->rate >=2 ? 'checked':'' }}"></span>
                            <span class="fa fa-star {{ $review->rate >=3 ? 'checked':'' }}"></span>
                            <span class="fa fa-star {{ $review->rate >=4 ? 'checked':'' }}"></span>
                            <span class="fa fa-star {{ $review->rate >=5 ? 'checked':'' }}"></span>
                        </div>
                        <span>
                            {{ $review->content }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse
    </div>

    <script>
        $(document).ready(function(){
            var list = [
                $('.1'),
                $('.2'),
                $('.3'),
                $('.4'),
                $('.5')
            ]

            $.each(list,function(index,value){
                value.mouseenter(function(){
                    if(!value.parent().hasClass('lock')){
                        $.each(list.slice(0,index+1),function(index,value){
                            if(!value.hasClass('checked')){
                                value.addClass('checked')
                            }
                        })
                    }
                    
                })
                value.mouseleave(function(){
                    if(!value.parent().hasClass('lock')){
                        $.each(list.slice(0,index+1),function(index,value){
                            value.removeClass('checked')
                        })
                    }
                })
                value.click(function(){
                    if(!value.parent().hasClass('lock')){
                        value.parent().addClass('lock')
                    }
                    $.each(list.slice(0,index+1),function(index,value){
                        if(!value.hasClass('checked')){
                            value.addClass('checked')
                        }
                    })
                    $.each(list.slice(index+1),function(index,value){
                        if(value.hasClass('checked')){
                            value.removeClass('checked')
                        }
                    })
                    input = value.parent().parent().children()[2].children[1]
                    input.value = index+1
                })
            })
        })
    </script>
@endsection