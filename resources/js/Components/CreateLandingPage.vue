<template>
  <div>
    <h1>Create Landing Page</h1>
    <form @submit.prevent="createLandingPage">
      <div>
        <label for="title">Title</label>
        <input type="text" id="title" v-model="title" />
      </div>
      <div>
        <label for="description">Description</label>
        <textarea id="description" v-model="description" />
      </div>
      <button type="submit">Create</button>
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
  methods: {
    createLandingPage() {
      // Call API to create new landing page
      axios.post('/api/landing-pages', {
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
