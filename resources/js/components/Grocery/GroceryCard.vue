<template>
    <div>
    <h1>Grocery Table with Search</h1>
    <div class="row mb-3">
        <div class="col">
            <input type="text" class="form-control" placeholder="Search by name" v-model="searchId">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Search by price " v-model="searchName">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Search by type" v-model="searchId">
        </div>
     </div>
     </div>

    <div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">price</th>
            <th scope="col">type</th>
            <th scope="col">symbol unit</th>
          </tr>
        </thead>
        <tbody>
            <tr v-for="grocery in groceries" :key="grocery.id">
            <th scope="row">{{ grocery.id }}</th>
            <td>{{ grocery.name }}</td>
            <td>{{ grocery.price }}</td>
            <td>{{ grocery.type }}</td>
            <td>{{ grocery.unit_symbol }}</td>
          </tr>
        </tbody>
      </table>
    </div>
</template>

<script>


export default {
  data() {
    return {
      groceries: [
        { id:'1',
          name: 'Lemon',
          price: '2',
          type: 'fruit',
          unit_symbol:'kg'
        },
        { id:'1',
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