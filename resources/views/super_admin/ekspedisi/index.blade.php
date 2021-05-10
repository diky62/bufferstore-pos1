@extends('layouts/superadmin_view')
@section('content')
<section>
  <div class="container">
    <div class="card-body">
    
    {{-- end heading --}}
  
    <div class="panel-body">
      <form method="POST" action="{{ route('ekspedisi.store') }}" >
          {{ csrf_field() }}

        {{-- <div class="card-body"> --}}
         <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Ekspedisi</h3>
          </div>
          <div class="card-body">            
            <div class="form-group">
              <label for="ekspedisi">Ekspedisi</label>
              <input type="text" class="form-control" id="ekspedisi" name="ekspedisi" placeholder="Ekspedisi" required>
            </div>
            <button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-save "></i>  Submit</button>
          </div>

        </div>
          {{-- </div> --}}
      </form>
      <br>
        <hr>
        
          <center><h3>Ekspedisi</h3></center>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Ekspedisi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ekspedisis as $a => $ekspedisi)
            <tr>
              <td>{{$a+1}}</td>
              <td>{{$ekspedisi->ekspedisi}}</td>
              <td>
                <button type="button" class="btn btn-danger" onclick="destroy({{$ekspedisi->id}})"><i class="fa fa-trash"></i> Delete</button>

                <form id="delete{{$ekspedisi->id}}" action="{{ route('ekspedisi.destroy',$ekspedisi->id) }}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="id" value="{{$ekspedisi->id}}">
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

                $.post("ekspedisi/"+id,access)
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