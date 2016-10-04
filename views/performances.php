<div class="inner-meta">

	<label>Ticket URL (for all performances)</label>
	<input type="text" name="ticket_url" value="<?php echo $custom['ticket_url'][0]; ?>" >
	<br>

	<p>
		For Dates, please use the format MM/DD/YYYY or MM-DD-YYYY<br>
		For Times, please use the format HH:MM(am/pm)
	</p>

	<!-- Father forgive me for my sins (don't judge me, this is incomplete and not mine)-->

	DATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; START TIME &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; END TIME &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ticket URL (for this performance)<br> <?php
    global $post;
    $ticket_url = $custom["ticket_url"][0];
    $indiv_ticket_url = $custom["indiv_ticket_url"][0];
    $custom = get_post_custom($post->ID);
    $subtitle = $custom["subtitle"][0];
    $dates = explode("&", $custom["date"][0]);
    $starts = explode("&", $custom["start"][0]);
    $ends = explode("&", $custom["end"][0]);
    for($i = 0; $i < sizeof($dates); $i++) {
	?>
	<style>
	    a:hover {
	        cursor:pointer;
	    }
	</style>
		<input  style="margin-top:10px" type="text" name="date[]" id="d<?=$i?>" value="<?=$dates[$i]; ?>" placeholder="MM/DD/YYYY"/>
		<input style="margin-top:10px" type="text" name="start[]" id="s<?=$i?>" value="<?=$starts[$i]; ?>" placeholder="HH:MM(am/pm)"/>
		<input style="margin-top:10px" type="text" name="end[]"  id="e<?=$i?>" value="<?=$ends[$i]; ?>" placeholder="HH:MM(am/pm)"/>
		<input style="margin-top:10px" type="text" name="ticket[]" id="t<?=$i?>" value="<?=$indiv_ticket_url[$i]; ?>" placeholder="URL" />
	
	<?php } ?>
</div>
