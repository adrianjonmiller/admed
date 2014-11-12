<HTML>
<HEAD>
<SCRIPT Language="Javascript">
<!--
	function onLoadHandler(){
		document.frmLaunch.submit();
	}
//-->
</Script>
</HEAD>
<body onLoad="onLoadHandler();">
<br><br><br><br>
<center>
    <h1>{l s='Processing Your Transaction...'}</h1>
    <h2>{l s='You are being redirected to confirm your card with 3D Secure.'}</h2>
<FORM name="frmLaunch" method="Post" action="{urldecode($centinel_acs_url)}">
<noscript>
	<br><br>
	<center>
	<font color="red">
	<h1>{l s='Processing Your Transaction'}</h1>
	<h2>{l s='JavaScript is currently disabled or is not supported by your browser.'}</h2>
	<h3>{l s='Please click Submit to continue the processing of your transaction.'}</h3>
	</font>
	<input type="submit" value="{l s='Submit'}">
	</center>
</noscript>
<input type=hidden name="PaReq" value="{$centinel_payload}">
<input type=hidden name="TermUrl" value="{$validation_link}?confirm=1&authenticationResponse=1{if $isPaymentPageEnabled}&content_only=1{/if}">
<input type=hidden name="MD" value="{$centinel_orderId}">
</FORM>
</center>
</BODY>
</HTML>