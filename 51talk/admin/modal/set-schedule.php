<!-- Schedule Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4">
            <!-- Modal Header -->
            <div class="modal-header px-4 py-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: rgba(13, 110, 253, 0.1); color: var(--brand-blue);">
                        <i class="bi bi-calendar-event-fill fs-5"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0" id="scheduleModalLabel">Set Applicant Schedule</h5>
                        <p class="text-muted-custom mb-0 small">Schedule an interview or demo teaching session</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <form id="scheduleForm">
                    <!-- Target Applicant Summary Box -->
                    <div class="p-3 mb-4 rounded-3 d-flex align-items-center justify-content-between" style="background-color: var(--input-bg); border: 1px solid var(--border-color);">
                        <div class="d-flex align-items-center">
                            <img id="modalApplicantAvatar" src="https://i.pravatar.cc/100?img=12" class="rounded-circle me-3" width="44" height="44" alt="Applicant Avatar">
                            <div>
                                <h6 class="fw-bold mb-0 text-main" id="modalApplicantName">Elena Rostova</h6>
                                <span class="text-muted-custom small" id="modalApplicantId">ID: 51T-8924</span> • 
                                <span class="text-brand-blue small" id="modalApplicantRole">Kids ESL Applicant</span>
                            </div>
                        </div>
                        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill fw-medium" style="font-size: 0.75rem;">Pending Evaluation</span>
                    </div>

                    <div class="row g-3">
                        <!-- Session Type -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Session Type</label>
                            <select class="form-select" required>
                                <option value="demo" selected>Demo Teaching Session</option>
                                <option value="initial">Initial Screening Interview</option>
                                <option value="final">Final Technical Interview</option>
                                <option value="orientation">Onboarding Orientation</option>
                            </select>
                        </div>

                        <!-- Assigned Evaluator -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Assigned Evaluator</label>
                            <select class="form-select" required>
                                <option value="" disabled selected>Select interviewer...</option>
                                <option value="1">Admin Sarah Jenkins</option>
                                <option value="2">Lead Evaluator Mark Torres</option>
                                <option value="3">Academic Head Teacher</option>
                            </select>
                        </div>

                        <!-- Schedule Date -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" required>
                        </div>

                        <!-- Schedule Time -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Time Slot (Asia/Manila)</label>
                            <input type="time" class="form-control" required>
                        </div>

                        <!-- Classroom / Meeting Link -->
                        <div class="col-12">
                            <label class="form-label">Classroom / Video Link</label>
                            <div class="input-group">
                                <span class="input-group-text border-end-0" style="background-color: var(--input-bg); border-color: var(--border-color); color: var(--text-mute);">
                                    <i class="bi bi-link-45deg"></i>
                                </span>
                                <input type="url" class="form-control border-start-0" placeholder="https://class.speakingmills.com/room/demo-123">
                            </div>
                        </div>

                        <!-- Instructions / Notes -->
                        <div class="col-12">
                            <label class="form-label">Instructions for Applicant</label>
                            <textarea class="form-control" rows="3" placeholder="Add preparation guidelines or notes for the applicant..."></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer px-4 py-3">
                <button type="button" class="btn btn-outline-custom btn-sm rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="scheduleForm" class="btn btn-brand btn-sm rounded-pill px-4">
                    <i class="bi bi-send-fill me-1"></i> Send Schedule
                </button>
            </div>
        </div>
    </div>
</div>