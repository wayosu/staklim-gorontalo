@extends('layout.app', ['title' => '| Informasi Hari Tanpa Hujan'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Informasi Hari Tanpa Hujan</h4>
            <a href="{{ route('create_infohth') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
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
                            @foreach ($infohths as $ihth)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ihth->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($ihth->desc), 60, '...') }}</td>
                                    <td><img src="{{ asset($ihth->img) }}" alt="img" width="100"></td>
                                    <td>
                                        <form action="{{ route('destroy_infohth', $ihth->id) }}" method="POST">
                                            <a href="{{ route('edit_infohth', $ihth->id) }}"
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