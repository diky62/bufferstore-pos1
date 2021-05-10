@extends('layouts/superadmin_view')
@section('content')
<section>
  <div class="container">
    <div class="card-body">
    
    {{-- end heading --}}
  
      <div class="panel-body">
        <center><h3>Laporan Transaksi Penjualan</h3></center>
        <br>
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Laporan Transaksi</h3>
            </div>
              <form method='post' action="{{ route('laporan.show') }}">
              @csrf
                <div class="card-body">   
                  <div class="row"> 
                    <div class="col-md-6">        
                      <div class="form-group">
                        <label for="dari">Dari Tanggal</label>
                      <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" placeholder="Dari Tanggal">
                      </div>
                    </div>

                    <div class="col-md-6">        
                      <div class="form-group">
                        <label for="sampai">Sampai Tanggal</label>
                      <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" placeholder="Sampai Tanggal">
                      </div>
                    </div>

                    <div class="col-md-6">        
                      <div class="form-group">
                        <label for="kategori">Marketplace</label>
                        <select class="form-control" id="marketplace" name="marketplace" placeholder="Pick a state...">
                          <option value="">Pilih Marketplace...</option>
                          @foreach($marketplaces as $marketplace)
                          <option value="{{ $marketplace->id }}">
                            {{ $marketplace->marketplace }}
                          </option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">        
                      <div class="form-group">
                        <label for="kategori">Ekspedisi</label>
                        <select class="form-control" id="ekspedisi" name="ekspedisi" placeholder="Pick a state...">
                          <option value="">Pilih Ekspedisi...</option>
                          @foreach($ekspedisis as $ekspedisi)
                            <option value="{{ $ekspedisi->id }}">
                              {{ $ekspedisi->ekspedisi }}
                            </option>
                          @endforeach 
                        </select>
                      </div>
                    </div>
                  </div>
                <button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-search "></i>  Cari</button>
              </div>
            </form>

        </div>       
        
      </div>
      {{-- end body --}}
    </div>

  </div>
</section>
@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function(){

$("table").DataTable();

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

                $.post("user/"+id,access)
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