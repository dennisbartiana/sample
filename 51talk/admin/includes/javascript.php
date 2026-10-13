<!-- ==========================================
     CORE JAVASCRIPT: GUARANTEED TO RUN
=========================================== -->
<script>
    // 1. SIDEBAR TOGGLE SCRIPT (No dependencies, runs instantly)
    try {
        const body = document.body;
        
        // Desktop Toggle
        document.getElementById('desktopSidebarToggle')?.addEventListener('click', function(e) {
            e.preventDefault();
            body.classList.toggle('sidebar-collapsed');
        });
        
        // Mobile Toggle
        document.getElementById('mobileSidebarToggle')?.addEventListener('click', function(e) {
            e.preventDefault();
            body.classList.add('mobile-sidebar-open');
        });
        
        // Mobile Overlay Close
        document.getElementById('sidebarOverlay')?.addEventListener('click', function() {
            body.classList.remove('mobile-sidebar-open');
        });
    } catch (err) {
        console.error("Sidebar logic error:", err);
    }

    // 2. THEME TOGGLE SCRIPT (No dependencies, runs instantly)
    try {
        const htmlEl = document.documentElement;
        const themeBtn = document.getElementById('themeToggleBtn');
        const themeIcon = document.getElementById('themeIcon');
        
        // Function to apply the theme
        function applyTheme(theme) {
            htmlEl.setAttribute('data-theme', theme);
            if (themeIcon) {
                themeIcon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
            }
            try { localStorage.setItem('admin_theme', theme); } catch(e) {}
            
            // Dispatch event so charts know to update their colors
            window.dispatchEvent(new Event('themeChanged'));
        }

        // Check for saved theme right away
        let savedTheme = 'light';
        try { savedTheme = localStorage.getItem('admin_theme') || 'light'; } catch(e) {}
        applyTheme(savedTheme);

        // Bind Theme Click
        if (themeBtn) {
            themeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const currentTheme = htmlEl.getAttribute('data-theme');
                applyTheme(currentTheme === 'dark' ? 'light' : 'dark');
            });
        }
    } catch (err) {
        console.error("Theme logic error:", err);
    }
</script>

<!-- ==========================================
     EXTERNAL JAVASCRIPT: CHARTS & ALERTS
=========================================== -->
<script>
    // 3. CHART & UI SCRIPT (Waits for window load to ensure ChartJS/SweetAlert exists)
    window.addEventListener('load', function() {
        // Chart Initialization
        let analyticsChart = null;
        let distributionChart = null;

        function renderCharts() {
            if (typeof Chart === 'undefined') return; // Exit safely if ChartJS failed to load

            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            const textColor = isDark ? '#A0A0A0' : '#6C757D';
            const gridColor = isDark ? '#333333' : '#E2E8F0';

            const aCanvas = document.getElementById('analyticsChart');
            if (aCanvas) {
                if (analyticsChart) analyticsChart.destroy();
                analyticsChart = new Chart(aCanvas.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [
                            { label: 'Classes', data: [300, 450, 600, 700, 900, 1100], borderColor: '#0d6efd', backgroundColor: 'rgba(13, 110, 253, 0.1)', fill: true, tension: 0.4 },
                            { label: 'Applicants', data: [120, 190, 300, 250, 420, 550], borderColor: '#FFC20E', backgroundColor: 'transparent', borderDash: [5, 5], tension: 0.4 }
                        ]
                    },
                    options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { labels: { color: textColor } } }, scales: { x: { ticks: { color: textColor }, grid: { color: gridColor } }, y: { ticks: { color: textColor }, grid: { color: gridColor } } } }
                });
            }

            const dCanvas = document.getElementById('distributionChart');
            if (dCanvas) {
                if (distributionChart) distributionChart.destroy();
                distributionChart = new Chart(dCanvas.getContext('2d'), {
                    type: 'doughnut',
                    data: { labels: ['Kids ESL', 'Business', 'General'], datasets: [{ data: [45, 30, 25], backgroundColor: ['#0d6efd', '#FFC20E', '#198754'], borderWidth: 0 }] },
                    options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, cutout: '75%' }
                });
            }
        }

        // Render charts initially
        renderCharts();

        // Listen for theme changes from the main script block
        window.addEventListener('themeChanged', renderCharts);

        // SweetAlert Bindings
        if (typeof Swal !== 'undefined') {
            document.querySelectorAll('.approve-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    Swal.fire({ title: 'Approve?', icon: 'question', showCancelButton: true, confirmButtonColor: '#0d6efd' });
                });
            });
            document.querySelectorAll('.reject-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    Swal.fire({ title: 'Reject?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#dc3545' });
                });
            });
        }
    });
</script>


<script>
    // Initialize DataTables safely after window loads
    window.addEventListener('load', function() {
        if (typeof $ !== 'undefined') {
            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "orderClasses": false,
                    "order": [], // Prevents automatic sorting of the 1st column on load
                    "language": {
                        "search": "_INPUT_",
                        "searchPlaceholder": "Search teachers..."
                    },
                    "drawCallback": function(settings) {
                        // Re-apply theme dynamically if needed after pagination/search draw
                        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
                        if (isDark) {
                            $('.dataTables_wrapper').css('color', 'var(--text-mute)');
                        }
                    }
                });
            });
        }
    });




    // Preloader Logic
    document.addEventListener("DOMContentLoaded", function() {
        const preloader = document.getElementById("themePreloader");
        
        // 1. Hide preloader when the page fully loads
        window.addEventListener("load", function() {
            preloader.classList.add("hidden");
        });

        // 2. Show preloader on link clicks (simulating loading between pages)
        document.querySelectorAll("a").forEach(link => {
            link.addEventListener("click", function(e) {
                const href = this.getAttribute("href");
                const target = this.getAttribute("target");
                const isTabOrDropdown = this.hasAttribute("data-bs-toggle");
                
                // Only trigger for actual page navigations (ignore # links, new tabs, and Bootstrap toggles)
                if (href && href !== "#" && !href.startsWith("javascript:") && target !== "_blank" && !isTabOrDropdown) {
                    e.preventDefault();
                    preloader.classList.remove("hidden");
                    
                    // Navigate to the link after rendering the preloader
                    setTimeout(() => {
                        window.location.href = href;
                    }, 150);
                }
            });
        });
    });





    document.addEventListener("DOMContentLoaded", function() {
        // Event delegation for DataTables dynamic row support
        document.addEventListener("click", function(e) {
            const btn = e.target.closest(".btn-schedule-modal");
            if (btn) {
                const name = btn.getAttribute("data-name");
                const id = btn.getAttribute("data-id");
                const avatar = btn.getAttribute("data-avatar");
                const role = btn.getAttribute("data-role");

                document.getElementById("modalApplicantName").innerText = name;
                document.getElementById("modalApplicantId").innerText = "ID: " + id;
                document.getElementById("modalApplicantAvatar").src = avatar;
                document.getElementById("modalApplicantRole").innerText = role;

                const modal = new bootstrap.Modal(document.getElementById("scheduleModal"));
                modal.show();
            }
        });
    });







    document.addEventListener("DOMContentLoaded", function() {
    // Event delegation for DataTables dynamic row support
        document.addEventListener("click", function(e) {
            
            // Handle Approve Modal Trigger
            const approveBtn = e.target.closest(".btn-approve-modal");
            if (approveBtn) {
                const name = approveBtn.getAttribute("data-name");
                const id = approveBtn.getAttribute("data-id");
                const avatar = approveBtn.getAttribute("data-avatar");
                const role = approveBtn.getAttribute("data-role");

                document.getElementById("approveApplicantName").innerText = name;
                document.getElementById("approveApplicantId").innerText = "ID: " + id;
                document.getElementById("approveApplicantAvatar").src = avatar;
                document.getElementById("approveApplicantRole").innerText = role;

                const modal = new bootstrap.Modal(document.getElementById("approveModal"));
                modal.show();
            }
        });
    });








    document.addEventListener("DOMContentLoaded", function() {
        // Event delegation for DataTables dynamic row support
        document.addEventListener("click", function(e) {
            
            // Handle Review Modal Trigger
            const reviewBtn = e.target.closest(".btn-review-modal");
            if (reviewBtn) {
                const name = reviewBtn.getAttribute("data-name");
                const id = reviewBtn.getAttribute("data-id");
                const avatar = reviewBtn.getAttribute("data-avatar");
                const role = reviewBtn.getAttribute("data-role");

                document.getElementById("reviewApplicantName").innerText = name;
                document.getElementById("reviewApplicantId").innerText = "ID: " + id;
                document.getElementById("reviewApplicantAvatar").src = avatar;
                document.getElementById("reviewApplicantRole").innerText = role;

                const modal = new bootstrap.Modal(document.getElementById("reviewDocsModal"));
                modal.show();
            }

            // Handle Document Switching inside Modal
            const docItem = e.target.closest(".doc-item");
            if (docItem && docItem.closest("#reviewDocsModal")) {
                // Remove active class from all items
                document.querySelectorAll("#reviewDocsModal .doc-item").forEach(item => item.classList.remove("active"));
                
                // Activate clicked item
                docItem.classList.add("active");

                // Update Preview Image & Link
                const title = docItem.getAttribute("data-doc-title");
                const src = docItem.getAttribute("data-doc-src");

                document.getElementById("previewTitle").innerText = title;
                document.getElementById("docPreviewImage").src = src;
                document.getElementById("previewExternalLink").href = src;
            }
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        document.addEventListener("click", function(e) {
            
            // Handle Post-Final Demo Modal Trigger
            const postDemoBtn = e.target.closest(".btn-postdemo-modal");
            if (postDemoBtn) {
                const name = postDemoBtn.getAttribute("data-name");
                const id = postDemoBtn.getAttribute("data-id");
                const avatar = postDemoBtn.getAttribute("data-avatar");
                const role = postDemoBtn.getAttribute("data-role");
                const score = postDemoBtn.getAttribute("data-score") || "95%";

                document.getElementById("postDemoApplicantName").innerText = name;
                document.getElementById("postDemoApplicantId").innerText = "ID: " + id;
                document.getElementById("postDemoApplicantAvatar").src = avatar;
                document.getElementById("postDemoApplicantRole").innerText = role;
                document.getElementById("postDemoScoreBadge").innerHTML = `<i class="bi bi-trophy-fill me-1"></i> Demo Score: ${score} (Passed)`;

                const modal = new bootstrap.Modal(document.getElementById("postDemoModal"));
                modal.show();
            }
        });
    });


   document.addEventListener("DOMContentLoaded", function () {
    let currentDate = new Date();
    let selectedActiveDate = "";

    // Sample bookings database
    const sampleBookings = {
        "2026-10-01": [{ type: "esl", time: "09:00 AM", title: "Kids ESL Level 1", student: "Leo Chen", teacher: "Elena R." }],
        "2026-10-05": [{ type: "trial", time: "02:00 PM", title: "Free Trial Demo", student: "Sophia Lin", teacher: "Mark Reyes" }],
        "2026-10-07": [
            { type: "esl", time: "10:30 AM", title: "Kids ESL Level 2", student: "Kenji Sato", teacher: "Elena R." },
            { type: "trial", time: "04:00 PM", title: "Academic Placement", student: "Mia Wong", teacher: "Sarah J." }
        ],
        "2026-10-09": [{ type: "esl", time: "01:00 PM", title: "Phonics Special", student: "Oliver Kim", teacher: "Elena R." }],
        "2026-10-18": [{ type: "esl", time: "09:00 AM", title: "Kids ESL", student: "Leo Chen", teacher: "Elena R." }],
        "2026-10-20": [{ type: "esl", time: "11:00 AM", title: "Business English", student: "David Zhang", teacher: "Sarah J." }],
        "2026-10-23": [{ type: "trial", time: "05:00 PM", title: "Trial Demo", student: "Lucas Vance", teacher: "Mark Reyes" }]
    };

    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    const monthLabel = document.getElementById("currentMonthLabel");
    const halfGrid1 = document.getElementById("halfGrid1");
    const halfGrid2 = document.getElementById("halfGrid2");
    const half1RangeLabel = document.getElementById("half1RangeLabel");
    const half2RangeLabel = document.getElementById("half2RangeLabel");
    const half1Summary = document.getElementById("half1Summary");
    const half2Summary = document.getElementById("half2Summary");

    function formatDateString(year, monthIndex, day) {
        return `${year}-${String(monthIndex + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
    }

    // Function to handle View Bookings Modal
    function openViewBookingsModal(dateStr) {
        selectedActiveDate = dateStr;
        const subtitleEl = document.getElementById("viewModalDateSubtitle");
        if (subtitleEl) subtitleEl.innerText = `Classes scheduled for ${dateStr}`;

        const container = document.getElementById("viewBookingsContainer");
        const list = sampleBookings[dateStr];

        if (!list || list.length === 0) {
            if (container) {
                container.innerHTML = `
                    <div class="text-center py-4 text-muted-custom">
                        <i class="bi bi-calendar-x fs-1 opacity-50 d-block mb-2"></i>
                        <p class="mb-0 small">No bookings scheduled for this date.</p>
                    </div>`;
            }
        } else {
            let html = "";
            list.forEach(item => {
                const badgeClass = item.type === "trial" ? "bg-warning text-dark" : "bg-primary text-white";
                html += `
                    <div class="view-booking-item">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge ${badgeClass} rounded-pill px-2 py-1" style="font-size: 0.7rem;">${item.time}</span>
                                <h6 class="fw-bold text-main mb-0 small">${item.title}</h6>
                            </div>
                            <span class="text-muted-custom extra-small">Student: <strong>${item.student}</strong> • Teacher: <strong>${item.teacher}</strong></span>
                        </div>
                        <button class="btn btn-sm btn-outline-custom rounded-circle p-1 px-2" title="Class Settings">
                            <i class="bi bi-gear-fill"></i>
                        </button>
                    </div>`;
            });
            if (container) container.innerHTML = html;
        }

        const modalEl = document.getElementById("viewBookingsModal");
        if (modalEl) {
            // FIX: Re-use/get existing instance to prevent backdrop duplicate flickering
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    }

    // Render Grid & Calculate Summaries for each half
    function renderHalfGrid(startDay, endDay, containerEl, summaryEl, year, month, realToday) {
        let gridHtml = "";
        let totalBookings = 0;
        let eslCount = 0;
        let trialCount = 0;

        const firstDayWeekday = new Date(year, month, startDay).getDay();

        // Padding cells
        for (let pad = 0; pad < firstDayWeekday; pad++) {
            gridHtml += `<div class="calendar-day-tile other-month" style="opacity:0.1; pointer-events:none;"></div>`;
        }

        // Render day tiles
        for (let d = startDay; d <= endDay; d++) {
            const dateStr = formatDateString(year, month, d);
            const isToday = (d === realToday.getDate() && month === realToday.getMonth() && year === realToday.getFullYear());

            let tileClasses = "calendar-day-tile";
            if (isToday) tileClasses += " today";

            // Process Bookings & Statistics
            let bookingsHtml = "";
            if (sampleBookings[dateStr]) {
                bookingsHtml += '<div class="booking-events">';
                sampleBookings[dateStr].forEach(b => {
                    totalBookings++;
                    if (b.type === "trial") trialCount++;
                    else eslCount++;

                    const icon = b.type === 'trial' ? 'bi-star-fill' : 'bi-clock';
                    bookingsHtml += `<div class="booking-pill ${b.type}"><i class="bi ${icon}"></i> ${b.time} • ${b.title}</div>`;
                });
                bookingsHtml += '</div>';
            }

            const hoverActionBtns = `
                <div class="tile-hover-actions">
                    <button class="tile-btn-action btn-view" title="View Bookings" data-action="view" data-date="${dateStr}">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                    <button class="tile-btn-action btn-add" title="Add Booking" data-action="add" data-date="${dateStr}">
                        <i class="bi bi-plus-lg"></i>
                    </button>
                </div>`;

            gridHtml += `
                <div class="${tileClasses}" data-date="${dateStr}">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="day-number ${isToday ? 'text-brand-yellow' : ''}">${d}</span>
                        ${hoverActionBtns}
                    </div>
                    ${bookingsHtml}
                </div>`;
        }

        if (containerEl) containerEl.innerHTML = gridHtml;

        // Render Summary Stats under card
        if (summaryEl) {
            summaryEl.innerHTML = `
                <div class="summary-stat-item">
                    <i class="bi bi-calendar-check text-primary"></i>
                    Total Classes: <span class="summary-stat-value">${totalBookings}</span>
                </div>
                <div class="summary-stat-item">
                    <i class="bi bi-journal-bookmark text-info"></i>
                    ESL Lessons: <span class="summary-stat-value">${eslCount}</span>
                </div>
                <div class="summary-stat-item">
                    <i class="bi bi-star-fill text-warning"></i>
                    Trial Demos: <span class="summary-stat-value">${trialCount}</span>
                </div>
            `;
        }
    }

    function renderSplitCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        const totalDaysInMonth = new Date(year, month + 1, 0).getDate();
        const realToday = new Date();

        if (monthLabel) monthLabel.innerText = `${monthNames[month]} ${year}`;
        if (half1RangeLabel) half1RangeLabel.innerText = `${monthNames[month].substring(0,3)} 1 - 15`;
        if (half2RangeLabel) half2RangeLabel.innerText = `${monthNames[month].substring(0,3)} 16 - ${totalDaysInMonth}`;

        // 1st Half (1-15)
        renderHalfGrid(1, 15, halfGrid1, half1Summary, year, month, realToday);

        // 2nd Half (16-End)
        renderHalfGrid(16, totalDaysInMonth, halfGrid2, half2Summary, year, month, realToday);
    }

    // Navigation Listeners
    const prevBtn = document.getElementById("prevMonthBtn");
    if (prevBtn) {
        prevBtn.addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderSplitCalendar();
        });
    }

    const nextBtn = document.getElementById("nextMonthBtn");
    if (nextBtn) {
        nextBtn.addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderSplitCalendar();
        });
    }

    const todayBtn = document.getElementById("todayBtn");
    if (todayBtn) {
        todayBtn.addEventListener("click", () => {
            currentDate = new Date();
            renderSplitCalendar();
        });
    }

    // Modal Switch Trigger from View to Add Modal
    const addDirectBtn = document.getElementById("viewModalAddDirectBtn");
    if (addDirectBtn) {
        addDirectBtn.addEventListener("click", function() {
            const viewModalEl = document.getElementById("viewBookingsModal");
            if (viewModalEl) {
                const viewModal = bootstrap.Modal.getInstance(viewModalEl);
                if (viewModal) viewModal.hide();
            }

            setTimeout(() => {
                const dateInput = document.getElementById("bookingSelectedDate");
                if (dateInput) dateInput.value = selectedActiveDate;
                
                const addModalEl = document.getElementById("addBookingModal");
                if (addModalEl) {
                    const addModal = bootstrap.Modal.getOrCreateInstance(addModalEl);
                    addModal.show();
                }
            }, 350);
        });
    }

    // Unified Event Delegation: Handles both View Eye and Add Plus clicks
    document.addEventListener("click", function (e) {
        const actionBtn = e.target.closest(".tile-btn-action");
        if (actionBtn) {
            e.stopPropagation();
            e.preventDefault();

            const action = actionBtn.getAttribute("data-action");
            const dateStr = actionBtn.getAttribute("data-date");

            if (action === "add") {
                const dateInput = document.getElementById("bookingSelectedDate");
                if (dateInput) dateInput.value = dateStr;

                const addModalEl = document.getElementById("addBookingModal");
                if (addModalEl) {
                    const addModal = bootstrap.Modal.getOrCreateInstance(addModalEl);
                    addModal.show();
                }
            } else if (action === "view") {
                openViewBookingsModal(dateStr);
            }
        }
    });

    renderSplitCalendar();
});




//for chat bubble
// Sample Mock Database for Teacher Chats
const teacherChats = {
    "t1": [
        { sender: "teacher", text: "Hello! Ready for today's Kids ESL class?", time: "08:45 AM" },
        { sender: "user", text: "Hi Elena! Yes, Leo is ready with his workbook.", time: "08:50 AM" },
        { sender: "teacher", text: "Great! See you in class shortly.", time: "08:52 AM" }
    ]
};

let activeTeacherId = null;

// Function to Render Messages in Chat
function renderChatMessages(teacherId, avatarUrl) {
    const container = document.getElementById("chatMessagesContainer");
    if (!container) return;

    const messages = teacherChats[teacherId] || [];
    
    if (messages.length === 0) {
        container.innerHTML = `
            <div class="text-center py-5 text-muted">
                <i class="bi bi-chat-heart fs-1 opacity-50 d-block mb-2"></i>
                <p class="small mb-0">Start a conversation with your teacher.</p>
            </div>`;
        return;
    }

    let html = "";
    messages.forEach(msg => {
        const isUser = msg.sender === "user";
        const wrapperClass = isUser ? "outgoing" : "incoming";
        const bubbleClass = isUser ? "chat-bubble-outgoing" : "chat-bubble-incoming";
        const avatarHtml = !isUser ? `<img src="${avatarUrl}" class="chat-avatar-sm" alt="Teacher">` : "";

        html += `
            <div class="chat-bubble-wrapper ${wrapperClass}">
                ${avatarHtml}
                <div class="chat-bubble ${bubbleClass}">
                    <div>${msg.text}</div>
                    <span class="chat-time">${msg.time}</span>
                </div>
            </div>`;
    });

    container.innerHTML = html;
    scrollChatToBottom();
}

// Auto-Scroll Chat to Bottom
function scrollChatToBottom() {
    const container = document.getElementById("chatMessagesContainer");
    if (container) {
        container.scrollTop = container.scrollHeight;
    }
}

// Global Event Listener for Chat Buttons
document.addEventListener("click", function (e) {
    const chatBtn = e.target.closest(".btn-teacher-chat");
    if (chatBtn) {
        e.preventDefault();
        
        activeTeacherId = chatBtn.getAttribute("data-teacher-id");
        const name = chatBtn.getAttribute("data-teacher-name");
        const role = chatBtn.getAttribute("data-teacher-role") || "Online";
        const avatar = chatBtn.getAttribute("data-teacher-avatar") || "https://i.pravatar.cc/150";

        // Update Modal Header Details
        document.getElementById("chatHeaderName").innerText = name;
        document.getElementById("chatHeaderRole").innerText = role;
        document.getElementById("chatHeaderAvatar").src = avatar;

        // Render Conversation History
        renderChatMessages(activeTeacherId, avatar);

        // Open Modal cleanly using getOrCreateInstance
        const modalEl = document.getElementById("teacherChatModal");
        if (modalEl) {
            const chatModal = bootstrap.Modal.getOrCreateInstance(modalEl);
            chatModal.show();
        }
    }
});

// Handle Sending a Message
const chatForm = document.getElementById("chatForm");
if (chatForm) {
    chatForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const input = document.getElementById("chatMessageInput");
        const text = input.value.trim();

        if (!text || !activeTeacherId) return;

        // Ensure database array exists
        if (!teacherChats[activeTeacherId]) {
            teacherChats[activeTeacherId] = [];
        }

        const now = new Date();
        const timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

        // Push User Message
        teacherChats[activeTeacherId].push({
            sender: "user",
            text: text,
            time: timeStr
        });

        const avatar = document.getElementById("chatHeaderAvatar").src;
        renderChatMessages(activeTeacherId, avatar);
        input.value = "";

        // Simulated Auto-Reply for demo
        setTimeout(() => {
            teacherChats[activeTeacherId].push({
                sender: "teacher",
                text: "Thank you for the message! I'll get back to you shortly.",
                time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
            });
            renderChatMessages(activeTeacherId, avatar);
        }, 1000);
    });
}
</script>