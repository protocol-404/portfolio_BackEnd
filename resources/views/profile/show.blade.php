@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Profile Details</h3>
    <div>
        <a href="{{ route('profile.edit', $profile) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-1"></i> Edit
        </a>
        <a href="{{ route('profile.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Profile
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($profile->avatar)
                    <img src="{{ asset('storage/' . $profile->avatar) }}" alt="{{ $profile->name }}" class="img-fluid rounded-circle" style="max-width: 200px;">
                @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded-circle mx-auto" style="width: 200px; height: 200px;">
                        <i class="fas fa-user fa-5x"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <h2>{{ $profile->name }}</h2>
                <h5 class="text-muted mb-3">{{ $profile->title }}</h5>

                <div class="mb-4">
                    <h5>Bio</h5>
                    <p>{{ $profile->bio }}</p>
                </div>

                <div class="mb-4">
                    <h5>Contact & Social Links</h5>
                    <div class="row">
                        @if($profile->email)
                            <div class="col-md-4 mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope me-2 text-primary"></i>
                                    <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                                </div>
                            </div>
                        @endif

                        @if($profile->github)
                            <div class="col-md-4 mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="fab fa-github me-2 text-dark"></i>
                                    <a href="{{ $profile->github }}" target="_blank">GitHub</a>
                                </div>
                            </div>
                        @endif

                        @if($profile->linkedin)
                            <div class="col-md-4 mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="fab fa-linkedin me-2 text-primary"></i>
                                    <a href="{{ $profile->linkedin }}" target="_blank">LinkedIn</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                @if($profile->resume_url)
                    <div class="mb-4">
                        <h5>Resume</h5>
                        <a href="{{ $profile->resume_url }}" target="_blank" class="btn btn-outline-primary">
                            <i class="fas fa-file-alt me-2"></i> View Resume
                        </a>
                    </div>
                @endif

                <div class="row text-muted">
                    <div class="col-md-6">
                        <small>Created: {{ $profile->created_at->format('F d, Y') }}</small>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <small>Last updated: {{ $profile->updated_at->format('F d, Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
