@extends('layouts.admin')

@section('content')

<button type="button" onclick="btnAdd()" class="btn btn-secondary btnAdd">Tambah</button>
<div id="formAdd" class="my-3" style="display:none">
  <form class="form-inline" action="{{route('blogKategoriSave')}}" method="post">
    @csrf
    <div class="form-group">
      <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-secondary">Save</button>
  </form>
</div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($data as $dt)
      <tr>
        <form action="{{route('blogKategoriSave')}}" method="post">
        <th scope="row"  style="width:5%">{{$loop->iteration}}</th>
        <td style="width:60%">
          <div class="show-{{$dt->id}}">{{$dt->nama}}</div>
          <div class="input-{{$dt->id}}" style="display: none">
            <input type="hidden" value="{{$dt->id}}" nama="id" class="form-control">
            <input type="text" value="{{$dt->nama}}" nama="nama" class="form-control">
          </div>
        </td>
        <td style="width:20%">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button onclick="edits({{$dt->id}})" type="button" class="btn btn-secondary btn-sm">Edit</button>
                <a href="{{route('blogKategoriDel',$dt->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a>
                <button type="submit" class="btn btn-success btnSave-{{$dt->id}} btn-sm" style="display: none">Save</button>
            </div>
        </td>
        </form>
      </tr>
      @empty
          
      @endforelse
    </tbody>
</table>

<script>
  function edits(id){
    $('.input-'+id).toggle();
    $('.show-'+id).toggle();
    $('.btnSave-'+id).toggle();
  }

  function btnAdd(){
    $('.btnAdd').toggle();
    $('#formAdd').toggle();
  }
</script>



@endsection