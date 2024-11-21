<script setup lang="ts">

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link, usePage} from '@inertiajs/vue3';
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {faPlus, faEllipsisH, faEdit, faTrashCan, faEye, faEyeSlash} from "@fortawesome/free-solid-svg-icons";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import {useToast} from "vue-toastification";
import Swal from 'sweetalert2'
import {inject} from 'vue';
import {router} from '@inertiajs/vue3'


const route = inject('route');

defineProps({
    products: Array<any>
})


const page: any = usePage()
if (page.props.flash.message) {
    useToast().success(page.props.flash.message!)
}

const handleDeleteProduct = (product: any) => {
    Swal.fire({
        icon: "warning",
        title: "¿Estas seguro de eliminar este producto?",
        text: "Esta acción no se puede deshacer",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar",
        denyButtonText: `No, cancelar`
    }).then((result) => {
        if (result.isConfirmed) {
            return router.delete(`/productos/${product.code}`, {
                onSuccess: (data) => {
                    console.log(data);
                }
            })
        }
    })

}

</script>

<template>
    <Head title="Inventario"/>

    <AuthenticatedLayout>

        <div class="mt-4 mx-8">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-slate-600">Inventario</h1>
                <Link
                    class="bg-white rounded-full py-2 px-5 shadow-lg group hover:bg-neutral-400 hover:text-white w-full sm:w-fit"
                    :href="route('productos.create')">
                    <FontAwesomeIcon
                        :icon="faPlus"
                        class="mr-2 text-blue-600 group-hover:text-white"/>
                    <span>Nuevo producto</span>
                </Link>
            </div>
            <div class="bg-white mt-5 p-5 rounded-xl shadow-lg">
                <table class="table-auto border-collapse border w-full">
                    <thead>
                    <tr class="bg-neutral-100 text-slate-600">
                        <th class="py-4">Código</th>
                        <th class="py-4">Descripción</th>
                        <th class="py-4">Precio unitario</th>
                        <th class="py-4">Stock</th>
                        <th class="py-4">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(p) in products" :key="p.code" class="hover:bg-gray-100 border">
                        <td class="py-4 text-center">{{ p.code }}</td>
                        <td class="py-4 pl-2">{{ p.description }}</td>
                        <td class="py-4 text-center">$ {{ p.price }}</td>
                        <td class="py-4 text-center">{{ p.stock }}</td>
                        <td class="py-4">
                            <Dropdown class="text-center cursor-pointer">
                                <template #trigger>
                                    <FontAwesomeIcon :icon="faEllipsisH" class="text-xl"/>
                                </template>
                                <template #content>
                                    <DropdownLink
                                        :href="route('productos.edit', p.code)"
                                    >
                                        <FontAwesomeIcon :icon="faEdit" class="mr-2"/>
                                        <span>Editar</span>
                                    </DropdownLink>
                                    <DropdownLink :href="route('productos.toggle', p.code)">
                                        <FontAwesomeIcon :icon="faEyeSlash" class="mr-2"/>
                                        <span>Desactivar</span>
                                    </DropdownLink>
                                    <DropdownLink @click="() => handleDeleteProduct(p)" href="null">
                                        <FontAwesomeIcon :icon="faTrashCan" class="mr-2"/>
                                        <span>Eliminar</span>
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
