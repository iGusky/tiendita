<script setup lang="ts">
import {Head, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputError from "@/Components/InputError.vue";

const product = useForm({
    code: '',
    description: '',
    price: 0,
    stock: 0,
})
</script>

<template>
    <Head title="Agregar producto"/>
    <AuthenticatedLayout>
        <form @submit.prevent="product.post(route('productos.store'), {onSuccess: ()  => product.reset()})">
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
            <div>
                <SecondaryButton>Cancelar</SecondaryButton>
                <PrimaryButton>Guardar</PrimaryButton>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
