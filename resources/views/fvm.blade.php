@extends('layouts.app')

@section('content')
    <div class="page-header-container mb-4">
      <div class="d-flex justify-content-between align-items-center page-header">
        <div class="d-flex align-items-center">
          <div class="dashboard-logo me-3">
            <img src="{{ asset('img/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
          </div>
          <div>
            <h2 class="fw-bold mb-1">Fleet & Vehicle Management</h2>
            <p class="text-muted mb-0">Overview of inventory, assignments, maintenance and requests</p>
          </div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Logistics 2</a></li>
            <li class="breadcrumb-item active" aria-current="page">Fleet & Vehicle Management</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
      <div class="col-md-3">
        <div class="card stat-card shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                <i class="bi bi-truck"></i>
              </div>
              <div>
                <h3 class="fw-bold mb-0">28</h3>
                <p class="text-muted mb-0 small">Total Vehicles</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card stat-card shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                <i class="bi bi-people"></i>
              </div>
              <div>
                <h3 class="fw-bold mb-0">12</h3>
                <p class="text-muted mb-0 small">Active Assignments</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card stat-card shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                <i class="bi bi-wrench"></i>
              </div>
              <div>
                <h3 class="fw-bold mb-0">6</h3>
                <p class="text-muted mb-0 small">Maintenance Due</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card stat-card shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="stat-icon bg-info bg-opacity-10 text-info me-3">
                <i class="bi bi-file-earmark-plus"></i>
              </div>
              <div>
                <h3 class="fw-bold mb-0">4</h3>
                <p class="text-muted mb-0 small">Pending Requests</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Vehicles table + Assignments -->
    <div class="row g-4 mb-4">
      <div class="col-lg-8">
        <div class="card shadow-sm border-0">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Vehicle Inventory</h5>
            <div>
              <button class="btn btn-outline-primary btn-sm me-2"><i class="bi bi-plus-circle me-1"></i>New Vehicle</button>
              <button class="btn btn-outline-secondary btn-sm">Export</button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Plate</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Mileage</th>
                    <th>Status</th>
                    <th>Last Maintenance</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>ABC-1234</td>
                    <td>Toyota HiAce</td>
                    <td>Van</td>
                    <td>124,500 km</td>
                    <td><span class="badge bg-success">Available</span></td>
                    <td>2025-06-02</td>
                    <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                  </tr>
                  <tr>
                    <td>DEF-5678</td>
                    <td>Mitsubishi L300</td>
                    <td>Van</td>
                    <td>98,200 km</td>
                    <td><span class="badge bg-warning text-dark">In Service</span></td>
                    <td>2025-05-10</td>
                    <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                  </tr>
                  <tr>
                    <td>GHI-9012</td>
                    <td>Isuzu D-Max</td>
                    <td>Pickup</td>
                    <td>45,800 km</td>
                    <td><span class="badge bg-danger">Under Repair</span></td>
                    <td>2025-04-01</td>
                    <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                  </tr>
                  <tr>
                    <td>JKL-3456</td>
                    <td>Ford Transit</td>
                    <td>Bus</td>
                    <td>210,140 km</td>
                    <td><span class="badge bg-success">Available</span></td>
                    <td>2025-03-15</td>
                    <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Maintenance schedule -->
        <div class="card shadow-sm border-0 mt-4">
          <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Maintenance Schedule</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm">
                <thead class="table-light">
                  <tr>
                    <th>Vehicle</th>
                    <th>Type</th>
                    <th>Scheduled Date</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>ABC-1234 (HiAce)</td>
                    <td>Oil Change</td>
                    <td>2025-08-01</td>
                    <td>Fleet Shop A</td>
                    <td><span class="badge bg-secondary">Planned</span></td>
                  </tr>
                  <tr>
                    <td>GHI-9012 (D-Max)</td>
                    <td>Transmission Repair</td>
                    <td>2025-07-22</td>
                    <td>Fleet Shop B</td>
                    <td><span class="badge bg-danger">In Progress</span></td>
                  </tr>
                  <tr>
                    <td>DEF-5678 (L300)</td>
                    <td>Tire Replacement</td>
                    <td>2025-07-30</td>
                    <td>Fleet Shop A</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mt-3">
              <button class="btn btn-outline-primary btn-sm"><i class="bi bi-plus me-1"></i>Schedule Maintenance</button>
              <button class="btn btn-outline-secondary btn-sm">View History</button>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-4">
        <!-- Assignment tracking -->
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Active Assignments</h5>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Trip #TR-20250701</div>
                  <small class="text-muted">ABC-1234 — Driver: Rafael Cruz</small>
                </div>
                <span class="badge bg-success">On Trip</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Trip #TR-20250628</div>
                  <small class="text-muted">DEF-5678 — Driver: Maria Lopez</small>
                </div>
                <span class="badge bg-warning text-dark">Loading</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="fw-semibold">Job #J-20250625</div>
                  <small class="text-muted">JKL-3456 — Driver: Ben Santos</small>
                </div>
                <span class="badge bg-secondary">Scheduled</span>
              </li>
            </ul>
            <div class="mt-3 d-grid">
              <a href="" class="btn btn-primary">View All Assignments</a>
            </div>
          </div>
        </div>

        <!-- Quick actions & Popular filters -->
        <div class="card shadow-sm border-0">
          <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Quick Actions</h5>
          </div>
          <div class="card-body">
            <div class="d-grid gap-2">
              <button class="btn btn-primary"><i class="bi bi-person-plus me-2"></i>Assign Driver</button>
              <button class="btn btn-outline-primary"><i class="bi bi-wrench me-2"></i>Log Maintenance</button>
              <button class="btn btn-outline-secondary"><i class="bi bi-truck me-2"></i>Mark Available</button>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Vehicle Requests -->
    <div class="row g-4">
      <div class="col-12">
        <div class="card shadow-sm border-0">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">New Vehicle Requests</h5>
            <small class="text-muted">Showing latest 4</small>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="table-light">
                  <tr>
                    <th>Requester</th>
                    <th>Dept</th>
                    <th>Requested Vehicle</th>
                    <th>Reason</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Anna Reyes</td>
                    <td>Operations</td>
                    <td>Isuzu D-Max</td>
                    <td>Replacement for damaged unit</td>
                    <td>2025-07-01</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-sm btn-success">Approve</button>
                        <button class="btn btn-sm btn-danger">Decline</button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Mark Dela Cruz</td>
                    <td>Sales</td>
                    <td>Ford Transit</td>
                    <td>Additional vehicle for product demos</td>
                    <td>2025-06-24</td>
                    <td><span class="badge bg-secondary">Under Review</span></td>
                    <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                  </tr>
                  <tr>
                    <td>Rosa Villanueva</td>
                    <td>HR</td>
                    <td>Toyota HiAce</td>
                    <td>Staff transport for training</td>
                    <td>2025-06-18</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td><button class="btn btn-sm btn-outline-primary">Procure</button></td>
                  </tr>
                  <tr>
                    <td>Engineering Team</td>
                    <td>Engineering</td>
                    <td>Pickup Truck</td>
                    <td>Field service support</td>
                    <td>2025-06-12</td>
                    <td><span class="badge bg-danger">Rejected</span></td>
                    <td><button class="btn btn-sm btn-outline-secondary">Reason</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mt-3 d-flex justify-content-end">
              <button class="btn btn-outline-secondary me-2">View All Requests</button>
              <button class="btn btn-primary">New Request</button>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection