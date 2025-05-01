@extends('Layouts.MainPage')

@section('Container')

<main>
    <div class="container">
      <div class="row d-flex justify-content-center py-vh-5 pb-0">
        <div class="col-12 col-lg-10 col-xl-8">
          <div class="row">
            <div class="col-12">
                <br>
              <h1 class="display-1 fw-bold">Saamparan Berita
                @forelse($Post as $post)
                <span class="fs-4">{!! $post->category !!}</span><br>

                {!! $post->title !!}
              </h1>
              <p class="lead border-top pt-5 mt-5" data-aos="fade-up">
                {!! $post->content !!}
              </p>
            </div>
          </div>
        </div>
            <div class="row">
                <div class="col-12 py-vh-2">
                    <img src="{{asset('/storage/public/beritas/'.$post->image )}}" width="1000" height="536" alt="abstract image"
                    class="img-fluid position-relative rounded-5 shadow" data-aos="zoom-up">
                    @empty
                    <div class="alert alert-danger">
                        Data tidak ditemukan.
                    </div>
                </div>

            </div>

      </div>


            @endforelse
    </div>
  </main>

@endsection
