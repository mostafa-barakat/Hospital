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
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('home.header')

    <div class="page-section">
        <div class="container">
            <h1 class="text-center" style="font-size: 25px">Edit Appointment</h1>

            <form class="main-form" action="{{ route('user.update_appointment' , $appointments->id) }}" method="POST">

                @csrf
                @method('put')
                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name' , $appointments->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror  " value="{{ old('email'  , $appointments->email) }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Time</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror  " value="{{ old('date'  , $appointments->date) }}">
                    @error('date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <select name="doctor"  class="custom-select">
                        <option  value="{{ old('doctor' , $appointments->doctor) }}">Select Doctor</option>
                        @foreach ($doctors as $doctor )
                            <option class="form-control @error('doctor') is-invalid @enderror  "  value="{{ $doctor->name }}">{{ $doctor->name }} : {{ $doctor->specialty }}</option>
                        @endforeach
                    </select>
                    @error('doctor')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror  " value="{{ old('phone'  , $appointments->phone) }}">
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4">{{ old('name'  , $appointments->message) }}</textarea>
                    @error('message')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success w-100 p-3 bg-success" value="Update">
                </div>
            </form>
        </div>
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

