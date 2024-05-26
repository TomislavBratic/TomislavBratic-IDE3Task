<template>
      <!-- Middle Content with Welcome Text -->
      <div class="welcome-text">
      <h1>Welcome to my application</h1>
      <p>Here you can add Users, Recipes, and Groceries</p>
    </div>
</template>
  
  <script>
  export default {
    data() {
      return {
   
      }
    }
  }
  </script>
  
  <style>

.welcome-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 20px;
}
  
  </style>