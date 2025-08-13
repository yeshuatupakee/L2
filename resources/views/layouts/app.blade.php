<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="{{ asset('img/jetlouge_logo.png') }}">
  <title>Jetlouge Travels - Logistics 2</title>

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
      <a class="navbar-brand fw-bold">
        <i class="bi bi-airplane me-2"></i>Jetlouge Travels
      </a>
      <div class="d-flex align-items-center">
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
  <img src="https://ui-avatars.com/api/?name=John+Doe&background=0D8ABC&color=fff&size=128" 
       alt="Admin Profile" class="profile-img mb-2 rounded-circle">
  <h6 class="fw-semibold mb-1">John Doe</h6>
  <small class="text-muted">Logistics 2 Admin</small>
</div>


    <!-- Navigation Menu -->
    <ul class="nav flex-column">
        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
              class="nav-link text-dark {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-fill me-2"></i> Dashboard
            </a>
        </li>

<!-- Fleet & Vehicle Management -->
<li class="nav-item">
  <a href="{{ route('fleet.index') }}"
    class="nav-link text-dark {{ request()->routeIs('fleet.index') ? 'active' : '' }}">
    <i class="bi bi-truck-front me-2"></i> Fleet & Vehicle Management
  </a>
</li>

<!-- Vehicle Reservation & Dispatch System -->
<li class="nav-item">
  <a href="{{ route('vrds.index') }}"
    class="nav-link text-dark {{ request()->routeIs('vrds.index') ? 'active' : '' }}">
    <i class="bi bi-calendar-check me-2"></i> Vehicle Reservation & Dispatch System
  </a>
</li>

<!-- Driver and Trip Performance Monitoring -->
<li class="nav-item">
  <a href="{{ route('dtpm.index') }}"
    class="nav-link text-dark {{ request()->routeIs('dtpm.index') ? 'active' : '' }}">
    <i class="bi bi-speedometer2 me-2"></i> Driver & Trip Performance Monitoring
  </a>
</li>

<!-- Transport Cost Analysis & Optimization -->
<li class="nav-item">
  <a href="{{ route('tcao.index') }}"
    class="nav-link text-dark {{ request()->routeIs('tcao.index') ? 'active' : '' }}">
    <i class="bi bi-cash-coin me-2"></i> Transport Cost Analysis & Optimization
  </a>
</li>


        <!-- Logout -->
        <li class="nav-item mt-3">
            <a href="" class="nav-link text-danger">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </li>
    </ul>
  </aside>

  <!-- Overlay for mobile -->
  <div id="overlay" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50" style="z-index:1040; display: none;"></div>

  <!-- Main Content -->
  <main id="main-content">
    @yield('content')
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

      // Add loading animation to quick action buttons
      document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
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
    }); // Close DOMContentLoaded
  </script>

</body>
</html>
