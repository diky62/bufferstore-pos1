@extends('layouts/superadmin_view')
@section('content')
<section>
  <div class="container">
    <div class="card-body">
    
    {{-- end heading --}}
  
    <div class="panel-body">
      
        
          <center><h3>Data Barang Masuk</h3></center>
          <a href="{{ route('barang_masuk.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i>        Tambah Barang Masuk</button></a>
          <br>
          <hr>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Barang</th>
              <th>Kategori Barang</th>
              <th>Tanggal</th>
              <th>Qty</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>


           @foreach($barang_masuks as $a => $barang_masuk)
           @php
              setlocale (LC_TIME, 'id_ID');
              $date = strftime( "%d %B %Y", strtotime($barang_masuk->tanggal));
              $date1 = strftime( " %d %B %Y", time());
                      
            @endphp
            <tr>
              <td>{{$a+1}}</td>
              <td>{{$barang_masuk->stok_barang->nama_barang}}</td>
              <td>{{$barang_masuk->stok_barang->kategori->kategori}}</td>
              <td>{{$date}}</td>
              <td>{{$barang_masuk->qty}}</td>
              <td>
                <button type="button" class="btn btn-danger" onclick="destroy({{$barang_masuk->id}})"><i class="fa fa-trash"></i> Delete</button>
                <a href="{{route('barang_masuk.edit', $barang_masuk->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i> EDIT</a>

                <form id="delete{{$barang_masuk->id}}" action="{{ route('barang_masuk.destroy',$barang_masuk->id) }}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="id" value="{{$barang_masuk->id}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
          
        </table>    
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