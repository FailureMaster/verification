<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC & KYB Onboarding - Trading Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #0f172a;
            --primary-blue: #3b82f6;
            --secondary-gray: #64748b;
            --light-gray: #f1f5f9;
            --border-color: #e2e8f0;
            --success-green: #10b981;
            --warning-amber: #f59e0b;
            --danger-red: #ef4444;
            --purple-accent: #8b5cf6;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--primary-dark);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #2563eb 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .form-title {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .form-subtitle {
            font-size: 1.1rem;
            margin-top: 0.5rem;
            opacity: 0.9;
        }

        .form-content {
            padding: 2rem;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border-color);
        }

        .section-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--purple-accent) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin: 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-control:hover {
            border-color: var(--primary-blue);
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            background: var(--light-gray);
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            color: var(--secondary-gray);
        }

        .file-upload-label:hover {
            border-color: var(--primary-blue);
            background: #f0f9ff;
            color: var(--primary-blue);
        }

        .file-upload-icon {
            font-size: 1.2rem;
        }

        .textarea-control {
            min-height: 120px;
            resize: vertical;
        }

        .date-input {
            position: relative;
        }

        .date-input input[type="date"] {
            padding-right: 2.5rem;
        }

        .date-input::after {
            content: '\f073';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-gray);
            pointer-events: none;
        }

        .submit-section {
            background: linear-gradient(135deg, var(--light-gray) 0%, #e2e8f0 100%);
            padding: 2rem;
            border-top: 1px solid var(--border-color);
            text-align: center;
        }

        .submit-btn {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #2563eb 100%);
            color: white;
            border: none;
            padding: 1rem 3rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .section-divider {
            margin: 3rem 0;
            border: none;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--border-color), transparent);
        }

        .progress-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .progress-step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--secondary-gray);
            font-size: 0.9rem;
        }

        .progress-step.active {
            color: var(--primary-blue);
            font-weight: 600;
        }

        .progress-step-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        .progress-step.active .progress-step-icon {
            background: var(--primary-blue);
            color: white;
        }

        .progress-step.completed .progress-step-icon {
            background: var(--success-green);
            color: white;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
            animation: slideIn 0.3s ease-in-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .step-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem;
            background: var(--light-gray);
            border-top: 1px solid var(--border-color);
        }

        .nav-btn {
            background: linear-gradient(135deg, var(--secondary-gray) 0%, #475569 100%);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .nav-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .nav-btn.primary {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #2563eb 100%);
        }

        .nav-btn.success {
            background: linear-gradient(135deg, var(--success-green) 0%, #059669 100%);
        }

        .step-counter {
            font-size: 0.9rem;
            color: var(--secondary-gray);
            font-weight: 500;
        }

        .file-preview {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: var(--success-green);
            display: none;
        }

        .file-preview.show {
            display: block;
        }

        .required-field::after {
            content: ' *';
            color: var(--danger-red);
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .form-container {
                margin: 0 1rem;
            }
            
            .form-content {
                padding: 1.5rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .form-title {
                font-size: 1.5rem;
            }
            
            .section-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="form-container">
        <!-- Header -->
        <div class="form-header">
            <h1 class="form-title">
                <i class="fas fa-shield-alt"></i>
                KYC & KYB Onboarding Form
            </h1>
            <p class="form-subtitle">Complete your verification to start trading</p>
        </div>

        <!-- Form Content -->
        <div class="form-content">
            <!-- Progress Indicator -->
            <div class="progress-indicator">
                <div class="progress-step active">
                    <div class="progress-step-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <span>Personal Info</span>
                </div>
                <div class="progress-step">
                    <div class="progress-step-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <span>Business Info</span>
                </div>
                <div class="progress-step">
                    <div class="progress-step-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <span>Complete</span>
                </div>
            </div>

            <form id="kycForm" method="POST" action="{{ route('kyc-kyb.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Step 1: Individual (KYC) -->
                <div class="form-step active" data-step="1">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <h2 class="section-title">Individual (KYC)</h2>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label required-field">Full Name</label>
                            <input type="text" class="form-control" name="full_name" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label required-field">Date of Birth</label>
                            <div class="date-input">
                                <input type="date" class="form-control" name="date_of_birth" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-field">Nationality</label>
                        <input type="text" class="form-control" name="nationality" placeholder="Enter your nationality" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label required-field">ID Type</label>
                            <select class="form-control form-select" name="id_type" required>
                                <option value="">-- Select ID Type --</option>
                                <option value="passport">Passport</option>
                                <option value="national_id">National ID</option>
                                <option value="driving_license">Driving License</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label required-field">ID Number</label>
                            <input type="text" class="form-control" name="id_number" placeholder="Enter ID number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-field">Upload ID Document</label>
                        <div class="file-upload">
                            <input type="file" class="file-input" name="id_document" accept=".jpg,.jpeg,.png,.pdf" required>
                            <label class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt file-upload-icon"></i>
                                <span>Choose file or drag and drop</span>
                            </label>
                            <div class="file-preview" id="idDocPreview"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-field">Residential Address</label>
                        <textarea class="form-control textarea-control" name="residential_address" placeholder="Enter your full residential address" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-field">Proof of Address</label>
                        <div class="file-upload">
                            <input type="file" class="file-input" name="proof_of_address" accept=".jpg,.jpeg,.png,.pdf" required>
                            <label class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt file-upload-icon"></i>
                                <span>Choose file or drag and drop</span>
                            </label>
                            <div class="file-preview" id="proofAddressPreview"></div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Business (KYB) -->
                <div class="form-step" data-step="2">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h2 class="section-title">Business (KYB)</h2>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-field">Company Name</label>
                        <input type="text" class="form-control" name="company_name" placeholder="Enter company name" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label required-field">Company Registration Number</label>
                            <input type="text" class="form-control" name="company_registration" placeholder="Enter registration number" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label required-field">Country of Incorporation</label>
                            <input type="text" class="form-control" name="country_incorporation" placeholder="Enter country" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-field">Type of Business</label>
                        <select class="form-control form-select" name="business_type" required>
                            <option value="">-- Select Business Type --</option>
                            <option value="corporation">Corporation</option>
                            <option value="llc">Limited Liability Company (LLC)</option>
                            <option value="partnership">Partnership</option>
                            <option value="sole_proprietorship">Sole Proprietorship</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-field">Business Address</label>
                        <textarea class="form-control textarea-control" name="business_address" placeholder="Enter complete business address" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-field">Upload Company Registration Documents</label>
                        <div class="file-upload">
                            <input type="file" class="file-input" name="company_documents[]" accept=".jpg,.jpeg,.png,.pdf" multiple required>
                            <label class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt file-upload-icon"></i>
                                <span>Choose files or drag and drop</span>
                            </label>
                            <div class="file-preview" id="companyDocsPreview"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-field">Authorized Representative Full Name</label>
                        <input type="text" class="form-control" name="representative_name" placeholder="Enter representative's full name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-field">Upload Representative ID</label>
                        <div class="file-upload">
                            <input type="file" class="file-input" name="representative_id" accept=".jpg,.jpeg,.png,.pdf" required>
                            <label class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt file-upload-icon"></i>
                                <span>Choose file or drag and drop</span>
                            </label>
                            <div class="file-preview" id="repIdPreview"></div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Review & Submit -->
                <div class="form-step" data-step="3">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h2 class="section-title">Review & Submit</h2>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Review Your Information</strong><br>
                        Please review all the information you've provided before submitting your KYC/KYB application. Make sure all documents are clear and readable.
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <input type="checkbox" required style="margin-right: 0.5rem;">
                            I certify that all information provided is accurate and complete
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <input type="checkbox" required style="margin-right: 0.5rem;">
                            I agree to the Terms of Service and Privacy Policy
                        </label>
                    </div>
                </div>
            </form>

            <!-- Step Navigation -->
            <div class="step-navigation">
                <button type="button" class="nav-btn" id="prevBtn" disabled>
                    <i class="fas fa-chevron-left"></i>
                    Previous
                </button>
                
                <div class="step-counter">
                    Step <span id="currentStep">1</span> of <span id="totalSteps">3</span>
                </div>
                
                <button type="button" class="nav-btn primary" id="nextBtn">
                    Next
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Submit Section -->
        <div class="submit-section" id="submitSection" style="display: none;">
            <button type="submit" class="submit-btn" form="kycForm">
                <i class="fas fa-paper-plane"></i>
                Submit KYC/KYB Application
            </button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentStep = 1;
            const totalSteps = 3;
            
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const currentStepSpan = document.getElementById('currentStep');
            const submitSection = document.getElementById('submitSection');
            
            // Update progress indicator
            function updateProgress() {
                const progressSteps = document.querySelectorAll('.progress-step');
                progressSteps.forEach((step, index) => {
                    step.classList.remove('active', 'completed');
                    if (index < currentStep - 1) {
                        step.classList.add('completed');
                    } else if (index === currentStep - 1) {
                        step.classList.add('active');
                    }
                });
                
                // Update step counter
                currentStepSpan.textContent = currentStep;
                
                // Update button states
                prevBtn.disabled = currentStep === 1;
                
                if (currentStep === totalSteps) {
                    nextBtn.style.display = 'none';
                    submitSection.style.display = 'block';
                } else {
                    nextBtn.style.display = 'inline-flex';
                    submitSection.style.display = 'none';
                    nextBtn.innerHTML = 'Next <i class="fas fa-chevron-right"></i>';
                }
            }
            
            // Show specific step
            function showStep(step) {
                // Hide all steps
                document.querySelectorAll('.form-step').forEach(s => {
                    s.classList.remove('active');
                });
                
                // Show current step
                document.querySelector(`[data-step="${step}"]`).classList.add('active');
                
                currentStep = step;
                updateProgress();
            }
            
            // Validate current step
            function validateStep(step) {
                const currentStepElement = document.querySelector(`[data-step="${step}"]`);
                const requiredFields = currentStepElement.querySelectorAll('[required]');
                
                for (let field of requiredFields) {
                    if (!field.value.trim()) {
                        field.focus();
                        field.style.borderColor = 'var(--danger-red)';
                        
                        // Show error message
                        let errorMsg = field.nextElementSibling;
                        if (!errorMsg || !errorMsg.classList.contains('error-message')) {
                            errorMsg = document.createElement('div');
                            errorMsg.className = 'error-message';
                            errorMsg.style.color = 'var(--danger-red)';
                            errorMsg.style.fontSize = '0.8rem';
                            errorMsg.style.marginTop = '0.25rem';
                            field.parentNode.insertBefore(errorMsg, field.nextSibling);
                        }
                        errorMsg.textContent = 'This field is required';
                        
                        return false;
                    } else {
                        field.style.borderColor = 'var(--border-color)';
                        // Remove error message
                        const errorMsg = field.nextElementSibling;
                        if (errorMsg && errorMsg.classList.contains('error-message')) {
                            errorMsg.remove();
                        }
                    }
                }
                return true;
            }
            
            // Next button handler
            nextBtn.addEventListener('click', function() {
                if (validateStep(currentStep)) {
                    if (currentStep < totalSteps) {
                        showStep(currentStep + 1);
                    }
                }
            });
            
            // Previous button handler
            prevBtn.addEventListener('click', function() {
                if (currentStep > 1) {
                    showStep(currentStep - 1);
                }
            });
            
            // File upload handling
            const fileInputs = document.querySelectorAll('.file-input');
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const files = this.files;
                    const previewId = this.name + 'Preview';
                    const preview = document.getElementById(previewId) || 
                                   this.closest('.file-upload').querySelector('.file-preview');
                    
                    if (files.length > 0) {
                        let fileNames = [];
                        for (let i = 0; i < files.length; i++) {
                            fileNames.push(files[i].name);
                        }
                        
                        if (preview) {
                            preview.innerHTML = `<i class="fas fa-check-circle"></i> ${fileNames.join(', ')}`;
                            preview.classList.add('show');
                        }
                        
                        // Update label
                        const label = this.nextElementSibling;
                        if (label) {
                            label.innerHTML = `<i class="fas fa-check file-upload-icon"></i><span>File(s) selected: ${fileNames.join(', ')}</span>`;
                            label.style.borderColor = 'var(--success-green)';
                            label.style.background = '#f0fdf4';
                            label.style.color = 'var(--success-green)';
                        }
                    }
                });
            });

            document.getElementById('kycForm').addEventListener('submit', function(e) {
                // Final step validation
                if (!validateStep(currentStep)) {
                    e.preventDefault();
                    return;
                }

                // Show loading UI
                const submitBtn = document.querySelector('.submit-btn');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
                submitBtn.disabled = true;
            });
            
            // Form submission
            // document.getElementById('kycForm').addEventListener('submit', function(e) {
            //     e.preventDefault();
                
            //     // Validate final step
            //     if (!validateStep(currentStep)) {
            //         return;
            //     }
                
            //     // Show loading state
            //     const submitBtn = document.querySelector('.submit-btn');
            //     const originalText = submitBtn.innerHTML;
            //     submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            //     submitBtn.disabled = true;
                
            //     // Simulate form submission
            //     setTimeout(() => {
            //         // Update progress to completed
            //         const progressSteps = document.querySelectorAll('.progress-step');
            //         progressSteps.forEach(step => {
            //             step.classList.remove('active');
            //             step.classList.add('completed');
            //         });
                    
            //         submitBtn.innerHTML = '<i class="fas fa-check"></i> Application Submitted!';
            //         submitBtn.style.background = 'var(--success-green)';
                    
            //         // Show success message
            //         const successMessage = document.createElement('div');
            //         successMessage.className = 'alert alert-success mt-3';
            //         successMessage.style.background = '#f0fdf4';
            //         successMessage.style.color = 'var(--success-green)';
            //         successMessage.style.border = '1px solid #bbf7d0';
            //         successMessage.style.padding = '1rem';
            //         successMessage.style.borderRadius = '8px';
            //         successMessage.innerHTML = '<i class="fas fa-check-circle"></i> Your KYC/KYB application has been submitted successfully. We will review your documents and get back to you within 2-3 business days.';
                    
            //         document.querySelector('.submit-section').appendChild(successMessage);
                    
            //         // Hide navigation
            //         document.querySelector('.step-navigation').style.display = 'none';
            //     }, 2000);
            // });
            
            // Initialize
            updateProgress();
        });
    </script>       

</body>
</html>