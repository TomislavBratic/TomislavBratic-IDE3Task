<template>
  <div id="app">
    <Navbar />
    <router-view />
  </div>
</template>

<script>
import Navbar from './components/navbar.vue';

export default {
  components: {
    Navbar
  }
}
</script>

<style>
/* Global styles can go here */
</style>