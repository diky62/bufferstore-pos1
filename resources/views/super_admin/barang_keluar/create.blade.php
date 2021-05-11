@extends('layouts/superadmin_view')
@section('content')
<section>
  <div class="container">
    <div class="card-body">
      
      {{-- end heading --}}
      <a href="{{ route('barang_keluar.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route ('cart.store') }}" method="post">
                        @csrf
                <input type="hidden" name="stok_barang_id" id="itemId">
                <div class="card-body">
                         
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                      <select class="form-control" id="nama_barang" placeholder="Pick a state...">
                        <option value="">Pilih Barang...</option>
                        @foreach($items as $item)
                          <option value="{{ $item->id }}" onclick="$('#itemId').val('{{ $item->id }}')">
                            {{ $item->nama_barang }}
                          </option>
                        @endforeach 
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="qty">QTY</label>
                    <input type="text" class="form-control" id="qty" name="qty" placeholder="QTY" required onkeypress="return hanyaAngka(event)" value="1">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Tambah</button>
                </div>
              </form>
            </div>
          </div>

          {{-- Invoice --}}
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Invoice</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('transaction.store') }}" method="post">
                  {{ csrf_field() }}

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="invoice[nama]" placeholder="Nama" required >
                      </div>

                      <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="invoice[tanggal]" placeholder="Tanggal" required>
                      </div>

                      {{-- <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="invoice[alamat]" placeholder="Alamat" required></textarea>
                      </div> --}}


                    </div>

                    

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="marketplace_id">Marketplace</label>
                          <select class="form-control" id="marketplace" name="invoice[marketplace_id]" placeholder="Pick a state...">
                            <option value="">Pilih Marketplace...</option>
                            @foreach($marketplaces as $marketplace)
                              <option value="{{ $marketplace->id }}">
                                {{ $marketplace->marketplace }}
                              </option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="ekspedisi_id">Ekspedisi</label>
                          <select class="form-control" id="ekspedisi" name="invoice[ekspedisi_id]" placeholder="Pick a state...">
                            <option value="">Pilih Ekspedisi...</option>
                            @foreach($ekspedisis as $ekspedisi)
                              <option value="{{ $ekspedisi->id }}">
                                {{ $ekspedisi->ekspedisi }}
                              </option>
                            @endforeach 
                          </select>
                      </div>

                      {{-- <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="invoice[no_hp]" placeholder="No Hp" required onkeypress="return hanyaAngka(event)">
                      </div> --}}

                      

                      
                    </div>
                  </div>

                  

                  
                </div>
                <?php 
                  $count=0;
                ;?>
                @foreach($itemCarts as $item)
                {{-- <div v-for="(barang_keluar,a) in barang_keluars"> --}}
                  <input hidden type="text" name="stok_barang_id[{{$count}}]" value="{{ $item->id}}">
                  <input hidden type="text" name="qty[{{$count}}]"
                  value="{{$item->cart->qty}}">
                  <input hidden type="text" name="tgl[{{$count}}]"
                  value="{{$item->cart->created_at}}">
                {{-- </div> --}}
                  <?php $count++; ?>
                @endforeach
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-save "></i>  Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <br>
        <hr>
        
        <div class="table-resposive">
          <table class="able table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
              @foreach($itemCarts as $item)
                  <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $item->nama_barang }}</td>
                      <td>{{ $item->kategori->kategori }}</td>
                      <td>{{ $item->cart->qty }}</td>
                      <td>
                          {{-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubahJumlah{{ $loop->iteration }}">Ubah</button> --}}
                          <form action="{{ route('cart.destroy', $item->cart) }}" method="post" class="d-inline">
                              @csrf
                              @method('DELETE')

                              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                          </form>

                          {{-- <div class="modal fade" id="ubahJumlah{{ $loop->iteration }}">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title">Ubah Jumlah '{{ $item->name }}'</h5>
                                          <button type="button" class="close" data-dismiss="modal">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>

                                      <div class="modal-body">
                                          <form action="{{ route('cart.update', $item->cart) }}" method="post">
                                              @csrf
                                              @method('PATCH')
                                              
                                              <div class="form-group">
                                                  <div class="input-group">
                                                      <input type="number" min="1" max="{{ $item->stock }}" value="{{ $item->cart->quantity }}" class="form-control" name="quantity" placeholder="Masukkan jumlah..." required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text">Unit</span>
                                                          <button type="submit" class="btn btn-primary float-right">Ubah</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div> --}}
                      </td>
                  </tr>

                @endforeach
            </tbody>
          </table>
        </div>
        
      </div>

      {{-- Tampilan Invoice --}}

      {{-- end body --}}
    </div>

  </div>
</section>
@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function(){

$("table").DataTable();

 $('select').selectize({
          sortField: 'text'
      });

});

const destroy = (id)=>{
        swal({
            type:"warning",
            title:"Apakah anda yakin ?",
            text:"Akan Menghapus Data Ekspedisi",
            showCancelButton:true,
            cancelButtonColor:"#d33",
            confirmButtonText:"Ya",
            confirmButtonColor:"#3085d6"
        }).then(result=>{
            if(result.value){
                let access = {
                 
                    _method:"delete",
                    _token:"{{ csrf_token() }}"
                }

                $.post("kategori/"+id,access)
                .done(res=>{
                    swal({
                        title:"Ok!",
                        text:"Data berhasil dihaps!",
                        type:"success"
                    }).then(result=>{
                        window.location.reload();
                    });
                })
                .fail(err=>{
                     console.log(err);
                });
            }
        });
    }
// end ready
</script>
@endsection