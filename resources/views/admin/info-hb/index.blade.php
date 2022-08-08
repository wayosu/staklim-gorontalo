@extends('layout.app', ['title' => '| Informasi Hujan Bulanan'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Informasi Hujan Bulanan</h4>
            <a href="{{ route('informasi-hujan-bulanan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
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
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($infohbs as $ihs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ihs->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($ihs->desc), 60, '...') }}</td>
                                    <td>
                                        <img src="{{ asset($ihs->first_img) }}" alt="first img" width="200">
                                        <img src="{{ asset($ihs->second_img) }}" alt="second img" width="200">
                                    </td>
                                    <td>
                                        <form action="{{ route('informasi-hujan-bulanan.destroy', $ihs->id) }}" method="POST">
                                            <a href="{{ route('informasi-hujan-bulanan.edit', $ihs->id) }}"
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