<template>
  <b-modal ref="modal" ok-only size="lg" title="Pogoda">
    <div v-if="fetching" class="text-center">
      <b-spinner variant="muted"/>
    </div>
    <div v-else>
      <b-table :fields="fields" :items="[weather]" class="mb-0" stacked>
        <template #cell(temperature)="data">
          Teraz: {{ data.item.temperature }},
          Min: {{ data.item.temperature_min }},
          Max: {{ data.item.temperature_max }}
        </template>
        <template #cell(clouds)="data">
          {{ data.value }}%
        </template>
        <template #cell(description)="data">
          <div>{{ data.value }}</div>
          <b-img :src="`http://openweathermap.org/img/wn/${data.item.weather_icon}.png`" fluid/>
        </template>
        <template #cell(wind)="data">
          {{ data.item.wind_speed }} m/s
        </template>
      </b-table>
    </div>
  </b-modal>
</template>

<script>
export default {
  name: "WeatherModal",
  data() {
    return {
      weather: null,
      fetching: false,
      fields: [
        {key: 'temperature', label: 'Temperatura'},
        {key: 'city', label: 'Miasto'},
        {key: 'clouds', label: 'Zachmurzenie'},
        {key: 'wind', label: 'Wiatr'},
        {key: 'description', label: 'Informacja'},
      ],
    }
  },
  methods: {
    async fetchWeather(lat, lng) {
      this.weather = null
      this.fetching = true

      try {
        this.weather = await this.$axios.$get('api/get-weather', {
          params: {
            lat, lng
          }
        })
      } catch (e) {
        this.$swal({
          icon: 'error',
          title: 'Błąd',
          text: 'Błąd podczas pobierania pogody'
        })
        this.hide()
      }

      this.fetching = false
    },
    show(lat, lng) {
      this.fetchWeather(lat, lng)
      this.$refs.modal.show()
    },
    hide() {
      this.$refs.modal.hide()
    }
  },
}
</script>
