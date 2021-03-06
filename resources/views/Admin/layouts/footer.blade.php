@section('footer')
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2020 &copy; TaskAppointment dashboard By
            <a href="mailto:itservicesnepal@gmail.com" target="_top" class="makerCss">GCN</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- end footer -->
    </div>
    {{--vue js--}}
    <script src="{{asset('js/app.js')}}"></script>
    <!-- start js include path -->

    <script src="{{asset('Admin/assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/popper/popper.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/jquery-blockui/jquery.blockui.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('Admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/sparkline/jquery.sparkline.js')}}"></script>
    <script src="http://radixtouch.in/templates/admin/smart/source/assets/js/pages/sparkline/sparkline-data.js"></script>
    <!-- Common js-->
    <script src="{{asset('Admin/assets/js/app.js')}}"></script>
    <script src="{{asset('Admin/assets/js/layout.js')}}"></script>
    <script src="{{asset('Admin/assets/js/theme-color.js')}}"></script>
    <!-- material -->
    <script src="{{asset('Admin/assets/plugins/material/material.min.js')}}"></script>


    <!-- Data Table -->
    <script src="{{asset('Admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Admin/assets/js/pages/table/table_data.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/datatables/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/datatables/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/datatables/export/jszip.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/datatables/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/datatables/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/datatables/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/datatables/export/buttons.print.min.js')}}"></script>
    <!-- end js include path -->

    <!-- Date Time Picker scripts -->
    <script src="{{asset('Admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/bootstrap-datepicker/datepicker-init.js')}}"></script>

    <script src="{{asset('Admin/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"
            charset="UTF-8"></script>
    <script src="{{asset('Admin/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js')}}"
            charset="UTF-8"></script>
    <!-- Date Time Picker scripts end -->

    <!-- Validation form-->
    <script src="{{asset('Admin/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/jquery-validation/js/additional-methods.min.js')}}"></script>
    <script src="{{asset('Admin/assets/js/pages/validation/form-validation.js')}}"></script>

    <!-- Validation form-->

    <!--select2-->
    <script src="{{asset('Admin/assets/plugins/select2/js/select2.js')}}"></script>
    <script src="{{asset('Admin/assets/js/pages/select2/select2-init.js')}}"></script>
    <!--select2-->


    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>


    <!--Ck Editor -->

    <!-- dropzone -->
    <script src="{{asset('Admin/assets/plugins/dropzone/dropzone.js')}}"></script>

    <!-- Toastr -->

    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")

        @endif

        @if(Session::has('delete'))
        toastr.info("{{Session::get('delete')}}")
        @endif

        @if(Session::has('Error'))
        toastr.error("{{Session::get('Error')}}")
        @endif

    </script>

    <script src="{{asset('Admin/assets/js/front_js/global.js')}}"></script>

    <script src="{{asset('Admin/assets/js/front_js/jquery-ui.min.js')}}"></script>

    </body>

    </html>

@endsection

