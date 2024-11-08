<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Dashboard / Landing Pages
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="w-full text-left">
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
                </div>
            </div>
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
