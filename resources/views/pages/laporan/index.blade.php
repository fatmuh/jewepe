@extends('layouts.app')

@section('title')
    <title>
        JEWEPE - Laporan</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Laporan JEWEPE</h5>
                <p class="mb-0">
                <table class="table datatab">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Kategori</th>
                            <th>Jumlah Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $article)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->category }}</td>
                                <td>{{ $commentsCount[$article->id] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.datatab').DataTable();
        });
    </script>
@endsection
