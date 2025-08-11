<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="{{ asset('img/jetlouge_logo.png') }}">
  <title>Jetlouge Travels - Request New Vehicle</title>

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
      <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face"
           alt="Admin Profile" class="profile-img mb-2">
      <h6 class="fw-semibold mb-1">John Anderson</h6>
      <small class="text-muted">Travel Administrator</small>
    </div>

    <!-- Navigation Menu -->
    <ul class="nav flex-column">
        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('index') }}"
              class="nav-link text-dark {{ request()->routeIs('index') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <!-- Fleet and Vehicle Management -->
        <li class="nav-item">
            <a class="nav-link collapse-toggle text-dark {{ request()->is('fvm/*') ? '' : 'collapsed' }}" 
              data-bs-toggle="collapse" href="#fleetSub" 
              aria-expanded="{{ request()->is('fvm/*') ? 'true' : 'false' }}">
                <i class="bi bi-truck-front me-2"></i> Fleet and Vehicle Management
            </a>
            <div class="collapse {{ request()->is('fvm/*') ? 'show' : '' }}" id="fleetSub">
                <ul class="nav flex-column ms-4">
                    <li><a class="nav-link {{ request()->routeIs('fvm.vehicles') ? 'active' : '' }}" href="{{ route('fvm.vehicles') }}">Vehicles</a></li>
                    <li><a class="nav-link {{ request()->routeIs('fvm.maintenance') ? 'active' : '' }}" href="{{ route('fvm.maintenance') }}">Maintenance</a></li>
                    <li><a class="nav-link {{ request()->routeIs('fvm.assignment-tracking') ? 'active' : '' }}" href="{{ route('fvm.assignment-tracking') }}">Assignment Tracking</a></li>
                    <li><a class="nav-link {{ request()->routeIs('fvm.request-new-vehicle') ? 'active' : '' }}" href="{{ route('fvm.request-new-vehicle') }}">Request New Vehicle</a></li>
                </ul>
            </div>
        </li>

        <!-- Vehicle Reservation and Dispatch System -->
        <li class="nav-item">
            <a class="nav-link collapse-toggle text-dark {{ request()->is('vrds/*') ? '' : 'collapsed' }}" 
              data-bs-toggle="collapse" href="#reservationSub" 
              aria-expanded="{{ request()->is('vrds/*') ? 'true' : 'false' }}">
                <i class="bi bi-calendar2-plus me-2"></i> Vehicle Reservation and Dispatch System
            </a>
            <div class="collapse {{ request()->is('vrds/*') ? 'show' : '' }}" id="reservationSub">
                <ul class="nav flex-column ms-4">
                    <li><a class="nav-link {{ request()->routeIs('vrds.reservation') ? 'active' : '' }}" href="{{ route('vrds.reservation') }}">Reservation</a></li>
                    <li><a class="nav-link {{ request()->routeIs('vrds.trip-scheduling') ? 'active' : '' }}" href="{{ route('vrds.trip-scheduling') }}">Trip Scheduling</a></li>
                    <li><a class="nav-link {{ request()->routeIs('vrds.dispatch-monitoring') ? 'active' : '' }}" href="{{ route('vrds.dispatch-monitoring') }}">Dispatch Monitoring</a></li>
                </ul>
            </div>
        </li>

        <!-- Driver and Trip Performance Monitoring -->
        <li class="nav-item">
            <a class="nav-link collapse-toggle text-dark {{ request()->is('dtpm/*') ? '' : 'collapsed' }}" 
              data-bs-toggle="collapse" href="#driverSub" 
              aria-expanded="{{ request()->is('dtpm/*') ? 'true' : 'false' }}">
                <i class="bi bi-person-lines-fill me-2"></i> Driver and Trip Performance Monitoring
            </a>
            <div class="collapse {{ request()->is('dtpm/*') ? 'show' : '' }}" id="driverSub">
                <ul class="nav flex-column ms-4">
                    <li><a class="nav-link {{ request()->routeIs('dtpm.driver-profiles') ? 'active' : '' }}" href="{{ route('dtpm.driver-profiles') }}">Driver Profiles</a></li>
                    <li><a class="nav-link {{ request()->routeIs('dtpm.trip-reports') ? 'active' : '' }}" href="{{ route('dtpm.trip-reports') }}">Trip Reports</a></li>
                    <li><a class="nav-link {{ request()->routeIs('dtpm.performance') ? 'active' : '' }}" href="{{ route('dtpm.performance') }}">Performance</a></li>
                </ul>
            </div>
        </li>

        <!-- Transport Cost Analysis and Optimization -->
        <li class="nav-item">
            <a class="nav-link collapse-toggle text-dark {{ request()->is('tcao/*') ? '' : 'collapsed' }}" 
              data-bs-toggle="collapse" href="#costSub" 
              aria-expanded="{{ request()->is('tcao/*') ? 'true' : 'false' }}">
                <i class="bi bi-graph-up-arrow me-2"></i> Transport Cost Analysis and Optimization
            </a>
            <div class="collapse {{ request()->is('tcao/*') ? 'show' : '' }}" id="costSub">
                <ul class="nav flex-column ms-4">
                    <li><a class="nav-link {{ request()->routeIs('tcao.fuel-and-trip-cost') ? 'active' : '' }}" href="{{ route('tcao.fuel-and-trip-cost') }}">Fuel and Trip Cost</a></li>
                    <li><a class="nav-link {{ request()->routeIs('tcao.utilization') ? 'active' : '' }}" href="{{ route('tcao.utilization') }}">Utilization</a></li>
                    <li><a class="nav-link {{ request()->routeIs('tcao.optimization') ? 'active' : '' }}" href="{{ route('tcao.optimization') }}">Optimization</a></li>
                </ul>
            </div>
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

      // Add loading animation to quick action buttons (kept for compatibility if buttons present)
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

      // --- Persist only real route links (ignore hash toggles) ---
      document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href') || '';
        // persist only real route links (ignore hash toggles)
        if (!href.startsWith('#') && href.trim() !== '') {
          link.addEventListener('click', function () {
            // mark active link visually
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
            this.classList.add('active');

            localStorage.setItem('activeLink', href);
            // clicking a real route should clear the open submenu state
            localStorage.removeItem('openSubmenu');
          });
        }
      });

      // --- Save submenu open/close, but only for collapse toggles ---
      document.querySelectorAll('.collapse-toggle').forEach(toggle => {
        toggle.addEventListener('click', function () {
          const targetId = this.getAttribute('href');
          const submenu = document.querySelector(targetId);
          const isOpen = submenu && submenu.classList.contains('show');
          // store either '' (none) or the selector to open
          localStorage.setItem('openSubmenu', isOpen ? '' : targetId);
        });
      });

      // --- Restore submenu state (defensive) ---
      const openSubmenu = localStorage.getItem('openSubmenu');
      if (openSubmenu) {
        const submenu = document.querySelector(openSubmenu);
        if (submenu) submenu.classList.add('show');
      }

      // --- Restore active link (only for real links) ---
      const activeLink = localStorage.getItem('activeLink');
      if (activeLink) {
        const link = document.querySelector(`.nav-link[href="${activeLink}"]`);
        if (link) {
          document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
          link.classList.add('active');
          // open its parent submenu if needed
          const parentCollapse = link.closest('.collapse');
          if (parentCollapse && !parentCollapse.classList.contains('show')) {
            parentCollapse.classList.add('show');
          }
        }
      }

    }); // Close DOMContentLoaded
  </script>

</body>
</html>