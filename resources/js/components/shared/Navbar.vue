<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { useWindowSize } from '@vueuse/core';
import { Menu, XCircle, ChevronDown } from 'lucide-vue-next';
import { computed, ref, type Ref } from 'vue';
import { dashboard, login, register } from '@/routes';
import AppLogo from '../AppLogo.vue';
import ThemeChanger from './ThemeChanger.vue';
const { width } = useWindowSize();

const isDesktop: Ref<boolean> = computed(() => width.value >= 1024);

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);
const isActive: Ref<boolean> = ref(false);
const page = usePage();
const auth = computed(() => page.props.auth);
</script>

<template>
    <nav class="relative">
        <section
            class="flex h-[10vh] items-center justify-between bg-primary dark:bg-black px-10"
        >
            <AppLogo class="w-48" />

            <div
                class="text-carbon-black-text flex items-center font-semibold"
            >
                <div v-if="isDesktop" class="flex items-center space-x-4">
                    <template v-if="auth.user">
                        <Link
                            :href="dashboard()"
                            class="transition-colors hover:text-white"
                        >
                            Panel de Control
                        </Link>

                        <Link
                            href="/logout"
                            method="post"
                            as="button"
                            class="transition-colors hover:text-white"
                        >
                            Cerrar Sesión
                        </Link>
                    </template>

                    <template v-else>
                        <Link
                            :href="login()"
                            class="transition-colors hover:text-white px-4 py-2 border border-white dark:border-primary rounded-md"
                        >
                            Iniciar Sesión
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="register()"
                            class="rounded-md bg-white text-black dark:text-primary px-4 py-2 shadow-sm transition-all hover:bg-gray-100"
                        >
                            Registrarse
                        </Link>
                    </template>
                </div>
                <ThemeChanger class="ml-5"/>
                <button class="group cursor-pointer p-3 ">
                    <Menu
                        @click="isActive = !isActive"
                        class="size-12 md:size-10 duration-300 group-hover:scale-115"
                    />
                </button>
            </div>
        </section>
        <Transition name="slide-bounce">
            <section
                v-if="isActive"
                class="fixed top-0 right-0 z-50 flex h-screen w-80 flex-col bg-primary px-10 py-4 shadow-2xl"
            >
                <div class="flex items-center gap-4">
                    <XCircle
                        @click="isActive = false"
                        class="text-carbon-black-text h-full cursor-pointer pt-2 duration-300 hover:scale-115"
                    />
                    <AppLogo class="w-34" />
                </div>

                <hr class="my-2 border-black" />
                <Link
                    class="flex items-center gap-3 text-black duration-200 hover:text-white"
                    >Inmuebles <ChevronDown
                /></Link>
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Compra y venta
                </Link>

                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Alquiler</Link
                >

                <Link
                    class="flex items-center gap-3 text-black duration-200 hover:text-white"
                    >Vehiculo <ChevronDown
                /></Link>
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Motos</Link
                >
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Automoviles</Link
                >
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Camionetas</Link
                >
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Taxis</Link
                >
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Pesados</Link
                >
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Otros Vehiculos
                </Link>
                <Link
                    class="flex items-center gap-3 text-black duration-200 hover:text-white"
                    >Empleos <ChevronDown />
                </Link>
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Empleos generales</Link
                >
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Empleos Especializados</Link
                >
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Empleos de servicio domestico
                </Link>
                <Link
                    class="flex items-center gap-3 text-black duration-200 hover:text-white"
                    >Servicios <ChevronDown />
                </Link>
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Servicios a domicilio</Link
                >
                <Link class="ml-8 text-black duration-200 hover:text-white"
                    >Servicios Especializados</Link
                >
                <hr class="my-2 border-black" />
                <div v-if="!isDesktop" class=" space-x-4 text-lg">
                    <template v-if="auth.user">
                        <Link
                            :href="dashboard()"
                            class="flex items-center gap-3 text-black duration-200 hover:text-white"
                        >
                            Panel de Control
                        </Link>

                        <Link
                            href="/logout"
                            method="post"
                            as="button"
                            class="flex items-center gap-3 text-black duration-200 hover:text-white"
                        >
                            Cerrar Sesión
                        </Link>
                    </template>

                    <template v-else>
                        <Link
                            :href="login()"
                            class="flex items-center gap-3 text-black duration-200 hover:text-white"
                        >
                            Iniciar Sesión
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="register()"
                            class="flex items-center gap-3 text-black duration-200 hover:text-white"
                        >
                            Registrarse
                        </Link>
                    </template>
                </div>

                <Link
                    class="flex items-center gap-3 text-lg text-black underline duration-200 hover:text-white"
                    >Publica tu anuncio
                </Link>
            </section>
        </Transition>
        <Transition name="show">
            <section
                v-if="isActive"
                class="fixed top-0 right-0 z-40 flex h-screen w-full flex-col bg-gray-600/50 px-10 py-4 shadow-2xl blur-2xl"
            ></section>
        </Transition>
    </nav>
</template>

<style scoped>
/* Estado inicial (fuera de la pantalla a la derecha) */
.slide-bounce-enter-from {
    transform: translateX(100%);
    opacity: 0;
}

/* Animación de entrada con efecto rebote */
.slide-bounce-enter-active {
    transition: all 0.3s cubic-bezier(0.34, 0.95, 0.64, 1);
}

/* Estado final (posición original) */
.slide-bounce-enter-to {
    transform: translateX(0);
    opacity: 1;
}

/* Animación de salida (más suave y rápida) */
.slide-bounce-leave-active {
    transition: all 0.3s ease-in;
}

.slide-bounce-leave-to {
    transform: translateX(100%);
    opacity: 0;
}
.show-enter-from {
    opacity: 0;
}
.show-enter-active,
.show-leave-active {
    transition: all 0.2s;
}
.show-enter-to {
    opacity: 1;
}
</style>
