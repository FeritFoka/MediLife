    <section class="section-send-email">
      <div class="send-email-form">
        <div class="contact-info">
          <h3 aria-readonly="true" class="contact-info-title">Let's get in touch</h3>
          <p aria-readonly="true" class="contact-info-text">Do you have a comment, need help, want to ask a question or just want to say hello?</p>

          <div>
            <div class="medilife-contact-info">
              <img src="/public/images/location_icon.png" class="contact-icon" alt="Medilife location icon" />
              <p aria-readonly="true">Cara Hadrijana 10b, Osijek</p>
            </div>
            <div class="medilife-contact-info">
              <img src="/public/images/email_icon.png" class="contact-icon" alt="Medilife email address icon" />
              <p aria-readonly="true">contact@medilife.com</p>
            </div>
            <div class="medilife-contact-info">
              <img src="/public/images/phone_icon.png" class="contact-icon" alt="Medilife phone icon" />
              <p aria-readonly="true">123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p aria-readonly="true">Connect with us:</p>
            <ul class="social-icons">
              <li class="social-icon">
                <a role="link" href="https://www.facebook.com">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="social-icon">
                <a role="link" href="https://twitter.com">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="social-icon">
                <a role="link" href="https://www.instagram.com">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              <li class="social-icon">
                <a role="link" href="https://hr.linkedin.com">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form class="send-email-card" method="post" action="./email/send-mail.php">
            <h3 aria-readonly="true" class="send-email-title">Contact us</h3>
            <div class="email-input-container">
              <input type="text" name="name" class="email-input" placeholder="Name" />
            </div>
            <div class="email-input-container">
              <input type="email" name="email" class="email-input" placeholder="Email" />
            </div>
            <div class="email-input-container">
              <input type="tel" name="phone" class="email-input" placeholder="Phone" />
            </div>
            <div class="email-input-container textarea">
              <textarea name="message" class="email-input" placeholder="Message"></textarea>
            </div>
            <button type="submit" role="button" class="send-email-button">Send</button>
          </form>
        </div>
      </div>
    </section>