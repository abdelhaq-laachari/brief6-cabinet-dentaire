<template>
  <div class="container">
    <dir></dir>
    <HomeHeader/>
  </div>
  
  <router-view/>
</template>


<script>
import HomeHeader from "./components/HomeHeader.vue";
export default {
  name: 'App',
  components: {
    HomeHeader,
  },
}
</script>


















<style>
#app {
  
}



</style>


// <router-link to="/">Home</router-link> |
// <router-link to="/about">About</router-link>