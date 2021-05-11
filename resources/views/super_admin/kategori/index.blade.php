@extends('layouts/superadmin_view')
@section('content')
<section>
  <div class="container">
    <div class="card-body">
    
    {{-- end heading --}}
  
    <div class="panel-body">
      <form method="POST" action="{{ route('kategori.store') }}" >
          {{ csrf_field() }}

        {{-- <div class="card-body"> --}}
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Ekspedisi</h3>
            </div>
            <div class="card-body">            
              <div class="form-group">
                 <label for="kategori">Kategori Barang</label>
              <input type="text" oninput="this.value = this.value.toCapitalizedCase()" class="form-control" id="kategori" name="kategori" placeholder="Kategori Barang" required>
            </div>
            <button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-save "></i>  Submit</button>
            </div>

          </div>

        
        {{-- </div> --}}
      </form>
      <br>
        <hr>
        
          <center><h3>Kategori Barang</h3></center>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kategori Barang</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kategoris as $a => $kategori)
            <tr>
              <td>{{$a+1}}</td>
              <td>{{$kategori->kategori}}</td>
              <td>
                <button type="button" class="btn btn-danger" onclick="destroy({{$kategori->id}})"><i class="fa fa-trash"></i> Delete</button>

                <form id="delete{{$kategori->id}}" action="{{ route('kategori.destroy',$kategori->id) }}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="id" value="{{$kategori->id}}">
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