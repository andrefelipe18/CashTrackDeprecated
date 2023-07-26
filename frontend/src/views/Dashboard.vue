<script setup>
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import CardRecentExpense from '@/components/Dashboard/CardRecentExpense.vue'
import { useTransactions } from '@/stores/transactions'
import { useUsers } from '@/stores/user'


const users = useUsers();
const user = users.userData;

const transactions = useTransactions();

onBeforeMount(async () => {    
    await transactions.getTransactions();    
    await transactions.monthTransactions();
});
</script>

<template>
    <AuthenticatedLayout>

       <Suspense>
            <template #default>
                <DashboardLayout>
                    <CardMain></CardMain>
                    <CardRecentExpense></CardRecentExpense>
                </DashboardLayout>
            </template>

            <template #fallback>
                <span class="loading loading-dots loading-lg"></span>
            </template>
       </Suspense>

    </AuthenticatedLayout>
</template>
<style scoped>
</style>