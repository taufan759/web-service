@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/setting.css') }}">
<div class="container">
        <h2>Detail Akun</h2>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-buttons">
                <button type="submit" class="btn save-btn">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn back-btn">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
@endsection