<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        title?: string;
        description?: string;
        url?: string;
        image?: string;
    }>(),
    {
        title: 'Inicio',
        description:
            'Consigue todo aquello que necesitas o publica tus bienes y servicios a un publico masivo en Avisalo',
        url: '/',
        image: '/assets/img/avisalo.png',
    },
);
</script>

<template>
    <Head :title="props.title">


        <meta name="description" :content="props.description">
        <link rel="canonical" :href="props.url">

        <meta property="og:type" content="website">
        <meta property="og:url" :content="props.url">
        <meta property="og:title" :content="props.title">
        <meta property="og:description" :content="props.description">
        <meta property="og:image" :content="props.image">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" :content="props.url">
        <meta name="twitter:title" :content="props.title">
        <meta name="twitter:description" :content="props.description">
        <meta name="twitter:image" :content="props.image">
    </Head>
</template>

