@extends('dashboard.layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
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
                            <div class="table-responsive col-lg-12">
                                <a href="/tambah-anime" class="btn btn-primary mb-3">Create new post</a>
                                  <table class="table table-striped table-sm">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Genre</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($post as $p)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->title }}</td>
                                        <td>{{ $p->category()->first()->name }}</td>
                                        <td>
                                          <div class="role-links d-flex">
                                            @foreach ($p->genre()->get() as $g)
                                            <a class="badge bg-dark text-white">{{ $g->name }}</a>
                                            @endforeach
                                          </div>
                                        </td>
                                        <td>
                                          <a href="/dashboard/{{ $p->slug }}" class="badge bg-info"><i class="fa-solid fa-eye" style="color: #000000;"></i></a>
                                          <a href="/edit-anime/{{ $p->slug }}" class="badge bg-warning"><i class="fa-regular fa-pen-to-square" style="color: #000000;"></i></a>
                                          <a href="/delete-anime/{{ $p->slug }}" class="badge bg-danger"><i class="fa-solid fa-trash-can" style="color: #000000;"></i></a>
                                          <a href="/dashboard/{{ $p->slug }}" class="badge bg-success text-dark"><i class="fa fa-comments" style="color: #000000;"></i> {{ $p->comments()->count() }}</a>
                                        </td>
                                      </tr>
                                      @endforeach
                                      
                                    </tbody>
                                  </table>
                                  {{ $post->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
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
                            <div class="table-responsive col-lg-12">
                                <h6>New comment</h6>
                                  <table class="table table-striped table-sm">
                                    <thead>
                                      <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Lihat</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($comment as $c)
                                      <tr>
                                        <td>{{ $c->name }}</td>
                                        <td>{{ $c->comment }}</td>
                                        <td>
                                          <a href="/dashboard/{{ $c->post()->first()->slug }}" class="badge bg-info"><i class="fa-solid fa-eye" style="color: #000000;"></i></a>
                                        </td>
                                      </tr>
                                      @endforeach
                                      
                                    </tbody>
                                  </table>
                                  {{ $comment->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
