<template>
    <div>
        <h1>Create Landing Page</h1>
        <form @submit.prevent="store">
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" v-model="form.title" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" v-model="form.description" required></textarea>
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                title: '',
                description: '',
            },
        };
    },
    methods: {
        store() {
            axios.post('/api/landing-pages', this.form)
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
