<!DOCTYPE html>
<html lang="en">
<head>
    {include file="admin/wrappers/_header.tpl"}
  {block name=header}
    <title>Administrator Area</title>
  {/block}
</head>
<body class="plain">

    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">
            <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                {block name="content"}{/block}
                <!-- END PLACE PAGE CONTENT HERE -->
            </div>
            <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->
    </div>

{block name=footer}{/block}
{include file="admin/widgets/_mainScript.tpl"}
{block name="script"}{/block}
</body>
</html>