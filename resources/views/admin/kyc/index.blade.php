@extends('layouts.admin')

@section('content')

<header class="main-header">
    <div>
        <h1 class="page-title">KYC/KYB Applications</h1>
        <p class="page-subtitle">Review and manage user verification requests</p>
    </div>
</header>

<div class="content-area">
    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-title">Total Applications</div>
                <div class="stat-icon total">📊</div>
            </div>
            <div class="stat-value">{{ $total_applications }}</div>
            {{-- <div class="stat-change">+3 this week</div> --}}
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-title">Pending Review</div>
                <div class="stat-icon pending">⏳</div>
            </div>
            <div class="stat-value">{{ $pending_count }}</div>
            <div class="stat-change">Awaiting action</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-title">Approved</div>
                <div class="stat-icon approved">✅</div>
            </div>
            <div class="stat-value">{{ $approved_count }}</div>
            <div class="stat-change">+5 this week</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-title">Rejected</div>
                <div class="stat-icon rejected">❌</div>
            </div>
            <div class="stat-value">{{ $rejected_count }}</div>
            <div class="stat-change">Document issues</div>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="applications-section">
        <div class="section-header">
            <h2 class="section-title">Recent Applications</h2>
            <div class="filter-tabs">
                <button class="filter-tab active" data-filter="all">All</button>
                <button class="filter-tab" data-filter="pending">Pending</button>
                <button class="filter-tab" data-filter="approved">Approved</button>
                <button class="filter-tab" data-filter="rejected">Rejected</button>
            </div>
        </div>

        <div class="table-container">
            <table class="applications-table">
                <thead class="table-header">
                    <tr>
                        <th>User</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $app)
                        <tr class="table-row">
                            <td class="table-cell">
                                <div class="user-info">
                                    <div class="user-avatar">T</div>
                                    <div class="user-details">
                                        <div class="user-name">{{ $app->full_name }}</div>
                                        <div class="user-email">{{ $app->user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="table-cell">
                                <span class="status-badge status-{{$app->status}}">
                                    {{ ucwords($app->status) }}
                                </span>
                            </td>
                            <td class="table-cell">
                                <div class="date-info">
                                    <div class="date-primary">{{ $app->created_at->format('F d, Y') }}</div>
                                    <div class="date-secondary">{{ \Carbon\Carbon::parse($app->created_at)->diffForHumans() }}</div>
                                </div>
                            </td>
                            <td class="table-cell">
                                <div class="action-buttons">
                                    <a href="{{ route('admin.kyc.show', $app->id) }}" class="action-btn btn-view">
                                        📄 View
                                    </a>
                                    <form method="POST" action="{{ route('admin.kyc.verify', $app->id) }}" class="verification-form">
                                        @csrf
                                        <button class="action-btn btn-approve" name="action" value="approved">
                                            ✅ Approve
                                        </button>
                                        <button class="action-btn btn-reject" name="action" value="reject">
                                            ❌ Reject
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection