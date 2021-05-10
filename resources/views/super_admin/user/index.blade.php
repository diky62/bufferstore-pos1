@extends('layouts/superadmin_view')
@section('content')
<section>
  <div class="container">
    <div class="card-body">
    
    {{-- end heading --}}
  
    <div class="panel-body">
      
        
          <center><h3>User</h3></center>
          <a href="{{ route('user.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i>        Tambah User</button></a>
          <br>
          <hr>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>No HP</th>
              <th>Email</th>
              <th>Hak Akses</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach($users as $a => $user)
            <tr>
              <td>{{$a+1}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->alamat}}</td>
              <td>{{$user->no_hp}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->roles->name}}</td>
              <td>
                <button type="button" class="btn btn-danger" onclick="destroy({{$user->id}})"><i class="fa fa-trash"></i> Delete</button>
                <a href="{{route('user.edit', $user->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i> EDIT</a>

                <form id="delete{{$user->id}}" action="{{ route('user.destroy',$user->id) }}" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="id" value="{{$user->id}}">
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