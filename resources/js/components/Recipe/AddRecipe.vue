<template>
    <div class="card">
      <div class="card-header">
        Create New Recipe
      </div>
      <div class="card-body">
        <form @submit.prevent="createRecipe">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" v-model="recipeData.name" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Portion</label>
            <input type="text" class="form-control" id="name" v-model="recipeData.portion" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Time to cook</label>
            <input type="text" class="form-control" id="name" v-model="recipeData.timetocook" required>
          </div>
          <div class="mb-3">
          <label for="preparation" class="form-label">Preparation</label>
          <textarea class="form-control" id="preparation" v-model="recipeData.preparation"></textarea>
        </div>
          <button type="submit" class="btn btn-primary">Create Recipe</button>
          
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        recipeData: {
          name: '',
          portion:'',
          timetocook:'',
          preparation:''
        }
      };
    },
    methods: {
      createRecipe() {
        console.log('Recipe Data:', this.recipeData);
      }
    }
  };
  </script>
  
  <style>
  /* */
  </style>