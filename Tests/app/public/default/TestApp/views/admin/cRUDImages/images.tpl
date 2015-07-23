{extends file="admin/wrappers/_main.tpl"}
{block name=header}
    <title>Images - Image Manager</title>
{/block}
{block name=content}
    <div class="row">
        <div class="col-sm-12">
            {include file='admin/widgets/_alerts.tpl' }
            <div class="panel panel-transparent">
                <div class="panel-heading bg-master">
                    <h2 class="text-primary bold"><i class="fa fa-image"></i> {lang value="Images - Image Manager"}</h2>
                </div>
                <div class="panel-body ">
                    <div class="row m-b-10">
                        <div class="col-sm-12">
                            <a href="{url path="admin/cRUDImages/edit" id="{$params['id']}"}" class="backlink btn btn-warning">Back to editor</a>
                            <a href="{url path="admin/cRUDImages/index"}" class="backlink btn btn-warning">Back to list</a>
                        </div>
                    </div>

                    {$indexContent}
                    {block name="uploadScript"}
                        {include file="admin/widgets/imageUploader/_uploadScript.tpl"}
                    {/block}
                </div>
            </div>
        </div>
    </div>
{/block}