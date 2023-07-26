@extends('landing.app')

@section('title')
    <title>{{ $data->title }} - JEWEPE</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card rounded-2 overflow-hidden">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="{{ asset('storage/' . old('thumbnail', $data->thumbnail)) }}"
                        class="card-img-top rounded-0 object-fit-cover" alt="..." height="440"></a>
                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/profile/user-1.jpg"
                    alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9"
                    width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Esther Lindsey">
            </div>
            <div class="card-body p-4">
                <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">{{ $data->category }}</span>
                <h2 class="fs-9 fw-semibold my-4">{{ $data->title }}</h2>
                <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center fs-2 ms-auto"><i
                            class="ti ti-point text-dark"></i>{{ date('D, d M Y', strtotime($data->created_at)) }}
                    </div>
                </div>
            </div>
            <div class="card-body border-top p-4">
                {!! $data->content !!}
            </div>

            @if ($data->is_comment == 'BUKA')
                <div class="card-body border-top p-4">
                    <p class="text-center">
                        <b>{{ $commentsCount }} KOMENTAR</b>
                    </p>
                    <div class="mb-3">
                        @foreach ($comments as $comment)
                            <div class="mb-3">
                                <b>{{ $comment->name }}</b><br>
                                {{ $comment->content }}
                            </div>
                        @endforeach
                    </div>

                    <form action="{{ route('landing.comment-post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mt-3 mb-3">
                                <div class="note-title">
                                    <label class="mb-2">Nama</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama" required />
                                    <input type="hidden" class="form-control" name="article_id"
                                        value="{{ $data->id }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mt-3 mb-3">
                                <div class="note-title">
                                    <label class="mb-2">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-1 mb-4">
                                <div class="note-title">
                                    <label class="mb-2">Komentar</label>
                                    <textarea class="form-control" name="content" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end mt-4 gap-1">
                                <a href="{{ route('landing.index') }}" class="btn btn-danger">Kembali</a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
    </div>
    </div>
@endsection
