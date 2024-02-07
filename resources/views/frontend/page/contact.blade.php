

@extends('frontend.layouts.frontend')

@section('breadcrumb-section')
<div class="breadcrumb-section wf-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">{{ __('navigation.contact_page') }}</h1>
            <div class="breadcrumb-link-block">
                <a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">{{ __('navigation.contact') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_style')
<style>
    .contact-single-item {
          max-width: 100%;
      }
  </style>

@endsection

@section('content')



<div class="contact-section wf-section">
    <div class="container w-container">
        <div class="contact-wrapper">
            <div class="contact-content-block">
                <div class="section-title-block">
                    <h2 class="section-title">{{ ($setting->contact_heding) }}</h2>
                    <p class="section-summary">
                       {{ ($setting->contact_des) }}
                    </p>
                </div>
                <div class="contact-information-wrapper">

                    <div class="contact-single-item">
                        <div class="contact-single-item-title">{{ __('translate.head_quater') }}</div>
                        <div class="contact-single-text">
                            {{ $setting->address ?? '' }}
                        </div>
                    </div>

                    <div class="contact-single-item">
                        <div class="contact-single-item-title">{{ __('translate.web_info') }}</div>
                        <div class="contact-single-mail-link-block">
                            <a href="{{$setting->web ?? ''}}" target="_blank" class="contact-single-mail-link">{{$setting->web ?? ''}}</a>
                            <a href="mailto:{{$setting->email ?? ''}}" class="contact-single-mail-link">{{$setting->email ?? ''}}</a>
                        </div>
                    </div>

                    <div class="contact-single-item">
                        <div class="contact-single-item-title">{{ __('translate.phone_number') }}</div>
                        <div class="contact-page-number-block">
                            <a href="tel:{{$setting->phone_number ?? ''}}" class="contact-single-number-link">{{$setting->phone_number ?? ''}}</a>
                            <a href="tel:{{$setting->phone_number ?? ''}}" class="contact-single-number-link">{{$setting->phone_number ?? ''}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-image-block">
                <div class="image-wrapper animate-in">
                    <div class="image-overlay"></div>
                    <img src="{{ asset('frontend/images/page/about-image-2.png') }}" loading="lazy" alt="about-image" class="media-fit-image" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-form-section wf-section">
    <div class="container w-container">

        <div class="contact-form-wrapper">
            <div class="contact-wrapper-block">
                <div class="form-block w-form">


                    <div class="form">
                        <div class="contact-form-grid">
                            <div class="form-column">
                                <input type="text" class="form-input-field contact-form-field w-input" name="name"  id="nameId" placeholder="name *"/>
                            </div>
                            <div class="form-column">
                                <input type="email" class="form-input-field contact-form-field w-input" name="email"  placeholder="Email *"id="emailId" />
                                </div>
                            <div  class="form-column">
                                <input type="tel" class="form-input-field contact-form-field w-input"  name="mobile_no" placeholder="Phone no.*" id="mobilenoId"  />
                            </div>
                            <div class="form-column">
                                <input type="text" class="form-input-field contact-form-field w-input"  name="subject"  placeholder="Subject" id="subjectId" />
                            </div>

                            <div id="w-node-_067e78ab-fb8f-3c62-b2ea-905eba4e6513-dcadacc1" class="form-column">
                                <textarea data-name="Message" maxlength="5000" id="messageId" name="message" placeholder="Write some message here" class="form-textarea w-input"></textarea></div>
                        </div>
                        <button id="ContactSendBtn" class="custom-submit-button submit-button w-button">{{ __('Send Message')}}</button>

                    </div>




                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.components.logo')

@endsection

@section('page_script')

<script>
    
    $('#ContactSendBtn').click(function() {
        var name      = $('#nameId').val();
        var email     = $('#emailId').val();
        var mobile_no = $('#mobilenoId').val();
        var subject   = $('#subjectId').val();
        var message   = $('#messageId').val();

        ContactSend(name, email, mobile_no,subject, message);
    });

    function ContactSend(name, email, mobile_no, subject, message) {

        if (name.length == 0) {
            $('#ContactSendBtn').html('Enter Your Name !')
            setTimeout(function() {
                $('#ContactSendBtn').html('Send Message');
            }, 2000)
        } else if (email.length == 0) {
            $('#ContactSendBtn').html('Enter email Here !')
            setTimeout(function() {
                $('#ContactSendBtn').html('Send Message');
            }, 2000)
        } else if (mobile_no.length == 0) {
            $('#ContactSendBtn').html('Enter phone number!')
            setTimeout(function() {
                $('#ContactSendBtn').html('Send Message');
            }, 2000)
        }
        else if (subject.length == 0) {
            $('#ContactSendBtn').html('Enter subject!')
            setTimeout(function() {
                $('#ContactSendBtn').html('Send Message');
            }, 2000)
        }

        else if (message.length == 0) {
            $('#ContactSendBtn').html('Enter message!')
            setTimeout(function() {
                $('#ContactSendBtn').html('Send Message');
            }, 2000)
        } else {
            $('#ContactSendBtn').html('Sending...')
            axios.post('/contact/store', {
                    name        : name,
                    email       : email,
                    mobile_no   : mobile_no,
                    subject     : subject,
                    message     : message,
                })
                .then(function(response) {
                    if (response.status == 200) {
                        if (response.data == 1) {
                            $('#ContactSendBtn').html(
                                'Thank you very much for asking about us. I will contact you soon')
                            setTimeout(function() {
                                $('#ContactSendBtn').html('Send Message');
                            }, 10000)

                            $('#nameId').val('');
                            $('#emailId').val('');
                            $('#mobile_noId').val('');
                            $('#subjectId').val('');
                            $('#messageId').val('');

                        } else {
                            $('#ContactSendBtn').html('Oops! Something went wrong while submitting the form.')
                            setTimeout(function() {
                                $('#ContactSendBtn').html('Send Message');
                            }, 3000)
                        }
                    } else {
                        $('#ContactSendBtn').html('Oops! Something went wrong while submitting the form.')
                        setTimeout(function() {
                            $('#ContactSendBtn').html('Send Message');
                        }, 3000)
                    }

                }).catch(function(error) {
                    $('#ContactSendBtn').html('Oops! Something went wrong')
                    setTimeout(function() {
                        $('#ContactSendBtn').html('Send Message');
                    }, 3000)
                })
        }
    }
    //end Ask about us

</script>


@endsection
