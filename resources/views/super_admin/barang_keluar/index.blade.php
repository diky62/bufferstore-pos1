@extends('layouts/superadmin_view')
@section('content')
<section>
  <div class="container">
    <div class="card-body">
    
    {{-- end heading --}}
  
      <div class="panel-body">
      
        
          <center><h3>Data Transaksi</h3></center>
          <a href="{{ route('barang_keluar.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i>        Tambah Transaksi</button></a>
          
          <br>
          <hr>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Marketplace</th>
                <th>Ekspedisi</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>


             @foreach($barang_keluars as $a => $barang_keluar)
             @php
                setlocale (LC_TIME, 'id_ID');
                $date = strftime( "%d %B %Y", strtotime($barang_keluar->tanggal));
                $date1 = strftime( " %d %B %Y", time());
                        
              @endphp
              <tr>
                <td>{{$a+1}}</td>
                <td>{{$barang_keluar->nama}}</td>
                <td>{{$barang_keluar->alamat}}</td>
                <td>{{$barang_keluar->no_hp}}</td>
                <td>{{$barang_keluar->marketplace->marketplace}}</td>
                <td>{{$barang_keluar->ekspedisi->ekspedisi}}</td>
                <td>{{$date}}</td>
                <td>
                  <button type="button" class="btn btn-danger" onclick="destroy({{$barang_keluar->id}})"><i class="fa fa-trash"></i> Delete</button>
                  <button type="button" class="btn btn-warning"><i class="fa fa-edit" data-toggle="modal" data-target="#showBarang" ></i> Show</button>

                  <form id="delete{{$barang_keluar->id}}" action="{{ route('barang_keluar.destroy',$barang_keluar->id) }}" method="post">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="id" value="{{$barang_keluar->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            
          </table>    
        </div>
        <div id="showBarang" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
              <!-- heading modal -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- body modal -->
              <div class="modal-body">
                <center>  
                  <h4 class="modal-title">Daftar Barang</h4>
                </center>
                <p>bagian body modal.</p>
              </div>
              <!-- footer modal -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
              </div>
            </div>
          </div>
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

                $.post("barang_masuk/"+id,access)
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