<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AI Trading Platform</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #1e293b 0%, #334155 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 32px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .logo-text {
            font-size: 20px;
            font-weight: 700;
        }

        .admin-tag {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 4px;
        }

        .sidebar-nav {
            padding: 24px 0;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 24px;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            font-weight: 500;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .nav-item.active {
            background: rgba(59, 130, 246, 0.1);
            color: #60a5fa;
            border-left-color: #3b82f6;
        }

        .nav-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .logout-section {
            position: absolute;
            bottom: 24px;
            left: 0;
            right: 0;
            padding: 0 24px;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px 16px;
            background: rgba(239, 68, 68, 0.1);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            min-height: 100vh;
        }

        .main-header {
            background: white;
            padding: 24px 32px;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 16px;
        }

        .content-area {
            padding: 32px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .stat-title {
            font-size: 14px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-icon.pending {
            background: linear-gradient(135deg, #fef3c7, #fbbf24);
            color: #d97706;
        }

        .stat-icon.approved {
            background: linear-gradient(135deg, #d1fae5, #34d399);
            color: #059669;
        }

        .stat-icon.rejected {
            background: linear-gradient(135deg, #fee2e2, #fca5a5);
            color: #dc2626;
        }

        .stat-icon.total {
            background: linear-gradient(135deg, #dbeafe, #93c5fd);
            color: #2563eb;
        }

        .stat-value {
            font-size: 36px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .stat-change {
            font-size: 12px;
            font-weight: 500;
            color: #10b981;
        }

        /* Applications Table */
        .applications-section {
            background: white;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .section-header {
            padding: 24px 32px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #1e293b;
        }

        .filter-tabs {
            display: flex;
            gap: 4px;
        }

        .filter-tab {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            background: transparent;
            color: #64748b;
        }

        .filter-tab.active {
            background: #3b82f6;
            color: white;
        }

        .filter-tab:hover:not(.active) {
            background: #f1f5f9;
            color: #374151;
        }

        .table-container {
            overflow-x: auto;
        }

        .applications-table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-header {
            background: #f8fafc;
        }

        .table-header th {
            padding: 16px 24px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-row {
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.2s ease;
        }

        .table-row:hover {
            background: #f8fafc;
        }

        .table-cell {
            padding: 20px 24px;
            font-size: 14px;
            color: #374151;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .user-details {
            flex: 1;
        }

        .user-name {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 2px;
        }

        .user-email {
            font-size: 12px;
            color: #64748b;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: #fef3c7;
            color: #d97706;
        }

        .status-approved {
            background: #d1fae5;
            color: #059669;
        }

        .status-rejected {
            background: #fee2e2;
            color: #dc2626;
        }

        .date-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .date-primary {
            font-weight: 500;
            color: #374151;
        }

        .date-secondary {
            font-size: 12px;
            color: #64748b;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-view {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
        }

        .btn-view:hover {
            background: #dbeafe;
            transform: translateY(-1px);
        }

        .btn-approve {
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        .btn-approve:hover {
            background: #dcfce7;
            transform: translateY(-1px);
        }

        .btn-reject {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .btn-reject:hover {
            background: #fee2e2;
            transform: translateY(-1px);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 32px;
            color: #64748b;
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        .empty-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #374151;
        }

        .empty-description {
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .content-area {
                padding: 24px 16px;
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 16px;
            }

            .main-header {
                padding: 16px 20px;
            }

            .section-header {
                padding: 20px 24px;
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .table-container {
                font-size: 12px;
            }

            .table-cell {
                padding: 16px 12px;
            }

            .user-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <div class="logo-icon">🚀</div>
                    <div>
                        <div class="logo-text">AI Trading</div>
                        <div class="admin-tag">Admin Panel</div>
                    </div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <!-- <a href="#" class="nav-item">
                    <div class="nav-icon">📊</div>
                    <span>Dashboard</span>
                </a> -->
                <a href="#" class="nav-item active">
                    <div class="nav-icon">📋</div>
                    <span>KYC Applications</span>
                </a>
                <!-- <a href="#" class="nav-item">
                    <div class="nav-icon">⚙️</div>
                    <span>Settings</span>
                </a> -->
            </nav>

            <div class="logout-section">
                <a href="#" class="logout-btn">
                    <span>🚪</span>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
             @yield('content')
        </main>
    </div>

    <script>
        // Filter functionality
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                // Update active tab
                document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                // Filter table rows (simplified demo)
                const filter = this.dataset.filter;
                const rows = document.querySelectorAll('.table-row');

                rows.forEach(row => {
                    if (filter === 'all') {
                        row.style.display = '';
                    } else {
                        const status = row.querySelector('.status-badge').textContent.toLowerCase();
                        row.style.display = status.includes(filter) ? '' : 'none';
                    }
                });
            });
        });

        // Action button handlers
        document.querySelectorAll('.btn-approve').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Are you sure you want to approve this application?')) {
                    const row = this.closest('.table-row');
                    const statusBadge = row.querySelector('.status-badge');
                    statusBadge.textContent = 'Approved';
                    statusBadge.className = 'status-badge status-approved';

                    // Hide approve/reject buttons
                    row.querySelector('.action-buttons').innerHTML = '<a href="#" class="action-btn btn-view">📄 View</a>';
                }
            });
        });

        document.querySelectorAll('.btn-reject').forEach(btn => {
            btn.addEventListener('click', function() {
                const reason = prompt('Please provide a reason for rejection:');
                if (reason && reason.trim()) {
                    const row = this.closest('.table-row');
                    const statusBadge = row.querySelector('.status-badge');
                    statusBadge.textContent = 'Rejected';
                    statusBadge.className = 'status-badge status-rejected';

                    // Hide approve/reject buttons
                    row.querySelector('.action-buttons').innerHTML = '<a href="#" class="action-btn btn-view">📄 View</a>';
                }
            });
        });

        // Responsive sidebar toggle (for mobile)
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('open');
        }

        // Auto-refresh data every 30 seconds
        setInterval(() => {
            console.log('Refreshing KYC applications data...');
            // In real app, this would fetch updated data
        }, 30000);
    </script>
</body>
</html>
