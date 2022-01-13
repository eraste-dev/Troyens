@extends('layout.admin')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Médiathèques</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Médiathèques</li>
                        </ol>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-flex align-items-center justify-content-end">
                            @include('components.blogs.addBlogs')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <div class="card o-hidden border-0">
                <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-database">
                                <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                            </svg>
                        </div>
                        <div class="media-body"><span class="m-0">Total Article</span>
                            <h4 class="mb-0 counter">{{ $count_post }}</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-database icon-bg">
                                <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        @if ($posts->count() > 0)
            <div class="row">
                @foreach ($posts as $item)
                    <div class="col-sm-6 col-xl-3 box-col-6 des-xl-50">
                        <div class="card">
                            <div class="blog-box blog-grid">
                                <div class="blog-wrraper">
                                    <a href="blog-single.html">
                                        @if (is_null($item->media) && $item->media_type !== 'videos')
                                            <img class="img-fluid top-radius-blog"
                                                src="{{ asset('back/images/blog/blog-5.jpg') }}" alt="">
                                        @else
                                            <img class="img-fluid top-radius-blog"
                                                src="{{ asset("uploads/$item->media") }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="blog-details-second">
                                    <div class="blog-post-date"><span class="blg-month">apr</span><span
                                            class="blg-date">10</span></div><a href="blog-single.html">
                                        <h6 class="blog-bottom-details">
                                            {{ $item->titre }}
                                        </h6>
                                    </a>

                                    <div class="detail-footer">
                                        <ul class="sociyal-list">
                                            <li>
                                                <i class="fa fa-user-o"></i>
                                                {{ $item->created_by }}
                                            </li>

                                            <li>
                                                @include('components.blogs.updateBlog')
                                            </li>

                                            <li>
                                                <a href="{{ route('admin.blogs.delete', $item) }}" class="btn btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4 d-flex justify-content-center">{!! $posts->links() !!}</div>
        @else
            <div class="alert alert-danger dark" role="alert">
                <p>Aucun article!</p>
            </div>
        @endif
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/summernote.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('back/js/jquery.ui.min.js') }}"></script>

    <script src="{{ asset('back/js/editor/ckeditor/ckeditor.js') }}" defer></script>
    <script src="{{ asset('back/js/editor/ckeditor/adapters/jquery.js') }} " defer></script>
    <script src="{{ asset('back/js/editor/ckeditor/styles.js') }} " defer></script>
    <script src="{{ asset('back/js/editor/ckeditor/ckeditor.custom.js') }}" defer></script>

    <script>
        $('#navLinkBlogs').addClass("active");
        $("#currentSubMenu").css("display", "block");
    </script>
@endpush
