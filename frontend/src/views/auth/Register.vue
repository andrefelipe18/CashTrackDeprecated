<script setup>
import { useUsers } from '@/stores/user'
import GuestLayout from '@/layouts/GuestLayout.vue'

const store = useUsers()

const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
})

const processing = ref(false)

const setErrors = ref()

const errors = computed(() => setErrors.value)

const submitRegister = () => {
    store.register(form, setErrors, processing)
};
</script>

<template>
    <GuestLayout>
        <ValidationErrors class="mb-4" :errors="errors" />

        <form @submit.prevent="submitRegister">
            <div>
                <InputLabel for="name" value="Nome" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Senha" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    value="Confirme sua senha" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <router-link
                    to="/login"
                    class="underline text-sm text-gray-600 hover:text-gray-900">
                    Já está registrado?
                </router-link>

                <PrimaryButton class="ml-4" :processing="processing">
                    Registrar
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
