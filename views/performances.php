<div id="top" class="inner-meta">

	<label>Ticket URL (for all performances)</label><br>
	<input type="url" name="ticket_url" value="<?php echo $custom['ticket_url'][0]; ?>" >
	<br>

	<p>
		For Dates, please use the format MM/DD/YYYY or MM-DD-YYYY<br>
		For Times, please use the format HH:MM(am/pm)
	</p>

	<br>
	<br>

	<p class="first">DATE</p><p>START TIME</p><p>END TIME</p><p>Ticket URL (for this performance)</p>

	<div id="events">
		<?php

			/* This adds the amount of input boxes according to the number of dates/times previously saved */
			$i = 0;
			do {?>
				<input class="event_date" style="margin-top:10px" type="date" name="<?="event_date_".$i?>" value="<?=$custom["event_date_".$i][0]; ?>"/>
				<input class="event_time" style="margin-top:10px" type="time" name="<?="event_start_".$i?>" value="<?=$custom["event_start_".$i][0]?>"/>
				<input class="event_time" style="margin-top:10px" type="time" name="<?="event_end_".$i?>" value="<?=$custom["event_end_".$i][0]?>"/>
				<input class="ticket_url" style="margin-top:10px" type="url" name="<?="event_url_".$i?>" value="<?=$custom["event_url_".$i][0]?>" placeholder="URL" />
				<input type="button" class="remove_button" name="remove_<?=$i?>" value="Remove"/>
				<?php echo ($i == $custom["num_dates"][0]-1) ? "" : "<br/>";
					$i++;?>
		<?php } while($i < $custom["num_dates"][0])?>

	</div>

	<!-- date_button is the add date button. This will call the jQuery action event that will dynamically add a new input line to the event div-->
	<input type="button" id="date_button" name="date_button" value="Add Date">

	<!-- num_dates is an invisible input field which will store the amount of dates. This allows us to save the amount of dates to the post itself. This is needed to load them in the while loop above -->
	<input id="num_dates" name="num_dates" style="display: none;" value="<?=($custom["num_dates"][0] == 0) ? 1 : $custom["num_dates"][0]?>">

	<script>
		// save the number of dates to be utilized in javascript
		var num_dates = $('#num_dates').val();
		$(document).ready(function(){

			// this is the action event that is called when the date_button is pressed
		    $("#date_button").click(function(){
		    	$("#events").append("<br><input class=\"event_date\" style=\"margin-top: 10px\" type=\"date\" name=\"event_date_"+num_dates+"\"/>");
		    	$("#events").append("<input class=\"event_time\" style=\"margin-top:10px\" type=\"time\" name=\"event_start_"+num_dates+"\"/>");
		    	$("#events").append("<input class=\"event_time\" style=\"margin-top:10px\" type=\"time\" name=\"event_end_"+num_dates+"\"/>");
		    	$("#events").append("<input class=\"ticket_url\" style=\"margin-top:10px\" type=\"url\" name=\"event_url_"+num_dates+"\" placeholder=\"URL\"/>");
		    	$("#events").append("<input type=\"button\" class=\"remove_button\" name=\"remove_"+num_dates+"\" value=\"Remove\"/>");
		    	num_dates++;
		    	$("#num_dates").val(num_dates);
		    });
		});

		// this is where the remove buttons are handled
		$(document).on('click', '.remove_button', function(){
			// checks to see if the remove button clicked is the final date in the events div.
			// if it is, then it will simply delete it from the DOM and decrement the num_dates variable
			// which is then stored in the num_dates input field
	    	if($(this).attr("name") == ("remove_"+(num_dates-1))){
	    		$("[name='event_date_"+(num_dates-1)+"']").remove();
	    		$("[name='event_start_"+(num_dates-1)+"']").remove();
	    		$("[name='event_end_"+(num_dates-1)+"']").remove();
	    		$("[name='event_url_"+(num_dates-1)+"']").remove();
	    		$(this).remove();
	    		num_dates--;
	    		$("#num_dates").val(num_dates);
	    	}
	    	// this is when the remove button clicked is not the final button.
	    	// when this occurs we must first shift each value down an index and then which allows us
	    	// to delete the final element without losing any data
	    	else {
	    		var current_index = parseInt(($(this).attr("name")).slice(-1));
	    		
	    		// shift each element down an index
	    		for(var i = current_index; i < num_dates; i++){
	    			$("[name='event_date_"+i+"']").attr("value", $("[name='event_date_"+(i+1)+"']").attr("value"));
	    			$("[name='event_start_"+i+"']").attr("value", $("[name='event_start_"+(i+1)+"']").attr("value"));
	    			$("[name='event_end_"+i+"']").attr("value", $("[name='event_end_"+(i+1)+"']").attr("value"));
	    			$("[name='event_url_"+i+"']").attr("value", $("[name='event_url_"+(i+1)+"']").attr("value"));
	    		}

	    		// remove final input line
	    		$("[name='event_date_"+(num_dates-1)+"']").remove();
	    		$("[name='event_start_"+(num_dates-1)+"']").remove();
	    		$("[name='event_end_"+(num_dates-1)+"']").remove();
	    		$("[name='event_url_"+(num_dates-1)+"']").remove();
	    		$("[name='remove_"+(num_dates-1)+"']").remove();
	    		num_dates--;
	    		$("#num_dates").val(num_dates);

	    	}
		});
	</script>
    
</div>
