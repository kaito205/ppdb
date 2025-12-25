@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('containt')

<div class="row animate__animated animate__fadeIn">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3 border-0 rounded-top-4 d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="m-0 font-weight-bold text-primary">
                        <i class="bi bi-envelope-paper-fill me-2"></i>Inbox Pesan
                    </h5>
                    <small class="text-muted">Kelola semua pesan yang masuk dari formulir kontak website.</small>
                </div>
                <span id="unread-badge" class="badge bg-primary rounded-pill px-3 py-2 animate__animated {{ $messages->where('is_read', false)->count() > 0 ? 'animate__pulse animate__infinite' : '' }}">
                    <span id="unread-count">{{ $messages->where('is_read', false)->count() }}</span> Pesan Baru
                </span>
            </div>
            <div class="card-body p-0">
                @if(session('success'))
                <div class="mx-4 mt-3 alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="dataTable">
                        <thead class="bg-light text-secondary">
                            <tr>
                                <th class="ps-4 py-3" style="width: 50px;">No</th>
                                <th class="py-3">Pengirim</th>
                                <th class="py-3">Ringkasan Pesan</th>
                                <th class="py-3">Diterima Pada</th>
                                <th class="py-3 text-center" style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                            <tr id="message-row-{{ $message->id }}" class="message-row {{ $message->is_read ? '' : 'unread-bg' }}">
                                <td class="ps-4">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle me-3 {{ $message->is_read ? 'bg-light text-secondary' : 'bg-primary-light text-primary' }} fw-bold">
                                            {{ strtoupper(substr($message->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $message->name }} 
                                                @if(!$message->is_read)
                                                <span class="unread-dot animate__animated animate__flash animate__infinite"></span>
                                                @endif
                                            </div>
                                            <small class="text-muted"><a href="mailto:{{ $message->email }}" class="text-decoration-none text-muted"><i class="bi bi-envelope me-1"></i>{{ $message->email }}</a></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-truncate {{ $message->is_read ? 'text-muted' : 'text-secondary fw-semibold' }}" style="max-width: 300px;">
                                        {{ $message->message }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="text-dark small"><i class="bi bi-calendar3 me-1"></i>{{ $message->created_at->format('d M Y') }}</span>
                                        <span class="text-muted extra-small"><i class="bi bi-clock me-1"></i>{{ $message->created_at->format('H:i') }} WIB</span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group shadow-sm rounded-3 overflow-hidden">
                                        <button type="button" class="btn btn-sm btn-white border-end btn-view-message" 
                                                data-id="{{ $message->id }}"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#modalDetail{{ $message->id }}"
                                                title="Lihat Detail">
                                            <i class="bi bi-eye text-info"></i>
                                        </button>
                                        <form action="{{ route('admin.pesan.hapus', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-white" title="Hapus Pesan">
                                                <i class="bi bi-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="empty-state">
                                        <i class="bi bi-envelope-open display-4 text-muted mb-3 d-block"></i>
                                        <h6 class="text-secondary fw-bold">Belum Ada Pesan Masuk</h6>
                                        <p class="text-muted small">Semua pesan dari formulir kontak akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals Detail -->
@foreach($messages as $message)
<div class="modal fade" id="modalDetail{{ $message->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pb-0 px-4 pt-4">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg me-3 bg-primary-light text-primary fw-bold shadow-sm">
                        {{ strtoupper(substr($message->name, 0, 1)) }}
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0">{{ $message->name }}</h5>
                        <small class="text-muted"><i class="bi bi-envelope me-1"></i>{{ $message->email }}</small>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr class="mx-4 my-3 opacity-10">
            <div class="modal-body px-4 pt-0">
                <div class="d-flex justify-content-between align-items-center mb-4 bg-light p-3 rounded-3">
                    <div>
                        <span class="text-muted small d-block">Diterima Pada:</span>
                        <span class="text-dark fw-bold"><i class="bi bi-calendar-event me-2 text-primary"></i>{{ $message->created_at->format('d F Y, H:i') }} WIB</span>
                    </div>
                    <div class="text-end">
                        <span id="modal-badge-{{ $message->id }}" class="badge {{ $message->is_read ? 'bg-secondary' : 'bg-success' }} px-3 py-2 rounded-pill">
                            <i class="bi {{ $message->is_read ? 'bi-envelope-open' : 'bi-envelope-fill' }} me-1"></i>
                            {{ $message->is_read ? 'Read' : 'New Message' }}
                        </span>
                    </div>
                </div>
                <div class="message-content-box p-4 bg-white border rounded-4 shadow-sm">
                    <h6 class="text-primary fw-bold mb-3 border-bottom pb-2">Isi Pesan:</h6>
                    <p class="text-secondary lh-lg mb-0" style="white-space: pre-wrap;">{{ $message->message }}</p>
                </div>
            </div>
            <div class="modal-footer border-0 px-4 py-4 mt-2">
                <button type="button" class="btn btn-light px-4 rounded-3" data-bs-dismiss="modal">Tutup</button>
                <a href="mailto:{{ $message->email }}?subject=Re: Pesan dari {{ $message->name }}" class="btn btn-primary px-4 rounded-3 shadow-sm">
                    <i class="bi bi-reply-fill me-2"></i>Balas Pesan
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
    .rounded-4 { border-radius: 1rem !important; }
    .rounded-top-4 { border-top-left-radius: 1rem !important; border-top-right-radius: 1rem !important; }
    .rounded-bottom-4 { border-bottom-left-radius: 1rem !important; border-bottom-right-radius: 1rem !important; }
    
    .bg-primary-light { background-color: rgba(14, 46, 114, 0.1) !important; }
    .bg-success-light { background-color: rgba(40, 167, 69, 0.1) !important; }
    .text-primary { color: #0E2E72 !important; }
    
    .unread-bg { background-color: rgba(14, 46, 114, 0.03) !important; }
    
    .unread-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: #0E2E72;
        border-radius: 50%;
        margin-left: 5px;
        vertical-align: middle;
    }

    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }
    
    .avatar-lg {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    
    .message-row {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f1f1f1;
    }
    
    .message-row:hover {
        background-color: rgba(14, 46, 114, 0.05) !important;
    }
    
    .extra-small { font-size: 0.75rem; }
    
    .btn-white {
        background: #fff;
        color: #444;
        border: 1px solid #eee;
    }
    
    .btn-white:hover {
        background: #f8f9fa;
        color: #000;
    }

    .message-content-box {
        min-height: 150px;
        position: relative;
    }

    .message-content-box::before {
        content: '"';
        position: absolute;
        bottom: 10px;
        right: 20px;
        font-size: 4rem;
        color: rgba(14, 46, 114, 0.05);
        font-family: serif;
        line-height: 1;
    }
</style>

@push('scripts')
<script>
    $(document).ready(function() {
        // Otomatis buka modal jika ada parameter 'open' di URL
        const urlParams = new URLSearchParams(window.location.search);
        const openId = urlParams.get('open');
        if (openId) {
            const viewBtn = $('.btn-view-message[data-id="' + openId + '"]');
            if (viewBtn.length) {
                viewBtn.trigger('click');
                // Optional: Scroll ke baris tersebut agar terlihat
                $('html, body').animate({
                    scrollTop: $("#message-row-" + openId).offset().top - 100
                }, 500);
            }
        }

        $('.btn-view-message').on('click', function() {
            var messageId = $(this).data('id');
            var row = $('#message-row-' + messageId);
            
            // Hanya jalankan AJAX jika pesan memang belum dibaca
            if (row.hasClass('unread-bg')) {
                $.ajax({
                    url: '/admin/pesan/' + messageId + '/read',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // 1. Update Tampilan Baris (Inbox)
                            row.removeClass('unread-bg');
                            row.find('.unread-dot').fadeOut(300, function() { $(this).remove(); });
                            row.find('.avatar-circle').removeClass('bg-primary-light text-primary').addClass('bg-light text-secondary');
                            row.find('.text-secondary.fw-semibold').removeClass('text-secondary fw-semibold').addClass('text-muted');
                            
                            // 2. Update Badge di dalam Modal Detail
                            $('#modal-badge-' + messageId).removeClass('bg-success').addClass('bg-secondary');
                            $('#modal-badge-' + messageId).html('<i class="bi bi-envelope-open me-1"></i>Read');

                            // 3. Update SEMUA Counter Notifikasi (Real-Time)
                            // Ambil angka dari counter halaman inbox sebagai referensi utama
                            var unreadCountElement = $('#unread-count');
                            var currentCount = parseInt(unreadCountElement.text());
                            
                            if (currentCount > 0) {
                                var newCount = currentCount - 1;
                                
                                // Update counter di halaman Inbox
                                unreadCountElement.text(newCount);
                                if (newCount === 0) {
                                    $('#unread-badge').removeClass('animate__pulse animate__infinite').addClass('bg-secondary');
                                }

                                // Update badge di NAVBAR
                                var navBadge = $('.navbar-unread-count');
                                navBadge.text(newCount);
                                if (newCount === 0) { navBadge.fadeOut(); }

                                // Update badge di SIDEBAR
                                var sideBadge = $('.sidebar-message-count');
                                sideBadge.text(newCount);
                                if (newCount === 0) { sideBadge.fadeOut(); }
                            }
                        }
                    }
                });
            }
        });
    });
</script>
@endpush

@endsection
