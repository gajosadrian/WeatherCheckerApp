<template>
  <div>
    <b-card class="mb-3">
      <WeatherStats v-if="stats" :stats="stats"/>
    </b-card>
    <b-table
      :current-page="page"
      :fields="fields"
      :items="fetchWeatherSearches"
      :per-page="perPage"
      head-variant="light"
    >
      <template #cell(temperature)="data">
        {{ data.value }} °C
      </template>
      <template #cell(clouds)="data">
        {{ data.value }}%
      </template>
      <template #cell(wind_speed)="data">
        {{ data.value }} m/s
      </template>
      <template #cell(created_at)="data">
        {{ $moment(data.value).format('lll') }}
      </template>
    </b-table>
    <b-pagination v-model="page" :total-rows="total"/>
  </div>
</template>

<script>
export default {
  name: "WeatherHistory",
  data() {
    return {
      stats: null,
      page: 1,
      total: 0,
      perPage: 10,
      fields: [
        {key: 'city', label: 'Miejscowość'},
        {key: 'temperature', label: 'Temp.'},
        {key: 'clouds', label: 'Zachmurzenie'},
        {key: 'wind_speed', label: 'Wiatr'},
        {key: 'created_at', label: 'Data'},
      ],
    }
  },
  created() {
    this.fetchStats()
  },
  methods: {
    async fetchWeatherSearches(ctx) {
      const weatherSearches = await this.$store.dispatch('weatherSearch/get', {
        page: ctx.currentPage,
        perPage: ctx.perPage,
      })

      this.page = ctx.currentPage
      this.total = weatherSearches.total

      return weatherSearches.data
    },
    async fetchStats() {
      this.stats = await this.$store.dispatch('weatherSearch/getStats')
    },
  },
}
</script>
