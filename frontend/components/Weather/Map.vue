<template>
  <div>
    <b-card>
      <GmapMap
        :center="center"
        :class="$style.map"
        :zoom="zoom"
        @click="onMapClick"
      >
      </GmapMap>
    </b-card>
    <WeatherModal ref="WeatherModal"/>
  </div>
</template>

<script>
export default {
  name: "WeatherMap",
  data() {
    return {
      center: {lat: 51.84216644204865, lng: 19.503214435001226}, // Poland
      zoom: 6,
    }
  },
  methods: {
    onMapClick(e) {
      const lat = e.latLng.lat()
      const lng = e.latLng.lng()

      this.$refs.WeatherModal.show(lat, lng)
    },
  },
}
</script>

<style module>
.map {
  width: 100%;
  height: 500px;
}
</style>
