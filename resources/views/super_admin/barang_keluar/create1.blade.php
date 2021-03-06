@extends('layouts/superadmin_view')
​
@section('title')
    <title>Transaksi</title>
@endsection
​
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Transaksi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{-- {{ route('home') }} --}}">Home</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content" id="dw">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        @card
                            @slot('title')
                            
                            @endslot
​
                            <div class="row">
                                <div class="col-md-4">
                                    
                                    <!-- SUBMIT DIJALANKAN KETIKA TOMBOL DITEKAN -->
                                    <form action="#" @submit.prevent="addToCart" method="post">
                                        <div class="form-group">
                                            <label for="">Produk</label>
                                            <select name="product_id" id="product_id"
                                                v-model="cart.product_id"
                                                class="form-control" required width="100%">
                                                <option value="">Pilih</option>
                                                 @foreach($items as $item)
                                                  <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Qty</label>
                                            <input type="number" name="qty"
                                                v-model="cart.qty" 
                                                id="qty" value="1" 
                                                min="1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm"
                                                :disabled="submitCart"
                                                >
                                                <i class="fa fa-shopping-cart"></i> @{{ submitCart ? 'Loading...':'Ke Keranjang' }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                
                                <!-- MENAMPILKAN DETAIL PRODUCT -->
                                <div class="col-md-5">
                                    <h4>Detail Produk</h4>
                                    <div v-if="product.name">
                                        <table class="table table-stripped">
                                            <tr>
                                                <th>Kode</th>
                                                <td>:</td>
                                                <td>@{{ product.code }}</td>
                                            </tr>
                                            <tr>
                                                <th width="3%">Produk</th>
                                                <td width="2%">:</td>
                                                <td>@{{ product.name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Harga</th>
                                                <td>:</td>
                                                <td>@{{ product.price | currency }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                                <!-- MENAMPILKAN IMAGE DARI PRODUCT -->
                                <div class="col-md-3" v-if="product.photo">
                                    <img :src="'/uploads/product/' + product.photo" 
                                        height="150px" 
                                        width="150px" 
                                        :alt="product.name">
                                </div>
                            </div>
                            @slot('footer')
​
                            @endslot
                        @endcard
                    </div>
                    
                    <!-- MENAMPILKAN LIST PRODUCT YANG ADA DI KERANJANG -->
                    <div class="col-md-4">
                        @card
                            @slot('title')
                            Keranjang
                            @endslot
​
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- MENGGUNAKAN LOOPING VUEJS -->
                                    <tr v-for="(row, index) in shoppingCart">
                                        <{{-- td>@{{ row.name }} (@{{ row.code }})</td>
                                        <td>@{{ row.price | currency }}</td>
                                        <td>@{{ row.qty }}</td>
                                        <td>
                                            <!-- EVENT ONCLICK UNTUK MENGHAPUS CART -->
                                            <button 
                                                @click.prevent="removeCart(index)"    
                                                class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td> --}}
                                    </tr>
                                </tbody>
                            </table>
                            @slot('footer')
                            <div class="card-footer text-muted">
                                <a href="{{-- {{ route('order.checkout') }} --}}" 
                                    class="btn btn-info btn-sm float-right">
                                    Checkout
                                </a>
                            </div>
                            @endslot
                        @endcard
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
​
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
    <script src="{{ asset('js/transaksi.js') }}"></script>
@endsection