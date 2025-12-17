@extends('layouts.app')

@section('content')
@include('components.header')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h1>Terms of <span>Service</span></h1>
            <p>Clear terms of service for a fair and responsible use of Call Help Desk</p>
        </div>
    </div>
</section>

<!-- Terms Content -->
<section class="terms-content">
    <div class="container">
        <div class="content-wrapper">
            <div class="policy-section">
                <p>Welcome to Call Help Desk. These Terms of Service stand for the conditions of your use of this website and the information on this website. You acknowledge and agree to all of these terms by using this website.</p>
            </div>

            <div class="policy-section">
                <h2>Purpose of the Website</h2>
                <p>Call Help Desk is an online information resource created to help users find customer service contact numbers of different companies in the United States. The primary purpose of this website is to provide accurate, easy-to-find, regularly updated information for general reference. We have no association or endorsement from, or operations on behalf of any company.</p>
            </div>

            <div class="policy-section">
                <h2>Acceptable Use</h2>
                <p>The information that may be available to you from our site is only for reference. You agree to use it responsibly, for lawful, non-commercial purposes only. You will not use the numbers on this website for advertising, resale, data mining, or any purpose that inappropriately represents the source or use of the information.</p>
            </div>

            <div class="policy-section">
                <h2>Information Reliability</h2>
                <p>We have made every effort so that each number on the site remains accurate. However, the information may change as the companies update their information periodically. While we make no such declarations that all information will be entirely error-free, we will try to maintain only resources that are reliable and useful.</p>
            </div>

            <div class="policy-section">
                <h2>Ownership & Intellectual Rights</h2>
                <p>The relevant intellectual property rights apply to all written content, format, and design on the site. Users may view and use the material exclusively for their own reference. Except for content used in fairways, you are strictly forbidden from copying, modifying, or redistributing any of the content without our written authorization.</p>
            </div>

            <div class="policy-section">
                <h2>Data Presentation Standards</h2>
                <p>Data on our site has been presented considering the factors of accuracy and reliability. The data has been formatted in such a way that all information is clear and consistent, aiding the user in locating the information they're looking for. Each company name appears purely for identification purposes.</p>
            </div>

            <div class="policy-section">
                <h2>Disclaimer of Information</h2>
                <p>We work hard so all information remains up-to-date and accurate. However, the content on this website is meant for general reference only and is subject to change or correction without notice. We make every effort to provide accurate content, but there may be occasional discrepancies or outdated details. Users are encouraged to use the information as a guide and to use caution when making any related decisions.</p>
            </div>

            <div class="policy-section">
                <h2>Use and Conduct</h2>
                <p>You agree to use Call Help Desk in a manner that does not impede its proper functioning. You shall not use the site to introduce viruses or similar malware, gather information illegally or inappropriately, or disrupt the technical operations of the website. Any fraudulent use of data may lead to your access being denied.</p>
            </div>

            <div class="policy-section">
                <h2>Changes and Updates in the Content</h2>
                <p>We reserve the right to edit, rearrange, and/or delete content as we deem fit. This is done to establish data accuracy and the effectiveness of the site. This may happen at any time without notice. We intend to be transparent with the users and maintain an uninterrupted user experience.</p>
            </div>

            <div class="policy-section">
                <h2>Changes to These Terms</h2>
                <p>Amendments to the terms may be made to reflect improvements in operations or changes in the policy of information. The most up-to-date version will always be available on this page. Continued use of the site after the revision to the Terms indicates your acceptance of the changes.</p>
            </div>

            <div class="policy-section">
                <h2>Availability and Support of the Platform</h2>
                <p>We will try to provide uninterrupted availability of the platform, but there will be times when it may experience temporary downtime. This might be due to maintenance or upgrading of the site and its services. Certain pages, sections, or other access to information on the platform may change without prior notification. This website is provided for information references only, and not for advisory-based services or transactions.</p>
            </div>

            <div class="policy-section">
                <h2>Contact Info</h2>
                <p>Got some more queries on the policies? Please contact us through connect@callhelpdesk.com.</p>
            </div>

            <div class="policy-section">
                <h2>General Provisions</h2>
                <p>These Terms exist to enable users to use Call Help Desk in a fair manner. They emphasize responsible access, respect for proprietary content, and recognition of the website's informational purpose. The company may bring changes to strengthen the integrity of information from time to time.</p>
            </div>
        </div>
    </div>
</section>

@include('components.footer')
@endsection

<style>
.hero {
    padding: 100px 0px 30px 0px !important;
}
.social-links > a > svg {
    margin-top: 10px;
}
</style>