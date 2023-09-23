/* Initial Map */
let map;


map = L.map(document.getElementById('map'), {
  zoom: 13,
  layers: [googleSatellite],
  center: [-3.314771,114.6185566],
  fullscreenControl: false
});

/*Fullscreen Control*/
let fullscreenControl = L.control.fullscreen({
  position: "topleft"
}).addTo(map);

function zoomToFeature(e) {
  map.fitBounds(e.target.getBounds());
}


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
      let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>KRITERIA KUMUH</th><td>" + feature.properties.KRITERIA_KUMUH + "<tr><th>LUASAN KUMUH (M<SUP>2</SUP>)</th><td>" + feature.properties.LUAS + "</td></tr>" + "<tr><th>KELURAHAN</th><td>" + feature.properties.KELURAHAN + "</td></tr>" + "<tr><th>RT</th><td>" + feature.properties.RT+ "</td></tr>" +  "</td></tr>" + "<table>";
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
$.getJSON("data/kumuh.geojson", function (data) {
  kumuh.addData(data);
});

//2022

let newkumuh = L.geoJson(null, {
  style: function (feature) {
    return {
      color: "grey",
      fillColor: "#FF8916",
      fillOpacity: 0.6,
      opacity: 0.5,
      width: 0.001,
      clickable: true,
      title: feature.properties.RK,
      riseOnHover: true
    };
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      let content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>PRIORITAS</th><td>" + feature.properties.PENANGANAN + "<tr><th>LUASAN KUMUH (Ha)</th><td>" + feature.properties.LUAS_KUMUH +"<tr><th>NILAI KEKUMUHAN</th><td>" + feature.properties.NILAI_KEKUMUHAN + "</td></tr>" + "<tr><th>TINGKAT PERTIMBANGAN LAIN</th><td>" + feature.properties.PERTIMBANGAN_LAIN + "<tr><th>KEPADATAN PENDUDUK (Jiwa/Ha)</th><td>" + feature.properties.KEPADATAN + "</td></tr>" + "<tr><th>TIPOLOGI</th><td>" + feature.properties.TIPOLOGI+ "</td></tr>" + "<tr><th>KELURAHAN</th><td>" + feature.properties.KELURAHAN + "</td></tr>" + "<tr><th>RT/RW</th><td>" + feature.properties.RT_RW+ "</td></tr>" +  "</td></tr>" + "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.RK);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");

        }
      });
    }
    layer.on({
      mouseover: function (e) {
        let layerkumuh = e.target;
        layerkumuh.setStyle({
          weight: 3,
          color: "#00FFFF",
          opacity: 1
        });
        if (!L.Browser.ie && !L.Browser.opera) {
          layerkumuh.bringToFront();
        }
      },
      mouseout: function (e) {
        newkumuh.resetStyle(e.target);
      },
      click: zoomToFeature
    });
  }
});
$.getJSON("data/kumuh2022.geojson", function (data) {
  newkumuh.addData(data);
});

let Kelurahan = L.geoJson(null, {
  style: function (feature) {
    return {
      color: "#c92750",
      fill: true,
      fillOpacity: 0,
      opacity: 0.6,
      width: 0.01,
      clickable: true,
    };
  },
  onEachFeature: function (feature, layer) {
    layer.bindPopup(feature.properties.KELURAHAN + "<a target='_blank' href='http://103.12.84.58/slum/profil16p/umum/info?kd_prop=63&kd_kota=6371&kd_kel=" + feature.properties.KODE_KOTAKU + "'>" + "<br>Lihat Profil</a>", layer.bindTooltip(feature.properties.KELURAHAN, 
    {permanent: true, direction:"center", className:"no-background"}
   )).openTooltip()
    
  }
});
$.getJSON("data/kelurahan.geojson", function (data) {
  Kelurahan.addData(data);
});

/* TPS Point */
let tps = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
      // Menggunakan L.rectangle untuk membuat bentuk persegi
      let smallRectSize = 0.000125; // Ukuran persegi, Anda dapat menyesuaikan
      let bounds = [
          [latlng.lat - smallRectSize, latlng.lng - smallRectSize],
          [latlng.lat + smallRectSize, latlng.lng + smallRectSize]
      ];
      return L.rectangle(bounds, {color: "#00FF00", weight: 1}); // Hijau dengan ketebalan garis 1
  }
});

/* Menggunakan $.ajax untuk mendapatkan data JSON */
$.ajax({
  url: "/data/persampahan.geojson",
  dataType: "json",
  success: function (data) {
      tps.addData(data);
  },
  error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error mengambil data: ", textStatus, errorThrown);
  }
});

/* Persampahan KOTAKU Point */
let sampah = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
      return L.circleMarker(latlng, {
          radius: 3,  // Ukuran dari circle marker
          fillColor: "#00FF00",  // Warna isi
          color: "#00FF00",  // Warna garis tepi
          weight: 1,  // Ketebalan garis tepi
          opacity: 1,  
          fillOpacity: 0.8  // Opasitas dari warna isi
      });
  },
  onEachFeature: function(feature, layer) {
    layer.bindPopup(getPopupKOTAKU(feature.properties));
    layer.bindTooltip('KSM ' + feature.properties.Nama_KSM + ' - ' + feature.properties.Tahun + ' - ' + feature.properties.Sub_Keg);
    layer.on({
      mouseout: resetHighlightKotaku
    });
  }
});

$.ajax({
  url: "/data/persampahan_kotaku.geojson",
  dataType: "json",
  success: function (data) {
      sampah.addData(data);
  },
  error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error mengambil data: ", textStatus, errorThrown);
  }
});

let spaldClusters = new L.MarkerClusterGroup({
  spiderfyOnMaxZoom: true,
  showCoverageOnHover: false,
  zoomToBoundsOnClick: true,
  disableClusteringAtZoom: 15
});


// Air Limbah Domestik Kotaku
let spald = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    let subKeg = feature.properties.Sub_Keg;
    let iconUrl = subKeg === "MCK Mandi + Cuci + Kakus" ? "/img/wc.png" : "/img/septictank.png";

    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: iconUrl,
        iconSize: [16, 16],  // Ubah sesuai ukuran ikon yang Anda inginkan
        iconAnchor: [8, 16],  // Sesuaikan dengan titik di mana ikon seharusnya ditempatkan di bawah titik yang diberikan
        popupAnchor: [0, -14]  // Sesuaikan dengan titik di mana popup seharusnya ditempatkan terhadap ikon
      })
    });
  },
  onEachFeature: function(feature, layer) {
    layer.bindPopup(getPopupKOTAKU(feature.properties));
    layer.bindTooltip('KSM ' + feature.properties.Nama_KSM + ' - ' + feature.properties.Tahun + ' - ' + feature.properties.Sub_Keg);
    layer.on({
      mouseout: resetHighlightKotaku
    });
  }
});

$.ajax({
  url: "/data/spald_kotaku.geojson",
  dataType: "json",
  success: function (data) {
    spald.addData(data);
    spaldClusters.addLayer(spald);
  },
  error: function (jqXHR, textStatus, errorThrown) {
    console.error("Error mengambil data: ", textStatus, errorThrown);
  }
});


// Fungsi untuk mengaktifkan atau menonaktifkan kluster
function toggleClusters(active) {
  if (active) {
    spaldClusters.addTo(map);
  } else {
    map.removeLayer(spaldClusters);
  }
}

// Event listener untuk ketika layer Keluarga Rentan diaktifkan atau dinonaktifkan
map.on('overlayadd', function(eventLayer) {
    if (eventLayer.name === 'SPALD (KOTAKU)') {
        toggleClusters(true);
    }
});

map.on('overlayremove', function(eventLayer) {
    if (eventLayer.name === 'SPALD (KOTAKU)') {
        toggleClusters(false);
    }
});



/*load wms form geoserver*/
const batas_rt_bjm = L.tileLayer.wms("https://gis-bjm.my.id/geoserver/webgis/wms?", {
  layers: 'webgis:BATAS_RT',
  format: 'image/png',
  transparent: true,
  version: '1.1.0',
   style: function(feature) {
        return {
            color: '#000000', // warna batas polygon
            fillColor: '#808080', // warna isi polygon
            weight: 2, // tebal batas polygon
            opacity: 1, // opasitas polygon
            fillOpacity: 0.5, // opasitas isi polygon
            renderer: L.svg(), // renderer SVG
            label: feature.properties.Nama_RT, // label nama fitur
            fontColor: '#808080', // warna teks label
            fontSize: '12px' // ukuran teks label
        };
    }

});

/*load wms sungai form geoserver*/
const sungai = L.tileLayer.wms("https://gis-bjm.my.id/geoserver/webgis/wms?", {
  layers: 'webgis:sungai_ln',
  format: 'image/png',
  transparent: true,
  version: '1.1.0',
   style: function(feature) {
        return {
            renderer: L.svg(), // renderer SVG
            label: feature.properties.TOPONIM, // label nama fitur
            fontColor: '#808080', // warna teks label
            fontSize: '11px', // ukuran teks label
            labelOptions: { // Konfigurasi label teks
              direction: 'auto', // Arah label (auto, ltr, rtl)
              noHide: true, // Jangan sembunyikan label saat zooming
              className: 'wms-label' // Nama kelas CSS khusus untuk label
          }
        };
    }

});


/*load wms form geoserver*/
const polaruang = L.tileLayer.wms("https://gis-bjm.my.id/geoserver/webgis/wms?", {
  layers: 'webgis:Peta_Rencana_Pola_Ruang_RTRW_Kota_Banjarmasin_Tahun_2021-2041',
  format: 'image/png',
  transparent: true,
  version: '1.1.0',

});

// Fungsi untuk membuat URL GetFeatureInfo
function getFeatureInfoUrl(latlng) {
  let point = map.latLngToContainerPoint(latlng, map.getZoom()),
      size = map.getSize(),
      params = {
        request: 'GetFeatureInfo',
        service: 'WMS',
        srs: 'EPSG:4326',
        styles: '',
        transparent: true,
        version: polaruang.options.version,      
        format: polaruang.options.format,
        bbox: map.getBounds().toBBoxString(),
        height: size.y,
        width: size.x,
        layers: polaruang.options.layers,
        query_layers: polaruang.options.layers,
        info_format: 'application/json'
      };

  params[params.version === '1.3.0' ? 'i' : 'x'] = point.x;
  params[params.version === '1.3.0' ? 'j' : 'y'] = point.y;

  return polaruang._url + L.Util.getParamString(params, polaruang._url, true);
}

// Fungsi untuk menangani GetFeatureInfo
function getFeatureInfo(e) {
  let url = getFeatureInfoUrl(e.latlng);

  fetch(url)
    .then(response => response.json())
    .then(data => {
      let feature = data.features[0];
      if (feature) {
        let content = feature.properties.NAMOBJ;
        L.popup({ maxWidth: 800 })
          .setLatLng(e.latlng)
          .setContent(content)
          .openOn(map);
      }
    });
}


const rk_kumuh = L.tileLayer.wms("https://gis-bjm.my.id/geoserver/webgis/wms?", {
  layers: 'webgis:kumuh_rk_AR',
  format: 'image/png',
  transparent: true,
  version: '1.1.0',

});


// function getData(e) {
//   let url2 = getDataUrl(e.latlng);

//   fetch(url2)
//     .then(response => response.json())
//     .then(data => {
//       let feature = data.features[0];
//       if (feature) {
//         let content = feature.properties.Nama_Lokas;
//         L.popup({ maxWidth: 800 })
//           .setLatLng(e.latlng)
//           .setContent(content)
//           .openOn(map);
//       }
//     });
// }

// Daftarkan event listener untuk 'click'
map.on('click', getFeatureInfo);

// // Buat letiabel untuk menyimpan tooltip yang sedang aktif
// let activeTooltip = null;

// // Fungsi untuk menampilkan tooltip
// function showTooltip(e, namaLokas) {
//   if (activeTooltip) {
//     map.removeLayer(activeTooltip);
//   }

//   activeTooltip = L.tooltip({
//     position: e.latlng,
//     closeButton: false,
//     className: 'custom-tooltip', // Ganti dengan kelas CSS yang sesuai
//   })
//     .setContent(namaLokas)
//     .addTo(map);
// }

// // Event listener untuk mousemove pada layer WMS
// rk_kumuh.on('mousemove', function (e) {
//   // Ambil informasi fitur dari respons GetFeatureInfo (biasanya dalam format JSON)
//   const namaLokas = e.features[0].properties.Nama_Lokas; // Ganti dengan nama yang sesuai dalam respons

//   showTooltip(e, namaLokas);
// });

// // Event listener untuk mouseout pada layer WMS
// rk_kumuh.on('mouseout', function () {
//   if (activeTooltip) {
//     map.removeLayer(activeTooltip);
//     activeTooltip = null;
//   }
// });

    // let urlWFS = 'http://your-geoserver-domain/geoserver/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=your-workspace:your-layer&outputFormat=application/json';
        
    //     let layerWFS = new L.GeoJSON.AJAX(urlWFS, {
    //         onEachFeature: function (feature, layer) {
    //             layer.bindPopup(feature.properties.name); // Sesuaikan dengan atribut Anda
    //         }
    //     });
        
    //     layerWFS.addTo(map);

// const jalan = L.tileLayer.wms("https://www.sialdobjm.com/geoserver/sialdo/wms?", {
//   layers: 'sialdo:jalan_LN',
//   format: 'image/png',
//   transparent: true,
//   version: '1.1.0'

// });

const apiUrl1 = "https://bakawan.banjarmasinkota.go.id/api/geojson/rtlh";
const apiUrl2 = "https://bakawan.banjarmasinkota.go.id/api/geojson/penerima-bantuan";
const bearerToken = window.bearerToken;

const rtlhGroup = L.layerGroup();
const intrvRTLH = L.layerGroup();

fetch(apiUrl1, {
  method: 'GET',
  headers: {
    'Authorization': bearerToken
  }
})
.then(response => response.json())
.then(data => {
  data.features.forEach(feature => {
    let coords = feature.geometry.coordinates;
    let properties = feature.properties;
    let features = feature

    // Membuat konten popup dalam bentuk tabel
    let popupContent = `
      <table>
          <tr><td><strong>ID</strong></td><td>${features.id}</td></tr>
          <tr><td><strong>Alamat Lengkap</strong></td><td>${properties.alamat_lengkap}</td></tr>
          <tr><td><strong>Jumlah Penghuni</strong></td><td>${properties.jml_penghuni}</td></tr>
          <tr><td><strong>Luas Rumah</strong></td><td>${properties.luas_rumah} m<sup>2</sup></td></tr>
          <tr><td><strong>Kondisi Atap</strong></td><td>${properties.kondisi_atap}</td></tr>
          <tr><td><strong>Kondisi Lantai</strong></td><td>${properties.kondisi_dinding}</td></tr>
          <tr><td><strong>Kondisi Dinding</strong></td><td>${properties.kondisi_lantai}</td></tr>
          <tr><td><strong>Jenis Kloset</strong></td><td>${properties.jenis_kloset}</td></tr>
          <tr><td><strong>Kepemilikan Kamar mandi/WC</strong></td><td>${properties.kepemilikan_kamar_mandi}</td></tr>
      </table>
      <br><a href='${properties.foto_bangunan}'><button class='btn btn-sm btn-outline-success btn-block'>Lihat Foto Rumah</button></a>
    `;

    // Membuat marker dengan style khusus
    let marker = L.circleMarker([coords[1], coords[0]], {
      color: 'blue',
      fillColor: '#30f',
      fillOpacity: 0.5,
      radius: 5,
      weight:0.5
    }).bindPopup(popupContent);  // Mengikat konten popup ke marker

    // Mengubah warna saat hover
    marker.on('mouseover', function() {
      this.setStyle({color: 'red', fillColor: '#f03'});
    });
    marker.on('mouseout', function() {
      this.setStyle({color: 'blue', fillColor: '#30f'});
    });

    // Menambahkan marker ke layer group rtlh
    marker.addTo(rtlhGroup);
  });
})
.catch(error => {
  console.error('Ada kesalahan:', error);
});

//Bantuan Penanganan RTLH
fetch(apiUrl2, {
  method: 'GET',
  headers: {
    'Authorization': bearerToken
  }
})
.then(response => response.json())
.then(data => {
  data.features.forEach(feature => {
    let coords = feature.geometry.coordinates;
    let properties = feature.properties;
    let geom = feature.geometry.coordinates;

    // Membuat konten popup dalam bentuk tabel
    const popupIntervensi = `
      <table>
          <tr><td><strong>Nama Penerima Bantuan</strong></td><td>${properties.nama_lengkap}</td></tr>
          <tr><td><strong>Alamat Lengkap</strong></td><td>${properties.alamat_lengkap}</td></tr>
          <tr><td><strong>Jumlah Penghuni</strong></td><td>${properties.jml_penghuni}</td></tr>
          <tr><td><strong>Luas Rumah</strong></td><td>${properties.luas_rumah} m<sup>2</sup></td></tr>
          <tr><td><strong>Jenis Kloset</strong></td><td>${properties.jenis_kloset}</td></tr>
          <tr><td><strong>Kepemilikan Kamar mandi/WC</strong></td><td>${properties.kepemilikan_kamar_mandi}</td></tr>
      </table>
    `;

    // Membuat marker dengan style khusus
    const marker = L.circleMarker([coords[1], coords[0]], {
      color: 'whitesmoke',
      fillColor: 'green',
      fillOpacity: 0.5,
      radius: 5,
      weight:1
    }).bindPopup(popupIntervensi);  // Mengikat konten popup ke marker

    // Mengubah warna saat hover
    marker.on('mouseover', function() {
      this.setStyle({color: 'red', fillColor: '#f03'});
    });
    marker.on('mouseout', function() {
      this.setStyle({color: 'whitesmoke', fillColor: 'green'});
    });

    // Menambahkan marker ke layer group rtlh
    marker.addTo(intrvRTLH);
  });
})
.catch(error => {
  console.error('Ada kesalahan:', error);
});


/* GeoJSON Point */
let pointsample = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: ( feature.properties.titik === "pangkal" ? "../img/pangkal.svg" : "../img/ujung.svg"), 
        iconSize: [20, 41],
        iconAnchor: [13, 41],
        shadowAnchor: [13, 41],
        popupAnchor: [0, -41],
      })
    });
  },
  /* Popup & Tooltip */
  onEachFeature: function (feature, layer) {
    let content = "<table class='tg'>" + 
      "<tr><th class='tg-zjf3'>Ruas / Segmen</th><td>" + feature.properties.nama + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Alamat</th><td>" + feature.properties.alamat + " RT. " + feature.properties.rt + " Kel. " + feature.properties.kelurahan + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Jenis Kerusakan</th><td>" + feature.properties.kerusakan + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Rencana Penanganan</th><td>" + feature.properties.rencana + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Dimensi</th><td>P = " + feature.properties.panjang + " m  L = " + feature.properties.lebar + "m</td></tr>" +
      "<tr><th class='tg-zjf3'>Catatan Khusus</th><td>" + feature.properties.catatan + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Surveyor</th><td>" + feature.properties.surveyor + "</td></tr>" +
      "</table><br><a target='_blank' href='https://maps.google.com/maps?q=" + feature.properties.lat + "," + feature.properties.lng + "&z=20&ll=" + feature.properties.lat + "," + feature.properties.lng + "'><button class='btn btn-sm btn-outline-success btn-block'>Google Maps</button></a><br><a target='_blank' href='http://maps.google.com/maps?q=&layer=c&cbll=" + feature.properties.lat + "," + feature.properties.lng + "&z=20&ll=" + feature.properties.lat + "," + feature.properties.lng + "'><button class='btn btn-sm btn-outline-warning btn-block'>Google Streetview</button></a>";
    layer.on({
      click: function (e) {
        pointsample.bindPopup(content);
      },
      mouseover: function (e) {
        pointsample.bindTooltip(feature.properties.alamat);
      }
    });
  }
});
/* get JSON data */
$.getJSON("/data/spreadsheetpoint.php", function (data) {
  pointsample.addData(data);
  map.fitBounds(pointsample.getBounds());
});



/* Musrenbang Point */
let musrenbang = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: ( feature.properties.titik === "pangkal" ? "../img/pangkal2.svg" : "../img/ujung2.svg"), 
        iconSize: [20, 41],
        iconAnchor: [13, 41],
        shadowAnchor: [13, 41],
        popupAnchor: [0, -41],
      })
    });
  },
  /* Popup & Tooltip */
  onEachFeature: function (feature, layer) {
    let content = "<table class='tg'>" + 
      "<tr><th class='tg-zjf3'>Ruas / Segmen</th><td>" + feature.properties.nama + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Alamat</th><td>" + feature.properties.alamat + " RT. " + feature.properties.rt + " Kel. " + feature.properties.kelurahan + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Jenis Kerusakan</th><td>" + feature.properties.kerusakan + "</td></tr>" +
       "<tr><th class='tg-zjf3'>Catatan Khusus</th><td>" + feature.properties.catatan + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Surveyor</th><td>" + feature.properties.surveyor + "</td></tr>" +
      "</table><br><a target='_blank' href='https://maps.google.com/maps?q=" + feature.properties.lat + "," + feature.properties.lng + "&z=20&ll=" + feature.properties.lat + "," + feature.properties.lng + "'><button class='btn btn-sm btn-outline-success btn-block'>Google Maps</button></a><br><a target='_blank' href='http://maps.google.com/maps?q=&layer=c&cbll=" + feature.properties.lat + "," + feature.properties.lng + "&z=20&ll=" + feature.properties.lat + "," + feature.properties.lng + "'><button class='btn btn-sm btn-outline-warning btn-block'>Google Streetview</button></a>";
    layer.on({
      click: function (e) {
        musrenbang.bindPopup(content);
      },
      mouseover: function (e) {
        musrenbang.bindTooltip(feature.properties.alamat);
      }
    });
  }
});
/* get JSON data */
$.getJSON("/data/musrenbang.php", function (data) {
  musrenbang.addData(data);
  map.fitBounds(musrenbang.getBounds());
});

/* Pokir Point */
let pokir = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: ( feature.properties.titik === "pangkal" ? "../img/pangkal3.svg" : "../img/ujung3.svg"), 
        iconSize: [20, 41],
        iconAnchor: [13, 41],
        shadowAnchor: [13, 41],
        popupAnchor: [0, -41],
      })
    });
  },
  /* Popup & Tooltip */
  onEachFeature: function (feature, layer) {
    let content = "<table class='tg'>" + 
      "<tr><th class='tg-zjf3'>Ruas / Segmen</th><td>" + feature.properties.nama + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Alamat</th><td>" + feature.properties.alamat + " RT. " + feature.properties.rt + " Kel. " + feature.properties.kelurahan + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Jenis Kerusakan</th><td>" + feature.properties.kerusakan + "</td></tr>" +
       "<tr><th class='tg-zjf3'>Catatan Khusus</th><td>" + feature.properties.catatan + "</td></tr>" +
       "<tr><th class='tg-zjf3'>Pengusul</th><td>" + feature.properties.pengusul + "</td></tr>" +
       "<tr><th class='tg-zjf3'>Status</th><td>" + feature.properties.status + "</td></tr>" +
      "<tr><th class='tg-zjf3'>Surveyor</th><td>" + feature.properties.surveyor + "</td></tr>" +
      "</table><br><a target='_blank' href='https://maps.google.com/maps?q=" + feature.properties.lat + "," + feature.properties.lng + "&z=20&ll=" + feature.properties.lat + "," + feature.properties.lng + "'><button class='btn btn-sm btn-outline-success btn-block'>Google Maps</button></a><br><a target='_blank' href='http://maps.google.com/maps?q=&layer=c&cbll=" + feature.properties.lat + "," + feature.properties.lng + "&z=20&ll=" + feature.properties.lat + "," + feature.properties.lng + "'><button class='btn btn-sm btn-outline-warning btn-block'>Google Streetview</button></a>";
    layer.on({
      click: function (e) {
        pokir.bindPopup(content);
      },
      mouseover: function (e) {
        pokir.bindTooltip(feature.properties.alamat);
      }
    });
  }
});
/* get JSON data */
$.getJSON("/data/pokir.php", function (data) {
  pokir.addData(data);
  map.fitBounds(pokir.getBounds());
});

// Menambahkan layer dari GeoJSON
let jalanKotaku = L.geoJSON(null, {
  style: function(feature) {
    let subKeg = feature.properties.Sub_Keg;
    let color;

    if (subKeg === "Jalan Kayu/Titian/Jerambah Kayu") {
      color = '#8B4513'; // Warna coklat
    } else if (subKeg === "Jalan Beton") {
      color = '#666'; // Warna abu-abu tua
    } else if (subKeg === "Jalan Paving Block" || subKeg === "Paving Block") {
      color = 'darkgreen'; // Warna hijau tua
    } else {
      color = '#666'; // Warna abu-abu tua (default)
    }

    return {
      color: color,
      weight: 3
    };
  },
  onEachFeature: function(feature, layer) {
    layer.bindPopup(getPopupFullKOTAKU(feature.properties));
    layer.bindTooltip('KSM ' + feature.properties.Nama_KSM + ' - ' + feature.properties.Tahun + ' - ' + feature.properties.Sub_Keg);
    layer.on({
      mouseover: highlightFeatureKotaku,
      mouseout: resetHighlightKotaku
    });
  }
});


$.getJSON('/data/jalan_jembatan_kotaku.geojson', function(data) {
  jalanKotaku.addData(data);
});

//Drainase KOTAKU
let drainaseKotaku = L.geoJSON(null, {
  style: function(feature) {
    return {
      color: '#0000FF',
      weight: 2
    };
  },
  onEachFeature: function(feature, layer) {
    layer.bindPopup(getPopupFullKOTAKU(feature.properties));
    layer.bindTooltip('KSM ' + feature.properties.Nama_KSM + ' - ' + feature.properties.Tahun + ' - ' + feature.properties.Sub_Keg);
    layer.on({
      mouseover: highlightFeatureKotaku,
      mouseout: resetHighlightDrainaseKotaku
    });
  }
});


$.getJSON('/data/drainase_kotaku.geojson', function(data) {
  drainaseKotaku.addData(data);
});




function getPopupFullKOTAKU(properties) {
  let content = '<table>';
  content += '<tr><th>Tahun </th><td>' + properties.Tahun + '</td></tr>';
  content += '<tr><th>Kecamatan </th><td>' + properties.Kecamatan + '</td></tr>';
  content += '<tr><th>Kelurahan </th><td>' + properties.Kelurahan + '</td></tr>';
  content += '<tr><th>Nama KSM </th><td>' + properties.Nama_KSM + '</td></tr>';
  content += '<tr><th>Kegiatan </th><td>' + properties.Kegiatan + '</td></tr>';
  content += '<tr><th>Sub Keg </th><td>' + properties.Sub_Keg + '</td></tr>';
  content += '<tr><th>Volume </th><td>' + properties.Volume  + ' meter</td></tr>';
  content += '</table>';
  return content;
}

function getPopupKOTAKU(properties) {
  let content = '<table>';
  content += '<tr><th>Tahun </th><td>' + properties.Tahun + '</td></tr>';
  content += '<tr><th>Kecamatan </th><td>' + properties.Kecamatan + '</td></tr>';
  content += '<tr><th>Kelurahan </th><td>' + properties.Kelurahan + '</td></tr>';
  content += '<tr><th>Nama KSM </th><td>' + properties.Nama_KSM + '</td></tr>';
  content += '<tr><th>Sub Keg </th><td>' + properties.Sub_Keg + '</td></tr>';
  content += '</table>';
  return content;
}

function highlightFeatureKotaku(e) {
  let layer = e.target;

  layer.setStyle({
    color: 'red'
  });

  if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
    layer.bringToFront();
  }
}




function resetHighlightKotaku(e) {
  jalanKotaku.resetStyle(e.target);
}

function resetHighlightDrainaseKotaku(e) {
  drainaseKotaku.resetStyle(e.target);
}


// /* Layer control listeners that allow for a single spaldClusters layer */
// map.on("overlayadd", function(e) {
//   if (e.layer === spaldLayer) {
//     spaldClusters.addLayer(spald);
//   }
  
// });

// map.on("overlayremove", function(e) {
//   if (e.layer === spaldLayer) {
//     spaldClusters.removeLayer(spald);

//   }
// });



/* Tile Basemap */
let baseLayers = {
  "RBI": rbi,
  
  "Greyscale": cartoLight,

  "Satellite" : googleSatellite,

  "Google Maps" : googleMaps,

  "Dark": mapboxDark,

  "OSM": osm,
};

let groupedOverlays = {

  "TEMATIK": {
    "Deliniasi Kumuh 2015": kumuh,
    "Deliniasi Kumuh 2022": newkumuh,
    "Rencana Kawasan (RK)": rk_kumuh,
    "Rumah Tidak Layak Huni": rtlhGroup
  },

  "UTILITAS KOTA & BATAS ADMINISTRASI": {
    // "Kecamatan": Kecamatan,
    "Kelurahan (indikatif)": Kelurahan,
    "Batas RT (Indikatif)": batas_rt_bjm,
    "Sungai": sungai,
    "Pola Ruang": polaruang,
    "Sarana Persampahan": tps,
  },

  "DATA SURVEI DAN USULAN": {
    "DED": pointsample,
    "Usulan Masyarakat" : musrenbang,
    "Pokir" : pokir,
  },

  "INTERVENSI": {
    "Perbaikan Rumah": intrvRTLH,
    "Persampahan (KOTAKU)": sampah,
    "SPALD (KOTAKU)": spaldClusters,
    "Jalan/Jembatan (KOTAKU)": jalanKotaku,
    "Drainase (KOTAKU)": drainaseKotaku,
  }
};


let layerControl = L.control.groupedLayers(baseLayers, groupedOverlays).addTo(map);


/* GPS enabled geolocation control set to follow the user's location */
let locateControl = L.control.locate({
  position: "topleft",
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
    title: "Lokasiku",
    popup: "Lokasimu {distance} {unit} dari titik ini",
    outsideMapBoundsMsg: "Kamu tampaknya berada di luar jangkauan peta"
  },
  locateOptions: {
    maxZoom: 18,
    watch: true,
    enableHighAccuracy: true,
    maximumAge: 10000,
    timeout: 10000
  }
}).addTo(map);


/*Geocoder Searching*/

L.Control.geocoder({
  position: "topleft",
  collapsed: true,
}).addTo(map);



