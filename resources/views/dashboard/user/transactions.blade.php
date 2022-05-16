@extends('dashboard.user.template')

@section('content')
    <div class="container p-5   ">
        <div class="row">
            <div class="col-12">
                <h3>Transaction</h3>
                <hr>
            </div>
        </div>
        @forelse ($transactions as $transaction)
            <div class="container rounded shadow p-4 mb-4">
                <div class="row m-0 border-bottom mb-3">
                    <span class="d-flex align-items-center mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="me-2 bi bi-bag-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                        </svg>
                        Belanja
                    </span>
                    <span class="mb-2" style="font-size: 0.6em">{{ $transaction->created_at }}</span>
                </div>
                <div class="row m-0">
                    <div class="col-2 d-flex align-items-center">
                        <img src="{{ asset('storage/'.$transaction->details_transaction->first()->detail_product->thumbnail) }}" class="img-thumbnail image-product-transaction w-100" alt="...">
                    </div>
                    <div class="col-6">
                        <span>
                            {{ $transaction->details_transaction->first()->detail_product->product_name }} (x{{ $transaction->details_transaction->first()->qty }})
                        </span>
                        @if (count($transaction->details_transaction)>1)
                            <span class="d-block mb-3">+{{ count($transaction->details_transaction)-1 }} produk lainnya</span>
                        @endif
                        <span class="d-block mt-4">Total Belanja: Rp.{{ number_format($transaction->total) }}</span>
                    </div>
                    <div class="col-4 p-0">
                        <div class="container  p-0 d-flex justify-content-end mb-4  ">
                            @if ($transaction->status == "Menunggu verifikasi")
                                <span class="me-3 rounded border p-2" style="font-size: 0.7em">
                                    {{ $transaction->timeout }}
                                </span>
                            @endif
                            <span class="rounded text-white px-2 py-1 bg-@if($transaction->status=='Terverifikasi' || $transaction->status=='Sampai di tujuan' || $transaction->status=='Dalam Perjalanan'){{ 'success' }}@elseif($transaction->status=='Menunggu verifikasi'){{ 'warning' }}@elseif($transaction->status=='Dibatalkan'){{ 'danger' }}@elseif($transaction->status=='Expired'){{ 'secondary' }}@endif" style="font-size: 0.7em">
                                {{ $transaction->status }}
                            </span>
                        </div>
                        <div class="container p-0 d-flex justify-content-end">
                            @if ($transaction->status=="Sampai di tujuan" && count($transaction->details_transaction)==1 && $transaction->details_transaction->first()->detail_product->reviewable)
                                <a href="" role="button" class="rounded text-white px-2 py-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $transaction->id }}">
                                    Beri Ulasan
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="modal{{ $transaction->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
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
                                                        <img src="{{ asset('storage/'.$transaction->details_transaction->first()->detail_product->thumbnail) }}" class="img-thumbnail image-product-transaction w-100" alt="...">
                                                    </div>
                                                    <div class="col-10">
                                                        <span>
                                                            {{ $transaction->details_transaction->first()->detail_product->product_name }}
                                                        </span>
                                                        <span class="d-block mt-2">
                                                            Harga : Rp.
                                                            {{ number_format($transaction->details_transaction->first()->detail_product->price) }}
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
                                            <form action="{{ route('user.product.review',$transaction->details_transaction->first()->detail_product) }}" id="reviewForm{{ $transaction->id }}" method="POST">
                                                @csrf
                                                <input type="text" value="0" name="rate" hidden>
                                                <textarea name="content" id="" style="width: 100%" placeholder="Katakan sesuatu tentang produk ini"></textarea>
                                            </form>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="document.getElementById('reviewForm{{ $transaction->id }}').submit();">Upload</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @elseif($transaction->status=="Menunggu verifikasi" && !$transaction->proof_of_payment)
                                <form action="{{ route('user.transaction.cancel',$transaction) }}" method="POST" id="cancel{{ $transaction->id }}">
                                    @csrf
                                </form>
                                <span class="button rounded text-white p-2 bg-danger me-2" onclick="document.getElementById('cancel{{ $transaction->id }}').submit();">Batalkan</span>
                                <span class="button rounded text-white p-2 bg-success" data-bs-toggle="modal" data-bs-target="#modalUploadBukti{{ $transaction->id }}">Upload Bukti</span>

                                <!-- Modal -->
                                <div class="modal fade" id="modalUploadBukti{{ $transaction->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-center" id="exampleModalLabel">Upload Bukti Pembayaran</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container mb-3">
                                                <div class="row mb-3">
                                                    <div class="col-2">
                                                        <img src="{{ asset('storage/'.$transaction->details_transaction->first()->detail_product->thumbnail) }}" class="img-thumbnail image-product-transaction w-100" alt="...">
                                                    </div>
                                                    <div class="col-10">
                                                        <span>
                                                            {{ $transaction->details_transaction->first()->detail_product->product_name }}
                                                        </span>
                                                        <span class="d-block mt-2">
                                                            Harga : Rp.
                                                            {{ number_format($transaction->details_transaction->first()->detail_product->price) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route("user.purchase.upload_proof",$transaction) }}" id="uploadBuktiForm{{ $transaction->id }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <label for="">Bukti (*jpg, png, jpeg)</label>
                                                <input class="form-control mt-2" type="file" name="proof" accept="image/png, image/jpg, image/jpeg" required>
                                            </form>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="document.getElementById('uploadBuktiForm{{ $transaction->id }}').submit();">Upload</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row rounded shadow p-3">
                <div class="col-12 d-flex justify-content-center">
                    <span>Tidak ada transaksi yang dapat ditampilkan</span>
                </div>
            </div>
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