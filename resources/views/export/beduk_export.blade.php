<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Jabatan</title>
</head>
<body>

    <div>
        <h4>Daftar</h4>
        <h4>Pendaftaran {{$jenis}}</h4>
        <h4></h4>
        {{-- <table class="table table-bordered">
            <tr class="thead-dark">
                <th style="font-size:10px">Daftar</th>
                <th style="font-size:10px">Pendaftaran beduk</th>
            </tr>
        </table> --}}
    </div>

    <div>
        <table class="table table-bordered">
            <tr class="thead-dark">
                <th style="text-align: center; font-size:10px">Timestamp</th>
                <th style="text-align: center; font-size:10px">Event</th>
                <th style="text-align: center; font-size:10px">Nama</th>
                <th style="text-align: center; font-size:10px">Telepon</th>
                <th style="text-align: center; font-size:10px">Email</th>
                <th style="text-align: center; font-size:10px">Bukti</th>
                @forelse ($pertanyaan as $ask)
                    <th style="text-align: center; font-size:10px">{{$ask}}</th>   
                @empty
                @endforelse
                <th colspan="{{$num_file}}" style="text-align: center; font-size:10px">File tambahan</th>
                


            </tr>
            @foreach ($datas as $data)
                <tr>
                    <td style="font-size:10px">{{ $data->created_at }}</td>
                    <td style="font-size:10px">{{ $data->nama }}</td>
                    <td style="font-size:10px">{{ $data->user->nama }}</td>
                    <td style="font-size:10px">{{ $data->telepon }}</td>
                    <td style="font-size:10px">{{ $data->user->email }}</td>
                    <td style="font-size:10px">{{ asset($data->bukti) }}</td>
                    @php
                        $jawabans = explode(",",$data->jawaban);
                        $file_tambahan = explode(",",$data->file_tambahan);
                    @endphp
                    
                    @forelse ($jawabans as $jawaban)
                    <td style="font-size:10px">{{ $jawaban }}</td>
                    @empty 
                    @endforelse

                    @for ($i=0;$i<$num_file;$i++)
                        @if(array_key_exists($i,$file_tambahan))
                            <td style="font-size:10px">{{ asset($file_tambahan[$i]) }}</td>
                        @else
                            <td style="font-size:10px">-</td>
                        @endif
                   
                    @endfor

                    

                </tr>
            @endforeach
        </table>
    </div>
    
</body>
</html>