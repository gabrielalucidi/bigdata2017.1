//FUNCTIONS OF THE MAP BUTTONS
function toggleHeatmap() {
  heatmap.setMap(heatmap.getMap() ? null : map);
}

function changeGradient() {
  var gradient = [
    'rgba(0, 255, 255, 0)',
    'rgba(0, 255, 255, 1)',
    'rgba(0, 191, 255, 1)',
    'rgba(0, 127, 255, 1)',
    'rgba(0, 63, 255, 1)',
    'rgba(0, 0, 255, 1)',
    'rgba(0, 0, 223, 1)',
    'rgba(0, 0, 191, 1)',
    'rgba(0, 0, 159, 1)',
    'rgba(0, 0, 127, 1)',
    'rgba(63, 0, 91, 1)',
    'rgba(127, 0, 63, 1)',
    'rgba(191, 0, 31, 1)',
    'rgba(255, 0, 0, 1)'
  ]
  heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
}

function changeRadius() {
  heatmap.set('radius', heatmap.get('radius') ? null : 70);
}

function changeOpacity() {
  heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
}

$(document).ready(function(){
  // INITIALIZE THE MAP
  var map, heatmap;
  function initMap(){
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: {lat: -22.908, lng: -43.177},
    });
  }
  initMap();

  $('.button').click(function(){
    var clickBtnValue = $(this).val();
    var neighborhood = $('select[name=neighborhoods]').val();
    var ajaxurl = 'php/Ajax.php',
    data =  {'action': clickBtnValue, 'neighborhood' : neighborhood};
    $.post(ajaxurl, data, function (response) {

      //COLLECT DATA FROM FILTERED JSON
      var response = JSON.parse(response);
      var results = response.results;
      console.log(results);

      //TRANSFORMING THE DATA IN A BETTER FORMAT TO ITERATE

      var results = results.replace(/}\s*{/g, "},{");
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

      //UPDATES THE MAP

      var map, heatmap;
      initMap();
      function initMap(){
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -22.908, lng: -43.177},
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
