@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="marge-top"></div>
            <div class="col-12">
                <div class="containers">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="rows1">
                            <h4>Paramètre de connexion</h4>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="rows1">
                            <div class="col-12">
                                <div class="footer-newsletter text-center">
                                    <input type="submit" value="Se connecter" />
                                </div>
                                <br>
                                <div class="text-center">
                                    <label for="terms">Pas encore membre ? <a href="{{ route('register') }}"> s'inscrire
                                            ici</a></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="marge-bottom"></div>
        </div>
    </div>


@endsection
