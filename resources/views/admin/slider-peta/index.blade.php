@extends('layout.app', ['title' => '| Slider Peta'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="m-0">Slider Peta</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%">
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
                            @foreach ($sliderpeta as $sp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sp->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($sp->desc), 60, '...') }}</td>
                                    <td><img src="{{ asset($sp->img) }}" alt="img" width="100"></td>
                                    <td>
                                        <a href="{{ route('sliderpeta.edit', $sp->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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