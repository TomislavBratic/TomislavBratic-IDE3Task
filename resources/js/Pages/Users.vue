<template>
     <div id="user" class="grid-container">
        <div class="sidebar">
            <AddUser/>
        </div>

        <div class="user-cards">
        <UserCard/>
    </div>
    </div>


</template>


<script>
import AddUser from '../components/User/AddUser.vue';
import UserCard from '../components/User/UserCard.vue';
import UserDetails from '../components/User/UserDetails.vue';

export default {
  name: 'Users.vue',
  components: {
    AddUser,
    UserDetails,
    UserCard
  },

  data() {
    return {
      users: []
    };
  },

  created() {
    this.fetchUsers();
  },
  methods: {
    async fetchUsers() {
      try {
        const response = await axios.get('http://localhost/api/public/users');
        this.users = response.data;
      } catch (error) {
        console.error('Error fetching users:', error);
      }
    }
  }
};

</script>

<style>
.grid-container {
  display: grid;
  grid-template-columns: 1fr 2fr; 
}

.sidebar {
  padding: 20px;
  background-color: #f0f0f0;
}

.user-cards {
  padding: 20px;
}
</style>