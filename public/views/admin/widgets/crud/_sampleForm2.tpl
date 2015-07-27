{if empty($action)}
    {$action='create'}
{/if}
{$controllerName = "hotels"}
{form class="validate" method="POST" action="{url path="admin/"|cat:$controllerName:"/":$action}"}
{if !$isAjax}
    <div class="affix-wrapper">
        <nav class="affix-top">
            <div class="panel panel-default">
                <div class="panel-body ">
                    <div class="row">
                        <div class="col-sm-6">
                            {if $action != "create"}
                                <a href="{url path="admin/"|cat:$controllerName:"/images"}" class="btn btn-primary"><i class="fa fa-image"></i> {lang value="Image Manager"}</a>
                            {/if}
                        </div>
                        <div class="col-sm-6 text-right">

                            <input type="hidden" name="{$instanceName}[is_active]" id="isActive" value="{${$instanceName}.is_active}"/>
                            {if $action != "create"}
                                {if ${$instanceName}.is_active == 1}
                                    <a class="btn btn-danger" id="btnSuspend"><i class="pg-power m-r-10"></i>Suspend</a>
                                {else}
                                    <a class="btn btn-complete" id="btnActive"><i class="pg-power m-r-10"></i>Activate</a>
                                {/if}
                            {/if}
                            <button class="btn btn-primary" id="submitForm" type="submit"><i class="pg-save m-r-10"></i>Submit</button>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
{/if}


{if $action!='create'}
    <input name="{$instanceName}[id]" type="hidden" value="{${$instanceName}.id}">
{/if}

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">{lang value="General Info"}</div>
                </div>
                <div class="panel-body">

                    <div class="form-group form-group-default required">
                        <label for="{$instanceName}_name">{lang value="Name"}</label>
                        <input name="{$instanceName}[name]" id="{$instanceName}_name" type="text" class="form-control validate[required,maxSize[255]]" value="{${$instanceName}.name|escape}"/>
                    </div>

                    <div class="form-group">
                        <label for="{$instanceName}_description">{lang value="Description"}</label>
                        <textarea name="{$instanceName}[description]" id="{$instanceName}_description" class="form-control" rows="15">{${$instanceName}.description|escape}</textarea>
                    </div>

                    <div class="form-group form-group-default required">
                        <label for="{$instanceName}_stars">{lang value="Stars"}</label>
                        <select name="{$instanceName}[stars]" id="{$instanceName}_stars" class="form-control cs-select cs-skin-slide" data-init-plugin="cs-select">
                            {for $i=1 to 5 step 0.5}
                                <option value="{$i}" {if $i=={${$instanceName}.stars}}selected{/if}>{$i}</option>
                            {/for}
                        </select>
                    </div>

                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">{lang value="Currencies and Taxes"}</div>
                </div>
                <div class="panel-body">
                    <div class="form-group form-group-default required">
                        <label for="{$instanceName}_currency_id">{lang value="Currency"}</label>
                        <select name="{$instanceName}[currency_id]" id="{$instanceName}_currency_id" class="form-control" data-init-plugin="select2">
                            {foreach $currencies as $currency}
                                <option value="{$currency.id|escape}" {if $currency.id=={${$instanceName}.currency_id}}selected{/if}>{$currency.name} ({$currency.code})</option>
                            {/foreach}
                        </select>
                    </div>

                    <div class="form-group form-group-default">
                        <div class="checkbox check-primary">
                            <input type="checkbox" value="1" id="{$instanceName}_is_tax_included" name="{$instanceName}[is_tax_included]" {if {${$instanceName}.is_tax_included} == 1}checked="checked"{/if}>
                            <label for="{$instanceName}_is_tax_included">{lang value="Tax Included"}</label>
                        </div>
                    </div>

                    <div class="form-group form-group-default">
                        <label for="{$instanceName}_taxes">{lang value="Taxes"}(%)</label>
                        <input name="{$instanceName}[taxes]" id="{$instanceName}_taxes" type="text" class="form-control" value="{${$instanceName}.taxes|escape}"/>
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">{lang value="Administrative"}</div>
                </div>
                <div class="panel-body">
                    <div class="form-group form-group-default required">
                        <label for="{$instanceName}_admin_id">{lang value="Admin"}</label>
                        <select name="{$instanceName}[admin_id]" id="{$instanceName}_admin_id" class="form-control" data-init-plugin="select2">
                            {foreach $admins as $admin}
                                <option value="{$admin.id|escape}" {if $admin.id=={${$instanceName}.admin_id}}selected{/if}>{$admin.name} ({$admin.email})</option>
                            {/foreach}
                        </select>
                    </div>

                    <div class="form-group form-group-default">
                        <label>
                            {if ${$instanceName}.is_active == 1}
                                <span class="label label-success">{lang value="This hotel is active"}</span>
                            {else}
                                <span class="label label-warning">{lang value="This hotel is suspended"}</span>
                            {/if}
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">{lang value="Location"}</div>
                </div>
                <div class="panel-body">

                    <div class="form-group form-group-default required">
                        <label for="{$instanceName}_address">{lang value="Address"}</label>
                        <input name="{$instanceName}[address]" id="{$instanceName}_address" type="text" class="form-control validate[required,maxSize[255]]" value="{${$instanceName}.address|escape}"/>
                    </div>

                    <div class="form-group form-group-default required">
                        <label for="{$instanceName}_city">{lang value="City"}</label>
                        <input name="{$instanceName}[city]" id="{$instanceName}_city" type="text" class="form-control validate[required,maxSize[255]]" value="{${$instanceName}.city|escape}"/>
                    </div>

                    <div class="form-group form-group-default required">
                        <label for="{$instanceName}_state">{lang value="State"}</label>
                        <input name="{$instanceName}[state]" id="{$instanceName}_state" type="text" class="form-control validate[required,maxSize[255]]" value="{${$instanceName}.state|escape}"/>
                    </div>

                    <div class="form-group form-group-default required">
                        <label for="{$instanceName}_country_id">{lang value="Country"}</label>
                        <select name="{$instanceName}[country_id]" id="{$instanceName}_country_id" class="form-control" data-init-plugin="select2">
                            {foreach $countries as $country}
                                <option value="{$country.id|escape}" {if $country.id=={${$instanceName}.country_id}}selected{/if}>{$country.name}</option>
                            {/foreach}
                        </select>
                    </div>

                    <div class="form-group form-group-default">
                        <label for="{$instanceName}_postcode">{lang value="Post Code"}</label>
                        <input name="{$instanceName}[postcode]" id="{$instanceName}_postcode" type="text" class="form-control" value="{${$instanceName}.postcode|escape}"/>
                    </div>

                    {*coordinate*}
                    <div class="form-group form-group-default">
                        <label for="{$instanceName}_coordinates">{lang value="Coordinates"}</label>
                        <input name="{$instanceName}[coordinates]" id="{$instanceName}_coordinates" type="hidden" class="form-control" value="{${$instanceName}.coordinates|escape}"/>
                        <input id="mapAddressSearch" type="text" class="form-control" value="" placeholder="{lang value="Search address"}"/>
                        <div id="map_canvas" style="width: 100%; height: 400px;"></div>
                    </div>

                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">{lang value="Children and Infants"}</div>
                </div>
                <div class="panel-body">
                    <div class="form-group form-group-default">
                        <div class="checkbox check-primary">
                            <input type="checkbox" value="1" id="{$instanceName}_is_child_included" name="{$instanceName}[is_child_included]" {if {${$instanceName}.is_child_included} == 1}checked="checked"{/if}>
                            <label for="{$instanceName}_is_child_included">{lang value="Child Included"}</label>
                        </div>
                    </div>

                    <div class="form-group form-group-default">
                        <div class="checkbox check-primary">
                            <input type="checkbox" value="1" id="{$instanceName}_is_infant_included" name="{$instanceName}[is_infant_included]" {if {${$instanceName}.is_infant_included} == 1}checked="checked"{/if}>
                            <label for="{$instanceName}_is_infant_included">{lang value="Infant Included"}</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
{/form}

<script type="text/javascript">
    $(function(){
        $("#btnSuspend").click(function(){
            $("#isActive").val(0);
            $(this).closest("form").submit();
        });

        $("#btnActive").click(function(){
            $("#isActive").val(1);
            $(this).closest("form").submit();
        });
    });
</script>

{*GOOGLE MAPS*}
{$location = ${$instanceName}.coordinates|json_decode:1}
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer.js"></script>
<script>
    var map = null;
    var markerArray = []; //create a global array to store markers

    function initialize() {
        var myOptions = {
            zoom: 10,
            center: new google.maps.LatLng({if $location.latitude == 0 && $location.longitude == 0}-7.287723, 112.733288{else}{$location.latitude}, {$location.longitude}{/if}),
            mapTypeControl: false,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            navigationControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        google.maps.event.addListener(map, 'click', function(event) {
            createMarker(new google.maps.LatLng(event.latLng.lat(), event.latLng.lng()), event.latLng.lat() + ', ' + event.latLng.lng());
        });
        createMarker(new google.maps.LatLng({if $location.latitude == 0 && $location.longitude == 0}-7.287723{else}{$location.latitude}{/if}, {if $location.latitude == 0 && $location.longitude == 0}112.733288{else}{$location.longitude}{/if}), '{if $location.latitude == 0 && $location.longitude == 0}-7.287723, 112.733288{else}{$location.latitude}, {$location.longitude}{/if}');
    }

    function createMarker(latlng, myTitle) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
//      icon: myIcon,
            zIndex: Math.round(latlng.lat() * -100000) << 5,
            title: myTitle
//      animation: google.maps.Animation.BOUNCE
        });

        for(var i=0; i<markerArray.length; i++){
            markerArray[i].setMap(null);
        }
        markerArray.push(marker); //push local var marker into global array

        $('[name="{$instanceName}[coordinates]"]').val( JSON.stringify({
            latitude : latlng.lat(),
            longitude : latlng.lng()
        }) );
    }

    window.onload = initialize;


    $('#mapAddressSearch').change(function(){
        $.ajax({
            url : 'http://maps.googleapis.com/maps/api/geocode/json?',
            type: 'GET',
            data: {
                address: $('#mapAddressSearch').val(),
                sensor: false
            },
            success : function(response){
                if(response.results.length > 0){
                    var location = new google.maps.LatLng(response.results[0].geometry.location.lat, response.results[0].geometry.location.lng);
                    createMarker(location, response.results[0].geometry.location.lat + ', ' + response.results[0].geometry.location.lng);
                    map.setCenter(location);
                }
            },
            error: function(){

            }
        });
    });
</script>