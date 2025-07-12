@extends('layouts.admin')

@section('content')
<style>
    .kyc-details-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 32px;
        background: #f8fafc;
        min-height: 100vh;
    }

    .page-header {
        background: white;
        border-radius: 16px;
        padding: 32px;
        margin-bottom: 32px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
    }

    .page-title {
        font-size: 32px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .page-subtitle {
        color: #64748b;
        font-size: 16px;
    }

    .status-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background: #fef3c7;
        color: #d97706;
    }

    .status-approved {
        background: #d1fae5;
        color: #059669;
    }

    .status-rejected {
        background: #fee2e2;
        color: #dc2626;
    }

    .content-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin-bottom: 24px;
    }

    .info-section {
        background: white;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
    }

    .section-title {
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 12px;
        border-bottom: 2px solid #e2e8f0;
    }

    .section-icon {
        width: 28px;
        height: 28px;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
    }

    .info-item {
        margin-bottom: 16px;
        padding: 16px;
        background: #f8fafc;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    .info-label {
        font-size: 12px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-value {
        font-size: 14px;
        color: #1e293b;
        font-weight: 500;
    }

    .documents-section {
        grid-column: 1 / -1;
        background: white;
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
    }

    .documents-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 24px;
        margin-top: 24px;
    }

    .document-card {
        background: #f8fafc;
        border-radius: 12px;
        padding: 24px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .document-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .document-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .document-title {
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .document-actions {
        display: flex;
        gap: 8px;
    }

    .doc-btn {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .doc-btn-view {
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #bfdbfe;
    }

    .doc-btn-view:hover {
        background: #dbeafe;
    }

    .doc-btn-download {
        background: #f0fdf4;
        color: #16a34a;
        border: 1px solid #bbf7d0;
    }

    .doc-btn-download:hover {
        background: #dcfce7;
    }

    .file-preview {
        background: white;
        border-radius: 8px;
        padding: 16px;
        border: 1px solid #e2e8f0;
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .file-preview img {
        max-width: 100%;
        max-height: 280px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .file-preview iframe {
        width: 100%;
        height: 280px;
        border: none;
        border-radius: 8px;
    }

    .file-placeholder {
        text-align: center;
        color: #64748b;
        font-size: 14px;
    }

    .file-placeholder-icon {
        font-size: 48px;
        margin-bottom: 12px;
        opacity: 0.5;
    }

    .verification-section {
        background: white;
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
    }

    .verification-form {
        margin-top: 24px;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
        resize: vertical;
    }

    .form-control:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .action-buttons {
        display: flex;
        gap: 16px;
        justify-content: flex-end;
    }

    .action-btn {
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        min-width: 120px;
        justify-content: center;
    }

    .btn-verify {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        box-shadow: 0 4px 14px rgba(16, 185, 129, 0.3);
    }

    .btn-verify:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
    }

    .btn-reject {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
        box-shadow: 0 4px 14px rgba(220, 38, 38, 0.3);
    }

    .btn-reject:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
    }

    .fullscreen-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }

    .fullscreen-content {
        max-width: 90%;
        max-height: 90%;
        position: relative;
    }

    .fullscreen-close {
        position: absolute;
        top: -40px;
        right: 0;
        background: white;
        border: none;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 16px;
    }

    .fullscreen-content img,
    .fullscreen-content iframe {
        max-width: 100%;
        max-height: 100%;
        border-radius: 8px;
    }

    @media (max-width: 1024px) {
        .content-grid {
            grid-template-columns: 1fr;
        }

        .documents-grid {
            grid-template-columns: 1fr;
        }

        .kyc-details-container {
            padding: 16px;
        }

        .page-header,
        .info-section,
        .documents-section,
        .verification-section {
            padding: 24px 20px;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="kyc-details-container">
    <!-- Page Header -->
    <div class="page-header">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h1 class="page-title">
                    📋 KYC/KYB Application Details
                </h1>
                <p class="page-subtitle">Review and verify user documentation</p>
            </div>
            <span class="status-badge status-{{ strtolower($application->status ?? 'pending') }}">
                {{ ucfirst($application->status ?? 'Pending') }}
            </span>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
        <!-- Personal Information -->
        <div class="info-section">
            <h2 class="section-title">
                <div class="section-icon">👤</div>
                Personal Information
            </h2>

            <div class="info-item">
                <div class="info-label">Full Name</div>
                <div class="info-value">{{ $application->full_name }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Date of Birth</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($application->date_of_birth)->format('F j, Y') }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Nationality</div>
                <div class="info-value">{{ $application->nationality }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">ID Type</div>
                <div class="info-value">{{ ucfirst(str_replace('_', ' ', $application->id_type ?? 'Not specified')) }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">ID Number</div>
                <div class="info-value">{{ $application->id_number ?? 'Not provided' }}</div>
            </div>
        </div>

        <!-- Business Information -->
        <div class="info-section">
            <h2 class="section-title">
                <div class="section-icon">🏢</div>
                Business Information
            </h2>

            <div class="info-item">
                <div class="info-label">Company Name</div>
                <div class="info-value">{{ $application->company_name ?? 'Not provided' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Registration Number</div>
                <div class="info-value">{{ $application->company_registration ?? 'Not provided' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Country of Incorporation</div>
                <div class="info-value">{{ $application->country_incorporation ?? 'Not provided' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Business Type</div>
                <div class="info-value">{{ ucfirst(str_replace('_', ' ', $application->business_type ?? 'Not specified')) }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Representative Name</div>
                <div class="info-value">{{ $application->representative_name ?? 'Not provided' }}</div>
            </div>
        </div>
    </div>

    <!-- Documents Section -->
    <div class="documents-section">
        <h2 class="section-title">
            <div class="section-icon">📄</div>
            Submitted Documents
        </h2>

        <div class="documents-grid">
            <!-- ID Document -->
            @if($application->id_document)
            <div class="document-card">
                <div class="document-header">
                    <div class="document-title">
                        🆔 ID Document
                    </div>
                    <div class="document-actions">
                        <button class="doc-btn doc-btn-view" onclick="viewFullscreen('{{ route('admin.files.view.inline', basename($application->id_document)) }}', 'image')">
                            🔍 View
                        </button>
                        <a href="{{ route('admin.files.view', basename($application->id_document)) }}" target="_blank" class="doc-btn doc-btn-download">
                            ⬇️ Download
                        </a>
                    </div>
                </div>
                <div class="file-preview">
                    @if(in_array(strtolower(pathinfo($application->id_document, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ route('admin.files.view.inline', basename($application->id_document)) }}" alt="ID Document" onclick="viewFullscreen('{{ route('admin.files.view.inline', basename($application->id_document)) }}', 'image')">
                    @elseif(strtolower(pathinfo($application->id_document, PATHINFO_EXTENSION)) === 'pdf')
                        <div class="pdf-preview-container">
                            <iframe src="{{ route('admin.files.view.inline', basename($application->id_document)) }}#toolbar=0&navpanes=0&scrollbar=0"
                                    style="width: 100%; height: 280px; border: none; border-radius: 8px;"
                                    onload="this.style.display='block'; this.nextElementSibling.style.display='none';"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                            </iframe>
                            <div class="pdf-fallback" style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 280px; background: #f8fafc; border: 2px dashed #e2e8f0; border-radius: 8px;">
                                <div style="font-size: 48px; margin-bottom: 16px; opacity: 0.6;">📄</div>
                                <div style="font-weight: 600; color: #374151; margin-bottom: 8px;">PDF Document</div>
                                <div style="font-size: 14px; color: #6b7280; margin-bottom: 16px;">{{ basename($application->id_document) }}</div>
                                <a href="{{ route('admin.files.view.inline', basename($application->id_document)) }}"
                                   target="_blank"
                                   style="padding: 8px 16px; background: #3b82f6; color: white; text-decoration: none; border-radius: 6px; font-size: 14px;">
                                    📄 Open PDF
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="file-placeholder">
                            <div class="file-placeholder-icon">📄</div>
                            <div>{{ pathinfo($application->id_document, PATHINFO_BASENAME) }}</div>
                        </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Proof of Address -->
            @if($application->proof_of_address)
            <div class="document-card">
                <div class="document-header">
                    <div class="document-title">
                        🏠 Proof of Address
                    </div>
                    <div class="document-actions">
                        <button class="doc-btn doc-btn-view" onclick="viewFullscreen('{{ route('admin.files.view.inline', basename($application->proof_of_address)) }}', 'image')">
                            🔍 View
                        </button>
                        <a href="{{ route('admin.files.view', basename($application->proof_of_address)) }}" target="_blank" class="doc-btn doc-btn-download">
                            ⬇️ Download
                        </a>
                    </div>
                </div>
                <div class="file-preview">
                    @if(in_array(strtolower(pathinfo($application->proof_of_address, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ route('admin.files.view.inline', basename($application->proof_of_address)) }}" alt="Proof of Address" onclick="viewFullscreen('{{ route('admin.files.view.inline', basename($application->proof_of_address)) }}', 'image')">
                    @elseif(strtolower(pathinfo($application->proof_of_address, PATHINFO_EXTENSION)) === 'pdf')
                        <div class="pdf-preview-container">
                            <iframe src="{{ route('admin.files.view.inline', basename($application->proof_of_address)) }}#toolbar=0&navpanes=0&scrollbar=0"
                                    style="width: 100%; height: 280px; border: none; border-radius: 8px;"
                                    onload="this.style.display='block'; this.nextElementSibling.style.display='none';"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                            </iframe>
                            <div class="pdf-fallback" style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 280px; background: #f8fafc; border: 2px dashed #e2e8f0; border-radius: 8px;">
                                <div style="font-size: 48px; margin-bottom: 16px; opacity: 0.6;">📄</div>
                                <div style="font-weight: 600; color: #374151; margin-bottom: 8px;">PDF Document</div>
                                <div style="font-size: 14px; color: #6b7280; margin-bottom: 16px;">{{ basename($application->proof_of_address) }}</div>
                                <a href="{{ route('admin.files.view.inline', basename($application->proof_of_address)) }}"
                                   target="_blank"
                                   style="padding: 8px 16px; background: #3b82f6; color: white; text-decoration: none; border-radius: 6px; font-size: 14px;">
                                    📄 Open PDF
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="file-placeholder">
                            <div class="file-placeholder-icon">📄</div>
                            <div>{{ pathinfo($application->proof_of_address, PATHINFO_BASENAME) }}</div>
                        </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Company Documents -->
            @if($application->company_documents)
                @foreach(json_decode($application->company_documents ?? '[]') as $index => $doc)
                <div class="document-card">
                    <div class="document-header">
                        <div class="document-title">
                            🏢 Company Document {{ $index + 1 }}
                        </div>
                        <div class="document-actions">
                            <button class="doc-btn doc-btn-view" onclick="viewFullscreen('{{ route('admin.files.view.inline', basename($doc)) }}', 'image')">
                                🔍 View
                            </button>
                            <a href="{{ route('admin.files.view', basename($doc)) }}" target="_blank" class="doc-btn doc-btn-download">
                                ⬇️ Download
                            </a>
                        </div>
                    </div>
                    <div class="file-preview">
                        @if(in_array(strtolower(pathinfo($doc, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ route('admin.files.view.inline', basename($doc)) }}" alt="Company Document" onclick="viewFullscreen('{{ route('admin.files.view.inline', basename($doc)) }}', 'image')">
                        @elseif(strtolower(pathinfo($doc, PATHINFO_EXTENSION)) === 'pdf')
                            <iframe src="{{ route('admin.files.view.inline', basename($doc)) }}"></iframe>
                        @else
                            <div class="file-placeholder">
                                <div class="file-placeholder-icon">📄</div>
                                <div>{{ pathinfo($doc, PATHINFO_BASENAME) }}</div>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            @endif

           <!-- Representative ID -->
            @if($application->representative_id)
            <div class="document-card">
                <div class="document-header">
                    <div class="document-title">
                        👨‍💼 Representative ID
                    </div>
                    <div class="document-actions">
                        <button class="doc-btn doc-btn-view" onclick="viewFullscreen('{{ route('admin.files.view.inline', basename($application->representative_id)) }}', 'image')">
                            🔍 View
                        </button>
                        <a href="{{ route('admin.files.view', basename($application->representative_id)) }}" target="_blank" class="doc-btn doc-btn-download">
                            ⬇️ Download
                        </a>
                    </div>
                </div>
                <div class="file-preview">
                    @if(in_array(strtolower(pathinfo($application->representative_id, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ route('admin.files.view.inline', basename($application->representative_id)) }}"
                             alt="Representative ID"
                             onclick="viewFullscreen('{{ route('admin.files.view.inline', basename($application->representative_id)) }}', 'image')"
                             style="max-width: 100%; max-height: 280px; border-radius: 8px; cursor: pointer;">
                    @elseif(strtolower(pathinfo($application->representative_id, PATHINFO_EXTENSION)) === 'pdf')
                        <iframe src="{{ route('admin.files.view.inline', basename($application->representative_id)) }}#toolbar=0&navpanes=0&scrollbar=0"
                                style="width: 100%; height: 280px; border: none; border-radius: 8px;"
                                onload="this.style.display='block'; this.nextElementSibling.style.display='none';"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        </iframe>
                        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 280px; background: linear-gradient(135deg, #fef2f2, #fee2e2); border: 2px solid #fca5a5; border-radius: 12px; cursor: pointer;" onclick="window.open('{{ route('admin.files.view.inline', basename($application->representative_id)) }}', '_blank')">
                            <div style="font-size: 64px; margin-bottom: 16px; color: #dc2626;">👨‍💼</div>
                            <div style="font-weight: 700; color: #b91c1c; margin-bottom: 8px; font-size: 18px;">Representative ID</div>
                            <div style="font-size: 14px; color: #6b7280; margin-bottom: 20px; text-align: center; max-width: 200px;">{{ basename($application->representative_id) }}</div>
                            <div style="padding: 10px 20px; background: #dc2626; color: white; border-radius: 8px; font-weight: 600; font-size: 14px;">
                                📄 Click to Open PDF
                            </div>
                        </div>
                    @else
                        <div class="file-placeholder">
                            <div class="file-placeholder-icon">📄</div>
                            <div>{{ pathinfo($application->representative_id, PATHINFO_BASENAME) }}</div>
                        </div>
                    @endif
                </div>
            </div>
            @else
            <div class="document-card">
                <div class="document-header">
                    <div class="document-title">
                        👨‍💼 Representative ID
                    </div>
                </div>
                <div class="file-preview">
                    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 280px; background: #f8fafc; border: 2px dashed #e2e8f0; border-radius: 12px;">
                        <div style="font-size: 64px; margin-bottom: 16px; opacity: 0.3;">📄</div>
                        <div style="font-weight: 600; color: #6b7280;">No Representative ID</div>
                        <div style="font-size: 14px; color: #9ca3af; margin-top: 8px;">Document not provided</div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Verification Section -->
    <div class="verification-section">
        <h2 class="section-title">
            <div class="section-icon">✅</div>
            Verification Decision
        </h2>

        <form method="POST" action="{{ route('admin.kyc.verify', $application->id) }}" class="verification-form">
            @csrf
            <div class="form-group">
                <label class="form-label">Remarks (optional)</label>
                <textarea class="form-control" name="remarks" rows="4" placeholder="Add any comments or reasons for your decision...">{{ old('remarks', $application->remarks) }}</textarea>
            </div>

            <div class="action-buttons">
                <button name="action" value="approved" class="action-btn btn-verify" onclick="return confirm('Are you sure you want to verify this application?')">
                    ✅ Verify Application
                </button>
                <button name="action" value="rejected" class="action-btn btn-reject" onclick="return confirm('Are you sure you want to reject this application?')">
                    ❌ Reject Application
                </button>
            </div>
        </form>
    </div>
</div>
<!-- DEBUG: Add this temporarily -->
<div style="background: yellow; padding: 10px; margin: 10px;">
    <strong>Debug Representative ID:</strong><br>
    representative_id: "{{ $application->representative_id ?? 'NULL' }}"<br>
    representative_name: "{{ $application->representative_name ?? 'NULL' }}"<br>
    File exists check: {{ $application->representative_id ? 'HAS VALUE' : 'NO VALUE' }}
</div>

<!-- Fullscreen Overlay -->
<div class="fullscreen-overlay" id="fullscreenOverlay" onclick="closeFullscreen()">
    <div class="fullscreen-content" onclick="event.stopPropagation()">
        <button class="fullscreen-close" onclick="closeFullscreen()">✕</button>
        <div id="fullscreenContent"></div>
    </div>
</div>

<script>
function viewFullscreen(url, type) {
    const overlay = document.getElementById('fullscreenOverlay');
    const content = document.getElementById('fullscreenContent');

    if (type === 'image' || url.match(/\.(jpg|jpeg|png|gif)$/i)) {
        content.innerHTML = `<img src="${url}" alt="Document">`;
    } else if (url.match(/\.pdf$/i)) {
        content.innerHTML = `<iframe src="${url}" style="width: 90vw; height: 90vh;"></iframe>`;
    }

    overlay.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeFullscreen() {
    const overlay = document.getElementById('fullscreenOverlay');
    overlay.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeFullscreen();
    }
});
</script>
@endsection
