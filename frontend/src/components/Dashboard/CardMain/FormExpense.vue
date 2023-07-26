<script setup>
import { useUsers } from '@/stores/user'
import { useTransactions } from '@/stores/transactions'

const users = useUsers();
const transactions = useTransactions();

const categories = ref([]);

const form = ref({
    category_id: null,
    amount: null,
    user_id: users.userData.id,    
    description: '',    
});

const loading = ref(false);
const addExpense = async () => {   
    loading.value = true; 
    await transactions.createTransaction(form.value);
    form.value = {
        category_id: null,
        amount: 0,
        user_id: users.userData.id,    
        description: '',    
    };

    loading.value = false;
    
    const modal = document.getElementById('expense');
    modal.close();
    
    users.getData(); //Att user data        
};

onMounted(async () => {    
    await transactions.getCategories();    
    
    categories.value = transactions.categories.filter((categorie) => {
        return categorie.id != 1;
    });
});
</script>
<template>
    <form action="POST">
        <div class="form-control w-full max-w-xs">
        <label class="label">
            <span class="label-text text-base-200">Categoria da despesa</span>          
        </label>
        <select class="select select-bordered bg-primary-content w-full max-w-xs" v-model="form.category_id" required>
            <option disabled selected>Seleciona uma categoria</option>
            <option v-for="categorie in categories" :key="categorie.id" :value="categorie.id">{{ categorie.name }}</option>            
        </select>
        </div>
        <div class="form-control w-full max-w-xs">
        <label class="label">
            <span class="label-text text-base-200">Valor da despesa</span>          
        </label>
        <input v-model="form.amount" type="number" placeholder="R$" class="input input-bordered bg-primary-content w-full max-w-xs" required />       
        </div>
        <div class="form-control w-full max-w-xs">
        <label class="label">
            <span class="label-text text-base-200">Descrição</span>          
        </label>
        <textarea v-model="form.description" class="textarea textarea-md bg-primary-content textarea-accent" placeholder="......" required></textarea>    
        </div>
        <button class="btn btn-success text-primary-content mt-4" @click.prevent="addExpense()" v-if="!loading">Salvar</button>
        <button class="btn btn-success text-primary-content mt-4" v-else><span class="loading loading-dots loading-lg"></span></button>
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