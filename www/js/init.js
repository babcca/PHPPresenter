// cufon element selector


// jquery initialization
$(document).ready(function() {
	Cufon.replace('#cufon-menu', { hover: { color: 'white' } });
	Cufon.replace('.box');
	calendar_button_init("#date_from, #date_to", 0, 'dd-mm-yy');
	$('#gallery a').lightBox();
	//$('#slider').slider();
} );

function calendar_button_init(element, min, dateF) {
	var dates = $(element).datepicker( {
		minDate: min,
		showOn: "button",
		buttonImage: "/img/calendar.png",
		buttonImageOnly: true,
		buttonText: "Show calendar",
		dateFormat: dateF,
		onSelect: function (selectedDate) {
			var sd = selectedDate.split('-');
			var new_date = new Date(parseInt(sd[2], 10), parseInt(sd[1], 10) - 1, parseInt(sd[0], 10)),
			option = this.id == "date_from" ? "minDate" : "maxDate",
			num = this.id == "date_from" ? +1 : -1;
			new_date.setDate(new_date.getDate() + num);
			dates.not(this).datepicker("option", option, $.datepicker.formatDate(dateF, new_date));
			
		}
	});	
}
