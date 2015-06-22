{if !empty($breadcrumbs)}
    <div class="jumbotron" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="{url path="admin/home/index"}">Home</a></li>
                    {section loop=$breadcrumbs name=crumb}
                        {if $smarty.section.crumb.last}
                            <li><a href="#" class="active">{$breadcrumbs[crumb].name}</a></li>
                        {else}
                            <li><a href="{$breadcrumbs[crumb].url}">{$breadcrumbs[crumb].name}</a></li>
                        {/if}
                    {/section}
                </ul>
                <!-- END BREADCRUMB -->
            </div>
        </div>
    </div>
{/if}