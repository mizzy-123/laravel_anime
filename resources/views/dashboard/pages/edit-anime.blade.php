@extends('dashboard.layouts.app')

@section('title', 'Edit Anime')

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
                <h1>Edit Anime</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Edit Anime</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Anime</h2>
                <p class="section-lead">
                    On this page you can edit an anime and fill in all fields.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Write Your Anime</h4>
                            </div>
                            <div class="card-body">
                                <form action="/edit-anime/{{ $anime->slug }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control @error('title')
                                                    is-invalid
                                                @enderror" id="title" name="title" required value="{{ $anime->title }}">
                                                @error('title')
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
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control" id="slug" name="slug" readonly value="{{ $anime->slug }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Episodes</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number"
                                                class="form-control @error('jum_episodes')
                                                    is-invalid
                                                @enderror" id="title" name="jum_episodes" required value="{{ $anime->jum_episodes }}">
                                                @error('jum_episodes')
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
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durasi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control @error('durasi')
                                                    is-invalid
                                                @enderror" id="title" name="durasi" required value="{{ $anime->durasi }}">
                                                @error('durasi')
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
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="category_id" required>
                                                <option></option>
                                                @foreach ($category as $c)
                                                    <option value="{{ $c->id }}" {{ in_array($c->id, $anime->category()->pluck('categories.id')->toArray()) ? 'selected' : '' }}>
                                                        {{ $c->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
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
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Genre</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="genre[]" multiple>
                                                <option></option>
                                                @foreach ($genre as $g)
                                                    {{-- @foreach ($anime->genre()->get() as $item) --}}
                                                    <option value="{{ $g->id }}" {{ in_array($g->id, $anime->genre()->pluck('genres.id')->toArray()) ? 'selected' : '' }}>
                                                        {{ $g->name }}
                                                    </option>
                                                    {{-- @endforeach --}}
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sinopsis</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple" name="sinopsis" required>{{ $anime->sinopsis }}</textarea>
                                            @error('sinopsis')
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
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail Vertical</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview"
                                                class="image-preview">
                                                <label for="image-upload"
                                                    id="image-label">Choose File</label>
                                                <input type="file"
                                                    name="gambar"
                                                    id="image-upload">
                                                    @error('gambar')
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
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail Horizontal</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview2"
                                                class="image-preview2">
                                                <label for="image-upload2"
                                                    id="image-label2">Choose File</label>
                                                <input type="file"
                                                    name="gambarV"
                                                    id="image-upload2">
                                                    @error('gambarV')
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
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link</label>
                                        <div class="col-sm-12 col-md-7">
                                            
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Google Drive</span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('link')
                                                        is-invalid
                                                    @enderror" name="link" required value="{{ $anime->link }}">
                                                </div>
                                                @error('link')
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
                                            <button class="btn btn-primary" type="submit">Update Post</button>
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
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('custom/features-post-create.js') }}"></script>
    {{-- <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script> --}}
    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");
    
        // change digunakan saat setelah selesai baru di proses keyup setiap karakter di proses
        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    
        document.addEventListener("trix-file-accept", function(event) {
            event.preventDefault();
        });
    </script>
@endpush
