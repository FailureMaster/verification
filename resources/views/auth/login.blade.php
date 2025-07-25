<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlphaTradeCRM - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Styles */
        .header {
            background: #1e2334;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
            z-index: 1001;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 6px;
        }

        .panel-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .brand-info h1 {
            color: white;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .brand-info p {
            color: #94a3b8;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 5px;
            z-index: 1001;
            position: relative;
        }

        .mobile-menu-btn i {
            transition: transform 0.3s ease;
        }

        .mobile-menu-btn.active i {
            transform: rotate(90deg);
        }

        /* Navigation Menu */
        .nav-menu {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .nav-menu a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            font-size: 15px;
        }

        .nav-menu a:hover {
            color: white;
        }

        /* Mobile Navigation Overlay */
        .mobile-nav-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mobile-nav-overlay.active {
            opacity: 1;
        }

        /* Mobile Navigation Menu */
        .mobile-nav {
            display: none;
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100%;
            background: #1e2334;
            z-index: 1000;
            transition: right 0.3s ease;
            padding: 80px 30px 30px;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        }

        .mobile-nav.active {
            right: 0;
        }

        .mobile-nav a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: color 0.3s ease;
        }

        .mobile-nav a:hover {
            color: white;
        }

        .mobile-nav .header-buttons {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .mobile-nav .btn-signup,
        .mobile-nav .btn-login {
            text-align: center;
            padding: 12px 20px;
        }

        .header-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .btn-signup {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 50%, #c084fc 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-login {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 50%, #c084fc 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-signup:hover, .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.4);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .login-container {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            width: 100%;
            max-width: 1200px;
            min-height: 700px;
            display: flex;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
        }

        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #1f0f3c 0%, #8347be 50%, #060408 100%);
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .panel-content {
            position: relative;
            z-index: 2;
        }

        .brand-title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 18px;
            opacity: 0.9;
            font-weight: 400;
            line-height: 1.5;
            max-width: 400px;
            margin-bottom: 50px;
        }

        .features-list {
            text-align: left;
            max-width: 420px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 24px;
            font-size: 15px;
            opacity: 0.95;
        }

        .feature-icon {
            width: 28px;
            height: 28px;
            margin-right: 16px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .feature-content h4 {
            font-weight: 600;
            margin-bottom: 4px;
            font-size: 16px;
        }

        .feature-content p {
            font-size: 14px;
            opacity: 0.8;
            line-height: 1.4;
        }

        .right-panel {
            flex: 1;
            padding: 80px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 32px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 16px;
            color: #718096;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 28px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
        }

        .form-input {
            width: 100%;
            padding: 18px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #ffffff;
            outline: none;
        }

        .form-input:focus {
            border-color: #1e74ff;
            box-shadow: 0 0 0 3px rgba(30, 116, 255, 0.1);
        }

        .form-input::placeholder {
            color: #a0aec0;
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #718096;
            cursor: pointer;
            font-size: 20px;
            padding: 5px;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .remember-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .remember-input {
            width: 18px;
            height: 18px;
            accent-color: #1e74ff;
        }

        .remember-label {
            font-size: 14px;
            color: #4a5568;
            cursor: pointer;
            font-weight: 500;
        }

        .forgot-link {
            font-size: 14px;
            color: #1e74ff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #1559cc;
        }

        .login-button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 50%, #c084fc 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.4);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .signup-section {
            text-align: center;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e2e8f0;
        }

        .signup-text {
            font-size: 14px;
            color: #718096;
        }

        .signup-text a {
            color: #1e74ff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .signup-text a:hover {
            color: #1559cc;
        }

        /* Footer Styles */
        .footer {
            background: #f1f5f9;
            padding: 60px 0 30px;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            color: #1a202c;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section ul li a {
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #1e74ff;
        }

        .contact-info {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .contact-info strong {
            color: #1a202c;
        }

        .footer-bottom {
            border-top: 1px solid #e2e8f0;
            padding-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-logo-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #1e74ff 0%, #0066ff 100%);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .copyright {
            color: #64748b;
            font-size: 14px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 36px;
            height: 36px;
            background: #e2e8f0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .social-links a:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .social-links a.facebook:hover {
            background: #1877f2;
            color: white;
        }

        .social-links a.twitter:hover {
            background: #1da1f2;
            color: white;
        }

        .social-links a.google:hover {
            background: #dd4b39;
            color: white;
        }

        .social-links a.instagram:hover {
            background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
            color: white;
        }

        .social-links a.linkedin:hover {
            background: #0077b5;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .nav-menu {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .mobile-nav {
                display: block;
            }

            .mobile-nav-overlay {
                display: block;
            }

            .header-buttons {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 500px;
                min-height: auto;
            }

            .left-panel {
                padding: 40px 30px;
                min-height: 400px;
            }

            .brand-title {
                font-size: 28px;
            }

            .brand-subtitle {
                font-size: 16px;
            }

            .features-list {
                display: none;
            }

            .right-panel {
                padding: 40px 30px;
            }

            .form-title {
                font-size: 28px;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .form-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 0;
            }

            .main-content {
                padding: 20px 10px;
            }

            .right-panel {
                padding: 30px 20px;
            }

            .left-panel {
                padding: 30px 20px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .header-container {
                padding: 0 15px;
            }

            .brand-info h1 {
                font-size: 18px;
            }

            .mobile-nav {
                width: 280px;
                right: -280px;
                padding: 70px 25px 25px;
            }

            .mobile-nav a {
                font-size: 15px;
                padding: 12px 0;
            }
        }

        /* Prevent body scroll when mobile menu is open */
        body.mobile-menu-open {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo-section">

                    <img src="{{asset('img/alpha-trade.png')}}" alt="Alpha Trade Logo" style="width: 196px;">


            </div>

            <!-- Desktop Navigation -->
            <nav class="nav-menu">
                <a href="https://alphatradecrm.com/">Home</a>
                <a href="https://alphatradecrm.com/about-us/">About Us</a>
                <a href="https://alphatradecrm.com/features/">Features</a>
                <a href="https://alphatradecrm.com/faq/">FAQ</a>
                <a href="https://alphatradecrm.com/pricing/">Pricing</a>
                <a href="https://alphatradecrm.com/contact/">Contact</a>
            </nav>

            <!-- Desktop Header Buttons -->
            <div class="header-buttons">
                <a href="https://verification.tradehousecrm.com/register" class="btn-signup">Sign Here</a>
                <a href="https://verification.tradehousecrm.com/login" class="btn-login">Login</a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Navigation Overlay -->
        <div class="mobile-nav-overlay" onclick="closeMobileMenu()"></div>

        <!-- Mobile Navigation Menu -->
        <nav class="mobile-nav">
            <a href="#home" onclick="closeMobileMenu()">Home</a>
            <a href="#about" onclick="closeMobileMenu()">About Us</a>
            <a href="#features" onclick="closeMobileMenu()">Features</a>
            <a href="#faq" onclick="closeMobileMenu()">FAQ</a>
            <a href="#pricing" onclick="closeMobileMenu()">Pricing</a>
            <a href="#contact" onclick="closeMobileMenu()">Contact</a>

            <div class="header-buttons">
                <a href="#signup" class="btn-signup" onclick="closeMobileMenu()">Sign Here</a>
                <a href="#login" class="btn-login" onclick="closeMobileMenu()">Login</a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="login-container">
            <div class="left-panel">
                <div class="panel-content">
                   <div class="panel-logo">
                        <img src="{{asset('img/alpha-trade-logo-only.png')}}" alt="AlphaTradeCRM Logo" style="width: 80px; object-fit: contain; margin-bottom: 20px;">
                    </div>
                    <h1 class="brand-title">AlphaTradeCRM</h1>
                    <p class="brand-subtitle">The Complete Solution for Brokers and Traders. Empower your brokerage with a unified platform combining advanced trading tools and a robust CRM system—built for performance, compliance, and growth.</p>

                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-rocket"></i></div>
                            <div class="feature-content">
                                <h4>All-in-One Broker Suite</h4>
                                <p>Manage clients, leads, and trading accounts seamlessly with full CRM functionality. Monitor lead performance, trading activity, and sales in one dashboard.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-chart-bar"></i></div>
                            <div class="feature-content">
                                <h4>Live Trading Platform</h4>
                                <p>Real-time quotes, charts, and execution for Forex, Stocks, Crypto, and more. Fully customizable trading terminal tailored to your brand and needs.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                            <div class="feature-content">
                                <h4>Secure & Compliant</h4>
                                <p>Enterprise-grade encryption, GDPR-ready, with full audit trails and permission-based access control.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-sync-alt"></i></div>
                            <div class="feature-content">
                                <h4>CRM Automation</h4>
                                <p>Automate lead flows, assign agents, track follow-ups, and boost conversions with integrated tools.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-globe"></i></div>
                            <div class="feature-content">
                                <h4>Multi-Language Support</h4>
                                <p>Localized user experiences for global client bases.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-lightbulb"></i></div>
                            <div class="feature-content">
                                <h4>Powerful Insights</h4>
                                <p>Get actionable analytics to optimize client acquisition, retention, and trading behavior.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-panel">
                <div class="form-header">
                    <h2 class="form-title">Welcome Back</h2>
                    <p class="form-subtitle">Enter your credentials to access your trading dashboard</p>
                </div>

              <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="Enter your email address"
                            required
                        >
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <div class="password-field">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-input"
                                placeholder="Enter your password"
                                required
                            >
                            <button type="button" class="password-toggle" onclick="togglePassword()">👁️</button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="form-options">
                        <div class="remember-group">
                            <input type="checkbox" id="remember" name="remember" class="remember-input">
                            <label for="remember" class="remember-label">Remember me</label>
                        </div>
                        <a href="{{route('password.email')}}" class="forgot-link">Forgot password?</a>
                    </div>

                    <button type="submit" class="login-button">
                        Access Trading Platform
                    </button>
                </form>

                <div class="signup-section">
                    <p class="signup-text">
                        Don't have an account?
                         <a href="{{route('register')}}">Request Demo Access</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Help & Support</h3>
                    <ul>
                        <li><a href="https://alphatradecrm.com/how-it-work/">How It Works</a></li>
                        <li><a href="https://alphatradecrm.com/24x7-customer-support/t">Customer Support</a></li>
                        <li><a href="https://alphatradecrm.com/term-condition/">Term & Condition</a></li>
                        <li><a href="https://alphatradecrm.com/privacy-policy/">Privacy Policy</a></li>
                        <li><a href="https://alphatradecrm.com/cookie-policy/">Cookie Policy</a></li>
                        <li><a href="https://alphatradecrm.com/faq/">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Platform Features</h3>
                    <ul>
                        <li><a href="https://alphatradecrm.com/lead-management/">Lead Management</a></li>
                        <li><a href="https://alphatradecrm.com/client-portal/">Client Portal</a></li>
                        <li><a href="https://alphatradecrm.com/exposure-monitoring/">Exposure Monitoring</a></li>
                        <li><a href="https://alphatradecrm.com/crm-automation-tool/">CRM Automation Tools</a></li>
                        <li><a href="https://alphatradecrm.com/multi-language-support/">Multi-Language Support</a></li>
                        <li><a href="https://alphatradecrm.com/access-control/">Access Control</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Company & Legal</h3>
                    <ul>
                        <li><a href="https://alphatradecrm.com/about-us/">About Us</a></li>
                        <li><a href="https://alphatradecrm.com/careers/">Careers</a></li>
                        <li><a href="https://alphatradecrm.com/partner-program/">Partner Program</a></li>
                        <li><a href="https://alphatradecrm.com/terms-of-service/">Terms of Service</a></li>
                        <li><a href="https://alphatradecrm.com/refund-policy/">Refund Policy</a></li>
                        <li><a href="https://alphatradecrm.com/aml-kyc-policy/">AML & KYC Policy</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <div class="contact-info">
                        <p><strong>Email:</strong> info@alphatradecrm.com</p>
                        <p><strong>Phone:</strong> +447577088847</p>
                        <p><strong>Address:</strong></p>
                        <p>60 Sloane avenue sw3 3dl south ken</p>
                        <p>London, The UK</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-logo">
                   <img src="{{asset('img/alpha-trade.png')}}" alt="Alpha Trade Logo" style="width: 196px;">
                </div>
                <div class="copyright">
                    <p>Copyright © 2025 Alpha Trade, All rights reserved.</p>
                </div>
                <div class="social-links">
                    <a href="#facebook" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#twitter" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#google" class="google"><i class="fab fa-google"></i></a>
                    <a href="#instagram" class="instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#linkedin" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        function toggleMobileMenu() {
            const mobileNav = document.querySelector('.mobile-nav');
            const overlay = document.querySelector('.mobile-nav-overlay');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            const body = document.body;

            const isOpen = mobileNav.classList.contains('active');

            if (isOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        }

        function openMobileMenu() {
            const mobileNav = document.querySelector('.mobile-nav');
            const overlay = document.querySelector('.mobile-nav-overlay');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            const body = document.body;

            mobileNav.classList.add('active');
            overlay.classList.add('active');
            menuBtn.classList.add('active');
            body.classList.add('mobile-menu-open');
        }

        function closeMobileMenu() {
            const mobileNav = document.querySelector('.mobile-nav');
            const overlay = document.querySelector('.mobile-nav-overlay');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            const body = document.body;

            mobileNav.classList.remove('active');
            overlay.classList.remove('active');
            menuBtn.classList.remove('active');
            body.classList.remove('mobile-menu-open');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileNav = document.querySelector('.mobile-nav');
            const menuBtn = document.querySelector('.mobile-menu-btn');

            if (!mobileNav.contains(event.target) && !menuBtn.contains(event.target)) {
                closeMobileMenu();
            }
        });

        // Close mobile menu on window resize if it gets too large
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1024) {
                closeMobileMenu();
            }
        });

        // Password toggle functionality
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.querySelector('.password-toggle');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = '👁️';
            }
        }

        // Add smooth focus transitions
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translateY(-1px)';
            });

            input.addEventListener('blur', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Prevent scrolling when mobile menu is open
        document.addEventListener('touchmove', function(e) {
            if (document.body.classList.contains('mobile-menu-open')) {
                e.preventDefault();
            }
        }, { passive: false });
    </script>
</body>
</html>
