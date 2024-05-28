<template>
   <div>
    <h1>Recipe Table with Search</h1>
    <div class="row mb-3">
        <div class="col">
            <input type="text" class="form-control" placeholder="Search by name" v-model="searchId">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Search by date" v-model="searchName">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Search by average rating" v-model="searchId">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Search by no. of comments" v-model="searchName">
        </div>
     </div>
     </div>

    <div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Portion</th>
            <th scope="col">Time to Cook</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="recipe in recipes" :key="recipe.id" @click="goToRecipeDetails(recipe.id)">
            <th scope="row">{{ recipe.id }}</th>
            <td>{{ recipe.name }}</td>
            <td>{{ recipe.portion }}</td>
            <td>{{ recipe.timetocook }}</td>
          </tr>
        </tbody>
      </table>
    </div>
</template>

<script>


export default {
  data() {
    return {
      recipes: [
        { id:'1',
          name: 'Lasagna',
          portion: '2',
          timetocook: '120 min',
          preparation:'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
         
        },
        { id:'2',
          name: 'Bolognese',
          portion: '4',
          timetocook: '30 min',
          preparation:'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
      ]
    };
  },
  methods: {
    editRecipe(index) {
      console.log('Edit Recipe:', this.recipes[index]);
    },
    deleteRecipe(index) {
      console.log('Delete Recipe:', this.recipes[index]);
      this.recipes.splice(index, 1);
    },
    goToRecipeDetails(recipeId) {
      this.$router.push({ name: 'RecipeDetails', params: { id: recipeId } });
    },
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

.table-hover tbody tr:hover {
  cursor: pointer;
}
</style>