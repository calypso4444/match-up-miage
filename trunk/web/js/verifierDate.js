$(document).ready(function() {
    $('#datepicker').datepicker({
        onSelect: function(dateText, inst) {
            //Get today's date at midnight
            var today = new Date();
            today = Date.parse(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
            //Get the selected date (also at midnight)
            var selDate = Date.parse(dateText);

            if(selDate < today) {
                //If the selected date was before today, continue to show the datepicker
                $('#datepicker').val('');
                $(inst).datepicker('show');
            }
        }
    });
});