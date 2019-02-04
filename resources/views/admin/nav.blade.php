


<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN PAGE</li>

    {{-- site settings --}}

    <li class=" treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Site Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{url('/adminpanel/sitesetting')}}"><i class="fa fa-circle-o"></i> Main Setting</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Other Setting</a></li>
        </ul>
    </li>


    {{-- users --}}


    <li class=" treeview">
        <a href="#">
            <i class="fa fa-users pull-left"></i> <span>Controll in Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{url('/adminpanel/users/create')}}"><i class="fa fa-circle-o"></i> Add User </a></li>
            <li><a href="{{url('/adminpanel/users')}}"><i class="fa fa-circle-o"></i> All Users </a></li>
        </ul>
    </li>



    {{-- Clients --}}


    <li class=" treeview">
        <a href="#">
            <i class="fa fa-users pull-left"></i> <span>Controll in Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{url('/adminpanel/client/create')}}"><i class="fa fa-circle-o"></i> Add Client </a></li>
            <li><a href="{{url('/adminpanel/clients')}}"><i class="fa fa-circle-o"></i> All Clients </a></li>
        </ul>
    </li>




{{-- Orders --}}


<li class=" treeview">
    <a href="#">
        <i class="fa  fa-bell"></i> <span>Controll in Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{url('/adminpanel/client/create')}}"><i class="fa fa-circle-o"></i> Add Order </a></li>
        <li><a href="{{url('/adminpanel/orders')}}"><i class="fa fa-circle-o"></i> All Orders </a></li>
    </ul>
</li>



    {{-- Posts --}}


    <li class=" treeview">
        <a href="#">
            <i class="fa fa-edit"></i> <span>Controll in Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{url('/adminpanel/client/create')}}"><i class="fa fa-circle-o"></i> Add Post </a></li>
            <li ><a href="{{url('/adminpanel/orders')}}"><i class="fa fa-circle-o"></i> All Posts </a></li>
        </ul>
    </li>




    {{-- Contacts --}}


    <li class=" treeview">
        <a href="#">
            <i class="fa fa-envelope"></i> <span>Controll in Contacts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{url('/adminpanel/contacts')}}"><i class="fa fa-circle-o"></i> All Contacts </a></li>
        </ul>
    </li>


</ul>

