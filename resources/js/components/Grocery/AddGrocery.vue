<template>
    <div class="card">
      <div class="card-header">
        Create New Grocery
      </div>
      <div class="card-body">
        <form @submit.prevent="createGrocery">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" v-model="groceryData.name" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">price</label>
            <input type="text" class="form-control" id="name" v-model="groceryData.price" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">type</label>
            <input type="text" class="form-control" id="name" v-model="groceryData.type" required>
          </div>
        <div class="mb-3">
          <label for="unit_symbol" class="form-label">Unit symbol</label>
          <select class="form-control" id="unit_symbol" v-model="groceryData.unit_symbol">
            <option value="" disabled>Select weight symbol</option>
            <option value="kg">kg</option>
            <option value="ml">ml</option>
            <option value="pcs">pcs</option>
          </select>
        </div>
          <button type="submit" class="btn btn-primary">Create Grocery</button>
          
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        groceryData: {
          name: '',
          price:'',
          type:'',
          preparation:'',
          unit_symbol:''
        }
      };
    },
    methods: {
      createGrocery() {
        console.log('Grocery Data:', this.groceryData);
      }
    }
  };
  </script>
  
  <style>
  /* */
  </style>