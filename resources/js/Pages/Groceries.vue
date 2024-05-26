<template>
    <div id="grocery" class="grid-container">
       <div class="sidebar">
           <AddGrocery/>
       </div>

       <div class="grocery-cards">
       <GroceryCard/>
   </div>
   </div>


</template>


<script>
import AddGrocery from '../components/Grocery/AddGrocery.vue';
import GroceryCard from '../components/Grocery/GroceryCard.vue';

export default {
 name: 'Users.vue',
 components: {
    AddGrocery,
    GroceryCard
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

.grocery-cards {
 padding: 20px;
 /* You can add additional styling for user cards container */
}
</style>