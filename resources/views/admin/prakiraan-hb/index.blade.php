@extends('layout.app', ['title' => '| Prakiraan Hujan Bulanan'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Prakiraan Hujan Bulanan</h4>
            <a href="{{ route('prakiraan-hujan-bulanan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Kategori</th>
                                <th>Bulan Tahun</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($phbs as $phb)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $phb->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($phb->desc), 60, '...') }}</td>
                                    <td>
                                        @if ($phb->kategori == 'curah')
                                            Curah Hujan
                                        @elseif ($phb->kategori == 'sifat')
                                            Sifat Hujan
                                        @elseif ($phb->kategori == 'peluang')
                                            Peluang Hujan
                                        @endif
                                    </td>
                                    <td>{{ date('F Y', strtotime($phb->bulan_tahun)) }}</td>
                                    <td><img src="{{ asset($phb->img) }}" alt="img" width="200"></td>
                                    <td>
                                        <form action="{{ route('prakiraan-hujan-bulanan.destroy', $phb->id) }}" method="POST">
                                            <a href="{{ route('prakiraan-hujan-bulanan.edit', $phb->id) }}"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
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