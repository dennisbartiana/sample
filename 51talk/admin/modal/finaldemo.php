<!-- Post-Final Demo Onboarding & Contract Modal -->
<div class="modal fade" id="postDemoModal" tabindex="-1" aria-labelledby="postDemoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4">
            <!-- Modal Header -->
            <div class="modal-header px-4 py-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="modal-postdemo-icon fs-5">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0" id="postDemoModalLabel">Post-Final Demo Onboarding</h5>
                        <p class="text-muted-custom mb-0 small">Issue formal offer contract, configure pay rates, and enroll in onboarding</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <form id="postDemoForm">
                    <!-- Applicant Header Banner -->
                    <div class="p-3 mb-4 rounded-3 d-flex align-items-center justify-content-between" style="background-color: var(--input-bg); border: 1px solid var(--border-color);">
                        <div class="d-flex align-items-center">
                            <img id="postDemoApplicantAvatar" src="https://i.pravatar.cc/100?img=12" class="rounded-circle me-3" width="44" height="44" alt="Applicant Avatar">
                            <div>
                                <h6 class="fw-bold mb-0 text-main" id="postDemoApplicantName">Elena Rostova</h6>
                                <span class="text-muted-custom small" id="postDemoApplicantId">ID: 51T-8924</span> • 
                                <span class="text-brand-blue small" id="postDemoApplicantRole">Senior Kids ESL Candidate</span>
                            </div>
                        </div>
                        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill fw-medium" style="font-size: 0.75rem;" id="postDemoScoreBadge">
                            <i class="bi bi-trophy-fill me-1"></i> Demo Score: 96% (Passed)
                        </span>
                    </div>

                    <!-- Step 1: Compensation & Incentives -->
                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div class="step-badge">1</div>
                            <h6 class="fw-bold text-main mb-0">Compensation & Pay Structure</h6>
                        </div>
                        <div class="contract-rate-box">
                            <div class="row g-3">
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Base Hourly Rate</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-end-0" style="background-color: var(--bg-solid); border-color: var(--border-color); color: var(--text-mute);">$</span>
                                        <input type="number" class="form-control border-start-0" value="7.50" step="0.25" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Peak Hour Incentive</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-end-0" style="background-color: var(--bg-solid); border-color: var(--border-color); color: var(--text-mute);">$</span>
                                        <input type="number" class="form-control border-start-0" value="1.50" step="0.25">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label">Trial Conversion Bonus</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-end-0" style="background-color: var(--bg-solid); border-color: var(--border-color); color: var(--text-mute);">$</span>
                                        <input type="number" class="form-control border-start-0" value="2.00" step="0.50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Schedule & Training Group -->
                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div class="step-badge">2</div>
                            <h6 class="fw-bold text-main mb-0">Onboarding Cohort & Slot Commitment</h6>
                        </div>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Assigned Training Batch</label>
                                <select class="form-select" required>
                                    <option value="batch_oct_a" selected>October 2026 - Cohort A (Starts Oct 12)</option>
                                    <option value="batch_oct_b">October 2026 - Cohort B (Starts Oct 19)</option>
                                    <option value="batch_nov_a">November 2026 - Early Cohort</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Weekly Hour Commitment</label>
                                <select class="form-select" required>
                                    <option value="25" selected>Minimum 25 Peak Hours / Week</option>
                                    <option value="35">Full Time (35+ Peak Hours / Week)</option>
                                    <option value="15">Part Time Weekend Specialist</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Contract Dispatch & Portal Credentials -->
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div class="step-badge">3</div>
                            <h6 class="fw-bold text-main mb-0">Automated Actions & Notifications</h6>
                        </div>
                        <div class="p-3 rounded-3" style="background-color: var(--input-bg); border: 1px solid var(--border-color);">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="sendEcontract" checked>
                                <label class="form-check-label text-main small" for="sendEcontract">
                                    Generate & send e-signature contract offer via email
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="grantTeacherPortalAccess" checked>
                                <label class="form-check-label text-main small" for="grantTeacherPortalAccess">
                                    Create Teacher Portal credentials and trigger onboarding welcome kit
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notifyAcademicHead" checked>
                                <label class="form-check-label text-main small" for="notifyAcademicHead">
                                    Notify Academic Operations Head for schedule allocation
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer px-4 py-3">
                <button type="button" class="btn btn-outline-custom btn-sm rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="postDemoForm" class="btn btn-brand btn-sm rounded-pill px-4 fw-semibold">
                    <i class="bi bi-file-earmark-text-fill me-1"></i> Send Offer & Onboard
                </button>
            </div>
        </div>
    </div>
</div>