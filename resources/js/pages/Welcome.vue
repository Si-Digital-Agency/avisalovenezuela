<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { LucideHome } from 'lucide-vue-next';
import HeadSEO from '@/components/shared/HeadSEO.vue';
import Navbar from '@/components/shared/Navbar.vue';
import type { NavItem } from '@/types';
import AppLogo from '@/components/AppLogo.vue';
const props = withDefaults(
    defineProps<{
        canRegister: boolean;
        title?: string;
        description?: string;
        url?: string;
        image?: string;
    }>(),
    {
        canRegister: true,
        title: 'Inicio',
        description:
            'Consigue todo aquello que necesitas o publica tus bienes y servicios a un publico masivo en Avisalo',
        url: '/',
        image: '/assets/img/avisalo.png',
    },
);


</script>

<template>
    <HeadSEO v-bind="props" />
    <Navbar :can-register="props.canRegister" />

    <section class="relative h-[55vh] overflow-hidden bg-background">
        <div class="absolute top-0 z-10 flex flex-col gap-4 items-center w-full justify-center h-full">
            <h1 class="w-10/12 text-center font-brand text-xl md:text-4xl ">Todo lo que necesitas, en un solo lugar</h1>
            <p class="w-1/3 text-center">
               Consigue todo aquello que necesitas o publica tus bienes y servicios a un publico masivo 
            </p>
            <div class="mx-auto max-w-md w-1/3">
              
                <div class="relative bg-card rounded-lg overflow-hidden border border-primary">
                    <div
                        class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3"
                    >
                        <svg
                            class="text-body h-4 w-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"
                            />
                        </svg>
                    </div>
                    <input
                        type="search"
                        id="search"
                        class="bg-muted-foreground border-default-medium text-heading rounded-base focus:ring-brand focus:border-brand placeholder:text-body block w-full border p-3 ps-9 text-sm shadow-xs"
                        placeholder="Search"
                        required
                    />
                    <button
                        type="button"
                        class="bg-primary hover:bg-brand-strong focus:ring-brand-medium absolute end-1.5 bottom-1.5 box-border rounded border border-transparent px-3 py-1.5 text-xs leading-5 font-medium text-white shadow-xs focus:ring-4 focus:outline-none cursor-pointer"
                    >
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
