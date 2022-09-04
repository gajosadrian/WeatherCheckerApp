export const actions = {
  async get({ commit }, { page, perPage }) {
    return await this.$axios.$get('/api/weather-searches', {
      params: {
        page,
        perPage,
      },
    })
  },
  async getStats({ commit }) {
    return await this.$axios.$get('/api/get-stats')
  },
}
