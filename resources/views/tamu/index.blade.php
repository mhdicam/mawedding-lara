<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Guest List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</head>
<body class="bg-emerald-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-emerald-700 font-ubuntu mb-2">Wedding Guest List</h1>
            <p class="text-emerald-600">Manage your wedding invitations</p>
        </header>

        <!-- Guest List Table -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-emerald-200">
                    <thead>
                        <tr class="bg-emerald-50">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-emerald-700">Kode Undangan</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-emerald-700">Nama Tamu</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-emerald-700">Link</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-emerald-700">WhatsApp</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-emerald-700">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-emerald-100">
                        @foreach ($undangan as $u )
                        <tr class='hover:bg-emerald-50 transition-colors'>
                            <td class='px-6 py-4 text-sm text-gray-700'>{{$u->kode}}</td>
                            <td class='px-6 py-4 text-sm text-gray-700'>{{$u->nama_tamu}}</td>
                            <td class='px-6 py-4'>
                                <a href='{{route('tamu.show',['kode' =>$u->kode])}}'
                                   class='inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-md transition-colors'>
                                    <i class='fas fa-link mr-2'></i>
                                    View Invitation
                                </a>
                            </td>
                            <td class='px-6 py-4'>
            <a href='https://api.whatsapp.com/send?phone=&text=Assalamu%27alaikum%20Warahmatullahi%20Wabarakatuh%0ABismillahirahmanirrahim.%0A%0ATanpa%20mengurangi%20rasa%20hormat%2C%20perkenankan%20kami%20mengundang%20Bapak%2FIbu%2FSaudara%2Fi%2C%20untuk%20menghadiri%20acara%20pernikahan%20kami.%0A%0ABerikut%20link%20undangan%20kami%3A%0A{{ urlencode(route('tamu.show', ['kode' => $u->kode])) }}%0A%0AMerupakan%20suatu%20kehormatan%20bagi%20kami%20apabila%20Bapak%2FIbu%2FSaudara%2Fi%20berkenan%20hadir%20dan%20memberikan%20doa%20restu.%0A%0AWassalamu%27alaikum%20Warahmatullahi%20Wabarakatuh'
               class='inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md transition-colors'>
                <i class='fab fa-whatsapp mr-2'></i>
                Send Invitation
            </a>
        </td>
                            <td class='px-6 py-4'>
                                <!-- Delete with SweetAlert Confirmation -->
                                <form action="{{route('tamu.destroy',['id'=>$u->id])}}" method="post" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="rounded-md px-2 py-1 text-white bg-red-500 items-center delete-btn">
                                        <i class='fas fa-trash'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Back to home -->
        <div class="text-center">
            <a href="{{route('tamu.create')}}">
                <button class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-md transition-colors">
                    Buat Undangan
                </button>
            </a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.all.min.js"></script>

    <script>
        // Success message from session
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: `{{ session('success') }}`,
                confirmButtonColor: '#3085d6',
                timer: 3000
            });
        @endif

        // Delete confirmation
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>
