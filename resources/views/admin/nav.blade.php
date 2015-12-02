<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-edit"></i> <span>Posts</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ Url::to('admin/news/') }}"><i class="fa fa-circle-o"></i> All Posts</a></li>
            <li><a href="{{ Url::to('admin/news/new') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
            <li><a href="{{ Url::to('admin/categories') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
        </ul>
    </li>
    <li>
        <a href="../calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <small class="label pull-right bg-red">3</small>
        </a>
    </li>
    <li>
        <a href="../mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <small class="label pull-right bg-yellow">12</small>
        </a>
    </li>

</ul>