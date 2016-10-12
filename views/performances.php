<div class="inner-meta">

	<label>Ticket URL (for all performances)</label><br>
	<input type="url" name="ticket_url" value="<?php echo $custom['ticket_url'][0]; ?>" >
	<br>

	<p>
		For Dates, please use the format MM/DD/YYYY or MM-DD-YYYY<br>
		For Times, please use the format HH:MM(am/pm)
	</p>

	<!-- Father forgive me for my sins (don't judge me, this is incomplete and not mine)-->
	<br>
	<br>

	<p class="first">DATE</p><p>START TIME</p><p>END TIME</p><p>Ticket URL (for this performance)</p><br>

	<input class="event_date" style="margin-top:10px" type="date" name="event_date" size="15" id="d" value="<?php echo $custom['event_date'][0]; ?>"/>
	<input class="event_time" style="margin-top:10px" type="time" name="event_start" size="15" id="s" value="<?php echo $custom["event_start"][0]?>"/>
	<input class="event_time" style="margin-top:10px" type="time" name="event_end" size="15"  id="e" value="<?php echo $custom["event_end"][0]?>"/>
	<input class="ticket_url" style="margin-top:10px" type="url" name="event_url" size="30" id="t" value="<?php echo $custom["event_url"][0]?>" placeholder="URL" />

	<?php
	    // global $post;
	    // $ticket_url = $custom["ticket_url"][0];
	    // $indiv_ticket_url = $custom["indiv_ticket_url"][0];
	    // $custom = get_post_custom($post->ID);
	    // $subtitle = $custom["subtitle"][0];
	    // $dates = explode("&", $custom["date"][0]);
	    // $starts = explode("&", $custom["start"][0]);
	    // $ends = explode("&", $custom["end"][0]);
    ?>
    


</div>
