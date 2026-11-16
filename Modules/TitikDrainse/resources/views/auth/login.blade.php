@extends('layouts.app')

@section('title', 'Masuk · smartdrain')

@section('content')
    <div class="mx-auto grid max-w-5xl overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm lg:grid-cols-2">
        <section class="hidden flex-col justify-between bg-indigo-700 p-10 text-white lg:flex">
            <span class="brand text-xl font-extrabold">Smart Drain</span>
            <div>
                <p class="mb-3 text-sm font-semibold tracking-widest text-indigo-200">smart drain</p>
                <h1 class="text-4xl font-extrabold leading-tight">dimulai dari kepedulian.</h1>
                <p class="mt-4 max-w-md text-indigo-100">Lihat kondisi fasilita untuk mengetahui.</p>
            </div>
            <p class="text-sm text-indigo-200">Informasi fasilitas dan pengaduan dalam satu tempat.</p>
        </section>

        <section class="p-7 sm:p-10">
            <p class="text-sm font-bold uppercase tracking-widest text-indigo-600">Selamat datang kembali</p>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900">Masuk ke akunmu</h1>
            <p class="mt-2 text-sm text-slate-500">Gunakan email untuk melanjutkan.</p>

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                @csrf
                <div>
                    <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="remember" class="size-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                    Ingat saya
                </label>
                <button type="submit" class="w-full rounded-xl bg-indigo-600 px-4 py-3 font-bold text-white transition hover:bg-indigo-700">Masuk</button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-500">Belum punya akun? <a href="{{ route('register') }}" class="font-bold text-indigo-700 hover:underline">Daftar sebagai mahasiswa</a></p>
        </section>
    </div>
@endsection
