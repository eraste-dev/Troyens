@if ($partenaires->count() > 0)
    <section id="clients" class="clients">
        <div class="container">

            <div class="row">
                @foreach ($partenaires as $item)
                    @if (!is_null($item->avatar))
                        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in"
                            data-aos-delay="100">
                            <img src="{{ asset('uploads/' . $item->avatar) }}" class="img-fluid" alt="">
                        </div>
                    @else
                        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in"
                            data-aos-delay="100">
                            <h5 class="text-dark my-2">{{ $item->raisonSocial }}</h5>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section><!-- End Clients Section -->
@endif
