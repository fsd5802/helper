<!--Start of get in touch  section-->
<section class="str-get-in-touch-section" id="str-get-in-touch">
    <div class="container">
      <div class="str-get-in-touch-content">
        <div class="row">
          <div class="col-lg-4">
            <div class="str-get-touch-icon-text">
              <div class="str-get-touch-icon text-center float-left"><img src="{{ asset('assets/user/img/startup/icon/gt1.png') }}" alt="">
              </div>
              <div class="str-get-touch-text str-headline">
                <h3>@lang("user.footer.office_Address")</h3><span> @if(setting()->address != null) {{ setting()->address }} @endif</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="str-get-touch-icon-text">
              <div class="str-get-touch-icon text-center float-left"><img src="{{ asset('assets/user/img/startup/icon/gt2.png') }}" alt="">
              </div>
              <div class="str-get-touch-text str-headline"> 
                <h3>@lang("user.footer.phone_num")</h3><span> @if(setting()->phone != null) {{ setting()->phone }} @endif</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="str-get-touch-icon-text">
              <div class="str-get-touch-icon text-center float-left"><img src="{{ asset('assets/user/img/startup/icon/gt3.png') }}" alt="">
              </div>
              <div class="str-get-touch-text str-headline">
                <h3>@lang("user.footer.mail")</h3><span> @if(setting()->email != null) {{ setting()->email }} @endif</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>