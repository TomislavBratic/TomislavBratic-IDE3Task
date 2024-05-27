<template>
    <div id="user" class="grid-container">
       <div class="sidebar">
           <AddRecipe/>
       </div>

       <div class="user-cards">
       <UserCard/>
   </div>
   </div>


</template>


<script>
import AddRecipe from '../components/Recipe/AddRecipe.vue';
import UserCard from '../components/Recipe/RecipeCard.vue';
import RecipeDetails from '../components/Recipe/RecipeDetails.vue';

export default {
 name: 'Users.vue',
 components: {
    AddRecipe,
    RecipeDetails,
   UserCard
 }
};

</script>

<style>
.grid-container {
 display: grid;
 grid-template-columns: 1fr 2fr; /* Adjust column widths as needed */
}

.sidebar {
 padding: 20px;
 background-color: #f0f0f0;
}

.user-cards {
 padding: 20px;
 /* You can add additional styling for user cards container */
}
</style>