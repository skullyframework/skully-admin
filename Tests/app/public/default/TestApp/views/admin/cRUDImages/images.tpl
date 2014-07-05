{extends file="admin/wrappers/_main.tpl"}
{block name=header}
    <title>Images - Image Manager</title>
{/block}
{block name=content}
    <div class="span12">
        {include file='admin/widgets/_alerts.tpl' }
        <div class="widget">
            <div class="head dark">
                <div class="icon"><i class="icos-images"></i></div>
                <h2>{lang value="Images - Image Manager"}</h2>
                <a href="{url path="admin/featuredProductSettings/index"}" class="backlink">Back to list</a>
            </div>
            {$indexContent}
            {block name="uploadScript"}
                {include file="admin/widgets/imageUploader/_uploadScript.tpl"}
            {/block}
        </div>
    </div>
{/block}