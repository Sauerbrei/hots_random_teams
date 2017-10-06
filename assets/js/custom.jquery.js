$(function() {

	var date = null;
	var update = function () {
		date = moment(new Date());
		$('#eutime').html(date.locale('de').format('HH:mm') + ' Uhr');
		$('#ustime').html(date.locale('en').format('hh:mm A'));
	};

	update();
	setInterval(update, 1000);

	$('#select_all').click(function() {
		$('.player_checkbox').each(function() {
			if ($(this).prop('checked') === false) {

			}
		});
	});


	$('.thetime').click(function() {
		var myId = $(this).attr('id');
		$('.thetime').each(function(e) {
			if ($(this).attr('id') === myId) {
				$(this).addClass('hidden');
			} else {
				$(this).removeClass('hidden');
			}
		})
	});

});
