<script>
    let kecamatan = L.layerGroup();

    @foreach ($kecamatan as $data)
        let data{{ $data->id }} = L. layerGroup();
    @endforeach

</script>

<script>
    let map = [];
    // featureList, KelurahanSearch = [],
    // KecamatanSearch = [],
    // septiktankSearch = [],
    // mckplusSearch = [],
    // mckkomunalSearch = [],
    // ipalkomunalSearch = [],
    // mckumumSearch = [],
    // septikkomunalSearch = [];

// //untuk menampung array semua layer yang masuk ke POI di pojok kiri
// let sidebarLayers = [];

$(window).resize(function () {
    sizeLayerControl();
});

$(document).on("click", ".feature-row", function (e) {
    $(document).off("mouseout", ".feature-row", clearHighlight);
    //sidebarClick(parseInt($(this).attr("id"), 10));
    sidebarClick($(this).attr("lat"), $(this).attr("lng"));
});

if (!("ontouchstart" in window)) {
    $(document).on("mouseover", ".feature-row", function (e) {
        highlight.clearLayers().addLayer(L.circleMarker([$(this).attr("lat"), $(this).attr("lng")], highlightStyle));
    });
}

$(document).on("mouseout", ".feature-row", clearHighlight);


$("#list-btn").click(function () {
    animateSidebar();
    return false;
});


$("#sidebar-toggle-btn").click(function () {
    animateSidebar();
    return false;
});

$("#sidebar-hide-btn").click(function () {
    animateSidebar();
    return false;
});

function animateSidebar() {
    $("#sidebar").animate({
        width: "toggle"
    }, 350, function () {
        map.invalidateSize();
    });
}


function sizeLayerControl() {
    $(".leaflet-control-layers").css("max-height", $("#map").height() - 50);
}

function clearHighlight() {
    highlight.clearLayers();
}

// //function sidebarClick(id) {
// function sidebarClick(lat, lng) {
//     //let layer = markerClusters.getLayer(id);
//     //map.setView([layer.getLatLng().lat, layer.getLatLng().lng], 17);
//     map.setView([lat, lng], 21);
//     //layer.fire("click");
//     /* Hide sidebar and go to the map on small screens */
//     if (document.body.clientWidth <= 767) {
//         $("#sidebar").hide();
//         map.invalidateSize();
//     }
// }

// function syncSidebar() {
//     /* Empty sidebar features */
//     $("#feature-list tbody").empty();
//     /* Loop through mckplus layer and add only features which are in the map bounds */
//     mckplus.eachLayer(function (layer) {
//         if (map.hasLayer(mckplusLayer)) {
//             if (map.getBounds().contains(layer.getLatLng())) {
//                 $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="{{ asset('img/mckplus.png') }}"></td><td class="feature-name">' + layer.feature.properties.ALAMAT + " Kel. " + layer.feature.properties.KELURAHAN + " Kec. " + layer.feature.properties.KECAMATAN + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
//             }
//         }
//     });



//     /* Loop through mckkomunal layer and add only features which are in the map bounds */
//     mckkomunal.eachLayer(function (layer) {
//         if (map.hasLayer(mckkomunalLayer)) {
//             if (map.getBounds().contains(layer.getLatLng())) {
//                 $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="{{ asset('img/mckkomunal.png') }}"></td><td class="feature-name">' + layer.feature.properties.ALAMAT + " Kel. " + layer.feature.properties.KELURAHAN + " Kec. " + layer.feature.properties.KECAMATAN + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
//             }
//         }
//     });

//     /* Loop through ipalkomunal layer and add only features which are in the map bounds */
//     ipalkomunal.eachLayer(function (layer) {
//         if (map.hasLayer(ipalkomunalLayer)) {
//             if (map.getBounds().contains(layer.getLatLng())) {
//                 $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="{{ asset('img/ipalkomunal.png') }}"></td><td class="feature-name">' + layer.feature.properties.ALAMAT + " Kel. " + layer.feature.properties.KELURAHAN + " Kec. " + layer.feature.properties.KECAMATAN + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
//             }
//         }
//     });

//     /* Loop through mck umum layer and add only features which are in the map bounds */
//     mckumum.eachLayer(function (layer) {
//         if (map.hasLayer(mckumumLayer)) {
//             if (map.getBounds().contains(layer.getLatLng())) {
//                 $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="{{ asset('img/mckumum.png') }}"></td><td class="feature-name">' + layer.feature.properties.ALAMAT + " Kel. " + layer.feature.properties.KELURAHAN + " Kec. " + layer.feature.properties.KECAMATAN + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
//             }
//         }
//     });

//     /* Loop through septiktank komunal layer and add only features which are in the map bounds */
//     septikkomunal.eachLayer(function (layer) {
//         if (map.hasLayer(septikkomunalLayer)) {
//             if (map.getBounds().contains(layer.getLatLng())) {
//                 $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="{{ asset('img/septictank.png') }}"></td><td class="feature-name">' + layer.feature.properties.Tahun + " KOTAKU - Kel. " + layer.feature.properties.KELURAHAN + " Kec. " + layer.feature.properties.KECAMATAN + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
//             }
//         }
//     });




//     /* Update list.js featureList */
//     featureList = new List("features", {
//         valueNames: ["feature-name"]
//     });
//     featureList.sort("feature-name", {
//         order: "asc"
//     });
// }


/* Overlay Layers */
let highlight = L.geoJson(null);
let highlightStyle = {
    stroke: false,
    fillColor: "#00FFFF",
    fillOpacity: 0.7,
    radius: 10
};


/*Kerawanan*/

let kerawananColors = {
    "Risiko Sangat Tinggi": "#fc0314",
    "Risiko Tinggi": "#fcf912",
    "Risiko Sedang": "#89fc3d",
    "Risiko Rendah": "#319df5"
};

// specify popup options 
let customOptions = {
    'className': 'custom'
}


function kerawananFeature(feature, layer) {
    let contentPopup = layer.feature.properties.KELURAHAN;
    let dataKerawanan = layer.feature.properties.KERAWANAN;
    layer.on({
        click: function (value) {
            layer.bindPopup('<div style=text-align:center;>' + '<h6>' + 'Kel. ' + contentPopup + '</h6>' +
                '<p>' + 'Area ' + dataKerawanan + ' Air Limbah' + '</p>' + '</div>', customOptions);
            layer.openPopup();
        },

        mouseover: function (value) {
            let layerKerawanan = value.target;
            layerKerawanan.setStyle({
                weight: 3,
                color: "#00FFFF",
                fillOpacity: 0.05,
                opacity: 1
            });

            if (!L.Browser.ie && !L.Browser.opera) {
                layerKerawanan.bringToFront();
            }
        },

        mouseout: function (value) {
            Kerawanan.resetStyle(value.target);
        }
    });
}


let Kerawanan = L.geoJson(null, {
    style: function (feature) {
        return {
            name: Kerawanan,
            weight: 2,
            color: "white",
            fillColor: kerawananColors[feature.properties.KERAWANAN],
            fillOpacity: 0.7,
            opacity: 1,
            width: 0.01,
            dashArray: '3',
            interactive: false
        };
    },
    onEachFeature: kerawananFeature
});


$.getJSON("{{ asset('data/kerawanan.geojson') }}", function (data) {
    Kerawanan.addData(data);
});


// get color depending on population density value
function getColor(jiwa) {
    return jiwa > 40000 ? '#800026' :
        jiwa > 20000 ? '#BD0026' :
        jiwa > 15000 ? '#FEB24C' :
        jiwa > 0 ? '#FED976' :
        '#FFEDA0';
}

function style(feature) {
    return {
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7,
        fillColor: getColor(feature.properties.KEPADATAN)
    };
}

function highlightFeature(e) {
    let layer = e.target;

    layer.setStyle({
        weight: 5,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }

    info.update(layer.feature.properties);

}

let dataKepadatan;

function resetHighlight(e) {
    dataKepadatan.resetStyle(e.target);
    info.update();
    infoChart.update();
}

function zoomToFeature(e) {
    map.fitBounds(e.target.getBounds());
}

function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });
}

dataKepadatan = L.geoJson(null, {
    name: dataKepadatan,
    style: style,
    onEachFeature: onEachFeature
});

$.getJSON("{{ asset('data/kepadatan.geojson') }}", function (data) {
    dataKepadatan.addData(data);
});


/*DELINIASI KUMUH*/
let kumuh = L.geoJson(null, {
    style: function (feature) {
        return {
            color: "grey",
            fillColor: "magenta",
            fillOpacity: 0.5,
            opacity: 0.5,
            width: 0.001,
            clickable: true,
            title: feature.properties.KATEGORI,
            riseOnHover: true
        };
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties) {
            let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>KRITERIA KUMUH</th><td>" + feature.properties.KRITERIA_KUMUH + "<tr><th>LUASAN KUMUH (M<SUP>2</SUP>)</th><td>" + feature.properties.LUAS + "</td></tr>" + "<tr><th>KELURAHAN</th><td>" + feature.properties.KELURAHAN + "</td></tr>" + "<tr><th>RT</th><td>" + feature.properties.RT + "</td></tr>" + "</td></tr>" + "<table>";
            layer.on({
                click: function (e) {
                    $("#feature-title").html(feature.properties.KATEGORI);
                    $("#feature-info").html(content);
                    $("#featureModal").modal("show");

                }
            });
        }
        layer.on({
            mouseover: function (e) {
                let layer = e.target;
                layer.setStyle({
                    weight: 3,
                    color: "#00FFFF",
                    opacity: 1
                });
                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            },
            mouseout: function (e) {
                kumuh.resetStyle(e.target);
            }
        });
    }
});
$.getJSON("{{ asset('data/kumuh.geojson') }}", function (data) {
    kumuh.addData(data);
});

let normal = L.geoJson(null);
$.getJSON("", function (data) {
    normal.addData(data);
});


let Kelurahan = L.geoJson(null, {
    style: function (feature) {
        return {
            color: "#42a7f5",
            fill: true,
            fillOpacity: 0,
            opacity: 0.3,
            width: 0.01,
            clickable: false,
            riseOnHover: false
        };
    },

    onEachFeature: function (feature, layer) {
        // KelurahanSearch.push({
        //     name: layer.feature.properties.KELURAHAN,
        //     source: "Kelurahan",
        //     id: L.stamp(layer),
        //     bounds: layer.getBounds()
        // });
        layer.on({
            mouseover: function (e) {
                let layer = e.target;
                layer.setStyle({
                    weight: 3,
                    color: "#00FFFF",
                    fillOpacity: 0.05,
                    opacity: 1
                });


                // if (!L.Browser.ie && !L.Browser.opera) {
                //     layer.bringToFront();
                // }
            },
            mouseout: function (e) {
                Kelurahan.resetStyle(e.target);
            }
        });
    }
});
$.getJSON("{{ asset('data/Kelurahan.geojson') }}", function (data) {
    Kelurahan.addData(data);
});


/*Kecamatan*/


// let kecamatanColors = {
//     "Banjarmasin Barat": "#ffb400",
//     "Banjarmasin Selatan": "#70a1d7",
//     "Banjarmasin Tengah": "#a1de93",
//     "Banjarmasin Timur": "#f47c7c",
//     "Banjarmasin Utara": "#f7f48b"
// };

@foreach ($kecamatan as $data)
    L.geojson(<?= $data->geojson ?>, {
    style : {
            color : 'white',
            fillColor : '{{ $data->color}}',
            fillOpacity : 0.7,
            opacity: 1,
            width: 1,
            dashArray: '3',
            clickable: true,
            riseOnHover: true
            }
    }).addTo(data{{$data->id }});
@endforeach

// let Kecamatan = L.geoJson(null, {
//     style: function (feature) {
//         return {
//             name: Kecamatan,
//             color: "white",
//             fillColor: kecamatanColors[feature.properties.KECAMATAN],
//             fillOpacity: 0.7,
//             opacity: 1,
//             width: 1,
//             dashArray: '3',
//             clickable: true,
//             riseOnHover: true
//         };
//     },

    // onEachFeature: function (feature, layer) {
        // KecamatanSearch.push({
        //     name: layer.feature.properties.KECAMATAN,
        //     source: "Kecamatan",
        //     id: L.stamp(layer),
        //     bounds: layer.getBounds()
        // });

//         if (feature.properties) {
//             let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>KODE KEC.</th><td>" + feature.properties.KODE_KEC +
//                 "<tr><th>LUAS (KM<sup>2</sup>)</th><td>" + feature.properties.LUAS +
//                 "</td></tr>" + "<tr><th>JUMLAH KELURAHAN</th><td>" + feature.properties.JUMLAH_KEL +
//                 "</td></tr>" + "<tr><th>JUMLAH PENDUDUK (JIWA)</th><td>" + feature.properties.JUMLAH_JIWA +
//                 "</td></tr>" + "<tr><th>KEPADATAN PENDUDUK (JIWA/KM<sup>2</sup>)</th><td>" + feature.properties.KEPADATAN +
//                 "</td></tr>" + "<tr><th>AKSES AMAN (%)</th><td>" + feature.properties.AKSES_AMAN +
//                 "</td></tr>" + "<tr><th>AKSES DASAR/CUBLUK (%)</th><td>" + feature.properties.AKSES_DASAR +
//                 "</td></tr>" + "<tr><th>TANPA AKSES/ PENGGUNA JAMBAN DI PINGGIR SUNGAI (%)</th><td>" + feature.properties.TANPA_AKSES +
//                 "</td></tr>" + "</td></tr>" + "<table>";

//             layer.on({
//                 click: function (e) {
//                     $("#feature-title").html(feature.properties.KECAMATAN);
//                     $("#feature-info").html(content);
//                     $("#featureModal").modal("show");

//                 }
//             });
//         }


//         layer.on({
//             mouseover: function (e) {

//                 let layer = e.target;
//                 layer.setStyle({
//                     weight: 4,
//                     color: "#666",
//                     fillOpacity: 0.1,
//                     dashArray: '',
//                     opacity: 1
//                 });


//                 // if (!L.Browser.ie && !L.Browser.opera) {
//                 //     layer.bringToFront();
//                 // }

//                 infoChart.update(layer.feature.properties);
//             },
//             mouseout: function (e) {
//                 Kecamatan.resetStyle(e.target);
//                 infoChart.update();
//             }
//         });
//     }
// });
// $.getJSON("{{ asset('data/Kecamatan.geojson') }}", function (data) {
//     Kecamatan.addData(data);
// });

/*Septiktank Individual*/
let septiktank = L.geoJson(null, {
    style: function (feature) {
        return {
            color: "white",
            fillColor: "#03a82a",
            fillOpacity: 0.7,
            opacity: 0.5,
            width: 0.001,
            clickable: true,
            title: feature.properties.JENIS_SARANA,
            riseOnHover: true
        };
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties) {
            let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>JENIS SARANA</th><td>" + feature.properties.JENIS_SARANA + "<tr><th>KECAMATAN</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<tr><th>KELURAHAN</th><td>" + feature.properties.KELURAHAN + "</td></tr>" + "<tr><th>ALAMAT</th><td>" + feature.properties.ALAMAT + "</td></tr>" + "</td></tr>" + "<table>";
            layer.on({
                click: function (e) {
                    $("#feature-title").html(feature.properties.JENIS_SARANA);
                    $("#feature-info").html(content);
                    $("#featureModal").modal("show");

                }
            });
        }
        layer.on({
            mouseover: function (e) {
                let layer = e.target;
                layer.setStyle({
                    weight: 3,
                    color: "#00FFFF",
                    opacity: 1
                });
                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            },
            mouseout: function (e) {
                septiktank.resetStyle(e.target);
            }
        });
    }
});
$.getJSON("{{ asset('data/septiktank.geojson') }}", function (data) {
    septiktank.addData(data);
});


/*Jaringan Air Limbah */
let jaringanAirlimbah = L.geoJson(null, {
    style: function (feature) {
        return {
            //color: jalColors[feature.properties.KONDISI],
            color: "grey",
            weight: 1,
            opacity: 1
        };
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties) {
            let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>SUMBER DANA</th><td>" + feature.properties.SUMBER_DANA + "</td></tr>" + "<tr><th>JENIS</th><td>" + feature.properties.JENIS + "</td></tr>" + "<tr><th>Diameter (mm)</th><td>" + feature.properties.Diameter + "</td></tr>" + "<table>";
            layer.on({
                click: function (e) {
                    $("#feature-title").html(feature.properties.GID);
                    $("#feature-info").html(content);
                    $("#featureModal").modal("show");

                }
            });
        }
        layer.on({
            mouseover: function (e) {
                let layer = e.target;
                layer.setStyle({
                    weight: 3,
                    color: "#00FFFF",
                    opacity: 1
                });
                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            },
            mouseout: function (e) {
                jaringanAirlimbah.resetStyle(e.target);
            }
        });
    }
});
$.getJSON("{{ asset('data/jaringan_limbah.geojson') }}", function (data) {
    jaringanAirlimbah.addData(data);
});

/* Single marker cluster layer to hold all clusters */
let markerClusters = new L.MarkerClusterGroup({
    spiderfyOnMaxZoom: true,
    showCoverageOnHover: false,
    zoomToBoundsOnClick: true,
    disableClusteringAtZoom: 17
});

// /* Empty layer placeholder to add to layer control for listening when to add/remove mckplus to markerClusters layer */
// let mckplusLayer = L.geoJson(null);
// let mckplus = L.geoJson(null, {
//     pointToLayer: function (feature, latlng) {
//         return L.marker(latlng, {
//             icon: L.icon({
//                 iconUrl: "{{ asset('img/mckplus.png') }}",
//                 iconSize: [24, 28],
//                 iconAnchor: [12, 28],
//                 popupAnchor: [0, -25]
//             }),
//             title: feature.properties.JENIS_SARANA,
//             riseOnHover: true
//         });
//     },
//     onEachFeature: function (feature, layer) {
//         if (feature.properties) {
//             let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>JENIS SARANA</th><td>" + feature.properties.JENIS_SARANA + "<tr><th>KECAMATAN</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<tr><th>KELURAHAN</th><td>" + feature.properties.KELURAHAN + "</td></tr>" + "<tr><th>ALAMAT</th><td>" + feature.properties.ALAMAT + "</td></tr>" + "</td></tr>" + "<table>";
//             layer.on({
//                 click: function (e) {
//                     $("#feature-title").html(feature.properties.JENIS_SARANA);
//                     $("#feature-info").html(content);
//                     $("#featureModal").modal("show");
//                     highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
//                 }
//             });
//             $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="{{ asset('img/mckplus.png') }}"></td><td class="feature-name">' + layer.feature.properties.ALAMAT + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
//             mckplusSearch.push({
//                 name: layer.feature.properties.JENIS_SARANA,
//                 address: layer.feature.properties.ALAMAT,
//                 source: "mckplus",
//                 id: L.stamp(layer),
//                 lat: layer.feature.geometry.coordinates[1],
//                 lng: layer.feature.geometry.coordinates[0]
//             });
//         }
//     }
// });
// $.getJSON("{{ asset('data/mckplus.geojson') }}", function (data) {
//     mckplus.addData(data);
//     map.addLayer(mckplusLayer);
// });

// /* Empty layer placeholder to add to layer control for listening when to add/remove mckkomunal to markerClusters layer */
// let mckkomunalLayer = L.geoJson(null);
// let mckkomunal = L.geoJson(null, {
//     pointToLayer: function (feature, latlng) {
//         return L.marker(latlng, {
//             icon: L.icon({
//                 iconUrl: "{{ asset('img/mckkomunal.png') }}",
//                 iconSize: [24, 28],
//                 iconAnchor: [12, 28],
//                 popupAnchor: [0, -25]
//             }),
//             title: feature.properties.JENIS_SARANA,
//             riseOnHover: true
//         });
//     },
//     onEachFeature: function (feature, layer) {
//         if (feature.properties) {
//             let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>JENIS SARANA</th><td>" + feature.properties.JENIS_SARANA + "</td></tr>" + "<tr><th>KECAMATAN</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<tr><th>KELURAHAN</th><td>" + feature.properties.KELURAHAN + "</td></tr>" + "<tr><th>ALAMAT</th><td>" + feature.properties.ALAMAT + "</td></tr>" + "<table>";
//             layer.on({
//                 click: function (e) {
//                     $("#feature-title").html(feature.properties.JENIS_SARANA);
//                     $("#feature-info").html(content);
//                     $("#featureModal").modal("show");
//                     highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
//                 }
//             });
//             $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="{{ asset('img/mckkomunal.png') }}"></td><td class="feature-name">' + layer.feature.properties.ALAMAT + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
//             mckkomunalSearch.push({
//                 name: layer.feature.properties.JENIS_SARANA,
//                 address: layer.feature.properties.ALAMAT,
//                 source: "mckkomunal",
//                 id: L.stamp(layer),
//                 lat: layer.feature.geometry.coordinates[1],
//                 lng: layer.feature.geometry.coordinates[0]
//             });
//         }
//     }
// });
// $.getJSON("{{ asset('data/mckkomunal.geojson') }}", function (data) {
//     mckkomunal.addData(data);
// });


// /* Empty layer placeholder to add to layer control for listening when to add/remove ipalkomunal to markerClusters layer */
// let ipalkomunalLayer = L.geoJson(null);
// let ipalkomunal = L.geoJson(null, {
//     pointToLayer: function (feature, latlng) {
//         return L.marker(latlng, {
//             icon: L.icon({
//                 iconUrl: "{{ asset('img/ipalkomunal.png') }}",
//                 iconSize: [24, 28],
//                 iconAnchor: [12, 28],
//                 popupAnchor: [0, -25]
//             }),
//             title: feature.properties.JENIS_SARANA,
//             riseOnHover: true
//         });
//     },
//     onEachFeature: function (feature, layer) {
//         if (feature.properties) {
//             let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>JENIS SARANA</th><td>" + feature.properties.JENIS_SARANA + "</td></tr>" + "<tr><th>KECAMATAN</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<tr><th>KELURAHAN</th><td>" + feature.properties.KELURAHAN + "</td></tr>" + "<tr><th>ALAMAT</th><td>" + feature.properties.ALAMAT + "</td></tr>" + "<table>";
//             layer.on({
//                 click: function (e) {
//                     $("#feature-title").html(feature.properties.JENIS_SARANA);
//                     $("#feature-info").html(content);
//                     $("#featureModal").modal("show");
//                     highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
//                 }
//             });
//             $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="{{ asset('img/ipalkomunal.png') }}"></td><td class="feature-name">' + layer.feature.properties.ALAMAT + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
//             ipalkomunalSearch.push({
//                 name: layer.feature.properties.JENIS_SARANA,
//                 address: layer.feature.properties.ALAMAT,
//                 source: "ipalkomunal",
//                 id: L.stamp(layer),
//                 lat: layer.feature.geometry.coordinates[1],
//                 lng: layer.feature.geometry.coordinates[0]
//             });
//         }
//     }
// });
// $.getJSON("{{ asset('data/ipalkomunal.geojson') }}", function (data) {
//     ipalkomunal.addData(data);
// });

// /* Empty layer placeholder to add to layer control for listening when to add/remove mck umum to markerClusters layer */
// let mckumumLayer = L.geoJson(null);
// let mckumum = L.geoJson(null, {
//     pointToLayer: function (feature, latlng) {
//         return L.marker(latlng, {
//             icon: L.icon({
//                 iconUrl: "{{ asset('img/mckumum.png') }}",
//                 iconSize: [24, 28],
//                 iconAnchor: [12, 28],
//                 popupAnchor: [0, -25]
//             }),
//             title: feature.properties.JENIS_SARANA,
//             riseOnHover: true
//         });
//     },
//     onEachFeature: function (feature, layer) {
//         if (feature.properties) {
//             let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>JENIS SARANA</th><td>" + feature.properties.JENIS_SARANA + "</td></tr>" + "<tr><th>KECAMATAN</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<tr><th>KELURAHAN</th><td>" + feature.properties.KELURAHAN + "</td></tr>" + "<tr><th>ALAMAT</th><td>" + feature.properties.ALAMAT + "</td></tr>" + "<table>";
//             layer.on({
//                 click: function (e) {
//                     $("#feature-title").html(feature.properties.JENIS_SARANA);
//                     $("#feature-info").html(content);
//                     $("#featureModal").modal("show");
//                     highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
//                 }
//             });
//             $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="{{ asset('img/mckumum.png') }}"></td><td class="feature-name">' + layer.feature.properties.ALAMAT + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
//             mckumumSearch.push({
//                 name: layer.feature.properties.JENIS_SARANA,
//                 address: layer.feature.properties.ALAMAT,
//                 source: "mckumum",
//                 id: L.stamp(layer),
//                 lat: layer.feature.geometry.coordinates[1],
//                 lng: layer.feature.geometry.coordinates[0]
//             });
//         }
//     }
// });
// $.getJSON("{{ asset('data/mckumum.geojson') }}", function (data) {
//     mckumum.addData(data);
// });


// /* Empty layer placeholder to add to layer control for listening when to add/remove KOTAKU to markerClusters layer */
// let septikkomunalLayer = L.geoJson(null);
// let septikkomunal = L.geoJson(null, {
//     pointToLayer: function (feature, latlng) {
//         return L.marker(latlng, {
//             icon: L.icon({
//                 iconUrl: "{{ asset('img/septictank.png') }}",
//                 iconSize: [24, 28],
//                 iconAnchor: [12, 28],
//                 popupAnchor: [0, -25]
//             }),
//             title: feature.properties.JENIS_SARANA,
//             riseOnHover: true
//         });
//     },
//     onEachFeature: function (feature, layer) {
//         if (feature.properties) {
//             let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>NAMA KSM</th><td>" + feature.properties.NAMA_KSM + "<tr><th>KECAMATAN</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<tr><th>KELURAHAN</th><td>" + feature.properties.KELURAHAN + "</td></tr>" + "<tr><th>TAHUN</th><td>" + feature.properties.Tahun + "</td></tr>" + "<tr><th>SUMBER DATA</th><td>" + feature.properties.SUMBER + "</td></tr>" + "</td></tr>" + "<table>";
//             layer.on({
//                 click: function (e) {
//                     $("#feature-title").html(feature.properties.JENIS_SARANA);
//                     $("#feature-info").html(content);
//                     $("#featureModal").modal("show");
//                     highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
//                 }
//             });
//             $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="{{ asset('img/septictank.png') }}"></td><td class="feature-name">' + layer.feature.properties.NAMA_KSM + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
//             septikkomunalSearch.push({
//                 name: layer.feature.properties.JENIS_SARANA,
//                 address: layer.feature.properties.KELURAHAN,
//                 source: "septikkomunal",
//                 id: L.stamp(layer),
//                 lat: layer.feature.geometry.coordinates[1],
//                 lng: layer.feature.geometry.coordinates[0]
//             });

//         }
//     }
// });
// $.getJSON("{{ asset('data/kotaku.geojson') }}", function (data) {
//     septikkomunal.addData(data);
// });

// /* Empty layer placeholder*/
// let ipalLayer = L.geoJson(null);
// let ipal = L.geoJson(null, {
//     pointToLayer: function (feature, latlng) {
//         return L.marker(latlng, {
//             icon: L.icon({
//                 iconUrl: "{{ asset('img/pdpal.png') }}",
//                 iconSize: [32, 37],
//                 iconAnchor: [12, 28],
//                 popupAnchor: [0, -25]
//             }),
//             title: feature.properties.NAMA + " (PDPAL)",
//             riseOnHover: true
//         });
//     },
//     onEachFeature: function (feature, layer) {
//         if (feature.properties) {
//             let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>NAMA</th><td>" + feature.properties.NAMA + "<tr><th>ALAMAT</th><td>" + feature.properties.ALAMAT + "</td></tr>" + "<tr><th>KAPASITAS</th><td>" + feature.properties.KAPASITAS + "</td></tr>" + "<tr><th>TAHUN OPERASI</th><td>" + feature.properties.TAHUN + "</td></tr>" + "</td></tr>" + "<table>";
//             layer.on({
//                 click: function (e) {
//                     $("#feature-title").html(feature.properties.NAMA);
//                     $("#feature-info").html(content);
//                     $("#featureModal").modal("show");
//                     highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
//                 }
//             });

//         }
//     }
// });
// $.getJSON("{{ asset('data/PDPAL_PT.geojson') }}", function (data) {
//     ipal.addData(data);
// });



map = L.map(document.getElementById('map'), {
    zoom: 12,
    center: [-3.314771, 114.6185566],
    layers: [mapboxDark,
    @foreach ($kecamatan as $data)
        $data{{ $data->id}},
    @endforeach
    markerClusters, highlight],
    zoomControl: false,
    fullscreenControl: false
});


// /* Layer control listeners that allow for a single markerClusters layer */
// map.on("overlayadd", function (e) {
//     if (e.layer === mckplusLayer) {
//         markerClusters.addLayer(mckplus);
//         syncSidebar();
//     }
//     if (e.layer === mckkomunalLayer) {
//         markerClusters.addLayer(mckkomunal);
//         syncSidebar();
//     }
//     if (e.layer === ipalkomunalLayer) {
//         markerClusters.addLayer(ipalkomunal);
//         syncSidebar();
//     }
//     if (e.layer === mckumumLayer) {
//         markerClusters.addLayer(mckumum);
//         syncSidebar();
//     }
//     if (e.layer === septikkomunalLayer) {
//         markerClusters.addLayer(septikkomunal);
//         syncSidebar();
//     }
//     if (e.layer === ipalLayer) {
//         map.addLayer(ipal);

//     }
// });

// map.on("overlayremove", function (e) {
//     if (e.layer === mckplusLayer) {
//         markerClusters.removeLayer(mckplus);
//         syncSidebar();
//     }
//     if (e.layer === mckkomunalLayer) {
//         markerClusters.removeLayer(mckkomunal);
//         syncSidebar();
//     }
//     if (e.layer === ipalkomunalLayer) {
//         markerClusters.removeLayer(ipalkomunal);
//         syncSidebar();
//     }
//     if (e.layer === mckumumLayer) {
//         markerClusters.removeLayer(mckumum);
//         syncSidebar();
//     }
//     if (e.layer === septikkomunalLayer) {
//         markerClusters.removeLayer(septikkomunal);
//         syncSidebar();
//     }
//     if (e.layer === ipalLayer) {
//         map.removeLayer(ipal);

//     }
// });

// /* Filter sidebar feature list to only show features in current map bounds */
// map.on("moveend", function (e) {
//     syncSidebar();
// });

/* Clear feature highlight when map is clicked */
map.on("click", function (e) {
    highlight.clearLayers();
});


let onClicked = function (e) {
    map.off('contextmenu', onClicked); //turn off listener for map click
    currentMarker = L.marker(e.latlng, {
        icon: L.icon({
            iconUrl: "{{ asset('img/mckplus.png') }}",
            iconAnchor: [12, 28],
            popupAnchor: [0, -25]
        })
    }).addTo(map).bindPopup('Koordinat titik ini di ' + '<br>Lattitude : ' + e.latlng.lat.toString() +
        '<br>' + 'Longitude : ' + e.latlng.lng.toString());
};
map.on('contextmenu', onClicked);
map.on('contextmenu', function () {
    map.removeLayer(currentMarker);
    map.on('contextmenu', onClicked);
});




/*load wms form geoserver
const mywms = L.tileLayer.wms("http://geoservice.kalselprov.go.id:8080/geoserver/DPUPR/wms", {
  layers: 'FUNGSI_JALAN_KOTA_BANJARMASIN_LN_10K',
  format: 'image/png',
  transparent: true,
  version: '1.1.0'

});*/

// if (L.Browser.touch) {
//     L.control.touchHover().addTo(map);
// }

// L.Path.CLIP_PADDING = 0.12;


// /*Angka Kepadatan Penduduk*/
// let info = L.control({
//     position: "bottomleft"
// });

// info.onAdd = function (map) {
//     this._div = L.DomUtil.create('divPadat', 'info');
//     this.update();
//     return this._div;
// };

// info.update = function (props) {
//     this._div.innerHTML = (props ?
//         '<b>' + props.KELURAHAN + '</b><br />' + props.KEPADATAN + ' jiwa / Km<sup>2</sup>' :
//         '<h6>Gerakkan Mouse Anda di atas layer</h6>');
// };

// // Add and remove info from layers
// map.on('overlayadd', function (eventLayer) {
//     if (eventLayer.name === "Kepadatan Penduduk") {
//         info.addTo(this);
//     }
// });

// map.on('overlayremove', function (eventLayer) {
//     if (eventLayer.name === "Kepadatan Penduduk") {
//         this.removeControl(info);
//     }
// });


// //Dashboard Kecamatan
// let infoChart = L.control({
//     position: "topleft"
// });

// infoChart.onAdd = function (map) {
//     this._div = L.DomUtil.create('divKec', 'info');
//     this.update();
//     return this._div;
// };

// infoChart.update = function (kec) {
//     this._div.innerHTML = (kec ?
//         '<div id="chartContainer"></div>' + '<b>' + kec.KECAMATAN + '</b>' + '<br>' + 'Tanpa Akses (%) :' + kec.TANPA_AKSES + '<br>' + 'Akses Dasar (%) : ' + kec.AKSES_DASAR + '<br>' + 'Akses Aman (%) : ' + kec.AKSES_AMAN + '<br>' :
//         '<h6>Gerakkan Mouse di atas layer</h6>');
// };


// // Add and remove info from layers
// map.on('overlayadd', function (eventLayer) {
//     if (eventLayer.name === "Kecamatan") {
//         infoChart.addTo(this);

//     }
// });

// map.on('overlayremove', function (eventLayer) {
//     if (eventLayer.name === "Kecamatan") {
//         this.removeControl(infoChart);
//     }
// });




// //Legenda Kecamatan//

// let kecLegend = L.control({
//     name: 'kecLegend',
//     position: 'bottomleft'
// });



// kecLegend.onAdd = function (map) {
//     let divKec = L.DomUtil.create("divKec", "info legend");
//     divKec.innerHTML += "<h5><b>Legenda :</b> Kecamatan</h5>";
//     divKec.innerHTML += '<i style="background: #ffb400"></i><span>Banjarmasin Barat</span><br>';
//     divKec.innerHTML += '<i style="background: #70a1d7"></i><span>Banjarmasin Selatan</span><br>';
//     divKec.innerHTML += '<i style="background: #a1de93"></i><span>Banjarmasin Tengah</span><br>';
//     divKec.innerHTML += '<i style="background: #f47c7c"></i><span>Banjarmasin Timur</span><br>';
//     divKec.innerHTML += '<i style="background: #f7f48b"></i><span>Banjarmasin Utara</span><br>';

//     return divKec;
// };

// // Add and remove legend from layers
// map.on('overlayadd', function (eventLayer) {
//     // Switch to the legend...
//     if (eventLayer.name === "Kecamatan") {
//         kecLegend.addTo(this);
//         this.removeControl(legend);
//         this.removeControl(info);


//     }
// });

// map.on('overlayremove', function (eventLayer) {
//     // Switch to the legend...
//     if (eventLayer.name === "Kecamatan") {
//         this.removeControl(kecLegend);
//     }
// });


// //Legenda Kerawanan Air Limbah//

// let rawanLegend = L.control({
//     name: 'rawanLegend',
//     position: 'bottomleft'
// });



// rawanLegend.onAdd = function (map) {
//     let div = L.DomUtil.create("div", "info legend");
//     div.innerHTML += "<h6><b>Area Risiko Air Limbah</b></h6>";
//     div.innerHTML += '<i style="background: #319df5"></i><span>Risiko Rendah</span><br>';
//     div.innerHTML += '<i style="background: #89fc3d"></i><span>Risiko Sedang</span><br>';
//     div.innerHTML += '<i style="background: #fcf912"></i><span>Risiko Tinggi</span><br>';
//     div.innerHTML += '<i style="background: #fc0314"></i><span>Risiko Sangat Tinggi</span><br>';

//     return div;
// };

// // Add and remove legend from layers
// map.on('overlayadd', function (eventLayer) {
//     // Switch to the legend...
//     if (eventLayer.name === "Risiko Air Limbah Domestik") {
//         rawanLegend.addTo(map);

//     }
// });

// map.on('overlayremove', function (eventLayer) {
//     // Switch to the legend...
//     if (eventLayer.name === "Risiko Air Limbah Domestik") {
//         this.removeControl(rawanLegend);
//     }
// });

// //Legenda Kepadatan Penduduk//

// let legend = L.control({
//     position: 'bottomleft'
// });



// legend.onAdd = function (map) {
//     let title = '<h6>Kepadatan Penduduk (jiwa/km<sup>2</sup>) </h6>';
//     let divPadat = L.DomUtil.create('divPadat', 'info legend'),
//         grades = [0, 15000, 20000, 40000],
//         labels = [],
//         from, to;

//     for (let i = 0; i < grades.length; i++) {
//         from = grades[i];
//         to = grades[i + 1];


//         labels.push(
//             '<i style="background:' + getColor(from + 1) + '"></i> ' +
//             from + (to ? '&ndash;' + to : '+'));
//     }

//     divPadat.innerHTML = title + [labels.join('<br>')];
//     return divPadat;
// };


// // Add and remove legend from layers
// map.on('overlayadd', function (eventLayer) {
//     // Switch to the legend...
//     if (eventLayer.name === "Kepadatan Penduduk") {
//         legend.addTo(this);
//         this.removeControl(kecLegend);
//         this.removeControl(infoChart);

//     }
// });

// map.on('overlayremove', function (eventLayer) {
//     // Switch to the legend...
//     if (eventLayer.name === "Kepadatan Penduduk") {
//         this.removeControl(legend);
//     }
// });


// /* Larger screens get expanded layer control and visible sidebar */
// if (document.body.clientWidth <= 1367) {
//     var isCollapsed = true;
// } else {
//     var isCollapsed = false;
// }


let baseLayers = {
    "Grayscale": cartoLight,
    "Satellite": mapboxImagery,
    "Google Satellite": googleSatellite,
    "Streets": mapboxStreet,
    "Outdoor": mapboxOutdoor,
    "Dark": mapboxDark,
    "Google Maps": googleMaps,
    "RBI": rbi,
};


L.control.groupedLayers(baseLayers).addTo(map);
// let groupedOverlays = {
//     "TEMATIK": {
//         "Deliniasi Kumuh 2015": kumuh,
//         "Kepadatan Penduduk": dataKepadatan,
//         "Risiko Air Limbah Domestik": Kerawanan
//     },

//     "JENIS SARANA": {
//         // "<img src='{{ asset('img/green.png') }}' width='24' height='24'>&nbsp;Septiktank Individual": septiktank,
//         // "<img src='{{ asset('img/mckplus.png') }}' width='24' height='24'>&nbsp;MCK Plus": mckplusLayer,
//         // "<img src='{{ asset('img/mckkomunal.png') }}' width='24' height='24'>&nbsp;MCK Komunal": mckkomunalLayer,
//         // "<img src='{{ asset('img/mckumum.png') }}' width='24' height='24'>&nbsp;MCK Umum": mckumumLayer,
//         // "<img src='{{ asset('img/ipalkomunal.png') }}' width='24' height='24'>&nbsp;IPAL Komunal": ipalkomunalLayer,
//         // "<img src='{{ asset('img/pdpal.png') }}' width='24' height='24'>&nbsp;IPAL (PDPAL)": ipalLayer,
//         // "<img src='{{ asset('img/septictank.png') }}' width='24' height='24'>&nbsp;Septiktank Komunal (KOTAKU)": septikkomunalLayer
//     },

    
//     "UTILITAS KOTA & BATAS ADMINISTRASI": {
//         "Kecamatan": Kecamatan,
//         "Kelurahan": Kelurahan,
//         /*"Jalan": mywms,*/
//         "Jaringan Pipa Air Limbah": jaringanAirlimbah
//     }
// };

// var options = {
//   // Make the "Tematik" group exclusive (use radio inputs)
//   exclusiveGroups: ["UTILITAS KOTA & BATAS ADMINISTRASI"],
//    // Show a checkbox next to non-exclusive group labels for toggling all
//    groupCheckboxes: true
// };

    let baseTree = {
        label: '<b>{{ trans('cruds.maps.thematic') }}</b>',
        children: [
            {label: '&nbsp;Normal', layer: normal},
            {label: '&nbsp;{{ trans('cruds.maps.slum') }}', layer: kumuh},
            {label: '&nbsp;{{ trans('cruds.maps.risk') }}', layer: Kerawanan},
            {label: '&nbsp;{{ trans('cruds.maps.density') }}', layer: dataKepadatan},
        ]
    };

    

        var hasAllUnSelected = function() {
            return function(ev, domNode, treeNode, map) {
                var anySelected = false;
                function iterate(node)
                {
                    if (node.layer && !node.radioGroup) {
                        anySelected = anySelected || map.hasLayer(node.layer);
                    }
                    if (node.children && !anySelected) {
                        node.children.forEach(function(element) { iterate(element); });
                    }
                }
                iterate(treeNode);
                return !anySelected;
            };
        };

        let overlayTree = {
            label: '<b>LAYER</b>',
            children : [
                {label: '<b>{{ trans('cruds.maps.utility') }}</b>',
                selectAllCheckbox: true,
                children: [
                    {label: 'KECAMATAN',
                        selectAllCheckbox: true,
                        children: [
                            @foreach ($kecamatan as $data)
                            {label: '{{ $data->name }}' , layer: data{{$data->id }},
                            @endforeach
                        ]
                    },
                    {label: 'KELURAHAN',
                        selectAllCheckbox: true,
                        children: [
                            {label: '<b>ALICANTE - ALC</b>', layer: L.marker([38.282000, -0.558000])},
                            {label: '&nbsp;<img src="{{ asset('img/mckumum.png') }}" width="24" height="24">&nbsp;ALMERIA - LEI', layer: L.marker([36.844000, -2.370000])},
                            {label: 'AVILES - OVD', layer: L.marker([43.563000, -6.034000])},
                            {label: 'BADAJOZ - BJZ', layer: L.marker([38.891000, -6.821000])},
                            {label: 'BARCELONA - BCN', layer: L.marker([41.297000, 2.078000])},
                        ]
                    },
                    {label: '&nbsp;{{ trans('cruds.maps.pipe') }}', layer: jaringanAirlimbah},
                ]},
                {label: '<b>{{ trans('cruds.maps.asset') }}</b>',
                    selectAllCheckbox: true,
                    children: [
                        {label: "<img src='{{ asset('img/mckplus.png') }}' width='24' height='24'>&nbsp;MCK Plus", layer: Kecamatan},
                        {label: "<img src='{{ asset('img/mckkomunal.png') }}' width='24' height='24'>&nbsp;MCK Komunal", layer: Kecamatan},
                        {label: "<img src='{{ asset('img/mckumum.png') }}' width='24' height='24'>&nbsp;MCK Umum", layer: Kecamatan},
                        {label: "<img src='{{ asset('img/ipalkomunal.png') }}' width='24' height='24'>&nbsp;IPAL Komunal", layer: Kecamatan},
                        {label: "<img src='{{ asset('img/pdpal.png') }}' width='24' height='24'>&nbsp;IPAL (PERUMDA PALD)", layer: Kecamatan},
                        {label: "<img src='{{ asset('img/green.png') }}' width='24' height='24'>&nbsp;Tangki Septik Individual", layer: Kecamatan},
                        {label: "<img src='{{ asset('img/septictank.png') }}' width='24' height='24'>&nbsp;Tangki Septik (KOTAKU)", layer: Kecamatan},                   
                    ]
                }]
            };

        /* ends*/

        let ctl = L.control.layers.tree(baseTree,
                {
                    // namedToggle: true,
                    // collapseAll: 'Collapse all',
                    // expandAll: 'Expand all',
                    collapsed: false,
                });

        ctl.addTo(map).collapseTree().expandSelected();

        ctl.setOverlayTree(overlayTree,).collapseTree(true).expandSelected(true);

        // var building = {
        //     label: '<b>DATA SARANA</b>',
        //     selectAllCheckbox: true,
        //     children: [
        //         /* start aiports from http://www.partow.net/miscellaneous/airportdatabase/#Download */
        //         {label: 'KECAMATAN',
        //             selectAllCheckbox: true,
        //             children: [
        //                 {label: 'AACHEN - AAH', layer: L.marker([50.823000, 6.187000])},
                    
        //             ]
        //         },
        //         {label: 'KELURAHAN',
        //             selectAllCheckbox: true,
        //             children: [
        //                 {label: '<b>ALICANTE - ALC</b>', layer: L.marker([38.282000, -0.558000])},
        //                 {label: '&nbsp;<img src="{{ asset('img/mckumum.png') }}" width="24" height="24">&nbsp;ALMERIA - LEI', layer: L.marker([36.844000, -2.370000])},
        //                 {label: 'AVILES - OVD', layer: L.marker([43.563000, -6.034000])},
        //                 {label: 'BADAJOZ - BJZ', layer: L.marker([38.891000, -6.821000])},
        //                 {label: 'BARCELONA - BCN', layer: L.marker([41.297000, 2.078000])},
        //             ]
        //         },
        //         {label: '&nbsp;JARINGAN PIPA AIR LIMBAH DOMESTIK', layer: jaringanAirlimbah},
        //     ]
        // };
        /* ends data sarana */




// /* Highlight search box text on click */
// $("#searchbox").click(function () {
//     $(this).select();
// });

// /* Prevent hitting enter from refreshing the page */
// $("#searchbox").keypress(function (e) {
//     if (e.which == 13) {
//         e.preventDefault();
//     }
// });

// $("#featureModal").on("hidden.bs.modal", function (e) {
//     $(document).on("mouseout", ".feature-row", clearHighlight);
// });

// /* Typeahead search functionality */
// $(document).one("ajaxStop", function () {
//     $("#loading").hide();
//     sizeLayerControl();
//     /* Fit map to Kelurahan bounds */
//     map.fitBounds(Kelurahan.getBounds());
//     featureList = new List("features", {
//         valueNames: ["feature-name"]
//     });
//     featureList.sort("feature-name", {
//         order: "asc"
//     });

//     let KelurahanBH = new Bloodhound({
//         name: "Kelurahan",
//         datumTokenizer: function (d) {
//             return Bloodhound.tokenizers.whitespace(d.name);
//         },
//         queryTokenizer: Bloodhound.tokenizers.whitespace,
//         local: KelurahanSearch,
//         limit: 10
//     });

//     let KecamatanBH = new Bloodhound({
//         name: "Kecamatan",
//         datumTokenizer: function (d) {
//             return Bloodhound.tokenizers.whitespace(d.name);
//         },
//         queryTokenizer: Bloodhound.tokenizers.whitespace,
//         local: KecamatanSearch,
//         limit: 5
//     });

//     let septiktankBH = new Bloodhound({
//         name: "Septiktank Individual",
//         datumTokenizer: function (d) {
//             return Bloodhound.tokenizers.whitespace(d.name);
//         },
//         queryTokenizer: Bloodhound.tokenizers.whitespace,
//         local: septiktankSearch,
//         limit: 10
//     });

//     let mckplusBH = new Bloodhound({
//         name: "MCK Plus",
//         datumTokenizer: function (d) {
//             return Bloodhound.tokenizers.whitespace(d.name);
//         },
//         queryTokenizer: Bloodhound.tokenizers.whitespace,
//         local: mckplusSearch,
//         limit: 10
//     });

//     let mckkomunalBH = new Bloodhound({
//         name: "MCK Komunal",
//         datumTokenizer: function (d) {
//             return Bloodhound.tokenizers.whitespace(d.name);
//         },
//         queryTokenizer: Bloodhound.tokenizers.whitespace,
//         local: mckkomunalSearch,
//         limit: 10
//     });

//     let ipalkomunalBH = new Bloodhound({
//         name: "IPAL Komunal",
//         datumTokenizer: function (d) {
//             return Bloodhound.tokenizers.whitespace(d.name);
//         },
//         queryTokenizer: Bloodhound.tokenizers.whitespace,
//         local: ipalkomunalSearch,
//         limit: 10
//     });

//     let mckumumBH = new Bloodhound({
//         name: "MCK Umum",
//         datumTokenizer: function (d) {
//             return Bloodhound.tokenizers.whitespace(d.name);
//         },
//         queryTokenizer: Bloodhound.tokenizers.whitespace,
//         local: mckumumSearch,
//         limit: 10
//     });

//     let septikkomunalBH = new Bloodhound({
//         name: "Septiktank Komunal (KOTAKU)",
//         datumTokenizer: function (d) {
//             return Bloodhound.tokenizers.whitespace(d.name);
//         },
//         queryTokenizer: Bloodhound.tokenizers.whitespace,
//         local: septikkomunalSearch,
//         limit: 100
//     });

//     KelurahanBH.initialize();
//     KecamatanBH.initialize();
//     septiktankBH.initialize();
//     mckplusBH.initialize();
//     mckkomunalBH.initialize();
//     ipalkomunalBH.initialize();
//     mckumumBH.initialize();
//     septikkomunalBH.initialize();

//     /* instantiate the typeahead UI */
//     $("#searchbox").typeahead({
//         minLength: 3,
//         highlight: true,
//         hint: false
//     }, {
//         name: "Kecamatan",
//         displayKey: "name",
//         source: KecamatanBH.ttAdapter(),
//         templates: {
//             header: "<h4 class='typeahead-header'>Kecamatan di Banjarmasin</h4>"
//         }
//     }, {
//         name: "Kelurahan",
//         displayKey: "name",
//         source: KelurahanBH.ttAdapter(),
//         templates: {
//             header: "<h4 class='typeahead-header'>Kelurahan di Banjarmasin</h4>"
//         }
//     }, {
//         name: "Septiktank",
//         displayKey: "name",
//         source: septiktankBH.ttAdapter(),
//         templates: {
//             header: "<h4 class='typeahead-header'>Septiktank Individual</h4>"
//         }
//     }, {
//         name: "mck_plus",
//         displayKey: "name",
//         source: mckplusBH.ttAdapter(),
//         templates: {
//             header: "<h4 class='typeahead-header'><img src='{{ asset('img/mckplus.png') }} width='24' height='28'>&nbsp;MCK Plus</h4>",
            
//         }
//     }, {
//         name: "mck_komunal",
//         displayKey: "name",
//         source: mckkomunalBH.ttAdapter(),
//         templates: {
//             header: "<h4 class='typeahead-header'><img src='{{ asset('img/mckkomunal.png') }} width='24' height='28'>&nbsp;MCK Komunal</h4>",
            
//         }
//     }, {

//         name: "mck_umum",
//         displayKey: "name",
//         source: mckumumBH.ttAdapter(),
//         templates: {
//             header: "<h4 class='typeahead-header'><img src='{{ asset('img/mckumum.png') }} width='24' height='28'>&nbsp;MCK Umum</h4>",
            
//         }
//     }, {

//         name: "ipal_komunal",
//         displayKey: "name",
//         source: ipalkomunalBH.ttAdapter(),
//         templates: {
//             header: "<h4 class='typeahead-header'><img src='{{ asset('img/ipalkomunal.png') }} width='24' height='28'>&nbsp;IPAL Komunal</h4>",
            
//         }
//     }, {

//         name: "septiktank_komunal",
//         displayKey: "name",
//         source: septikkomunalBH.ttAdapter(),
//         templates: {
//             header: "<h4 class='typeahead-header'><img src='{{ asset('img/septictank.png') }} width='24' height='28'>&nbsp;Sarana dari KOTAKU</h4>",
            
//         }

//     }).on("typeahead:selected", function (obj, datum) {
//         if (datum.source === "Kecamatan") {
//             map.fitBounds(datum.bounds);
//         }
//         if (datum.source === "Kelurahan") {
//             map.fitBounds(datum.bounds);
//         }
//         if (datum.source === "septiktank") {
//             map.fitBounds(datum.bounds);
//         }
//         if (datum.source === "mckplus") {
//             if (!map.hasLayer(mckplusLayer)) {
//                 map.addLayer(mckplusLayer);
//             }
//             map.setView([datum.lat, datum.lng], 17);
//             if (map._layers[datum.id]) {
//                 map._layers[datum.id].fire("click");
//             }
//         }
//         if (datum.source === "mckkomunal") {
//             if (!map.hasLayer(mckkomunalLayer)) {
//                 map.addLayer(mckkomunalLayer);
//             }
//             map.setView([datum.lat, datum.lng], 17);
//             if (map._layers[datum.id]) {
//                 map._layers[datum.id].fire("click");
//             }
//         }
//         if (datum.source === "mckumum") {
//             if (!map.hasLayer(mckumumLayer)) {
//                 map.addLayer(mckumumLayer);
//             }
//             map.setView([datum.lat, datum.lng], 17);
//             if (map._layers[datum.id]) {
//                 map._layers[datum.id].fire("click");
//             }
//         }
//         if (datum.source === "ipalkomunal") {
//             if (!map.hasLayer(ipalkomunalLayer)) {
//                 map.addLayer(ipalkomunalLayer);
//             }
//             map.setView([datum.lat, datum.lng], 17);
//             if (map._layers[datum.id]) {
//                 map._layers[datum.id].fire("click");
//             }
//         }
//         if (datum.source === "septikkomunal") {
//             if (!map.hasLayer(septikkomunalLayer)) {
//                 map.addLayer(septikkomunalLayer);
//             }
//             map.setView([datum.lat, datum.lng], 17);
//             if (map._layers[datum.id]) {
//                 map._layers[datum.id].fire("click");
//             }
//         }

//         if ($(".navbar-collapse").height() > 50) {
//             $(".navbar-collapse").collapse("hide");
//         }
//     }).on("typeahead:opened", function () {
//         $(".navbar-collapse.in").css("max-height", $(document).height() - $(".navbar-header").height());
//         $(".navbar-collapse.in").css("height", $(document).height() - $(".navbar-header").height());
//     }).on("typeahead:closed", function () {
//         $(".navbar-collapse.in").css("max-height", "");
//         $(".navbar-collapse.in").css("height", "");
//     });
//     $(".twitter-typeahead").css("position", "static");
//     $(".twitter-typeahead").css("display", "block");
// });

// // Leaflet patch to make layer control scrollable on touch browsers
// let container = $(".leaflet-control-layers")[0];
// if (!L.Browser.touch) {
//     L.DomEvent
//         .disableClickPropagation(container)
//         .disableScrollPropagation(container);
//     } else {
//         L.DomEvent.disableClickPropagation(container);
//     }

    /*Scale Map*/
    let scaleControl = L.control.scale({imperial: false}).addTo(map);

    let mousePosition = L.control.mousePosition().addTo(map);

    /*Fullscreen Control*/
    let fullscreenControl = L.control.fullscreen({
        position: "bottomright"
    }).addTo(map);

    /* GPS enabled geolocation control set to follow the user's location */
    let locateControl = L.control.locate({
        position: "bottomright",
        drawCircle: true,
        follow: true,
        setView: true,
        keepCurrentZoomLevel: true,
        markerStyle: {
            weight: 1,
            opacity: 0.8,
            fillOpacity: 0.8
        },
        circleStyle: {
            weight: 1,
            clickable: false
        },
        icon: "fa fa-location-arrow",
        metric: true,
        strings: {
            title: "{{ trans('global.location') }}",
            popup: "{{ trans('global.accuration') }}  {distance} {unit}  {{ trans('global.from_this_point') }}",
            outsideMapBoundsMsg: "{{ trans('global.outside_map') }}"
        },
        locateOptions: {
            maxZoom: 18,
            watch: true,
            enableHighAccuracy: true,
            maximumAge: 10000,
            timeout: 10000
        }
    }).addTo(map);

    /*Zoom Extends*/

    L.easyButton('fa-expand-arrows-alt', function(){
            map.setView([-3.314771, 114.6185566], 12);
        }).addTo(map);

    /*Leaflet Measure*/

    function writeResults(results) {
    document.getElementById('eventoutput').innerHTML = JSON.stringify(
        {
        area: results.area,
        areaDisplay: results.areaDisplay,
        lastCoord: results.lastCoord,
        length: results.length,
        lengthDisplay: results.lengthDisplay,
        pointCount: results.pointCount,
        points: results.points
        },
        null,
        2
    );
    }

        let measureControl = new L.Control.Measure({
        position: 'topleft',
        primaryLengthUnit: 'kilometers',
        secondaryLengthUnit: 'meters',
        primaryAreaUnit: 'hectares',
        secondaryAreaUnit: 'sqmeters',
        activeColor:"#4fd65a",
        completedColor:"#5cf79a",
        decPoint: ',',
        thousandsSep: '.'});
        measureControl.addTo(map);

</script>