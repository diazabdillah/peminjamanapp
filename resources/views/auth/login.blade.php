@extends('layouts.app')

@section('title', 'Login ke Akun Anda')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary-rose text-white text-center fw-bold fs-5">Login</div>

                <div class="card-body p-4">
                    @if($errors->any())
                        <div class="alert alert-danger small">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email Address --}}
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold">Alamat Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            {{-- Error message ditampilkan di atas form --}}
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label small fw-bold">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>

                        {{-- Remember Me & Forgot Password (Opsional) --}}
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label small" for="remember">
                                        Ingat Saya
                                    </label>
                                </div>
                            </div>
                            <div class="col text-end">
                                {{-- Jika Anda punya fitur lupa password, tambahkan di sini --}}
                                <a class="btn btn-link small text-primary-rose" href="#">Lupa Password?</a>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary-rose btn-lg">
                                <i class="fas fa-sign-in-alt me-1"></i> Masuk
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3 small">
                        Belum punya akun? <a href="{{ route('register') }}" class="text-primary-rose fw-bold">Daftar sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection