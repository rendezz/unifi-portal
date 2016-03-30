<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
  <title>Baseline IT Hotspot</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=.7, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="reset-min.css" />
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/guest.js"></script>
  <script type="text/javascript" src="baseline.js"></script>
</head>
<body class="login-page">
<!-- see README.txt for HTML customization instructions -->
<div class="page-content" style="padding-top:10px;">
	<div class="login-content content-box">
		<div style="font-size: 20px">&nbsp;&nbsp;<img src="images/logo_home.jpg" style="vertical-align: middle" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wireless Internet</div>
		
				<form name="input" id="activate_free">
					<div id="free_section">
						<h2 id="free_data_heading">Activate your free daily data</h2>
						<div id="free_not_allowed" class="free_text" style="display: none;">
							<p>Your free internet bandwidth allocation has been exhausted for today, 
							please choose one of the options below to continue using the internet.</p>
						</div>
						<div id="free_failed" class="free_text" style="display: none;">
							<p>Unfortunately there was an error allocating you bandwidth, please request a free voucher from your service provider.</p>
						</div>
						<div id="free_check" class="free_text" >
							<p align="center"><img src="images/ajax-loader.gif" /></p>
						</div>
						<div id="free_allowed" class="free_text" style="display: none;">
							<input type="hidden" id="free_mac" name="mac" value="<?php echo($_GET['id']); ?>">
							<input type="hidden" id="free_ap" name="ap" value="<?php echo($_GET['ap']); ?>">
							<input type="hidden" id="free_url" name="url" value="<?php echo($_GET['url']); ?>">
							<input type="hidden" id="free_ssid" name="ssid" value="<?php echo($_GET['ssid']); ?>">
							<input type="hidden" id="free_mb" name="free_mb" value="500">
							<input type="hidden" id="free_time" name="free_time" value="1">
							<p align="center"><input type="submit" value="Activate My Free data" id="submitfree" class="button requires-tou"  name="byfree" /></p>
						</div>
					</div>
				</form>
				<form name="input" id="activate_voucher">
					<input type="hidden" id="voucher_mac" name="mac" value="<?php echo($_GET['id']); ?>">
					<input type="hidden" id="voucher_ap" name="ap" value="<?php echo($_GET['ap']); ?>">
					<input type="hidden" id="voucher_url" name="url" value="<?php echo($_GET['url']); ?>">
					<input type="hidden" id="voucher_ssid" name="ssid" value="<?php echo($_GET['ssid']); ?>">
                                        <div class="voucher-box">
						<h2 id="voucher_heading">Login with a Voucher</h2>
						<div id="voucher_check" class="free_text" style="display: none;">
							<p align="center"><img src="images/ajax-loader.gif" /></p>
						</div>
						<div id="voucher_allowed" class="free_text" style="display: inline;">
							<fieldset class="large-text">
								<label for="voucher" class="fieldname" style="width: 80px;">Voucher</label>
								<input id="voucher" name="voucher" type="text" class="textInput" style="width: 220px;" value="" autocomplete="off" />
								&nbsp;&nbsp;&nbsp;<input type="submit" value="Use Voucher" id="submitvoucher" class="button requires-tou" />
							</fieldset>
						</div>
						<div id="voucher_failed" class="free_text" style="display: none;">
							<p>Unfortunately there was an error allocating you bandwidth, please report this to your service provider.</p>
						</div>
                                        </div>
                                </form>
&nbsp;
	</div>

	<div class="login-content content-box">
		<form name="input" method="post" action="/guest/login">
			<div class="tou-box">
				<h2>Terms of Use</h2>
				<div class="tou-wrapper" id="tou">
					<div class="tou">
					<p>Terms of Use</p>
					<p>By accessing the wireless network, you acknowledge that you're of legal age, you have read and understood and agree to be bound by this agreement</p>
					<ul>
						<li>The wireless network service is provided by the property owners and is completely at their discretion. Your access to the network may be blocked, suspended, or terminated at any time for any reason.</li>
						<li>You agree not to use the wireless network for any purpose that is unlawful and take full responsibility of your acts.</li>
						<li>The wireless network is provided &quot;as is&quot; without warranties of any kind, either expressed or implied. </li>
					</ul>
					</div>
				</div>
				<fieldset class="accept-tou">
					<input id="accept-tou" type="checkbox" checked="checked" name="accept-tou" value="yes" />
					<label class="normal" >I accept the <a href="javascript:void(0)" id="show-tou">Terms of Use</a></label>
				</fieldset>
			</div>
		</form>
				<div class="free_text">
					<p align="right">Hotspot provided by <a href="http://www.baselineit.co.za">Baseline IT</a></p>
					<br/>
				</div>
	</div>
</div>

<script type="text/javascript">
$(function() { 
	$('#tou').hide();
	$('#show-tou').click(function() {
		$('#tou').show();
	});
	$('#accept-tou').click(function() {
		if (!$('#accept-tou').checked()) {
			$('input.requires-tou').disable();
		}
		else {
			$('input.requires-tou').enable();
		}
	})
});
</script>

</body>
</html>
