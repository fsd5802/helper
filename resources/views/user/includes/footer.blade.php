<footer class="str-footer-area" id="str-footer">
  <div class="container">
    <div class="footer-content">
      <div class="row">
        <div class="col-lg-4">
          <div class="str-footer-widget str-headline pera-content">
            <div class="str-ft-about-widget"><a href="{{ url('/')}}" aria-label="Marwan Tech"><img class="footer-logo" src="{{ asset(setting()->logo) }}" alt="Our Logo"></a>
              <p>
                @if(setting()->small_desc != null) {!! setting()->small_desc !!} @endif
              </p>
              <div class="ft-about-btn"><a href="{{ getRoute("aboutus") }}">@lang("user.navbar.aboutus")</a></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="str-footer-widget str-headline pera-content">
            <div class="str-newslatter-widget">
              <h3 class="str-widget-title">@lang('user.footer.news_letter')</h3>
              <p>
               @lang('user.footer.get_news')
              </p>
              <form action="#">
                <input class="email" name="email" type="email" placeholder="@lang('user.form.email')">
                <button class="hover-btn" type="submit" value="Submit" aria-label="submit"><i class="fas fa-paper-plane"></i></button>
              </form>
              <div class="str-social-footer">
                @if (count(icons()) >0 )
                @foreach (icons() as $icon )
                <a href="{{ $icon->link }}" title="{{ $icon->name }}" target="_blank" rel="noreferrer"><i class="{{ $icon->tag }}"></i></a>
                @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="str-footer-widget str-headline pera-content">
            <div class="str-office-widget">
              <h3 class="str-widget-title">@lang('user.footer.info')</h3>
              <div class="str-office-icon-text">
                <div class="str-office-icon float-left"><i class="fas fa-map-marker-alt"></i></div>
                <p>
                  @if(setting()->address != null) {!! setting()->address !!} @endif
                </p>
              </div>
              <div class="str-office-icon-text">
                <div class="str-office-icon float-left"><i class="fas fa-phone"></i></div>
                <p> @if(setting()->phone != null) {{ setting()->phone }} @endif</p>
              </div>
              <div class="str-open-hour"><span>@lang('user.footer.open_hours')</span>
                <p>
                  @if(setting()->formTo != null) {{ setting()->formTo }} @endif
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="str-copywright-text text-center">@lang('user.footer.copyrights')<a
      href="{{ url('/') }}">@lang("user.footer.developed")</a></div>
</footer>