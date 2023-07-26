@extends('landing.app')

@section('title')
<title>JEWEPE</title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 mt-3">Info JEWEPE</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, neque. Fugiat quam aspernatur molestias consequatur incidunt soluta, magnam hic voluptatum dolorem? Optio totam ullam ducimus vitae eius magnam commodi assumenda!.</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($data as $article)
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    {{-- <a href="{{ route('medicine.kesehatan-detail', ['slug' => $kesehatan->slug]) }}"><img src="{{ asset('storage/'. old('thumbnail', $kesehatan->thumbnail)) }}"
                            class="card-img-top rounded-0" alt="..." height="200px"></a> --}}
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/profile/user-1.jpg" alt=""
                        class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                        height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Addie Keller">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">{{ $article->category }}</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="{{ route('medicine.kesehatan-detail', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>{{ date('D, d M Y', strtotime($article->created_at)) }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endsection
