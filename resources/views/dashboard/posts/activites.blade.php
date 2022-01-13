@extends('layout.admin')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Nos partenaires</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Partenaires</li>
                        </ol>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-flex align-items-center justify-content-end">
                            @include('components.blogs.activites.addActivites')
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
                        <div class="media-body"><span class="m-0">Total Activité</span>
                            <h4 class="mb-0 counter">{{ $posts->count() }}</h4>
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
        <div class="card-body">
            @if ($posts->count() > 0)
                <div class="table-responsive">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th>Activitée</th>
                                <th>lieu</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Documents joints</th>
                                <th> </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $item)
                                <tr>
                                    <td> {{ $item->titre }} </td>

                                    <td> {{ $item->lieu }} </td>

                                    <td>{{ $item->date }}</td>

                                    <td>{{ $item->contenu }}</td>

                                    <td> </td>

                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.blogs.delete', $item) }}"
                                                class="btn btn-danger me-2">
                                                <i class="fa fa-trash-o"></i>
                                            </a>

                                            @include('components.blogs.activites.updateActivites')
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-danger dark" role="alert">
                    <p>Aucune activitée!</p>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/datatables.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('back/js/datatable/datatables/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('back/js/datatable/datatables/datatable.custom.js') }}" defer></script>

    <script src="{{ asset('back/js/editor/ckeditor/ckeditor.js') }}" defer></script>
    <script src="{{ asset('back/js/editor/ckeditor/adapters/jquery.js') }} " defer></script>
    <script src="{{ asset('back/js/editor/ckeditor/styles.js') }} " defer></script>
    <script src="{{ asset('back/js/editor/ckeditor/ckeditor.custom.js') }}" defer></script>

    <script defer>
        $('#navLinkActivite').addClass("active");
        $("#activitesSubMenu").css("display", "block");
    </script>

@endpush
