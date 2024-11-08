<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Dashboard / Landing Pages
            </h2>
        </template>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="landingPage in landingPages" :key="landingPage.id">
                        <td>{{ landingPage.title }}</td>
                        <td>{{ landingPage.description }}</td>
                        <td>
                            <Link :href="route('landing-pages.show', landingPage.id)">Show</Link>
                            <Link :href="route('landing-pages.edit', landingPage.id)">Edit</Link>
                            <Link @click="destroy(landingPage.id)" href="#">Delete</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<script lang="ts">
export default {
    props: {
        landingPages: Array,
    },
    methods: {
        destroy(id) {
            if (confirm('Are you sure you want to delete this landing page?')) {
                axios.delete(`/api/landing-pages/${id}`)
                    .then(() => {
                        this.$emit('update');
                    });
            }
        },
    },
};
</script>
