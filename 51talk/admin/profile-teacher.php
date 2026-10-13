

<?php include 'includes/header.php'?>
<body>
<?php include 'includes/preloader.php'?>
<?php include 'includes/sidebar.php'?>

<?php include 'includes/navbar.php'?>

<!-- Main Admin Panel Content -->
<main class="admin-main">
   
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-sm btn-outline-custom rounded-circle" title="Back to Teachers">
            <i class="bi bi-arrow-left"></i>
        </button>
        <h3 class="fw-bold mb-0 text-main">Teacher Profile</h3>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-danger btn-sm rounded-pill px-3">
            <i class="bi bi-pause-circle me-1"></i> Suspend
        </button>
        <button class="btn btn-brand btn-sm rounded-pill px-3">
            <i class="bi bi-pencil-square me-1"></i> Edit Profile
        </button>
    </div>
</div>

<!-- Main Profile Card -->
<div class="card-custom mb-4">
    <!-- Cover & Avatar -->
    <div class="profile-cover">
        <div class="profile-avatar-wrapper">
            <img src="https://i.pravatar.cc/150?img=12" class="profile-avatar" alt="Elena Rostova">
        </div>
    </div>
    
    <!-- Header Details -->
    <div class="profile-header-info">
        <div>
            <h4 class="fw-bold text-main mb-1">Elena Rostova <i class="bi bi-patch-check-fill text-brand-blue ms-1" title="Verified"></i></h4>
            <div class="text-muted-custom small mb-2">Senior Kids ESL Tutor • ID: 51T-8924</div>
            <span class="status-badge status-approved"><i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i> Active</span>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-custom btn-sm rounded-pill px-3"><i class="bi bi-chat-dots me-1"></i> Message</button>
            <button class="btn btn-outline-custom btn-sm rounded-pill px-3"><i class="bi bi-envelope me-1"></i> Email</button>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs-custom" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">Overview</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="classes-tab" data-bs-toggle="tab" data-bs-target="#classes" type="button" role="tab">Classes & Schedule</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="payroll-tab" data-bs-toggle="tab" data-bs-target="#payroll" type="button" role="tab">Seminars</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab">Documents</button>
        </li>
    </ul>
</div>

<!-- Tab Content Area -->
<div class="tab-content" id="profileTabsContent">
    <!-- OVERVIEW TAB -->
    <div class="tab-pane fade show active" id="overview" role="tabpanel">
        
        <!-- KPI Row -->
        <!-- <div class="row g-3 mb-4">
            <div class="col-12 col-md-4">
                <div class="card-custom p-3 text-center h-100">
                    <h2 class="fw-bold text-main mb-0">4.9 <span class="text-warning fs-5"><i class="bi bi-star-fill"></i></span></h2>
                    <span class="text-muted-custom small">Average Rating (340 reviews)</span>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card-custom p-3 text-center h-100">
                    <h2 class="fw-bold text-main mb-0">1,248</h2>
                    <span class="text-muted-custom small">Total Classes Taught</span>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card-custom p-3 text-center h-100">
                    <h2 class="fw-bold text-main mb-0 text-success">99.2%</h2>
                    <span class="text-muted-custom small">Attendance Rate</span>
                </div>
            </div>
        </div> -->

        <div class="row g-4">
            <!-- Left Column: Personal & Tech -->
            <div class="col-12 col-lg-5">
                <!-- Contact Information -->
                <div class="card-custom p-4 mb-4">
                    <h6 class="fw-bold text-main mb-3">Contact Information</h6>
                    <ul class="info-list">
                        <li>
                            <span class="info-label"><i class="bi bi-envelope"></i> Email</span>
                            <span class="info-value">elena.rostova@example.com</span>
                        </li>
                        <li>
                            <span class="info-label"><i class="bi bi-telephone"></i> Phone</span>
                            <span class="info-value">+63 917 123 4567</span>
                        </li>
                        <li>
                            <span class="info-label"><i class="bi bi-geo-alt"></i> Location</span>
                            <span class="info-value">Cebu City, Philippines</span>
                        </li>
                        <li>
                            <span class="info-label"><i class="bi bi-clock"></i> Timezone</span>
                            <span class="info-value">Asia/Manila (UTC+8)</span>
                        </li>
                    </ul>
                </div>

                <!-- Hardware & Tech Specs -->
                <div class="card-custom p-4">
                    <h6 class="fw-bold text-main mb-3">Technical Specifications</h6>
                    <ul class="info-list">
                        <li>
                            <span class="info-label"><i class="bi bi-laptop"></i> Device</span>
                            <span class="info-value">MacBook Air M1</span>
                        </li>
                        <li>
                            <span class="info-label"><i class="bi bi-wifi"></i> Connection</span>
                            <span class="info-value text-success fw-bold">150 Mbps (Fiber)</span>
                        </li>
                        <li>
                            <span class="info-label"><i class="bi bi-headset"></i> Audio</span>
                            <span class="info-value">Jabra Evolve 20 (Noise Canceling)</span>
                        </li>
                        <li>
                            <span class="info-label"><i class="bi bi-camera-video"></i> Camera</span>
                            <span class="info-value">1080p HD Webcam</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Column: Skills & Bio -->
            <div class="col-12 col-lg-7">
                <!-- Professional Summary -->
                <div class="card-custom p-4 mb-4">
                    <h6 class="fw-bold text-main mb-3">About the Teacher</h6>
                    <p class="text-muted-custom" style="font-size: 0.9rem; line-height: 1.6;">
                        Elena is a dedicated ESL professional with over 4 years of experience teaching young learners. She specializes in phonics and conversational English. Known for her high energy, use of TPR (Total Physical Response), and interactive props, she consistently maintains excellent ratings from parents.
                    </p>
                    
                    <h6 class="fw-bold text-main mb-2 mt-4">Specializations</h6>
                    <div>
                        <span class="skill-tag">Kids ESL (Ages 4-12)</span>
                        <span class="skill-tag">Phonics Master</span>
                        <span class="skill-tag">Free Talk</span>
                        <span class="skill-tag">Exam Prep</span>
                    </div>
                </div>

                <!-- Recent Feedback -->
                <div class="card-custom p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold text-main mb-0">Recent Parent Feedback</h6>
                        <a href="#" class="text-brand-blue text-decoration-none small">View All</a>
                    </div>
                    
                    <div class="p-3 mb-2 rounded-3" style="background-color: var(--input-bg); border: 1px solid var(--border-color);">
                        <div class="d-flex justify-content-between mb-1">
                            <div class="text-warning" style="font-size: 0.8rem;">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <span class="text-muted-custom small" style="font-size: 0.75rem;">Oct 4, 2026</span>
                        </div>
                        <p class="text-main mb-0 small">"Teacher Elena is very patient! My daughter loved the lesson and the songs. Highly recommended."</p>
                    </div>

                    <div class="p-3 rounded-3" style="background-color: var(--input-bg); border: 1px solid var(--border-color);">
                        <div class="d-flex justify-content-between mb-1">
                            <div class="text-warning" style="font-size: 0.8rem;">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <span class="text-muted-custom small" style="font-size: 0.75rem;">Oct 2, 2026</span>
                        </div>
                        <p class="text-main mb-0 small">"Excellent pronunciation correction. She uses great props."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Blank panes for other tabs (Ready for future content) -->
    <div class="tab-pane fade" id="classes" role="tabpanel">
        <div class="card-custom p-5 text-center text-muted-custom">
<!-- Dynamic Calendar Card Component -->
<div class="calendar-card shadow-sm mb-4">
    <!-- Navigation & Controls Header -->
    <!-- Responsive Navigation & Controls Header -->
<!-- Top Control Header -->
<div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4">
    <div class="d-flex align-items-center gap-3">
        <h4 class="fw-bold text-main mb-0" id="currentMonthLabel">October 2026</h4>
        <div class="btn-group">
            <button class="btn btn-outline-custom btn-sm rounded-start-pill px-3" id="prevMonthBtn" title="Previous Month">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="btn btn-outline-custom btn-sm px-3" id="todayBtn">Today</button>
            <button class="btn btn-outline-custom btn-sm rounded-end-pill px-3" id="nextMonthBtn" title="Next Month">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>

    <!-- <button class="btn btn-brand btn-sm rounded-pill px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#addBookingModal">
        <i class="bi bi-plus-lg me-1"></i> New Booking
    </button> -->
</div>

<!-- Divided Calendar Grid (2 Halves) -->
<div class="row g-4">
    <!-- LEFT HALF: DAYS 1 - 15 -->
    <div class="col-12 col-lg-6">
        <div class="calendar-half-card shadow-sm d-flex flex-column justify-content-between">
            <div>
                <div class="calendar-half-header">
                    <h6 class="fw-bold text-main mb-0">1st Half of Month</h6>
                    <span class="half-badge" id="half1RangeLabel">Days 1 - 15</span>
                </div>

                <!-- Day Headers -->
                <div class="calendar-half-grid mb-2">
                    <div class="calendar-header-day">Sun</div>
                    <div class="calendar-header-day">Mon</div>
                    <div class="calendar-header-day">Tue</div>
                    <div class="calendar-header-day">Wed</div>
                    <div class="calendar-header-day">Thu</div>
                    <div class="calendar-header-day">Fri</div>
                    <div class="calendar-header-day">Sat</div>
                </div>

                <!-- Tiles Container Part 1 -->
                <div class="calendar-half-grid" id="halfGrid1"></div>
            </div>

            <!-- Summary Bar 1st Half -->
            <div class="calendar-half-summary mt-3" id="half1Summary">
                <!-- Dynamically populated via JS -->
            </div>
        </div>
    </div>

    <!-- RIGHT HALF: DAYS 16 - END OF MONTH -->
    <div class="col-12 col-lg-6">
        <div class="calendar-half-card shadow-sm d-flex flex-column justify-content-between">
            <div>
                <div class="calendar-half-header">
                    <h6 class="fw-bold text-main mb-0">2nd Half of Month</h6>
                    <span class="half-badge" id="half2RangeLabel">Days 16 - 31</span>
                </div>

                <!-- Day Headers -->
                <div class="calendar-half-grid mb-2">
                    <div class="calendar-header-day">Sun</div>
                    <div class="calendar-header-day">Mon</div>
                    <div class="calendar-header-day">Tue</div>
                    <div class="calendar-header-day">Wed</div>
                    <div class="calendar-header-day">Thu</div>
                    <div class="calendar-header-day">Fri</div>
                    <div class="calendar-header-day">Sat</div>
                </div>

                <!-- Tiles Container Part 2 -->
                <div class="calendar-half-grid" id="halfGrid2"></div>
            </div>

            <!-- Summary Bar 2nd Half -->
            <div class="calendar-half-summary mt-3" id="half2Summary">
                <!-- Dynamically populated via JS -->
            </div>
        </div>
    </div>
</div>


        </div>
    </div>
    <div class="tab-pane fade" id="payroll" role="tabpanel">
        <div class="card-custom p-5 text-center text-muted-custom">Payroll content goes here</div>
    </div>
    <div class="tab-pane fade" id="documents" role="tabpanel">
        <div class="card-custom p-5 text-center text-muted-custom">Documents content goes here</div>
    </div>
</div>

    
   <?php include 'modal/booking.php'?>
   <?php include 'includes/footer.php'?>
</main>


<?php include 'includes/javascript.php'?>

</body>
</html>