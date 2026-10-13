<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>51 Talk - Speaking Mills Learning</title>
    <link rel="icon" type="image/png" href="images/51talk.jpg">


    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* === THEME VARIABLES === */
        :root {
            --brand-yellow: #FFC20E;
            --brand-orange: #FF8800;
            
            /* Light Theme Defaults */
            --bg-main: #FAFAFA;
            --bg-surface: rgba(255, 255, 255, 0.95);
            --bg-solid: #FFFFFF;
            --text-main: #2D2D2D;
            --text-mute: #6c757d;
            --card-shadow: 0 10px 30px rgba(0,0,0,0.04);
            --hero-gradient: linear-gradient(135deg, #FFFDF8 0%, #FFF4D6 100%);
            --input-bg: #F8FAFC;
            --border-color: #E2E8F0;
            --map-bg: #FFFDF8;
        }

        /* Dark Theme Overrides */
        [data-theme="dark"] {
            --bg-main: #121212;
            --bg-surface: rgba(30, 30, 30, 0.95);
            --bg-solid: #1E1E1E;
            --text-main: #F0F0F0;
            --text-mute: #A0A0A0;
            --card-shadow: 0 15px 35px rgba(0,0,0,0.3);
            --hero-gradient: linear-gradient(135deg, #1A150B 0%, #2A2111 100%);
            --input-bg: #2D2D2D;
            --border-color: #444444;
            --map-bg: #2A2A2A;
        }

        /* === GLOBAL STYLES === */
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-main);
            transition: background-color 0.4s ease, color 0.4s ease;
            overflow-x: hidden;
        }

        .text-main { color: var(--text-main) !important; }
        .text-muted-custom { color: var(--text-mute) !important; }
        .bg-surface { background-color: var(--bg-solid) !important; }

        /* === NAVBAR === */
        .navbar {
            background-color: var(--bg-surface);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            transition: background-color 0.4s ease;
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--text-main) !important;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }
        .brand-highlight { color: var(--brand-orange); }

        .nav-link {
            font-weight: 500;
            color: var(--text-main) !important;
            transition: 0.3s;
        }
        .nav-link:hover { color: var(--brand-orange) !important; }

        /* === THEME TOGGLE BUTTON === */
        .theme-toggle-btn {
            background-color: transparent;
            border: 1px solid var(--border-color);
            border-radius: 50%;
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }

        [data-theme="light"] .theme-toggle-btn i { color: #2D2D2D; }
        [data-theme="dark"] .theme-toggle-btn i { color: var(--brand-yellow); }

        @media (hover: hover) {
            .theme-toggle-btn:hover {
                background-color: var(--border-color);
                transform: translateY(-2px);
            }
        }

        /* === BUTTONS & LOADING STATE === */
        .btn-primary {
            background-color: var(--brand-yellow);
            border-color: var(--brand-yellow);
            color: #2D2D2D !important;
            border-radius: 25px; 
            padding: 10px 28px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 194, 14, 0.3);
            position: relative;
        }

        .btn-primary:hover {
            background-color: var(--brand-orange);
            border-color: var(--brand-orange);
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 136, 0, 0.4);
        }

        .btn-outline-primary {
            color: var(--text-main) !important;
            border: 2px solid var(--brand-yellow);
            border-radius: 25px;
            padding: 8px 25px;
            font-weight: 600;
            background: transparent;
            transition: all 0.3s ease;
            position: relative;
        }

        .btn-outline-primary:hover {
            background-color: var(--brand-yellow);
            color: #2D2D2D !important;
        }

        .btn .spinner-border {
            width: 1.15rem;
            height: 1.15rem;
            border: 0.18em solid currentColor;
            border-right-color: transparent !important;
            border-radius: 50%;
            display: inline-block;
            vertical-align: -0.15em;
            animation: spinner-border 0.75s linear infinite;
        }

        /* === HERO SECTION === */
        .hero-section {
            padding: 120px 0 100px;
            background: var(--hero-gradient);
            border-bottom-left-radius: 60px;
            border-bottom-right-radius: 60px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        @media (max-width: 991.98px) {
            .hero-section {
                padding: 24px 0 50px;
            }
        }

        .text-highlight { color: var(--brand-orange); }

        .badge-custom {
            background-color: var(--bg-solid);
            color: var(--brand-orange);
            border: 2px solid var(--brand-yellow);
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(255, 194, 14, 0.15);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('images/speaking.png') center center no-repeat; 
            background-size: 500px; 
            filter: blur(2px); 
            transform: scale(1.05); 
            z-index: -2;
            opacity: 0.5;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            transition: background 0.4s ease;
        }

        [data-theme="light"] .hero-section::after { background: rgba(255, 255, 255, 0.85); }
        [data-theme="dark"] .hero-section::after { background: rgba(26, 21, 11, 0.85); }

        /* === CARDS & SECTIONS === */
        .card {
            border: none;
            border-radius: 20px;
            background-color: var(--bg-solid);
            box-shadow: var(--card-shadow);
            transition: all 0.4s ease;
            border-bottom: 4px solid transparent;
            color: var(--text-main);
        }

        .card:hover {
            transform: translateY(-8px);
            border-bottom: 4px solid var(--brand-yellow);
        }

        .feature-icon-box {
            font-size: 2rem;
            color: var(--brand-orange);
            background: rgba(255, 194, 14, 0.1);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .check-list-icon {
            color: var(--brand-orange);
            font-size: 1.2rem;
            margin-right: 10px;
        }

        .icon-circle {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--brand-yellow) 0%, var(--brand-orange) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 8px 20px rgba(255, 194, 14, 0.3);
        }

        /* === LOCATION === */
        .location-section {
            background-color: var(--bg-main);
            padding: 100px 0;
        }

        .emoji-art {
            width: 100%;
            max-width: 500px;
            aspect-ratio: 5 / 4;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            margin: 0 auto;
        }
        .emoji-art img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #map-placeholder {
            height: 350px;
            background: var(--map-bg);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border: 2px dashed var(--brand-yellow);
        }

        /* === MODALS & FORMS === */
        .modal-content {
            border-radius: 24px;
            border: none;
            background-color: var(--bg-solid);
            color: var(--text-main);
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }

        [data-theme="dark"] .modal-header .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        .form-control {
            padding: 14px 18px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            background-color: var(--input-bg);
            color: var(--text-main);
            transition: all 0.3s;
        }
        .form-control::placeholder { color: var(--text-mute); opacity: 0.7; }
        .form-control:focus {
            border-color: var(--brand-yellow);
            box-shadow: 0 0 0 4px rgba(255, 194, 14, 0.15);
            background-color: var(--bg-solid);
            color: var(--text-main);
        }

        /* === FOOTER === */
        .footer {
            background: #1A1A1A;
            color: #FFFFFF !important;
            padding: 60px 0 30px;
        }
        .footer p {
            color: #FFFFFF !important;
            opacity: 1 !important;
            font-weight: 400;
        }

        /* === SCROLL ANIMATIONS === */
        .reveal {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.6s cubic-bezier(0.5, 0, 0, 1);
        }

        .reveal.animate {
            opacity: 0;
            transform: translateY(30px);
        }

        .reveal.animate.active {
            opacity: 1;
            transform: translateY(0);
        }
        .delay-1 { transition-delay: 0.1s; }
        .delay-2 { transition-delay: 0.2s; }
        .delay-3 { transition-delay: 0.3s; }

        /* === BRANDING FIX === */
        .navbar .container {
            flex-wrap: nowrap !important;
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            white-space: nowrap;
            text-decoration: none;
            max-width: calc(100% - 100px); 
            overflow: hidden; 
            margin-right: auto !important;
        }

        .brand-logo {
            width: clamp(22px, 3.5vw, 30px);
            height: clamp(22px, 3.5vw, 30px);
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand-text-main {
            font-size: clamp(0.75rem, 2.5vw, 1.2rem);
            font-weight: 800;
            color: var(--text-main);
            line-height: 1;
            flex-shrink: 0;
        }

        .brand-text-sub {
            font-size: clamp(1.05rem, 4vw, 1.9rem);
            font-weight: 800;
            color: var(--brand-orange);
            line-height: 1;
            letter-spacing: -0.4px;
            overflow: hidden;
            text-overflow: ellipsis; 
            flex-shrink: 0;
        }

        @media (max-width: 991.98px) {
            .navbar {
                position: sticky !important; 
                top: 0;
                z-index: 1040;
                padding: 12px 0; 
                background-color: var(--bg-solid, #1a1a1a);
            }

            .navbar-collapse {
                position: absolute;
                top: 100%;
                right: 15px;
                width: 260px;
                background-color: var(--bg-solid, #1a1a1a);
                padding: 24px 20px;
                border-radius: 16px;
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                z-index: 1050;
            }

            .navbar-nav {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 16px;
            }

            .navbar-nav .nav-item {
                width: 100%;
                text-align: center;
            }

            .d-lg-none.gap-2 {
                position: static !important;
                transform: none !important;
                background: transparent !important;
                margin-left: auto;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="images/speaking.png" alt="Profile" class="rounded-circle me-1 me-sm-2 brand-logo">
            <span class="brand-text-main">51Talk</span>
            <span class="brand-text-sub ms-1">Speaking Mills Learning Center</span>
        </a>
        
        <div class="d-flex align-items-center d-lg-none gap-2 ms-auto">
            <button id="themeToggleMobile" class="theme-toggle-btn" aria-label="Toggle Dark Mode">
                <i class="bi bi-moon-stars-fill" id="themeIconMobile"></i>
            </button>
            <button class="navbar-toggler border-0 text-main px-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list fs-1"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item w-100 w-lg-auto"><a class="nav-link px-3" href="admin/dashboard.php">Home</a></li>
                <!-- <li class="nav-item w-100 w-lg-auto"><a class="nav-link px-3" href="#home">Home</a></li> -->
                <li class="nav-item w-100 w-lg-auto"><a class="nav-link px-3" href="#benefits">Why Us</a></li>
                <li class="nav-item w-100 w-lg-auto"><a class="nav-link px-3" href="#services">Careers</a></li>
                <li class="nav-item w-100 w-lg-auto"><a class="nav-link px-3" href="#location">Location</a></li>

                <li class="nav-item ms-lg-3 d-none d-lg-block">
                    <button id="themeToggleDesktop" class="theme-toggle-btn" title="Toggle Theme">
                        <i class="bi bi-moon-stars-fill" id="themeIconDesktop"></i>
                    </button>
                </li>

                <li class="nav-item ms-lg-4 mt-3 mt-lg-0 w-100 w-lg-auto px-1 px-lg-0">
                    <button class="btn btn-outline-primary w-100" data-modal-target="#loginModal">Log In</button>
                </li>
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0 w-100 w-lg-auto px-1 px-lg-0 mb-1 mb-lg-0">
                    <button class="btn btn-primary w-100" data-modal-target="#registerModal">Apply Now</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 pe-lg-5 reveal">
                <div class="badge badge-custom rounded-pill px-4 py-2 mb-4 d-inline-block">
                    <i class="bi bi-stars me-1"></i> Now Hiring ESL Teachers
                </div>
                <h1 class="display-4 fw-bold mb-4 text-main">
                    Inspire the World.<br>Start Your <span class="text-highlight">Teaching Journey</span> Today.
                </h1>
                <p class="lead text-muted-custom mb-5">
                    Join our elite network of online teaching professionals. Earn from home, set your own schedule, and make a global impact by connecting with highly motivated learners.
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <button class="btn btn-primary btn-lg px-4" data-modal-target="#registerModal">Start Application <i class="bi bi-arrow-right ms-2"></i></button>
                    <a href="#services" class="btn btn-outline-primary btn-lg px-4">View Roles</a>
                </div>
            </div>

            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <div class="emoji-art">
                    <img src="images/51offer.jpg" alt="Online Teaching Scene">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Us Section -->
<section class="container py-5 mt-5" id="benefits">
    <div class="text-center mb-5 reveal">
        <h2 class="fw-bold text-main">Why Teach With Us?</h2>
        <p class="text-muted-custom">Empowering educators with the best tools, flexibility, and support.</p>
    </div>
    
    <div class="row g-4">
        <div class="col-lg-4 col-md-6 reveal delay-1">
            <div class="card h-100 p-4 border-0 shadow-sm">
                <div class="d-flex align-items-center mb-3">
                    <div class="feature-icon-box me-3">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <h5 class="fw-bold text-main mb-0">Total Flexibility</h5>
                </div>
                <ul class="list-unstyled text-muted-custom mb-0 ps-1">
                    <li class="mb-2 d-flex align-items-center"><i class="bi bi-check-circle-fill check-list-icon"></i> Be your own boss</li>
                    <li class="mb-2 d-flex align-items-center"><i class="bi bi-check-circle-fill check-list-icon"></i> Choose your working hours</li>
                    <li class="d-flex align-items-center"><i class="bi bi-check-circle-fill check-list-icon"></i> Work from anywhere globally</li>
                </ul>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 reveal delay-2">
            <div class="card h-100 p-4 border-0 shadow-sm">
                <div class="d-flex align-items-center mb-3">
                    <div class="feature-icon-box me-3">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <h5 class="fw-bold text-main mb-0">Competitive Pay</h5>
                </div>
                <ul class="list-unstyled text-muted-custom mb-0 ps-1">
                    <li class="mb-2 d-flex align-items-center"><i class="bi bi-check-circle-fill check-list-icon"></i> High base rates per class</li>
                    <li class="mb-2 d-flex align-items-center"><i class="bi bi-check-circle-fill check-list-icon"></i> Performance-based bonuses</li>
                    <li class="d-flex align-items-center"><i class="bi bi-check-circle-fill check-list-icon"></i> Reliable, on-time payments</li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 reveal delay-3">
            <div class="card h-100 p-4 border-0 shadow-sm">
                <div class="d-flex align-items-center mb-3">
                    <div class="feature-icon-box me-3">
                        <i class="bi bi-journal-check"></i>
                    </div>
                    <h5 class="fw-bold text-main mb-0">Ready Materials</h5>
                </div>
                <ul class="list-unstyled text-muted-custom mb-0 ps-1">
                    <li class="mb-2 d-flex align-items-center"><i class="bi bi-check-circle-fill check-list-icon"></i> Zero lesson planning required</li>
                    <li class="mb-2 d-flex align-items-center"><i class="bi bi-check-circle-fill check-list-icon"></i> Interactive curriculum provided</li>
                    <li class="d-flex align-items-center"><i class="bi bi-check-circle-fill check-list-icon"></i> Ongoing professional training</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Careers Section -->
<section class="bg-surface py-5 mt-4" id="services">
    <div class="container py-5">
        <div class="text-center mb-5 reveal">
            <h2 class="fw-bold text-main">Explore Our Opportunities</h2>
            <p class="text-muted-custom">Discover the perfect role for you at Speaking Mills.</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 reveal delay-1">
                <div class="card h-100 p-4 text-center text-md-start">
                    <div class="icon-circle mx-auto mx-md-0">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <h5 class="fw-bold">Fulltime Online Teacher</h5>
                    <p class="text-muted-custom small mb-0">Must be a college graduate with excellent English proficiency. Ready to teach motivated learners globally.</p>
                </div>
            </div>
            
            <div class="col-md-4 reveal delay-2">
                <div class="card h-100 p-4 text-center text-md-start">
                    <div class="icon-circle mx-auto mx-md-0" style="background: linear-gradient(135deg, #FF9500 0%, #FF5E00 100%);">
                        <i class="bi bi-mic"></i>
                    </div>
                    <h5 class="fw-bold">Kids English Tutor</h5>
                    <p class="text-muted-custom small mb-0">Bring energy and fun to the virtual classroom! Perfect for dynamic teachers who love interacting with young learners.</p>
                </div>
            </div>

            <div class="col-md-4 reveal delay-3">
                <div class="card h-100 p-4 text-center text-md-start">
                    <div class="icon-circle mx-auto mx-md-0" style="background: linear-gradient(135deg, #2D2D2D 0%, #525252 100%);">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <h5 class="fw-bold">Business English</h5>
                    <p class="text-muted-custom small mb-0">Help adult professionals elevate their career through advanced English conversation and business terminology.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="location-section" id="location">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 reveal">
                <div id="map-placeholder" class="p-4 text-center">
                    <div class="display-1 mb-3">🏢</div>
                    <h4 class="fw-bold text-main">Our Physical Center</h4>
                    <p class="text-muted-custom px-lg-4">We are located in the heart of the business district for training and onboarding.</p>
                    <div class="mt-2 text-highlight fw-bold bg-surface px-4 py-2 rounded-pill shadow-sm d-inline-block">
                        Purok Rose, Poblacion Tampilisan, ZN
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5 reveal delay-2">
                <h2 class="fw-bold mb-5 text-main">Visit Our Hub</h2>
                
                <div class="d-flex mb-4 align-items-start">
                    <div class="me-4 fs-2 text-highlight"><i class="bi bi-geo-alt-fill"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1 text-main">Headquarters</h5>
                        <p class="text-muted-custom">Poblacion, Tampilisan<br>Zamboanga del Norte, Philippines</p>
                    </div>
                </div>
                
                <div class="d-flex mb-4 align-items-start">
                    <div class="me-4 fs-2 text-highlight"><i class="bi bi-clock-fill"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1 text-main">Operating Hours</h5>
                        <p class="text-muted-custom">Open 24/7<br>Applicants may drop by anytime for walk-in inquiries.</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-start">
                    <div class="me-4 fs-2 text-highlight"><i class="bi bi-telephone-fill"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1 text-main">Contact Support</h5>
                        <p class="text-muted-custom">+63 9XX XXX XXXX<br>hiring@speakingmills.example</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 p-md-4">
            <div class="modal-header border-0 pb-0">
                <div>
                    <h3 class="fw-bold mb-1 text-main">Welcome Back 👋</h3>
                    <p class="text-muted-custom mb-0">Sign in to your teacher portal.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="loginForm" action="#" method="POST">
                    <div class="mb-4 mt-2">
                        <label class="form-label fw-medium">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="teacher@example.com" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-medium">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>

                    <div class="mb-4 form-check d-flex justify-content-between align-items-center">
                        <div>
                            <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                            <label class="form-check-label text-muted-custom small" for="rememberMe">Remember me</label>
                        </div>
                        <a href="#" class="text-highlight text-decoration-none small fw-semibold">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 mb-3 text-uppercase">
                        Sign In
                    </button>
                </form>

                <div class="text-center mt-3">
                    <p class="text-muted-custom">
                        Don't have an account? 
                        <a href="#" class="text-highlight fw-bold text-decoration-none" data-modal-target="#registerModal" data-bs-dismiss="modal">
                            Apply Now
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p-3 p-md-4">
            <div class="modal-header border-0 pb-0 mb-3">
                <div>
                    <h3 class="fw-bold mb-1 text-main">Start Your Application 🚀</h3>
                    <p class="text-muted-custom mb-0">Join our community of global educators.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="registerForm" action="#" method="POST">
                    <input type="hidden" name="user_id" value="1000000000">

                    <div class="row g-3">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">First Name</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Middle Name</label>
                            <input type="text" name="middlename" class="form-control" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-medium">Last Name</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-medium">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="youremail@example.com" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-medium">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-medium">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-check mb-4 mt-2">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label text-muted-custom small" for="terms">
                            I agree to the <a href="#" class="text-highlight text-decoration-none">Terms & Conditions</a>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 mb-3 text-uppercase">
                        Submit Application
                    </button>
                </form>

                <div class="text-center mt-2">
                    <p class="text-muted-custom">
                        Already registered? 
                        <a href="#" class="text-highlight fw-bold text-decoration-none" data-modal-target="#loginModal" data-bs-dismiss="modal">
                            Sign In
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container text-center">
        <p class="mb-0">&copy; 2026 51Talk - Speaking Mills Learning Center. All rights reserved.</p>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Theme Toggle Functionality
    const htmlEl = document.documentElement;
    const themeBtnDesktop = document.getElementById('themeToggleDesktop');
    const themeBtnMobile = document.getElementById('themeToggleMobile');
    const themeIconDesktop = document.getElementById('themeIconDesktop');
    const themeIconMobile = document.getElementById('themeIconMobile');

    function toggleTheme() {
        const currentTheme = htmlEl.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        htmlEl.setAttribute('data-theme', newTheme);
        
        const iconClass = newTheme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
        if (themeIconDesktop) themeIconDesktop.className = iconClass;
        if (themeIconMobile) themeIconMobile.className = iconClass;
    }

    if (themeBtnDesktop) themeBtnDesktop.addEventListener('click', toggleTheme);
    if (themeBtnMobile) themeBtnMobile.addEventListener('click', toggleTheme);

    // Mobile Auto-Close on Link Click & Click Outside
    document.addEventListener('DOMContentLoaded', function () {
        const navbarCollapse = document.getElementById('navbarNav');
        const togglerBtn = document.querySelector('.navbar-toggler');

        if (navbarCollapse) {
            const closeNavbar = () => {
                if (navbarCollapse.classList.contains('show')) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse) || new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            };

            const menuItems = navbarCollapse.querySelectorAll('.nav-link, .btn');
            menuItems.forEach(item => {
                item.addEventListener('click', closeNavbar);
            });

            document.addEventListener('click', function (event) {
                const isClickInsideMenu = navbarCollapse.contains(event.target);
                const isClickOnToggler = togglerBtn && togglerBtn.contains(event.target);

                if (!isClickInsideMenu && !isClickOnToggler && navbarCollapse.classList.contains('show')) {
                    closeNavbar();
                }
            });
        }
    });

    // Global Interactive Button Loading Animation Handler
    document.addEventListener('DOMContentLoaded', function () {
        const setBtnLoading = (btn, text = '') => {
            if (btn.dataset.isLoading === 'true') return;
            btn.dataset.isLoading = 'true';
            btn.dataset.origContent = btn.innerHTML;
            btn.style.minWidth = `${btn.offsetWidth}px`;
            btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>${text}`;
            btn.style.pointerEvents = 'none';
        };

        const resetBtnLoading = (btn) => {
            if (btn.dataset.isLoading !== 'true') return;
            btn.innerHTML = btn.dataset.origContent;
            btn.style.minWidth = '';
            btn.style.pointerEvents = '';
            delete btn.dataset.isLoading;
            delete btn.dataset.origContent;
        };

        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                if (this.classList.contains('btn-close') || this.classList.contains('theme-toggle-btn')) return;

                const form = this.closest('form');
                const modalTarget = this.getAttribute('data-modal-target');

                if (this.type === 'submit' && form) {
                    if (!form.checkValidity()) {
                        form.reportValidity();
                        return;
                    }

                    e.preventDefault();
                    setBtnLoading(this, 'Processing...');

                    setTimeout(() => {
                        resetBtnLoading(this);

                        const openModalEl = this.closest('.modal');
                        if (openModalEl) {
                            const modalInstance = bootstrap.Modal.getInstance(openModalEl);
                            if (modalInstance) modalInstance.hide();
                        }

                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your submission was successful.',
                            confirmButtonColor: '#FF8800'
                        });

                        form.reset();
                    }, 1200);
                    return;
                }

                if (modalTarget) {
                    e.preventDefault();
                    setBtnLoading(this, 'Loading...');

                    setTimeout(() => {
                        resetBtnLoading(this);
                        const targetModal = document.querySelector(modalTarget);
                        if (targetModal) {
                            const bsModal = bootstrap.Modal.getOrCreateInstance(targetModal);
                            bsModal.show();
                        }
                    }, 400);
                    return;
                }

                if (!this.dataset.isLoading && !this.hasAttribute('data-bs-dismiss')) {
                    setBtnLoading(this);
                    setTimeout(() => resetBtnLoading(this), 500);
                }
            });
        });
    });

    // Scroll Reveal Animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>

</body>
</html>
