@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">KYC/KYB Applications</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Status</th>
                <th>Submitted At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($applications as $app)
            <tr>
                <td>{{ $app->full_name }}</td>
                <td>
                    <span class="badge bg-{{ $app->status == 'verified' ? 'success' : ($app->status == 'rejected' ? 'danger' : 'secondary') }}">
                        {{ ucfirst($app->status) }}
                    </span>
                </td>
                <td>{{ $app->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('admin.kyc.show', $app->id) }}" class="btn btn-sm btn-primary">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $applications->links() }}
</div>
@endsection
