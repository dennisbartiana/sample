

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
        <h3 class="fw-bold mb-1 text-main">Applicant Directory</h3>
        <p class="text-muted-custom mb-0">Manage and monitor all applicant teachers.</p>
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

<?php include 'includes/applicant-cards.php'?>

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
                     <button class="btn-action me-1 btn-schedule-modal" 
                            data-name="Elena Rostova" 
                            data-id="51T-8924" 
                            data-avatar="https://i.pravatar.cc/100?img=12"
                            data-role="Kids ESL Applicant"
                            title="Schedule Session"> 
                        <i class="bi bi-calendar-plus"></i>
                    </button>
                    <button class="btn-action me-1" title="View Profile"><i class="bi bi-eye"></i></button>
                    <button class="btn-action me-1" title="Message"><i class="bi bi-chat-dots"></i></button>
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
                    <!-- Inside DataTables <td> Action column -->
                    <button class="btn-action me-1 btn-schedule-modal" 
                            data-name="Elena Rostova" 
                            data-id="51T-8924" 
                            data-avatar="https://i.pravatar.cc/100?img=12"
                            data-role="Kids ESL Applicant"
                            title="Schedule Session">
                        <i class="bi bi-calendar-plus"></i>
                    </button>
                    <button class="btn-action me-1" title="View Profile"><i class="bi bi-eye"></i></button>
                    <button class="btn-action me-1" title="Message"><i class="bi bi-chat-dots"></i></button>
                    <button class="btn-action" title="More Options"><i class="bi bi-three-dots-vertical"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

    
   <?php include 'modal/set-schedule.php'?>
   <?php include 'includes/footer.php'?>
</main>


<?php include 'includes/javascript.php'?>

</body>
</html>