<input type="checkbox" id="chkBox" name="HelpCheckbox" value="Help" />
<div id="txt" style="display: none;">
    <form action="demo_form.asp">
      First name: <input type="text" name="fname"><br>
      Last name: <input type="text" name="lname"><br>
      <input type="submit" value="Submit">
    </form>
</div>



 	 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script
			  src="https://code.jquery.com/ui/1.9.1/jquery-ui.min.js"
			  integrity="sha256-UezNdLBLZaG/YoRcr48I68gr8pb5gyTBM+di5P8p6t8="
			  crossorigin="anonymous"></script>	
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->




<script>
	$(document).ready(function () {
    $('#chkBox').click(function () {

        if ($(this).is(':checked')) {
            $("#txt").dialog({
                close: function () {
                    $('#chkBox').prop('checked', false);
                }
            });
        } else {
            $("#txt").dialog('close');
        }
    });
});
</script>