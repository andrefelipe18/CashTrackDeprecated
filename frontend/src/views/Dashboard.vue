<script setup>
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import { useTransactions } from '@/stores/transactions'
import { useUsers } from '@/stores/user'


const users = useUsers();
const user = users.userData;

const transactions = useTransactions();

onBeforeMount(async () => {    
    await transactions.getTransactions();    
});
</script>

<template>
    <AuthenticatedLayout>

       <DashboardLayout>
            <CardMain></CardMain>

            
       </DashboardLayout>

    </AuthenticatedLayout>
</template>
<style scoped>
</style>