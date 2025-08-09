<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jetlouge Travels - My Travel Dashboard</title>

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
      <a class="navbar-brand fw-bold" href="/portfolio">
        <i class="bi bi-airplane me-2"></i>My Travel Dashboard
      </a>
      <div class="d-flex align-items-center">
        <div class="dropdown me-3">
          <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-danger ms-1">2</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><h6 class="dropdown-header">Notifications</h6></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-check-circle me-2 text-success"></i>Booking confirmed</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle me-2 text-info"></i>Payment reminder</a></li>
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
      <img src="{{ asset('img/profile.png') }}" alt="Jetlouge Travels" class="profile-img mb-2">
      <h6 class="fw-semibold mb-1">Sarah Johnson</h6>
      <small class="text-muted">Valued Customer</small>
      <div class="mt-2">
        <small class="badge bg-success">Premium Member</small>
        <small class="text-muted d-block mt-1">Member since 2022</small>
      </div>

      <!-- Quick Stats -->
      <div class="row mt-3 text-center">
        <div class="col-4">
          <div class="fw-bold text-primary">3</div>
          <small class="text-muted">Active</small>
        </div>
        <div class="col-4">
          <div class="fw-bold text-success">12</div>
          <small class="text-muted">Completed</small>
        </div>
        <div class="col-4">
          <div class="fw-bold text-warning">4.9</div>
          <small class="text-muted">Rating</small>
        </div>
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
          <i class="bi bi-suitcase me-2"></i> Browse Packages
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-heart me-2"></i> My Wishlist
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-credit-card me-2"></i> Payment History
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-star me-2"></i> Reviews & Ratings
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-person me-2"></i> My Profile
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-headset me-2"></i> Support
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-dark">
          <i class="bi bi-gear me-2"></i> Settings
        </a>
      </li>
      <li class="nav-item mt-3">
        <a href="/portfolio" class="nav-link text-primary">
          <i class="bi bi-house me-2"></i> Back to Website
        </a>
      </li>
      <li class="nav-item">
        <a href="/login" class="nav-link text-danger">
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
           <img src="{{ asset('img/jetlouge_logo.png') }}" class="logo-img">
          </div>
          <div>
            <h2 class="fw-bold mb-1">Welcome back, Sarah! 👋</h2>
            <p class="text-muted mb-0">Ready for your next adventure? Your Palawan trip is coming up in 15 days!</p>
          </div>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Book New Trip
          </button>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/portfolio" class="text-decoration-none">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">My Dashboard</li>
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
                <h3 class="fw-bold mb-0">3</h3>
                <p class="text-muted mb-0 small">Active Bookings</p>
                <small class="text-success">Next trip in 15 days</small>
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
                <i class="bi bi-airplane"></i>
              </div>
              <div>
                <h3 class="fw-bold mb-0">12</h3>
                <p class="text-muted mb-0 small">Trips Completed</p>
                <small class="text-success">Amazing memories made</small>
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
                <i class="bi bi-heart"></i>
              </div>
              <div>
                <h3 class="fw-bold mb-0">8</h3>
                <p class="text-muted mb-0 small">Wishlist Items</p>
                <small class="text-info">Dream destinations</small>
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
                <p class="text-muted mb-0 small">Your Rating</p>
                <small class="text-success">Excellent traveler</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Current Bookings & Quick Actions -->
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="card shadow-sm border-0">
          <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Your Upcoming Adventures</h5>
          </div>
          <div class="card-body">
            <!-- Featured Booking -->
            <div class="booking-item featured-booking mb-4">
              <div class="row align-items-center">
                <div class="col-md-3">
                  <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80"
                       alt="Palawan" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                  <h6 class="fw-bold text-primary mb-1">Palawan Paradise Package</h6>
                  <p class="text-muted mb-2">5 Days 4 Nights • El Nido, Palawan</p>
                  <div class="booking-details-inline">
                    <small class="me-3"><i class="bi bi-calendar me-1"></i>Dec 15-20, 2024</small>
                    <small class="me-3"><i class="bi bi-people me-1"></i>2 Adults</small>
                    <small><span class="badge bg-success">Confirmed</span></small>
                  </div>
                </div>
                <div class="col-md-3 text-end">
                  <div class="countdown-badge mb-2">15 days to go!</div>
                  <div class="d-grid gap-1">
                    <button class="btn btn-primary btn-sm">View Details</button>
                    <button class="btn btn-outline-primary btn-sm">Download Voucher</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Other Bookings -->
            <div class="booking-item">
              <div class="row align-items-center">
                <div class="col-md-2">
                  <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                       alt="Boracay" class="img-fluid rounded">
                </div>
                <div class="col-md-7">
                  <h6 class="fw-bold mb-1">Boracay Beach Getaway</h6>
                  <p class="text-muted mb-1">3 Days 2 Nights • Boracay Island</p>
                  <small class="text-muted"><i class="bi bi-calendar me-1"></i>Jan 10-13, 2025</small>
                </div>
                <div class="col-md-3 text-end">
                  <span class="badge bg-warning mb-2">Pending Payment</span>
                  <div class="d-grid">
                    <button class="btn btn-warning btn-sm">Complete Payment</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="booking-item">
              <div class="row align-items-center">
                <div class="col-md-2">
                  <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                       alt="Bohol" class="img-fluid rounded">
                </div>
                <div class="col-md-7">
                  <h6 class="fw-bold mb-1">Bohol Adventure</h6>
                  <p class="text-muted mb-1">4 Days 3 Nights • Bohol</p>
                  <small class="text-muted"><i class="bi bi-calendar me-1"></i>Feb 5-8, 2025</small>
                </div>
                <div class="col-md-3 text-end">
                  <span class="badge bg-info mb-2">Confirmed</span>
                  <div class="d-grid">
                    <button class="btn btn-outline-primary btn-sm">View Details</button>
                  </div>
                </div>
              </div>
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
                <i class="bi bi-plus-circle me-2"></i>Book New Trip
              </button>
              <button class="btn btn-outline-primary">
                <i class="bi bi-suitcase me-2"></i>Browse Packages
              </button>
              <button class="btn btn-outline-primary">
                <i class="bi bi-heart me-2"></i>View Wishlist
              </button>
              <button class="btn btn-outline-secondary">
                <i class="bi bi-headset me-2"></i>Get Support
              </button>
            </div>
          </div>
        </div>

        <div class="card shadow-sm border-0 mt-4">
          <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Recommended For You</h5>
          </div>
          <div class="card-body">
            <div class="recommendation-item mb-3">
              <div class="d-flex">
                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=80&q=80"
                     alt="Bohol" class="rounded me-3" width="60" height="60">
                <div class="flex-grow-1">
                  <h6 class="fw-bold mb-1">Bohol Adventure</h6>
                  <small class="text-muted">4D/3N • ₱22,999</small>
                  <div class="mt-1">
                    <button class="btn btn-outline-primary btn-sm">
                      <i class="bi bi-heart me-1"></i>Add to Wishlist
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="recommendation-item mb-3">
              <div class="d-flex">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=80&q=80"
                     alt="Siargao" class="rounded me-3" width="60" height="60">
                <div class="flex-grow-1">
                  <h6 class="fw-bold mb-1">Siargao Surf Paradise</h6>
                  <small class="text-muted">5D/4N • ₱28,999</small>
                  <div class="mt-1">
                    <button class="btn btn-outline-primary btn-sm">
                      <i class="bi bi-heart me-1"></i>Add to Wishlist
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="recommendation-item">
              <div class="d-flex">
                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=80&q=80"
                     alt="Batanes" class="rounded me-3" width="60" height="60">
                <div class="flex-grow-1">
                  <h6 class="fw-bold mb-1">Batanes Cultural Tour</h6>
                  <small class="text-muted">6D/5N • ₱35,999</small>
                  <div class="mt-1">
                    <button class="btn btn-outline-primary btn-sm">
                      <i class="bi bi-heart me-1"></i>Add to Wishlist
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="text-center mt-3">
              <a href="/portfolio#packages" class="btn btn-link">View All Packages</a>
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
          sidebar.classList.toggle('collapsed');
          mainContent.classList.toggle('expanded');
          localStorage.setItem('sidebarCollapsed', !isCollapsed);

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
          document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
          this.classList.add('active');
        });
      });

      // Customer-specific functionality
      // Booking actions
      document.querySelectorAll('.booking-item button').forEach(btn => {
        btn.addEventListener('click', function() {
          const action = this.textContent.trim();
          if (action.includes('View Details')) {
            showNotification('Opening booking details...', 'info');
          } else if (action.includes('Download Voucher')) {
            showNotification('Downloading your travel voucher...', 'success');
          } else if (action.includes('Complete Payment')) {
            showNotification('Redirecting to secure payment...', 'warning');
          }
        });
      });

      // Quick action buttons
      document.querySelectorAll('.card-body .btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const action = this.textContent.trim();
          if (action.includes('Book New Trip')) {
            showNotification('Redirecting to travel packages...', 'info');
            setTimeout(() => window.location.href = '/portfolio#packages', 1000);
          } else if (action.includes('Browse Packages')) {
            showNotification('Loading travel packages...', 'info');
          } else if (action.includes('View Wishlist')) {
            showNotification('Opening your wishlist...', 'info');
          } else if (action.includes('Get Support')) {
            showNotification('Connecting you to our travel experts...', 'success');
          } else if (action.includes('Add to Wishlist')) {
            const packageName = this.closest('.recommendation-item').querySelector('h6').textContent;
            showNotification(`${packageName} added to your wishlist! ❤️`, 'success');
            this.innerHTML = '<i class="bi bi-heart-fill me-1"></i>Added';
            this.classList.remove('btn-outline-primary');
            this.classList.add('btn-success');
          }
        });
      });

      // Notification system
      function showNotification(message, type = 'info') {
        const existingNotifications = document.querySelectorAll('.custom-notification');
        existingNotifications.forEach(notification => notification.remove());

        const notification = document.createElement('div');
        notification.className = `custom-notification alert alert-${type === 'info' ? 'primary' : type} alert-dismissible fade show position-fixed`;
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

      // Countdown timer
      function updateCountdown() {
        const countdownBadge = document.querySelector('.countdown-badge');
        if (countdownBadge) {
          const tripDate = new Date('2024-12-15');
          const now = new Date();
          const timeDiff = tripDate - now;
          const daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

          if (daysDiff > 0) {
            countdownBadge.textContent = `${daysDiff} days to go!`;
          } else if (daysDiff === 0) {
            countdownBadge.textContent = 'Today is the day! 🎉';
            countdownBadge.style.background = 'var(--jetlouge-success)';
          }
        }
      }

      updateCountdown();

      // Welcome notification
      setTimeout(() => {
        showNotification('Welcome back, Sarah! Your Palawan adventure awaits! 🏝️', 'success');
      }, 1500);

      // Handle window resize for responsive behavior
      window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
          sidebar.classList.remove('active');
          overlay.classList.remove('show');
          document.body.style.overflow = '';
        }
      });

    }); // Close DOMContentLoaded
  </script>

</body>
</html>
