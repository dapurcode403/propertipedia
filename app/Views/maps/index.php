<?php
$rumahtojson = json_encode($rumah);
?>
<div id="map" style="width: 100%; height: 80vh;"></div>



<script>
const map = L.map('map').setView([-7.424377192578975, 109.23018305426238], 12);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// marker


var dataRumah = <?= $rumahtojson ?>;

for (i = 0; i < dataRumah.length; i++) {
    var foto = dataRumah[i]['foto'];
    L.marker([dataRumah[i]['latitude'], dataRumah[i]['longitude']]).bindPopup(
        `<img src='<?= base_url('assets/img/scnd_unit/') ?>${foto}' width='250px'> <br>` +
        dataRumah[i]['alamat']).addTo(map);
}
</script>