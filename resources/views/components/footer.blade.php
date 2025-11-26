<footer>
    <div class="container">
        <div class="footer-container">
            <div class="footer-col">
                <h3>Elevate Support</h3>
                <p>Call Help Desk helps you connect with live agents faster and get your airline issues resolved with no waiting times. Whether it's to make bookings, cancellations, refunds, or baggage issues, we're here 24/7 to make your flying simpler.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('companies.index') }}">Companies A-Z</a></li>
                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Legal</h3>
                <ul>
                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></li>
                    <li><a href="{{ route('disclaimer') }}">Disclaimer</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Contact Us</h3>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> 123 Support Street, NY</li>
                    <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                    <li><i class="fas fa-envelope"></i> help@callhelpdesk.com</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Elevate Support. All rights reserved.</p>
        </div>
    </div>
</footer>

<style>
footer {
    background-color: #1a1a1a;
    color: #ffffff;
    padding: 60px 0 20px;
    margin-top: auto;
}

.footer-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    margin-bottom: 40px;
}

.footer-col h3 {
    color: #ffffff;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    position: relative;
}

.footer-col h3::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -5px;
    width: 30px;
    height: 2px;
    background-color: #1565ff;
}

.footer-col p {
    color: #cccccc;
    line-height: 1.6;
    margin-bottom: 20px;
}

.footer-col ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-col ul li {
    margin-bottom: 10px;
}

.footer-col ul li a {
    color: #cccccc;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-col ul li a:hover {
    color: #1565ff;
}

.social-links {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.social-links a {
    display: inline-block;
    width: 40px;
    height: 40px;
    background-color: #333;
    color: #ffffff;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background-color: #1565ff;
    transform: translateY(-2px);
}

.footer-bottom {
    border-top: 1px solid #333;
    padding-top: 20px;
    text-align: center;
}

.footer-bottom p {
    color: #888;
    margin: 0;
    font-size: 14px;
}

@media (min-width: 769px) {
    .footer-container {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (max-width: 768px) {
    .footer-container {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    footer {
        padding: 40px 0 20px;
    }
}
</style>
