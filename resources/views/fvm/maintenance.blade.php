@extends('layouts.app')

@section('content')
    <div class="page-header-container mb-4">
        <div class="d-flex justify-content-between align-items-center page-header">
            <div class="d-flex align-items-center">
                <div class="dashboard-logo me-3">
                    <img src="{{ asset('img/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
                </div>
                <div>
                    <h2 class="fw-bold mb-1">Maintenance</h2>
                    <p class="text-muted mb-0">Track and manage vehicle maintenance records</p>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMaintenanceModal">
                    <i class="fas fa-plus me-2"></i>Add Maintenance
                </button>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" id="searchMaintenance" placeholder="Search by vehicle, type, or notes...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="typeFilter">
                        <option value="">All Types</option>
                        <option value="oil_change">Oil Change</option>
                        <option value="tire_rotation">Tire Rotation</option>
                        <option value="brake_service">Brake Service</option>
                        <option value="inspection">Inspection</option>
                        <option value="repair">Repair</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="completed">Completed</option>
                        <option value="overdue">Overdue</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-secondary w-100" onclick="clearMaintenanceFilters()">
                        <i class="fas fa-times me-1"></i>Clear
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Maintenance Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Maintenance Records</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="maintenanceTable">
                    <thead class="table-light">
                        <tr>
                            <th>Vehicle</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Odometer</th>
                            <th>Cost</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <i class="fas fa-car text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Toyota Camry 2022</h6>
                                        <small class="text-muted">Plate: ABC-123</small>
                                    </div>
                                </div>
                            </td>
                            <td>Oil Change</td>
                            <td>2024-01-20</td>
                            <td>25,100 mi</td>
                            <td>$60.00</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editMaintenanceModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="deleteMaintenance(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <i class="fas fa-truck text-info fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Ford Transit 2023</h6>
                                        <small class="text-muted">Plate: XYZ-789</small>
                                    </div>
                                </div>
                            </td>
                            <td>Brake Service</td>
                            <td>2024-02-05</td>
                            <td>40,600 mi</td>
                            <td>$320.00</td>
                            <td><span class="badge bg-warning text-dark">Scheduled</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editMaintenanceModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="deleteMaintenance(2)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Maintenance Modal -->
    <div class="modal fade" id="addMaintenanceModal" tabindex="-1" aria-labelledby="addMaintenanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMaintenanceModalLabel">Add Maintenance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addMaintenanceForm">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label class="form-label" for="mVehicle">Vehicle</label>
                                <select class="form-select" id="mVehicle" required>
                                    <option value="">Select Vehicle</option>
                                    <option value="1">Toyota Camry 2022 (ABC-123)</option>
                                    <option value="2">Ford Transit 2023 (XYZ-789)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="mType">Type</label>
                                <select class="form-select" id="mType" required>
                                    <option value="">Select Type</option>
                                    <option value="oil_change">Oil Change</option>
                                    <option value="tire_rotation">Tire Rotation</option>
                                    <option value="brake_service">Brake Service</option>
                                    <option value="inspection">Inspection</option>
                                    <option value="repair">Repair</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="mDate">Date</label>
                                <input type="date" class="form-control" id="mDate" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="mOdometer">Odometer</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="mOdometer" min="0" required>
                                    <span class="input-group-text">mi</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="mCost">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="mCost" min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="mStatus">Status</label>
                                <select class="form-select" id="mStatus" required>
                                    <option value="scheduled">Scheduled</option>
                                    <option value="completed">Completed</option>
                                    <option value="overdue">Overdue</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="mNotes">Notes</label>
                                <textarea class="form-control" id="mNotes" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Maintenance Modal -->
    <div class="modal fade" id="editMaintenanceModal" tabindex="-1" aria-labelledby="editMaintenanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMaintenanceModalLabel">Edit Maintenance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editMaintenanceForm">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label class="form-label" for="eVehicle">Vehicle</label>
                                <select class="form-select" id="eVehicle" required>
                                    <option value="">Select Vehicle</option>
                                    <option value="1">Toyota Camry 2022 (ABC-123)</option>
                                    <option value="2">Ford Transit 2023 (XYZ-789)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="eType">Type</label>
                                <select class="form-select" id="eType" required>
                                    <option value="oil_change">Oil Change</option>
                                    <option value="tire_rotation">Tire Rotation</option>
                                    <option value="brake_service">Brake Service</option>
                                    <option value="inspection">Inspection</option>
                                    <option value="repair">Repair</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="eDate">Date</label>
                                <input type="date" class="form-control" id="eDate" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="eOdometer">Odometer</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="eOdometer" min="0" required>
                                    <span class="input-group-text">mi</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="eCost">Cost</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="eCost" min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="eStatus">Status</label>
                                <select class="form-select" id="eStatus" required>
                                    <option value="scheduled">Scheduled</option>
                                    <option value="completed">Completed</option>
                                    <option value="overdue">Overdue</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="eNotes">Notes</label>
                                <textarea class="form-control" id="eNotes" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ asset('js/fvm-maintenance.js') }}"></script>
<script src="{{ asset('js/fvm-table-pagination.js') }}"></script>
@endsection