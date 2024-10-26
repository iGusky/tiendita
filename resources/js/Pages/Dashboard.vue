<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import {faMoneyBill, faBoxesStacked} from "@fortawesome/free-solid-svg-icons";
import {Link} from '@inertiajs/vue3';

</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                ¿Qué deseas realizar?
            </h2>
        </template>

        <div class="flex flex-col sm:flex-row font-sans justify-evenly items-center h-96 p-10">
            <div
                class="flex flex-col group bg-white shadow-lg rounded-lg size-48 flex items-center justify-center text-xl hover:bg-neutral-400 hover:text-white hover:cursor-pointer transition font-medium">
                <span>VENTA</span>
                <FontAwesomeIcon :icon="faMoneyBill" class="text-blue-500 group-hover:text-white transition"/>
            </div>
            <Link
                class="flex flex-col group bg-white shadow-lg rounded-lg size-48 flex items-center justify-center text-xl hover:bg-neutral-400 hover:text-white hover:cursor-pointer transition font-medium"
                :href="route('productos.index')">
                <span>INVENTARIO</span>
                <FontAwesomeIcon :icon="faBoxesStacked" class="text-blue-500 group-hover:text-white transition"/>
            </Link>
        </div>
    </AuthenticatedLayout>
</template>
