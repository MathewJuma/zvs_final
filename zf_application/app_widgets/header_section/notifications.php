<?php
//This holds an array of the active URL
$activeURL = Zf_Core_Functions::Zf_URLSanitize();

//This is the controller
$zvs_controller = $activeURL[0];

//User identification code. This code is also stored in a session variable
$identificationCode = $zf_externalWidgetData;

?>

<li class="dropdown" id="header_notification_bar">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="fa fa-warning"></i>
        <span class="badge">
            6
        </span>
    </a>
    <ul class="dropdown-menu extended notification">
        <li>
            <p>
                You have 14 new notifications
            </p>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: 250px;">
                <li>
                    <a href="#">
                        <span class="label label-sm label-icon label-success">
                            <i class="fa fa-plus"></i>
                        </span>
                        New user registered.
                        <span class="time">
                            Just now
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="label label-sm label-icon label-danger">
                            <i class="fa fa-bolt"></i>
                        </span>
                        Server #12 overloaded.
                        <span class="time">
                            15 mins
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="label label-sm label-icon label-warning">
                            <i class="fa fa-bell-o"></i>
                        </span>
                        Server #2 not responding.
                        <span class="time">
                            22 mins
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="label label-sm label-icon label-info">
                            <i class="fa fa-bullhorn"></i>
                        </span>
                        Application error.
                        <span class="time">
                            40 mins
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="label label-sm label-icon label-danger">
                            <i class="fa fa-bolt"></i>
                        </span>
                        Database overloaded 68%.
                        <span class="time">
                            2 hrs
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="label label-sm label-icon label-danger">
                            <i class="fa fa-bolt"></i>
                        </span>
                        2 user IP blocked.
                        <span class="time">
                            5 hrs
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="label label-sm label-icon label-warning">
                            <i class="fa fa-bell-o"></i>
                        </span>
                        Storage Server #4 not responding.
                        <span class="time">
                            45 mins
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="label label-sm label-icon label-info">
                            <i class="fa fa-bullhorn"></i>
                        </span>
                        System Error.
                        <span class="time">
                            55 mins
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="label label-sm label-icon label-danger">
                            <i class="fa fa-bolt"></i>
                        </span>
                        Database overloaded 68%.
                        <span class="time">
                            2 hrs
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="external">
            <a href="#">
                See all notifications <i class="m-icon-swapright"></i>
            </a>
        </li>
    </ul>
</li>