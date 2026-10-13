<!-- Approve & Finish Interview Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4">
            <!-- Header -->
            <div class="modal-header px-4 py-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="modal-approve-icon fs-5">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0" id="approveModalLabel">Complete Interview & Approve</h5>
                        <p class="text-muted-custom mb-0 small">Finalize applicant evaluation and generate onboarding offer</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <form id="approveForm">
                    <!-- Applicant Header Box -->
                    <div class="p-3 mb-4 rounded-3 d-flex align-items-center justify-content-between" style="background-color: var(--input-bg); border: 1px solid var(--border-color);">
                        <div class="d-flex align-items-center">
                            <img id="approveApplicantAvatar" src="https://i.pravatar.cc/100?img=12" class="rounded-circle me-3" width="44" height="44" alt="Applicant Avatar">
                            <div>
                                <h6 class="fw-bold mb-0 text-main" id="approveApplicantName">Elena Rostova</h6>
                                <span class="text-muted-custom small" id="approveApplicantId">ID: 51T-8924</span> • 
                                <span class="text-brand-blue small" id="approveApplicantRole">Kids ESL Applicant</span>
                            </div>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-medium" style="font-size: 0.75rem;">Passed Interview</span>
                    </div>

                    <div class="row g-3">
                        <!-- Star Rating -->
                        <div class="col-12 col-md-6">
                            <label class="form-label d-block">Overall Performance Rating</label>
                            <div class="rating-select py-1">
                                <input type="radio" id="star5" name="rating" value="5" checked><label for="star5"><i class="bi bi-star-fill"></i></label>
                                <input type="radio" id="star4" name="rating" value="4"><label for="star4"><i class="bi bi-star-fill"></i></label>
                                <input type="radio" id="star3" name="rating" value="3"><label for="star3"><i class="bi bi-star-fill"></i></label>
                                <input type="radio" id="star2" name="rating" value="2"><label for="star2"><i class="bi bi-star-fill"></i></label>
                                <input type="radio" id="star1" name="rating" value="1"><label for="star1"><i class="bi bi-star-fill"></i></label>
                            </div>
                        </div>

                        <!-- Teaching Tier / Level Assignment -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Assign Teacher Tier</label>
                            <select class="form-select" required>
                                <option value="junior">Junior ESL Teacher (Level 1-3)</option>
                                <option value="senior" selected>Senior Kids ESL Teacher (Level 4-6)</option>
                                <option value="master">Master Trainer / Business English Specialist</option>
                            </select>
                        </div>

                        <!-- Base Hourly Rate -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Base Hourly Rate ($ / PHP)</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: var(--input-bg); border-color: var(--border-color); color: var(--text-mute);">$</span>
                                <input type="number" class="form-control" step="0.50" value="6.50" placeholder="0.00" required>
                            </div>
                        </div>

                        <!-- Target Start / Onboarding Date -->
                        <div class="col-12 col-md-6">
                            <label class="form-label">Target Start Date</label>
                            <input type="date" class="form-control" required>
                        </div>

                        <!-- Evaluator Checkboxes -->
                        <div class="col-12">
                            <label class="form-label">Verification Checklist</label>
                            <div class="d-flex flex-wrap gap-3 p-3 rounded-3" style="background-color: var(--input-bg); border: 1px solid var(--border-color);">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkHardware" checked>
                                    <label class="form-check-label text-main small" for="checkHardware">Hardware/Noise-Canceling Verified</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkSpeed" checked>
                                    <label class="form-check-label text-main small" for="checkSpeed">Internet Speed Test Cleared</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkDocs" checked>
                                    <label class="form-check-label text-main small" for="checkDocs">TEFL/TESOL Uploaded</label>
                                </div>
                            </div>
                        </div>

                        <!-- Evaluator Final Remarks -->
                        <div class="col-12">
                            <label class="form-label">Evaluator Remarks & Contract Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Enter evaluation summary, strengths observed during demo class, or special notes for contract generation..."></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer px-4 py-3">
                <button type="button" class="btn btn-outline-custom btn-sm rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="approveForm" class="btn btn-success btn-sm rounded-pill px-4 fw-semibold">
                    <i class="bi bi-check-circle-fill me-1"></i> Approve & Send Offer
                </button>
            </div>
        </div>
    </div>
</div>