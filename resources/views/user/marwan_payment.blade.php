@extends('layouts.master')
@section('title')
    Check out
@endsection
@section('content')
    @include('user.includes.header' , ['header_name' => __('user.header.services') , 'link_name' => 'services' ])
    @push('css')
        <!-- INCLUDE SESSION.JS JAVASCRIPT LIBRARY -->
        <script src="https://test-nbe.gateway.mastercard.com/form/version/63/merchant/TESTEGPTEST/session.js"></script>
        <!-- APPLY CLICK-JACKING STYLING AND HIDE CONTENTS OF THE PAGE -->
        <style id="antiClickjack">body {
                display: none !important;
            }</style>
    @endpush
    <!-- CREATE THE HTML FOR THE PAYMENT PAGE -->
    <section dir="ltr">
        <div class="container">
            <div class="row">
                @if(Session::has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade mt-5 d-none" role="alert" id="divError">
                        <h1>Validation Errors</h1>
                       <ul class="errors"></ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 pt-5">
                    <div>Please enter your payment details:</div>
                    <h3>Credit Card</h3>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div>Card Number: <input type="text" id="card-number" class="form-control input-field"
                                                 title="card number" aria-label="enter your card number" value=""
                                                 tabindex="1" readonly></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div>Expiry Month:
                            <select id="expiry-month" class="form-control input-md" required="" readonly>
                                <option value="">Select Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div>Expiry Year:
                            <select id="expiry-year" class="form-control input-md" required="" readonly>
                                <option value="">Select Year</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                                <option>31</option>
                                <option>32</option>
                                <option>33</option>
                                <option>34</option>
                                <option>35</option>
                                <option>36</option>
                                <option>37</option>
                                <option>38</option>
                                <option>39</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <div>Security Code:<input type="text" id="security-code" class="form-control input-field"
                                                  title="security code" aria-label="three digit CCV security code"
                                                  value="" tabindex="4" readonly></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <div>Cardholder Name:<input type="text" id="cardholder-name" class="form-control input-field"
                                                    title="cardholder name" aria-label="enter name on card" value=""
                                                    tabindex="5" readonly></div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5">
                    <div>
                        <button id="payButton" class="btn btn-outline-success" onclick="pay('card');">Pay Now</button>
                    </div>
                </div>
            </div>
            </div>
    </section>

@endsection
@push('js-footer')
    <!-- JAVASCRIPT FRAME-BREAKER CODE TO PROVIDE PROTECTION AGAINST IFRAME CLICK-JACKING -->
    <script type="text/javascript">
        if (self === top) {
            var antiClickjack = document.getElementById("antiClickjack");
            antiClickjack.parentNode.removeChild(antiClickjack);
        } else {
            top.location = self.location;
        }
        // PaymentSession.setFocus('card.number');

        // PaymentSession.setFocusStyle(["card.number","card.securityCode"], {
        //   borderColor: 'red',
        //   borderWidth: '3px'
        // });

        // PaymentSession.setHoverStyle(["card.number","card.securityCode"], {
        //   borderColor: 'red',
        //   borderWidth: '3px'
        // });

        // PaymentSession.setPlaceholderStyle(["card.number", "card.nameOnCard"], {
        //   color: 'blue',
        //   fontWeight: 'bold',
        //   textDecoration: 'underline'
        // });
        // PaymentSession.setPlaceholderShownStyle(["card.number", "card.nameOnCard"], {
        //   color: 'green',
        //   fontWeight: 'bold',
        //   textDecoration: 'underline'
        // });
        let errorMsg = [];
        PaymentSession.configure({
            session: "{{ $seeion_id }}",
            fields: {
                // ATTACH HOSTED FIELDS TO YOUR PAYMENT PAGE FOR A CREDIT CARD
                card: {
                    number: "#card-number",
                    securityCode: "#security-code",
                    expiryMonth: "#expiry-month",
                    expiryYear: "#expiry-year",
                    nameOnCard: "#cardholder-name"
                }
            },
            //SPECIFY YOUR MITIGATION OPTION HERE
            frameEmbeddingMitigation: ["javascript"],
            callbacks: {
                initialized: function (response) {
                    // HANDLE INITIALIZATION RESPONSE
                },
                formSessionUpdate: function (response) {
                    // HANDLE RESPONSE FOR UPDATE SESSION
                    if (response.status) {
                        if ("ok" == response.status) {
                            console.log("Session updated with data: " + response.session.id);

                            //check if the security code was provided by the user
                            if (response.sourceOfFunds.provided.card.securityCode) {
                                console.log("Security code was provided.");
                                window.location.replace("{{route('invoice_step2', ['locale' => 'ar', 'id' => $last_invoice, 'seeion_id' =>$seeion_id ])}}");
                            }

                            //check if the user entered a Mastercard credit card
                            if (response.sourceOfFunds.provided.card.scheme == 'MASTERCARD') {
                                console.log("The user entered a Mastercard credit card.")
                            }
                        } else if ("fields_in_error" == response.status) {
                            errorMsg = [];
                            console.log("Session update failed with field errors.");
                            if (response.errors.cardNumber) {
                                console.log("Card number invalid or missing.");
                                errorMsg.push("Card number invalid or missing.");
                            }
                            if (response.errors.expiryYear) {
                                console.log("Expiry year invalid or missing.");
                                errorMsg.push("Expiry year invalid or missing.");
                            }
                            if (response.errors.expiryMonth) {
                                console.log("Expiry month invalid or missing.");
                                errorMsg.push("Expiry month invalid or missing.");
                            }
                            if (response.errors.securityCode) {
                                console.log("Security code invalid.");
                                errorMsg.push("Security code invalid.");
                            }
                            $('#payButton').prop('disabled', false);
                            $('#divError').addClass('show');
                            $('#divError').removeClass('d-none');
                            $('.errors').html('');
                            errorMsg.forEach(function (msg){
                                $('.errors').append(`<li>${msg}</li>`);
                            });
                        } else if ("request_timeout" == response.status) {
                            console.log("Session update failed with request timeout: " + response.errors.message);
                        } else if ("system_error" == response.status) {
                            console.log("Session update failed with system error: " + response.errors.message);
                        }
                    } else {
                        console.log("Session update failed: " + response);
                    }
                }
            },
            interaction: {
                displayControl: {
                    formatCard: "EMBOSSED",
                    invalidFieldCharacters: "REJECT"
                }
            }
        });

        function pay() {
            // UPDATE THE SESSION WITH THE INPUT FROM HOSTED FIELDS
            PaymentSession.updateSessionFromForm('card');
            $('#payButton').attr('disabled', true);
            $('#divError').removeClass('show');
            $('#divError').addClass('d-none');
        }
    </script>
@endpush
