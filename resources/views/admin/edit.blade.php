@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/edit.css') }}">
<div class="container">
    <section class="form-section">
        <h2>Edit Motivasi</h2>
        <form action="{{ route('dashboard.update', $motivation->id) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="content" class="form-label">Motivasi</label>
                <textarea id="content" name="content" class="form-control" rows="5" required>{{ $motivation->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="visibility" class="form-label">Visibilitas</label>
                <select id="visibility" name="visibility" class="form-select" required style="background-color: #0F4C75;; color: white; border: none; padding: 10px 5px 10px 10px; border-radius: 5px; margin-right: 10px; transition: background-color 0.3s ease; margin-bottom: 20px">
                    <option value="private" {{ $motivation->visibility == 'private' ? 'selected' : '' }}>Private</option>
                    <option value="public" {{ $motivation->visibility == 'public' ? 'selected' : '' }}>Public</option>
                </select>
            </div>
            <div class="form-buttons d-flex gap-2">
                <button type="submit" class="btn" style="background-color: #3282B8; color: white; transition: background-color 0.3s ease;">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button class="btn" style="background-color: #6c757d; color: white; transition: background-color 0.3s ease;" onclick="window.location.href='{{ route('admin.dashboard') }}'">
                    <i class="fas fa-arrow-left"></i> Kembali
                </button>
            </div>
        </form>
    </section>
</div>
@endsection