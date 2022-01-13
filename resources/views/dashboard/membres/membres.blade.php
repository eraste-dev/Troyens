@extends('layout.admin')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Adhérent</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Adhérent</li>
                        </ol>
                    </div>

                    <div class="col-sm-6"> </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-database">
                                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                </svg>
                            </div>
                            <div class="media-body"><span class="m-0">Total Adhérents</span>
                                <h4 class="mb-0 counter">{{ $total }}</h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-database icon-bg">
                                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 col-lg-6">

            </div>
        </div>
    </section>

    <section>
        <div class="row">
            @foreach ($users as $item)
                <div class="col-md-6 col-lg-6 col-xl-6 box-col-6">
                    <div class="card custom-card">
                        <div class="card-header"><img class="img-fluid" src="../assets/images/user-card/1.jpg"
                                alt="">
                        </div>
                        <div class="card-profile">
                            @if (!is_null($item->avatar))
                                <img class="rounded-circle" src"{{ asset('back/images/avtar/3.jpg') }}" alt="">
                            @else
                                <i class="fa fa-user" style="font-size: 4em"></i>
                            @endif
                        </div>

                        <div class="text-center profile-details">
                            <a href="#">
                                <h4>{{ $item->genre . ' ' . $item->nomComplet }}</h4>
                            </a>
                            <h6>{{ $item->role }}</h6>
                        </div>
                        <div class="card-footer row">
                            <div class="col-12 col-sm-12">
                                <h6>Contact</h6>
                                <h3 class="counter">
                                    <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                </h3>
                                <h3 class="counter">
                                    <a href="tel:+{{ $item->telephone }}">{{ $item->telephone }}</a>
                                </h3>
                            </div>
                        </div>

                        <div class="card-footer row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <h6>Matricule</h6>
                                <h3 class="counter">{{ $item->matricule }}</h3>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <h6>Type</h6>
                                <h3 class="counter">{{ $item->niveauEtude . ' - ' . $item->serie }}</h3>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <h6>Diplôme</h6>
                                <h3 class="counter">{{ $item->diplome }}</h3>
                                <h6 class="counter">{{ $item->promotion }}</h6>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 d-flex justify-content-center">{!! $users->links() !!}</div>
    </section>
@endsection

@push('scripts')
    <script>
        $('#navLinkMember').addClass("active");
        $("#currentSubMenu").css("display", "block");
    </script>
@endpush
