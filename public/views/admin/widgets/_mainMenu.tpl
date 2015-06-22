<ul class="menu-items">
    <li class="m-t-30 {if $activeMainMenu == "home"}open{/if}">
        <a href="{url path='admin/home/index'}" {*class="detailed"*}>
            <span class="title">Dashboard</span>
            {*<span class="details">234 notifications</span>*}
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "home"}bg-success{/if}"><i class="fa fa-dashboard"></i></span>
    </li>

    <li class="{if $activeMainMenu == "orders"}open{/if}">
        <a href="{url path='admin/orders/index'}" {*class="detailed"*}>
            <span class="title">Orders</span>
            {*<span class="details">234 notifications</span>*}
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "orders"}bg-success{/if}"><i class="fa fa-shopping-cart"></i></span>
    </li>

    {if $user.type != "staff"}
    <li class="{if $activeMainMenu == "transfers"}open{/if}">
        <a href="{url path='admin/transfers/index'}" {*class="detailed"*}>
            <span class="title">Transfers</span>
            {*<span class="details">234 notifications</span>*}
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "transfers"}bg-success{/if}"><i class="fa fa-arrows-h"></i></span>
    </li>

    <li class="{if $activeMainMenu == "brands"}open{/if}">
        <a href="{url path='admin/brands/index'}">
            <span class="title">Brands</span>
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "brands"}bg-success{/if}">B</span>
    </li>
    {/if}
    <li class="{if $activeMainMenu == "products"}open{/if}">
        <a href="{url path='admin/products/index'}">
            <span class="title">Products</span>
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "products"}bg-success{/if}"><i class="fa fa-cube"></i></span>
    </li>

    {if $user.type == "admin"}
    <li class="{if $activeMainMenu == "branches"}open{/if}">
        <a href="{url path='admin/branches/index'}">
            <span class="title">Branches</span>
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "branches"}bg-success{/if}"><i class="fa fa-share-alt"></i></span>
    </li>
    {/if}


    <li class="{if $activeMainMenu == "users"}open{/if}">
        <a href="{url path='admin/users/index'}">
            <span class="title">Customers</span>
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "users"}bg-success{/if}"><i class="fa fa-users"></i></span>
    </li>

    {if $user.type != "staff"}
    <li class="{if $activeMainMenu == "admins"}open{/if}">
        <a href="{url path='admin/admins/index'}">
            <span class="title">Admin</span>
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "admins"}bg-success{/if}"><i class="fa fa-user-md"></i></span>
    </li>

    <li class="{if $activeMainMenu == "currencies"}open{/if}">
        <a href="{url path='admin/currencies/index'}">
            <span class="title">Currencies</span>
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "currencies"}bg-success{/if}"><i class="fa fa-dollar"></i></span>
    </li>
    {if $user.type == "admin"}
    <li class="{if $activeMainMenu == "settings"}open{/if}">
        <a href="{url path='admin/settings/index'}">
            <span class="title">Settings</span>
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "settings"}bg-success{/if}"><i class="fa fa-cogs"></i></span>
    </li>
    {/if}

    <li class="{if $activeMainMenu == "activities"}open{/if}">
        <a href="{url path='admin/activities/index'}">
            <span class="title">Activities</span>
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "activities"}bg-success{/if}"><i class="fa fa-file-text-o"></i></span>
    </li>
    {/if}

    {*<li class="">*}
        {*<a href="javascript:;">*}
            {*<span class="title">Page 3</span>*}
            {*<span class=" arrow"></span>*}
        {*</a>*}
        {*<span class="icon-thumbnail"><i class="pg-grid"></i></span>*}
        {*<ul class="sub-menu">*}
            {*<li class="">*}
                {*<a href="#">Sub Page 1</a>*}
                {*<span class="icon-thumbnail">sp</span>*}
            {*</li>*}
            {*<li class="">*}
                {*<a href="#">Sub Page 2</a>*}
                {*<span class="icon-thumbnail">sp</span>*}
            {*</li>*}
            {*<li class="">*}
                {*<a href="#">Sub Page 3</a>*}
                {*<span class="icon-thumbnail">sp</span>*}
            {*</li>*}
        {*</ul>*}
    {*</li>*}
</ul>


{*<ul class="main">*}
    {*<li><a href="{url path='admin/home/index'}"><span class="icom-screen"></span><span class="text">Main</span></a></li>*}
    {*<li><a href="{url path='admin/aboutUs/index'}"><span class="icom-info"></span><span class="text">About<br />Page</span></a></li>*}
    {*<li><a href="{url path='admin/admins/index'}"><span class="icom-user3"></span><span class="text">Admins</span></a></li>*}
    {*<li><a href="{url path='admin/contactUs/index'}"><span class="icom-location"></span><span class="text">Contact Us<br />Page</span></a></li>*}
    {*<li>*}
        {*<a href="#"><span class="icom-home1"></span><span class="text">Rooms</span></a>*}
        {*<ul class="main">*}
            {*<li><a href="{url path="admin/roomSettings/index"}"><span class="icom-home"></span><span class="text">Main Page</span></a></li>*}
            {*<li><a href="{url path="admin/rooms/index"}"><span class="icom-cube"></span><span class="text">Rooms</span></a></li>*}
        {*</ul>*}
    {*</li>*}
    {*<li><a href="{url path='admin/news/index'}"><span class="icom-article"></span><span class="text">News</span></a></li>*}
    {*<li><a href="{url path='admin/settings/index'}"><span class="icom-cog"></span><span class="text">Settings</span></a></li>*}
{*</ul>*}