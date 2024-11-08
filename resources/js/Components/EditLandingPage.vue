// resources/js/components/EditLandingPage.vue
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
  mounted()
