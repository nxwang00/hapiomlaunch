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
<p>{{ $name }} has invited you to join the {{ $groupName }} group!</p>
<p>{{ $inviteGroupUser->message }}</p>
<p>If you don't have an account , you may register hapiom</p>
<p>If you already have an account , you may accept this invitation by clicking the link below.</p>
<a href="{{ route('join-group', [$inviteGroupUser->token, $inviteGroupUser->group_id]) }}">Join Group</a>
  
</body>
</html>