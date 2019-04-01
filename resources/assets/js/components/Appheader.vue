<template>

    <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
    <a class="navbar-item" href="">
      <b>Address Book App</b>
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start is-active">
      
    <!-- use router-link component for navigation. -->
    <!-- specify the link by passing the `to` prop. -->
    <!-- `<router-link>` will be rendered as an `<a>` tag by default -->
    <router-link to="/home" class="navbar-item">Home</router-link>
    <router-link to="/about" class="navbar-item">About</router-link>

  </div>
  </div>

</nav>
</template>

<script>
    export default {
        mounted() {
            //console.log('Header Component mounted.')
        }
    }
</script>
