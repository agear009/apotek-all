
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
                <h3 class="fw-bold mb-3">User</h3>
                <h6 class="op-7 mb-2">Silahkan tambah user</h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">


                <a href="{{ route('user.create') }}" class="btn btn-primary btn-round">Tambah User</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Visitors</p>
                          <h4 class="card-title">1,294</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Subscribers</p>
                          <h4 class="card-title">1303</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Sales</p>
                          <h4 class="card-title">$ 1,345</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Order</p>
                          <h4 class="card-title">576</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">

                </div>
                <div class="row">

              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Masukan Data User</div>
                      <div class="card-tools">
                        <div class="dropdown">
                          <button
                            class="btn btn-icon btn-clean me-0"
                            type="button"
                            id="dropdownMenuButton"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fas fa-ellipsis-h"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#"
                              >Something else here</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">


                      <!-- Projects table -->
                      <form action="{{ route('user.update', $user->id) }}" method="POST"  enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col" class="text-end"></th>


                              </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row" colspan="6">
                                        <label for="exampleInputname1" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name Category" value="{{ $user->name }}" required>

                                    </th>
                                  </tr>
                                <tr>
                                    <th scope="row" colspan="6">
                                        <label for="exampleInputname1" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="name" name="email" aria-describedby="name Category" value="{{ $user->email }}" required>

                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                        <label for="exampleInputname1" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="name" name="password" aria-describedby="password" value="{{ $user->password }}"required>

                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                    <img src="{{ asset('/storage/public/users/'.$user->foto) }}" width="20%"><br>
                                    <label for="exampleInputname1" class="form-label">Foto </label>
                                    <input type="file" class="form-control" id="ktp" name="foto" aria-describedby="Cover">

                                    </th>
                                  </tr>
                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">No Handphone</label>
                                    <input type="text" class="form-control" id="name" name="nohp" aria-describedby="Cover" value="{{ $user->nohp }}" required>

                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Level</label>

                                        <select class="form-control" id="level_user" name="level" required>
                                        <option class="form-control" id="level_user" name="level" value="{{ $user->level }}">{{ $user->level }}</option>
                                        <option class="form-control" id="level_user" name="level" value="User">User</option>
                                        <option class="form-control" id="level_user" name="level" value="Pekerja">Pekerja</option>
                                        <option class="form-control" id="level_user" name="level" value="Kasir">Kasir</option>
                                        <option class="form-control" id="level_user" name="level" value="Apoteker">Apoteker</option>
                                        <option class="form-control" id="level_user" name="level" value="Dokter">Dokter</option>
                                        <option class="form-control" id="level_user" name="level" value="Admin">Admin</option>
                                        </select>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Status</label>

                                    <select class="form-control" id="level_user" name="status" required>
                                    <option class="form-control" id="level_user" name="status" value="{{ $user->status }}">{{ $user->status }}</option>
                                    <option class="form-control" id="level_user" name="status" value="menunggu_konfirmasi">Menunggu Konfirmasi</option>
                                    <option class="form-control" id="level_user" name="status" value="aktif">Aktif</option>
                                    <option class="form-control" id="level_user" name="status" value="tidak_aktif">Tidak Aktif</option>
                                    </select>

                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">ID Toko</label>
                                    <input type="text" class="form-control" id="name" name="id_toko" aria-describedby="Cover" value="{{ $user->id_toko }}" required>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">No Rekening</label>
                                    <input type="text" class="form-control" id="name" name="norek" aria-describedby="Cover" value="{{ $user->norek }}" required>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Saldo</label>
                                    <input type="text" class="form-control" id="rupiah" name="saldo" aria-describedby="Cover" value="{{ $user->saldo }}"required>
                                    </th>
                                  </tr>

                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Bank</label>
                                    <select class="form-control" id="level_user" name="bank" required>
                                        <option class="form-control" id="level_user" name="bank" value="{{ $user->bank }}">{{ $user->bank }}</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Indonesia (BI)">Bank Indonesia (BI)</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Mandiri">Bank Mandiri</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Negara Indonesia (BNI)">Bank Negara Indonesia (BNI)</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Rakyat Indonesia (BRI)">Bank Rakyat Indonesia (BRI)</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Tabungan Negara (BTN)">Bank Tabungan Negara (BTN)</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Central Asia (BCA)">Bank Central Asia (BCA)</option>
                                        <option class="form-control" id="level_user" name="bank" value="Panin Bank">Panin Bank</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Permata">Bank Permata</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Woori Saudara">Bank Woori Saudara</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank ICBC Indonesia">Bank ICBC Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank DKI">Bank DKI</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BJB">Bank BJB</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Jateng">Bank Jateng</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BPD DIY">Bank BPD DIY</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Jatim">Bank Jatim</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Kalbar">Bank Kalbar</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Kalteng">Bank Kalteng</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Kalsel">Bank Kalsel</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Kaltim">Bank Kaltim</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Sulsel">Bank Sulsel</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Sultra">Bank Sultra</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BPD Sulteng">Bank BPD Sulteng</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Sulut">Bank Sulut</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BPD Bali">Bank BPD Bali</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank NTB">Bank NTB</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank NTT">Bank NTT</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Maluku">Bank Maluku</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Papua">Bank Papua</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BRI Agroniaga">Bank BRI Agroniaga</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Anda">Bank Anda</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Artha Graha Internasional">Bank Artha Graha Internasional</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Bukopin">Bank Bukopin</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Bumi Arta">Bank Bumi Arta</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Capital Indonesia">Bank Capital Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Danamon Indonesia">Bank Danamon Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Ekonomi Raharja">Bank Ekonomi Raharja</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Ganesha">Bank Ganesha</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank KEB Hana">Bank KEB Hana</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Index Selindo">Bank Index Selindo</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Maybank Indonesia">Bank Maybank Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Maspion">Bank Maspion</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Mayapada">Bank Mayapada</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Mega">Bank Mega</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Mestika Dharma">Bank Mestika Dharma</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Shinhan Indonesia">Bank Shinhan Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank MNC Internasional">Bank MNC Internasional</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank J Trust Indonesia">Bank J Trust Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Nusantara Parahyangan">Bank Nusantara Parahyangan</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank OCBC NISP">Bank OCBC NISP</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank of India Indonesia">Bank of India Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank QNB Indonesia">Bank QNB Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank SBI Indonesia">Bank SBI Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Sinarmas">Bank Sinarmas</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank UOB Indonesia">Bank UOB Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Amar Bank Indonesia">Amar Bank Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Andara">Bank Andara</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Artos Indonesia">Bank Artos Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Bisnis Internasional">Bank Bisnis Internasional</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Tabungan Pensiunan Nasional">Bank Tabungan Pensiunan Nasional</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Sahabat Sampoerna">Bank Sahabat Sampoerna</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Fama Internasional">Bank Fama Internasional</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Harda Internasional">Bank Harda Internasional</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Ina Perdana">Bank Ina Perdana</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Jasa Jakarta">Bank Jasa Jakarta</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Kesejahteraan Ekonomi">Bank Kesejahteraan Ekonomi</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Dinar Indonesia">Bank Dinar Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Mayora">Bank Mayora</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Mitraniaga">Bank Mitraniaga</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Multi Arta Sentosa">Bank Multi Arta Sentosa</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Nationalnobu">Bank Nationalnobu</option>
                                        <option class="form-control" id="level_user" name="bank" value="Prima Master Bank">Prima Master Bank</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Pundi Indonesia">Bank Pundi Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Royal Indonesia">Bank Royal Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Mandiri Taspen Pos">Bank Mandiri Taspen Pos</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Victoria Internasional">Bank Victoria Internasional</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Yudha Bhakti">Bank Yudha Bhakti</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BPD Aceh">Bank BPD Aceh</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Sumut">Bank Sumut</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Nagari">Bank Nagari</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Riau Kepri">Bank Riau Kepri</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Jambi">Bank Jambi</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Bengkulu">Bank Bengkulu</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Sumsel Babel">Bank Sumsel Babel</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Lampung">Bank Lampung</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank ANZ Indonesia">Bank ANZ Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Commonwealth">Bank Commonwealth</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Agris">Bank Agris</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BNP Paribas Indonesia">Bank BNP Paribas Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Capital Indonesia">Bank Capital Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Chinatrust Indonesia">Bank Chinatrust Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank DBS Indonesia">Bank DBS Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Mizuho Indonesia">Bank Mizuho Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Rabobank International Indonesia">Bank Rabobank International Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Resona Perdania">Bank Resona Perdania</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Sumitomo Mitsui Indonesia">Bank Sumitomo Mitsui Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Windu Kentjana International">Bank Windu Kentjana International</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank of America">Bank of America</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bangkok Bank">Bangkok Bank</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank of China">Bank of China</option>
                                        <option class="form-control" id="level_user" name="bank" value="Citibank">Citibank</option>
                                        <option class="form-control" id="level_user" name="bank" value="Deutsche Bank">Deutsche Bank</option>
                                        <option class="form-control" id="level_user" name="bank" value="HSBC">HSBC</option>
                                        <option class="form-control" id="level_user" name="bank" value="JPMorgan Chase">JPMorgan Chase</option>
                                        <option class="form-control" id="level_user" name="bank" value="Standard Chartered">Standard Chartered</option>
                                        <option class="form-control" id="level_user" name="bank" value="The Bank of Tokyo-Mitsubishi UFJ">The Bank of Tokyo-Mitsubishi UFJ</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BNI Syariah">Bank BNI Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Mega Syariah">Bank Mega Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Muamalat Indonesia">Bank Muamalat Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Syariah Mandiri">Bank Syariah Mandiri</option>
                                        <option class="form-control" id="level_user" name="bank" value="BCA Syariah">BCA Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BJB Syariah">Bank BJB Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BRI Syariah">Bank BRI Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Panin Bank Syariah">Panin Bank Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Syariah Bukopin">Bank Syariah Bukopin</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Victoria Syariah">Bank Victoria Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="BTPN Syariah">BTPN Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Maybank Syariah Indonesia">Bank Maybank Syariah Indonesia</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BTN Syariah">Bank BTN Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Danamon Syariah">Bank Danamon Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="CIMB Niaga Syariah">CIMB Niaga Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="BII Syariah">BII Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="OCBC NISP Syariah">OCBC NISP Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Permata Syariah">Bank Permata Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Nagari Syariah">Bank Nagari Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank BPD Aceh Syariah">Bank BPD Aceh Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank DKI Syariah">Bank DKI Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Kalbar Syariah">Bank Kalbar Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Kalsel Syariah">Bank Kalsel Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank NTB Syariah">Bank NTB Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Riau Kepri Syariah">Bank Riau Kepri Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Sumsel Babel Syariah">Bank Sumsel Babel Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Sumut Syariah">Bank Sumut Syariah</option>
                                        <option class="form-control" id="level_user" name="bank" value="Bank Kaltim Syariah">Bank Kaltim Syariah</option>
                                        </select>

                                </th>
                              </tr>

                              <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Spesialis</label>

                                    <select class="form-control" id="level_user" name="spesialis" required>
                                    <option class="form-control" id="level_user" name="spesialis" value="{{ $user->spesialis }}">{{ $user->spesialis }}</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="-">-</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak">Anak</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak_(Alergi-Imunologi_Anak)">Anak (Alergi-Imunologi Anak)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak_(Tumbuh_Kembang)">Anak (Tumbuh Kembang)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak_(Penyakit_Tropik-Infeksi)">Anak (Penyakit Tropik-Infeksi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak_(Nutrisi_&_Penyakit_Metabolik)">Anak (Nutrisi & Penyakit Metabolik)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak_(Neurologi)">Anak (Neurologi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak_(Neonatologi)">Anak (Neonatologi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak_(Nefrologi)">Anak (Nefrologi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak_(Hematologi-Onkologi)">Anak (Hematologi-Onkologi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak_(Gastroenterologi-Hepatologi)">Anak (Gastroenterologi-Hepatologi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anak_(Onkologi)">Anak (Onkologi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Ak_(Analgesi-Anestesi)">Ak (Analgesi-Anestesi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Akupuntur">Akupuntur</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Andrologi">Andrologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Ahli_Gizi">Ahli Gizi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Apoteker">Apoteker</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Anestesiologi">Anestesiologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Anak">Bedah Anak</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Toraks_Kardiovaskular">Bedah Toraks Kardiovaskular</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Plastik">Bedah Plastik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Onkologi">Bedah Onkologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Saraf">Bedah Saraf</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Mulut_&_Maksilofasial">Bedah Mulut & Maksilofasial</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Digestif">Bedah Digestif</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Umum">Bedah Umum</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Panggul_&_Lutut">Bedah Panggul & Lutut</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Spine">Bedah Spine</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Toraks_Kardiak_&_Vaskular_-_Konsultan_Vaskular_EndoVaskular">Bedah Toraks Kardiak & Vaskular - Konsultan Vaskular EndoVaskular</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bidan">Bidan</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Panggul_&_Lutut">Bedah Panggul & Lutut</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Bedah_Vaskuler_&_Endovaskuler">Bedah Vaskuler & Endovaskuler</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokter_Hewan">Dokter Hewan</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokter_Gigi_Sp._Radiologi">Dokter Gigi Sp. Radiologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokter_Gigi_Kosmetik">Dokter Gigi Kosmetik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokter_Emergensi_Medik">Dokter Emergensi Medik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokter_Gigi_Spesialis_Radiologi_-_Subspesialis_Radiodiagnosis_Imaging">Dokter Gigi Spesialis Radiologi - Subspesialis Radiodiagnosis Imaging</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokter_Umum_(DU)">Dokter Umum (DU)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokte_Forensik">Dokter Forensik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokter_Kecantikan">Dokter Kecantikan</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokter_Bedah">Dokter Bedah</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokter_Umum">Dokter Umum</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Dokter_Gigi">Dokter Gigi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Fetomaternal">Fetomaternal</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Fisioterapis">Fisioterapis</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Farmakologi_Klinik">Farmakologi Klinik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Gizi_Klinik_(Konsultan_Endokrin_Metabolik)">Gizi Klinik (Konsultan Endokrin Metabolik)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Gigi_Anak">Gigi Anak</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Gizi_Klinik">Gizi Klinik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Haloskin">Haloskin</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Hipnoterapis">Hipnoterapis</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Ilmu_Biomedik">Ilmu Biomedik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Intervensi_Kegawatdaruratan_Napas">Intervensi dan Kegawatdaruratan Napas</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Insurance">Insurance</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Jantung_(Kardiologi_Intervensi)">Jantung (Kardiologi Intervensi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Jiwa_(Anak_dan_Remaja)">Jiwa (Anak dan Remaja)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Jiwa">Jiwa</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Jantung_&_Pembuluh_Darah">Jantung & Pembuluh Darah</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Kedokteran_Olahraga_(Ahli_Latihan_dan_Kompetisi)">Kedokteran Olahraga (Ahli Latihan dan Kompetisi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Kulit_&_Kelamin_(Alergi_Imunologi)">Kulit & Kelamin (Alergi-Imunologi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Kedokteran_Penerbangan">Kedokteran Penerbangan</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Kedokteran_Keluarga_Layanan_Primer">Kedokteran Keluarga Layanan Primer</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Kedokteran_Kelautan">Kedokteran Kelautan</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Kedokteran_Olahraga">Kedokteran Olahraga</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Konservasi_Gigi">Konservasi Gigi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Kedokteran_Nuklir">Kedokteran Nuklir</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Konsultasi_Medis">Konsultasi Medis</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Konselor_Laktasi">Konselor Laktasi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Kulit_&_Kelamin">Kulit & Kelamin</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Kandungan_&_Kebidanan">Kandungan & Kebidanan</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Lainnya">Lainnya</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Mikrobiologi_Klinik">Mikrobiologi Klinik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Mata">Mata</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Nutrisi_pada_Kelainan_Metabolisme">Nutrisi pada Kelainan Metabolisme</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Orthopedi_Olahraga_dan_Artroskopi">Orthopedi Olahraga dan Artroskopi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="OG_(Fertilitas_Endokrinologi_Reproduksi)">OG (Fertilitas Endokrinologi Reproduksi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Ortodonsia">Ortodonsia</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Onkologi_Radiasi">Onkologi Radiasi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Okupasi">Okupasi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="OT_(Subspesialis_Orthopaedi_Anak)">OT (Subspesialis Orthopaedi Anak)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Orthopaedi_&_Traumatologi">Orthopaedi & Traumatologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="PD_Tropik_-_Infeksi">PD Tropik - Infeksi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="PD_Alergi_-_Imunologi">PD Alergi - Imunologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="PD_Hematologi_&_Onkologi_Medik">PD Hematologi & Onkologi Medik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="PD_Kardiovaskular">PD Kardiovaskular</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="PD_Reumatologi">PD Reumatologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="PD_Ginjal_-_Hipertensi">PD Ginjal - Hipertensi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="PD_Endokrin_-_Metabolik_-_Diabetes">PD Endokrin - Metabolik - Diabetes</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="PD_Gastroenterologi_-_Hepatologi">PD Gastroenterologi - Hepatologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="PD_Psikosomatik">PD Psikosomatik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="PD_Geriatri">PD Geriatri</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Penyakit_Mulut">Penyakit Mulut</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Paru">Paru</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Prostodonsia">Prostodonsia</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Psikolog_Klinis">Psikolog Klinis</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Penyakit_Dalam">Penyakit Dalam</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Psikolog_Klinis_Anak_&_Remeja">Psikolog Klinis Anak & Remaja</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Psikolog_Klinis_Dewasa">Psikolog Klinis Dewasa</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Psikologi_Industri_dan_Organisasi">Psikologi Industri dan Organisasi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Psikolog_Non_Klinis">Psikolog Non Klinis</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Periodonsia">Periodonsia</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Patologi_Klinik">Patologi Klinik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Patologi_Anatomi">Patologi Anatomi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Penyakit_Dalam_(Pulmonologi)">Penyakit Dalam (Pulmonologi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Rehabilitasi_Medik_&_Kedokteran_Fisik">Rehabilitasi Medik & Kedokteran Fisik</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Rad_(Intervensi)">Rad (Intervensi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Radiologi">Radiologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Saraf_(Neuro_-_onkologi)">Saraf (Neuro-onkologi)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Saraf_Konsultan_Nyeri">Saraf Konsultan Nyeri</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Saraf">Saraf</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="THT">THT</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="THT_(Laring_Faring)">THT (Laring Faring)</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Uroginekologi">Uroginekologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="Urologi">Urologi</option>
                                    <option class="form-control" id="level_user" name="spesialis" value="THT_(Bronko_-_Esofagologi)">THT (Bronko-Esofagologi)</option>

                                    </select>

                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">praktek</label>
                                    <input type="text" class="form-control" id="name" name="praktek" aria-describedby="Cover" value="{{ $user->praktek }}" required>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">alamat</label>
                                    <input type="text" class="form-control" id="name" name="alamat" aria-describedby="Cover" value="{{ $user->alamat }}" required>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Peta</label>
                                    <input type="text" class="form-control" id="name" name="latitude" aria-describedby="Cover" value="{{ $user->latitude }}" required>
                                    <input type="text" class="form-control" id="name" name="longitude" aria-describedby="Cover" value="{{ $user->longitude }}" required>
                                    <a href="/map" id="mapLink" class="map-link" target="/map">Lihat di Google Maps</a>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Provinsi:</label>
                                    <select id="provinsi" class="form-control">

                                        <option class="form-control" id="level_user" name="spesialis" value="{{ $user->provinsi }}">{{ $user->provinsi }}</option>
                                        @if(count($provinsi) > 0)

                                        @foreach($provinsi as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                        @endforeach
                                        @else
                                        <option value="">Data tidak ditemukan</option>
                                        @endif

                                    </select>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Kota / Kabupaten:</label>
                                    <select id="kota" class="form-control">
                                        <option class="form-control" id="level_user" name="spesialis" value="{{ $user->kabupatenkota }}">{{ $user->kabupatenkota }}</option>
                                        @if(count($kota) > 0)

                                        @foreach($kota as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                        @else
                                        <option value="">Data tidak ditemukan</option>
                                        @endif
                                    </select>
                                    </th>
                                  </tr>



                                  <script>
                                    $("#provinsi").change(function() {
                                        var id = $(this).val();
                                        $("#kota").html('<option>Loading...</option>');
                                        $.get('/get-kota/' + id, function(data) {
                                            $("#kota").html('<option value="">-- Pilih Kota --</option>');
                                            data.forEach(kota => {
                                                $("#kota").append(`<option value="${kota.id}">${kota.nama}</option>`);
                                            });
                                        });
                                    });

                                    $("#kota").change(function() {
                                        var id = $(this).val();
                                        $.get('/get-kecamatan/' + id, function(data) {
                                            $("#kecamatan").html('<option value="">-- Pilih Kecamatan --</option>');
                                            data.forEach(kecamatan => {
                                                $("#kecamatan").append(`<option value="${kecamatan.id}">${kecamatan.nama}</option>`);
                                            });
                                        });
                                    });

                                    $("#kecamatan").change(function() {
                                        var id = $(this).val();
                                        $.get('/get-kelurahan/' + id, function(data) {
                                            $("#kelurahan").html('<option value="">-- Pilih Kelurahan --</option>');
                                            data.forEach(kelurahan => {
                                                $("#kelurahan").append(`<option value="${kelurahan.id}">${kelurahan.nama}</option>`);
                                            });
                                        });
                                    });
                                </script>

                              <tr>
                                <th scope="row" colspan="6">
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </th>
                              </tr>


                            </tbody>
                          </table>

                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


