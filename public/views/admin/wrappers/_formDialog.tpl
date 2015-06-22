{* Name prefixed with 'dialog' to avoid trouble when including this template with main.tpl. *}
<div class="modal-dialog {block name=customClass}{/block}">
    <div class="modal-content-wrapper">
        <div class="modal-content">
            <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                {block name=dialogHeader}{/block}
                {*<h5>Payment <span class="semi-bold">Information</span></h5>*}
                {*<p class="p-b-10">We need payment information inorder to process your order</p>*}
            </div>
            <div class="modal-body">
                {include file="admin/widgets/_ajaxAlerts.tpl"}
                <div class="panel panel-transparent">
                    <div class="panel-body">
                        {block name=dialogContent}{/block}
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-master-light p-t-25">
                {block name=dialogButtons}
                    <a class="btn btn-primary" onclick="return bootstrapModalSubmit();"><i class="pg-save m-r-10"></i>Save Changes</a>
                    <a class="btn" data-dismiss="modal"><i class="pg-close m-r-10"></i>Close</a>
                {/block}
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>