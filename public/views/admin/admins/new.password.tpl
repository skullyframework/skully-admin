<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
  <p>Dear {$user.name}</p>
	<p>Your password to <a href="{url path="admin"}" target="_blank">{$websiteName} Administrator Page</a> has been changed. Please use the new login information below.</p>
	<br/>
	<p>
		email : {$user.email}<br/>
		password : {$newPassword}
	</p>
	<br/>
	<br/>
	<p>
		Sincerely,<br/>
        {$websiteName}
	</p>
</body>
</html>