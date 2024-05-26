<template>
    <!-- Right Side with User Cards -->
      <div class="grocery-card" v-for="(grocery, index) in groceries" :key="index">
        <div class="card-body">
          <h5 class="card-title">{{ grocery.name}}</h5>
          <p class="card-text"><strong>price:</strong> {{ grocery.price }}</p>
          <p class="card-text"><strong>type:</strong> {{ grocery.type }}</p>
          <p class="card-text"><strong>Unit symbol:</strong> {{ grocery.unit_symbol }}</p>
         
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
      groceries: [
        // Sample user data, replace with your actual user data
        {
          name: 'Lemon',
          price: '2',
          type: 'fruit',
          unit_symbol:'kg'
        },
        {
          name: 'Beef',
          price: '4',
          type: 'meat',
          unit_symbol:' kg'
        },
      ]
    };
  },
  methods: {
    editGrocery(index) {
      console.log('Edit grocery:', this.groceries[index]);
    },
    deleteGrocery(index) {
      console.log('Delete grocery:', this.groceries[index]);
      this.groceries.splice(index, 1);
    }
  }
};
</script>

<style>


.grocery-card {
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