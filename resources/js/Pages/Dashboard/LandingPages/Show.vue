<template>
    <div>
        <h1>Show Landing Page</h1>
        <div>
            <p><strong>Title:</strong> {{ landingPage.title }}</p>
            <p><strong>Description:</strong> {{ landingPage.description }}</p>
        </div>
        <Link :href="route('landing-pages.index')">Back to Landing Pages</Link>
    </div>
</template>

<script>
export default {
    props: {
        landingPage: Object,
    },
};
</script>
