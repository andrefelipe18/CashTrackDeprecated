<script setup>
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import { useUsers } from '@/stores/user'

const store = useUsers();

</script>

<template>
    <AuthenticatedLayout>

       <DashboardLayout>
            {{ store.userData }}
       </DashboardLayout>

    </AuthenticatedLayout>
</template>
<style scoped>
</style>