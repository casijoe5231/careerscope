var $j = jQuery.noConflict();

var CurrentSet = 0;
var clickcount=0;

for (var i=1; i<52; i++) {
	$j('#slider' + i).slider({
		value: 3,
		min: 1,
		max: 5,
		step: 1,
	})
}
/*
$j(document).on('click', '#nextbut', function () {
	CurrentSet++;
	$j('.set' + (CurrentSet-1)).fadeOut(200);
	$j('.set' + CurrentSet).fadeIn(200);
	var formPos = $j('#test-form').offset();
	var formPos2 = formPos.top;
	$j('html, body').animate({ scrollTop: formPos2 }, 500);
	if (CurrentSet == 2) {
		$j('#nextbut').html('<span>Getting there&nbsp;</span><span class="fa fa-caret-right"></span>');
	} else if (CurrentSet == 3) {
		$j('#nextbut').html('<span>Just one more&nbsp;</span><span class="fa fa-caret-right"></span>');
	} else if (CurrentSet == 4) {
		$j('.setnext').fadeOut(200);
		$j('.setres').fadeIn(200);
	
}});
*/
function countit(){
	clickcount++;
	//alert(clickcount);
}


$j(document).on('click', '#submbut', function () {
	for (var i=1; i<52; i++) {
		$j('#optionid' + i).val($j('#slider' + i).slider('value'));
	}
	
	if (clickcount > 50) {
		$j('#submbut').html('<span>PLEASE WAIT...</span>');
	$j("#submbut").attr('disabled','disabled');
		$j('#test-form').submit();
	}
	else{
		alert("Looks like you missed something");
	}
});

/*
function setSliderValue(sl, newval) {

	$j('#slider' + sl).slider('value', newval);

}

*/