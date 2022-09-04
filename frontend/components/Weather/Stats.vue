<template>
  <div class="d-flex justify-content-between">
    <div>
      Maksymalna temperatura:
      <strong>{{ stats.maxTemperature | temp }}</strong>
    </div>
    <div>
      Minimalna temperatura:
      <strong>{{ stats.minTemperature | temp }}</strong>
    </div>
    <div>
      Średnia temperatura:
      <strong>{{ stats.avgTemperature | temp }}</strong>
    </div>
    <div>
      Ilość wyszukiwań:
      <strong>{{ stats.total }}</strong>
    </div>
  </div>
</template>

<script>
export default {
  name: "WeatherStats",
  filters: {
    temp(val) {
      return `${val.toFixed(2)} °C`
    },
  },
  props: {
    stats: {
      type: Object,
      required: true,
    },
  },
}
</script>

