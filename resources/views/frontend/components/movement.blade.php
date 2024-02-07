

<div class="join-our-movement-sectrion">
    <div class="container w-container">
        <div class="join-our-movement-title-block">
            <div class="section-title-block section-block-center">
                <h2 class="section-title">
                    {{ __('translate.ask_about_us') }}
                </h2>
                <p class="section-summary">
                    {{ __('translate.ask_about_us_description') }}
                </p>
            </div>
        </div>
        <div style="" class="join-our-movement-wrapper">
            <div class="join-our-movement-form-block w-form">
                <div class="join-our-movement-form-inner" >
                    <input type="text"  class="form-input-field w-input"  name="name"       id="nameId" placeholder="Your Name"  />
                    <input type="email" class="form-input-field w-input"  name="email"      id="emailId" placeholder="Email Here"  />
                    <input type="number"   class="form-input-field w-input"  name="mobile_no"  id="mobile_noId" step="any" placeholder="Phone number"  />
                </div>


                <div class="custom-form-input-field">
                    <input type="text" class="form-input-field w-input custom-w-input" maxlength="256" name="message" placeholder="message" id="messageId" />
                </div>
                <div class="custom-submit-button">
                    <button id="askAboutus" class="custom-submit-button submit-button w-button">{{ __('Send')}}</button>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end header-top-section -->


