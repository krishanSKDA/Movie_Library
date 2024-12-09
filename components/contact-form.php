<?php session_start(); ?>
<div class="contact-back">
    <div class="contact-container">
        <div class="contact-section">
            <div class="contact-form">
                <h2>How to reach us</h2>
                <p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                <form id="contactForm" action="sendmail.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName" class="required">First Name</label>
                            <input type="text" id="firstName" name="firstName" required>
                            <div class="error" id="firstNameError">Please enter your first name</div>
                        </div>
                        <div class="form-group">
                            <label for="lastName" class="required">Last Name</label>
                            <input type="text" id="lastName" name="lastName" required>
                            <div class="error" id="lastNameError">Please enter your last name</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="required">Email</label>
                        <input type="email" id="email" name="email" required>
                        <div class="error" id="emailError">Please enter a valid email address</div>
                    </div>

                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="tel" id="telephone" name="telephone">
                        <div class="error" id="telephoneError">Please enter a valid phone number</div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="required">Message</label>
                        <textarea id="message" name="message" required></textarea>
                        <div class="error" id="messageError">Please enter your message</div>
                    </div>

                    <div class="terms">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">I agree to the <a href="#">Terms & Conditions</a></label>
                    </div>


                    <div class="submit-button-container">
                        <button type="submit" name="submitContact" class="submit-button">SUBMIT</button>
                    </div>
                </form>
            </div>

            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.3812075643614!2d79.9404323!3d6.844821199999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25069caa2f53b%3A0xe7eae3a8b1f1214d!2seBEYONDS%20eBusiness%20%26%20Digital%20Solutions!5e0!3m2!1sen!2slk!4v1732729897966!5m2!1sen!2slk"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
<script src="js/form.js"></script>