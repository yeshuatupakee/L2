<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jetlouge Travels - Agent Portal</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/dash-style-fixed.css') }}">


</head>
<body style="background-color: #f8f9fa !important;">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: var(--jetlouge-primary);">
    <div class="container-fluid">
      <button class="sidebar-toggle desktop-toggle me-3" id="desktop-toggle" title="Toggle Sidebar">
        <i class="bi bi-list fs-5"></i>
      </button>
      <a class="navbar-brand fw-bold" href="#">
        <i class="bi bi-person-badge me-2"></i>Jetlouge Agent Portal
      </a>
      <div class="d-flex align-items-center">
        <div class="dropdown me-3">
          <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-danger ms-1">3</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><h6 class="dropdown-header">Notifications</h6></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check me-2"></i>New booking request</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-plus me-2"></i>Customer inquiry</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-exclamation-triangle me-2"></i>Payment pending</a></li>
          </ul>
        </div>
        <button class="sidebar-toggle mobile-toggle" id="menu-btn" title="Open Menu">
          <i class="bi bi-list fs-5"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <aside id="sidebar" class="bg-white border-end p-3 shadow-sm">
    <!-- Profile Section -->
    <div class="profile-section text-center">
      <img src="{{ asset('img/profile.png') }}"
           alt="Agent Profile" class="profile-img mb-2">
           
      <h6 class="fw-semibold mb-1">Maria Santos</h6>
      <small class="text-muted">Senior Travel Agent</small>
      <div class="mt-2">
        <small class="badge bg-success">Online</small>
        <small class="text-muted d-block mt-1">Agent ID: AG001</small>
      </div>
    </div>

    <!-- Navigation Menu -->
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="#" class="nav-link text-dark active">
          <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-calendar-check me-2"></i> My Bookings
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-people me-2"></i> My Customers
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-suitcase me-2"></i> Travel Packages
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-currency-dollar me-2"></i> Commissions
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-person-plus me-2"></i> Leads
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-graph-up me-2"></i> Performance
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-chat-dots me-2"></i> Messages
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-gear me-2"></i> Settings
        </a>
      </li>
      <li class="nav-item mt-3">
        <a href="#" class="nav-link text-danger">
          <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
      </li>
    </ul>
  </aside>

  <!-- Overlay for mobile -->
  <div id="overlay" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50" style="z-index:1040; display: none;"></div>

  <!-- Main Content -->
  <main id="main-content">
    <!-- Page Header -->
    <div class="page-header-container mb-4">
      <div class="d-flex justify-content-between align-items-center page-header">
        <div class="d-flex align-items-center">
          <div class="dashboard-logo me-3">
            <img src="{{ asset('img/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
          </div>
          <div>
            <h2 class="fw-bold mb-1">Agent Portal</h2>
            <p class="text-muted mb-0">Good morning, Maria! You have 5 new booking requests and 3 pending payments to review today.</p>
          </div>
        </div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Agent Dashboard</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
      <div class="col-md-3">
        <div class="card stat-card shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                <i class="bi bi-calendar-check"></i>
              </div>
              <div>
                <h3 class="fw-bold mb-0">24</h3>
                <p class="text-muted mb-0 small">Active Bookings</p>
                <small class="text-success">+12% from last month</small>
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
                <i class="bi bi-currency-dollar"></i>
              </div>
              <div>
                <h3 class="fw-bold mb-0">₱45,230</h3>
                <p class="text-muted mb-0 small">This Month's Commission</p>
                <small class="text-success">+8% from last month</small>
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
                <i class="bi bi-people"></i>
              </div>
              <div>
                <h3 class="fw-bold mb-0">156</h3>
                <p class="text-muted mb-0 small">My Customers</p>
                <small class="text-success">+15 new this month</small>
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
                <i class="bi bi-star-fill"></i>
              </div>
              <div>
                <h3 class="fw-bold mb-0">4.9</h3>
                <p class="text-muted mb-0 small">Customer Rating</p>
                <small class="text-success">+0.2 from last month</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Activity & Quick Actions -->
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="card shadow-sm border-0">
          <div class="card-header border-bottom">
            <h5 class="card-title mb-0">My Recent Bookings</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="table-light">
                  <tr>
                    <th>Customer</th>
                    <th>Package</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Commission</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <img src="profile.png"
                             class="rounded-circle me-2" width="32" height="32" alt="Customer">
                        <span>Sarah Johnson</span>
                      </div>
                    </td>
                    <td>Palawan Paradise • 5D/4N</td>
                    <td>Dec 15, 2024</td>
                    <td><span class="badge bg-success">Confirmed</span></td>
                    <td>₱2,600</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face"
                             class="rounded-circle me-2" width="32" height="32" alt="Customer">
                        <span>Mike Chen</span>
                      </div>
                    </td>
                    <td>Boracay Beach Escape • 3D/2N</td>
                    <td>Dec 20, 2024</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>₱1,900</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=40&h=40&fit=crop&crop=face"
                             class="rounded-circle me-2" width="32" height="32" alt="Customer">
                        <span>Emma Wilson</span>
                      </div>
                    </td>
                    <td>Bohol Adventure • 4D/3N</td>
                    <td>Jan 5, 2025</td>
                    <td><span class="badge bg-success">Confirmed</span></td>
                    <td>₱2,300</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face"
                             class="rounded-circle me-2" width="32" height="32" alt="Customer">
                        <span>John Martinez</span>
                      </div>
                    </td>
                    <td>Siargao Surf Package • 6D/5N</td>
                    <td>Jan 12, 2025</td>
                    <td><span class="badge bg-info">Processing</span></td>
                    <td>₱3,100</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card shadow-sm border-0">
          <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Quick Actions</h5>
          </div>
          <div class="card-body">
            <div class="d-grid gap-2">
              <button class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>New Booking
              </button>
              <button class="btn btn-outline-primary">
                <i class="bi bi-person-plus me-2"></i>Add Customer
              </button>
              <button class="btn btn-outline-primary">
                <i class="bi bi-search me-2"></i>Search Packages
              </button>
              <button class="btn btn-outline-secondary">
                <i class="bi bi-file-earmark-text me-2"></i>Generate Quote
              </button>
            </div>
          </div>
        </div>

        <div class="card shadow-sm border-0 mt-4">
          <div class="card-header border-bottom">
            <h5 class="card-title mb-0">My Performance</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small">Monthly Target</span>
                <span class="small text-muted">₱156,000 / ₱200,000</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar" style="width: 78%"></div>
              </div>
              <small class="text-muted">78% completed</small>
            </div>
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small">New Customers</span>
                <span class="small text-muted">17 / 20</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-success" style="width: 85%"></div>
              </div>
              <small class="text-muted">85% completed</small>
            </div>
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small">Customer Satisfaction</span>
                <span class="small text-muted">4.9 / 5.0</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-warning" style="width: 98%"></div>
              </div>
              <small class="text-muted">98% rating</small>
            </div>
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small">Bookings This Month</span>
                <span class="small text-muted">24 bookings</span>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-info" style="width: 80%"></div>
              </div>
              <small class="text-muted">Above average</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Sidebar toggle functionality -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuBtn = document.getElementById('menu-btn');
      const desktopToggle = document.getElementById('desktop-toggle');
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      const mainContent = document.getElementById('main-content');

      // Mobile sidebar toggle
      if (menuBtn && sidebar && overlay) {
        menuBtn.addEventListener('click', (e) => {
          e.preventDefault();
          sidebar.classList.toggle('active');
          overlay.classList.toggle('show');
          document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
        });
      }

      // Desktop sidebar toggle
      if (desktopToggle && sidebar && mainContent) {
        desktopToggle.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();

          const isCollapsed = sidebar.classList.contains('collapsed');

          // Toggle classes with smooth animation
          sidebar.classList.toggle('collapsed');
          mainContent.classList.toggle('expanded');

          // Store state in localStorage for persistence
          localStorage.setItem('sidebarCollapsed', !isCollapsed);

          // Trigger window resize event to help responsive components adjust
          setTimeout(() => {
            window.dispatchEvent(new Event('resize'));
          }, 300);
        });
      }

      // Restore sidebar state from localStorage
      const savedState = localStorage.getItem('sidebarCollapsed');
      if (savedState === 'true' && sidebar && mainContent) {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');
      }

      // Close mobile sidebar when clicking overlay
      if (overlay) {
        overlay.addEventListener('click', () => {
          sidebar.classList.remove('active');
          overlay.classList.remove('show');
          document.body.style.overflow = '';
        });
      }

      // Add smooth hover effects to nav links
      document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
          // Remove active class from all links
          document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
          // Add active class to clicked link
          this.classList.add('active');
        });
      });

      // Add loading animation to action buttons (excluding notification buttons)
      document.querySelectorAll('.btn:not(.dropdown-toggle):not(.btn-close)').forEach(btn => {
        btn.addEventListener('click', function(e) {
          // Skip if it's a notification dropdown button or close button
          if (this.closest('.dropdown') || this.classList.contains('btn-close')) {
            return;
          }

          if (!this.classList.contains('loading')) {
            this.classList.add('loading');
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="bi bi-arrow-clockwise me-2"></i>Loading...';

            setTimeout(() => {
              this.innerHTML = originalText;
              this.classList.remove('loading');
            }, 1500);
          }
        });
      });

      // Handle window resize for responsive behavior
      window.addEventListener('resize', () => {
        // Reset mobile sidebar state on desktop
        if (window.innerWidth >= 768) {
          sidebar.classList.remove('active');
          overlay.classList.remove('show');
          document.body.style.overflow = '';
        }
      });

      // Agent-specific functionality
      // Show welcome notification
      setTimeout(() => {
        showNotification('Welcome to your Agent Portal, Maria! 🎉', 'success');
      }, 1000);

      // Notification system
      function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'info' ? 'primary' : type} alert-dismissible fade show position-fixed`;
        notification.style.cssText = `
          top: 80px;
          right: 20px;
          z-index: 9999;
          min-width: 300px;
          box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        `;

        notification.innerHTML = `
          <div class="d-flex align-items-center">
            <i class="bi bi-${getNotificationIcon(type)} me-2"></i>
            <span>${message}</span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
          </div>
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
          if (notification.parentNode) {
            notification.remove();
          }
        }, 4000);
      }

      function getNotificationIcon(type) {
        switch(type) {
          case 'success': return 'check-circle';
          case 'warning': return 'exclamation-triangle';
          case 'danger': return 'x-circle';
          default: return 'info-circle';
        }
      }

      // Real-time updates simulation
      setInterval(() => {
        const stats = document.querySelectorAll('.stat-card h3');
        stats.forEach((stat, index) => {
          if (index === 0) { // Active bookings
            const current = parseInt(stat.textContent);
            stat.textContent = current + Math.floor(Math.random() * 3) - 1;
          }
        });
      }, 30000);

    }); // Close DOMContentLoaded
  </script>

</body>
</html>
