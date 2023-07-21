<script setup>
import { useUsers } from '@/stores/user'
import { useTransactions } from '@/stores/transactions'

const users = useUsers();
const transactions = useTransactions();

const form = ref({
    category_id: 1,
    amount: null,
    user_id: users.userData.id,    
    description: '',    
});

const addIncome = async () => {
    await transactions.createTransaction(form.value);
    form.value = {
        category_id: 1,
        amount: 0,
        user_id: users.userData.id,    
        description: '',    
    };
};
</script>
<template>
    <form action="POST">
        <div class="form-control w-full max-w-xs">
        <label class="label">
            <span class="label-text text-base-200">Valor da receita</span>          
        </label>
        <input type="number" placeholder="R$" class="input input-bordered bg-primary-content w-full max-w-xs" v-model="form.amount" required />       
        </div>
        <div class="form-control w-full max-w-xs">
        <label class="label">
            <span class="label-text text-base-200">Descrição</span>          
        </label>
        <textarea class="textarea textarea-md bg-primary-content textarea-accent" placeholder="......" v-model="form.description" required></textarea>    
        </div>
        <button class="btn btn-success text-primary-content mt-4" @click.prevent="addIncome()">Salvar</button>
    </form>
</template>
<style scoped>
input[type=number]::-webkit-inner-spin-button { 
    -webkit-appearance: none;
    
}
input[type=number] { 
   -moz-appearance: textfield;
   appearance: textfield;

}
</style>