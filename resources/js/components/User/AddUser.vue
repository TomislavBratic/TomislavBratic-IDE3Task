<template>
    <div class="card">
      <div class="card-header">
        Create New User
      </div>
      <div class="card-body">
        <form @submit.prevent="createUser">
          <div class="mb-3">
            <label for="name" class="form-label"> First Name</label>
            <input type="text" class="form-control" id="name" v-model="userData.name" required>
          </div>
          <div class="mb-3">
            <label for="last name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" v-model="userData.lastname" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" v-model="userData.email" required>
          </div>
          <div class="mb-3">
            <label for="identification_number" class="form-label">Identification Number</label>
            <input type="text" class="form-control" id="identification_number" v-model="userData.identification_number" required>
          </div>
          <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" v-model="userData.date_of_birth" required>
          </div>
          <div class="mb-3">
            <label for="street" class="form-label">Street Address</label>
            <input type="text" class="form-control" id="street" v-model="userData.street" required>
          </div>
          <div class="mb-3">
            <label for="streetnumber" class="form-label">Street Number</label>
            <input type="text" class="form-control" id="street" v-model="userData.streetnumber" required>
          </div>
          <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" v-model="userData.phone_number" required>
          </div>
          <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" v-model="userData.city" required>
          </div>
          <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" v-model="userData.country" required>
          </div>
          <button type="submit" class="btn btn-primary">Create User</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        userData: {
          name: '',
          lastname:'',
          email: '',
          country: '',
          city: '',
          street: '',
          streetnumber: '',
          identification_number: '',
          date_of_birth: '',
          phone_number: ''
        }
      };
    },
    methods: {
      createUser() {
        console.log('User Data:', this.userData);
      }
    }
  };
  </script>
  
  <style>
  /* */
  </style>