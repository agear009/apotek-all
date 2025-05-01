<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout Obat & Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100 p-4 font-sans">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8">
      <!-- ✅ Chat Section -->
      <div class="bg-white rounded-2xl shadow-lg p-6 h-[500px] flex flex-col">
        <h2 class="text-xl font-bold mb-4">Chat dengan Apoteker</h2>
        <div class="flex-1 overflow-y-auto space-y-3 pr-2">
          <!-- Chat bubble (apoteker) -->
          <div class="bg-gray-100 text-gray-800 rounded-xl p-3 max-w-[75%]">
            Halo, ada yang bisa kami bantu?
          </div>
          <!-- Chat bubble (user) -->
          <div class="bg-blue-500 text-white rounded-xl p-3 max-w-[75%] self-end">
            Saya ingin beli paracetamol, ada stok?
          </div>
        </div>
        <div class="mt-4 flex">
          <input
            type="text"
            placeholder="Ketik pesan..."
            class="flex-1 border border-gray-300 rounded-l-xl px-4 py-2 focus:outline-none"
          />
          <button class="bg-blue-500 text-white px-4 rounded-r-xl hover:bg-blue-600">
            Kirim
          </button>
        </div>
      </div>

      <!-- ✅ Checkout Section -->
      <div class="bg-white rounded-2xl shadow-lg p-6 space-y-4">
        <h2 class="text-xl font-bold">Daftar Checkout Obat</h2>

        <!-- Item 1 -->
        <div class="flex items-center gap-4 border-b pb-4">
          <img
            src="https://via.placeholder.com/64"
            alt="Paracetamol"
            class="w-16 h-16 object-cover rounded-lg"
          />
          <div class="flex-1">
            <div class="font-semibold">Paracetamol 500mg</div>
            <div class="text-sm text-gray-600">2 x Rp3.000</div>
          </div>
          <div class="font-bold text-blue-600">Rp6.000</div>
        </div>

        <!-- Item 2 -->
        <div class="flex items-center gap-4 border-b pb-4">
          <img
            src="https://via.placeholder.com/64"
            alt="Vitamin C"
            class="w-16 h-16 object-cover rounded-lg"
          />
          <div class="flex-1">
            <div class="font-semibold">Vitamin C 1000mg</div>
            <div class="text-sm text-gray-600">1 x Rp15.000</div>
          </div>
          <div class="font-bold text-blue-600">Rp15.000</div>
        </div>

        <!-- Total -->
        <div class="flex justify-between text-lg font-semibold pt-4">
          <span>Total</span>
          <span>Rp21.000</span>
        </div>

        <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-xl text-lg font-semibold">
          Konfirmasi Pembelian
        </button>
      </div>
    </div>
  </body>
</html>
