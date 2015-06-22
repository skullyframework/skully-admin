<ul class="menu-items">
    <li class="m-t-30 {if $activeMainMenu == "home"}open{/if}">
        <a href="{url path='admin/home/index'}" {*class="detailed"*}>
            <span class="title">Dashboard</span>
            {*<span class="details">234 notifications</span>*}
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "home"}bg-success{/if}"><i class="fa fa-dashboard"></i></span>
    </li>

    <li class="{if $activeMainMenu == "settings"}open{/if}">
        <a href="{url path='admin/settings/index'}">
            <span class="title">Settings</span>
        </a>
        <span class="icon-thumbnail {if $activeMainMenu == "settings"}bg-success{/if}"><i class="fa fa-cogs"></i></span>
    </li>


    <li class="">
        <a href="javascript:;">
            <span class="title">Page 3</span>
            <span class=" arrow"></span>
        </a>
        <span class="icon-thumbnail"><i class="pg-grid"></i></span>
        <ul class="sub-menu">
            <li class="">
                <a href="#">Sub Page 1</a>
                <span class="icon-thumbnail">sp</span>
            </li>
            <li class="">
                <a href="#">Sub Page 2</a>
                <span class="icon-thumbnail">sp</span>
            </li>
            <li class="">
                <a href="#">Sub Page 3</a>
                <span class="icon-thumbnail">sp</span>
            </li>
        </ul>
    </li>
</ul>