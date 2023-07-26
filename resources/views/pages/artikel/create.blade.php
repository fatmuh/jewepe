@extends('layouts.app')

@section('title')
    <title>JEWEPE - Create Article</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8 mt-3">Add Post</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Buat postingan seputar kesehatan disini.</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <!-- Create the editor container -->
                <form action="{{ route('admin.article-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mt-3 mb-3">
                            <div class="note-title">
                                <label class="mb-2">Judul</label>
                                <input type="text" class="form-control" name="title" placeholder="Judul Artikel" />
                            </div>
                        </div>

                        <div class="col-md-6 mt-3 mb-3">
                            <div class="note-title">
                                <label class="mb-2">Kategori</label>
                                <input type="text" class="form-control" name="category" placeholder="Kategori Artikel" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mt-3 mb-3">
                            <div class="note-title">
                                <label class="mb-2">Thumbnail</label>
                                <input class="form-control" type="file" name="thumbnail"
                                    accept="image/jpg,image/jpeg,image/png">
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <div class="note-title">
                                <label class="mb-2">Status Komentar</label>
                                <select name="is_comment" class="form-select mr-sm-2">
                                    <option value="BUKA">Buka Komentar</option>
                                    <option value="TUTUP">Tutup Komentar</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <textarea id="editor" name="content"></textarea>

                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-end mt-4 gap-1">
                            <a href="{{ route('admin.index') }}" class="btn btn-danger">Kembali</a>
                            <button class="btn btn-primary">Buat Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
