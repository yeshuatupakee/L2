@extends('layouts.app')

@section('content')

    <div class="page-header-container mb-4">
      <div class="d-flex justify-content-between align-items-center page-header">
        <div class="d-flex align-items-center">
          <div class="dashboard-logo me-3">
            <img src="{{ asset('img/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
          </div>
          <div>
            <h2 class="fw-bold mb-1">Dashboard Overview</h2>
            <p class="text-muted mb-0">Real-time insights into your fleet operations</p>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div class="text-end">
            <small class="text-muted d-block">Last Updated</small>
            <span class="fw-semibold" id="lastUpdated">Just now</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Key Metrics Cards -->
    <div class="row g-3 mb-3">
      <div class="col-lg-3 col-md-6">
        <div class="card metric-card border-0">
          <div class="card-body">
            <div class="d-flex align-items-center gap-3">
              <div class="metric-icon bg-primary">
                <i class="fas fa-car"></i>
              </div>
              <div>
                <div class="metric-number text-primary" id="totalVehicles">28</div>
                <div class="metric-label">Total Vehicles</div>
                <div class="metric-change text-success">
                  <i class="fas fa-arrow-up"></i> 2 this month
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="card metric-card border-0">
          <div class="card-body">
            <div class="d-flex align-items-center gap-3">
              <div class="metric-icon bg-success">
                <i class="fas fa-route"></i>
              </div>
              <div>
                <div class="metric-number text-success" id="activeAssignments">12</div>
                <div class="metric-label">Active Trips</div>
                <div class="metric-change text-success">
                  <i class="fas fa-arrow-up"></i> 8% increase
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="card metric-card border-0">
          <div class="card-body">
            <div class="d-flex align-items-center gap-3">
              <div class="metric-icon bg-warning">
                <i class="fas fa-tools"></i>
              </div>
              <div>
                <div class="metric-number text-warning" id="maintenanceDue">6</div>
                <div class="metric-label">Maintenance Due</div>
                <div class="metric-change text-danger">
                  <i class="fas fa-exclamation-triangle"></i> 2 urgent
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="card metric-card border-0">
          <div class="card-body">
            <div class="d-flex align-items-center gap-3">
              <div class="metric-icon bg-info">
                <i class="fas fa-id-card"></i>
              </div>
              <div>
                <div class="metric-number text-info" id="totalDrivers">32</div>
                <div class="metric-label">Total Drivers</div>
                <div class="metric-change text-muted">
                  <i class="fas fa-users"></i> Company-wide
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content Row -->
    <div class="row g-4 mb-2">
      <!-- Fleet Status Overview -->
      <div class="col-lg-8">
        <div class="card dashboard-card border-0">
          <div class="card-header bg-transparent border-0 pb-0">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0">
                Fleet Performance
              </h5>
              <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-outline-secondary active" data-period="today">Today</button>
                <button type="button" class="btn btn-outline-secondary" data-period="week">Week</button>
                <button type="button" class="btn btn-outline-secondary" data-period="month">Month</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row g-3 mb-4">
              <div class="col-md-4">
                <div class="performance-stat">
                  <div class="d-flex align-items-center">
                    <div class="performance-icon bg-success bg-opacity-10 text-success me-3">
                      <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                      <h4 class="mb-0">24</h4>
                      <small class="text-muted">Active Vehicles</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="performance-stat">
                  <div class="d-flex align-items-center">
                    <div class="performance-icon bg-warning bg-opacity-10 text-warning me-3">
                      <i class="fas fa-pause-circle"></i>
                    </div>
                    <div>
                      <h4 class="mb-0">3</h4>
                      <small class="text-muted">In Maintenance</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="performance-stat">
                  <div class="d-flex align-items-center">
                    <div class="performance-icon bg-danger bg-opacity-10 text-danger me-3">
                      <i class="fas fa-times-circle"></i>
                    </div>
                    <div>
                      <h4 class="mb-0">1</h4>
                      <small class="text-muted">Out of Service</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Chart Placeholder -->
            <div class="chart-container">
              <canvas id="fleetChart" height="180"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- Quick Actions & Alerts -->
      <div class="col-lg-4">
        <div class="card dashboard-card border-0 mb-4">
          <div class="card-header bg-transparent border-0 pb-0">
            <h5 class="card-title mb-0">
              Quick Actions
            </h5>
          </div>
          <div class="card-body">
            <div class="d-grid gap-2">
              <a href="{{ route('fvm.assignment-tracking') }}" class="btn btn-primary btn-action">
                <i class="fas fa-route me-2"></i>
                Track Assignments
              </a>
              <a href="{{ route('fvm.vehicles') }}" class="btn btn-outline-primary btn-action">
                <i class="fas fa-car me-2"></i>
                Manage Fleet
              </a>
              <a href="{{ route('fvm.request-new-vehicle') }}" class="btn btn-outline-success btn-action">
                <i class="fas fa-plus me-2"></i>
                Request Vehicle
              </a>
              <a href="{{ route('fvm.maintenance') }}" class="btn btn-outline-warning btn-action">
                <i class="fas fa-tools me-2"></i>
                Schedule Maintenance
              </a>
            </div>
          </div>
        </div>


      </div>
    </div>


    <!-- Recent Activities & Driver Status -->
    <div class="row g-4">
      <!-- Recent Activities -->
      <div class="col-lg-8">
        <div class="card dashboard-card border-0">
          <div class="card-header bg-transparent border-0 pb-0">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0">
                Recent Activities
              </h5>
              <a href="{{ route('fvm.assignment-tracking') }}" class="btn btn-sm btn-outline-primary">
                View All
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="activity-timeline">
              <div class="activity-item">
                <div class="activity-marker bg-success"></div>
                <div class="activity-content">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h6 class="activity-title mb-1">Trip Completed Successfully</h6>
                      <p class="activity-description mb-1">TRP-001 from Downtown to Airport completed by John Doe</p>
                      <small class="text-muted">
                        <i class="fas fa-clock me-1"></i>2:30 PM •
                        <i class="fas fa-car me-1"></i>Toyota Camry (ABC-123)
                      </small>
                    </div>
                    <span class="badge bg-success">Completed</span>
                  </div>
                </div>
              </div>

              <div class="activity-item">
                <div class="activity-marker bg-primary"></div>
                <div class="activity-content">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h6 class="activity-title mb-1">New Assignment Created</h6>
                      <p class="activity-description mb-1">TRP-005 assigned to Mike Johnson for 4:00 PM pickup</p>
                      <small class="text-muted">
                        <i class="fas fa-clock me-1"></i>2:15 PM •
                        <i class="fas fa-user me-1"></i>Customer: Sarah Davis
                      </small>
                    </div>
                    <span class="badge bg-primary">Active</span>
                  </div>
                </div>
              </div>

              <div class="activity-item">
                <div class="activity-marker bg-warning"></div>
                <div class="activity-content">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h6 class="activity-title mb-1">Maintenance Scheduled</h6>
                      <p class="activity-description mb-1">Ford Transit (XYZ-789) scheduled for routine maintenance</p>
                      <small class="text-muted">
                        <i class="fas fa-clock me-1"></i>1:45 PM •
                        <i class="fas fa-calendar me-1"></i>Tomorrow 9:00 AM
                      </small>
                    </div>
                    <span class="badge bg-warning">Scheduled</span>
                  </div>
                </div>
              </div>

              <div class="activity-item">
                <div class="activity-marker bg-info"></div>
                <div class="activity-content">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h6 class="activity-title mb-1">Driver Check-in</h6>
                      <p class="activity-description mb-1">Alex Rodriguez started shift and checked vehicle status</p>
                      <small class="text-muted">
                        <i class="fas fa-clock me-1"></i>1:30 PM •
                        <i class="fas fa-car me-1"></i>Honda Accord (DEF-456)
                      </small>
                    </div>
                    <span class="badge bg-info">Check-in</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Driver Status -->
      <div class="col-lg-4">
        <!-- Alerts & Notifications -->
        <div class="card dashboard-card border-0 mb-4">
          <div class="card-header bg-transparent border-0 pb-0">
            <h5 class="card-title mb-0">Alerts & Notifications</h5>
          </div>
          <div class="card-body">
            <div class="alert-item">
              <div class="d-flex align-items-start">
                <div class="alert-icon bg-danger bg-opacity-10 text-danger me-3">
                  <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="flex-grow-1">
                  <h6 class="alert-title mb-1">Urgent Maintenance</h6>
                  <p class="alert-text mb-1">Vehicle ABC-123 requires immediate attention</p>
                  <small class="text-muted">2 hours ago</small>
                </div>
              </div>
            </div>
            <div class="alert-item">
              <div class="d-flex align-items-start">
                <div class="alert-icon bg-warning bg-opacity-10 text-warning me-3">
                  <i class="fas fa-clock"></i>
                </div>
                <div class="flex-grow-1">
                  <h6 class="alert-title mb-1">Assignment Delayed</h6>
                  <p class="alert-text mb-1">Trip TRP-002 is running 15 minutes late</p>
                  <small class="text-muted">30 minutes ago</small>
                </div>
              </div>
            </div>
            <div class="alert-item">
              <div class="d-flex align-items-start">
                <div class="alert-icon bg-success bg-opacity-10 text-success me-3">
                  <i class="fas fa-check"></i>
                </div>
                <div class="flex-grow-1">
                  <h6 class="alert-title mb-1">Trip Completed</h6>
                  <p class="alert-text mb-1">TRP-001 successfully completed</p>
                  <small class="text-muted">1 hour ago</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card dashboard-card border-0">
          <div class="card-header bg-transparent border-0 pb-0">
            <h5 class="card-title mb-0">
              Driver Status
            </h5>
          </div>
          <div class="card-body">
            <div class="driver-status-list">
              <div class="driver-item">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="driver-avatar bg-success text-white me-3">
                      <i class="fas fa-user"></i>
                    </div>
                    <div>
                      <h6 class="mb-0">John Doe</h6>
                      <small class="text-muted">Toyota Camry • ABC-123</small>
                    </div>
                  </div>
                  <span class="status-indicator bg-success"></span>
                </div>
              </div>

              <div class="driver-item">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="driver-avatar bg-primary text-white me-3">
                      <i class="fas fa-user"></i>
                    </div>
                    <div>
                      <h6 class="mb-0">Mike Johnson</h6>
                      <small class="text-muted">Honda Accord • DEF-456</small>
                    </div>
                  </div>
                  <span class="status-indicator bg-primary"></span>
                </div>
              </div>

              <div class="driver-item">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="driver-avatar bg-warning text-white me-3">
                      <i class="fas fa-user"></i>
                    </div>
                    <div>
                      <h6 class="mb-0">Alex Rodriguez</h6>
                      <small class="text-muted">Ford Transit • XYZ-789</small>
                    </div>
                  </div>
                  <span class="status-indicator bg-warning"></span>
                </div>
              </div>

              <div class="driver-item">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="driver-avatar bg-secondary text-white me-3">
                      <i class="fas fa-user"></i>
                    </div>
                    <div>

                      <h6 class="mb-0">Lisa Chen</h6>
                      <small class="text-muted">Mercedes E-Class • LUX-001</small>
                    </div>
                  </div>
                  <span class="status-indicator bg-secondary"></span>
                </div>
              </div>
            </div>

            <div class="mt-3">
              <div class="row text-center">
                <div class="col-4">
                  <div class="status-summary">
                    <div class="status-count text-success">2</div>
                    <small class="text-muted">Available</small>
                  </div>
                </div>
                <div class="col-4">
                  <div class="status-summary">
                    <div class="status-count text-primary">1</div>
                    <small class="text-muted">On Trip</small>
                  </div>
                </div>
                <div class="col-4">
                  <div class="status-summary">
                    <div class="status-count text-secondary">1</div>
                    <small class="text-muted">Off Duty</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Chart.js for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <!-- Page-specific inline removed and moved to public/js/dashboard.js -->
    <script>
        function initializeDashboard() {
            // Initialize fleet performance chart
            const ctx = document.getElementById('fleetChart').getContext('2d');
            window.fleetChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['6 AM', '9 AM', '12 PM', '3 PM', '6 PM', '9 PM'],
                    datasets: [{
                        label: 'Active Vehicles',
                        data: [12, 19, 24, 22, 18, 15],
                        borderColor: 'rgb(30, 58, 138)',
                        backgroundColor: 'rgba(30, 58, 138, 0.1)',
                        tension: 0.4,
                        fill: true
                    }, {
                        label: 'Completed Trips',
                        data: [8, 15, 18, 20, 16, 12],
                        borderColor: 'rgb(34, 197, 94)',
                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        }
                    }
                }
            });

            // Update last updated time
            updateLastUpdatedTime();

            // Auto-refresh every 30 seconds
            setInterval(updateLastUpdatedTime, 30000);
        }

        function refreshDashboardData() {
            // Simulate data refresh
            const button = document.getElementById('refreshDashboard');
            const originalText = button.innerHTML;

            // spinner only
            button.innerHTML = '<span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>';
            button.disabled = true;

            setTimeout(() => {
                // Update metrics with simulated new data
                updateMetrics();
                updateLastUpdatedTime();

                button.innerHTML = originalText;
                button.disabled = false;

                // Show success message
                showNotification('Dashboard refreshed successfully!', 'success');
            }, 1500);
        }

        function updateMetrics() {
            // Simulate metric updates
            const metrics = {
                totalVehicles: Math.floor(Math.random() * 5) + 26,
                activeAssignments: Math.floor(Math.random() * 8) + 10,
                maintenanceDue: Math.floor(Math.random() * 4) + 4,
                totalDrivers: Math.floor(Math.random() * 10) + 28
            };

            Object.keys(metrics).forEach(key => {
                const element = document.getElementById(key);
                if (element) {
                    element.textContent = metrics[key];
                }
            });
        }

        // The following functions are still defined here to avoid breaking existing HTML IDs.
    function updateChartData(period) {
            // Update chart based on selected period
            const data = {
                today: {
                    labels: ['6 AM', '9 AM', '12 PM', '3 PM', '6 PM', '9 PM'],
                    active: [12, 19, 24, 22, 18, 15],
                    completed: [8, 15, 18, 20, 16, 12]
                },
                week: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    active: [20, 22, 25, 23, 24, 18, 16],
                    completed: [45, 52, 48, 61, 55, 42, 38]
                },
                month: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    active: [22, 24, 23, 25],
                    completed: [180, 195, 210, 205]
                }
            };

            window.fleetChart.data.labels = data[period].labels;
            window.fleetChart.data.datasets[0].data = data[period].active;
            window.fleetChart.data.datasets[1].data = data[period].completed;
            window.fleetChart.update();
        }

        function updateLastUpdatedTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit'
            });
            document.getElementById('lastUpdated').textContent = timeString;
        }

        function showNotification(message, type) {
            // Simple notification system
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            notification.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
@endsection