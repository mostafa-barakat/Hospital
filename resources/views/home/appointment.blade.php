<div class="page-section">
    <div class="container">
        <h1 class="text-center" style="font-size: 25px">Make an Appointment</h1>

        <form class="main-form" action="{{ route('user.appointment_data') }}" method="POST">

            @csrf
            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror  " value="{{ old('email') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Time</label>
                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror  " value="{{ old('date') }}">
                @error('date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <select name="doctor"  class="custom-select">
                    <option  value="">Select Doctor</option>
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
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror  " value="{{ old('phone') }}">
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Message</label>
                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4">{{ old('name') }}</textarea>
                @error('message')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success w-100 p-3 bg-success" value="Submit Request">
            </div>
        </form>
    </div>
</div>
