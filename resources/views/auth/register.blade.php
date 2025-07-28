<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlphaTradeCRM - Register</title>
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

        .register-container {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            width: 100%;
            max-width: 1400px;
            min-height: 800px;
            display: flex;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
        }

        .left-panel {
            flex: 0 0 40%;
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

        .logo-section {
            position: relative;
            z-index: 2;
        }

        .logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 25px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .logo svg {
            width: 50px;
            height: 50px;
            fill: white;
        }

        .brand-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 400;
            line-height: 1.5;
            max-width: 300px;
            margin-bottom: 40px;
        }

        .benefits-list {
            text-align: left;
            max-width: 280px;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            font-size: 14px;
            opacity: 0.9;
        }

        .benefit-icon {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            margin-top: 2px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            flex-shrink: 0;
        }

        .right-panel {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-height: 100vh;
            overflow-y: auto;
        }

        .form-header {
            margin-bottom: 32px;
            text-align: center;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 15px;
            color: #718096;
            font-weight: 400;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 16px 18px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #ffffff;
            outline: none;
        }

        .form-input:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }

        .form-input::placeholder {
            color: #a0aec0;
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #718096;
            cursor: pointer;
            font-size: 18px;
            padding: 5px;
        }

        .password-requirements {
            margin-top: 8px;
            font-size: 12px;
            color: #718096;
        }

        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 4px;
        }

        .requirement-icon {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 8px;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
        }

        .requirement.valid .requirement-icon {
            background: #10b981;
            color: white;
        }

        .register-button {
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
            margin-bottom: 24px;
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.4);
        }

        .register-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .login-link {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .login-text {
            font-size: 14px;
            color: #718096;
        }

        .login-text a {
            color: #7c3aed;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-text a:hover {
            color: #5b21b6;
        }

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
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
            color: #7c3aed;
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
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
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

            .form-grid {
                grid-template-columns: 1fr;
            }

            .register-container {
                max-width: 600px;
            }

            .left-panel {
                display: none;
            }

            .right-panel {
                padding: 40px 30px;
            }
        }

        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 20px;
                text-align: center;
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

            .form-title {
                font-size: 24px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .header-container {
                padding: 0 15px;
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
                <a href="https://verification.alphatradecrm.com/register" class="btn-signup">Sign Here</a>
                <a href="https://verification.alphatradecrm.com/login" class="btn-login">Login</a>
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
        <div class="register-container">
            <div class="left-panel">
                <div class="logo-section">
                    <div class="logo">
                      <div class="panel-logo">
                        <img src="{{asset('img/alpha-trade-logo-only.png')}}" alt="AlphaTradeCRM Logo" style="width: 80px; object-fit: contain; margin-bottom: 20px;">
                    </div>
                    </div>
                    <h1 class="brand-title">Join Alpha Trade CRM</h1>
                    <p class="brand-subtitle">Get access to our exclusive trading platform and start your journey to smarter investing with our comprehensive CRM suite</p>
                </div>

                <div class="benefits-list">
                    <div class="benefit-item">
                        <div class="benefit-icon">✓</div>
                        <span>All-in-One Broker & CRM Suite</span>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">✓</div>
                        <span>Real-time trading & market analysis</span>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">✓</div>
                        <span>Dedicated support team</span>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">✓</div>
                        <span>Advanced risk management tools</span>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">✓</div>
                        <span>Multi-language platform support</span>
                    </div>
                </div>
            </div>

            <div class="right-panel">
                <div class="form-header">
                    <h2 class="form-title">Create Your Account</h2>
                    <p class="form-subtitle">Fill in your details to get started with our platform</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="username">Username</label>
                            <input
                                type="text"
                                id="username"
                                name="username"
                                class="form-input"
                                placeholder="Choose a username"
                                value="{{ old('username') }}"
                                required
                            >
                            @if($errors->get('username'))
                                @foreach($errors->get('username') as $error)
                                    <div class="error-message">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-input"
                                placeholder="+1 (555) 123-4567"
                                value="{{ old('phone') }}"
                                required
                            >
                            @if($errors->get('phone'))
                                @foreach($errors->get('phone') as $error)
                                    <div class="error-message">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="Enter your email address"
                            value="{{ old('email') }}"
                            required
                        >
                        @if($errors->get('email'))
                            @foreach($errors->get('email') as $error)
                                <div class="error-message">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <div class="password-field">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-input"
                                    placeholder="Create a strong password"
                                    required
                                >
                                <button type="button" class="password-toggle" onclick="togglePassword('password')">👁️</button>
                            </div>
                            <div class="password-requirements">
                                <div class="requirement" id="length-req">
                                    <div class="requirement-icon">✓</div>
                                    <span>At least 8 characters</span>
                                </div>
                                <div class="requirement" id="uppercase-req">
                                    <div class="requirement-icon">✓</div>
                                    <span>One uppercase letter</span>
                                </div>
                                <div class="requirement" id="number-req">
                                    <div class="requirement-icon">✓</div>
                                    <span>One number</span>
                                </div>
                            </div>
                            @if($errors->get('password'))
                                @foreach($errors->get('password') as $error)
                                    <div class="error-message">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div class="password-field">
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-input"
                                    placeholder="Confirm your password"
                                    required
                                >
                                <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">👁️</button>
                            </div>
                            @if($errors->get('password_confirmation'))
                                @foreach($errors->get('password_confirmation') as $error)
                                    <div class="error-message">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="register-button">
                        Create Trading Account
                    </button>
                </form>

                <div class="login-link">
                    <p class="login-text">
                        Already have an account?
                        <a href="{{ route('login') }}">Sign in here</a>
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
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleButton = passwordInput.nextElementSibling;

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = '👁️';
            }
        }

        // Password validation
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;

            // Length requirement
            const lengthReq = document.getElementById('length-req');
            if (password.length >= 8) {
                lengthReq.classList.add('valid');
            } else {
                lengthReq.classList.remove('valid');
            }

            // Uppercase requirement
            const uppercaseReq = document.getElementById('uppercase-req');
            if (/[A-Z]/.test(password)) {
                uppercaseReq.classList.add('valid');
            } else {
                uppercaseReq.classList.remove('valid');
            }

            // Number requirement
            const numberReq = document.getElementById('number-req');
            if (/\d/.test(password)) {
                numberReq.classList.add('valid');
            } else {
                numberReq.classList.remove('valid');
            }
        });

        // Form animations
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translateY(-1px)';
            });

            input.addEventListener('blur', function() {
                this.style.transform = 'translateY(0)';
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
