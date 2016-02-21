var g_gmlAllMaps = [];
jQuery(document).ready(function(){
	if(typeof(gmpAllMapsInfo) !== 'undefined' && gmpAllMapsInfo && gmpAllMapsInfo.length) {
		for(var i = 0; i < gmpAllMapsInfo.length; i++) {
			if(jQuery('#'+ gmpAllMapsInfo[i].view_html_id).size()) {
				gmpInitMapOnPage( gmpAllMapsInfo[i] );
			}
		}
	}
});
function gmpInitMapOnPage(mapData) {
	var newMap = new gmpGoogleMap('#'+ mapData.view_html_id, mapData.params);
	if(mapData.markers && mapData.markers.length) {
		mapData.markers = _gmpPrepareMarkersList( mapData.markers );
		for(var j = 0; j < mapData.markers.length; j++) {
			var newMarker = newMap.addMarker( mapData.markers[j] );
			newMarker.setTitle( mapData.markers[j].title, true );
			newMarker.setDescription( mapData.markers[j].description );
		}
		newMap.markersRefresh();
	}
	if(newMap.getRawMapInstance().map_display_mode == 'popup') {
		var img = jQuery('.map-preview-img-container').find('img');

		img.attr('src', gmpGetMapImgSrc(newMap));
		img.click(function(e){
			e.stopPropagation();
			var mapContainer = jQuery('#mapConElem_'+ newMap.getViewId()+ '.display_as_popup')
			,	mapContainerWidth = mapContainer.width()
			,	mapContainerHeight = mapContainer.find('.gmpMapDetailsContainer:first').height()
			,	popupContainer = mapContainer.parent('#gmpWidgetMapPopupWnd')
			,	popupWidth = ''
			,	popupHeight = ''
			,	bodyWidth = jQuery('body').width();

			if(bodyWidth < mapContainerWidth) {
				mapContainerWidth = bodyWidth - 40;
			}
			else if((bodyWidth - mapContainerWidth) < 40){
				mapContainerWidth = mapContainerWidth - (bodyWidth - mapContainerWidth + 40);
			}
			popupWidth = mapContainerWidth;
			popupHeight = mapContainerHeight;

			if(!popupContainer.hasClass('ui-dialog-content'))
				popupContainer.dialog({
					modal:    true
				,	autoOpen: false
				,	width:	popupWidth + 40
				,	height: popupHeight + 70
				});
			popupContainer.dialog('open');
			mapContainer.css({
				width: '100%'
			});
			mapContainer.show();
			newMap.refresh();
		});
		img.show();
	}
	g_gmlAllMaps.push( newMap );
}
function gmpGetMapInfoById(id) {
	if(typeof(gmpAllMapsInfo) !== 'undefined' && gmpAllMapsInfo && gmpAllMapsInfo.length) {
		id = parseInt(id);
		for(var i = 0; i < gmpAllMapsInfo.length; i++) {
			if(gmpAllMapsInfo[i].id == id) {
				return gmpAllMapsInfo[i];
			}
		}
	}
	return false;
}
function gmpGetMapInfoByViewId(viewId) {
	if(typeof(gmpAllMapsInfo) !== 'undefined' && gmpAllMapsInfo && gmpAllMapsInfo.length) {
		for(var i = 0; i < gmpAllMapsInfo.length; i++) {
			if(gmpAllMapsInfo[i].view_id == viewId) {
				return gmpAllMapsInfo[i];
			}
		}
	}
	return false;
}
function gmpGetAllMaps() {
	return g_gmlAllMaps;
}
function gmpGetMapById(id) {
	var allMaps = gmpGetAllMaps();
	for(var i = 0; i < allMaps.length; i++) {
		if(allMaps[i].getId() == id) {
			return allMaps[i];
		}
	}
	return false;
}
function gmpGetMapByViewId(viewId) {
	var allMaps = gmpGetAllMaps();
	for(var i = 0; i < allMaps.length; i++) {
		if(allMaps[i].getViewId() == viewId) {
			return allMaps[i];
		}
	}
	return false;
}
function gmpGetMapImgSrc(map) {
	var imgSize = map._mapParams.img_width ? map._mapParams.img_width : 175;
	imgSize += 'x';
	imgSize += map._mapParams.img_height ? map._mapParams.img_height : 175;

	var reqParams = {
		center: map._mapParams.map_center.coord_x+ ','+ map._mapParams.map_center.coord_y
	,	zoom: map._mapParams.zoom
	,	size: imgSize
	,	maptype: map._mapParams.type
	,	sensor: 'false'
	,	language: map._mapParams.language
	};
	var reqStr = (GMP_DATA.isHttps ? 'https' : 'http')+ '://maps.google.com/maps/api/staticmap?'+ jQuery.param(reqParams);

	if(map._markers && map._markers.length) {
		for(var i in map._markers) {
			reqStr += '&markers=color:green|label:none|'+ map._markers[i]._markerObj.coord_x+ ','+ map._markers[i]._markerObj.coord_y;
		}
	}
	return reqStr;
}