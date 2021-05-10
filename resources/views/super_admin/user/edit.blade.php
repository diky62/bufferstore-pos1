@extends('layouts/superadmin_view')
@section('content')
<section>
  <div class="container">
    <div class="card-body">
      
      {{-- end heading --}}
      <a href="{{ route('user.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>
      <div class="panel-body">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah User</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
           <form method="POST" action="{{ route('user.update', $users->id) }}" fid="orderForm" >
            @method('put')
            @csrf
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$users->name}}" placeholder="Nama" required>
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input class="form-control" id="alamat" value="{{$users->alamat}}" name="alamat" placeholder="Alamat" required>
              </div>

              <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input type="text" class="form-control" value="{{$users->no_hp}}" id="no_hp" name="no_hp" placeholder="No HP" required onkeypress="return hanyaAngka(event)">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control"  value="{{$users->email}}" id="email" name="email" placeholder="Email" required >
              </div>

              <div class="form-group">
                <label for="role">Hak Akses</label>
                  <select class="form-control" id="role" name="role" placeholder="Pick a state...">
                    <option value="">Pilih Hak Akses...</option>
                    @foreach($roles as $role)
                      <option value="{{ $role->id }}" {{ $role->id == $users->roles_id ? 'selected' : null }}>{{ $role->name }} </option>
                    @endforeach 
                  </select>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                {{-- <input type="password" class="form-control" id="password" name="password" placeholder="Password" required > <i id="show-password" class="fa fa-eye"></i> --}}
                {{-- @php
                $password = ('$users->password');
                $decrypted = Crypt::decryptString($password);
                dd($decrypted);
                @endphp --}}
                <i class="fa fa-lock"></i>
                <input type="password"  id="login-password" {{-- value="{{$users->password}}" --}} class="form-control" name="password" placeholder="Password">
                {{-- <input id="show-password" class="form-check-input" type="checkbox" checked>
                <label class="form-check-label">Tampilkan Password</label> --}}
                {{-- <i id="show-password" class="fa fa-eye"></i> --}}
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