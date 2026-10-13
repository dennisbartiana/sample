<!-- Add Booking Modal -->
<div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="addBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4">
            <!-- Header -->
            <div class="modal-header px-4 py-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="modal-review-icon fs-5">
                        <i class="bi bi-calendar-plus-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0" id="addBookingModalLabel">Schedule New Class Booking</h5>
                        <p class="text-muted-custom mb-0 small">Assign student, teacher, and virtual room details</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <form id="addBookingForm">
                    <div class="row g-3">
                        <!-- Student Selection -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Select Student</label>
                            <select class="form-select" required>
                                <option value="" disabled selected>Search student...</option>
                                <option value="st_1">Leo Chen (51S-2041)</option>
                                <option value="st_2">Sophia Lin (51S-8832)</option>
                                <option value="st_3">Kenji Sato (51S-1094)</option>
                            </select>
                        </div>

                        <!-- Assigned Teacher -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Assigned Teacher</label>
                            <select class="form-select" required>
                                <option value="" disabled selected>Assign teacher...</option>
                                <option value="t_1">Elena Rostova (Kids ESL)</option>
                                <option value="t_2">Mark Reyes (Business English)</option>
                                <option value="t_3">Sarah Jenkins (Phonics Trainer)</option>
                            </select>
                        </div>

                        <!-- Course Type -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Course Package</label>
                            <select class="form-select" required>
                                <option value="esl_kids" selected>51Talk Classic Kids ESL</option>
                                <option value="trial">Free Demo / Trial Class</option>
                                <option value="ielts">IELTS Speaking Prep</option>
                                <option value="business">Business English Communication</option>
                            </select>
                        </div>

                        <!-- Duration -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Class Duration</label>
                            <select class="form-select" required>
                                <option value="25" selected>25 Minutes Standard</option>
                                <option value="50">50 Minutes Intensive</option>
                            </select>
                        </div>

                        <!-- Date Input (Auto-populated on tile click) -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Class Date</label>
                            <input type="date" id="bookingSelectedDate" class="form-control" required>
                        </div>

                        <!-- Time Slot -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Time Slot</label>
                            <input type="time" class="form-control" value="10:30" required>
                        </div>

                        <!-- Classroom Link -->
                        <div class="col-12">
                            <label class="form-label">Virtual Classroom Room URL</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0" style="background-color: var(--input-bg); border-color: var(--border-color); color: var(--text-mute);">
                                    <i class="bi bi-camera-video"></i>
                                </span>
                                <input type="url" class="form-control border-start-0" placeholder="https://room.speakingmills.com/class/live-9921">
                            </div>
                        </div>

                        <!-- Internal Notes -->
                        <div class="col-12">
                            <label class="form-label">Class Preparation / Lesson Notes</label>
                            <textarea class="form-control" rows="2" placeholder="Lesson material unit, topic focus, or student learning goals..."></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer px-4 py-3">
                <button type="button" class="btn btn-outline-custom btn-sm rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="addBookingForm" class="btn btn-brand btn-sm rounded-pill px-4 fw-semibold">
                    <i class="bi bi-calendar-check-fill me-1"></i> Save Booking
                </button>
            </div>
        </div>
    </div>
</div>






<!-- View Bookings Modal -->
<div class="modal fade" id="viewBookingsModal" tabindex="-1" aria-labelledby="viewBookingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content rounded-4">
            <!-- Header -->
            <div class="modal-header px-4 py-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="modal-review-icon fs-5">
                        <i class="bi bi-calendar-event-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0" id="viewBookingsModalLabel">Scheduled Bookings</h5>
                        <p class="text-muted-custom mb-0 small" id="viewModalDateSubtitle">Date selected</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <div id="viewBookingsContainer" class="d-flex flex-column gap-2">
                    <!-- Populated dynamically via JS -->
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer px-4 py-3 justify-content-between">
                <button type="button" class="btn btn-outline-custom btn-sm rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-brand btn-sm rounded-pill px-4 fw-semibold" id="viewModalAddDirectBtn">
                    <i class="bi bi-plus-lg me-1"></i> Add Booking for this Day
                </button>
            </div>
        </div>
    </div>
</div>