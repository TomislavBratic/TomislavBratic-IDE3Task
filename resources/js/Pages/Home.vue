<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <div class="collapse navbar-collapse" :class="{ show: isActive }" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <button class="btn btn-primary" @click="navigateTo('/user')">User</button>
          </li>
          <li class="nav-item">
            <button class="btn btn-primary" @click="navigateTo('/recipe')">Recipe</button>
          </li>
          <li class="nav-item">
            <button class="btn btn-primary" @click="navigateTo('/groceries')">Groceries</button>
          </li>
        </ul>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isActive: false
      }
    },
    methods: {
      toggleMenu() {
        this.isActive = !this.isActive;
      },
      navigateTo(route) {
        this.$router.push(route);
      }
    }
  }
  </script>
  
  <style scoped>
  .nav-item {
    margin-right: 10px;
  }
  
  .navbar-brand img {
    max-height: 3rem;
  }
  
  </style>