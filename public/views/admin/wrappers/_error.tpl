<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

	<!--[if gt IE 8]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<![endif]-->


	<link href="{theme_url path="resources/css/admin/stylesheets.css"}" rel="stylesheet" type="text/css" />
	<!--[if lt IE 10]>
	<link href="{theme_url path="resources/css/admin/ie.css"}" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link rel="icon" type="image/ico" href="{public_url path="adminFavicon.ico"}"/>
	{block name=header}
		<title>Error 404 - Page not found</title>
	{/block}

</head>
<body>

<div class="errorContainer">
	{block name=content}
		<h1>404</h1>
		<h2>Not Found</h2>
		<button class="btn btn-primary btn-large" onClick="document.location.href = '{url path="admin/home/index"}';">Back to main</button> <button class="btn btn-large" onClick="history.back();">Previous page</button>
	{/block}
</div>

</body>
</html>
