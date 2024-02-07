@extends('frontend.layouts.frontend')



@section('breadcrumb-section')
<div class="breadcrumb-section">
    <div class="container w-container">
        <div class="breadcrumb-wrapper"
            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
            <h1 class="breadcrumb-title">Joining</h1>
            <div class="breadcrumb-link-block"><a href="/" class="breadcrumb-backlink">Home</a>
                <div class="breadcrunb-slach">/</div>
                <div class="current-page-name">joining</div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')

<div class="contact-form-section wf-section">
    <div class="container w-container">
        <div class="join-our-movement-title-block">
            <div class="section-title-block section-block-center"
                style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                <h2 class="section-title">Affidavit</h2>
                <p class="section-summary">

                    The five-point program that Allah gave to His last Prophet to establish the Truth based on the Tawheed of Allah in the world and the program that the Prophet struggled in his life according to the program that he entrusted to his ummah to continue the struggle according to the program when he left the world, is a program-based commitment letter.

                    1. I will be united like steel with other members of this movement. I will not say or do anything that destroys unity. I will not disagree on anything. If there is any reason for disagreement, I will remain silent and leave it to the leader's decision without saying anything about it, and then when the leader's decision is decided, I will implement that decision even if it costs life and property. I will believe that the other members of this movement are my brothers and sisters, they are more than my blood relations.

                    2. I will always be alert and aware when the leader gives an order.

                    3. I will obey the leader's orders to the letter. If the leader gives an order, whether I like it or not, right or wrong, I will follow that order without any hesitation. I don't care whether it damages property, lives or lives. I will not disobey any command except against the law of Farde. If the leader orders, I will suspend Sunnah-Nafal worship. Once the leader is engaged, I will not see if he is qualified or not; I will follow his order as soon as it is done. I will not care about dangers, storms and rains.

                    4. I will believe that I myself and other members of this movement are guided, i.e. I am trying to be established or established in the right belief given by Allah, in the right path, in the right direction, in Seratul Mustaqeem. I am different and separate from all the people who are not in this guidance, i.e. the rest of the world. Although I live among them, I am not one of them. Due to the perversion of belief and lack of guidance, they believe in Allah-Messenger and perform Salah (prayer), Sawm (fasting), Hajj, Zakat and many nafls, but they will not be of any use. I will not worship them. I will worship only with the brothers and sisters of this movement. I renounced the current distorted Islam. I will not take part in any political activities.

                    5. I will always remember that the above unity, that order, that obedience, that Hazrat's only purpose is the Tawheed of Allah, Seratul Mustaqeem ie the real Deenul Haq, the struggle to establish Deenul Qayyima on earth, Jihad; And I will also remember that if any one of that unity, that chain, that loyalty, that Hazrat is weakened, victory in Jihad is no longer possible. Let me also remember that the Messenger of God said, whoever deviates even a tiny bit from the bond of brotherhood of the five-point program of unity, order, loyalty, emigration and jihad, the bond of Islam will be loosened from his or her neck. Unless he repents and returns to this program, and whoever calls for another program, no matter how great a Muslim he or they think they are, how much Salah (prayer) they perform, how much they fast (fast), how much Ibadah they perform. , they will become fuel stones of hell.
                </p>
            </div>
        </div>
        <div class="contact-form-wrapper">
            <div class="contact-wrapper-block">
                <div class="form-block w-form" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">

                    <form id="myForm" method="post" action="{{ route('joining.store') }}" enctype="multipart/form-data">
                        @csrf


                        <div id="wf-form-Contact-Form" name="wf-form-Contact-Form" data-name="Wf Form Contact Form"
                            method="get" class="form" aria-label="Wf Form Contact Form">
                            <div class="contact-form-grid">
                                <div id="" class="form-column">
                                    <input type="text" class="form-input-field contact-form-field w-input" maxlength="256"
                                        name="name"  placeholder="Name *" id="name" style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                </div>
                                <div id="w-node-f11c9290-8c40-f877-5902-b2896afd7bea-b4e84c0c" class="form-column"><input
                                        type="email" class="form-input-field contact-form-field w-input" maxlength="256"
                                        name="Email" data-name="Email" placeholder="Email *" id="Email" required=""
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                </div>
                                <div id="w-node-f11c9290-8c40-f877-5902-b2896afd7bec-b4e84c0c" class="form-column"><input
                                        type="tel" class="form-input-field contact-form-field w-input" maxlength="256"
                                        name="Last-Name" data-name="Last Name" placeholder="Phone no.*" id="Last-Name"
                                        required=""
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                </div>
                                <div id="w-node-f11c9290-8c40-f877-5902-b2896afd7bee-b4e84c0c" class="form-column"><input
                                        type="text" class="form-input-field contact-form-field w-input" maxlength="256"
                                        name="Subject" data-name="Subject" placeholder="Subject" id="Subject"
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                </div>
                                <div id="w-node-c6640177-94ae-8f4b-ebde-bb7d23506d81-b4e84c0c" class="form-column"><input
                                        type="text" class="form-input-field contact-form-field w-input" maxlength="256"
                                        name="Address-1" data-name="Address 1" placeholder="Address line 1" id="Address"
                                        required=""
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                </div>
                                <div id="w-node-_84cf211a-9401-0efc-54a4-0fe390dbfeb5-b4e84c0c" class="form-column"><input
                                        type="text" class="form-input-field contact-form-field w-input" maxlength="256"
                                        name="Address-2" data-name="Address 2" placeholder="Address line 2" id="Address-2"
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                </div>
                                <div id="w-node-af05159f-7bb4-8260-467b-67a02bf3b100-b4e84c0c" class="form-column"><select
                                        id="Country-Field" name="Country-Field" data-name="Country Field"
                                        class="form-input-field contact-form-field w-select"
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <option value="">Select Your Country</option>
                                        <option value="First">First choice</option>
                                        <option value="Second">Second choice</option>
                                        <option value="Third">Third choice</option>
                                        <option value="Another option">Another option</option>
                                        <option value="Another option">Another option</option>
                                        <option value="Another option">Another option</option>
                                        <option value="Another option">Another option</option>
                                    </select></div>
                                <div id="w-node-_7263ac77-2308-575a-c245-21018fd718e9-b4e84c0c" class="form-column"><select
                                        id="City-Field" name="City-Field" data-name="City Field"
                                        class="form-input-field contact-form-field w-select"
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                        <option value="">Select Your City</option>
                                        <option value="First">First choice</option>
                                        <option value="Second">Second choice</option>
                                        <option value="Third">Third choice</option>
                                        <option value="Another option">Another option</option>
                                        <option value="Another option">Another option</option>
                                        <option value="Another option">Another option</option>
                                        <option value="Another option">Another option</option>
                                    </select></div>
                                <div id="w-node-c7a6bc01-194c-da73-7e31-6add397b62c5-b4e84c0c" class="form-column"><input
                                        type="text" class="form-input-field contact-form-field w-input" maxlength="256"
                                        name="Zip-Code" data-name="Zip Code" placeholder="Zip Code" id="Zip-Code"
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                </div>
                                <div id="w-node-_905f8379-da73-1e29-5a34-3741d3a057ea-b4e84c0c" class="form-column"><input
                                        type="text" class="form-input-field contact-form-field w-input" maxlength="256"
                                        name="Profession" data-name="Profession" placeholder="Profession" id="Profession"
                                        style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">
                                </div>
                                <div id="w-node-f11c9290-8c40-f877-5902-b2896afd7bf0-b4e84c0c" class="form-column"><textarea
                                        data-name="Message" maxlength="5000" id="Message" name="Message"
                                        placeholder="Write some message here" class="form-textarea w-input"></textarea>
                                </div>
                            </div>
                            <input type="submit" value="Join Now"  class="button-primary anotther-button form-submit-button w-button">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.components.logo')
@endsection
