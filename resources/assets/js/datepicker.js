  $(function() {
    $( "#checkIn" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#checkOut" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#checkOut" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#checkIn" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });