

<?php include 'includes/header.php'?>
<body>
<?php include 'includes/preloader.php'?>
<?php include 'includes/sidebar.php'?>

<?php include 'includes/navbar.php'?>

<!-- Main Admin Panel Content -->
<main class="admin-main">
   
<div class="card-custom chat-container">
    <!-- Left: Contacts Sidebar -->
    <div class="chat-sidebar">
        <div class="chat-search">
            <div class="search-box position-relative w-100">
                <i class="bi bi-search"></i>
                <input type="text" class="form-control" placeholder="Search messages...">
            </div>
        </div>
        <div class="chat-list">
            <!-- Active Contact -->
            <div class="chat-contact active">
                <div class="d-flex align-items-center">
                    <img src="https://i.pravatar.cc/100?img=12" class="rounded-circle me-3 avatar-img" alt="Elena Rostova">
                    <div class="flex-grow-1 overflow-hidden">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="mb-0 fw-semibold text-main text-truncate">Elena Rostova</h6>
                            <span class="text-muted-custom small" style="font-size: 0.7rem;">10:24 AM</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 text-muted-custom text-truncate small">Thanks! I will review the curriculum today.</p>
                            <span class="unread-badge ms-2">2</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inactive Contact -->
            <div class="chat-contact">
                <div class="d-flex align-items-center">
                    <img src="https://i.pravatar.cc/100?img=3" class="rounded-circle me-3 avatar-img" alt="Mark Reyes">
                    <div class="flex-grow-1 overflow-hidden">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="mb-0 fw-semibold text-main text-truncate">Mark Reyes</h6>
                            <span class="text-muted-custom small" style="font-size: 0.7rem;">Yesterday</span>
                        </div>
                        <p class="mb-0 text-muted-custom text-truncate small">Can we reschedule my interview?</p>
                    </div>
                </div>
            </div>
            
            <div class="chat-contact">
                <div class="d-flex align-items-center">
                    <img src="https://i.pravatar.cc/100?img=5" class="rounded-circle me-3 avatar-img" alt="Applicant Support">
                    <div class="flex-grow-1 overflow-hidden">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h6 class="mb-0 fw-semibold text-main text-truncate">IT Support Team</h6>
                            <span class="text-muted-custom small" style="font-size: 0.7rem;">Mon</span>
                        </div>
                        <p class="mb-0 text-muted-custom text-truncate small">System maintenance scheduled for Friday.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Chat Window -->
    <div class="chat-window">
        <!-- Chat Header -->
        <div class="chat-header">
            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-outline-custom me-3 d-md-none rounded-circle">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <img src="https://i.pravatar.cc/100?img=12" class="rounded-circle me-3 avatar-img" alt="Elena Rostova">
                <div>
                    <h6 class="mb-0 fw-bold text-main">Elena Rostova</h6>
                    <span class="text-success small d-flex align-items-center gap-1" style="font-size: 0.75rem;">
                        <span class="badge-dot" style="width:6px;height:6px;background:#198754;border-radius:50%;display:inline-block;"></span> 
                        Online
                    </span>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button class="icon-btn bg-transparent"><i class="bi bi-telephone-fill"></i></button>
                <button class="icon-btn bg-transparent"><i class="bi bi-camera-video-fill"></i></button>
                <button class="icon-btn bg-transparent"><i class="bi bi-info-circle"></i></button>
            </div>
        </div>

        <!-- Chat Body -->
        <div class="chat-body">
            <div class="text-center mb-4">
                <span class="badge bg-secondary bg-opacity-10 text-muted-custom rounded-pill fw-medium px-3 py-1">Today, September 28</span>
            </div>

            <!-- Incoming Message -->
            <div class="msg-wrapper msg-incoming">
                <div class="msg-bubble">
                    Hi Admin, I just submitted my application for the Kids English Tutor role. Could you confirm if you received my demo video?
                </div>
                <span class="msg-time">10:15 AM</span>
            </div>

            <!-- Outgoing Message -->
            <div class="msg-wrapper msg-outgoing">
                <div class="msg-bubble">
                    Hello Elena! Yes, we have received your application and the demo video. Our recruitment team is currently reviewing it.
                </div>
                <span class="msg-time text-end">10:20 AM</span>
            </div>
            
            <!-- Outgoing Message (Follow up) -->
            <div class="msg-wrapper msg-outgoing">
                <div class="msg-bubble">
                    We will get back to you within 24-48 hours regarding the next steps. I am attaching the curriculum guide for your reference in the meantime.
                </div>
                <span class="msg-time text-end">10:21 AM</span>
            </div>

            <!-- Incoming Message -->
            <div class="msg-wrapper msg-incoming">
                <div class="msg-bubble">
                    Thanks! I will review the curriculum today.
                </div>
                <span class="msg-time">10:24 AM</span>
            </div>
        </div>

        <!-- Chat Footer (Input) -->
        <div class="chat-footer">
            <div class="chat-input-box">
                <button class="btn btn-sm text-muted-custom me-2"><i class="bi bi-paperclip fs-5"></i></button>
                <input type="text" placeholder="Type your message here...">
                <button class="btn btn-sm text-muted-custom ms-2"><i class="bi bi-emoji-smile fs-5"></i></button>
                <button class="btn btn-brand btn-sm rounded-circle ms-2" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-send-fill text-white"></i>
                </button>
            </div>
        </div>
    </div>
</div>




    </div>

    

   <?php include 'includes/footer.php'?>
</main>


<?php include 'includes/javascript.php'?>

</body>
</html>