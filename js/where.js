var map, latLng, marker, infoWindow, ad;

function initialize() {

    var myOptions = {
        zoom: 16,
        panControl: false,
        streetViewControl: true,
        scaleControl: true,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        scaleControlOptions: {
            position: google.maps.ControlPosition.BOTTOM_RIGHT
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById('googlemaps'),
        myOptions);

    if (navigator.geolocation) {
        defaultLocation();
        navigator.geolocation.getCurrentPosition(locationFound, defaultLocation);
    } else {
        defaultLocation();
    }

}

function locationFound(position) {
    showMap(position.coords.latitude, position.coords.longitude, true);
}

function defaultLocation() {
    showMap(38.8977, -77.0366, false);
}

function showMap(lat, lng, found) {

    latLng = new google.maps.LatLng(lat, lng);

    var adUnitDiv = document.createElement('div');

    var adWidth = window.innerWidth || document.documentElement.clientWidth;

    if (adWidth >= 728)
        adFormat = google.maps.adsense.AdFormat.LEADERBOARD;
    else
        adFormat = google.maps.adsense.AdFormat.HALF_BANNER;
    /*
    else if (adWidth >= 300)
    else
        adFormat = google.maps.adsense.AdFormat.HALF_BANNER;
    */

    var adUnitOptions = {
        backgroundColor: '#ffffff',
        borderColor: '#000000',
        titleColor: '#1155cc',
        textColor: '#000000',
        urlColor: '#009900',
        format: adFormat,
        position: google.maps.ControlPosition.TOP_CENTER,
        map: map,
        visible: true,
        publisherId: 'ca-pub-9238225005366006'
    }

    ad = new google.maps.adsense.AdUnit(adUnitDiv, adUnitOptions);

    map.setCenter(latLng);

    marker = new google.maps.Marker({
        position: latLng,
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP
    });

    var url = 'http://google.com/#' + marker.getPosition().lat() + "," + marker.getPosition().lng();
    var html = '<div id="iw"><h3><a href="' + url + '">Show Postal Address</a></h3><strong>Latitude :: </strong> ' + marker.getPosition().lat() + '<br/><strong>Longitude :: </strong> ' + marker.getPosition().lng() + '<br />';
    html += '<hr /><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fdigital.inspiration&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=21&amp;appId=609713525766533" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; width:120px" allowTransparency="true"></iframe>';
    html += '<span style="float:right"><a target="_blank" href="https://twitter.com/intent/tweet?related=labnol&via=labnol&url=' + encodeURIComponent(url) + '&text=I%20just%20found%20my%20location%20on%20Google%20Maps">Tweet #location</a></span><br /></div>';

    if (!found) {
        html = "<div id='iw'>Please click the Allow button to determine your current location. Or <a href='http://ctrlq.org/maps/address/'>click here</a> and drag the marker to your current location manually.";
        html += '<hr /><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fdigital.inspiration&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=21&amp;appId=609713525766533" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; width:120px" allowTransparency="true"></iframe></div>';
    }

    infoWindow = new google.maps.InfoWindow({
        content: html
    });

    infoWindow.open(map, marker);

    google.maps.event.addListener(marker, 'dragstart', function(e) {
        infoWindow.close();
    });

    google.maps.event.addListener(marker, 'dragend', function(e) {
        var point = marker.getPosition();
        map.panTo(point);
        geocode(point);
    });

}

google.maps.event.addDomListener(window, 'load', initialize);