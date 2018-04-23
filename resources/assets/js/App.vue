<template>
    <div id="app" class="container">
        <Nav></Nav>
        <div class="mt-4">
            <router-view/>
        </div>
        <Footer></Footer>
    </div>
</template>
<script>
  import Nav from './components/Nav.vue'
  import Footer from './components/Footer.vue'
  export default {
    name: 'App',
    components: {
      Nav,
      Footer
    }
  }
</script>
<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
    }
</style>
