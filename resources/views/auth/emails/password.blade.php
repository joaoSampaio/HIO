Hello João!
<br><br>
Someone has requested a link to change your password. You can do this through the link below.
<br><br>
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> Change my password </a>

<br><br>
If you didn't request this, please ignore this email.
<br><br>
Your password won't change until you access the link above and create a new one.
<br><br>
<br><br>


Legendary regards,
<br><br>
HIO Team
