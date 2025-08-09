<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jetlouge Travels - Explore Amazing Destinations</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Portfolio Page Styles -->
 <link rel="stylesheet" href="{{ asset('css/portfolio-style.css') }}">

</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <div class="logo-box-nav">
         <img src="{{ asset('img/jetlouge_logo.png') }}" alt="Jetlouge Travels">
        </div>
        <span class="brand-text-nav">Jetlouge Travels</span>
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#home">
              <i class="bi bi-house-door me-1"></i>HOME
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#packages">
              <i class="bi bi-suitcase me-1"></i>TOUR PACKAGES
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#guide">
              <i class="bi bi-map me-1"></i>TRAVEL GUIDE
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#blog">
              <i class="bi bi-journal-text me-1"></i>BLOG
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">
              <i class="bi bi-telephone me-1"></i>CONTACT US
            </a>
          </li>
        </ul>
        
        <div class="d-flex gap-2">
          <a href="/login" class="btn btn-login-nav">
            <i class="bi bi-person me-1"></i>Login
          </a>
          <button class="btn btn-book-now">
            <i class="bi bi-calendar-check me-1"></i>Book Now
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="hero-section">
    <div class="hero-overlay"></div>
    <div class="floating-shapes">
      <div class="shape"></div>
      <div class="shape"></div>
      <div class="shape"></div>
      <div class="shape"></div>
    </div>
    
    <div class="container hero-content">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="hero-title">Explore the Philippines with Us!</h1>
          <p class="hero-subtitle">Discover breathtaking destinations, create unforgettable memories, and experience the beauty of the Philippines with our expertly crafted travel packages.</p>
          
          <div class="search-container">
            <div class="search-box">
              <input type="text" class="form-control search-input" placeholder="Where do you wanna go?" id="searchDestination">
              <button class="btn search-btn" type="button">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </div>
          
          <p class="popular-text">Popular: Palawan Tour Package | Boracay Trip | El Nido Package</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Packages Section -->
  <section id="packages" class="packages-section">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <h2 class="section-title scroll-animate">Featured Tour Packages</h2>
          <p class="section-subtitle scroll-animate">Handpicked destinations for your perfect getaway</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="package-card scroll-animate">
            <div class="package-image">
              <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Palawan">
              <div class="package-badge">Featured</div>
            </div>
            <div class="package-content">
              <h4>Palawan Paradise</h4>
              <p class="package-description">Experience the pristine beaches and crystal-clear waters of Palawan's most beautiful islands.</p>
              <div class="package-details">
                <span class="duration"><i class="bi bi-clock"></i> 5 Days 4 Nights</span>
                <span class="price">₱25,999</span>
              </div>
              <button class="btn btn-package">
                <i class="bi bi-eye me-2"></i>View Details
              </button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="package-card scroll-animate">
            <div class="package-image">
              <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Boracay">
              <div class="package-badge">Popular</div>
            </div>
            <div class="package-content">
              <h4>Boracay Beach Escape</h4>
              <p class="package-description">Relax on the world-famous White Beach and enjoy exciting water activities in Boracay.</p>
              <div class="package-details">
                <span class="duration"><i class="bi bi-clock"></i> 3 Days 2 Nights</span>
                <span class="price">₱18,999</span>
              </div>
              <button class="btn btn-package">
                <i class="bi bi-eye me-2"></i>View Details
              </button>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="package-card scroll-animate">
            <div class="package-image">
              <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Bohol">
              <div class="package-badge">New</div>
            </div>
            <div class="package-content">
              <h4>Bohol Adventure</h4>
              <p class="package-description">Discover the Chocolate Hills, meet the tarsiers, and cruise the Loboc River in Bohol.</p>
              <div class="package-details">
                <span class="duration"><i class="bi bi-clock"></i> 4 Days 3 Nights</span>
                <span class="price">₱22,999</span>
              </div>
              <button class="btn btn-package">
                <i class="bi bi-eye me-2"></i>View Details
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="why-choose-section">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <h2 class="section-title scroll-animate-scale">Why Choose Jetlouge Travels?</h2>
          <p class="section-subtitle scroll-animate-scale">Your trusted partner for unforgettable travel experiences</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="feature-card scroll-animate-left">
            <div class="feature-icon">
              <i class="bi bi-shield-check"></i>
            </div>
            <h5>Safe & Secure</h5>
            <p>Your safety is our priority with comprehensive travel insurance and 24/7 support.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="feature-card scroll-animate">
            <div class="feature-icon">
              <i class="bi bi-star-fill"></i>
            </div>
            <h5>Expert Guides</h5>
            <p>Professional local guides with extensive knowledge of destinations and culture.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="feature-card scroll-animate">
            <div class="feature-icon">
              <i class="bi bi-wallet2"></i>
            </div>
            <h5>Best Prices</h5>
            <p>Competitive pricing with no hidden fees and flexible payment options.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="feature-card scroll-animate-right">
            <div class="feature-icon">
              <i class="bi bi-headset"></i>
            </div>
            <h5>24/7 Support</h5>
            <p>Round-the-clock customer support for all your travel needs and emergencies.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="footer-brand">
            <div class="logo-box-footer">
              <img src="jetlouge_logo.png" alt="Jetlouge Travels">
            </div>
            <h5>Jetlouge Travels</h5>
            <p>Your gateway to amazing Philippine destinations. Creating memories that last a lifetime.</p>
          </div>
        </div>
        
        <div class="col-lg-2 col-md-6">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#packages">Packages</a></li>
            <li><a href="#guide">Travel Guide</a></li>
            <li><a href="#blog">Blog</a></li>
          </ul>
        </div>
        
        <div class="col-lg-2 col-md-6">
          <h6>Support</h6>
          <ul class="footer-links">
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
        
        <div class="col-lg-4">
          <h6>Contact Info</h6>
          <div class="contact-info">
            <p><i class="bi bi-geo-alt"></i> Manila, Philippines</p>
            <p><i class="bi bi-telephone"></i> +63 123 456 7890</p>
            <p><i class="bi bi-envelope"></i> info@jetlougetravels.com</p>
          </div>
          
          <div class="social-links">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
          </div>
        </div>
      </div>
      
      <hr class="footer-divider">
      
      <div class="row">
        <div class="col-12 text-center">
          <p class="copyright">&copy; 2024 Jetlouge Travels. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });

    // Navbar background on scroll
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    // Scroll Animation Observer
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-in');
        }
      });
    }, observerOptions);

    // Observe all elements with scroll animation classes
    document.addEventListener('DOMContentLoaded', function() {
      const animateElements = document.querySelectorAll('.scroll-animate, .scroll-animate-left, .scroll-animate-right, .scroll-animate-scale');
      animateElements.forEach(el => {
        observer.observe(el);
      });
    });

    // Search functionality
    document.querySelector('.search-btn').addEventListener('click', function() {
      const searchValue = document.getElementById('searchDestination').value;
      if (searchValue.trim()) {
        alert(`Searching for destinations: ${searchValue}`);
        // Here you would implement actual search functionality
      }
    });

    // Book Now button functionality
    document.querySelector('.btn-book-now').addEventListener('click', function() {
      alert('Redirecting to booking page...');
      // Here you would redirect to booking page
    });

    // Package view details buttons
    document.querySelectorAll('.btn-package').forEach(button => {
      button.addEventListener('click', function() {
        alert('Redirecting to package details...');
        // Here you would redirect to package details page
      });
    });

    // Enhanced scroll effects for hero elements
    window.addEventListener('scroll', function() {
      const scrolled = window.pageYOffset;
      const parallax = document.querySelector('.hero-section');
      const speed = scrolled * 0.5;

      if (parallax) {
        parallax.style.transform = `translateY(${speed}px)`;
      }
    });
  </script>
</body>
</html>
