<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>51Talk - Admin Dashboard</title>
     <link rel="icon" type="image/png" href="images/51talk.jpg">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- External Libraries (Deferred so they don't block the UI) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>


    <!-- jQuery & DataTables CSS/JS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js" defer></script>

    <style>
        /* === THEME VARIABLES === */
        :root {
            --brand-yellow: #FFC20E;
            --brand-blue: #0d6efd;
            
            /* Light Theme Defaults */
            --bg-main: #F4F6F9;
            --bg-surface: rgba(255, 255, 255, 0.95);
            --bg-solid: #FFFFFF;
            --text-main: #2D2D2D;
            --text-mute: #6c757d;
            --card-shadow: 0 8px 24px rgba(0,0,0,0.04);
            --input-bg: #F8FAFC;
            --border-color: #E2E8F0;
            --sidebar-bg: #FFFFFF;
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 80px;
            --header-height: 70px;
        }

        /* Dark Theme Overrides */
        [data-theme="dark"] {
            --bg-main: #121212;
            --bg-surface: rgba(30, 30, 30, 0.95);
            --bg-solid: #1E1E1E;
            --text-main: #F0F0F0;
            --text-mute: #A0A0A0;
            --card-shadow: 0 12px 30px rgba(0,0,0,0.35);
            --input-bg: #2D2D2D;
            --border-color: #333333;
            --sidebar-bg: #1A1A1A;
        }

        /* === GLOBAL STYLES === */
        * { box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-main);
            transition: background-color 0.3s ease, color 0.3s ease;
            overflow-x: hidden;
            min-height: 100vh;
        }

        .text-main { color: var(--text-main) !important; }
        .text-muted-custom { color: var(--text-mute) !important; }
        .bg-surface { background-color: var(--bg-solid) !important; }
        .text-brand-blue { color: var(--brand-blue) !important; }
        .text-brand-yellow { color: var(--brand-yellow) !important; }

        /* === DROPDOWNS === */
        .dropdown-menu {
            background-color: var(--bg-solid) !important;
            border: 1px solid var(--border-color) !important;
        }
        .dropdown-item {
            color: var(--text-main) !important;
        }
        .dropdown-item:hover, .dropdown-item:focus {
            background-color: var(--input-bg) !important;
            color: var(--brand-blue) !important;
        }
        .dropdown-item i {
            color: var(--text-mute);
        }
        .dropdown-item:hover i {
            color: var(--brand-blue);
        }

        /* === HEADER / NAVBAR === */
        .admin-header {
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            height: var(--header-height);
            background-color: var(--bg-surface);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            z-index: 1020;
            transition: left 0.3s ease, background-color 0.3s ease;
            padding: 0 24px;
        }

        body.sidebar-collapsed .admin-header { left: var(--sidebar-collapsed-width); }
        @media (max-width: 991.98px) { .admin-header { left: 0 !important; } }


        /* === CHAT UI STYLES === */
        .chat-container {
            height: calc(100vh - var(--header-height) - 80px);
            min-height: 500px;
            display: flex;
            overflow: hidden;
        }

        /* Chat Sidebar (Contacts) */
        .chat-sidebar {
            width: 320px;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }
        .chat-search {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
        }
        .chat-list {
            overflow-y: auto;
            flex-grow: 1;
        }
        .chat-contact {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .chat-contact:hover, .chat-contact.active {
            background-color: var(--input-bg);
        }
        .chat-contact.active {
            border-left: 4px solid var(--brand-blue);
            padding-left: 12px;
        }
        .unread-badge {
            width: 20px;
            height: 20px;
            background-color: var(--brand-blue);
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Chat Window (Messages) */
        .chat-window {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        .chat-header {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .chat-body {
            flex-grow: 1;
            padding: 24px;
            overflow-y: auto;
            background-color: var(--bg-main); /* Slight contrast from the card background */
            display: flex;
            flex-direction: column;
        }
        .chat-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            background-color: var(--bg-solid);
        }

        /* Message Bubbles */
        .msg-wrapper {
            max-width: 75%;
            margin-bottom: 16px;
            display: flex;
            flex-direction: column;
        }
        .msg-incoming {
            align-self: flex-start;
        }
        .msg-outgoing {
            align-self: flex-end;
            align-items: flex-end;
        }
        .msg-bubble {
            padding: 12px 16px;
            border-radius: 16px;
            font-size: 0.9rem;
            line-height: 1.4;
        }
        .msg-incoming .msg-bubble {
            background-color: var(--input-bg);
            color: var(--text-main);
            border-bottom-left-radius: 4px;
        }
        .msg-outgoing .msg-bubble {
            background-color: var(--brand-blue);
            color: #FFFFFF;
            border-bottom-right-radius: 4px;
        }
        .msg-time {
            font-size: 0.7rem;
            color: var(--text-mute);
            margin-top: 4px;
        }

        /* Input Area */
        .chat-input-box {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 6px 16px;
            display: flex;
            align-items: center;
        }
        .chat-input-box input {
            border: none;
            background: transparent;
            color: var(--text-main);
            width: 100%;
            padding: 8px;
            font-size: 0.9rem;
        }
        .chat-input-box input:focus {
            outline: none;
        }
        .chat-input-box input::placeholder {
            color: var(--text-mute);
        }

        /* Mobile Responsiveness */
        @media (max-width: 767.98px) {
            .chat-sidebar {
                width: 100%;
                display: none; /* Hide contacts list on mobile when viewing a chat */
            }
            /* Add logic via JS later to toggle between list and chat view on mobile */
        }

        /* Search Input */
        .search-box .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding-left: 40px;
            font-size: 0.875rem;
        }
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-mute);
        }
        .search-box .form-control:focus {
            border-color: var(--brand-blue);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }

        /* === INPUT & PLACEHOLDER THEME FIX === */
        .search-box .form-control,
        .chat-input-box input {
            color: var(--text-main) !important;
        }

        .search-box .form-control::placeholder,
        .chat-input-box input::placeholder {
            color: var(--text-mute) !important;
            opacity: 1 !important; /* Prevents Bootstrap from fading the placeholder too much */
        }

        /* Theme & Icon Buttons */
        .icon-btn {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-main);
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }
        .icon-btn:hover {
            background-color: var(--border-color);
            color: var(--brand-blue);
            transform: translateY(-2px);
        }
        .icon-btn .badge-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 9px;
            height: 9px;
            background-color: var(--brand-blue);
            border-radius: 50%;
            border: 2px solid var(--bg-solid);
        }

        .avatar-img { width: 38px; height: 38px; object-fit: cover; border: 2px solid var(--brand-yellow); }

        /* === SIDEBAR === */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            z-index: 1030;
            transition: width 0.3s ease, transform 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        body.sidebar-collapsed .admin-sidebar { width: var(--sidebar-collapsed-width); }

        .sidebar-brand {
            height: var(--header-height);
            display: flex;
            align-items: center;
            padding: 0 20px;
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }
        .brand-logo { width: 50px; height: 50px; object-fit: contain;  }
        .brand-title {
            font-weight: 800; font-size: 1.1rem; color: var(--text-main); margin-left: 7px; transition: opacity 0.2s ease;
        }
        .brand-title span { color: var(--brand-blue); }

        body.sidebar-collapsed .brand-title,
        body.sidebar-collapsed .menu-category,
        body.sidebar-collapsed .nav-text,
        body.sidebar-collapsed .badge-nav {
            opacity: 0; pointer-events: none; display: none;
        }

        .sidebar-menu { padding: 20px 12px; flex-grow: 1; overflow-y: auto; }
        .menu-category {
            font-size: 0.725rem; font-weight: 700; text-transform: uppercase; color: var(--text-mute); padding: 12px 12px 6px; letter-spacing: 0.8px;
        }
        .nav-item-link {
            display: flex; align-items: center; padding: 11px 14px; color: var(--text-main); text-decoration: none; border-radius: 12px; font-weight: 500; font-size: 0.9rem; margin-bottom: 4px; transition: all 0.2s ease; white-space: nowrap;
        }
        .nav-item-link i { font-size: 1.2rem; width: 28px; flex-shrink: 0; color: var(--text-mute); transition: color 0.2s ease; }
        .nav-item-link:hover { background-color: var(--input-bg); color: var(--brand-blue); }
        .nav-item-link:hover i { color: var(--brand-blue); }
        .nav-item-link.active {
            background-color: var(--brand-blue); color: #FFFFFF !important; font-weight: 600; box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
        }
        .nav-item-link.active i { color: #FFFFFF !important; }
        .badge-nav { background-color: var(--brand-yellow); color: #2D2D2D; font-weight: 700; font-size: 0.7rem; padding: 2px 8px; border-radius: 10px; margin-left: auto; }

        /* Mobile Overlay */
        .sidebar-overlay {
            display: none; position: fixed; inset: 0; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(4px); z-index: 1025;
        }

        @media (max-width: 991.98px) {
            .admin-sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; }
            body.mobile-sidebar-open .admin-sidebar { transform: translateX(0); }
            body.mobile-sidebar-open .sidebar-overlay { display: block; }
        }

        /* === MAIN CONTENT WRAPPER === */
        .admin-main {
            margin-left: var(--sidebar-width);
            padding-top: calc(var(--header-height) + 24px);
            padding-bottom: 40px; padding-left: 28px; padding-right: 28px;
            transition: margin-left 0.3s ease;
        }
        body.sidebar-collapsed .admin-main { margin-left: var(--sidebar-collapsed-width); }
        @media (max-width: 991.98px) { .admin-main { margin-left: 0 !important; padding-left: 16px; padding-right: 16px; } }

        /* === CARDS & BUTTONS === */
        .card-custom {
            background-color: var(--bg-solid); border: 1px solid var(--border-color); border-radius: 20px; box-shadow: var(--card-shadow); transition: all 0.3s ease;
        }
        .card-custom:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08); }
        
        .metric-icon-box { width: 52px; height: 52px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0; }
        .metric-icon-yellow { background: rgba(255, 194, 14, 0.15); color: #D49B00; }
        .metric-icon-blue   { background: rgba(13, 110, 253, 0.15); color: var(--brand-blue); }
        .metric-icon-green  { background: rgba(25, 135, 84, 0.15); color: #198754; }
        .metric-icon-purple { background: rgba(111, 66, 193, 0.15); color: #6f42c1; }

        .trend-badge { font-size: 0.75rem; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
        .trend-up { background-color: rgba(25, 135, 84, 0.12); color: #198754; }
        .trend-down { background-color: rgba(220, 53, 69, 0.12); color: #dc3545; }

        .btn-brand {
            background-color: var(--brand-yellow); border: 1px solid var(--brand-yellow); color: #2D2D2D !important; border-radius: 12px; font-weight: 600; padding: 8px 20px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(255, 194, 14, 0.25);
        }
        .btn-brand:hover {
            background-color: var(--brand-blue); border-color: var(--brand-blue); color: #FFFFFF !important; transform: translateY(-2px); box-shadow: 0 6px 15px rgba(13, 110, 253, 0.3);
        }

        .btn-outline-custom { border: 1px solid var(--border-color); color: var(--text-main); background: transparent; }
        .btn-outline-custom:hover { background-color: var(--brand-blue); color: white; border-color: var(--brand-blue); }

        /* === DATA TABLES === */
        .table-custom { color: var(--text-main); vertical-align: middle; }
        .table-custom th { background-color: var(--input-bg); color: var(--text-mute); font-weight: 600; font-size: 0.8rem; text-transform: uppercase; border-bottom: 1px solid var(--border-color); padding: 14px 16px; }
        .table-custom td { padding: 16px; border-bottom: 1px solid var(--border-color); background-color: transparent; }

        .status-badge { padding: 6px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; display: inline-block; }
        .status-pending { background-color: rgba(255, 194, 14, 0.2); color: #B78100; }
        .status-approved { background-color: rgba(13, 110, 253, 0.15); color: var(--brand-blue); }
        .status-rejected { background-color: rgba(220, 53, 69, 0.15); color: #dc3545; }

        .btn-action { width: 32px; height: 32px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; border: 1px solid var(--border-color); background-color: var(--bg-solid); color: var(--text-main); transition: all 0.2s; }
        .btn-action:hover { background-color: var(--brand-blue); color: #FFFFFF; border-color: var(--brand-blue); }


        /* ==========================================================================
        DATATABLES & TABLE THEME STYLES (CLEAN & CONSOLIDATED)
        ========================================================================== */

        /* 1. Global Reset: Remove all Bootstrap 5 & DataTables column highlights, tints, and striping */
        .table-custom,
        table.dataTable,
        table.dataTable *,
        table.dataTable > tbody > tr,
        table.dataTable > tbody > tr > td,
        table.dataTable > tbody > tr > th,
        table.dataTable > tbody > tr > .sorting_1,
        table.dataTable > tbody > tr > .sorting_2,
        table.dataTable > tbody > tr > .sorting_3,
        table.dataTable.table-striped > tbody > tr > *,
        .table-custom > :not(caption) > * > * {
            background: transparent !important;
            background-color: transparent !important;
            box-shadow: none !important;
            --bs-table-bg: transparent !important;
            --bs-table-accent-bg: transparent !important;
            --bs-table-striped-bg: transparent !important;
            --bs-table-hover-bg: transparent !important;
            --bs-table-active-bg: transparent !important;
            --bs-table-bg-state: transparent !important;
            --bs-table-bg-type: transparent !important;
        }

        /* 2. Table Cells & Base Borders */
        table.dataTable tbody td {
            color: var(--text-main) !important;
            border-bottom: 1px solid var(--border-color) !important;
            padding: 14px 16px;
            vertical-align: middle;
        }

        /* 3. Table Header (Clean, border-only, focus-free) */
        table.dataTable thead th,
        table.dataTable thead td {
            background: transparent !important;
            background-color: transparent !important;
            color: var(--text-mute) !important;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color) !important;
            outline: none !important;
            box-shadow: none !important;
            padding: 12px 16px;
        }

        table.dataTable thead th:focus,
        table.dataTable thead td:focus,
        table.dataTable thead th:focus-visible {
            outline: none !important;
            box-shadow: none !important;
        }

        /* 4. Mobile / Responsive Child Details */
        table.dataTable tbody tr.child,
        table.dataTable tbody tr.child td,
        table.dataTable tbody tr.child ul.dtr-details li {
            background-color: var(--bg-solid) !important;
            color: var(--text-main) !important;
            border-color: var(--border-color) !important;
        }

        table.dataTable tbody tr.child span.dtr-title {
            color: var(--text-mute) !important;
            font-weight: 600;
        }

        /* 5. Controls & Inputs (Search input, Length dropdown, Dark Mode Placeholder) */
        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_filter label,
        .dataTables_wrapper .dataTables_info {
            color: var(--text-mute) !important;
            font-size: 0.875rem;
        }

        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            background-color: var(--input-bg) !important;
            color: var(--text-main) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 8px;
            padding: 6px 12px;
        }

        .dataTables_wrapper .dataTables_filter input::placeholder {
            color: var(--text-mute) !important;
            opacity: 1 !important;
        }


        /* === FOOTER === */
        .admin-footer {
            margin-top: 40px;
            padding-top: 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            color: var(--text-mute);
            font-size: 0.85rem;
        }
        .admin-footer a {
            color: var(--text-mute);
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .admin-footer a:hover {
            color: var(--brand-blue);
        }


        /* === TEACHER PROFILE STYLES === */
        .profile-cover {
            height: 140px;
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.1) 0%, rgba(255, 194, 14, 0.1) 100%);
            border-radius: 20px 20px 0 0;
            position: relative;
            border-bottom: 1px solid var(--border-color);
        }
        .profile-avatar-wrapper {
            position: absolute;
            bottom: -40px;
            left: 32px;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid var(--bg-solid);
            object-fit: cover;
            box-shadow: var(--card-shadow);
        }
        .profile-header-info {
            padding: 50px 32px 24px 32px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 16px;
        }

        /* Custom Profile Tabs */
        .nav-tabs-custom {
            border-bottom: 1px solid var(--border-color);
            margin: 0 32px;
        }
        .nav-tabs-custom .nav-link {
            color: var(--text-mute);
            border: none;
            font-weight: 500;
            padding: 12px 20px;
            background: transparent;
            transition: color 0.2s;
        }
        .nav-tabs-custom .nav-link:hover {
            color: var(--brand-blue);
        }
        .nav-tabs-custom .nav-link.active {
            color: var(--brand-blue);
            border-bottom: 2px solid var(--brand-blue);
            background: transparent;
        }

        /* Profile Info Lists */
        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .info-list li {
            padding: 12px 0;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .info-list li:last-child {
            border-bottom: none;
        }
        .info-label {
            color: var(--text-mute);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .info-value {
            color: var(--text-main);
            font-weight: 500;
            font-size: 0.9rem;
            text-align: right;
        }

        /* Skill Tags */
        .skill-tag {
            background-color: var(--input-bg);
            color: var(--text-main);
            border: 1px solid var(--border-color);
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
            margin: 0 4px 8px 0;
        }

        /* === DATATABLES THEME OVERRIDES === */
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: var(--text-main) !important;
            border-radius: 8px;
            padding: 6px 12px;
            transition: all 0.2s ease;
        }
        .dataTables_wrapper .dataTables_length select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--brand-blue);
            outline: none;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            color: var(--text-mute) !important;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 20px;
        }
        /* Pagination Buttons */
        .page-item .page-link {
            background-color: var(--bg-solid);
            border-color: var(--border-color);
            color: var(--text-main);
            margin: 0 2px;
            border-radius: 6px;
        }
        .page-item.active .page-link {
            background-color: var(--brand-blue);
            border-color: var(--brand-blue);
            color: #FFFFFF;
        }
        .page-item.disabled .page-link {
            background-color: var(--input-bg);
            color: var(--text-mute);
            border-color: var(--border-color);
        }
        .page-item:not(.active) .page-link:hover {
            background-color: var(--input-bg);
            color: var(--brand-blue);
            border-color: var(--brand-blue);
        }
        /* Table sorting icons */
        table.dataTable thead th {
            border-bottom: 1px solid var(--border-color) !important;
        }
        table.dataTable.table-custom tbody tr.child ul.dtr-details {
            width: 100%;
        }
        table.dataTable.table-custom tbody tr.child ul.dtr-details li {
            border-bottom: 1px solid var(--border-color);
            padding: 10px 0;
        }
        /* Fix DataTables Search Placeholder in Dark Mode */
        .dataTables_wrapper .dataTables_filter input::placeholder {
            color: var(--text-mute) !important;
            opacity: 1 !important; /* Forces the browser to show it at full opacity */
        }

        /* === ELEGANT PRELOADER === */
        .preloader-overlay {
            position: fixed;
            inset: 0; /* Covers the entire screen */
            background-color: rgba(var(--bg-main-rgb, 244, 246, 249), 0.8); /* Fallback */
            background-color: var(--bg-main);
            backdrop-filter: blur(8px); /* Adds a modern glass-like blur to the dashboard behind it */
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.5s;
        }

        .preloader-overlay.hidden {
            opacity: 0;
            visibility: hidden;
        }

        /* Bouncing Dots Animation */
        .loader-dots {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .loader-dots div {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            animation: loaderBounce 0.5s alternate infinite ease-in-out;
        }

        /* Using your brand colors */
        .loader-dots div:nth-child(1) {
            background-color: var(--brand-blue);
            animation-delay: 0s;
        }
        .loader-dots div:nth-child(2) {
            background-color: var(--brand-yellow);
            animation-delay: 0.16s;
        }
        .loader-dots div:nth-child(3) {
            background-color: var(--brand-blue);
            animation-delay: 0.32s;
        }

        @keyframes loaderBounce {
            0% { 
                transform: translateY(0) scale(1); 
                opacity: 0.7; 
            }
            100% { 
                transform: translateY(-12px) scale(1.15); 
                opacity: 1; 
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); 
            }
        }

        /* Pulsing Text */
        .preloader-text {
            font-weight: 700;
            color: var(--text-mute);
            font-size: 0.85rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            animation: pulseText 1.5s infinite ease-in-out;
        }

        @keyframes pulseText {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 1; }
        }



        /* === MODAL LIGHT/DARK THEME OVERRIDES === */
        .modal-content {
            background-color: var(--bg-solid) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-main) !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .modal-header, 
        .modal-footer {
            border-color: var(--border-color) !important;
        }

        .modal-header .btn-close {
            filter: var(--btn-close-filter, none);
        }

        /* Dark mode adjustment for modal close button */
        [data-theme="dark"] .modal-header .btn-close {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        .modal-body .form-label {
            color: var(--text-main);
            font-size: 0.85rem;
            font-weight: 600;
        }

        .modal-body .form-control,
        .modal-body .form-select {
            background-color: var(--input-bg) !important;
            color: var(--text-main) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 8px;
            padding: 8px 12px;
        }

        .modal-body .form-control:focus,
        .modal-body .form-select:focus {
            border-color: var(--brand-blue) !important;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15) !important;
        }

        .modal-body .form-control::placeholder {
            color: var(--text-mute) !important;
        }


        /* === APPROVAL MODAL SPECIFIC STYLES === */
        .modal-approve-icon {
            width: 42px;
            height: 42px;
            background-color: rgba(25, 135, 84, 0.12);
            color: #198754;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .score-card {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 12px 16px;
        }

        /* Star Rating Selector */
        .rating-select {
            display: flex;
            gap: 6px;
            direction: row;
        }

        .rating-select input[type="radio"] {
            display: none;
        }

        .rating-select label {
            cursor: pointer;
            font-size: 1.25rem;
            color: var(--text-mute);
            transition: color 0.15s ease;
        }

        .rating-select input[type="radio"]:checked ~ label,
        .rating-select label:hover,
        .rating-select label:hover ~ label {
            color: #FFC20E; /* Brand Yellow */
        }

        .rating-select {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }



        /* === DOCUMENT REVIEW MODAL STYLES === */
        .modal-review-icon {
            width: 42px;
            height: 42px;
            background-color: rgba(13, 110, 253, 0.12);
            color: var(--brand-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .doc-list-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .doc-item {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: border-color 0.2s ease, background-color 0.2s ease;
        }

        .doc-item:hover {
            border-color: var(--brand-blue);
        }

        .doc-item.active {
            border-color: var(--brand-blue);
            background-color: rgba(13, 110, 253, 0.05);
        }

        .doc-file-icon {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            background-color: var(--bg-solid);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: var(--brand-blue);
            flex-shrink: 0;
        }

        .doc-preview-viewport {
            background-color: var(--input-bg);
            border: 1px dashed var(--border-color);
            border-radius: 12px;
            height: 280px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .doc-preview-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }

        /* === POST-FINAL DEMO MODAL STYLES === */
        .modal-postdemo-icon {
            width: 42px;
            height: 42px;
            background-color: rgba(255, 194, 14, 0.18);
            color: var(--brand-yellow);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contract-rate-box {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 16px;
        }

        .step-badge {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: var(--brand-blue);
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

       /* === BASE CALENDAR & HOVER ACTIONS STYLES === */
.calendar-card {
    background-color: var(--bg-solid);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 1.25rem;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 8px;
}

.calendar-header-day {
    text-align: center;
    font-weight: 700;
    font-size: 0.8rem;
    text-transform: uppercase;
    color: var(--text-mute);
    padding-bottom: 6px;
    letter-spacing: 0.5px;
}

.calendar-day-tile {
    min-height: 105px;
    background-color: var(--input-bg);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 8px;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
}

.calendar-day-tile:hover {
    border-color: var(--brand-blue);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(13, 110, 253, 0.12);
}

.calendar-day-tile.other-month {
    opacity: 0.35;
}

.calendar-day-tile.today {
    border: 2px solid var(--brand-yellow) !important;
    background-color: rgba(255, 194, 14, 0.05);
}

.day-number {
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--text-main);
}

/* Dual Button Action Controls */
.tile-hover-actions {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.2s ease, visibility 0.2s ease;
    display: flex;
    align-items: center;
    gap: 4px;
}

/* Desktop Hover Trigger */
.calendar-day-tile:hover .tile-hover-actions {
    opacity: 1;
    visibility: visible;
}

.tile-btn-action {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
    cursor: pointer;
    transition: transform 0.15s ease, background-color 0.15s ease;
    flex-shrink: 0;
}

.tile-btn-action.btn-view {
    background-color: var(--bg-solid);
    border: 1px solid var(--border-color);
    color: var(--text-main);
}

.tile-btn-action.btn-view:active,
.tile-btn-action.btn-view:hover {
    transform: scale(1.1);
    color: var(--brand-blue);
    border-color: var(--brand-blue);
    background-color: rgba(13, 110, 253, 0.08);
}

.tile-btn-action.btn-add {
    background-color: var(--brand-blue);
    color: #ffffff;
    border: 1px solid var(--brand-blue);
}

.tile-btn-action.btn-add:active,
.tile-btn-action.btn-add:hover {
    transform: scale(1.1);
    background-color: #0b5ed7;
}

/* Booking Event Badges */
.booking-pill {
    font-size: 0.7rem;
    padding: 3px 6px;
    border-radius: 6px;
    margin-top: 4px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 4px;
}

.booking-pill.esl {
    background-color: rgba(13, 110, 253, 0.15);
    color: var(--brand-blue);
}

.booking-pill.trial {
    background-color: rgba(255, 194, 14, 0.2);
    color: #d99b00;
}

/* === MOBILE & TABLET RESPONSIVE OVERRIDES === */

/* Tablets & Mobile (max-width: 768px) */
@media (max-width: 768px) {
    .calendar-card {
        padding: 0.85rem;
    }

    .calendar-grid {
        gap: 4px;
    }

    .calendar-day-tile {
        min-height: 80px;
        padding: 5px;
        border-radius: 8px;
    }

    /* Force action buttons to always show on touch/mobile screens */
    .tile-hover-actions {
        opacity: 1 !important;
        visibility: visible !important;
        gap: 2px;
    }

    .tile-btn-action {
        width: 20px;
        height: 20px;
        font-size: 0.6rem;
    }

    .day-number {
        font-size: 0.75rem;
    }

    .booking-pill {
        font-size: 0.6rem;
        padding: 2px 4px;
    }
}

/* Small Smartphones (max-width: 480px) */
@media (max-width: 480px) {
    .calendar-day-tile {
        min-height: 68px;
        padding: 4px 3px;
    }

    .calendar-header-day {
        font-size: 0.65rem;
        padding-bottom: 4px;
    }

    .tile-btn-action {
        width: 18px;
        height: 18px;
        font-size: 0.55rem;
    }

    .booking-pill {
        font-size: 0.55rem;
        padding: 1px 3px;
        margin-top: 2px;
    }

    /* Truncate long class text on mobile */
    .booking-pill span {
        display: none;
    }
}
/* === SPLIT CALENDAR (DIVIDED BY 2) STYLES === */
.calendar-half-card {
    background-color: var(--bg-solid);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 1.25rem;
    height: 100%;
}

.calendar-half-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 12px;
    margin-bottom: 12px;
    border-bottom: 1px dashed var(--border-color);
}

.half-badge {
    font-size: 0.75rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
    background-color: rgba(13, 110, 253, 0.1);
    color: var(--brand-blue);
}

/* 7-column grid per half */
.calendar-half-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 6px;
}

.tile-day-name {
    font-size: 0.65rem;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--text-mute);
}

/* Mobile Adjustments for Split View */
@media (max-width: 991px) {
    .calendar-half-card {
        margin-bottom: 1rem;
    }
}

@media (max-width: 576px) {
    .calendar-half-grid {
        gap: 4px;
    }
    .calendar-day-tile {
        min-height: 72px;
        padding: 4px;
    }
}

/* === CALENDAR CARD SUMMARY FOOTER === */
.calendar-half-summary {
    margin-top: 1rem;
    padding-top: 0.85rem;
    border-top: 1px dashed var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-around;
    background-color: var(--input-bg);
    border-radius: 10px;
    padding: 10px 12px;
}

.summary-stat-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    color: var(--text-mute);
}

.summary-stat-value {
    font-weight: 700;
    color: var(--text-main);
}

/* Modal View List Item */
.view-booking-item {
    background-color: var(--input-bg);
    border: 1px solid var(--border-color);
    border-radius: 10px;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* === TEACHER CHAT MODAL - SEAMLESS DARK MODE === */

/* Modal Surface & Borders */
#teacherChatModal .modal-content {
    background-color: var(--bs-body-bg, var(--card-bg, #ffffff));
    color: var(--bs-body-color, var(--text-main, #212529));
    border: 1px solid var(--bs-border-color, var(--border-color, #e2e8f0));
}

#teacherChatModal .modal-header,
#teacherChatModal .modal-footer {
    background-color: var(--bs-body-bg, var(--card-bg, #ffffff));
    border-color: var(--bs-border-color, var(--border-color, #e2e8f0));
}

/* Chat Messages Scroll Container */
.chat-messages-container {
    height: 380px;
    overflow-y: auto;
    padding: 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 12px;
    background-color: var(--bs-tertiary-bg, var(--bg-tertiary, #f8f9fa));
    scroll-behavior: smooth;
}

.chat-messages-container::-webkit-scrollbar {
    width: 5px;
}
.chat-messages-container::-webkit-scrollbar-thumb {
    background: var(--bs-border-color, var(--border-color, #ccc));
    border-radius: 10px;
}

/* Chat Layout & Bubbles */
.chat-bubble-wrapper {
    display: flex;
    align-items: flex-end;
    gap: 8px;
    max-width: 82%;
}

.chat-bubble-wrapper.outgoing {
    align-self: flex-end;
    flex-direction: row-reverse;
}

.chat-bubble-wrapper.incoming {
    align-self: flex-start;
}

.chat-avatar-sm {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
}

.chat-bubble {
    padding: 10px 14px;
    border-radius: 16px;
    font-size: 0.875rem;
    line-height: 1.4;
    word-break: break-word;
}

/* Incoming Bubble (Light Mode Defaults) */
.chat-bubble-incoming {
    background-color: var(--bs-secondary-bg, var(--card-bg, #ffffff));
    color: var(--bs-body-color, var(--text-main, #212529));
    border: 1px solid var(--bs-border-color, var(--border-color, #e2e8f0));
    border-bottom-left-radius: 4px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
}

/* Outgoing Bubble */
.chat-bubble-outgoing {
    background-color: #0d6efd;
    color: #ffffff;
    border-bottom-right-radius: 4px;
    box-shadow: 0 2px 4px rgba(13, 110, 253, 0.2);
}

.chat-time {
    font-size: 0.68rem;
    margin-top: 4px;
    display: block;
    opacity: 0.75;
}

.chat-bubble-incoming .chat-time {
    color: var(--bs-secondary-color, var(--text-muted-custom, #6c757d));
}

.chat-bubble-outgoing .chat-time {
    color: rgba(255, 255, 255, 0.85);
    text-align: right;
}

.chat-status-dot {
    width: 8px;
    height: 8px;
    background-color: #198754;
    border-radius: 50%;
    display: inline-block;
}

/* Inputs & Attachment Button */
.chat-input-field {
    background-color: var(--bs-body-bg, var(--input-bg, #ffffff)) !important;
    color: var(--bs-body-color, var(--text-main, #212529)) !important;
    border: 1px solid var(--bs-border-color, var(--border-color, #ced4da)) !important;
}

.chat-input-field::placeholder {
    color: var(--bs-secondary-color, var(--text-muted-custom, #6c757d));
}

.btn-chat-attach {
    background-color: var(--bs-tertiary-bg, var(--btn-bg, #e9ecef));
    color: var(--bs-secondary-color, var(--text-main, #6c757d));
    border: none;
}

/* =========================================================
   TEACHER CHAT MODAL - FULLY ADAPTIVE LIGHT & DARK MODES
   ========================================================= */

/* ---------------------------------------------------------
   1. LIGHT MODE DEFAULTS (Active when page is in Light Mode)
   --------------------------------------------------------- */
#teacherChatModal .modal-content {
    background-color: #ffffff !important;
    color: #212529 !important;
    border: 1px solid #e2e8f0 !important;
}

#teacherChatModal .modal-header,
#teacherChatModal .modal-footer {
    background-color: #ffffff !important;
    border-color: #e2e8f0 !important;
}

#teacherChatModal .modal-title,
#teacherChatModal #chatHeaderName {
    color: #212529 !important;
    font-weight: 700 !important;
}

/* Teacher Position / Role (Visible in Light Mode) */
#teacherChatModal #chatHeaderRole,
#teacherChatModal .text-muted,
#teacherChatModal .extra-small {
    color: #6c757d !important;
}

#teacherChatModal .chat-messages-container {
    background-color: #f8f9fa !important;
}

/* Incoming Bubble - Light Mode */
#teacherChatModal .chat-bubble-incoming {
    background-color: #ffffff !important;
    color: #212529 !important;
    border: 1px solid #e2e8f0 !important;
}

#teacherChatModal .chat-bubble-incoming .chat-time {
    color: #6c757d !important;
}

/* Outgoing Bubble - Accent Blue */
#teacherChatModal .chat-bubble-outgoing {
    background-color: #0d6efd !important;
    color: #ffffff !important;
}

#teacherChatModal .chat-bubble-outgoing .chat-time {
    color: rgba(255, 255, 255, 0.85) !important;
}

/* Inputs & Buttons - Light Mode */
#teacherChatModal .chat-input-field {
    background-color: #ffffff !important;
    color: #212529 !important;
    border: 1px solid #ced4da !important;
}

#teacherChatModal .chat-input-field::placeholder {
    color: #6c757d !important;
}

#teacherChatModal .btn-chat-attach {
    background-color: #f1f5f9 !important;
    color: #495057 !important;
    border: 1px solid #cbd5e1 !important;
}

#teacherChatModal .btn-close {
    filter: none !important;
}


/* ---------------------------------------------------------
   2. DARK MODE OVERRIDES (Applies ONLY when Dark Mode is toggled)
   --------------------------------------------------------- */
[data-bs-theme="dark"] #teacherChatModal .modal-content,
[data-theme="dark"] #teacherChatModal .modal-content,
body.dark-mode #teacherChatModal .modal-content,
body.dark #teacherChatModal .modal-content,
html.dark #teacherChatModal .modal-content {
    background-color: #1a1a1a !important;
    color: #ffffff !important;
    border-color: #333333 !important;
}

[data-bs-theme="dark"] #teacherChatModal .modal-header,
[data-bs-theme="dark"] #teacherChatModal .modal-footer,
[data-theme="dark"] #teacherChatModal .modal-header,
[data-theme="dark"] #teacherChatModal .modal-footer,
body.dark-mode #teacherChatModal .modal-header,
body.dark-mode #teacherChatModal .modal-footer,
body.dark #teacherChatModal .modal-header,
body.dark #teacherChatModal .modal-footer,
html.dark #teacherChatModal .modal-header,
html.dark #teacherChatModal .modal-footer {
    background-color: #1a1a1a !important;
    border-color: #333333 !important;
}

[data-bs-theme="dark"] #teacherChatModal .modal-title,
[data-bs-theme="dark"] #teacherChatModal #chatHeaderName,
[data-theme="dark"] #teacherChatModal .modal-title,
[data-theme="dark"] #teacherChatModal #chatHeaderName,
body.dark-mode #teacherChatModal .modal-title,
body.dark-mode #teacherChatModal #chatHeaderName,
body.dark #teacherChatModal .modal-title,
body.dark #teacherChatModal #chatHeaderName,
html.dark #teacherChatModal .modal-title,
html.dark #teacherChatModal #chatHeaderName {
    color: #ffffff !important;
}

/* Teacher Position / Role (High Contrast Light Grey in Dark Mode) */
[data-bs-theme="dark"] #teacherChatModal #chatHeaderRole,
[data-bs-theme="dark"] #teacherChatModal .text-muted,
[data-theme="dark"] #teacherChatModal #chatHeaderRole,
[data-theme="dark"] #teacherChatModal .text-muted,
body.dark-mode #teacherChatModal #chatHeaderRole,
body.dark-mode #teacherChatModal .text-muted,
body.dark #teacherChatModal #chatHeaderRole,
body.dark #teacherChatModal .text-muted,
html.dark #teacherChatModal #chatHeaderRole,
html.dark #teacherChatModal .text-muted {
    color: #b3b3b3 !important;
}

[data-bs-theme="dark"] #teacherChatModal .chat-messages-container,
[data-theme="dark"] #teacherChatModal .chat-messages-container,
body.dark-mode #teacherChatModal .chat-messages-container,
body.dark #teacherChatModal .chat-messages-container,
html.dark #teacherChatModal .chat-messages-container {
    background-color: #121212 !important;
}

[data-bs-theme="dark"] #teacherChatModal .chat-bubble-incoming,
[data-theme="dark"] #teacherChatModal .chat-bubble-incoming,
body.dark-mode #teacherChatModal .chat-bubble-incoming,
body.dark #teacherChatModal .chat-bubble-incoming,
html.dark #teacherChatModal .chat-bubble-incoming {
    background-color: #2a2a2a !important;
    color: #f0f0f0 !important;
    border-color: #383838 !important;
}

[data-bs-theme="dark"] #teacherChatModal .chat-bubble-incoming .chat-time,
[data-theme="dark"] #teacherChatModal .chat-bubble-incoming .chat-time,
body.dark-mode #teacherChatModal .chat-bubble-incoming .chat-time,
body.dark #teacherChatModal .chat-bubble-incoming .chat-time,
html.dark #teacherChatModal .chat-bubble-incoming .chat-time {
    color: #9e9e9e !important;
}

[data-bs-theme="dark"] #teacherChatModal .chat-input-field,
[data-theme="dark"] #teacherChatModal .chat-input-field,
body.dark-mode #teacherChatModal .chat-input-field,
body.dark #teacherChatModal .chat-input-field,
html.dark #teacherChatModal .chat-input-field {
    background-color: #2a2a2a !important;
    color: #ffffff !important;
    border-color: #383838 !important;
}

[data-bs-theme="dark"] #teacherChatModal .chat-input-field::placeholder,
[data-theme="dark"] #teacherChatModal .chat-input-field::placeholder,
body.dark-mode #teacherChatModal .chat-input-field::placeholder,
body.dark #teacherChatModal .chat-input-field::placeholder,
html.dark #teacherChatModal .chat-input-field::placeholder {
    color: #888888 !important;
}

[data-bs-theme="dark"] #teacherChatModal .btn-chat-attach,
[data-theme="dark"] #teacherChatModal .btn-chat-attach,
body.dark-mode #teacherChatModal .btn-chat-attach,
body.dark #teacherChatModal .btn-chat-attach,
html.dark #teacherChatModal .btn-chat-attach {
    background-color: #2a2a2a !important;
    color: #b3b3b3 !important;
    border-color: #383838 !important;
}

[data-bs-theme="dark"] #teacherChatModal .btn-close,
[data-theme="dark"] #teacherChatModal .btn-close,
body.dark-mode #teacherChatModal .btn-close,
body.dark #teacherChatModal .btn-close,
html.dark #teacherChatModal .btn-close {
    filter: invert(1) grayscale(100%) brightness(200%) !important;
}



    </style>
</head>