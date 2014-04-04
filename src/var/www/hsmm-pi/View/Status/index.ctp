<!-- File: /app/View/Status/index.ctp -->

<script>
    $( document ).on("click", ".open-mapModal", function () {
	// set lat-lon labels on the modal dialog
	$("#longitude").text($(this).data('lon'));
	$("#latitude").text($(this).data('lat'));


	if ((typeof(Microsoft) !== 'undefined') && (typeof(Microsoft.Maps) !== 'undefined')) {
            var latVal = $(this).data('lat');
            var lonVal = Microsoft.Maps.Location.normalizeLongitude($(this).data('lon'));
            var center_loc = new Microsoft.Maps.Location(latVal, lonVal);
            var pin = new Microsoft.Maps.Pushpin(center_loc, {draggable:false}); 
            var map = new Microsoft.Maps.Map(document.getElementById("mapDiv"), {credentials: "<?php echo ((null != $maps_api_key) ? $maps_api_key : ''); ?>"});
            map.setView({center:center_loc, zoom:15});
            map.entities.push(pin);
	}

    });
</script>
<link rel="stylesheet" href="css/mainstyles.css">
<div id="header1"></div>
<div id="content">
  <p><h1>Node Name: &nbsp;
      <small><?php echo $node_name; ?>
 <?php  
      if (array_key_exists($node_wifi_ip_address, $mesh_node_locations)) {
	$location = $mesh_node_locations[$node_wifi_ip_address];
	if ($location != NULL) {
	  echo "&nbsp;<a href=\"#mapModal\" data-lat=\"".$location['lat']."\" data-lon=\"".$location['lon']."\" role=\"button\" class=\"open-mapModal icon-globe\" data-toggle=\"modal\"></a>";
	}
      }
?>
      <p><h3>Mesh Links</h3></p>
      
      <?php
	 if ($mesh_links != NULL && sizeof($mesh_links['links']) > 0) {
      ?>
      <table class="table table-striped table-bordered" style="font-size: 16px">
	<tr>
          <th>Hostname</th>
	  <th>IP Address</th>
	  <th>Link Quality</th>
	</tr>
	<?php
	   foreach ($mesh_links['links'] as $node) {
	   ?> 
	<tr>
          <?php $node_hostname = gethostbyaddr($node['remoteIP']); ?>
          <td><a href="http://<?php echo $node_hostname; ?>:8080/"><?php echo $node_hostname; ?></a>
	   <?php
	   if (array_key_exists($node['remoteIP'], $mesh_node_locations)) {
	     $location = $mesh_node_locations[$node['remoteIP']];
	     if ($location != NULL) {
	       echo "&nbsp;<a href=\"#mapModal\" data-lat=\"".$location['lat']."\" data-lon=\"".$location['lon']."\" role=\"button\" class=\"open-mapModal icon-globe\" data-toggle=\"modal\"></a>";
	     }
	   }
	   ?>
	   <?php if (in_array($node['remoteIP'], $mesh_neighbors)) { ?>
	   &nbsp;<i class="icon-star"></i>
	   <?php } ?>
	  </td>
	  <td><?php echo $node['remoteIP']; ?></td>
	  <td>
	    <div class="progress"><div class="bar" style="width: <?php echo round($node['linkQuality'] * 100).'%'; ?>;"><?php echo round($node['linkQuality'] * 100).'%'; ?></div>
	  </div></td>
	</tr>
	<?php 
	   }
	   ?>
      </table>
      <?php
	 } else {
	 ?>
</div>
<div id="content">
      <div>
	<strong>Warning!</strong>.  There are no mesh links in range.  It's a bit quiet around here.
      </div>
      <?php } ?>
      <p><h3>Mesh Services</h3></p>
      <?php
	 if ($mesh_services != NULL && sizeof($mesh_services) > 0) {
      ?>
      <table class="table table-striped table-bordered">
	<tr>
	  <th>Service</th>
	</tr>
	<?php
	   foreach ($mesh_services as $service) {
	   ?> 
	<tr>
	  <td><a href="<?php echo $service[0]; ?>"><?php echo $service[2]; ?></a></td>
	</tr>
	<?php 
	   }
	   ?>
      </table>
      <?php
	 } else {
	 ?>
      <div>
	There are no mesh services being announced at this time.
      </div> 
      <?php } ?>

</div>
<!-- Modal -->
<div id="mapModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Node Location Map</h3>
  </div>
  <div class="modal-body">
    <div id='mapDiv' style="position:relative; width:500px; height:350px;"></div>
    <h5>Latitude:&nbsp;<em id="latitude"></em>&nbsp;&nbsp;Longitude:&nbsp;<em id="longitude"></em>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
