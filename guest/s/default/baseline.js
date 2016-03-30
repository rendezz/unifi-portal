var $_GET = getQueryParams(document.location.search);

$(function() { // Jquery function def equivalent to onload event handler
    site_name_extract = /guest\/s\/(.*?)\//igm;
    site_name = site_name_extract.exec(location.href)[1];

    // This is the free activation function
    $('#submitfree').click(function(e) {
        e.preventDefault();
	data = $('#activate_free').serialize();
	data += "&hotspot=" + site_name;
	$('#submitfree').attr('disabled','disabled');
	$('#free_allowed').css('display','none');
	$('#free_check').css('display','inline');

	$.ajax({
		type: "POST",
		url: "/api/activate_free.php", 
		data: data, 
		success: function(resp) {
		    console.log(resp);
		    if(resp.activated) {
			var $location = $_GET['url'] == undefined ? "http://www.baselineit.co.za" : $_GET['url']
			window.location = $location;
		    } else {
			$('#free_data_heading').addClass('error');
			$('#free_check').css('display','none');
			$('#free_allowed').css('display','none');
			$('#free_failed').css('display','inline');
		    }
		}, 
		dataType: 'json',
		error: function() {
			$('#free_data_heading').addClass('error');
			$('#free_check').css('display','none');
			$('#free_allowed').css('display','none');
			$('#free_failed').css('display','inline');
		}
	});
    });

    // This is the voucher activation function
    $('#submitvoucher').click(function(e) {
        e.preventDefault();
	data = $('#activate_voucher').serialize();
	data += "&hotspot=" + site_name;
	$('#submitvoucher').attr('disabled','disabled');
	$('#voucher_allowed').css('display','none');
	$('#voucher_check').css('display','inline');

	$.ajax({
		type: "POST",
		url: "/api/activate_voucher.php", 
		data: data, 
		success: function(resp) {
		    console.log(resp);
		    if(resp.activated) {
			    window.location = $_GET['url'] == undefined ? "http://www.baselineit.co.za" : $_GET['url'];
		    } else {
			$('#voucher_heading').addClass('error');
			$('#voucher_allowed').css('display','inline');
			$('#voucher_failed').css('display','inline');
			$('#voucher_check').css('display','none');
		    }
		}, 
		dataType: 'json', 
		error: function() {
			$('#voucher_heading').addClass('error');
			$('#voucher_allowed').css('display','inline');
			$('#voucher_failed').css('display','inline');
			$('#voucher_check').css('display','none');
		}
	});
    });


    // Query for free allowance and access
    data = $('#activate_free').serialize();
    data += "&hotspot=" + site_name;

    $.ajax({
	type: "POST",
	url: "/api/check_free.php", 
	data: data, 
	success: function(resp) {
		$('#free_check').css('display','none');
		try {
		    if(resp.free_mb != 0) {
			$('#submitfree').val('Activate my free ' + resp.free_mb + 'MB for today');
			if(resp.allowed) {
			    $('#free_allowed').css('display','inline');
			} else {
			    $('#free_data_heading').addClass('error');
			    $('#free_not_allowed').css('display','inline');
			}
		    } else {
			$('#free_section').css('display','none');
		    }
		} catch (err) {
		    console.log(err.message);
		    alert("There has been an error with the online internet payment system, please contact your service provider.");
		}
	    }, 
	dataType: 'json',
	error: function() {
		    alert("There has been an error with the online internet payment system, please contact your service provider.");
		}
	});

    if($_GET['allocation_error'] == "true") {
	$('#errored_voucher').text($_GET['errored_package']);
	$('#credit_card_heading').addClass('error');
	$('#allocation_error').css('display','inline');
	$('#package_list').css('display','none');
	$('#package_check').css('display','none');
    }

});

function getQueryParams(qs) {
    qs = qs.split("+").join(" ");
    var params = {},
        tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;

    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])]
            = decodeURIComponent(tokens[2]);
    }

    return params;
}

