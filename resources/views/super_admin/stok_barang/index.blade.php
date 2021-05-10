@extends('layouts/superadmin_view')
@section('content')
<section>
  <div class="container">
    <div class="card-body">
    
    {{-- end heading --}}
  
    <div class="panel-body">
      
        
          <center><h3>Stok Barang</h3></center>
          <a href="{{ route('stok_barang.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i>        Tambah Barang</button></a>
          <br>
          <hr>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Barang</th>
              <th>Kategori Barang</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Stok Barang</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach($stok_barangs as $a => $stok_barang)
          {{--  @php
           dd($stok_barang);
           @endphp --}}
            <tr>
              <td>{{$a+1}}</td>
              <td>{{$stok_barang->nama_barang}}</td>
              <td>{{$stok_barang->kategori->kategori}}</td>
              <td>{{ number_format($stok_barang->harga_beli,0,".",".") }}</td>
              <td>{{ number_format($stok_barang->harga_jual,0,".",".") }}</td>
              <td>{{$stok_barang->qty}}</td>
              <td>
                <button type="button" class="btn btn-danger" onclick="destroy({{$stok_barang->id}})"><i class="fa fa-trash"></i> Delete</button>
                <a href="{{route('stok_barang.edit', $stok_barang->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i> EDIT</a>

                <form id="delete{{$stok_barang->id}}" action="{{ route('stok_barang.destroy',$stok_barang->id) }}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="id" value="{{$stok_barang->id}}">
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

                $.post("stok_barang/"+id,access)
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