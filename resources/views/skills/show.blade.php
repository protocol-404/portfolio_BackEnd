@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Skill Details</h3>
    <div>
        <a href="{{ route('skills.edit', $skill) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-1"></i> Edit
        </a>
        <a href="{{ route('skills.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Skills
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($skill->icon)
                    <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}" class="img-fluid" style="max-height: 150px;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center p-5 rounded" style="height: 150px;">
                        <i class="fas fa-code fa-5x text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <h2 class="mb-4">{{ $skill->name }}</h2>

                <div class="mb-4">
                    <h5>Proficiency</h5>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $skill->proficiency }}%;" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100">{{ $skill->proficiency }}%</div>
                    </div>
                </div>

                <div class="row text-muted">
                    <div class="col-md-6">
                        <small>Created: {{ $skill->created_at->format('F d, Y') }}</small>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <small>Last updated: {{ $skill->updated_at->format('F d, Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
