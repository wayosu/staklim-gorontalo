@extends('layout.app', ['title' => '| Permintaan Data'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Permintaan Data</h4>
            @role('user')
            <a href="{{ route('user.permintaan-data.create') }}" class="btn btn-primary"><i class="fas fa-upload"></i> Request Data</a>
            @endrole
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                @role('admin')
                                <th>Pemohon</th>
                                @endrole
                                @role('user')
                                <th>Pengantar</th>
                                <th>Proposal</th>
                                <th>Pernyataan</th>
                                <th>File Pendukung</th>
                                <th>File Data Permintaan</th>
                                @endrole
                                <th>Unsur Iklim</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permintaandatas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->judul }}
                                        @role('admin')
                                        @if (!empty($item->file_data))
                                            <span class="text-success"><i class="fas fa-check"></i></span>
                                        @endif
                                        @endrole
                                    </td>
                                    @role('admin')
                                    <td>{{ $item->user->name }}</td>
                                    @endrole
                                    @role('user')
                                    <td>
                                        <a href="{{ asset($item->pengantar) }}" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-file"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ asset($item->proposal) }}" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-file"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ asset($item->pernyataan) }}" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-file"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if (!empty($item->file_pendukung_satu))                                            
                                        <a href="{{ asset($item->file_pendukung_satu) }}" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-file"></i> 1
                                        </a>
                                        @endif

                                        @if (!empty($item->file_pendukung_dua))                                            
                                        <a href="{{ asset($item->file_pendukung_dua) }}" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-file"></i> 2
                                        </a>
                                        @endif

                                        @if (empty($item->file_pendukung_satu) && empty($item->file_pendukung_dua))                                            
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($item->file_data))                                            
                                        <a href="{{ asset($item->file_data) }}" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-download"></i> Download Data Permintaan
                                        </a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                    @endrole
                                    <td>{{ $item->unsur_iklim }}</td>
                                    <td>
                                        @if ($item->status == 0)
                                        <span class="badge badge-dark">Waiting</span>
                                        @elseif ($item->status == 1)
                                        <span class="badge badge-info">Proses Verifikasi</span>
                                        @elseif ($item->status == 2)
                                        <span class="badge badge-success">Berhasil Verifikasi</span>
                                        @elseif ($item->status == 3)
                                        <span class="badge badge-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        @role('admin')
                                        <form action="{{ route('admin.permintaan-data.destroy', $item->id) }}" method="POST">
                                        @endrole
                                        @role('user')
                                        <form action="{{ route('user.permintaan-data.destroy', $item->id) }}" method="POST">
                                        @endrole
                                            @csrf
                                            @method('delete')
                                            @role('admin')
                                            @if($item->status == 2)
                                                @if (empty($item->file_data))    
                                                <a href="{{ route('admin.permintaan-data.senddata', $item->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-share"></i></a>
                                                @endif
                                            @endif
                                            <a href="{{ route('admin.permintaan-data.show', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                            @endrole
                                            @role('kepalabidang')
                                            <a href="{{ route('kepalabidang.permintaan-data.show', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                            @endrole
                                            @role('user')
                                            <a href="{{ route('user.permintaan-data.show', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                            @endrole
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin menghapus data ini?')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection