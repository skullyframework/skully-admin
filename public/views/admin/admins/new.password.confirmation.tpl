<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
<p>Dear {$user.name}</p>
<p>You have requested a new password for <a href="{url path="admin"}" target="_blank">{$websiteName} Administrator Page</a>. Please click the link below to reset your password.</p>
<br/>
<p>
  <a href="{$activationUrl}" target="_blank">{$activationUrl}</a>
</p>
<br/>
<br/>
<p>
  Sincerely,<br/>
  {$websiteName}
</p>
</body>
</html>