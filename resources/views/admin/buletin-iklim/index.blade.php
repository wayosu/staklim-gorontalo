@extends('layout.app', ['title' => '| Buletin Iklim'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Buletin Iklim</h4>
            <a href="{{ route('buletin-iklim.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
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
                                <th>Pdf</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buletiniklims as $bi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bi->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($bi->desc), 60, '...') }}</td>
                                    <td><a href="{{ asset($bi->pdf_path) }}" class="btn btn-primary" target="_blank"><i class="fas fa-file"></i></a></td>
                                    <td>
                                        <form action="{{ route('buletin-iklim.destroy', $bi->id) }}" method="POST">
                                            <a href="{{ route('buletin-iklim.edit', $bi->id) }}"
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