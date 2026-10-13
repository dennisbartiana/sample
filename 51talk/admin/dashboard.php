

<?php include 'includes/header.php'?>
<body>
<?php include 'includes/preloader.php'?>
<?php include 'includes/sidebar.php'?>

<?php include 'includes/navbar.php'?>

<!-- Main Admin Panel Content -->
<main class="admin-main">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h3 class="fw-bold mb-1 text-main">Welcome back, Admin 👋</h3>
            <p class="text-muted-custom mb-0">Here is what's happening at Speaking Mills Learning Center today.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-custom btn-sm rounded-pill px-3" id="refreshDataBtn">
                <i class="bi bi-arrow-clockwise me-1"></i> Refresh
            </button>
            <button class="btn btn-brand btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#quickNoticeModal">
                <i class="bi bi-plus-lg me-1"></i> Post Announcement
            </button>
        </div>
    </div>


    

    <!-- Metric KPI Cards Row -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom p-3">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="metric-icon-box metric-icon-blue"><i class="bi bi-people-fill"></i></div>
                    <span class="trend-badge trend-up"><i class="bi bi-arrow-up-short"></i> +18%</span>
                </div>
                <h3 class="fw-bold mb-1 text-main">1,248</h3>
                <span class="text-muted-custom small">Total Applicants</span>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom p-3">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="metric-icon-box metric-icon-yellow"><i class="bi bi-person-badge-fill"></i></div>
                    <span class="trend-badge trend-up"><i class="bi bi-arrow-up-short"></i> +8%</span>
                </div>
                <h3 class="fw-bold mb-1 text-main">342</h3>
                <span class="text-muted-custom small">Active Teachers</span>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom p-3">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="metric-icon-box metric-icon-green"><i class="bi bi-journal-check"></i></div>
                    <span class="trend-badge trend-up"><i class="bi bi-arrow-up-short"></i> +24%</span>
                </div>
                <h3 class="fw-bold mb-1 text-main">8,910</h3>
                <span class="text-muted-custom small">Classes Completed</span>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom p-3">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="metric-icon-box metric-icon-purple"><i class="bi bi-wallet2"></i></div>
                    <span class="trend-badge trend-down"><i class="bi bi-arrow-down-short"></i> -2%</span>
                </div>
                <h3 class="fw-bold mb-1 text-main">₱845,200</h3>
                <span class="text-muted-custom small">Monthly Payouts</span>
            </div>
        </div>
    </div>

    <!-- Chart & Analytics Row -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-8">
            <div class="card-custom p-4 h-100">
                <h5 class="fw-bold mb-3 text-main">Application & Class Volume</h5>
                <div style="height: 280px; position: relative;">
                    <canvas id="analyticsChart"></canvas>
                </div>
            </div>
        </div>

        
        <div class="col-12 col-lg-4">
            <div class="card-custom p-4 h-100">
                <h5 class="fw-bold mb-3 text-main">Teacher Specialization</h5>
                <div style="height: 200px; position: relative;" class="mb-3">
                    <canvas id="distributionChart"></canvas>
                </div>
            </div>
        </div>


    </div>

    <!-- Data Table Section -->
    <div class="card-custom p-4">
        <div class="table-responsive">
            <table class="table table-custom align-middle mb-0">
                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Applied Role</th>
                        <th>Date Submitted</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://i.pravatar.cc/100?img=12" class="rounded-circle me-3" width="36" height="36" alt="Applicant">
                                <div><div class="fw-semibold text-main">Elena Rostova</div></div>
                            </div>
                        </td>
                        <td class="text-main fw-medium">Kids English Tutor</td>
                        <td class="text-muted-custom small">Sep 28, 2026</td>
                        <td><span class="status-badge status-pending">Pending Review</span></td>
                        <td class="text-end">
                            <button class="btn-action me-1 approve-btn"><i class="bi bi-check-lg text-success"></i></button>
                            <button class="btn-action me-1 reject-btn"><i class="bi bi-x-lg text-danger"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

   <?php include 'includes/footer.php'?>
</main>


<?php include 'includes/javascript.php'?>

</body>
</html>