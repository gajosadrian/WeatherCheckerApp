<template>
  <div>
    <b-navbar
      fixed="top"
      sticky
      toggleable="lg"
      type="dark"
      variant="primary"
    >
      <b-navbar-brand to="/">WeatherCheckerApp</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"/>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <NuxtLink
            v-slot="{ navigate }"
            custom
            to="/"
          >
            <b-nav-item @click="navigate">Home</b-nav-item>
          </NuxtLink>
        </b-navbar-nav>
        <b-navbar-nav>
          <NuxtLink
            v-slot="{ navigate }"
            :to="{ name: 'search-history' }"
            custom
          >
            <b-nav-item @click="navigate">Historia wyszukiwań</b-nav-item>
          </NuxtLink>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>

    <Nuxt/>
  </div>
</template>

<script>
export default {
  name: 'DefaultLayout',
}
</script>
