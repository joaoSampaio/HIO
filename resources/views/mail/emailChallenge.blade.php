<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<style>
    /* Column Drop Layout Pattern CSS */
	@media only screen and (max-width: 450px) {
	    td[class=column] {
	        display: block;
            width: 100%;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
	    }
	}
	.checkChallengeButton {
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #eb1946), color-stop(1, #eb1946));
		background:-moz-linear-gradient(top, #eb1946 5%, #eb1946 100%);
		background:-webkit-linear-gradient(top, #eb1946 5%, #eb1946 100%);
		background:-o-linear-gradient(top, #eb1946 5%, #eb1946 100%);
		background:-ms-linear-gradient(top, #eb1946 5%, #eb1946 100%);
		background:linear-gradient(to bottom, #eb1946 5%, #eb1946 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#eb1946', endColorstr='#eb1946',GradientType=0);
		background-color:#eb1946;
		-moz-border-radius:4px;
		-webkit-border-radius:4px;
		border-radius:4px;
		border:1px solid #eb1946;
		display:inline-block;
		cursor:pointer;
		color:#ffffff;
		font-family:Arial;
		font-size:13px;
		font-weight:bold;
		padding:18px 16px;
		text-decoration:none;
		text-shadow:0px 1px 0px #eb1946;
	}
	.checkChallengeButton:hover {
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #eb1946), color-stop(1, #eb1946));
		background:-moz-linear-gradient(top, #eb1946 5%, #eb1946 100%);
		background:-webkit-linear-gradient(top, #eb1946 5%, #eb1946 100%);
		background:-o-linear-gradient(top, #eb1946 5%, #eb1946 100%);
		background:-ms-linear-gradient(top, #eb1946 5%, #eb1946 100%);
		background:linear-gradient(to bottom, #eb1946 5%, #eb1946 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#eb1946', endColorstr='#eb1946',GradientType=0);
		background-color:#eb1946;
	}
	.checkChallengeButton:active {
		position:relative;
		top:1px;
	}
</style>
<title>HIO EMAIL</title>
</head>
<body style="background: #191c20;">
<table cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td class="column" width="600" colspan="2" align="center" valign="top">
        	<img src="https://hiolegends.com/img/logo.png" alt="HIO"/>
        </td>
    </tr>
    <tr>
        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 14px; line-height: 18px; color: #fff;">
        	<p>
                Hi {{$nameUser}}, {{$nameCreator}} has challenged you!
            </p>
        </td>
    </tr>
      <tr>
        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 12px; line-height: 18px; color: #fff;">
        	<h2 style="border: 0;">DEADLINE</h2>
            <p style="font-size:x-large">
                {{$deadline}}
            </p>
        </td>
    </tr>
  	<tr>
        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 14px; line-height: 18px; color: #fff;">

        @if($array['public'] === 1)
            <a href="https://hiolegends.com/challenge/{{$array['uuid']}}" class="checkChallengeButton">CHECK YOUR CHALLENGE</a>
        @else
            <a href="https://hiolegends.com/challenge/{{$array['uuid']}}/{{$array['secret']}}" class="checkChallengeButton">CHECK YOUR CHALLENGE</a>
        @endif
        </td>
    </tr>
    <tr>
        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 12px; line-height: 18px; color: #fff;">
        	<h2 style="border: 0;">REWARD</h2>            <p>
                {{$array['reward']}}
            </p>
        </td>
    </tr>
    <tr>
        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 12px; line-height: 18px; color: #fff;">
        	<h2 style="border: 0;">PENALTY</h2>
            <p>
                {{$array['penalty']}}
            </p>
        </td>
    </tr>
    <tr>
        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 12px; line-height: 18px; color: #fff;">
        	<p>
                We are not responsible for the nature of your rewards and penalties. Don't make anything capable of hurting yourself and your friends.
            </p>
        </td>
    </tr>
 	<tr>
        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 10px; line-height: 18px; color: #fff;">
        	<p>
                Esta mensagem foi enviada para
				<a href="mailto:{{$email}}">{{$email}}</a>.</p>
        </td>
    </tr>
 	<tr>
        <td class="column" width="600" colspan="2" align="center" valign="top" style="padding: 10px 20px 20px 20px; font-family: arial,sans-serif; font-size: 10px; line-height: 18px; color: #fff;">
        	<p>
                @ 2017 HIO. All rights reserved.
            </p>
        </td>
    </tr>

</table>
</body>
</html>