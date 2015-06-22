{nocache}
    <div class="visible-lg visible-md m-t-10">
        <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
            <span class="text-master">{$adminUsername}</span>
        </div>
        <div class="dropdown pull-right">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                    {if !empty($adminImage)}
                    <img src="{public_url path=$adminImage}" alt="" data-src="{public_url path=$adminImage}" data-src-retina="{public_url path=$adminImage}" width="32" height="32">
                    {else}
                        <i class="fa fa-user"></i>
                    {/if}
                </span>
            </button>
            <ul class="dropdown-menu profile-dropdown" role="menu">
                <li><a href="{url path="admin/admins/edit" id=$user.id}"><i class="pg-settings_small"></i> {lang value="My Settings"}</a>
                </li>
                <li class="bg-master-lighter">
                    <a href="{url path="admin/admins/logout"}" class="clearfix">
                        <span class="pull-left">Logout</span>
                        <span class="pull-right"><i class="pg-power"></i></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
{/nocache}