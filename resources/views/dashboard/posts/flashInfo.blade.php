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
                            <li class="breadcrumb-item active">Flash infos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card p-2">
            <form action="{{ route('admin.blogs.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="contenu" id="" cols="30" rows="7" class="form-control"
                        required>{{ old('contenu') }}</textarea>
                </div>

                <div class="form-group">
                    <div class="m-checkbox-inline">
                        <label class="f-w-500" for="edo-ani">
                            <input class="radio_animated" id="edo-ani" type="radio" name="media_type" checked=""
                                value="flash">Informmation flash
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block w-100">Enregistrer</button>
                </div>
            </form>
        </div>
    </section>


    <section>
        <div class="card">
            <div class="card-body">
                @if ($posts->count() > 0)
                    <div class="table-responsive">
                        <table class="display text-center" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th> </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($posts as $item)
                                    <tr>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->contenu }}</td>
                                        <td>
                                            <a href="{{ route('admin.blogs.delete', $item) }}" class="btn btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-danger dark" role="alert">
                        <p>Aucun article!</p>
                    </div>
                @endif
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
        $('#navLinkBlogs').addClass("active");
        $("#currentSubMenu").css("display", "block");
    </script>
@endpush
