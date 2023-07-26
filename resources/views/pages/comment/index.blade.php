@extends('layouts.app')

@section('title')
    <title>
        JEWEPE - Comment</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Komentar Blog</h5>
                <p class="mb-0">
                <table class="table datatab">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Artikel</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th><i class="ti ti-settings"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $comment)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $comment->article->title }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->content }}</td>
                                <td>
                                    <a href="" class="btn btn-light-danger text-danger" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete{{ $comment->id }}">
                                        <i class="ti ti-trash fs-5 text-center"></i>
                                    </a>
                                </td>
                            </tr>
                            @include('pages.comment.delete')
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
