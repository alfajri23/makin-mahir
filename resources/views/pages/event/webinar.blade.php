@extends('layouts.admin')

@section('content')
<div class="col-11 mx-auto bg-">
    <h4>Webinar</h4>
    <div class="table-responsive">
        <table class="table table-bordered" id="tabelWebinar" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Pemateri</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

<script>
    $.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	          'Authorization': `Bearer {{Session::get('token')}}`
	      }
	});

    const konfigUmum = {
        responsive: true,
        serverSide: true,
        processing: true,
        ordering: true,
        paging: true,
        searching: true,
   };

    $(document).ready( function () {
        let tabel = $('#tabelWebinar');
        let url = "{{ route('webinarIndex') }}";
        let column = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                width: "5%"
            },
            {
                data: 'nama',
                name: 'nama',
            },
            {
                data: 'deskripsi',
                name: 'deskripsi',
            },
            {
                data: 'pemateri',
                name: 'pemateri',
            },
            {
                data: 'tanggal',
                name: 'tanggal',
            },
            {
                data: 'waktu',
                name: 'waktu',
            },
            {
                data: 'status',
                name: 'status',
            },
            {
                data: 'aksi',
                name: 'aksi',
            },
        ]

        let buttons = [
              {
                  extend: 'print',
                  text: '<i class="fa fa-print"></i>',
                  exportOptions: {
                      columns: [ 0, 1, 2 ]
                  },
                  title : 'Daftar agen'
              },
              {
                  extend: 'excelHtml5',
                  text: '<i class="fa fa-file-excel-o"></i>',
                  messageTop: null,
                  exportOptions: {
                      columns: [ 0, 1, 2 ]
                  },
                  title : 'Daftar agen'
              },

              {
                  extend: 'pdfHtml5',
                  text: '<i class="fa fa-file-pdf-o"></i>',
                  messageBottom: null,
                  exportOptions: {
                      columns: [ 0, 1, 2 ]
                  },
                  customize: function(doc) {
                      doc.content[1].table.widths =
                          Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                  },
                  title : 'Daftar agen'
              },
              {
                  text: '<i class="fa fa-refresh"></i>',
                  action: function(e, dt, node, config) {
                      dt.ajax.reload(null, false);
                  }
              }
        ];

        tabel.DataTable({
            ...konfigUmum,
            // dom : '<"float-left"B><"float-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
            dom: 'Bfrtip',
            ajax: {
                "url": url,
                "method": "GET"
            },
            columns: column,
            buttons: buttons
        });












    });
</script>
@endsection