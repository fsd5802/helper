
<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
      <!--begin::Copyright-->
      <div class="text-dark order-2 order-md-1">
        <span class="text-muted font-weight-bold mr-2">2021©</span>
        <a href="" target="_blank" class="text-dark-75 text-hover-primary">@lang('general.marwan')</a>
      </div>
      <!--end::Copyright-->
      <!--begin::Nav-->
      <div class="nav nav-dark">
        {{-- <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">About</a>
        <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Team</a>
        <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-0">Contact</a> --}}
      </div>
      <!--end::Nav-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Footer-->
  </div>
  <!--end::Wrapper-->
  </div>
  <!--end::Page-->
  </div>
  <!--end::Main-->
  @include('admin.layouts.profile')
  <!--end::Demo Panel-->
  <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
  <!--begin::Global Config(global config for global JS scripts)-->
  <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
  <!--end::Global Config-->
  <!--begin::Global Theme Bundle(used by all pages)-->
  {{-- <script src="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.js"></script> --}}
  <script src="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
  <script src="{{ asset('admin') }}/assets/js/scripts.bundle.js"></script>
  <!--end::Global Theme Bundle-->
  <!--begin::Page Vendors(used by this page)-->
  <script src="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
  <!--end::Page Vendors-->
  <!--begin::Page Scripts(used by this page)-->
  <script src="{{ asset('admin') }}/assets/js/pages/widgets.js"></script>
  <script src="{{ asset('admin') }}/assets/js/pages/features/miscellaneous/sweetalert2.js"></script>

  <script>
    function confirmDelete(item_id) {

        Swal.fire({
              title: "@lang('admin.sweetAlert.sure')",
              text: `@lang('admin.sweetAlert.cant_retrieve')`,
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "@lang('admin.sweetAlert.delete')",
              cancelButtonText: "@lang('admin.sweetAlert.cancel')",
              reverseButtons: true
              }).then(function(result) {
                  console.log(result.value);
                  if (result.value) {
                      console.log(item_id);
                      $('#'+item_id).submit();
                  } else if (result.dismiss === "cancel") {
                  Swal.fire(
                      "@lang('admin.sweetAlert.Cancelled')",
                      "@lang('admin.sweetAlert.safe')",
                      "error"
                  )
              }
        });


    }



  </script>
  <!--begin::Page Scripts(used by this page)-->
  <script src="{{ asset('admin') }}/assets/js/pages/crud/file-upload/image-input.js"></script>
  <script src="{{ asset('admin') }}/assets/js/pages/crud/forms/widgets/select2.js"></script>
  <script src="{{ asset('admin') }}/assets/js/echarts.min.js"></script>
  <script src="{{ asset('admin') }}/assets/js/custom.js"></script>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  @yield('script')
  @stack('js')
  @stack('css')
  <!--end::Page Scripts-->
  </body>
  <!--end::Body-->
  </html>
