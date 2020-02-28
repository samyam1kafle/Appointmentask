<template>

    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">

        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
           data-close-others="true" aria-expanded="false">
            <i data-count="0" class="fa fa-bell-o"></i>
            <span class="notif-count badge headerBadgeColor1">{{unreadNotifications.length}}</span>
        </a>


        <ul class="dropdown-menu">
            <li class="external">
                <h3><span class="bold">Notifications</span></h3>
                <span class="notification-label purple-bgcolor">Unread {{unreadNotifications.length}}</span>
            </li>
            <li>
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283"
                        style="overflow: hidden; width: auto;">

                        <li>
                            okey

                        </li>
                    </ul>
                    <div class="slimScrollBar"
                         style="background: rgb(158, 165, 171); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                    <div class="slimScrollRail"
                         style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                </div>
                <div class="dropdown-menu-footer">
                    <a href="javascript:void(0)">
                        <a href="">Mark all as read </a>
                    </a>
                </div>
            </li>
        </ul>
    </li>

</template>

<script>
    export default {
        props: ['unreads', 'userid'],
        data() {
            return {
                unreadNotifications: this.unreads
            }
        },
        mounted() {
            console.log('Component mounted.');

            Echo.private('App.Backend.All_User.' + this.userid)
                .notification((notification) => {
                    console.log(notification);
                    let newUnreadNotifications = {data: {thread: notification.thread, user: notification.user}};
                    this.unreadNotifications.push(newUnreadNotifications);
                });
        }
    }
</script>
