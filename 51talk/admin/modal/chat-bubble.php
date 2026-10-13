<!-- Dynamic Teacher Chat Modal -->
<div class="modal fade" id="teacherChatModal" tabindex="-1" aria-labelledby="teacherChatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered chat-modal-dialog">
        <div class="modal-content rounded-4 overflow-hidden shadow">
            
            <!-- Chat Header -->
            <div class="modal-header px-4 py-3 border-bottom">
                <div class="d-flex align-items-center gap-3">
                    <div class="position-relative">
                        <img id="chatHeaderAvatar" src="" alt="Teacher Avatar" class="rounded-circle" style="width: 42px; height: 42px; object-fit: cover;">
                        <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-light rounded-circle"></span>
                    </div>
                    <div>
                        <h6 class="modal-title fw-bold mb-0" id="chatHeaderName">Teacher Name</h6>
                        <div class="d-flex align-items-center gap-1">
                            <span class="chat-status-dot"></span>
                            <span class="text-muted extra-small" id="chatHeaderRole">Online</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Chat Messages Body -->
            <div class="chat-messages-container" id="chatMessagesContainer">
                <!-- Messages rendered by JavaScript -->
            </div>

            <!-- Chat Input Footer -->
            <div class="modal-footer p-3 border-top">
                <form id="chatForm" class="w-100 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-chat-attach btn-sm rounded-circle p-2" title="Attach file">
                        <i class="bi bi-paperclip fs-5"></i>
                    </button>
                    <input type="text" id="chatMessageInput" class="form-control chat-input-field rounded-pill px-3 py-2 fs-6" placeholder="Type a message..." autocomplete="off" required>
                    <button type="submit" class="btn btn-primary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" id="sendMessageBtn">
                        <i class="bi bi-send-fill fs-6"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>