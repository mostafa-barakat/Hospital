<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="{{ asset('assets/css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/owl-carousel/css/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('home.header')
    {{-- {{ dd($appointments) }} --}}
    <div class="container my-5">
        <h2 class="mb-5 text-center" style="font-size: 25px">All Appointment For You</h2>
        <table class="table ">
            <thead class="table table-dark">
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Date</td>
                    <td>Doctor</td>
                    <td>Message</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            @forelse ($appointments as $appointment)
                <tbody>
                    <td>{{  $appointment->name }}</td>
                    <td>{{  $appointment->email }}</td>
                    <td>{{  $appointment->phone }}</td>
                    <td>{{  $appointment->date }}</td>
                    <td>{{  $appointment->doctor }}</td>
                    <td>{{  $appointment->message }}</td>
                    <td>{{  $appointment->status }}</td>
                    @if ($appointment->status != 'Approved')
                        <td>
                            <a href="{{ route('user.edit_appointment', $appointment->id) }}" class="btn btn-sm btn-primary mb-2">
                                <i class="fa-solid fa-pen-to-square m-auto "></i>
                            </a>
                            <a onclick="return confirm('Are you sure?!')" href="{{ route('user.forcedelete_appointment' , $appointment->id) }}" class="btn btn-sm btn-danger  mb-2">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>
                        @else
                        <td>It cannot be modified or deleted</td>
                    @endif
                </tbody>
            @empty
                <tr>
                    <td colspan="8" class="text-center">EMPTY</td>
                </tr>
            @endforelse
        </table>
    </div>

    @include('home.footer')

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>

    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        @if(session('message'))
            Toast.fire({
                icon: "{{ session('type') }}",
                title: "{{ session('message') }}"
            })
        @endif
    </script>

</body>

</html>
