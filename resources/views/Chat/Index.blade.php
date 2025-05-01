<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Dokter Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100 p-6 font-sans">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-2xl font-bold mb-6">Dokter yang Sedang Online</h2>

      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Card Dokter -->
        <div class="bg-white p-4 rounded-2xl shadow hover:shadow-md transition">
          <div class="flex items-center gap-4">
            <img
              src="https://via.placeholder.com/64"
              alt="Dr. Andi"
              class="w-16 h-16 rounded-full object-cover"
            />
            <div>
              <div class="text-lg font-semibold">dr. Andi Wijaya</div>
              <div class="text-sm text-gray-600">Dokter Umum</div>
              <div class="flex items-center text-green-500 text-sm mt-1">
                <span class="h-2 w-2 bg-green-500 rounded-full mr-2"></span>
                Online
              </div>
            </div>
          </div>
          <button
            class="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl font-semibold"
          >
            Chat Sekarang
          </button>
        </div>

        <!-- Card Dokter -->
        <div class="bg-white p-4 rounded-2xl shadow hover:shadow-md transition">
          <div class="flex items-center gap-4">
            <img
              src="https://via.placeholder.com/64"
              alt="Dr. Siti"
              class="w-16 h-16 rounded-full object-cover"
            />
            <div>
              <div class="text-lg font-semibold">dr. Siti Lestari</div>
              <div class="text-sm text-gray-600">Dokter Anak</div>
              <div class="flex items-center text-green-500 text-sm mt-1">
                <span class="h-2 w-2 bg-green-500 rounded-full mr-2"></span>
                Online
              </div>
            </div>
          </div>
          <button
            class="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl font-semibold"
          >
            Chat Sekarang
          </button>
        </div>

        <!-- Card Dokter -->
        <div class="bg-white p-4 rounded-2xl shadow hover:shadow-md transition">
          <div class="flex items-center gap-4">
            <img
              src="https://via.placeholder.com/64"
              alt="Dr. Yoga"
              class="w-16 h-16 rounded-full object-cover"
            />
            <div>
              <div class="text-lg font-semibold">dr. Yoga Pranata</div>
              <div class="text-sm text-gray-600">Dokter Gigi</div>
              <div class="flex items-center text-green-500 text-sm mt-1">
                <span class="h-2 w-2 bg-green-500 rounded-full mr-2"></span>
                Online
              </div>
            </div>
          </div>
          <button
            class="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl font-semibold"
          >
            Chat Sekarang
          </button>
        </div>
      </div>
    </div>
  </body>
</html>
