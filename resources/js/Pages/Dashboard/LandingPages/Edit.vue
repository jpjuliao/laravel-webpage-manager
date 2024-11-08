<template>
    <div>
        <h1>Edit Landing Page</h1>
        <form @submit.prevent="update">
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" v-model="form.title" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" v-model="form.description" required></textarea>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        landingPage: Object,
    },
    data() {
        return {
            form: {
                title: this.landingPage.title,
                description: this.landingPage.description,
            },
        };
    },
    methods: {
        update() {
            axios.patch(`/api/landing-pages/${this.landingPage.id}`, this.form)
                .then(() => {
                    this.$emit('update');
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>
