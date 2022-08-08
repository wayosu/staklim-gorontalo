@extends('layout.app', ['title' => '| Permintan Data'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Detail Permohonan Data</h4>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mb-0 text-dark h5">Judul</label>
                            <p class="m-0">{{ $pd->judul }}</p>
                        </div>
                        <div class="form-group">
                            <label class="mb-0 text-dark h5">Nama</label>
                            <p class="m-0">{{ $pd->user->name }}</p>
                        </div>
                        <div class="form-group">
                            <label class="mb-0 text-dark h5">Universitas</label>
                            <p class="m-0">{{ $pd->user->universitas }}</p>
                        </div>
                        <div class="form-group">
                            <label class="mb-0 text-dark h5">Program Studi</label>
                            <p class="m-0">{{ $pd->user->prodi }}</p>
                        </div>
                        <div class="form-group">
                            <label class="mb-0 text-dark h5">Email</label>
                            <p class="m-0">{{ $pd->user->email }}</p>
                        </div>
                        <div class="form-group">
                            <label class="mb-0 text-dark h5">Unsur Iklim</label>
                            <p class="m-0">{{ $pd->unsur_iklim }}</p>
                        </div>
                        @if($pd->status == 2)
                        <hr>                     
                        <div class="form-group">
                            <label class="mb-0 text-dark h5">File Data Permintaan</label>
                            <br>
                            <a href="{{ asset($pd->file_data ?? '') }}" class="btn btn-primary" target="_blank"><i class="fas fa-file"></i></a>
                        </div>
                        <div class="form-group">
                            <label class="mb-0 text-dark h5">Pesan</label>
                            <p class="m-0">{{ $pd->pesan ?? '' }}</p>
                        </div>
                        @elseif($pd->status == 3)
                        <div class="form-group">
                            <label class="mb-0 text-dark h5">Alasan Ditolak</label>
                            <p class="m-0">{{ $pd->alasan ?? '' }}</p>
                        </div>
                        @endif
                        <div class="form-group mb-1">
                            @if ($pd->status == 0)
                            <div class="badge badge-dark py-3 px-3 mb-0 d-block" style="font-size: 16px;">Waiting</div>
                            @elseif ($pd->status == 1)
                            <div class="badge badge-info py-3 px-3 mb-0 d-block" style="font-size: 16px;">Sedang Diproses</div>
                            @elseif ($pd->status == 2)
                            <div class="badge badge-success py-3 px-3 mb-0 d-block" style="font-size: 16px;">Barhasil Verifikasi</div>
                            @elseif ($pd->status == 3)
                            <div class="badge badge-danger py-3 px-3 mb-0 d-block" style="font-size: 16px;">Permintaan data ditolak.</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    @if ($pd->status == 0)
                    <div class="d-flex">
                        @role('user')
                        <a href="{{ route('user.permintaan-data') }}" class="btn btn-secondary">Kembali</a>
                        @endrole
                        @role('admin')
                        <a href="{{ route('admin.permintaan-data') }}" class="btn btn-secondary">Kembali</a>
                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#modalTolak"><i class="fas fa-times"></i> Tolak</button>
                        <div class="modal fade" id="modalTolak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Penolakan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.permintaan-data.tolak', $pd->id) }}" method="post" class="mx-1" onsubmit="return confirm('Ok untuk menolak data ke kepala bagian. Cancel untuk membatalkan.')">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Alasan Ditolak</label>
                                                <textarea name="alasan" class="form-control" rows="4" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Kirim Penolakan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('admin.permintaan-data.teruskan', $pd->id) }}" class="ml-2" method="post" onsubmit="return confirm('Ok untuk meneruskan data ke kepala bagian. Cancel untuk membatalkan.')">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-success"><i class="fas fa-share"></i> Teruskan</button>
                        </form>
                        @endrole
                    </div>
                    @elseif ($pd->status == 1)
                        @role('admin')
                        <a href="{{ route('admin.permintaan-data') }}" class="btn btn-secondary">Kembali</a>
                        @endrole
                        @role('user')
                        <a href="{{ route('user.permintaan-data') }}" class="btn btn-secondary">Kembali</a>
                        @endrole
                        @role('kepalabidang')
                        <form action="{{ route('kepalabidang.permintaan-data.verifikasi', $pd->id) }}" method="post" onsubmit="return confirm('Ok untuk verifikasi data. Cancel untuk membatalkan.')">
                            @csrf
                            @method('put')
                            <a href="{{ route('kepalabidang.permintaan-data') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Verifikasi</button>
                        </form>
                        @endrole
                    @else
                    @role('admin')
                    <a href="{{ route('admin.permintaan-data') }}" class="btn btn-secondary">Kembali</a>
                    @endrole
                    @role('kepalabidang')
                    <a href="{{ route('kepalabidang.permintaan-data') }}" class="btn btn-secondary">Kembali</a>
                    @endrole
                    @role('user')
                    <a href="{{ route('user.permintaan-data') }}" class="btn btn-secondary">Kembali</a>
                    @endrole
                    @endif
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="{{ asset($pd->pengantar) }}" class="text-decoration-none" target="_blank">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <h1 class="m-0" style="font-size: 60px;"><i class="fas fa-file-alt"></i></h1>
                                        <h4 class="mt-2 mb-0 text-dark">File Pengantar</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="{{ asset($pd->proposal) }}" class="text-decoration-none" target="_blank">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <h1 class="m-0" style="font-size: 60px;"><i class="fas fa-file-alt"></i></h1>
                                        <h4 class="mt-2 mb-0 text-dark">File Proposal</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="{{ asset($pd->pernyataan) }}" class="text-decoration-none" target="_blank">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <h1 class="m-0" style="font-size: 60px;"><i class="fas fa-file-alt"></i></h1>
                                        <h4 class="mt-2 mb-0 text-dark">File Pernyataan</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4">
                        <a href="{{ asset($pd->file_pendukung_satu) }}" class="text-decoration-none" target="_blank">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <h1 class="m-0" style="font-size: 60px;"><i class="fas fa-file-alt"></i></h1>
                                        <h4 class="mt-2 mb-0 text-dark">File Pendukung 1</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="{{ asset($pd->file_pendukung_dua) }}" class="text-decoration-none" target="_blank">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <h1 class="m-0" style="font-size: 60px;"><i class="fas fa-file-alt"></i></h1>
                                        <h4 class="mt-2 mb-0 text-dark">File Pendukung 2</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection