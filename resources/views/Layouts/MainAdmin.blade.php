<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Halaman Admin</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="../../assets/admin/assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="../../assets/admin/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["../../assets/admin/assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>


    <!-- CSS Files -->
    <link rel="stylesheet" href="../../assets/admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/admin/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../../assets/admin/assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, dont include it in your project -->
    <link rel="stylesheet" href="../../assets/admin/assets/css/demo.css" />
    <script src="../../assets/tinymce/js/tinymce/tinymce.min.js"></script>





        </head>


    <body>


        @include('Partials.SidebarAdmin')

        @yield('Container')

        @include('Partials.FooterAdmin')



                    <script type="text/javascript">

                        var rupiah = document.getElementById('rupiah');
                        rupiah.addEventListener('keyup', function(e){
                            // tambahkan 'Rp.' pada saat form di ketik
                            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                            rupiah.value = formatRupiah(this.value, 'Rp. ');
                        });

                        /* Fungsi formatRupiah */
                        function formatRupiah(angka, prefix){
                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                            split   		= number_string.split(','),
                            sisa     		= split[0].length % 3,
                            rupiah     		= split[0].substr(0, sisa),
                            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                            if(ribuan){
                                separator = sisa ? '.' : '';
                                rupiah += separator + ribuan.join('.');
                            }

                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                        }
                    </script>

    </body>

<script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>

  <script type="text/javascript">

  tinymce.init({

      selector: "textarea",

      plugins: [

          "advlist autolink lists link image charmap print preview anchor",

          "searchreplace visualblocks code fullscreen",

          "insertdatetime media table contextmenu paste"

      ],

  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"

  });

  </script>
</html>
