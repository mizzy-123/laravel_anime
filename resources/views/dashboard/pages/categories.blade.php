@extends('dashboard.layouts.app')

@section('title', 'Categories')

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
                                <a href="/tambah-category" class="btn btn-primary mb-3">Create new category</a>
                                  <table class="table table-striped table-sm">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($categories as $c)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $c->name }}</td>
                                        <td>
                                          <a href="/category/{{ $c->id }}" class="badge bg-warning"><i class="fa-regular fa-pen-to-square" style="color: #000000;"></i></a>
                                          <a href="/delete-category/{{ $c->id }}" class="badge bg-danger"><i class="fa-solid fa-trash-can" style="color: #000000;"></i></a>
                                        </td>
                                      </tr>
                                      @endforeach
                                      
                                    </tbody>
                                  </table>
                                  {{ $categories->links('vendor.pagination.bootstrap-5') }}
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
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
