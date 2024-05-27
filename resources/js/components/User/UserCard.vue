<template>
    <div>
    <h1>User Table with Search</h1>
    <!-- Search Inputs -->
    <div class="row mb-3">
        <div class="col">
            <input type="text" class="form-control" placeholder="Search by first name" v-model="searchId">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Search by last name" v-model="searchName">
        </div>
     </div>
    </div>
    <div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id" @click="goToUserDetails(user.id)">
            <th scope="row">{{ user.id }}</th>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.country }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        users: [
          {
            id:'1',
            name: 'John',
            lastname: 'Doe',
            email: 'john@example.com',
            country: 'USA',
          },
          {
            id:'2',
            name: 'Tomislav',
            lastname: 'Bratic',
            email: 'Tomislav@example.com',
            country: 'Croatia',
          },
        ]
      };
    },
    methods: {
      editUser(index) {
        console.log('Edit user:', this.users[index]);
      },
      deleteUser(index) {
        console.log('Delete user:', this.users[index]);
        this.users.splice(index, 1);
      },
      goToUserDetails(userId) {
      this.$router.push({ name: 'UserDetails', params: { id: userId } });
    },
    },

  };
  </script>
  
  <style>

  
  .user-card {
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