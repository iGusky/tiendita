<script setup lang="ts">
import {Head, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputError from "@/Components/InputError.vue";
import {Link} from '@inertiajs/vue3';

const product = useForm({
    code: '',
    description: '',
    price: 0,
    stock: 0,
})
const handleCancel = () => {
    window.location.href = route('productos.index')
}
</script>

<template>
    <Head title="Agregar producto"/>
    <AuthenticatedLayout>
        <div class="flex justify-center pt-10">
            <form @submit.prevent="product.post(route('productos.store'), {onSuccess: ()  => product.reset()})"
                  class="bg-white w-fit h-fit p-10 rounded-2xl shadow-lg">
                <div>
                    <InputLabel>Código *</InputLabel>
                    <TextInput v-model="product.code"></TextInput>
                    <InputError :message="product.errors.code" class="mt-2"/>
                </div>
                <div>
                    <InputLabel>Descripción *</InputLabel>
                    <TextInput v-model="product.description"></TextInput>
                    <InputError :message="product.errors.description" class="mt-2"/>

                </div>
                <div>
                    <InputLabel>Precio unitario *</InputLabel>
                    <TextInput type="number" v-model="product.price" :step=".01"></TextInput>
                    <InputError :message="product.errors.price" class="mt-2"/>

                </div>
                <div>
                    <InputLabel>Cantidad a agregar *</InputLabel>
                    <TextInput type="number" v-model="product.stock" :step=".01"></TextInput>
                    <InputError :message="product.errors.stock" class="mt-2"/>

                </div>
                <div class="flex justify-evenly pt-5 ">
                    <SecondaryButton>
                        <Link :href="route('productos.index')">Cancelar</Link>
                    </SecondaryButton>
                    <PrimaryButton>Guardar</PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
