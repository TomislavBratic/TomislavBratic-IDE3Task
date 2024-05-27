<template>
    <!-- Right Side with User Cards -->
      <div class="recipe-card" v-for="(recipe, index) in recipes" :key="index">
        <div class="card-body">
          <h5 class="card-title">{{ recipe.name}}</h5>
          <p class="card-text"><strong>Portion:</strong> {{ recipe.portion }}</p>
          <p class="card-text"><strong>Time to cook:</strong> {{ recipe.timetocook }}</p>
          <p class="card-text"><strong>Preparation:</strong> {{ recipe.preparation }}</p>
         
          <div class="button-group">
            <button class="btn btn-primary" @click="editUser(index)">Edit</button>
            <button class="btn btn-danger" @click="deleteUser(index)">Delete</button>
            
          </div>
        </div>
      </div>
</template>

<script>


export default {
  data() {
    return {
      recipes: [
        // Sample user data, replace with your actual user data
        {
          name: 'Lasagna',
          portion: '2',
          timetocook: '120 min',
          preparation:'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
         
        },
        {
          name: 'Bolognese',
          portion: '4',
          timetocook: '30 min',
          preparation:'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
      ]
    };
  },
  mounted() {
    this.fetchRecipeDetails();
  },

  methods: {
    editRecipe(index) {
      console.log('Edit Recipe:', this.recipes[index]);
    },
    deleteRecipe(index) {
      console.log('Delete Recipe:', this.recipes[index]);
      this.recipes.splice(index, 1);
    },
    fetchRecipeDetails() {
      const recipeId = this.$route.params.id;
      axios.get(`/api/recipes/${recipeId}`).then(response => {
        this.recipe = response.data;
      });
    }
  }
};
</script>

<style>


.recipe-card {
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.button-group {
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
}
</style>