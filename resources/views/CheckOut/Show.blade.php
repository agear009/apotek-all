<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .checkout-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .checkout-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .checkout-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
        .total-price {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="checkout-container">
            <h2 class="text-center mb-4">Checkout</h2>

            <div id="checkout-items">
                <!-- Produk yang dipilih akan muncul di sini -->
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <span class="total-price">Total Harga: <span id="total-price">Rp. 0</span></span>
                <button class="btn btn-danger" id="checkout-button">Checkout</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let checkoutItemsContainer = document.getElementById("checkout-items");
            let totalPriceElement = document.getElementById("total-price");
            let checkoutButton = document.getElementById("checkout-button");

            let selectedItems = [
                { id: 1, name: "Paracetamol", price: 20000, quantity: 2, image: "https://via.placeholder.com/60" },
                { id: 2, name: "Vitamin C", price: 15000, quantity: 1, image: "https://via.placeholder.com/60" }
            ];

            function renderCheckoutItems() {
                checkoutItemsContainer.innerHTML = "";
                let total = 0;

                selectedItems.forEach((item, index) => {
                    let itemTotal = item.price * item.quantity;
                    total += itemTotal;

                    let itemElement = document.createElement("div");
                    itemElement.classList.add("checkout-item");
                    itemElement.innerHTML = `
                        <div class="d-flex align-items-center">
                            <img src="${item.image}" alt="${item.name}">
                            <div class="ms-3">
                                <h5 class="mb-1">${item.name}</h5>
                                <span>${item.quantity} x Rp. ${item.price.toLocaleString()}</span>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-outline-danger" onclick="removeItem(${index})">Hapus</button>
                    `;
                    checkoutItemsContainer.appendChild(itemElement);
                });

                totalPriceElement.textContent = `Rp. ${total.toLocaleString()}`;
            }

            window.removeItem = function(index) {
                selectedItems.splice(index, 1);
                renderCheckoutItems();
            }

            checkoutButton.addEventListener("click", function() {
                alert("Checkout berhasil!");
            });

            renderCheckoutItems();
        });
    </script>
</body>
</html>
