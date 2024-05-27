<template>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">IDE3Task</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/users">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/recipes">Recipes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/groceries">Groceries</a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
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
        this.isActive = !this.isActive
      }
    }
  }
  </script>