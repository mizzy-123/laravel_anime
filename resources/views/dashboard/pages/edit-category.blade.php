@extends('dashboard.layouts.app')

@section('title', 'Edit Category')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url('dashboard') }}"
                        class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Edit Category</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Category</h2>
                <p class="section-lead">
                    On this page you can edit a category and fill in all fields.
                </p>
                
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close"
                            data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Write Your Category</h4>
                            </div>
                            <div class="card-body">
                                <form action="/category/{{ $category->id }}" method="POST">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control @error('name')
                                                    is-invalid
                                                @enderror" name="name" value="{{ $category->name }}">
                                                @error('name')
                                                <div class="alert alert-danger alert-dismissible show fade">
                                                    <div class="alert-body">
                                                        <button class="close"
                                                            data-dismiss="alert">
                                                            <span>&times;</span>
                                                        </button>
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('js/page/features-post-create.js') }}"></script> --}}
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
