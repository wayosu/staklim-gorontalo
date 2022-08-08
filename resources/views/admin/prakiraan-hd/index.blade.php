@extends('layout.app', ['title' => '| Prakiraan Hujan Dasarian'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Prakiraan Hujan Dasarian</h4>
            <a href="{{ route('prakiraan-hujan-dasarian.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
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
                                <th>Pdf</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prahd as $phd)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $phd->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($phd->desc), 60, '...') }}</td>
                                    <td>
                                        <img src="{{ asset($phd->first_img) }}" alt="first img" width="200">
                                        <img src="{{ asset($phd->second_img) }}" alt="second img" width="200">
                                        <img src="{{ asset($phd->three_img) }}" alt="second img" width="200">
                                    </td>
                                    <td>
                                        <a href="{{ asset($phd->first_pdf) }}" class="btn btn-primary" target="_blank"><i class="fas fa-file"></i></a>
                                        <a href="{{ asset($phd->second_pdf) }}" class="btn btn-primary" target="_blank"><i class="fas fa-file"></i></a>
                                        <a href="{{ asset($phd->three_pdf) }}" class="btn btn-primary" target="_blank"><i class="fas fa-file"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('prakiraan-hujan-dasarian.destroy', $phd->id) }}" method="POST">
                                            <a href="{{ route('prakiraan-hujan-dasarian.edit', $phd->id) }}"
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