@extends('layouts.app')

@section('content')
<section class="form-section">
    <h2 style="text-align: left;">Tulis Motivasi</h2>
    <form action="{{ route('dashboard.store') }}" method="POST">
        @csrf
        <textarea name="content" placeholder="Tulis motivasi Anda di sini" required></textarea>
        <div class="form-buttons">
            <select name="visibility" required>
                <option value="private">Private</option>
                <option value="public">Public</option>
            </select>
            <button type="submit">Submit</button>
        </div>
    </form>
    
</section>

<section class="motivations-section">
    <h2 style="text-align: left; padding-left: 20px;">Motivasi</h2>

    <!-- Tab Navigation -->
    <div class="tab-navigation">
        <button class="tab-button active" onclick="showTab('myMotivations')">Motivasi Saya</button>
        <button class="tab-button" onclick="showTab('otherMotivations')">Motivasi Lainnya</button>
    </div>

    <!-- Motivasi Saya -->
    <div class="tab-content" id="myMotivations">
        @foreach($myMotivations as $motivation)
        <div class="motivation-card">
            <p>"{{ $motivation->content }}"</p>
            <span class="author">Ditulis oleh: <strong>{{ $motivation->user->name }}</strong></span>
            <div class="motivation-buttons">
                <!-- Tombol Edit -->
                <button type="button" class="btn btn-edit" onclick="window.location.href='{{ route('dashboard.edit', $motivation->id) }}'">
                    <i class="fas fa-edit"></i> Edit
                </button>
            
                <!-- Tombol Hapus -->
                <form action="{{ route('dashboard.destroy', $motivation->id) }}" method="POST" style="margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Motivasi Lainnya -->
    <div class="tab-content" id="otherMotivations" style="display: none;">
        @foreach($otherMotivations as $motivation)
        <div class="motivation-card">
            <p>"{{ $motivation->content }}"</p>
            <span class="author">Ditulis oleh: <strong>{{ $motivation->user->name }}</strong></span>
        </div>
        @endforeach
    </div>
</section>

<script>
    function showTab(tabId) {
        const tabs = document.querySelectorAll('.tab-content');
        tabs.forEach(tab => tab.style.display = 'none');
        document.getElementById(tabId).style.display = 'block';

        const buttons = document.querySelectorAll('.tab-button');
        buttons.forEach(button => button.classList.remove('active'));
        document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add('active');
    }
</script>
<script>
    document.querySelectorAll('.motivation-buttons form').forEach(form => {
        form.addEventListener('submit', function (event) {
            if (!confirm('Apakah Anda yakin ingin menghapus motivasi ini?')) {
                event.preventDefault();
            }
        });
    });
</script>
@endsection