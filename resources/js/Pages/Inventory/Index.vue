<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link} from '@inertiajs/vue3';
import {faBoxesStacked, faMoneyBill} from "@fortawesome/free-solid-svg-icons";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faPlus} from "@fortawesome/free-solid-svg-icons";


</script>

<template>
    <Head title="Inventario"/>
    <AuthenticatedLayout>
        <div class="mt-8 mx-8">
            <div class="flex justify-end">
                <Link
                    class="bg-white rounded-xl p-5 shadow-lg group hover:bg-neutral-400 hover:text-white w-full sm:w-fit"
                    :href="route('productos.create')">
                    <FontAwesomeIcon :icon="faPlus" class="mr-2 text-blue-600 group-hover:text-white"/>
                    <span>REGISTRAR PRODUCTO</span>
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
