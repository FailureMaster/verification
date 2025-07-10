@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">KYC/KYB Details</h2>

    <div class="mb-3"><strong>Full Name:</strong> {{ $application->full_name }}</div>
    <div class="mb-3"><strong>Date of Birth:</strong> {{ $application->date_of_birth }}</div>
    <div class="mb-3"><strong>Nationality:</strong> {{ $application->nationality }}</div>

    <div class="mb-3"><strong>ID Document:</strong><br>
        <a href="{{ route('admin.files.view', basename($application->id_document)) }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="fas fa-file-alt"></i> View
        </a>
    </div>

    <div class="mb-3"><strong>Proof of Address:</strong><br>
        <a href="{{ route('admin.files.view', basename($application->proof_of_address)) }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="fas fa-file-alt"></i> View
        </a>
    </div>

    <div class="mb-3"><strong>Company Documents:</strong><br>
        @foreach(json_decode($application->company_documents ?? '[]') as $doc)
            <a href="{{ route('admin.files.view', basename($doc)) }}" target="_blank" class="btn btn-outline-secondary btn-sm mb-1">
                <i class="fas fa-file"></i> Document
            </a><br>
        @endforeach
    </div>

    <div class="mb-3"><strong>Representative ID:</strong><br>
        <a href="{{ route('admin.files.view', basename($application->representative_id)) }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="fas fa-file-alt"></i> View
        </a>
    </div>

    <!-- Verification form -->
    <form method="POST" action="{{ route('admin.kyc.verify', $application->id) }}" class="mt-4">
        @csrf
        <div class="mb-3">
            <label class="form-label">Remarks (optional)</label>
            <textarea class="form-control" name="remarks" rows="3">{{ old('remarks', $application->remarks) }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button name="action" value="verify" class="btn btn-success">
                <i class="fas fa-check"></i> Verify
            </button>
            <button name="action" value="reject" class="btn btn-danger">
                <i class="fas fa-times"></i> Reject
            </button>
        </div>
    </form>
</div>
@endsection
