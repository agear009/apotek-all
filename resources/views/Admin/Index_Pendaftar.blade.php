@extends('Layouts.MainAdmin')

@section('Container')

    <div class="wrapper">

      <div class="main-panel">
        @include('Partials.NavbarAdmin')

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Peroses Verifikasi</h3>
                <h6 class="op-7 mb-2">Silahkan hubungi kontak kami untuk verifikasi akun anda</h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">

                <a href="#" class="btn btn-primary btn-round">Anda belum bisa ke halaman akun anda</a>
              </div>
            </div>

            </div>
          </div>
        </div>

@endsection
