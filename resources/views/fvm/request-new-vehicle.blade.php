@extends('layouts.app')

@section('content')
     <div class="page-header-container mb-4">
      <div class="d-flex justify-content-between align-items-center page-header">
        <div class="d-flex align-items-center">
          <div class="dashboard-logo me-3">
            <img src="{{ asset('img/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
          </div>
          <div>
            <h2 class="fw-bold mb-1">Vehicle Request</h2>
            <p class="text-muted mb-0"></p>
          </div>
        </div> 
      </div>
    </div>

    {{-- Vehicle Request Form --}}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Request a Vehicle</h5>
        </div>
        <div class="card-body">
            <form id="requestVehicleForm">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="rvRequester" class="form-label">Requester</label>
                        <input type="text" class="form-control" id="rvRequester" placeholder="Your name">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-md-6">
                        <label for="rvVehicleType" class="form-label">Vehicle Type</label>
                        <select class="form-select" id="rvVehicleType">
                            <option value="">Select type</option>
                            <option value="sedan">Sedan</option>
                            <option value="suv">SUV</option>
                            <option value="van">Van</option>
                            <option value="truck">Truck</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="rvPurpose" class="form-label">Purpose</label>
                        <input type="text" class="form-control" id="rvPurpose" placeholder="Trip purpose">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-md-6">
                        <label for="rvFromDate" class="form-label">From Date</label>
                        <input type="date" class="form-control" id="rvFromDate">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="rvToDate" class="form-label">To Date</label>
                        <input type="date" class="form-control" id="rvToDate">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-12 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-1"></i>Submit Request
                        </button>
                        <button type="button" class="btn btn-outline-secondary" onclick="window.resetVehicleRequestForm && window.resetVehicleRequestForm()">
                            <i class="fas fa-rotate-left me-1"></i>Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Requests Filter --}}
    <div class="card mt-4 mb-3">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" id="rvSearch" placeholder="Search by requester, purpose...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="rvTypeFilter">
                        <option value="">All Types</option>
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                        <option value="van">Van</option>
                        <option value="truck">Truck</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="rvStatusFilter">
                        <option value="">All Status</option>
                        <option value="current">Current</option>
                        <option value="pending">Pending</option>
                        <option value="accepted">Accepted</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-outline-secondary w-100" type="button" onclick="window.clearRequestFilters && window.clearRequestFilters()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Requests Table --}}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Vehicle Requests</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="vehicleRequestsTable">
                    <thead class="table-light">
                        <tr>
                            <th>Requester</th>
                            <th>Type</th>
                            <th>Purpose</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jane Doe</td>
                            <td>SUV</td>
                            <td>Field visit</td>
                            <td>2025-08-15</td>
                            <td>2025-08-16</td>
                            <td><span class="badge bg-info text-dark">Current</span></td>
                        </tr>
                        <tr>
                            <td>John Smith</td>
                            <td>Van</td>
                            <td>Team offsite</td>
                            <td>2025-08-20</td>
                            <td>2025-08-22</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Ana Cruz</td>
                            <td>Sedan</td>
                            <td>Client meeting</td>
                            <td>2025-08-10</td>
                            <td>2025-08-11</td>
                            <td><span class="badge bg-success">Accepted</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/fvm-request-vehicle.js') }}"></script>
<script src="{{ asset('js/fvm-table-pagination.js') }}"></script>
@endsection