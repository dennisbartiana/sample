

<?php include 'includes/header.php'?>
<body>
<?php include 'includes/preloader.php'?>
<?php include 'includes/sidebar.php'?>

<?php include 'includes/navbar.php'?>

<!-- Main Admin Panel Content -->
<main class="admin-main">
   
<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
    <div>
        <h3 class="fw-bold mb-1 text-main">Teachers Directory</h3>
        <p class="text-muted-custom mb-0">Manage and monitor all active teachers.</p>
    </div>
    
    <div class="d-flex gap-2">
        <button class="btn btn-outline-custom btn-sm rounded-pill px-3">
            <i class="bi bi-download me-1"></i> Export
        </button>
        <button class="btn btn-brand btn-sm rounded-pill px-3">
            <i class="bi bi-person-plus-fill me-1"></i> Add Teacher
        </button>
    </div>
</div>


<!-- Metric KPI Cards Row -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <a href="all-applicant.php" class="text-decoration-none">
                <div class="card-custom p-3">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="metric-icon-box metric-icon-blue">
                            <i class="bi bi-people-fill"></i>
                        </div>

                        <span class="trend-badge trend-up">
                            <i class="bi bi-arrow-up-short"></i> +18%
                        </span>
                    </div>

                    <h3 class="fw-bold mb-1 text-main">1,248</h3>
                    <span class="text-muted-custom small">All Applicants</span>
                </div>
            </a>
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

<!-- DataTables Card -->
<div class="card-custom p-4 mb-4">
    <table id="example1" class="table table-custom align-middle w-100">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>Teacher ID</th>
                <th>Specialization</th>
                <th>Rating</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/100?img=12" class="rounded-circle me-3" width="40" height="40" style="object-fit:cover; border:2px solid var(--border-color);" alt="Teacher">
                        <div>
                            <div class="fw-semibold text-main mb-0">Elena Rostova</div>
                            <div class="text-muted-custom" style="font-size: 0.75rem;">elena@example.com</div>
                        </div>
                    </div>
                </td>
                <td class="text-main fw-medium">51T-8924</td>
                <td><span class="skill-tag mb-0">Kids ESL</span></td>
                <td>
                    <div class="d-flex align-items-center text-warning" style="font-size: 0.85rem;">
                        <i class="bi bi-star-fill me-1"></i> 4.9 <span class="text-muted-custom ms-1">(340)</span>
                    </div>
                </td>
                <td><span class="status-badge status-approved">Active</span></td>
                <td class="text-end">
                    <a href="profile-teacher.php" class="btn-action me-1" title="View Profile"><i class="bi bi-eye"></i></a>
                    <button class="btn btn-outline-primary btn-sm rounded-circle p-2 btn-teacher-chat" 
                            data-teacher-id="t1" 
                            data-teacher-name="Elena R." 
                            data-teacher-role="ESL & Phonics Specialist" 
                            data-teacher-avatar="https://i.pravatar.cc/150?img=47"
                            title="Chat with Elena R.">
                        <i class="bi bi-chat-dots-fill"></i>
                    </button>
                    <button class="btn-action" title="More Options"><i class="bi bi-three-dots-vertical"></i></button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/100?img=33" class="rounded-circle me-3" width="40" height="40" style="object-fit:cover; border:2px solid var(--border-color);" alt="Teacher">
                        <div>
                            <div class="fw-semibold text-main mb-0">Mark Reyes</div>
                            <div class="text-muted-custom" style="font-size: 0.75rem;">mark.reyes@example.com</div>
                        </div>
                    </div>
                </td>
                <td class="text-main fw-medium">51T-7731</td>
                <td><span class="skill-tag mb-0">Business English</span></td>
                <td>
                    <div class="d-flex align-items-center text-warning" style="font-size: 0.85rem;">
                        <i class="bi bi-star-fill me-1"></i> 4.7 <span class="text-muted-custom ms-1">(182)</span>
                    </div>
                </td>
                <td><span class="status-badge status-pending" style="color: #d63384; background: rgba(214, 51, 132, 0.15);">On Leave</span></td>
                <td class="text-end">
                    <a href="profile-teacher.php" class="btn-action me-1" title="View Profile"><i class="bi bi-eye"></i></a>
                    <button class="btn btn-outline-primary btn-sm rounded-circle p-2 btn-teacher-chat" 
                            data-teacher-id="t1" 
                            data-teacher-name="Elena R." 
                            data-teacher-role="ESL & Phonics Specialist" 
                            data-teacher-avatar="https://i.pravatar.cc/150?img=47"
                            title="Chat with Elena R.">
                        <i class="bi bi-chat-dots-fill"></i>
                    </button>
                    <button class="btn-action" title="More Options"><i class="bi bi-three-dots-vertical"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

    
   <?php include 'modal/chat-bubble.php'?>
   <?php include 'includes/footer.php'?>
</main>


<?php include 'includes/javascript.php'?>

</body>
</html>