<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Popup Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
            text-align: center;
        }
        .close {
            float: right;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    @foreach($kategoriobats as $p)
    <button class="openModal"
        data-id="{{ $p->id }}"
        data-name="{{ $p->name }}"
        data-image="{{ asset('/storage/public/kategoriobats/'.$p->image) }}"
        data-deskripsi="{{ $p->deskripsi }}">
        Buka Modal
    </button>

    <div class="modal" id="modal-{{ $p->id }}">
        <div class="modal-content">
            <span class="close">&times;</span>
            <span class="name"></span>

            <p class="modal-name">{{ $p->name }}</p>
            <p class="modal-deskripsi">{{ $p->deskripsi }}</p>
        </div>
    </div>
@endforeach

<script>

    document.querySelectorAll('.openModal').forEach(button => {
        button.addEventListener('click', function() {
            let modalId = this.getAttribute('data-id');
            let modal = document.getElementById(`modal-${modalId}`);
            modal.style.display = "block";
        });
    });

    document.querySelectorAll('.close').forEach(closeButton => {
        closeButton.addEventListener('click', function() {
            this.closest('.modal').style.display = "none";
        });
    });

    window.onclick = function(event) {
        document.querySelectorAll('.modal').forEach(modal => {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    };


</script>




    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("openModal");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
