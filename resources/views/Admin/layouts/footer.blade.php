@section('footer')
    <!-- start footer -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2020 &copy; Appointment dashboard By
            <a href="mailto:itservicesnepal@gmail.com" target="_top" class="makerCss">GCN</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- end footer -->
    </div>
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

    <!-- end js include path -->

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


    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
    <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
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

    <!-- pusher -->
    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <script type="text/javascript">

        var notificationsWrapper = $('.dropdown-notifications');
        var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('i[data-count]');
        var notificationsCount = parseInt(notificationsCountElem.data('count'));
        var notifications = notificationsWrapper.find('ul.dropdown-menu');

        if (notificationsCount <= 0) {
            notificationsWrapper.hide();
        }

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('359d2451cea1796b0b5d', {
            cluster: 'ap2',
            forceTLS: true,

        });

        var channel = pusher.subscribe('Todo-Event');
        channel.bind('todo-event', function (data) {
            // alert(JSON.stringify(data));
            var existingNotifications = notifications.html();
            var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
            var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="https://api.adorable.io/avatars/71/` + avatar + `.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">` + data.message + `</strong>
                  <!--p class="notification-desc">Extra description can go here</p-->
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
          `
            ;
            notifications.html(newNotificationHtml + existingNotifications);

            notificationsCount += 1;
            notificationsCountElem.attr('data-count', notificationsCount);
            notificationsWrapper.find('.notif-count').text(notificationsCount);
            notificationsWrapper.show();

        });

    </script>


    </body>

    </html>

@endsection