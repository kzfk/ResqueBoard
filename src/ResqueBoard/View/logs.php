<script type="text/javascript">
	$(document).ready(function() {
		loadLogs();
	});
</script>

<div class="container" id="main">
	<div class="page-header">
		<h2>Logs</h2>
	</div>
	<div class="row">
		<div class="span10">
		
			<div class="pull-right"><button class="btn btn-mini" id="clear-log-area">Clear All</button></div>
			<h3>Lastest Activities <span class="badge badge-info" rel="log-counter">0</span></h3>
    
		    <script id="log-template" type="text/x-jsrender">
				<li data-verbosity="{{>levelName}}" data-type="{{>action}}" data-worker="{{>workerClass}}">
					<div class="label-c"><span class="label {{>levelClass}}">{{>levelName}}</span></div>
					<a href="/working#{{>workerClass}}"><em class="worker" style="color:{{>color}}">{{>worker}}</em></a>
					<b class="type">{{>action}}</b> {{>detail}} <date rel="tooltip" title="{{>time}}">{{>relativeTime}}</date>
				</li>
			</script>
		      
		    <ol id="log-area"></ol>

		    <div class="alert alert-info">
			   	<strong>Tips</strong>
			   	Hover on a row to highlight all activities from the same worker
			</div>
		   
		</div>
	
		<div class="span2">
			<form class="" id="log-filter-form">
				<fieldset><legend>Listen to</legend>
				    <?php
				        foreach ($logLevels as $levelName => $className) {
				            
			                echo '<label class="checkbox"><input type="checkbox" rel="'.
			                $levelName.'"';
			                
			                if (!in_array($levelName, $mutedLevels)) {
			                    echo ' checked="unchecked"';
			                }
			                
			                echo '> '.ucwords($levelName).'</label>';
				            
				        }
				    ?>
				</fieldset>
			</form>
			
			<form class="" id="log-sweeper-form">
				<fieldset><legend>Clear</legend>
					<h4 class="sep">By verbosity</h4>
					<ul class="unstyled">
						<?php
							foreach ($logLevels as $level => $class) {
								echo '<li><span class="badge '.$class.'" rel="'.$level.'">0</span> '.
								$level.' <button class="btn btn-mini pull-right" data-level="'.
								$level.'" rel="verbosity">Clear</button></li>';
							}
						?>
					</ul>

					<h4 class="sep">By type</h4>
					<ul class="unstyled">
						<?php
							foreach ($logTypes as $type) {
								echo '<li><span class="badge" rel="'.$type.'">0</span> '.
								$type.' <button class="btn btn-mini pull-right" data-type="'.
								$type.'" rel="type">Clear</button></li>';
							}
						?>
					</ul>
				</fieldset>
			</form>

			    <div class="alert alert-info">
			    	Clear action just clear lines from the display, and does not delete them from the database
			    </div>
			
		</div>
	</div>
	
</div>