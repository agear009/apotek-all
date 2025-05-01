
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
                <h3 class="fw-bold mb-3">Gudang</h3>
                <h6 class="op-7 mb-2">Silahkan tambah barang gudang</h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">


                <a href="{{ route('toko.create') }}" class="btn btn-primary btn-round">Tambah Barang</a>
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
                      <div class="card-title">Masukan Data gudang</div>
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
                      <form action="{{ route('toko.update', $toko->id) }}" method="POST"  enctype="multipart/form-data" >
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
                                    <label for="exampleInputname1" class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name Category" value="{{ $toko->name }}" required>
                                    <input type="hidden" class="form-control" id="name" name="id_user" value="{{ auth()->user()->id}}" aria-describedby="name Category"  required>

                                </th>
                              </tr>

                              <tr>
                                <th scope="row" colspan="6">
                                <img src="{{ asset('storage/public/tokos/' . $toko->image) }}" width="20%"><br>
                                    <label for="imageUpload">Logo atau foto toko (Max 1MB):</label><br>
                                    <input type="file" id="imageUpload" accept="image/*" name="image" onchange="validateFile()">
                                    <p id="errorMessage" style="color: red;"></p>
                                </th>
                            </tr>

                            <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="name" name="alamat" aria-describedby="name Category" value="{{ $toko->alamat }}" required>

                                </th>
                              </tr>

                            <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Tipe badan usaha</label>
                                    <select class="form-control" id="level_user" name="tipe_badan_usaha" required>
                                          <option class="form-control" id="level_user" name="tipe_badan_usaha" value="{{ $toko->tipe_badan_usaha }}">{{ $toko->tipe_badan_usaha }}</option>
                                          <option class="form-control" id="level_user" name="tipe_badan_usaha" value="CV">CV</option>
                                    <option class="form-control" id="level_user" name="tipe_badan_usaha" value="PT">PT</option>
                                    </select>
                                </th>
                              </tr>

                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">Email Toko</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="name Category" value="{{ $toko->email }}" required>

                                </th>
                              </tr>


                              <tr>
                                <th scope="row" colspan="6">
                                    <label for="exampleInputname1" class="form-label">NO Handphone</label>
                                    <input type="text" class="form-control" id="name" name="nohp" aria-describedby="name Category" value="{{ $toko->nohp }}" required>

                                </th>
                              </tr>



                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Tipe Apotek</label>
                                <select class="form-control" id="id_category" name="tipe_toko" aria-describedby="category" required >
                                    <option name="category" value="{{ $toko->tipe_toko }}">{{ $toko->tipe_toko }}</option>
                                    <option name="category" value="Apotek">Apotek</option>
                                    <option name="category" value="Klinik_dan_Apotek">Klinik dan Apotek</option>

                                </select>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">latitude</label>
                                <input type="text" class="form-control" id="name" name="latitude" aria-describedby="name Category" value="{{ $toko->latitude }}" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">longitude</label>
                                <input type="text" class="form-control" id="name" name="longitude" aria-describedby="name Category" value="{{ $toko->longitude }}" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                            <label for="exampleInputname1" class="form-label">Provinsi:</label>
                            <select id="provinsi" name="provinsi"  class="form-control">
                                <option name="provinsi" value="{{ $toko->provinsi }}">{{ $toko->provinsi }}</option>
                                <option value="">-- Pilih Provinsi --</option>
                                @if(count($provinsi) > 0)

                                @foreach($provinsi as $p)
                                    <option name="provinsi" value="{{ $p->nama }}">{{ $p->nama }}</option>
                                @endforeach
                                @else
                                <option value="">Data tidak ditemukan</option>
                                @endif

                            </select>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row" colspan="6">
                            <label for="exampleInputname1" class="form-label">Kabupaten atau kota:</label>
                            <select id="kota" name="kabupaten" class="form-control">
                                <option name="kabupaten" value="{{ $toko->kabupaten }}">{{ $toko->kabupaten }}</option>
                                <option name="kabupaten" value="">-- Pilih Kota / kabupaten --</option>
                                 @if(count($kota) > 0)

                                @foreach($kota as $k)
                                    <option name="kabupaten" value="{{ $k->nama }}">{{ $k->nama }}</option>
                                @endforeach
                                @else
                                <option value="">Data tidak ditemukan</option>
                                @endif
                            </select>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Deskripsi</label>
                                <textarea id="myTextarea" name="deskripsi">{!! $toko->deskripsi !!}</textarea>

                            </th>
                          </tr>


                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Like</label>
                                <input type="text" class="form-control" id="name" name="like" aria-describedby="name Category" value="{{ $toko->like }}" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Bintang</label>
                                <input type="text" class="form-control" id="name" name="bintang" aria-describedby="name Category" value="{{ $toko->bintang }}" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Kurir</label>
                                <input type="text" class="form-control" id="name" name="kurir" aria-describedby="name Category" value="{{ $toko->kurir }}" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Pengikut</label>
                                <input type="text" class="form-control" id="name" name="follow" aria-describedby="name Category" value="{{ $toko->follow }}" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="name" name="facebook" aria-describedby="name Category" value="{{ $toko->facebook }}" required>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Tiktok</label>
                                <input type="text" class="form-control" id="name" name="tiktok" aria-describedby="name Category" value="{{ $toko->tiktok }}" required>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="name" name="instagram" aria-describedby="name Category" value="{{ $toko->instagram }}" required>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Whatsapp</label>
                                <input type="text" class="form-control" id="name" name="whatsapp" aria-describedby="name Category" value="{{ $toko->whatsapp }}" required>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Nama direktur</label>
                                <input type="text" class="form-control" id="name" name="nama_direktur" aria-describedby="name Category" value="{{ $toko->nama_direktur }}" required>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">nama_pic_toko</label>
                                <input type="text" class="form-control" id="name" name="nama_pic_toko" aria-describedby="name Category" value="{{ $toko->nama_pic_toko }}" required>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Nama PIC toko</label>
                                <input type="text" class="form-control" id="name" name="nama_pic_toko" aria-describedby="name Category" value="{{ $toko->nama_pic_toko }}" required>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Nama Apoteker</label>
                                <input type="text" class="form-control" id="name" name="nama_apoteker" aria-describedby="name Category" value="{{ $toko->nama_apoteker }}" required>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                            <img src="{{ asset('storage/public/cv_pts/' . $toko->image_cv_pt) }}" width="20%"><br>
                                <label for="imageUpload"> foto PT atau CV (Max 1MB):</label><br>
                                <input type="file" id="imageUpload" accept="image/*" name="image_cv_pt" onchange="validateFile()">
                                <p id="errorMessage" style="color: red;"></p>
                            </th>
                        </tr>

                        <tr>
                            <th scope="row" colspan="6">
                            <img src="{{ asset('storage/public/siup_nibs/' . $toko->image_siup_nib) }}" width="20%"><br>
                                <label for="imageUpload">Foto SIUP atau NIB (Max 1MB):</label><br>
                                <input type="file" id="imageUpload" accept="image/*" name="image_siup_nib"  onchange="validateFile()">
                                <p id="errorMessage" style="color: red;"></p>
                            </th>
                        </tr>

                        <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Nomor Siup atau NIB</label>
                                <input type="text" class="form-control" id="name" name="nomor_siup_nib" aria-describedby="name Category" value="{{ $toko->nomor_siup_nib }}" required>
                            </th>
                          </tr>

                        <tr>
                            <th scope="row" colspan="6">
                            <img src="{{ asset('storage/public/ktps/' . $toko->image_ktp) }}" width="20%"><br>
                                <label for="imageUpload">Foto KTP (Max 1MB):</label><br>
                                <input type="file" id="imageUpload" accept="image/*" name="image_ktp" value="{{ $toko->image_ktp }}" onchange="validateFile()">
                                <p id="errorMessage" style="color: red;"></p>
                            </th>
                        </tr>

                        <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Bank</label>
                                <select class="form-control" id="level_user" name="bank" required>
                                    <option class="form-control" id="level_user" name="bank" value="{{ $toko->bank }}">{{ $toko->bank }}</option>
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
                                <label for="exampleInputname1" class="form-label">Nomor Rekening</label>
                                <input type="text" class="form-control" id="name" name="norek" aria-describedby="name Category" value="{{ $toko->norek }}" required>
                            </th>
                          </tr>

                        <tr>
                            <th scope="row" colspan="6">
                            <img src="{{ asset('storage/public/buku_tabungans/' . $toko->image_buku_tabungan) }}" width="20%"><br>
                                <label for="imageUpload">Foto buku tabungan (Max 1MB):</label><br>
                                <input type="file" id="imageUpload" accept="image/*" name="image_buku_tabungan" onchange="validateFile()">
                                <p id="errorMessage" style="color: red;"></p>
                            </th>
                        </tr>




                        <tr>
                            <th scope="row" colspan="6">
                            <img src="{{ asset('storage/public/npwps/' . $toko->image_npwp) }}" width="20%"><br>
                                <label for="exampleInputname1" class="form-label">Foto NPWP</label><br>
                                <input type="file" id="imageUpload" accept="image/*" name="image_npwp" onchange="validateFile()" >
                                <p id="errorMessage" style="color: red;"></p>
                            </th>
                          </tr>


                        <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Nama NPWP</label>
                                <input type="text" class="form-control" id="name" name="nama_npwp" aria-describedby="name Category" value="{{ $toko->nama_npwp }}" required>
                            </th>
                          </tr>

                        <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Alamat NPWP</label>
                                <input type="text" class="form-control" id="name" name="alamat_npwp" aria-describedby="name Category" value="{{ $toko->alamat_npwp }}" required>
                            </th>
                          </tr>


                        <tr>
                            <th scope="row" colspan="6">
                            <img src="{{ asset('storage/public/sias/' . $toko->image_sia) }}" width="20%"><br>
                                <label for="imageUpload">Foto SIA (Max 1MB):</label><br>
                                <input type="file" id="imageUpload" accept="image/*" name="image_sia" onchange="validateFile()">
                                <p id="errorMessage" style="color: red;"></p>
                            </th>
                        </tr>


                        <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Nomor SIA</label>
                                <input type="text" class="form-control" id="producer" name="nomor_sia" aria-describedby="source" value="{{ $toko->nomor_sia }}" required>

                            </th>
                          </tr>


                        <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Tanggal terbit SIA</label>
                                <input type="date" class="form-control" id="producer" name="tgl_terbit_sia" aria-describedby="source" value="{{ $toko->tgl_terbit_sia }}" required>

                            </th>
                          </tr>

                        <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Tanggal kadaluarsa SIA</label>
                                <input type="date" class="form-control" id="producer" name="tgl_kadaluarsa_sia" aria-describedby="source" value="{{ $toko->tgl_kadaluarsa_sia }}" required>

                            </th>
                          </tr>


                        <tr>
                            <th scope="row" colspan="6">
                            <img src="{{ asset('storage/public/sipas/' . $toko->image_sipa) }}" width="20%"><br>
                                <label for="imageUpload">Foto SIPA (Max 1MB):</label><br>
                                <input type="file" id="imageUpload" accept="image/*" name="image_sipa" onchange="validateFile()">
                                <p id="errorMessage" style="color: red;"></p>
                            </th>
                        </tr>


                        <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Nomor SIPA</label>
                                <input type="text" class="form-control" id="producer" name="nomor_sipa" aria-describedby="source" value="{{ $toko->nomor_sipa }}" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Tanggal terbit SIPA</label>
                                <input type="date" class="form-control" id="producer" name="tgl_terbit_sipa" value="{{ $toko->tgl_terbit_sipa }}" aria-describedby="source" required>

                            </th>
                          </tr>

                        <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Tanggal kadaluarsa SIPA</label>
                                <input type="date" class="form-control" id="producer" name="tgl_kadaluarsa_sipa" value="{{ $toko->tgl_kadaluarsa_sipa }}" aria-describedby="source" required>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Status</label>
                                <select class="form-control" id="id_category" name="status" aria-describedby="category" required >
                                    <option name="status" value="{{ $toko->status }}">{{ $toko->status }}</option>
                                    <option name="status" value="Ditangguhkan">Ditangguhkan</option>
                                    <option name="status" value="Diproses">Diproses</option>
                                    <option name="status" value="Aktif">Aktif</option>

                                </select>

                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <label for="exampleInputname1" class="form-label">Harga Ongkir Lokal (Apabila apotek mempunyai kurir sendiri)</label>
                                <input type="text" class="form-control" id="name" name="ongkir_toko"  value="{{ $toko->ongkir_toko }}" aria-describedby="name Category" required>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row" colspan="6">
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </th>
                          </tr>


                        </tbody>
                      </table>

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


