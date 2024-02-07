<script type="text/javascript">
    $("document").ready(function() {
        setTimeout(function() {
            $("div.alert").remove();
        }, 3000);
    });
</script>




<script type="text/javascript">
    var url = "<?php echo e(route('changeLang')); ?>";
    $(".changeLang").change(function() {
        window.location.href = url + "?lang=" + $(this).val();
    });
</script>






<script type="text/javascript">
    $('#SubscribeBtnId').click(function() {
        var subscriberemail = $('#SubscribeEmailId').val();
        SendSubscribe(subscriberemail);
    });

    function SendSubscribe(subscriberemail) {
        if (subscriberemail.length == 0) {
            $('#SubscribeBtnId').html('Enter your email !')
            setTimeout(function() {
                $('#SubscribeBtnId').html('Send it');
            }, 2000)
        } else {
            $('#SubscribeBtnId').html('Sending...')
            axios.post('/subscriber', {
                    email: subscriberemail,

                })
                .then(function(response) {
                    if (response.status == 200) {
                        if (response.data == 1) {
                            $('#SubscribeBtnId').html('You have successfully subscribed')
                            $('.successmessage').html(
                                'Verify that you have successfully subscribed, check your inbox or spam')
                            setTimeout(function() {
                                $('#SubscribeBtnId').html('Subscribe');
                            }, 3000)

                        } else {
                            $('#SubscribeBtnId').html('Request failed! Try again ')
                            setTimeout(function() {
                                $('#SubscribeBtnId').html('Subscribe');
                            }, 3000)
                        }
                    } else {
                        $('#SubscribeBtnId').html('Request failed! Try again ')
                        setTimeout(function() {
                            $('#SubscribeBtnId').html('Subscribe');
                        }, 3000)
                    }

                }).catch(function(error) {
                    $('#SubscribeBtnId').html('Your email is already subscribed')
                    setTimeout(function() {
                        $('#SubscribeBtnId').html('Subscribe');
                    }, 3000)
                })
        }
    }

</script>



<script type="text/javascript">

    $('#askAboutus').click(function() {
        var name = $('#nameId').val();
        var email = $('#emailId').val();
        var mobile_no = $('#mobile_noId').val();
        var message = $('#messageId').val();

        SendAskabout(name, email, mobile_no, message);
    });

    function SendAskabout(name, email, mobile_no, message) {

        if (name.length == 0) {
            $('#askAboutus').html('Enter Your Name !')
            setTimeout(function() {
                $('#askAboutus').html('Send');
            }, 2000)
        } else if (email.length == 0) {
            $('#askAboutus').html('Enter email Here !')
            setTimeout(function() {
                $('#askAboutus').html('Send');
            }, 2000)
        } else if (mobile_no.length == 0) {
            $('#askAboutus').html('Enter phone number!')
            setTimeout(function() {
                $('#askAboutus').html('Send');
            }, 2000)
        } else if (message.length == 0) {
            $('#askAboutus').html('Enter message!')
            setTimeout(function() {
                $('#askAboutus').html('Send');
            }, 2000)
        } else {
            $('#askAboutus').html('Sending...')
            axios.post('/askaboutus', {
                    name: name,
                    email: email,
                    mobile_no: mobile_no,
                    message: message,
                })
                .then(function(response) {
                    if (response.status == 200) {
                        if (response.data == 1) {
                            $('#askAboutus').html(
                                'Thank you very much for asking about us. I will contact you soon')
                            setTimeout(function() {
                                $('#askAboutus').html('Send');
                            }, 10000)

                            $('#nameId').val('');
                            $('#emailId').val('');
                            $('#mobile_noId').val('');
                            $('#messageId').val('');

                        } else {
                            $('#askAboutus').html('Oops! Something went wrong while submitting the form.')
                            setTimeout(function() {
                                $('#askAboutus').html('Send');
                            }, 3000)
                        }
                    } else {
                        $('#askAboutus').html('Oops! Something went wrong while submitting the form.')
                        setTimeout(function() {
                            $('#askAboutus').html('Send');
                        }, 3000)
                    }

                }).catch(function(error) {
                    $('#askAboutus').html('Oops! Something went wrong')
                    setTimeout(function() {
                        $('#askAboutus').html('Send');
                    }, 3000)
                })
        }
    }
    //end Ask about us

</script>



<script type="text/javascript">

$('#MemberSend').click(function() {
    var name        = $('#nameId').val();
    var email       = $('#emailId').val();
    var mobile_no   = $('#mobile_noId').val();
    var subject     = $('#subjectId').val();
    var message     = $('#messageId').val();
        SendMember(name, email, mobile_no, subject, message);
    });

    function SendMember(name, email, mobile_no, subject, message) {

        if (name.length == 0) {
            $('#MemberSend').html('Enter Your Name !')
            setTimeout(function() {
                $('#MemberSend').html('Send Message');
            }, 2000)
        } else if (email.length == 0) {
            $('#MemberSend').html('Enter email Here !')
            setTimeout(function() {
                $('#MemberSend').html('Send Message');
            }, 2000)
        } else if (mobile_no.length == 0) {
            $('#MemberSend').html('Enter phone number!')
            setTimeout(function() {
                $('#MemberSend').html('Send Message');
            }, 2000)
        } else if (subject.length == 0) {
            $('#MemberSend').html('Enter subject!')
            setTimeout(function() {
                $('#MemberSend').html('Send Message');
            }, 2000)
        } else if (message.length == 0) {

            $('#MemberSend').html('Enter message!')
            setTimeout(function() {
                $('#MemberSend').html('Send Message');
            }, 2000)

        }else {
            $('#MemberSend').html('Please wait...')
            axios.post('/contact/member/store', {
                    name     :name,
                    email    :email,
                    mobile_no:mobile_no,
                    subject  :subject,
                    message  :message,
                })
                .then(function(response) {
                    if (response.status == 200) {
                        if (response.data == 1) {
                            $('#MemberSend').html('Thank you! Your submission has been received!')
                            setTimeout(function() {
                                $('#MemberSend').html('Send Message');
                            }, 10000)
                            $('#nameId').val('');
                            $('#emailId').val('');
                            $('#mobile_noId').val('');
                            $('#messageId').val('');

                        } else {
                            $('#MemberSend').html('Oops! Something went wrong while submitting the form.')
                            setTimeout(function() {
                                $('#MemberSend').html('Send Message');
                            }, 3000)
                        }
                    } else {
                        $('#MemberSend').html('Oops! Something went wrong while submitting the form.')
                        setTimeout(function() {
                            $('#MemberSend').html('Send Message');
                        }, 3000)
                    }

                }).catch(function(error) {
                    $('#MemberSend').html('Oops! Something went wrong')
                    setTimeout(function() {
                        $('#MemberSend').html('Send Message');
                    }, 3000)
                })
        }
    }


</script>



<script>
    window.onscroll = function() {
        handleScroll();
    };
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function handleScroll() {
        stickyNav();
        updateBackground();
    }

    function stickyNav() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky-one");
        } else {
            navbar.classList.remove("sticky-one");
        }
        if (window.pageYOffset === 0) {
            navbar.classList.remove("sticky-one");
        }
    }
</script>



<script>
    let slideIndex = 1;
    showSlides(slideIndex);
    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }
    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>



<script>
    $(document).ready(function() {
        $('.vid-item').each(function(index) {
            $(this).on('click', function() {
                var current_index = index + 1;
                $('.vid-item .thumb').removeClass('active');
                $('.vid-item:nth-child(' + current_index + ') .thumb').addClass('active');
            });
        });
    });
</script>





<?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/frontend/layouts/scripts.blade.php ENDPATH**/ ?>