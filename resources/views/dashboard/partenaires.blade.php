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
                            @include('components.partenaires.addPartenaire')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card-body">
            <div class="table-responsive">
                <table class="display text-center" id="basic-1">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Dénomination</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Site internet</th>
                            <th>Siège</th>
                            <th> </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($partenaires as $item)
                            <tr>
                                <td>
                                    @if (!is_null($item->avatar))
                                        <div class="avatar"><img class="img-100"
                                                src="{{ asset('uploads/' . $item->avatar) }}" alt="#"></div>
                                    @else
                                        <div class="avatar">
                                            <i data-feather="user"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $item->raisonSocial }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->telephone }}</td>
                                <td>
                                    @if (!is_null($item->site_web))
                                        <a href="{{ $item->site_web }}" target="_blank" rel="noopener noreferrer">
                                            <i data-feather="external-link"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $item->siege }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.partenaires.delete', $item) }}" class="btn btn-danger me-2">
                                            <i class="fa fa-trash-o"></i>
                                        </a>

                                        @include('components.partenaires.updatePartenaire')
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/datatables.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('back/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/js/datatable/datatables/datatable.custom.js') }}"></script>

    <script>
        $('#navLinkPartenaires').addClass("active");
        /*   if ("{{ $errors->any() }}" === 1) {
              $("#addPartenaire").addClass("modal-backdrop show");
          } */
    </script>
@endpush
