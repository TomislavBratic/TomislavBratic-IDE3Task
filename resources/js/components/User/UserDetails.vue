<template>
      <div class="user-card" v-for="(user, index) in users" :key="index">
        <div class="card-body">
          <h5 class="card-title">{{ user.name + ' ' + user.lastname }}</h5>
          <p class="card-text"><strong>Email:</strong> {{ user.email }}</p>
          <p class="card-text"><strong>Identification Number:</strong> {{ user.identification_number }}</p>
          <p class="card-text"><strong>Date of Birth:</strong> {{ user.date_of_birth }}</p>
          <p class="card-text"><strong>Street Address:</strong> {{ user.street }}</p>
          <p class="card-text"><strong>Street Number:</strong> {{ user.streetnumber }}</p>
          <p class="card-text"><strong>Phone Number:</strong> {{ user.phone_number }}</p>
          <p class="card-text"><strong>City:</strong> {{ user.city }}</p>
          <p class="card-text"><strong>Country:</strong> {{ user.country }}</p>
         
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
      users: [
        {
          name: 'John',
          lastname: 'Doe',
          email: 'john@example.com',
          country: 'USA',
          city: 'New York',
          street: '123 Main St',
          streetnumber:'123',
          identification_number: '123456789',
          date_of_birth: '1990-01-01',
          phone_number: '123-456-7890'
        },
        {
          name: 'Tomislav',
          lastname: 'Bratic',
          email: 'Tomislav@example.com',
          country: 'Croatia',
          city: 'Zagreb',
          street: 'Ulica Stjepana Radića',
          streetnumber: '123',
          identification_number: '123456789',
          date_of_birth: '1990-01-01',
          phone_number: '123-456-7890'
        },
      ]
    };
  },

  mounted() {
    this.fetchUserDetails();
  },

  methods: {
    editUser(index) {
      console.log('Edit user:', this.users[index]);
    },
    deleteUser(index) {
      console.log('Delete user:', this.users[index]);
      this.users.splice(index, 1);
    },
    fetchUserDetails() {
      const userId = this.$route.params.id;
      axios.get(`/api/users/${userId}`).then(response => {
        this.user = response.data;
      });
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
</style>