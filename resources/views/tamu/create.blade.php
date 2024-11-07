<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- tailwind css -->
     <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <title>Wedding Invitation Manager</title>
</head>
<body class="bg-gradient-to-br from-pink-50 to-purple-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-serif text-gray-800 mb-2" id="text_nama_mempelai">Icam & Tami</h1>
            <div class="h-1 w-24 bg-pink-400 mx-auto rounded-full"></div>
        </div>

        <!-- Main Card -->
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8">
                    <h2 class="text-3xl font-semibold text-gray-700 text-center mb-8">Create Invitation</h2>
                    
                    <form action="{{route('tamu.store')}}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Guest Code Input -->
                        <div class="space-y-2">
                            <label for="kode_undangan" class="block text-gray-600 font-medium">Guest Code:</label>
                            <div class="relative">
                                <input type="text" 
                                       id="kode_undangan" 
                                       name="kode_undangan" 
                                       placeholder="Enter unique numeric code" 
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-transparent transition duration-200 placeholder-gray-400"
                                       required>
                            </div>
                        </div>

                        <!-- Guest Name Input -->
                        <div class="space-y-2">
                            <label for="nama" class="block text-gray-600 font-medium">Guest Name:</label>
                            <div class="relative">
                                <input type="text" 
                                       id="nama" 
                                       name="nama" 
                                       placeholder="Example: John & Partner" 
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-transparent transition duration-200 placeholder-gray-400"
                                       required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-pink-500 to-purple-500 text-white font-semibold py-3 px-6 rounded-lg hover:from-pink-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 transform transition duration-200 hover:scale-[1.02]">
                            Create Invitation
                        </button>
                    </form>
                </div>
            </div>

            <!-- Guest List Button -->
            <div class="text-center mt-8">
                <a href="link_undangan.php" 
                   class="inline-flex items-center px-6 py-3 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition duration-200 transform hover:scale-[1.02]">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Guest List
                </a>
            </div>
        </div>

        <!-- Guest Table Section -->
        <div class="col-tamu mt-12">
            <!-- Table will be dynamically populated -->
        </div>
    </div>

    <script>
      
    </script>
</body>
</html>