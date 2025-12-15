@extends('layouts.app')

@section('content')
@include('components.header')

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Add Your Business to <span>CallHelpDesk</span></h1>
            <p>Get your business listed and help customers find your contact information easily. Join thousands of businesses already on our platform!</p>
        </div>
    </div>
</section>

<!-- Add Business Form Section -->
<section class="add-business-section" style="padding: 80px 0; background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); position: relative; overflow-x: hidden;">
    <!-- Floating Background Elements -->
    <div class="floating-elements" style="position: fixed; width: 100%; height: 100%; z-index: -1; overflow: hidden;">
        <div class="floating-element" style="width: 300px; height: 300px; top: 10%; left: 5%;"></div>
        <div class="floating-element" style="width: 200px; height: 200px; bottom: 20%; right: 10%;"></div>
        <div class="floating-element" style="width: 150px; height: 150px; top: 50%; left: 80%;"></div>
    </div>
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 20px;">
        <!-- Header -->
        <div class="header" style="width: 100%; text-align: center; margin-bottom: 20px;">
            <h1 style="font-size: 3.5rem; font-weight: 900; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #10b981 100%); -webkit-background-clip: text; background-clip: text; color: transparent; margin-bottom: 15px; line-height: 1.1;">Add Your Business</h1>
            <p style="font-size: 1.2rem; color: #6b7280; max-width: 700px; margin: 0 auto 30px; line-height: 1.6;">Join our premium business directory and get discovered by customers looking for your services.</p>
        </div>

        <div class="container" style="width: 100%; max-width: 1200px; display: flex; flex-wrap: wrap; gap: 40px; align-items: center;">
            <!-- Form Panel -->
            <div class="form-panel" style="flex: 1; min-width: 500px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-radius: 20px; padding: 50px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); position: relative; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);">
                <div class="form-panel-inner" style="position: relative; z-index: 1;">
                    <div class="form-header" style="margin-bottom: 40px;">
                        <h2 style="font-size: 2.2rem; font-weight: 800; color: #1f2937; margin-bottom: 10px;">Business Information</h2>
                        <p style="color: #6b7280; font-size: 1.1rem;">Fill in your business details to get started</p>
                    </div>

                    <form class="business-form" id="businessForm">
                        <div class="form-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 25px; margin-bottom: 30px;">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-building"></i>
                                    Business Name
                                </label>
                                <input type="text" name="business_name" class="form-control" placeholder="Enter your business name" required style="width: 100%; padding: 18px 20px 18px 50px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; font-family: 'Inter', sans-serif; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); background: #f9fafb; color: #1f2937;">
                                <i class="fas fa-building form-icon" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: #6366f1; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);"></i>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-envelope"></i>
                                    Email Address
                                </label>
                                <input type="email" name="email" class="form-control" placeholder="your@email.com" required style="width: 100%; padding: 18px 20px 18px 50px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; font-family: 'Inter', sans-serif; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); background: #f9fafb; color: #1f2937;">
                                <i class="fas fa-envelope form-icon" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: #6366f1; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);"></i>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-globe"></i>
                                    Website
                                </label>
                                <input type="url" name="website" class="form-control" placeholder="https://yourwebsite.com" style="width: 100%; padding: 18px 20px 18px 50px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; font-family: 'Inter', sans-serif; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); background: #f9fafb; color: #1f2937;">
                                <i class="fas fa-globe form-icon" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: #6366f1; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);"></i>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-tags"></i>
                                    Category
                                </label>
                                <select name="category" class="form-control" style="width: 100%; padding: 18px 20px 18px 50px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; font-family: 'Inter', sans-serif; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); background: #f9fafb; color: #1f2937;">
                                    <option value="">Select a category</option>
                                    <option value="technology">Technology</option>
                                    <option value="healthcare">Healthcare</option>
                                    <option value="finance">Finance</option>
                                    <option value="retail">Retail</option>
                                    <option value="food">Food & Beverage</option>
                                </select>
                                <i class="fas fa-tags form-icon" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: #6366f1; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);"></i>
                            </div>
                        </div>

                        <div class="form-group full-width" style="grid-column: 1 / -1;">
                            <label class="form-label">
                                <i class="fas fa-map-marker-alt"></i>
                                Address
                            </label>
                            <input type="text" name="address" class="form-control" placeholder="Enter your business address" style="width: 100%; padding: 18px 20px 18px 50px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; font-family: 'Inter', sans-serif; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); background: #f9fafb; color: #1f2937;">
                            <i class="fas fa-map-marker-alt form-icon" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: #6366f1; font-size: 1.1rem; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);"></i>
                        </div>

                        <div class="form-group full-width" style="grid-column: 1 / -1;">
                            <label class="form-label">
                                <i class="fas fa-phone"></i>
                                Phone Number
                            </label>
                            <div class="phone-input-group" style="display: flex; gap: 10px;">
                                <div class="country-code-selector" style="position: relative; min-width: 140px;">
                                    <div class="country-code-toggle" id="countryCodeToggle" style="display: flex; align-items: center; justify-content: space-between; padding: 18px 20px; border: 2px solid #e5e7eb; border-radius: 12px; background: #f9fafb; cursor: pointer; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); font-weight: 500; color: #1f2937;">
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            <div class="country-flag" id="selectedFlag" style="width: 24px; height: 18px; border-radius: 2px; overflow: hidden; display: flex; align-items: center; justify-content: center; font-size: 14px;">🇺🇸</div>
                                            <span id="selectedCode">+1</span>
                                        </div>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="country-code-dropdown" id="countryCodeDropdown">
                                        <div class="country-search" style="padding: 15px; border-bottom: 1px solid #e5e7eb;">
                                            <input type="text" id="countrySearch" placeholder="Search countries..." style="width: 100%; padding: 12px 15px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);">
                                        </div>
                                        <div class="country-list" id="countryList">
                                        </div>
                                    </div>
                                </div>
                                <div class="phone-number-input" style="flex: 1;">
                                    <input type="tel" id="phoneNumber" name="phone" class="form-control" placeholder="123-456-7890" style="width: 100%; padding: 18px 20px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; font-family: 'Inter', sans-serif; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); background: #f9fafb; color: #1f2937;">
                                </div>
                            </div>
                        </div>

                        <div class="form-group full-width" style="grid-column: 1 / -1;">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>
                                Description
                            </label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Describe your business, services, and what makes you unique..." style="width: 100%; padding: 18px 20px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; font-family: 'Inter', sans-serif; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); background: #f9fafb; color: #1f2937; min-height: 150px; resize: vertical;"></textarea>
                        </div>

                        <!-- Upload Area -->
                        <div class="upload-area" id="uploadArea" style="border: 2px dashed #e5e7eb; border-radius: 12px; padding: 1px; text-align: center; cursor: pointer; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); margin-bottom: 30px; background: #f9fafb;">
                            <i class="fas fa-file-upload" style="font-size: 3rem; color: #6366f1; margin-bottom: 15px;"></i>
                            <div class="upload-text" style="font-weight: 600; color: #1f2937; margin-bottom: 8px;">Upload Business Document</div>
                            <div class="upload-subtext" style="color: #6b7280; font-size: 0.9rem;">PDF, DOC, DOCX up to 5MB</div>
                            <input type="file" id="fileInput" name="document" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" style="display: none;">
                        </div>

                        <!-- Google reCAPTCHA -->
                        <div class="form-group full-width recaptcha-container" style="grid-column: 1 / -1; display: flex; justify-content: center; margin-bottom: 30px;">
                            @if($recaptchaSiteKey)
                                <div class="g-recaptcha" data-sitekey="{{ $recaptchaSiteKey }}"></div>
                            @else
                                <div class="recaptcha-error" style="color: #dc3545; font-size: 0.9rem; text-align: center;">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    reCAPTCHA configuration is missing. Please contact administrator.
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="submit-btn" style="width: 100%; padding: 22px; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #10b981 100%); color: white; border: none; border-radius: 12px; font-size: 1.2rem; font-weight: 700; cursor: pointer; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); display: flex; justify-content: center; align-items: center; gap: 15px; position: relative; overflow: hidden;">
                            <i class="fas fa-paper-plane"></i>
                            Submit Business Listing
                        </button>

                        <div class="privacy-note" style="text-align: center; margin-top: 25px; color: #6b7280; font-size: 0.9rem; display: flex; align-items: center; justify-content: center; gap: 10px;">
                            <i class="fas fa-shield-alt"></i>
                            Your information is secure and will be reviewed before publishing.
                        </div>
                    </form>
                </div>
            </div>

            <!-- Benefits Panel -->
            <div class="benefits-panel" style="flex: 1; min-width: 500px;">
                <div class="benefits-card" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-radius: 20px; padding: 40px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); margin-bottom: 30px; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);">
                    <div class="benefits-header" style="margin-bottom: 40px;">
                        <h2 style="font-size: 2.2rem; font-weight: 800; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #10b981 100%); -webkit-background-clip: text; background-clip: text; color: transparent; margin-bottom: 15px;">Why Choose CallHelpDesk?</h2>
                    </div>

                    <div class="benefit-item" style="display: flex; align-items: flex-start; gap: 20px; margin-bottom: 30px; padding: 20px; border-radius: 12px; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); cursor: default;">
                        <div class="benefit-icon" style="width: 60px; height: 60px; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #10b981 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; flex-shrink: 0;">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="benefit-content">
                            <h3 style="font-size: 1.3rem; font-weight: 700; color: #1f2937; margin-bottom: 8px;">Reach Millions of Customers</h3>
                            <p style="color: #6b7280; line-height: 1.6;">Get discovered by our large user base searching for businesses like yours every day.</p>
                        </div>
                    </div>

                    <div class="benefit-item" style="display: flex; align-items: flex-start; gap: 20px; margin-bottom: 30px; padding: 20px; border-radius: 12px; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); cursor: default;">
                        <div class="benefit-icon" style="width: 60px; height: 60px; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #10b981 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; flex-shrink: 0;">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="benefit-content">
                            <h3 style="font-size: 1.3rem; font-weight: 700; color: #1f2937; margin-bottom: 8px;">Fast & Easy Setup</h3>
                            <p style="color: #6b7280; line-height: 1.6;">List your business in minutes with our simple form and get verified quickly.</p>
                        </div>
                    </div>

                    <div class="benefit-item" style="display: flex; align-items: flex-start; gap: 20px; margin-bottom: 30px; padding: 20px; border-radius: 12px; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); cursor: default;">
                        <div class="benefit-icon" style="width: 60px; height: 60px; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #10b981 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; flex-shrink: 0;">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="benefit-content">
                            <h3 style="font-size: 1.3rem; font-weight: 700; color: #1f2937; margin-bottom: 8px;">Increase Visibility</h3>
                            <p style="color: #6b7280; line-height: 1.6;">Boost your online presence and attract more customers with our premium listings.</p>
                        </div>
                    </div>

                    <div class="benefit-item" style="display: flex; align-items: flex-start; gap: 20px; margin-bottom: 30px; padding: 20px; border-radius: 12px; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1); cursor: default;">
                        <div class="benefit-icon" style="width: 60px; height: 60px; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #10b981 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; flex-shrink: 0;">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="benefit-content">
                            <h3 style="font-size: 1.3rem; font-weight: 700; color: #1f2937; margin-bottom: 8px;">24/7 Customer Support</h3>
                            <p style="color: #6b7280; line-height: 1.6;">Get round-the-clock assistance and help desk support for all your business needs.</p>
                        </div>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="stats-card" style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #10b981 100%); border-radius: 20px; padding: 40px; color: white; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);">
                    <h3 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 30px;">Join Our Growing Community</h3>
                    <div class="stats-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                        <div class="stat" style="text-align: center;">
                            <div class="stat-number" style="font-size: 2.5rem; font-weight: 900; margin-bottom: 5px;">10K+</div>
                            <div class="stat-label" style="font-size: 0.9rem; opacity: 0.9;">Businesses Listed</div>
                        </div>
                        <div class="stat" style="text-align: center;">
                            <div class="stat-number" style="font-size: 2.5rem; font-weight: 900; margin-bottom: 5px;">1M+</div>
                            <div class="stat-label" style="font-size: 0.9rem; opacity: 0.9;">Monthly Searches</div>
                        </div>
                        <div class="stat" style="text-align: center;">
                            <div class="stat-number" style="font-size: 2.5rem; font-weight: 900; margin-bottom: 5px;">95%</div>
                            <div class="stat-label" style="font-size: 0.9rem; opacity: 0.9;">Customer Satisfaction</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('components.footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.4/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.4/dist/sweetalert2.min.css" rel="stylesheet">

<!-- Google reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
    // Country code data
    const countries = [
        { code: "US", name: "United States", dialCode: "+1", flag: "🇺🇸" },
        { code: "GB", name: "United Kingdom", dialCode: "+44", flag: "🇬🇧" },
        { code: "CA", name: "Canada", dialCode: "+1", flag: "🇨🇦" },
        { code: "AU", name: "Australia", dialCode: "+61", flag: "🇦🇺" },
        { code: "DE", name: "Germany", dialCode: "+49", flag: "🇩🇪" },
        { code: "FR", name: "France", dialCode: "+33", flag: "🇫🇷" },
        { code: "IT", name: "Italy", dialCode: "+39", flag: "🇮🇹" },
        { code: "ES", name: "Spain", dialCode: "+34", flag: "🇪🇸" },
        { code: "IN", name: "India", dialCode: "+91", flag: "🇮🇳" },
        { code: "JP", name: "Japan", dialCode: "+81", flag: "🇯🇵" },
        { code: "CN", name: "China", dialCode: "+86", flag: "🇨🇳" },
        { code: "BR", name: "Brazil", dialCode: "+55", flag: "🇧🇷" },
        { code: "MX", name: "Mexico", dialCode: "+52", flag: "🇲🇽" },
        { code: "RU", name: "Russia", dialCode: "+7", flag: "🇷🇺" },
        { code: "ZA", name: "South Africa", dialCode: "+27", flag: "🇿🇦" },
        { code: "AE", name: "UAE", dialCode: "+971", flag: "🇦🇪" },
        { code: "SG", name: "Singapore", dialCode: "+65", flag: "🇸🇬" },
        { code: "KR", name: "South Korea", dialCode: "+82", flag: "🇰🇷" },
        { code: "NG", name: "Nigeria", dialCode: "+234", flag: "🇳🇬" },
        { code: "KE", name: "Kenya", dialCode: "+254", flag: "🇰🇪" },
        { code: "EG", name: "Egypt", dialCode: "+20", flag: "🇪🇬" },
        { code: "SA", name: "Saudi Arabia", dialCode: "+966", flag: "🇸🇦" },
        { code: "TR", name: "Turkey", dialCode: "+90", flag: "🇹🇷" },
        { code: "SE", name: "Sweden", dialCode: "+46", flag: "🇸🇪" },
        { code: "NO", name: "Norway", dialCode: "+47", flag: "🇳🇴" },
        { code: "DK", name: "Denmark", dialCode: "+45", flag: "🇩🇰" },
        { code: "FI", name: "Finland", dialCode: "+358", flag: "🇫🇮" },
        { code: "NL", name: "Netherlands", dialCode: "+31", flag: "🇳🇱" },
        { code: "BE", name: "Belgium", dialCode: "+32", flag: "🇧🇪" },
        { code: "CH", name: "Switzerland", dialCode: "+41", flag: "🇨🇭" },
        { code: "AT", name: "Austria", dialCode: "+43", flag: "🇦🇹" },
        { code: "PL", name: "Poland", dialCode: "+48", flag: "🇵🇱" },
        { code: "CZ", name: "Czech Republic", dialCode: "+420", flag: "🇨🇿" },
        { code: "GR", name: "Greece", dialCode: "+30", flag: "🇬🇷" },
        { code: "PT", name: "Portugal", dialCode: "+351", flag: "🇵🇹" },
        { code: "AR", name: "Argentina", dialCode: "+54", flag: "🇦🇷" },
        { code: "CL", name: "Chile", dialCode: "+56", flag: "🇨🇱" },
        { code: "CO", name: "Colombia", dialCode: "+57", flag: "🇨🇴" },
        { code: "PE", name: "Peru", dialCode: "+51", flag: "🇵🇪" },
        { code: "VE", name: "Venezuela", dialCode: "+58", flag: "🇻🇪" },
        { code: "EC", name: "Ecuador", dialCode: "+593", flag: "🇪🇨" },
        { code: "BO", name: "Bolivia", dialCode: "+591", flag: "🇧🇴" },
        { code: "PY", name: "Paraguay", dialCode: "+595", flag: "🇵🇾" },
        { code: "UY", name: "Uruguay", dialCode: "+598", flag: "🇺🇾" },
        { code: "CR", name: "Costa Rica", dialCode: "+506", flag: "🇨🇷" },
        { code: "PA", name: "Panama", dialCode: "+507", flag: "🇵🇦" },
        { code: "GT", name: "Guatemala", dialCode: "+502", flag: "🇬🇹" },
        { code: "HN", name: "Honduras", dialCode: "+504", flag: "🇭🇳" },
        { code: "SV", name: "El Salvador", dialCode: "+503", flag: "🇸🇻" },
        { code: "NI", name: "Nicaragua", dialCode: "+505", flag: "🇳🇮" },
        { code: "DO", name: "Dominican Republic", dialCode: "+1", flag: "🇩🇴" },
        { code: "HT", name: "Haiti", dialCode: "+509", flag: "🇭🇹" },
        { code: "JM", name: "Jamaica", dialCode: "+1", flag: "🇯🇲" },
        { code: "TT", name: "Trinidad and Tobago", dialCode: "+1", flag: "🇹🇹" },
        { code: "BB", name: "Barbados", dialCode: "+1", flag: "🇧🇧" },
        { code: "BS", name: "Bahamas", dialCode: "+1", flag: "🇧🇸" },
        { code: "BZ", name: "Belize", dialCode: "+501", flag: "🇧🇿" },
        { code: "GY", name: "Guyana", dialCode: "+592", flag: "🇬🇾" },
        { code: "SR", name: "Suriname", dialCode: "+597", flag: "🇸🇷" },
        { code: "AW", name: "Aruba", dialCode: "+297", flag: "🇦🇼" },
        { code: "CW", name: "Curaçao", dialCode: "+599", flag: "🇨🇼" },
        { code: "SX", name: "Sint Maarten", dialCode: "+1", flag: "🇸🇽" },
        { code: "BQ", name: "Bonaire, Sint Eustatius and Saba", dialCode: "+599", flag: "🇧🇶" },
        { code: "KY", name: "Cayman Islands", dialCode: "+1", flag: "🇰🇾" },
        { code: "BM", name: "Bermuda", dialCode: "+1", flag: "🇧🇲" },
        { code: "VG", name: "British Virgin Islands", dialCode: "+1", flag: "🇻🇬" },
        { code: "TC", name: "Turks and Caicos Islands", dialCode: "+1", flag: "🇹🇨" },
        { code: "MS", name: "Montserrat", dialCode: "+1", flag: "🇲🇸" },
        { code: "KN", name: "Saint Kitts and Nevis", dialCode: "+1", flag: "🇰🇳" },
        { code: "LC", name: "Saint Lucia", dialCode: "+1", flag: "🇱🇨" },
        { code: "VC", name: "Saint Vincent and the Grenadines", dialCode: "+1", flag: "🇻🇨" },
        { code: "GD", name: "Grenada", dialCode: "+1", flag: "🇬🇩" },
        { code: "AG", name: "Antigua and Barbuda", dialCode: "+1", flag: "🇦🇬" },
        { code: "DM", name: "Dominica", dialCode: "+1", flag: "🇩🇲" },
        { code: "ID", name: "Indonesia", dialCode: "+62", flag: "🇮🇩" },
        { code: "MY", name: "Malaysia", dialCode: "+60", flag: "🇲🇾" },
        { code: "TH", name: "Thailand", dialCode: "+66", flag: "🇹🇭" },
        { code: "VN", name: "Vietnam", dialCode: "+84", flag: "🇻🇳" },
        { code: "PH", name: "Philippines", dialCode: "+63", flag: "🇵🇭" },
        { code: "HK", name: "Hong Kong", dialCode: "+852", flag: "🇭🇰" },
        { code: "MO", name: "Macau", dialCode: "+853", flag: "🇲🇴" },
        { code: "TW", name: "Taiwan", dialCode: "+886", flag: "🇹🇼" },
        { code: "BD", name: "Bangladesh", dialCode: "+880", flag: "🇧🇩" },
        { code: "PK", name: "Pakistan", dialCode: "+92", flag: "🇵🇰" },
        { code: "LK", name: "Sri Lanka", dialCode: "+94", flag: "🇱🇰" },
        { code: "NP", name: "Nepal", dialCode: "+977", flag: "🇳🇵" },
        { code: "BT", name: "Bhutan", dialCode: "+975", flag: "🇧🇹" },
        { code: "MV", name: "Maldives", dialCode: "+960", flag: "🇲🇻" },
        { code: "AF", name: "Afghanistan", dialCode: "+93", flag: "🇦🇫" },
        { code: "TJ", name: "Tajikistan", dialCode: "+992", flag: "🇹🇯" },
        { code: "TM", name: "Turkmenistan", dialCode: "+993", flag: "🇹🇲" },
        { code: "UZ", name: "Uzbekistan", dialCode: "+998", flag: "🇺🇿" },
        { code: "KG", name: "Kyrgyzstan", dialCode: "+996", flag: "🇰🇬" },
        { code: "KZ", name: "Kazakhstan", dialCode: "+7", flag: "🇰🇿" },
        { code: "MN", name: "Mongolia", dialCode: "+976", flag: "🇲🇳" },
        { code: "KP", name: "North Korea", dialCode: "+850", flag: "🇰🇵" },
        { code: "BN", name: "Brunei", dialCode: "+673", flag: "🇧🇳" },
        { code: "KH", name: "Cambodia", dialCode: "+855", flag: "🇰🇭" },
        { code: "LA", name: "Laos", dialCode: "+856", flag: "🇱🇦" },
        { code: "MM", name: "Myanmar", dialCode: "+95", flag: "🇲🇲" },
        { code: "PG", name: "Papua New Guinea", dialCode: "+675", flag: "🇵🇬" },
        { code: "FJ", name: "Fiji", dialCode: "+679", flag: "🇫🇯" },
        { code: "TO", name: "Tonga", dialCode: "+676", flag: "🇹🇴" },
        { code: "WS", name: "Samoa", dialCode: "+685", flag: "🇼🇸" },
        { code: "KI", name: "Kiribati", dialCode: "+686", flag: "🇰🇮" },
        { code: "MH", name: "Marshall Islands", dialCode: "+692", flag: "🇲🇭" },
        { code: "FM", name: "Micronesia", dialCode: "+691", flag: "🇫🇲" },
        { code: "PW", name: "Palau", dialCode: "+680", flag: "🇵🇼" },
        { code: "NR", name: "Nauru", dialCode: "+674", flag: "🇳🇷" },
        { code: "TV", name: "Tuvalu", dialCode: "+688", flag: "🇹🇻" },
        { code: "VU", name: "Vanuatu", dialCode: "+678", flag: "🇻🇺" },
        { code: "NC", name: "New Caledonia", dialCode: "+687", flag: "🇳🇨" },
        { code: "PF", name: "French Polynesia", dialCode: "+689", flag: "🇵🇫" },
        { code: "WF", name: "Wallis and Futuna", dialCode: "+681", flag: "🇼🇫" },
        { code: "CK", name: "Cook Islands", dialCode: "+682", flag: "🇨🇰" },
        { code: "NU", name: "Niue", dialCode: "+683", flag: "🇳🇺" },
        { code: "TK", name: "Tokelau", dialCode: "+690", flag: "🇹🇰" },
        { code: "PN", name: "Pitcairn", dialCode: "+64", flag: "🇵🇳" },
        { code: "SH", name: "Saint Helena", dialCode: "+290", flag: "🇸🇭" },
        { code: "GS", name: "South Georgia and the South Sandwich Islands", dialCode: "+500", flag: "🇬🇸" },
        { code: "FK", name: "Falkland Islands", dialCode: "+500", flag: "🇫🇰" },
        { code: "AI", name: "Anguilla", dialCode: "+1", flag: "🇦🇮" },
        { code: "IR", name: "Iran", dialCode: "+98", flag: "🇮🇷" },
        { code: "IQ", name: "Iraq", dialCode: "+964", flag: "🇮🇶" },
        { code: "JO", name: "Jordan", dialCode: "+962", flag: "🇯🇴" },
        { code: "LB", name: "Lebanon", dialCode: "+961", flag: "🇱🇧" },
        { code: "SY", name: "Syria", dialCode: "+963", flag: "🇸🇾" },
        { code: "YE", name: "Yemen", dialCode: "+967", flag: "🇾🇪" },
        { code: "OM", name: "Oman", dialCode: "+968", flag: "🇴🇲" },
        { code: "KW", name: "Kuwait", dialCode: "+965", flag: "🇰🇼" },
        { code: "BH", name: "Bahrain", dialCode: "+973", flag: "🇧🇭" },
        { code: "QA", name: "Qatar", dialCode: "+974", flag: "🇶🇦" },
        { code: "IL", name: "Israel", dialCode: "+972", flag: "🇮🇱" },
        { code: "PS", name: "Palestine", dialCode: "+970", flag: "🇵🇸" },
        { code: "MT", name: "Malta", dialCode: "+356", flag: "🇲🇹" },
        { code: "CY", name: "Cyprus", dialCode: "+357", flag: "🇨🇾" },
        { code: "EE", name: "Estonia", dialCode: "+372", flag: "🇪🇪" },
        { code: "LV", name: "Latvia", dialCode: "+371", flag: "🇱🇻" },
        { code: "LT", name: "Lithuania", dialCode: "+370", flag: "🇱🇹" },
        { code: "LU", name: "Luxembourg", dialCode: "+352", flag: "🇱🇺" },
        { code: "MC", name: "Monaco", dialCode: "+377", flag: "🇲🇨" },
        { code: "AD", name: "Andorra", dialCode: "+376", flag: "🇦🇩" },
        { code: "SM", name: "San Marino", dialCode: "+378", flag: "🇸🇲" },
        { code: "VA", name: "Vatican City", dialCode: "+379", flag: "🇻🇦" },
        { code: "LI", name: "Liechtenstein", dialCode: "+423", flag: "🇱🇮" },
        { code: "IS", name: "Iceland", dialCode: "+354", flag: "🇮🇸" },
        { code: "IE", name: "Ireland", dialCode: "+353", flag: "🇮🇪" },
        { code: "IM", name: "Isle of Man", dialCode: "+44", flag: "🇮🇲" },
        { code: "JE", name: "Jersey", dialCode: "+44", flag: "🇯🇪" },
        { code: "GG", name: "Guernsey", dialCode: "+44", flag: "🇬🇬" },
        { code: "FO", name: "Faroe Islands", dialCode: "+298", flag: "🇫🇴" },
        { code: "GL", name: "Greenland", dialCode: "+299", flag: "🇬🇱" },
        { code: "SJ", name: "Svalbard and Jan Mayen", dialCode: "+47", flag: "🇸🇯" },
        { code: "AX", name: "Åland Islands", dialCode: "+358", flag: "🇦🇽" },
        { code: "AL", name: "Albania", dialCode: "+355", flag: "🇦🇱" },
        { code: "MK", name: "North Macedonia", dialCode: "+389", flag: "🇲🇰" },
        { code: "ME", name: "Montenegro", dialCode: "+382", flag: "🇲🇪" },
        { code: "RS", name: "Serbia", dialCode: "+381", flag: "🇷🇸" },
        { code: "BA", name: "Bosnia and Herzegovina", dialCode: "+387", flag: "🇧🇦" },
        { code: "HR", name: "Croatia", dialCode: "+385", flag: "🇭🇷" },
        { code: "SI", name: "Slovenia", dialCode: "+386", flag: "🇸🇮" },
        { code: "SK", name: "Slovakia", dialCode: "+421", flag: "🇸🇰" },
        { code: "HU", name: "Hungary", dialCode: "+36", flag: "🇭🇺" },
        { code: "RO", name: "Romania", dialCode: "+40", flag: "🇷🇴" },
        { code: "BG", name: "Bulgaria", dialCode: "+359", flag: "🇧🇬" },
        { code: "MD", name: "Moldova", dialCode: "+373", flag: "🇲🇩" },
        { code: "UA", name: "Ukraine", dialCode: "+380", flag: "🇺🇦" },
        { code: "BY", name: "Belarus", dialCode: "+375", flag: "🇧🇾" },
        { code: "GE", name: "Georgia", dialCode: "+995", flag: "🇬🇪" },
        { code: "AM", name: "Armenia", dialCode: "+374", flag: "🇦🇲" },
        { code: "AZ", name: "Azerbaijan", dialCode: "+994", flag: "🇦🇿" },
        { code: "AO", name: "Angola", dialCode: "+244", flag: "🇦🇴" },
        { code: "BW", name: "Botswana", dialCode: "+267", flag: "🇧🇼" },
        { code: "BI", name: "Burundi", dialCode: "+257", flag: "🇧🇮" },
        { code: "CM", name: "Cameroon", dialCode: "+237", flag: "🇨🇲" },
        { code: "CV", name: "Cape Verde", dialCode: "+238", flag: "🇨🇻" },
        { code: "CF", name: "Central African Republic", dialCode: "+236", flag: "🇨🇫" },
        { code: "TD", name: "Chad", dialCode: "+235", flag: "🇹🇩" },
        { code: "KM", name: "Comoros", dialCode: "+269", flag: "🇰🇲" },
        { code: "CG", name: "Congo", dialCode: "+242", flag: "🇨🇬" },
        { code: "CD", name: "DR Congo", dialCode: "+243", flag: "🇨🇩" },
        { code: "DJ", name: "Djibouti", dialCode: "+253", flag: "🇩🇯" },
        { code: "GQ", name: "Equatorial Guinea", dialCode: "+240", flag: "🇬🇶" },
        { code: "ER", name: "Eritrea", dialCode: "+291", flag: "🇪🇷" },
        { code: "ET", name: "Ethiopia", dialCode: "+251", flag: "🇪🇹" },
        { code: "GA", name: "Gabon", dialCode: "+241", flag: "🇬🇦" },
        { code: "GM", name: "Gambia", dialCode: "+220", flag: "🇬🇲" },
        { code: "GH", name: "Ghana", dialCode: "+233", flag: "🇬🇭" },
        { code: "GN", name: "Guinea", dialCode: "+224", flag: "🇬🇳" },
        { code: "GW", name: "Guinea-Bissau", dialCode: "+245", flag: "🇬🇼" },
        { code: "CI", name: "Ivory Coast", dialCode: "+225", flag: "🇨🇮" },
        { code: "LS", name: "Lesotho", dialCode: "+266", flag: "🇱🇸" },
        { code: "LR", name: "Liberia", dialCode: "+231", flag: "🇱🇷" },
        { code: "LY", name: "Libya", dialCode: "+218", flag: "🇱🇾" },
        { code: "MG", name: "Madagascar", dialCode: "+261", flag: "🇲🇬" },
        { code: "MW", name: "Malawi", dialCode: "+265", flag: "🇲🇼" },
        { code: "ML", name: "Mali", dialCode: "+223", flag: "🇲🇱" },
        { code: "MR", name: "Mauritania", dialCode: "+222", flag: "🇲🇷" },
        { code: "MU", name: "Mauritius", dialCode: "+230", flag: "🇲🇺" },
        { code: "YT", name: "Mayotte", dialCode: "+262", flag: "🇾🇹" },
        { code: "MA", name: "Morocco", dialCode: "+212", flag: "🇲🇦" },
        { code: "MZ", name: "Mozambique", dialCode: "+258", flag: "🇲🇿" },
        { code: "NA", name: "Namibia", dialCode: "+264", flag: "🇳🇦" },
        { code: "NE", name: "Niger", dialCode: "+227", flag: "🇳🇪" },
        { code: "RW", name: "Rwanda", dialCode: "+250", flag: "🇷🇼" },
        { code: "RE", name: "Réunion", dialCode: "+262", flag: "🇷🇪" },
        { code: "ST", name: "São Tomé and Príncipe", dialCode: "+239", flag: "🇸🇹" },
        { code: "SN", name: "Senegal", dialCode: "+221", flag: "🇸🇳" },
        { code: "SC", name: "Seychelles", dialCode: "+248", flag: "🇸🇨" },
        { code: "SL", name: "Sierra Leone", dialCode: "+232", flag: "🇸🇱" },
        { code: "SO", name: "Somalia", dialCode: "+252", flag: "🇸🇴" },
        { code: "SS", name: "South Sudan", dialCode: "+211", flag: "🇸🇸" },
        { code: "SD", name: "Sudan", dialCode: "+249", flag: "🇸🇩" },
        { code: "SZ", name: "Eswatini", dialCode: "+268", flag: "🇸🇿" },
        { code: "TZ", name: "Tanzania", dialCode: "+255", flag: "🇹🇿" },
        { code: "TG", name: "Togo", dialCode: "+228", flag: "🇹🇬" },
        { code: "TN", name: "Tunisia", dialCode: "+216", flag: "🇹🇳" },
        { code: "UG", name: "Uganda", dialCode: "+256", flag: "🇺🇬" },
        { code: "ZM", name: "Zambia", dialCode: "+260", flag: "🇿🇲" },
        { code: "ZW", name: "Zimbabwe", dialCode: "+263", flag: "🇿🇼" }
    ];

    document.addEventListener('DOMContentLoaded', function() {
        // Floating elements
        const floatingContainer = document.querySelector('.floating-elements');
        if (floatingContainer) {
            for (let i = 0; i < 5; i++) {
                const element = document.createElement('div');
                element.className = 'floating-element';
                const size = Math.random() * 100 + 50;
                element.style.width = `${size}px`;
                element.style.height = `${size}px`;
                element.style.top = `${Math.random() * 100}%`;
                element.style.left = `${Math.random() * 100}%`;
                floatingContainer.appendChild(element);
            }
        }

        // File upload functionality
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');

        if (uploadArea && fileInput) {
            uploadArea.addEventListener('click', () => fileInput.click());
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.style.borderColor = 'var(--primary)';
                uploadArea.style.background = 'rgba(99, 102, 241, 0.05)';
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.style.borderColor = '#e5e7eb';
                uploadArea.style.background = '#f9fafb';
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.style.borderColor = 'var(--secondary)';
                uploadArea.style.background = 'rgba(16, 185, 129, 0.05)';

                const file = e.dataTransfer.files[0];
                if (file) {
                    const uploadText = uploadArea.querySelector('.upload-text');
                    if (uploadText) {
                        uploadText.innerHTML = `<i class="fas fa-check" style="color: var(--secondary);"></i> ${file.name}`;
                    }
                }
            });

            fileInput.addEventListener('change', (e) => {
                if (fileInput.files.length > 0) {
                    const uploadText = uploadArea.querySelector('.upload-text');
                    if (uploadText) {
                        uploadText.innerHTML = `<i class="fas fa-check" style="color: var(--secondary);"></i> ${fileInput.files[0].name}`;
                        uploadArea.style.borderColor = 'var(--secondary)';
                        uploadArea.style.background = 'rgba(16, 185, 129, 0.05)';
                    }
                }
            });
        }

        // Country code selector functionality
        const countryCodeToggle = document.getElementById('countryCodeToggle');
        const countryCodeDropdown = document.getElementById('countryCodeDropdown');
        const countrySearch = document.getElementById('countrySearch');
        const countryList = document.getElementById('countryList');
        const selectedFlag = document.getElementById('selectedFlag');
        const selectedCode = document.getElementById('selectedCode');
        const phoneNumber = document.getElementById('phoneNumber');

        let selectedCountry = countries[0]; // Default to US

        // Populate country list
        function populateCountryList(countryArray = countries) {
            countryList.innerHTML = '';
            countryArray.forEach(country => {
                const countryItem = document.createElement('div');
                countryItem.className = 'country-item';
                if (country.code === selectedCountry.code) {
                    countryItem.classList.add('active');
                }

                countryItem.innerHTML = `
                    <div class="country-flag">${country.flag}</div>
                    <div class="country-info">
                        <div class="country-name">${country.name}</div>
                    </div>
                    <div class="country-code">${country.dialCode}</div>
                `;

                countryItem.addEventListener('click', () => {
                    selectCountry(country);
                    countryCodeDropdown.classList.remove('active');
                    countryCodeToggle.classList.remove('active');
                });

                countryList.appendChild(countryItem);
            });
        }

        // Select a country
        function selectCountry(country) {
            selectedCountry = country;
            if (selectedFlag) selectedFlag.textContent = country.flag;
            if (selectedCode) selectedCode.textContent = country.dialCode;

            // Update all country items
            document.querySelectorAll('.country-item').forEach(item => {
                item.classList.remove('active');
                const code = item.querySelector('.country-code').textContent;
                if (code === country.dialCode) {
                    item.classList.add('active');
                }
            });

            // Auto-focus phone number input
            if (phoneNumber) {
                phoneNumber.focus();

                // Add country code to placeholder
                phoneNumber.placeholder = `e.g., ${country.dialCode.replace('+', '')} 123 456 7890`;
            }
        }

        // Toggle dropdown
        countryCodeToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            countryCodeDropdown.classList.toggle('active');
            countryCodeToggle.classList.toggle('active');

            if (countryCodeDropdown.classList.contains('active')) {
                if (countrySearch) countrySearch.focus();
            }
        });

        // Search countries
        if (countrySearch) {
            countrySearch.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const filteredCountries = countries.filter(country =>
                    country.name.toLowerCase().includes(searchTerm) ||
                    country.dialCode.includes(searchTerm) ||
                    country.code.toLowerCase().includes(searchTerm)
                );
                populateCountryList(filteredCountries);
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!countryCodeToggle.contains(e.target) && !countryCodeDropdown.contains(e.target)) {
                countryCodeDropdown.classList.remove('active');
                countryCodeToggle.classList.remove('active');
            }
        });

        // Format phone number as user types
        if (phoneNumber) {
            phoneNumber.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');

                // Format based on country
                if (selectedCountry.code === 'US' || selectedCountry.code === 'CA') {
                    if (value.length > 3 && value.length <= 6) {
                        value = value.replace(/(\d{3})(\d+)/, '$1-$2');
                    } else if (value.length > 6) {
                        value = value.replace(/(\d{3})(\d{3})(\d+)/, '$1-$2-$3');
                    }
                } else if (selectedCountry.code === 'GB') {
                    if (value.length > 4) {
                        value = value.replace(/(\d{4})(\d+)/, '$1 $2');
                    }
                    if (value.length > 9) {
                        value = value.replace(/(\d{4}) (\d{3})(\d+)/, '$1 $2 $3');
                    }
                }

                e.target.value = value;
            });
        }

        // Initialize country list
        populateCountryList();

        // Form submission
        const form = document.getElementById('businessForm');
        const submitBtn = form ? form.querySelector('.submit-btn') : null;

        if (form && submitBtn) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Validate phone number
                const phoneValue = phoneNumber ? phoneNumber.value.replace(/\D/g, '') : '';
                if (phoneValue.length < 7) {
                    alert('Please enter a valid phone number');
                    if (phoneNumber) phoneNumber.focus();
                    return;
                }

                // Validate reCAPTCHA
                const recaptchaResponse = typeof grecaptcha !== 'undefined' ? grecaptcha.getResponse() : '';
                if (!recaptchaResponse) {
                    alert('Please complete the reCAPTCHA verification');
                    return;
                }

                // Show loading state
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> PROCESSING...';
                submitBtn.disabled = true;

                // Prepare FormData for AJAX submission
                const formData = new FormData(form);
                formData.append('country_code', selectedCountry.dialCode);
                formData.append('country_name', selectedCountry.name);
                formData.append('g-recaptcha-response', recaptchaResponse);

                // Send AJAX request
                fetch('{{ route("add.business.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Reset form
                        form.reset();
                        selectCountry(countries[0]); // Reset to default country

                        // Reset reCAPTCHA
                        if (typeof grecaptcha !== 'undefined') {
                            grecaptcha.reset();
                        }

                        // Reset upload area
                        if (uploadArea) {
                            const uploadText = uploadArea.querySelector('.upload-text');
                            if (uploadText) {
                                uploadText.innerHTML = 'Upload Business Logo';
                                uploadArea.style.borderColor = '#e5e7eb';
                                uploadArea.style.background = '#f9fafb';
                            }
                        }

                        // Show success message with SweetAlert2
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Submitted!',
                            text: data.message,
                            confirmButtonText: 'Continue',
                            confirmButtonColor: '#6366f1',
                            background: '#ffffff',
                            color: '#1f2937',
                            customClass: {
                                popup: 'swal-custom-popup',
                                title: 'swal-custom-title',
                                confirmButton: 'swal-custom-confirm'
                            }
                        });
                    } else {
                        // Handle validation errors
                        let errorMessage = 'Please check the form and try again.';
                        if (data.errors) {
                            errorMessage = Object.values(data.errors).flat().join('\n');
                        }
                        alert(errorMessage);
                    }

                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again later.');
                    
                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            });
        }

        // Add subtle animations to form elements
        const formControls = document.querySelectorAll('.form-control');
        formControls.forEach(control => {
            control.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });

            control.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Animate benefit items
        const benefitItems = document.querySelectorAll('.benefit-item');
        benefitItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.benefit-icon');
                if (icon) {
                    icon.style.transform = 'scale(1.1) rotate(5deg)';
                }
            });

            item.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.benefit-icon');
                if (icon) {
                    icon.style.transform = 'scale(1) rotate(0)';
                }
            });
        });
    });
</script>

<style>
    /* Add padding to account for fixed header */
    .hero {
        padding-top: 80px;
        text-align: center;
        padding-bottom: 60px;
    }

    /* Form styles */
    .form-group {
        position: relative;
    }

    .form-label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #1f2937;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: #6366f1;
    }

    .form-control:focus {
        outline: none;
        border-color: #6366f1;
        background: white;
        box-shadow: 0 10px 20px rgba(99, 102, 241, 0.1);
    }

    .form-control::placeholder {
        color: #9ca3af;
    }

    .form-icon {
        position: absolute;
        left: 20px;
        /* top: 50%; */
        transform: translateY(-50%);
        color: #6366f1;
        font-size: 1.1rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        padding-top: 30px;
    }

    .form-control:focus + .form-icon {
        color: #10b981;
    }

    .country-code-dropdown {
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        /* width: 100%; */
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        z-index: 1000 !important;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        max-height: 300px;
        overflow-y: auto;
        border: 1px solid #e5e7eb;
    }

    .country-code-dropdown.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .country-search {
        padding: 15px;
        border-bottom: 1px solid #e5e7eb;
    }

    .country-search input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-size: 0.9rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
    }

    .country-search input:focus {
        outline: none;
        border-color: #6366f1;
    }

    .country-list {
        /* max-height: 250px;
        overflow-y: auto; */
    }

    .country-item {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
    }

    .country-item:hover {
        background: rgba(99, 102, 241, 0.05);
    }

    .country-item.active {
        background: rgba(99, 102, 241, 0.1);
    }

    .country-item .country-flag {
        margin-right: 12px;
    }

    .country-info {
        flex: 1;
    }

    .country-name {
        font-weight: 500;
        color: #1f2937;
        font-size: 0.95rem;
    }

    .country-code {
        font-weight: 600;
        color: #6366f1;
        font-size: 0.9rem;
    }

    .floating-element {
        position: absolute;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #10b981 100%);
        opacity: 0.1;
        filter: blur(40px);
    }

    .upload-area:hover {
        border-color: #6366f1;
        background: rgba(99, 102, 241, 0.02);
    }

    .submit-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(99, 102, 241, 0.4);
    }

    .benefit-item:hover {
        background: rgba(99, 102, 241, 0.05);
    }

    .benefits-card:hover, .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(99, 102, 241, 0.15);
    }

    /* Responsive Design */
    @media (max-width: 1100px) {
        .container {
            flex-direction: column;
            gap: 60px;
        }

        .form-panel, .benefits-panel {
            min-width: auto;
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem;
        }

        .header h1 {
            font-size: 2.5rem;
        }

        .form-panel, .benefits-panel {
            /* padding: 30px; */
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
    }

    @media (max-width: 480px) {
        .hero h1 {
            font-size: 2rem;
        }

        .header h1 {
            font-size: 2rem;
        }

        .form-panel, .benefits-panel {
            /* padding: 20px; */
        }

        .submit-btn {
            font-size: 1rem;
            padding: 18px;
        }
    }
</style>

@endsection