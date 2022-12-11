<!DOCTYPE html>
<html>
<head>
	<title>Hapiom</title>
</head>
<body>
   
<center>
<h2 style="padding: 23px;background: #b3deb8a1;border-bottom: 6px green solid;">
	<a href="https://hapiom.com/">Hapiom.com</a>
</h2>
</center>

<p>Hi,</p>
<p>{{ $name }} has invited you to register Hapiom site.</p>
<p>{{ $inviteUser->message }}</p>
<a href="{{ route('accept', $inviteUser->token) }}">Click here</a> to activate!

  
</body>
</html>