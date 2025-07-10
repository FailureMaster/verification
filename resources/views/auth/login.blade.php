<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Trading Platform - Login</title>
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

        /* .logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .logo img {
            width: 60px;
            height: 60px;
            fill: white;
        } */

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
            max-width: 320px;
        }

        .features-list {
            margin-top: 50px;
            text-align: left;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            font-size: 16px;
            opacity: 0.9;
        }

        .feature-icon {
            width: 24px;
            height: 24px;
            margin-right: 16px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
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
            background: linear-gradient(135deg, #1e74ff 0%, #0066ff 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(30, 116, 255, 0.3);
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(30, 116, 255, 0.4);
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

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 500px;
                min-height: auto;
            }

            .left-panel {
                padding: 40px 30px;
                min-height: 300px;
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
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .right-panel {
                padding: 30px 20px;
            }

            .left-panel {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="left-panel">
            <div class="logo-section">
                {{-- <div class="logo">
                    <img src="{{asset('/img/logo.png')}}" alt="" >
                </div> --}}
                <h1 class="brand-title">AI Trading Platform</h1>
                <p class="brand-subtitle">Transform your trading with advanced AI-powered analytics and real-time market intelligence</p>
            </div>

            <div class="features-list">
                <div class="feature-item">
                    <div class="feature-icon">🤖</div>
                    <span>Advanced AI Algorithms</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📊</div>
                    <span>Real-Time Market Data</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🛡️</div>
                    <span>Enterprise-Grade Security</span>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">⚡</div>
                    <span>Lightning-Fast Execution</span>
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

    <script>
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

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const button = document.querySelector('.login-button');
            const originalText = button.textContent;

            button.textContent = 'Accessing Platform...';
            button.style.opacity = '0.7';

            setTimeout(() => {
                button.textContent = originalText;
                button.style.opacity = '1';
                console.log('Login attempted');
            }, 2000);
        });

        // Add smooth focus transitions
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
