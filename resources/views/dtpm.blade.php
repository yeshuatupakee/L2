@extends('layouts.app')

@section('content')
    <div class="page-header-container mb-4">
      <div class="d-flex justify-content-between align-items-center page-header">
        <div class="d-flex align-items-center">
          <div class="dashboard-logo me-3">
            <img src="{{ asset('img/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
          </div>
          <div>
            <h2 class="fw-bold mb-1">Driver & Trip Performance Monitoring</h2>
            <p class="text-muted mb-0"></p>
          </div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Logistics 2</a></li>
            <li class="breadcrumb-item active" aria-current="page">Driver & Trip Performance Monitoring</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Main Content -->
@endsection