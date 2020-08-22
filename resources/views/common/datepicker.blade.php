<script>
  flatpickr("#date", {
        locale:"ja",
        maxDate:"today",
        dateFormat: "Y-m-d",
    });
    let options = {
        twentyFour: true,
        upArrow: 'wickedpicker__controls__control-up',  //The up arrow class selector to use, for custom CSS
        downArrow: 'wickedpicker__controls__control-down',
    }
    $('.timepicker').wickedpicker(options);
</script>