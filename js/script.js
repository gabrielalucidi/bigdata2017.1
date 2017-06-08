$(document).ready(function(){
  $('.button').click(function(){
    var clickBtnValue = $(this).val();
    var neighborhood = $('select[name=neighborhoods]').val();
    var ajaxurl = 'php/Ajax.php',
    data =  {'action': clickBtnValue, 'neighborhood' : neighborhood};
    $.post(ajaxurl, data, function (response) {

      //COLLECT DATA FROM FILTERED JSON

      var response = JSON.parse(response);
      var status = response.status;
      console.log(status);
      var results = response.results;
      console.log(results);

      //TRANSFORMING THE DATA IN A BETTER FORMAT TO ITERATE

      var results = results.replace(/\n/g, ",");
      var results = results.slice(0, -1);
      var newjsonstring = '{"events":[' + results + ']}';
      var obj = JSON.parse(newjsonstring);
      var events = obj.events[0];

      //INSERTING THE LOCATION DATA TO THE heatmapData ARRAY

      var heatmapData = [];
      for (var i = 0; i < obj.events.length; i++) {
        var coords = obj.events[i];
        var latLng = new google.maps.LatLng(coords.latitude, coords.longitude);
        heatmapData.push(latLng);
      }

      //INITIALIZING THE MAP

      var map, heatmap;
      initMap();
      function initMap(){
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -22.908, lng: -43.177},
          //mapTypeId: 'satellite'
        });

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: heatmapData,
          map: map,
          radius: 50 //default radius of the points
        });
      }
    });
  });
});
