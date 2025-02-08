<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main CSS File -->
    <link href="assets/css/forms.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="split-screen">
        <div class="left">
            <!-- <section class="copy">
                <h1>
                    Explore your BIR process with CPCPA
                </h1>
                <p>Cresencio Sedentario St., San Antonio, Linao, Talisay City, Cebu, 6045 Philippines.</p>
            </section> -->
        </div>
        <div class="right">
            <form>
                <section class="copy">
                    <h2>Register Account</h2>
                    <!-- <div class="login-container">
                        <p>Already have an Account? <a href="#"><strong>Login</strong></a></p>
                    </div> -->
                </section>
                <div class="input-container department">
                    <label for="department">How did you hear about us?</label>
                    <select name="department" id="department">
                        <option value="office-of-the-president">Office of the President</option>
                        <option value="finance-accounting-customer-service">Finance, Accounting and Customer Service Department</option>
                        <option value="sales-operations">Sales and Operations Department</option>
                        <option value="special-operations">Special Operations Department</option>
                        <option value="operational-planning-invoicing">Operational Planning and Invoicing Department</option>
                        <option value="facebook-inquiry">Facebook Inquiry</option>
                        <option value="instagram-inquiry">Instagram Inquiry</option>
                        <option value="twitter-inquiry">X Inquiry</option>
                        <option value="linkedin-inquiry">LinkedIn Inquiry</option>
                        <option value="google-seo-inquiry">Google SEO Inquiry</option>
                        <option value="tiktok-inquiry">Tiktok Inquiry</option>
                        <option value="referral">Referral by (put below in "Other" the name of referrer)</option>
                    </select>
                </div>
                <div class="input-container name">
                    <label for="fname">Full name</label>
                    <input type="text" name="fname" id="fname">
                </div>
                 
                <div class="input-container email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                
                <div class="input-container password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="At least 8 characters">
                    <i class="far fa-eye-slash"></i>
                </div>
                <div class="input-container cta">
                    <label class="checkbox-container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        Remember me
                    </label>
                </div>
                <button class="signup-btn" type="submit">Sign Up</button>
                <section class="copy legal">
                    <p><span class="small">By continuing, you agree to accept our 
                        <br>
                        <a href="#">Privacy and Policy</a>
                        &amp;
                        <a href="#">Terms and Conditions</a>.
                    </span></p>
                </section>
            </form>
        </div>
    </div>
</body>
</html>