<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Trading Platform - Register</title>
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
            align-items: center;
            justify-content: center;
            padding: 20px;
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
            background: linear-gradient(135deg, #1e74ff 0%, #0066ff 100%);
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
            background: linear-gradient(135deg, #1e74ff 0%, #0066ff 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(30, 116, 255, 0.3);
            margin-bottom: 24px;
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(30, 116, 255, 0.4);
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
            color: #1e74ff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-text a:hover {
            color: #1559cc;
        }

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
        }

        @media (max-width: 1024px) {
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

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .right-panel {
                padding: 30px 20px;
            }

            .form-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="left-panel">
            <div class="logo-section">
                <div class="logo">
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 80L40 60L70 80L80 60L90 80L80 60L70 40L50 60L20 40L10 60L20 80Z" fill="white"/>
                        <circle cx="30" cy="70" r="10" fill="white"/>
                        <path d="M70 20L90 10L90 30L70 20Z" fill="white"/>
                    </svg>
                </div>
                <h1 class="brand-title">Join the Future of Trading</h1>
                <p class="brand-subtitle">Get access to our exclusive AI-powered trading platform and start your journey to smarter investing</p>
            </div>

            <div class="benefits-list">
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Exclusive access to AI trading algorithms</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Real-time market analysis and insights</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>24/7 dedicated support team</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Advanced risk management tools</span>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">✓</div>
                    <span>Portfolio optimization recommendations</span>
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

    <script>
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
    </script>
</body>
</html>
