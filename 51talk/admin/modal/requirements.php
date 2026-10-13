<!-- Review Submitted Requirements Modal -->
<div class="modal fade" id="reviewDocsModal" tabindex="-1" aria-labelledby="reviewDocsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-4">
            <!-- Header -->
            <div class="modal-header px-4 py-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="modal-review-icon fs-5">
                        <i class="bi bi-file-earmark-check-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0" id="reviewDocsModalLabel">Review Submitted Requirements</h5>
                        <p class="text-muted-custom mb-0 small">Verify credentials, certifications, and technical specifications</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <!-- Applicant Header Summary -->
                <div class="p-3 mb-4 rounded-3 d-flex align-items-center justify-content-between" style="background-color: var(--input-bg); border: 1px solid var(--border-color);">
                    <div class="d-flex align-items-center">
                        <img id="reviewApplicantAvatar" src="https://i.pravatar.cc/100?img=12" class="rounded-circle me-3" width="44" height="44" alt="Applicant Avatar">
                        <div>
                            <h6 class="fw-bold mb-0 text-main" id="reviewApplicantName">Elena Rostova</h6>
                            <span class="text-muted-custom small" id="reviewApplicantId">ID: 51T-8924</span> • 
                            <span class="text-brand-blue small" id="reviewApplicantRole">Kids ESL Applicant</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-medium" style="font-size: 0.75rem;" id="docCompletionStatus">3 of 4 Documents Verified</span>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Left Column: Document Checklist -->
                    <div class="col-12 col-lg-6">
                        <h6 class="fw-bold text-main mb-3">Submitted Files</h6>
                        <div class="doc-list-group">
                            
                            <!-- Document Item 1 -->
                            <div class="doc-item active" data-doc-title="Gov_ID_Passport.pdf" data-doc-type="image" data-doc-src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=600&q=80">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="doc-file-icon">
                                        <i class="bi bi-card-heading"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-main small mb-0">Government Issued ID</div>
                                        <span class="text-muted-custom" style="font-size: 0.75rem;">Passport_Elena.pdf • 2.4 MB</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2.5 py-1 small">Verified</span>
                                    <button class="btn btn-sm btn-outline-custom rounded-circle p-1 px-2" title="View Document"><i class="bi bi-eye"></i></button>
                                </div>
                            </div>

                            <!-- Document Item 2 -->
                            <div class="doc-item" data-doc-title="TEFL_Certificate_120hr.pdf" data-doc-type="image" data-doc-src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=600&q=80">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="doc-file-icon">
                                        <i class="bi bi-award"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-main small mb-0">TEFL / TESOL Certificate</div>
                                        <span class="text-muted-custom" style="font-size: 0.75rem;">120hr_TEFL_Cert.pdf • 1.8 MB</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2.5 py-1 small">Verified</span>
                                    <button class="btn btn-sm btn-outline-custom rounded-circle p-1 px-2" title="View Document"><i class="bi bi-eye"></i></button>
                                </div>
                            </div>

                            <!-- Document Item 3 -->
                            <div class="doc-item" data-doc-title="Bachelor_Diploma.pdf" data-doc-type="image" data-doc-src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=600&q=80">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="doc-file-icon">
                                        <i class="bi bi-journal-bookmark"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-main small mb-0">Bachelor's Degree Diploma</div>
                                        <span class="text-muted-custom" style="font-size: 0.75rem;">BS_Education_Diploma.pdf • 3.1 MB</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2.5 py-1 small">Verified</span>
                                    <button class="btn btn-sm btn-outline-custom rounded-circle p-1 px-2" title="View Document"><i class="bi bi-eye"></i></button>
                                </div>
                            </div>

                            <!-- Document Item 4 -->
                            <div class="doc-item" data-doc-title="Speedtest_Specs.png" data-doc-type="image" data-doc-src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=600&q=80">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="doc-file-icon text-warning">
                                        <i class="bi bi-speedometer2"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-main small mb-0">Speed Test & System Specs</div>
                                        <span class="text-muted-custom" style="font-size: 0.75rem;">Ookla_Speedtest_Oct2026.png • 850 KB</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-2.5 py-1 small">Needs Review</span>
                                    <button class="btn btn-sm btn-outline-custom rounded-circle p-1 px-2" title="View Document"><i class="bi bi-eye"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Right Column: Document Live View & Verification Controls -->
                    <div class="col-12 col-lg-6">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold text-main mb-0" id="previewTitle">Gov_ID_Passport.pdf</h6>
                            <a id="previewExternalLink" href="#" target="_blank" class="text-brand-blue small text-decoration-none">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Open Original
                            </a>
                        </div>

                        <!-- Preview Viewport -->
                        <div class="doc-preview-viewport mb-3">
                            <img id="docPreviewImage" src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=600&q=80" class="doc-preview-img" alt="Document Preview">
                        </div>

                        <!-- File Feedback / Revision Note Input -->
                        <div>
                            <label class="form-label">Requirement Feedback / Revision Notes</label>
                            <textarea id="docReviewNotes" class="form-control" rows="2" placeholder="If requesting resubmission, detail the reason here (e.g., image blurred, expired ID)..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer px-4 py-3 justify-content-between">
                <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-4">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i> Request Resubmission
                </button>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-custom btn-sm rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-brand btn-sm rounded-pill px-4 fw-semibold">
                        <i class="bi bi-check-all me-1"></i> Approve All Requirements
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>