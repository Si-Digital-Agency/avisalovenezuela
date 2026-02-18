<script setup>
import { Moon, Sun } from 'lucide-vue-next';
import { computed } from 'vue';
import { useAppearance } from '@/composables/useAppearance';

const { appearance, updateAppearance } = useAppearance();

const checkAppearance = computed(()=>{
    if(appearance.value === 'light') return 'top-0'
    return 'bottom-0'
})


</script>

<template>
    <section class="size-8 relative overflow-hidden cursor-pointer">
            <button :class="checkAppearance" @click="updateAppearance(appearance === 'light' ? 'dark' : 'light')" class="cursor-pointer absolute duration-600 ">
                <Sun class="size-8"/>
                <Moon class="size-8"/>
            </button>
    </section>
</template>

<style scoped>

</style>

