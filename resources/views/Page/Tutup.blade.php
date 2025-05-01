<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutup Tab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .btn-close-tab {
            background-color: #dc3545;
            color: white;
        }
        .btn-close-tab:hover {
            background-color: #c82333;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(() => {
                window.close();
            }, 2000); // Otomatis menutup tab setelah 1 detik
        });
    </script>
</head>
<body>
    <div class="card">
        <h2>Data Berhasil Disimpan!</h2>
        <p>Tab ini akan tertutup secara otomatis dalam beberapa detik.</p>
        <button class="btn btn-close-tab" onclick="window.close()">Tutup Sekarang</button>
    </div>
</body>
</html>
