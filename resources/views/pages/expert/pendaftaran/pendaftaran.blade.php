@extends('layouts.expert')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Pendaftaran</h1>

    <div class="row">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tipe</th>
                <th scope="col">Waktu</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($data as $dt)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                    
                  @if(isset($dt->id_konsultasi))
                    <td>
                        {{$dt->tipe->nama}}
                    </td>
                    <td>
                        {{$dt->transaksi->jawaban}}
                    </td>
                    <td>
                        {{$dt->is_done == 1 ? "selesai" : "berjalan"}}
                    </td>
                    <td>
                        @if($dt->is_done != 1)
                        <a class="btn btn-primary btn-sm" href="{{route('konsultasiDone',['id'=>$dt->id])}}">Selesai</a>
                        @endif
                    </td>
                  @elseif(isset($dt->id_event))
                    <td>
                        {{$dt->event->judul}}
                    </td>
                    <td>
                        {{$dt->event->tanggal}} <br>
                        <small>{{$dt->event->waktu}}</small>
                    </td>
                    <td></td>
                  @endif

                </tr> 
                @empty 
                @endforelse
              
            </tbody>
          </table>
    </div>

</div>

<script>
    function done(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('konsultasiDone') }}",
            data : {
                id : id,
            },
            dataType: 'json',
            success : (data)=>{
                alern("sukses");
            }
        });
        console.log("data end");
         $('#exampleModal').modal('show');
    }
</script>

@endsection