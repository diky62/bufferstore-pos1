@extends('layouts/superadmin_view')
@section('content')
<section>
  <div class="container">
    <div class="card-body">
      
      {{-- end heading --}}
      <a href="{{ route('stok_barang.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>
      <div class="panel-body">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Barang</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{ route('stok_barang.store') }}" >
              {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" required>
              </div>

              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
              </div>
        
              <div class="form-group">
                <label for="kategori">Kategori Barang</label>
                  <select class="form-control" id="kategori" name="kategori" placeholder="Pick a state...">
                    <option value="">Pilih Kategori...</option>
                    @foreach($kategoris as $kategori)
                      <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                    @endforeach 
                  </select>
              </div>

              <div class="form-group">
                <label for="harga_beli">Harga Beli</label>
                <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga Beli" required onkeypress="return hanyaAngka(event)">
              </div>

              <div class="form-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual" required onkeypress="return hanyaAngka(event)">
              </div>

              <div class="form-group">
                <label for="qty">QTY</label>
                <input type="text" class="form-control" id="qty" name="qty" placeholder="QTY" required onkeypress="return hanyaAngka(event)">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-save "></i>  Submit</button>
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