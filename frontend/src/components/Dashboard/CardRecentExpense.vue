<script setup>
import { useTransactions } from '@/stores/transactions';

const store = useTransactions();
const recentsExpenses = ref ([]);

const expenses = computed(() => {
  return store.expenses;
});

onBeforeMount(async () => {
  recentsExpenses.value = store.expenses.slice(-5);  
  recentsExpenses.value.reverse();
});

watch(expenses, () => {
  recentsExpenses.value = store.expenses.slice(-5);  
  recentsExpenses.value.reverse();
});

const modal = ref('');
const modalOpen = computed(() => modal.value !== '');

const toggleModal = (expense) => {    
  modal.value = expense;    
  
  setTimeout(() => {    
    const modalElement = document.getElementById(`expense-${expense.id}`);
      modalElement.showModal();   
  }, 100);
};

</script>
<template>
  <div class="card min-h-[20rem] w-1/3 mt-5 p-8 bg-primary-content shadow-xl">    
    <h1 class="text-base-200 text-lg">Despesas recentes</h1>      
    <ul>            
      <li class="card-expense" v-for="expense in recentsExpenses" :key="expense.id" @click="toggleModal(expense)">
        <div class="">
          <p class="font-bold">R${{ expense.amount/100 }}</p>                          
          <p class="mt-2">{{ expense.description.substring(0, 10) }}...</p>
        </div>                
          <p>{{ new Date(expense.created_at).toLocaleDateString() }}</p>                            
      </li>
    </ul>    

    <ExpenseDetails v-if="modalOpen" :expense="modal" ></ExpenseDetails>
  </div>  
</template>
<style scoped>
.card-expense{
  @apply p-4 border-red-400 border rounded-lg mt-2 flex justify-between 
  transition-all duration-300 hover:bg-red-100 hover:border-red-500 hover:shadow-lg hover:scale-105 hover:cursor-pointer
  hover:text-gray-600
}
</style>