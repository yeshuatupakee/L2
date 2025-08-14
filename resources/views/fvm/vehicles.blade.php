@extends('layouts.app')

@section('content')
    <div class="page-header-container mb-4">
        <div class="d-flex justify-content-between align-items-center page-header">
            <div class="d-flex align-items-center">
                <div class="dashboard-logo me-3">
                    <img src="{{ asset('img/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
                </div>
                <div>
                    <h2 class="fw-bold mb-1">Vehicle Management</h2>
                    <p class="text-muted mb-0">Manage your fleet of vehicles</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search vehicles..." id="searchInput">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="maintenance">Maintenance</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="typeFilter">
                        <option value="">All Types</option>
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                        <option value="van">Van</option>
                        <option value="bus">Bus</option>
                        <option value="luxury">Luxury</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                        <i class="fas fa-times me-1"></i>Clear
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vehicles Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Vehicle Fleet</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="vehiclesTable">
                    <thead class="table-light">
                        <tr>
                            <th>Vehicle</th>
                            <th>License Plate</th>
                            <th>Type</th>
                            <th>Capacity</th>
                            <th>Status</th>
                            <th>Driver</th>
                            <th>Mileage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample data - replace with dynamic data -->
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <img src="{{ asset('img/Silver Sedan.png') }}" alt="Sedan" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Toyota Camry 2022</h6>
                                        <small class="text-muted">VIN: 1HGBH41JXMN109186</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">ABC-123</span></td>
                            <td>Sedan</td>
                            <td>4 passengers</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>John Doe</td>
                            <td>25,000 mi</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewVehicleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteVehicle(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <img src="{{ asset('img/mini van.png') }}" alt="Van" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Ford Transit 2023</h6>
                                        <small class="text-muted">VIN: 2FMDK3GC5DBA12345</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">XYZ-789</span></td>
                            <td>Van</td>
                            <td>12 passengers</td>
                            <td><span class="badge bg-warning">Maintenance</span></td>
                            <td>Jane Smith</td>
                            <td>40,500 mi</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewVehicleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteVehicle(2)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <img src="{{ asset('img/luxary car.png') }}" alt="Luxury" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Mercedes S-Class 2024</h6>
                                        <small class="text-muted">VIN: WDDUG8CB5LA123456</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">LUX-001</span></td>
                            <td>Luxury</td>
                            <td>4 passengers</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Mike Johnson</td>
                            <td>12,300 mi</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewVehicleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteVehicle(3)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <img src="{{ asset('img/Silver Sedan.png') }}" alt="Sedan" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Honda Accord 2021</h6>
                                        <small class="text-muted">VIN: 1HGCV1F30MA000001</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">DEF-456</span></td>
                            <td>Sedan</td>
                            <td>4 passengers</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Alex Rodriguez</td>
                            <td>33,800 mi</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewVehicleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteVehicle(4)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <img src="{{ asset('img/suv.png') }}" alt="SUV" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Chevrolet Suburban 2020</h6>
                                        <small class="text-muted">VIN: 3GNWKGEJ4AG120987</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">SUV-234</span></td>
                            <td>SUV</td>
                            <td>7 passengers</td>
                            <td><span class="badge bg-secondary">Inactive</span></td>
                            <td>David Kim</td>
                            <td>58,120 mi</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewVehicleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteVehicle(5)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <img src="{{ asset('img/mini van.png') }}" alt="Van" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Mercedes Sprinter 2022</h6>
                                        <small class="text-muted">VIN: W1Y4EBHY8MT123456</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">VAN-555</span></td>
                            <td>Van</td>
                            <td>15 passengers</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Sarah Lee</td>
                            <td>18,940 mi</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewVehicleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteVehicle(6)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <img src="{{ asset('img/priv bus.png') }}" alt="Bus" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Toyota Coaster 2019</h6>
                                        <small class="text-muted">VIN: JT123ABC90K456789</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">BUS-777</span></td>
                            <td>Bus</td>
                            <td>30 passengers</td>
                            <td><span class="badge bg-warning">Maintenance</span></td>
                            <td>Mark Thompson</td>
                            <td>89,700 mi</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewVehicleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteVehicle(7)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <img src="{{ asset('img/luxary car.png') }}" alt="Luxury" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Tesla Model S 2023</h6>
                                        <small class="text-muted">VIN: 5YJSA1E26MF123456</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">EV-999</span></td>
                            <td>Luxury</td>
                            <td>4 passengers</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Lisa Chen</td>
                            <td>8,200 mi</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewVehicleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteVehicle(8)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <img src="{{ asset('img/mini van.png') }}" alt="Van" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Nissan NV350 2018</h6>
                                        <small class="text-muted">VIN: JN1NV3508Z0001234</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">VAN-321</span></td>
                            <td>Van</td>
                            <td>14 passengers</td>
                            <td><span class="badge bg-secondary">Inactive</span></td>
                            <td>Peter Cruz</td>
                            <td>102,450 mi</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewVehicleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteVehicle(9)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="vehicle-avatar me-3">
                                        <img src="{{ asset('img/suv.png') }}" alt="SUV" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </div>
                                    <div>
                                        <h6 class="mb-0">BMW 7 Series 2024</h6>
                                        <small class="text-muted">VIN: WBAGF8C52RC123456</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">LUX-777</span></td>
                            <td>Luxury</td>
                            <td>4 passengers</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Henry Adams</td>
                            <td>3,900 mi</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewVehicleModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editVehicleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteVehicle(10)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Showing 10 of 10 vehicles</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Add Vehicle Modal -->
    <div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold" id="addVehicleModalLabel"><i class="fas fa-plus-circle me-2"></i>Add New Vehicle</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addVehicleForm" class="needs-validation" novalidate>
                    <div class="modal-body p-3">
                        <div class="section-header mb-3">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-car me-2"></i>Vehicle Information</h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="vehicleMake" class="form-label fw-semibold">Make *</label>
                                    <input type="text" class="form-control" id="vehicleMake" placeholder="e.g., Toyota" required>
                                    <div class="invalid-feedback">Please provide a valid make.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="vehicleModel" class="form-label fw-semibold">Model *</label>
                                    <input type="text" class="form-control" id="vehicleModel" placeholder="e.g., Camry" required>
                                    <div class="invalid-feedback">Please provide a valid model.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="vehicleYear" class="form-label fw-semibold">Year *</label>
                                    <input type="number" class="form-control" id="vehicleYear" min="1900" max="2030" placeholder="2024" required>
                                    <div class="invalid-feedback">Please provide a valid year.</div>
                                </div>
                            </div>
                        </div>
                        <div class="section-header mb-3">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-id-card me-2"></i>Registration & Identification</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="vehicleLicense" class="form-label fw-semibold">License Plate *</label>
                                    <input type="text" class="form-control" id="vehicleLicense" placeholder="ABC-123" required>
                                    <div class="invalid-feedback">Please provide a valid license plate.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="vehicleVin" class="form-label fw-semibold">VIN Number *</label>
                                    <input type="text" class="form-control" id="vehicleVin" placeholder="17-character VIN" maxlength="17" required>
                                    <div class="invalid-feedback">Please provide a valid VIN number.</div>
                                </div>
                            </div>
                        </div>
                        <div class="section-header mb-3">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-cogs me-2"></i>Vehicle Specifications</h6>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="vehicleType" class="form-label fw-semibold">Type *</label>
                                    <select class="form-select" id="vehicleType" required>
                                        <option value="">Choose type</option>
                                        <option value="sedan">Sedan</option>
                                        <option value="suv">SUV</option>
                                        <option value="van">Van</option>
                                        <option value="bus">Bus</option>
                                        <option value="luxury">Luxury</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a vehicle type.</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="vehicleCapacity" class="form-label fw-semibold">Capacity *</label>
                                    <input type="number" class="form-control" id="vehicleCapacity" min="1" max="50" placeholder="4" required>
                                    <div class="invalid-feedback">Please provide passenger capacity.</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="vehicleColor" class="form-label fw-semibold">Color *</label>
                                    <input type="text" class="form-control" id="vehicleColor" placeholder="White" required>
                                    <div class="invalid-feedback">Please provide vehicle color.</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="vehicleFuelType" class="form-label fw-semibold">Fuel Type *</label>
                                    <select class="form-select" id="vehicleFuelType" required>
                                        <option value="">Choose fuel</option>
                                        <option value="gasoline">Gasoline</option>
                                        <option value="diesel">Diesel</option>
                                        <option value="hybrid">Hybrid</option>
                                        <option value="electric">Electric</option>
                                    </select>
                                    <div class="invalid-feedback">Please select fuel type.</div>
                                </div>
                            </div>
                        </div>
                        <div class="section-header mb-3">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-wrench me-2"></i>Status & Maintenance</h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="vehicleStatus" class="form-label fw-semibold">Status *</label>
                                    <select class="form-select" id="vehicleStatus" required>
                                        <option value="">Choose status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="maintenance">Maintenance</option>
                                    </select>
                                    <div class="invalid-feedback">Please select vehicle status.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="vehicleMileage" class="form-label fw-semibold">Current Mileage</label>
                                    <input type="number" class="form-control" id="vehicleMileage" min="0" placeholder="25000">
                                </div>
                                <div class="col-md-4">
                                    <label for="vehicleInsurance" class="form-label fw-semibold">Insurance Expiry</label>
                                    <input type="date" class="form-control" id="vehicleInsurance">
                                </div>
                            </div>
                        </div>
                        <div class="section-header mb-3">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-camera me-2"></i>Vehicle Photos</h6>
                            <div class="border border-2 border-primary rounded p-4 text-center bg-light">
                                <i class="fas fa-cloud-upload-alt fa-2x text-primary mb-2"></i>
                                <p class="mb-2">Drag and drop files here or click to browse</p>
                                <input type="file" class="form-control d-none" id="vehiclePhotos" multiple accept="image/*">
                                <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('vehiclePhotos').click()"><i class="fas fa-plus me-2"></i>Choose Files</button>
                            </div>
                            <div id="photoPreview" class="row g-2 mt-3"></div>
                        </div>
                        <div class="section-header">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-sticky-note me-2"></i>Additional Notes</h6>
                            <textarea class="form-control" id="vehicleNotes" rows="4" placeholder="Enter any additional notes about the vehicle..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light p-3">
                        <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>Cancel</button>
                        <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save me-2"></i>Add Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Vehicle Modal -->
    <div class="modal fade" id="editVehicleModal" tabindex="-1" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow-lg border-0 compact-edit-modal compact-modal">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold" id="editVehicleModalLabel"><i class="fas fa-edit me-2"></i>Edit Vehicle</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editVehicleForm" class="needs-validation" novalidate>
                    <div class="modal-body p-3">
                        <div class="section-header mb-2">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-car me-2"></i>Vehicle Information</h6>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <label for="editVehicleMake" class="form-label fw-semibold">Make *</label>
                                    <input type="text" class="form-control" id="editVehicleMake" required>
                                    <div class="invalid-feedback">Please provide a valid make.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="editVehicleModel" class="form-label fw-semibold">Model *</label>
                                    <input type="text" class="form-control" id="editVehicleModel" required>
                                    <div class="invalid-feedback">Please provide a valid model.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="editVehicleYear" class="form-label fw-semibold">Year *</label>
                                    <input type="number" class="form-control" id="editVehicleYear" min="1900" max="2030" required>
                                    <div class="invalid-feedback">Please provide a valid year.</div>
                                </div>
                            </div>
                        </div>
                        <div class="section-header mb-2">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-id-card me-2"></i>Registration & Identification</h6>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label for="editVehicleLicense" class="form-label fw-semibold">License Plate *</label>
                                    <input type="text" class="form-control" id="editVehicleLicense" required>
                                    <div class="invalid-feedback">Please provide a valid license plate.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="editVehicleVin" class="form-label fw-semibold">VIN Number *</label>
                                    <input type="text" class="form-control" id="editVehicleVin" maxlength="17" required>
                                    <div class="invalid-feedback">Please provide a valid VIN number.</div>
                                </div>
                            </div>
                        </div>
                        <div class="section-header mb-2">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-cogs me-2"></i>Vehicle Specifications</h6>
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <label for="editVehicleType" class="form-label fw-semibold">Type *</label>
                                    <select class="form-select" id="editVehicleType" required>
                                        <option value="">Select Type</option>
                                        <option value="sedan">Sedan</option>
                                        <option value="suv">SUV</option>
                                        <option value="van">Van</option>
                                        <option value="bus">Bus</option>
                                        <option value="luxury">Luxury</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a vehicle type.</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="editVehicleCapacity" class="form-label fw-semibold">Capacity *</label>
                                    <input type="number" class="form-control" id="editVehicleCapacity" min="1" max="50" required>
                                    <div class="invalid-feedback">Please provide passenger capacity.</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="editVehicleColor" class="form-label fw-semibold">Color *</label>
                                    <input type="text" class="form-control" id="editVehicleColor" required>
                                    <div class="invalid-feedback">Please provide vehicle color.</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="editVehicleFuelType" class="form-label fw-semibold">Fuel Type *</label>
                                    <select class="form-select" id="editVehicleFuelType" required>
                                        <option value="">Select Fuel Type</option>
                                        <option value="gasoline">Gasoline</option>
                                        <option value="diesel">Diesel</option>
                                        <option value="hybrid">Hybrid</option>
                                        <option value="electric">Electric</option>
                                    </select>
                                    <div class="invalid-feedback">Please select fuel type.</div>
                                </div>
                            </div>
                        </div>
                        <div class="section-header mb-2">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-wrench me-2"></i>Status & Maintenance</h6>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <label for="editVehicleStatus" class="form-label fw-semibold">Status *</label>
                                    <select class="form-select" id="editVehicleStatus" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="maintenance">Maintenance</option>
                                    </select>
                                    <div class="invalid-feedback">Please select vehicle status.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="editVehicleMileage" class="form-label fw-semibold">Current Mileage</label>
                                    <input type="number" class="form-control" id="editVehicleMileage" min="0">
                                </div>
                                <div class="col-md-4">
                                    <label for="editVehicleInsurance" class="form-label fw-semibold">Insurance Expiry</label>
                                    <input type="date" class="form-control" id="editVehicleInsurance">
                                </div>
                            </div>
                        </div>
                        <div class="section-header mb-3">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-camera me-2"></i>Vehicle Photos</h6>
                            <label class="form-label">Current Photos</label>
                            <div id="currentPhotos" class="d-flex flex-wrap gap-2 mb-2">
                                <div class="position-relative photo-item">
                                    <img src="{{ asset('img/Silver Sedan.png') }}" class="img-thumbnail" style="width: 100px; height: 80px; object-fit: cover;">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle p-1" onclick="removePhoto(this)" style="width: 25px; height: 25px; font-size: 12px;"><i class="fas fa-times"></i></button>
                                </div>
                                <div class="position-relative photo-item">
                                    <img src="{{ asset('img/suv.png') }}" class="img-thumbnail" style="width: 100px; height: 80px; object-fit: cover;">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle p-1" onclick="removePhoto(this)" style="width: 25px; height: 25px; font-size: 12px;"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <label for="editVehiclePhotos" class="form-label">Add New Photos</label>
                            <div class="border border-2 border-primary rounded p-4 text-center bg-light">
                                <i class="fas fa-cloud-upload-alt fa-2x text-primary mb-2"></i>
                                <p class="mb-2">Drag and drop files here or click to browse</p>
                                <input type="file" class="form-control d-none" id="editVehiclePhotos" multiple accept="image/*">
                                <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('editVehiclePhotos').click()"><i class="fas fa-plus me-2"></i>Choose Files</button>
                            </div>
                            <div id="editPhotoPreview" class="row g-2 mt-3"></div>
                        </div>
                        <div class="section-header mb-1">
                            <h6 class="text-primary fw-bold mb-2"><i class="fas fa-sticky-note me-2"></i>Notes</h6>
                            <textarea class="form-control" id="editVehicleNotes" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light p-2">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Update Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Vehicle Modal -->
    <div class="modal fade" id="viewVehicleModal" tabindex="-1" aria-labelledby="viewVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content compact-modal view-vehicle-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewVehicleModalLabel">Vehicle Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <!-- Vehicle Photos Gallery -->
                        <div class="col-12">
                            <h6 class="text-muted mb-3">Vehicle Photos</h6>
                            <div id="vehiclePhotosCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                                <div class="carousel-inner rounded">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('img/Silver Sedan.png') }}" class="d-block w-100" style="height: 220px; object-fit: cover;" alt="Vehicle Front">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/mini van.png') }}" class="d-block w-100" style="height: 220px; object-fit: cover;" alt="Vehicle Side">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/luxary car.png') }}" class="d-block w-100" style="height: 220px; object-fit: cover;" alt="Vehicle Interior">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#vehiclePhotosCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#vehiclePhotosCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#vehiclePhotosCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#vehiclePhotosCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#vehiclePhotosCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                            </div>

                            <!-- Thumbnail Gallery -->
                            <div class="d-flex gap-2 mb-4 flex-wrap">
                                <img src="{{ asset('img/Silver Sedan.png') }}" class="img-thumbnail photo-thumbnail" style="width: 80px; height: 60px; object-fit: cover; cursor: pointer;" onclick="changeCarouselSlide(0)" alt="Photo 1">
                                <img src="{{ asset('img/mini van.png') }}" class="img-thumbnail photo-thumbnail" style="width: 80px; height: 60px; object-fit: cover; cursor: pointer;" onclick="changeCarouselSlide(1)" alt="Photo 2">
                                <img src="{{ asset('img/luxary car.png') }}" class="img-thumbnail photo-thumbnail" style="width: 80px; height: 60px; object-fit: cover; cursor: pointer;" onclick="changeCarouselSlide(2)" alt="Photo 3">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="text-muted mb-1">Vehicle Information</h6>
                                            <h4 class="mb-3" id="viewVehicleName">Toyota Camry 2022</h4>
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <small class="text-muted">License Plate</small>
                                                    <div class="fw-bold" id="viewVehicleLicense">ABC-123</div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">VIN Number</small>
                                                    <div class="fw-bold" id="viewVehicleVin">1HGBH41JXMN109186</div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Type</small>
                                                    <div class="fw-bold" id="viewVehicleType">Sedan</div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Capacity</small>
                                                    <div class="fw-bold" id="viewVehicleCapacity">4 passengers</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h6 class="text-muted mb-0">Status & Details</h6>
                                                <span class="badge bg-success" id="viewVehicleStatus">Active</span>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <small class="text-muted">Color</small>
                                                    <div class="fw-bold" id="viewVehicleColor">White</div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Fuel Type</small>
                                                    <div class="fw-bold" id="viewVehicleFuelType">Gasoline</div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Mileage</small>
                                                    <div class="fw-bold" id="viewVehicleMileage">25,000 miles</div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Insurance Expiry</small>
                                                    <div class="fw-bold" id="viewVehicleInsurance">2024-12-31</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h6 class="text-muted mb-2">Notes</h6>
                            <div class="border rounded p-3 bg-light" id="viewVehicleNotes">
                                Regular maintenance completed. Vehicle in excellent condition.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ asset('js/fvm-vehicles.js') }}"></script>
<script src="{{ asset('js/fvm-table-pagination.js') }}"></script>
@endsection