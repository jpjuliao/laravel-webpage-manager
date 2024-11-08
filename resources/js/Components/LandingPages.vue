<template>
    <div>
      <h1>Edit Landing Page</h1>
      <form @submit.prevent="updateLandingPage">
        <div>
          <label for="title">Title</label>
          <input type="text" id="title" v-model="title" />
        </div>
        <div>
          <label for="description">Description</label>
          <textarea id="description" v-model="description" />
        </div>
        <button type="submit">Update</button>
      </form>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        title: '',
        description: '',
      };
    },
    mounted() {
      // Call API to fetch landing page by ID
      axios.get(`/api/landing-pages/${this.$route.params.id}`)
        .then((response) => {
          this.title = response.data.title;
          this.description = response.data.description;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    methods: {
      updateLandingPage() {
        // Call API to update landing page
        axios.put(`/api/landing-pages/${this.$route.params.id}`, {
          title: this.title,
          description: this.description,
        })
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.error(error);
        });
      },
    },
  };
  </script>
