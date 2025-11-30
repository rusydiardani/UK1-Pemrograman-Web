<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title><?= $title ?? 'Sistem Perkuliahan' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #7c3aed;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --dark-color: #1f2937;
            --light-color: #f9fafb;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .sidebar {
            background: linear-gradient(180deg, #1f2937 0%, #111827 100%);
            min-height: 100vh;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar .nav-link {
            color: #9ca3af;
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: var(--primary-color);
            color: white;
            transform: translateX(5px);
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
        }
        
        .main-content {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 8px;
            padding: 10px 25px;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
        }
        
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .table thead {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
        }
        
        .badge {
            padding: 8px 15px;
            border-radius: 20px;
        }
        
        .user-info {
            background: rgba(255,255,255,0.1);
            padding: 15px;
            border-radius: 10px;
            margin: 20px 10px;
            color: white;
        }
        
        .user-info small {
            color: #d1d5db !important;
            opacity: 0.9;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        
        .stat-card i {
            font-size: 3rem;
            opacity: 0.3;
        }
        
        /* Pagination Styling */
        .pagination-wrapper {
            background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
            padding: 25px;
            border-radius: 15px;
            border: 2px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .pagination-info {
            font-size: 0.95rem;
            color: #6b7280;
        }
        
        .pagination-info strong {
            color: var(--primary-color);
            font-size: 1.1rem;
        }
        
        /* Pagination Links Styling */
        nav[aria-label="Pagination"] .pagination {
            margin: 0;
            gap: 8px;
            display: flex;
            flex-wrap: wrap;
        }
        
        nav[aria-label="Pagination"] .pagination .page-item {
            margin: 0;
        }
        
        nav[aria-label="Pagination"] .pagination .page-link {
            color: var(--primary-color);
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 10px 18px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: white;
            min-width: 45px;
            text-align: center;
        }
        
        nav[aria-label="Pagination"] .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
            transform: translateY(-3px);
        }
        
        nav[aria-label="Pagination"] .pagination .page-link:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }
        
        nav[aria-label="Pagination"] .pagination .page-item.disabled .page-link {
            color: #9ca3af;
            background-color: #f3f4f6;
            border-color: #e5e7eb;
            cursor: not-allowed;
            opacity: 0.6;
        }
        
        nav[aria-label="Pagination"] .pagination .page-item.disabled .page-link:hover {
            transform: none;
            box-shadow: none;
            background-color: #f3f4f6;
            color: #9ca3af;
        }
        
        /* Table Enhancements */
        .table tbody tr {
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background-color: #f3f4f6;
            transform: scale(1.01);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .table thead th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 15px 12px;
        }
        
        .table tbody td {
            vertical-align: middle;
            padding: 12px;
        }
        
        .btn-group .btn {
            border-radius: 0;
        }
        
        .btn-group .btn:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }
        
        .btn-group .btn:last-child {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        
        /* Button Enhancements */
        .btn-sm {
            padding: 8px 16px;
            font-size: 0.875rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: none;
            color: white;
        }
        
        .btn-warning:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
            color: white;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border: none;
        }
        
        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            border: none;
        }
        
        .btn-secondary:hover {
            background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(107, 114, 128, 0.4);
        }
    </style>
</head>
<body>
