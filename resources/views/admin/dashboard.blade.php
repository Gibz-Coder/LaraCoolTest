@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="row g-4 mb-4">
    <!-- Stats Cards -->
    <div class="col-lg-3 col-md-6">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-primary me-3">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['total_contacts'] }}</h3>
                    <p class="text-muted mb-0">Total Contacts</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-warning me-3">
                    <i class="fas fa-envelope-open"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['unread_contacts'] }}</h3>
                    <p class="text-muted mb-0">Unread Messages</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-success me-3">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['newsletter_subscribers'] }}</h3>
                    <p class="text-muted mb-0">Newsletter Subscribers</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-info me-3">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['recent_activity'] }}</h3>
                    <p class="text-muted mb-0">Recent Activity</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Contacts -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-envelope me-2"></i>
                    Recent Contacts
                </h5>
                <a href="{{ route('admin.contacts') }}" class="btn btn-sm btn-outline-primary">
                    View All
                </a>
            </div>
            <div class="card-body">
                @if(empty($recent_contacts))
                    <div class="text-center py-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h6 class="text-muted">No contacts yet</h6>
                        <p class="text-muted small">Contact messages will appear here once submitted.</p>
                        <div class="alert alert-info mt-3">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Note:</strong> Database setup is required to store and display contacts. 
                            Currently showing mock data.
                        </div>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ Str::limit($contact->subject, 30) }}</td>
                                    <td>{{ $contact->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $contact->is_read ? 'success' : 'warning' }}">
                                            {{ $contact->is_read ? 'Read' : 'Unread' }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>
                    Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.contacts') }}" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i>
                        Manage Contacts
                    </a>
                    <a href="{{ route('admin.analytics') }}" class="btn btn-outline-info">
                        <i class="fas fa-chart-bar me-2"></i>
                        View Analytics
                    </a>
                    <a href="{{ route('landing') }}" target="_blank" class="btn btn-outline-success">
                        <i class="fas fa-external-link-alt me-2"></i>
                        Visit Website
                    </a>
                </div>
                
                <hr class="my-3">
                
                <h6 class="text-muted mb-3">System Status</h6>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="small">Website Status</span>
                    <span class="badge bg-success">Online</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="small">Database</span>
                    <span class="badge bg-warning">Setup Required</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="small">Last Updated</span>
                    <span class="small text-muted">{{ now()->format('H:i') }}</span>
                </div>
            </div>
        </div>
        
        <!-- Website Preview -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-globe me-2"></i>
                    Website Preview
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="ratio ratio-16x9">
                    <iframe src="{{ route('landing') }}" 
                            class="border-0" 
                            style="border-radius: 0 0 0.375rem 0.375rem;">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.stats-card {
    transition: all 0.3s ease;
}

.stats-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
}

.card {
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-radius: 10px;
}

.card-header {
    background: white;
    border-bottom: 1px solid #e9ecef;
    border-radius: 10px 10px 0 0 !important;
}

.table th {
    border-top: none;
    font-weight: 600;
    color: #495057;
}

.badge {
    font-size: 0.75rem;
}

iframe {
    pointer-events: none;
}
</style>
@endpush