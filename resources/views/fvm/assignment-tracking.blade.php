@extends('layouts.app')

@section('content')
    <div class="page-header-container mb-4">
        <div class="d-flex justify-content-between align-items-center page-header">
            <div class="d-flex align-items-center">
                <div class="dashboard-logo me-3">
                    <img src="{{ asset('img/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
                </div>
                <div>
                    <h2 class="fw-bold mb-1">Assignment Tracking</h2>
                    <p class="text-muted mb-0">Monitor active assignments and vehicle locations</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-clean btn-outline-clean" id="refreshBtn">
                    <i class="fas fa-sync-alt me-2"></i>Refresh
                </button>
                <button class="btn btn-clean btn-primary-clean" id="toggleMapBtn">
                    <i class="fas fa-map me-2"></i>Show Map
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card stats-card bg-primary text-white">
                <div class="card-body" style="padding: 0.75rem;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 style="font-size: 0.9rem;">Active Assignments</h6>
                            <h3 style="font-size: 1.5rem;" id="activeCount">0</h3>
                            <div class="card-detail" style="font-size: 0.8rem;">
                                <i class="fas fa-clock"></i> Currently running
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-route fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stats-card bg-success text-white">
                <div class="card-body" style="padding: 0.75rem;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 style="font-size: 0.9rem;">In Progress</h6>
                            <h3 style="font-size: 1.5rem;" id="inProgressCount">0</h3>
                            <div class="card-detail" style="font-size: 0.8rem;">
                                <i class="fas fa-route"></i> En route to destination
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-car fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stats-card bg-warning text-white">
                <div class="card-body" style="padding: 0.75rem;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 style="font-size: 0.9rem;">Pending</h6>
                            <h3 style="font-size: 1.5rem;" id="pendingCount">0</h3>
                            <div class="card-detail" style="font-size: 0.8rem;">
                                <i class="fas fa-hourglass-half"></i> Awaiting assignment
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-clock fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card stats-card bg-info text-white">
                <div class="card-body" style="padding: 0.75rem;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 style="font-size: 0.9rem;">Completed Today</h6>
                            <h3 style="font-size: 1.5rem;" id="completedCount">0</h3>
                            <div class="card-detail" style="font-size: 0.8rem;">
                                <i class="fas fa-calendar-day"></i> Since midnight
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-check-circle fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Container -->
    <div class="row mb-4" id="mapContainer" style="display: none;">
        <div class="col-12">
            <div class="card main-card">
                <div class="card-header">
                    <h5 class="card-title">
                        <i class="fas fa-map-marked-alt me-2 text-primary"></i>
                        Live Vehicle Tracking
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div id="map" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Assignments Table -->
    <div class="card main-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">
                    <i class="fas fa-list-alt me-2 text-primary"></i>
                    Current Assignments
                </h5>
                <div class="d-flex gap-2">
                    <select class="form-select form-select-clean" id="statusFilter" style="width: 150px;">
                        <option value="">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="assigned">Assigned</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-clean mb-0 paginate-10" id="assignmentsTable">
                    <thead>
                        <tr>
                            <th>Trip Details</th>
                            <th>Customer</th>
                            <th>Driver</th>
                            <th>Vehicle</th>
                            <th>Route Information</th>
                            <th>Schedule & Fare</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="assignmentsTableBody">
                        <!-- Data will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Completed Assignments Table -->
    <div class="card main-card mt-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">
                    <i class="fas fa-check-double me-2 text-success"></i>
                    Completed Assignments
                </h5>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-clean mb-0 paginate-10" id="completedAssignmentsTable">
                    <thead>
                        <tr>
                            <th>Trip Details</th>
                            <th>Customer</th>
                            <th>Driver</th>
                            <th>Vehicle</th>
                            <th>Route Information</th>
                            <th>Schedule & Fare</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="completedAssignmentsTableBody">
                        <!-- Data will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Include Leaflet CSS and JS for the map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('js/fvm-assignment-tracking.js') }}"></script>
    <script src="{{ asset('js/fvm-table-pagination.js') }}"></script>

    <script type="text/plain" data-moved-to="public/js/fvm-assignment-tracking.js">
        // Mock data for assignments
        const mockAssignments = [
            {
                id: 1,
                tripId: 'TRP-001',
                customerName: 'John Smith',
                customerPhone: '+1-555-0123',
                driverName: 'Mike Johnson',
                driverPhone: '+1-555-0456',
                vehicleInfo: 'Toyota Camry 2022',
                licensePlate: 'ABC-123',
                pickupAddress: '123 Main St, Downtown',
                pickupLat: 40.7128,
                pickupLng: -74.0060,
                destinationAddress: '456 Oak Ave, Uptown',
                destinationLat: 40.7589,
                destinationLng: -73.9851,
                scheduledTime: '2024-01-15 14:30:00',
                status: 'in_progress',
                currentLat: 40.7300,
                currentLng: -74.0000,
                estimatedArrival: '2024-01-15 15:15:00',
                fare: 45.50
            },
            {
                id: 2,
                tripId: 'TRP-002',
                customerName: 'Sarah Davis',
                customerPhone: '+1-555-0789',
                driverName: 'Alex Rodriguez',
                driverPhone: '+1-555-0321',
                vehicleInfo: 'Honda Accord 2023',
                licensePlate: 'XYZ-789',
                pickupAddress: '789 Pine St, Midtown',
                pickupLat: 40.7505,
                pickupLng: -73.9934,
                destinationAddress: '321 Elm St, Brooklyn',
                destinationLat: 40.6782,
                destinationLng: -73.9442,
                scheduledTime: '2024-01-15 15:00:00',
                status: 'assigned',
                currentLat: 40.7505,
                currentLng: -73.9934,
                estimatedArrival: '2024-01-15 15:45:00',
                fare: 38.75
            },
            {
                id: 3,
                tripId: 'TRP-003',
                customerName: 'Robert Wilson',
                customerPhone: '+1-555-0654',
                driverName: 'Lisa Chen',
                driverPhone: '+1-555-0987',
                vehicleInfo: 'Ford Transit 2023',
                licensePlate: 'DEF-456',
                pickupAddress: '555 Broadway, Manhattan',
                pickupLat: 40.7614,
                pickupLng: -73.9776,
                destinationAddress: 'JFK Airport Terminal 4',
                destinationLat: 40.6413,
                destinationLng: -73.7781,
                scheduledTime: '2024-01-15 16:30:00',
                status: 'pending',
                currentLat: null,
                currentLng: null,
                estimatedArrival: '2024-01-15 17:30:00',
                fare: 65.00
            },
            {
                id: 4,
                tripId: 'TRP-004',
                customerName: 'Emily Brown',
                customerPhone: '+1-555-0147',
                driverName: 'David Kim',
                driverPhone: '+1-555-0258',
                vehicleInfo: 'Mercedes E-Class 2022',
                licensePlate: 'LUX-001',
                pickupAddress: '100 Wall St, Financial District',
                pickupLat: 40.7074,
                pickupLng: -74.0113,
                destinationAddress: '200 Central Park West',
                destinationLat: 40.7829,
                destinationLng: -73.9654,
                scheduledTime: '2024-01-15 13:45:00',
                status: 'completed',
                currentLat: 40.7829,
                currentLng: -73.9654,
                estimatedArrival: '2024-01-15 14:30:00',
                fare: 52.25
            }
        ];

        let map;
        let markers = [];
        let isMapVisible = false;

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            loadAssignments();
            updateStats();
            initializeEventListeners();
        });

        function initializeEventListeners() {
            // Toggle map button
            document.getElementById('toggleMapBtn').addEventListener('click', toggleMap);

            // Refresh button
            document.getElementById('refreshBtn').addEventListener('click', function() {
                loadAssignments();
                updateStats();
                if (isMapVisible) {
                    updateMapMarkers();
                }
            });

            // Status filter
            document.getElementById('statusFilter').addEventListener('change', function() {
                filterAssignments(this.value);
            });
        }

        function loadAssignments() {
            const tbody = document.getElementById('assignmentsTableBody');
            tbody.innerHTML = '';

            mockAssignments.forEach(assignment => {
                const row = createAssignmentRow(assignment);
                tbody.appendChild(row);
            });
        }

        function createAssignmentRow(assignment) {
            const row = document.createElement('tr');

            const statusClass = getStatusClass(assignment.status);
            const statusText = assignment.status.replace('_', ' ').toUpperCase();

            row.innerHTML = `
                <td>
                    <div class="trip-info">
                        <h6 class="mb-0 text-primary fw-bold">${assignment.tripId}</h6>
                    </div>
                </td>
                <td>
                    <div class="customer-info">
                        <h6 class="mb-0">${assignment.customerName}</h6>
                        <small class="text-muted">${assignment.customerPhone}</small>
                    </div>
                </td>
                <td>
                    <div class="driver-info">
                        <h6 class="mb-0">${assignment.driverName}</h6>
                        <small class="text-muted">${assignment.driverPhone}</small>
                    </div>
                </td>
                <td>
                    <div class="vehicle-info">
                        <h6 class="mb-0">${assignment.vehicleInfo}</h6>
                        <span class="badge bg-light text-dark">${assignment.licensePlate}</span>
                    </div>
                </td>
                <td>
                    <div class="location-full">
                        <strong>Pickup:</strong><br>
                        ${assignment.pickupAddress}<br>
                        <strong class="mt-2 d-block">Destination:</strong><br>
                        ${assignment.destinationAddress}
                    </div>
                </td>
                <td>
                    <div class="time-details">
                        <strong>Scheduled:</strong><br>
                        ${formatDateTime(assignment.scheduledTime)}<br>
                        <strong class="mt-2 d-block">ETA:</strong><br>
                        ${formatDateTime(assignment.estimatedArrival)}<br>
                        <small class="text-success"><strong>Fare: $${assignment.fare}</strong></small>
                    </div>
                </td>
                <td>
                    <span class="badge ${statusClass}">${statusText}</span>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        ${assignment.currentLat && assignment.currentLng ?
                            `<button type="button" class="btn btn-sm btn-outline-success" onclick="trackVehicle(${assignment.id})" title="Track Vehicle">
                                <i class="fas fa-map-marker-alt"></i>
                            </button>` : ''
                        }
                        <button type="button" class="btn btn-sm btn-outline-info" onclick="callCustomer('${assignment.customerPhone}')" title="Call Customer">
                            <i class="fas fa-phone"></i>
                        </button>
                    </div>
                </td>
            `;

            return row;
        }

        function getStatusClass(status) {
            const statusClasses = {
                'pending': 'bg-warning',
                'assigned': 'bg-info',
                'in_progress': 'bg-primary',
                'completed': 'bg-success',
                'cancelled': 'bg-danger'
            };
            return statusClasses[status] || 'bg-secondary';
        }

        function formatDateTime(dateTimeString) {
            const date = new Date(dateTimeString);
            return date.toLocaleString('en-US', {
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function updateStats() {
            const stats = {
                active: mockAssignments.filter(a => ['assigned', 'in_progress'].includes(a.status)).length,
                inProgress: mockAssignments.filter(a => a.status === 'in_progress').length,
                pending: mockAssignments.filter(a => a.status === 'pending').length,
                completed: mockAssignments.filter(a => a.status === 'completed').length
            };

            document.getElementById('activeCount').textContent = stats.active;
            document.getElementById('inProgressCount').textContent = stats.inProgress;
            document.getElementById('pendingCount').textContent = stats.pending;
            document.getElementById('completedCount').textContent = stats.completed;
        }

        function filterAssignments(status) {
            const rows = document.querySelectorAll('#assignmentsTableBody tr');

            rows.forEach(row => {
                if (!status) {
                    row.style.display = '';
                } else {
                    const statusBadge = row.querySelector('.status-badge');
                    const rowStatus = statusBadge.textContent.toLowerCase().replace(' ', '_');
                    row.style.display = rowStatus === status ? '' : 'none';
                }
            });
        }

        function toggleMap() {
            const mapContainer = document.getElementById('mapContainer');
            const toggleBtn = document.getElementById('toggleMapBtn');

            if (isMapVisible) {
                mapContainer.style.display = 'none';
                toggleBtn.innerHTML = '<i class="fas fa-map me-2"></i>Show Map';
                isMapVisible = false;
            } else {
                mapContainer.style.display = 'block';
                toggleBtn.innerHTML = '<i class="fas fa-map me-2"></i>Hide Map';
                isMapVisible = true;

                if (!map) {
                    initializeMap();
                } else {
                    updateMapMarkers();
                }
            }
        }

        function initializeMap() {
            // Initialize map centered on New York City
            map = L.map('map').setView([40.7128, -74.0060], 11);

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            updateMapMarkers();
        }

        function updateMapMarkers() {
            if (!map) return;

            // Clear existing markers
            markers.forEach(marker => map.removeLayer(marker));
            markers = [];

            mockAssignments.forEach(assignment => {
                // Add pickup marker
                if (assignment.pickupLat && assignment.pickupLng) {
                    const pickupMarker = L.marker([assignment.pickupLat, assignment.pickupLng], {
                        icon: L.divIcon({
                            className: 'custom-marker pickup-marker',
                            html: '<i class="fas fa-map-marker-alt text-success"></i>',
                            iconSize: [20, 20]
                        })
                    }).addTo(map);

                    pickupMarker.bindPopup(`
                        <strong>Pickup: ${assignment.tripId}</strong><br>
                        Customer: ${assignment.customerName}<br>
                        Address: ${assignment.pickupAddress}<br>
                        Time: ${formatDateTime(assignment.scheduledTime)}
                    `);

                    markers.push(pickupMarker);
                }

                // Add destination marker
                if (assignment.destinationLat && assignment.destinationLng) {
                    const destMarker = L.marker([assignment.destinationLat, assignment.destinationLng], {
                        icon: L.divIcon({
                            className: 'custom-marker destination-marker',
                            html: '<i class="fas fa-flag text-danger"></i>',
                            iconSize: [20, 20]
                        })
                    }).addTo(map);

                    destMarker.bindPopup(`
                        <strong>Destination: ${assignment.tripId}</strong><br>
                        Customer: ${assignment.customerName}<br>
                        Address: ${assignment.destinationAddress}
                    `);

                    markers.push(destMarker);
                }

                // Add vehicle marker if in progress
                if (assignment.currentLat && assignment.currentLng && assignment.status === 'in_progress') {
                    const vehicleMarker = L.marker([assignment.currentLat, assignment.currentLng], {
                        icon: L.divIcon({
                            className: 'custom-marker vehicle-marker pulse',
                            html: '<i class="fas fa-car text-primary"></i>',
                            iconSize: [25, 25]
                        })
                    }).addTo(map);

                    vehicleMarker.bindPopup(`
                        <strong>Vehicle: ${assignment.vehicleInfo}</strong><br>
                        Driver: ${assignment.driverName}<br>
                        Trip: ${assignment.tripId}<br>
                        Status: ${assignment.status.replace('_', ' ').toUpperCase()}
                    `);

                    markers.push(vehicleMarker);
                }
            });
        }



        function trackVehicle(assignmentId) {
            const assignment = mockAssignments.find(a => a.id === assignmentId);
            if (!assignment || !assignment.currentLat || !assignment.currentLng) {
                alert('Vehicle location not available');
                return;
            }

            // Show map if not visible
            if (!isMapVisible) {
                toggleMap();
            }

            // Center map on vehicle location
            setTimeout(() => {
                if (map) {
                    map.setView([assignment.currentLat, assignment.currentLng], 15);

                    // Find and open the vehicle marker popup
                    markers.forEach(marker => {
                        const markerLatLng = marker.getLatLng();
                        if (Math.abs(markerLatLng.lat - assignment.currentLat) < 0.001 &&
                            Math.abs(markerLatLng.lng - assignment.currentLng) < 0.001) {
                            marker.openPopup();
                        }
                    });
                }
            }, 500);
        }

        function callCustomer(phoneNumber) {
            if (confirm(`Call customer at ${phoneNumber}?`)) {
                // In a real application, this would integrate with a phone system
                window.open(`tel:${phoneNumber}`);
            }
        }

        // Simulate real-time updates
        setInterval(() => {
            // Simulate vehicle movement for in-progress assignments
            mockAssignments.forEach(assignment => {
                if (assignment.status === 'in_progress' && assignment.currentLat && assignment.currentLng) {
                    // Small random movement to simulate vehicle tracking
                    assignment.currentLat += (Math.random() - 0.5) * 0.001;
                    assignment.currentLng += (Math.random() - 0.5) * 0.001;
                }
            });

            // Update map markers if map is visible
            if (isMapVisible && map) {
                updateMapMarkers();
            }
        }, 10000); // Update every 10 seconds

        // Auto-refresh data every 30 seconds
        setInterval(() => {
            // In a real application, this would fetch fresh data from the server
            updateStats();
        }, 30000);
    </script>
@endsection