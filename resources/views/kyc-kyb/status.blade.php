<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Status - AI Trading Platform</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            color: #1e293b;
        }

        .status-container {
            max-width: 680px;
            width: 100%;
            text-align: center;
        }

        .status-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 40px;
            background: linear-gradient(135deg, #fef3c7 0%, #fbbf24 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            animation: pulse 3s ease-in-out infinite;
            box-shadow: 0 8px 32px rgba(245, 158, 11, 0.2);
        }

        .status-icon.rejected {
            background: linear-gradient(135deg, #fee2e2 0%, #fca5a5 100%);
            color: #dc2626;
            box-shadow: 0 8px 32px rgba(220, 38, 38, 0.2);
        }

        .status-icon.approved {
            background: linear-gradient(135deg, #d1fae5 0%, #34d399 100%);
            color: #059669;
            box-shadow: 0 8px 32px rgba(16, 185, 129, 0.2);
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        .status-title {
            font-size: 42px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 20px;
            letter-spacing: -1px;
        }

        .status-subtitle {
            font-size: 20px;
            color: #64748b;
            margin-bottom: 60px;
            line-height: 1.6;
            font-weight: 400;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .progress-section {
            margin-bottom: 60px;
        }

        .progress-title {
            font-size: 18px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 32px;
        }

        .progress-timeline {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 60px;
            margin-bottom: 32px;
            position: relative;
        }

        .progress-timeline::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            height: 3px;
            background: #e2e8f0;
            z-index: 1;
        }

        .progress-timeline::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #10b981, #059669);
            z-index: 2;
            animation: progressGrow 1s ease-out;
        }

        @keyframes progressGrow {
            from { width: 0; }
            to { width: 100px; }
        }

        .progress-step {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            position: relative;
            z-index: 3;
            background: white;
            border: 4px solid #e2e8f0;
            color: #9ca3af;
            font-weight: 600;
        }

        .progress-step.completed {
            background: linear-gradient(135deg, #10b981, #059669);
            border-color: #10b981;
            color: white;
        }

        .progress-step.active {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border-color: #f59e0b;
            color: white;
            animation: glow 2s ease-in-out infinite;
        }

        .progress-step.rejected {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            border-color: #dc2626;
            color: white;
        }

        @keyframes glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4); }
            50% { box-shadow: 0 0 0 12px rgba(245, 158, 11, 0); }
        }

        .progress-labels {
            display: flex;
            justify-content: center;
            gap: 60px;
        }

        .progress-label {
            font-size: 14px;
            color: #6b7280;
            font-weight: 500;
            text-align: center;
        }

        .progress-label.completed {
            color: #10b981;
            font-weight: 600;
        }

        .progress-label.active {
            color: #f59e0b;
            font-weight: 600;
        }

        .progress-label.rejected {
            color: #dc2626;
            font-weight: 600;
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 32px;
            margin-bottom: 40px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .info-title {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .info-value {
            font-size: 28px;
            font-weight: 700;
            color: #3b82f6;
        }

        .rejection-card {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .rejection-card .info-title {
            color: #991b1b;
        }

        .rejection-card .info-value {
            color: #dc2626;
            font-size: 18px;
            font-weight: 600;
        }

        .rejection-reason {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
            text-align: left;
        }

        .rejection-reason-title {
            font-size: 14px;
            font-weight: 600;
            color: #991b1b;
            margin-bottom: 8px;
        }

        .rejection-reason-text {
            font-size: 14px;
            color: #7f1d1d;
            line-height: 1.5;
        }

        .actions {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 16px 32px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            min-width: 160px;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 14px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #4b5563;
            border: 2px solid #e5e7eb;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .btn-secondary:hover {
            background: #f9fafb;
            border-color: #d1d5db;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            box-shadow: 0 4px 14px rgba(220, 38, 38, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
        }

        .contact-section {
            padding-top: 40px;
            border-top: 1px solid #e5e7eb;
        }

        .contact-text {
            font-size: 16px;
            color: #6b7280;
            margin-bottom: 24px;
        }

        .contact-links {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .contact-link {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .contact-link:hover {
            color: #2563eb;
        }

        /* Status-specific styles */
        .status-pending .progress-timeline::after {
            width: 100px;
        }

        .status-rejected .progress-timeline::after {
            width: 100px;
            background: linear-gradient(90deg, #dc2626, #b91c1c);
        }

        .status-approved .progress-timeline::after {
            width: 300px;
            background: linear-gradient(90deg, #10b981, #059669);
        }

        @media (max-width: 768px) {
            .status-container {
                padding: 0 16px;
            }

            .status-title {
                font-size: 32px;
            }

            .status-subtitle {
                font-size: 18px;
                margin-bottom: 40px;
            }

            .progress-timeline {
                gap: 40px;
            }

            .progress-timeline::before {
                width: 200px;
            }

            .status-pending .progress-timeline::after,
            .status-rejected .progress-timeline::after {
                width: 60px;
            }

            .status-approved .progress-timeline::after {
                width: 200px;
            }

            .progress-labels {
                gap: 40px;
            }

            .progress-step {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }

            .info-card {
                padding: 24px 20px;
            }

            .actions {
                flex-direction: column;
                align-items: center;
            }

            .contact-links {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    @if($kyc->status == "pending" )
        <!-- PENDING STATUS (default) -->
        <div class="status-container status-pending">
            <div class="status-icon">
                ⏳
            </div>

            <h1 class="status-title">Verification in Progress</h1>
            <p class="status-subtitle">
                Our security team is carefully reviewing your documents to ensure compliance with regulatory standards.
            </p>

            <div class="progress-section">
                <h3 class="progress-title">Verification Progress</h3>
                
                <div class="progress-timeline">
                    <div class="progress-step completed">✓</div>
                    <div class="progress-step active">📋</div>
                    <div class="progress-step">🎉</div>
                </div>
                
                <div class="progress-labels">
                    <div class="progress-label completed">Submitted</div>
                    <div class="progress-label active">Under Review</div>
                    <div class="progress-label">Approved</div>
                </div>
            </div>

            <div class="info-card">
                <div class="info-title">
                    ⏱️ Estimated Processing Time
                </div>
                <div class="info-value">2-3 Business Days</div>
            </div>

            <div class="actions">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    📊 Go to Dashboard
                </a>
                <button class="btn btn-secondary" onclick="window.location.reload()">
                    🔄 Refresh Status
                </button>
            </div>

            <div class="contact-section">
                <p class="contact-text">
                    Questions about your verification?
                </p>
                <div class="contact-links">
                    <a href="mailto:support@aitrading.com" class="contact-link">
                        📧 Email Support
                    </a>
                    <a href="tel:+1234567890" class="contact-link">
                        📞 Call Us
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if($kyc->status == "rejected" )
        <!-- REJECTED STATUS (uncomment to test) -->
        <div class="status-container status-rejected">
            <div class="status-icon rejected">
                ❌
            </div>

            <h1 class="status-title">Verification Rejected</h1>
            <p class="status-subtitle">
                We were unable to verify your documents. Please review the feedback below and resubmit with the necessary corrections.
            </p>

            <div class="progress-section">
                <h3 class="progress-title">Verification Progress</h3>
                
                <div class="progress-timeline">
                    <div class="progress-step completed">✓</div>
                    <div class="progress-step rejected">❌</div>
                    <div class="progress-step">🎉</div>
                </div>
                
                <div class="progress-labels">
                    <div class="progress-label completed">Submitted</div>
                    <div class="progress-label rejected">Rejected</div>
                    <div class="progress-label">Approved</div>
                </div>
            </div>

            <div class="info-card rejection-card">
                <div class="info-title">
                    ⚠️ Action Required
                </div>
                <div class="info-value">Please Resubmit Documents</div>
                
                <div class="rejection-reason">
                    <div class="rejection-reason-title">Reason for Rejection:</div>
                    <div class="rejection-reason-text">
                        • Document quality is too low - please provide a clearer image<br>
                        • ID document appears to be expired<br>
                        • Proof of address document is older than 3 months
                    </div>
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('kyc-kyb.form') }}" class="btn btn-danger">
                    📝 Resubmit Documents
                </a>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    📊 Go to Dashboard
                </a>
            </div>

            <div class="contact-section">
                <p class="contact-text">
                    Need help with your documents?
                </p>
                <div class="contact-links">
                    <a href="mailto:support@aitrading.com" class="contact-link">
                        📧 Email Support
                    </a>
                    <a href="tel:+1234567890" class="contact-link">
                        📞 Call Us
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if($kyc->status == "approved" )
        <div class="status-container status-approved">
            <div class="status-icon approved">
                🎉
            </div>

            <h1 class="status-title">Verification Approved</h1>
            <p class="status-subtitle">
                Congratulations! Your documents have been successfully verified. You now have full access to our AI trading platform.
            </p>

            <div class="progress-section">
                <h3 class="progress-title">Verification Progress</h3>
                
                <div class="progress-timeline">
                    <div class="progress-step completed">✓</div>
                    <div class="progress-step completed">✓</div>
                    <div class="progress-step completed">🎉</div>
                </div>
                
                <div class="progress-labels">
                    <div class="progress-label completed">Submitted</div>
                    <div class="progress-label completed">Reviewed</div>
                    <div class="progress-label completed">Approved</div>
                </div>
            </div>

            <div class="info-card">
                <div class="info-title">
                    🎯 Account Status
                </div>
                <div class="info-value" style="color: #059669;">Fully Verified</div>
            </div>

            <div class="actions">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    🚀 Start Trading
                </a>
                <a href="#" class="btn btn-secondary">
                    👤 View Profile
                </a>
            </div>

            <div class="contact-section">
                <p class="contact-text">
                    Ready to explore our platform features?
                </p>
                <div class="contact-links">
                    <a href="mailto:support@aitrading.com" class="contact-link">
                        📧 Contact Support
                    </a>
                    <a href="#" class="contact-link">
                        📚 View Tutorials
                    </a>
                </div>
            </div>
        </div>
    @endif

    <script>
        // Auto-refresh status every 60 seconds
        setInterval(() => {
            // In real app, this would check verification status via API
            console.log('Checking verification status...');
        }, 60000);

        // Smooth entrance animation
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.status-container');
            container.style.opacity = '0';
            container.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                container.style.transition = 'all 0.8s ease-out';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 150);
        });
    </script>
</body>
</html>