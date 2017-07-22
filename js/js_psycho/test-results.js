var $j = jQuery.noConflict();
var InProgress = false;
var Stage2 = false;
var ResultsUpdated = false;

$j('html, body').animate({ scrollTop: 250 }, 500);

$j(document).on('click', '#results-send-button', function () {
	
	if (InProgress) return;

	if (!Stage2) {
		$j('.results-send-email-error-row').hide();
		$j('#email').css('border', '1px solid #E1E1E1');
		
		var email = $j('#email').val();
		var etapos = email.indexOf('@');
    	var dotpos = email.lastIndexOf('.');

		if (email == '' || etapos < 1 || dotpos < etapos + 2 || dotpos + 2 >= email.length) {
			$j('#email').css('border', '2px solid #CD3B32');
			return false;
		}
		
		InProgress = true;
		
		$j('#results-send-button').removeClass('btn-action').addClass('btn-default');
		$j('#results-send-button').css('cursor', 'auto');
		$j('#results-send-button').html('<span>Please wait...</span>');
		
		var formData = $j('input').serialize();
		
		var jqxhr = $j.post('save-results', formData, function(data) {
		
			if (data.substring(0, 2) == 'OK') {
		
				$j('#results-send-button').hide();
				$j('#send-dialog-step1').hide();

				if ($j('#newsletter').prop('checked')) {
					$j('#confirmation-message').html('<p>Please do not forget to confirm your subscription by clicking the link in the e-mail.</p>');
				}

				$j('#results-close-button').show();
				var personalLink = data.substring(3);
				$j('#friend-link').val('http://www.16personalities.com/free-personality-test/' + personalLink);
				$j('#twitter-custom-link').attr('href', 'https://twitter.com/share?url=http://www.16personalities.com/free-personality-test/' + personalLink + '&text=I%20am%20an%20' + $j('.test-results-type').html() + '%20(' + $j('#results-variant').html() + ').%20What%20is%20your%20type?&hashtags=16Personalities');
				$j('#facebook-custom-link').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=http://www.16personalities.com/free-personality-test/' + personalLink);
				$j('#google-custom-link').attr('href', 'https://plus.google.com/share?url=http://www.16personalities.com/free-personality-test/' + personalLink);
				$j('#pinterest-custom-link').attr('href', '//pinterest.com/pin/create/link/?url=http%3A%2F%2Fwww.16personalities.com%2Ffree-personality-test%2F' + personalLink + '&media=http%3A%2F%2Fwww.16personalities.com%2Fwp-content%2Fuploads%2F2013%2F11%2Flogo22.png&description=Pin%20It!');
				$j('#send-dialog-step2').show();
				
			} else {
		
				$j('.results-send-email-error').html(data);
				$j('.results-send-email-error-row').show();
				$j('#results-send-button').removeClass('btn-default').addClass('btn-action');
				$j('#results-send-button').css('cursor', 'pointer');
				$j('#results-send-button').html('<span>SEND</span>');
				InProgress = false;
		
			}
		
		})
		.fail(function() {

			$j('.results-send-email-error').html('Could not connect to server - please try again.');
			$j('.results-send-email-error-row').show();
			$j('#results-send-button').removeClass('btn-default').addClass('btn-action');
			$j('#results-send-button').css('cursor', 'pointer');
			$j('#results-send-button').html('<span>SEND</span>');
			InProgress = false;

		})

	}

});

$j(document).on('click', '#results-send-button-2', function () {
	
	if (InProgress) return;

	if (!Stage2) {
		$j('.results-send-email-error-row').hide();
		$j('#email-2').css('border', '1px solid #E1E1E1');

		var email = $j('#email-2').val();
		var etapos = email.indexOf('@');
    	var dotpos = email.lastIndexOf('.');

		if (email == '' || etapos < 1 || dotpos < etapos + 2 || dotpos + 2 >= email.length) {
			$j('#email-2').css('border', '2px solid #CD3B32');
			return false;
		}
		
		InProgress = true;
		
		$j('#results-send-button-2').removeClass('btn-action').addClass('btn-default');
		$j('#results-send-button-2').css('cursor', 'auto');
		$j('#results-send-button-2').html('<span>Please wait...</span>');
		
		var formData = $j('input').serialize();
		
		var jqxhr = $j.post('save-results-invite', formData, function(data) {
		
			if (data.substring(0, 2) == 'OK') {
		
				$j('#test-results-send-popup-button').hide();
				$j('#results-send-button-2').hide();
				if ($j('#newsletter-2').prop('checked')) {
					$j('#confirmation-message-2').html('<p>Please do not forget to confirm your subscription by clicking the link in the e-mail.</p>');
				}
				$j('#results-close-button-2').html('<span>Close</span>');
				$j('#send-dialog-step3').hide();
				var personalLink = data.substring(3);
				$j('#friend-link-2').val('http://www.16personalities.com/free-personality-test/' + personalLink);
				$j('#twitter-custom-link-2').attr('href', 'https://twitter.com/share?url=http://www.16personalities.com/free-personality-test/' + personalLink + '&text=I%20am%20an%20' + $j('.test-results-type').html() + '%20(' + $j('#results-variant').html() + ').%20What%20is%20your%20type?&hashtags=16Personalities');
				$j('#facebook-custom-link-2').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=http://www.16personalities.com/free-personality-test/' + personalLink);
				$j('#google-custom-link-2').attr('href', 'https://plus.google.com/share?url=http://www.16personalities.com/free-personality-test/' + personalLink);
				$j('#pinterest-custom-link-2').attr('href', '//pinterest.com/pin/create/link/?url=http%3A%2F%2Fwww.16personalities.com%2Ffree-personality-test%2F' + personalLink + '&media=http%3A%2F%2Fwww.16personalities.com%2Fwp-content%2Fuploads%2F2013%2F11%2Flogo22.png&description=Pin%20It!');
				$j('#send-dialog-step4').show();
				
			} else {
		
				$j('.results-send-email-error').html(data);
				$j('.results-send-email-error-row').show();
				$j('#results-send-button-2').removeClass('btn-default').addClass('btn-action');
				$j('#results-send-button-2').css('cursor', 'pointer');
				$j('#results-send-button-2').html('<span>SEND</span>');
				InProgress = false;
		
			}
		
		})
		.fail(function() {

			$j('.results-send-email-error').html('Could not connect to server - please try again.');
			$j('.results-send-email-error-row').show();
			$j('#results-send-button-2').removeClass('btn-default').addClass('btn-action');
			$j('#results-send-button-2').css('cursor', 'pointer');
			$j('#results-send-button-2').html('<span>SEND</span>');
			InProgress = false;

		})

	}

});

$j(document).on('click', '#update-profile-button', function () {
	
	if (InProgress || ResultsUpdated) return;

	InProgress = true;
		
	$j('#update-profile-button').css('cursor', 'auto');
	$j('#update-profile-button').html('<span>Please wait...</span>');
	
	var formData = $j('input').serialize();
	
	var jqxhr = $j.post('update-results', formData, function(data) {

		InProgress = false;
	
		if (data == 'OK') {
	
			$j('#update-profile-button').html('<span class="fa fa-check"></span>Updated!');
			ResultsUpdated = true;

		} else {
			
			alert('Could not connect to server - please try again.');
			$j('#update-profile-button').css('cursor', 'pointer');
			$j('#update-profile-button').html('Update your profile');
	
		}
	
	})
	.fail(function() {

		alert('Could not connect to server - please try again.');
		$j('#update-profile-button').css('cursor', 'pointer');
		$j('#update-profile-button').html('Update your profile');
		InProgress = false;

	})

});

$j('#friend-link').click(function() { $j(this).select(); } );
$j('#friend-link-2').click(function() { $j(this).select(); } );

