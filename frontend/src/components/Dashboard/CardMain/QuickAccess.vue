<script setup>
import { useTransactions } from '@/stores/transactions';

const store = useTransactions();

const modal = ref('');

const toggleModal = (type) => {    
    modal.value = type;    
    
    setTimeout(() => {    
        const modalElement = document.getElementById(modal.value);
        modalElement.showModal();   
    }, 100);
}
</script>
<template>
    <div class="quick-access flex flex-col">
        <h1 class="text-xl text-base-200">Acesso rápido</h1>
        <div class="quick-access-buttons flex flex-around mt-8 mx-auto">
            <button class="income flex flex-col justify-center border border-emerald-300 p-6 rounded-xl" @click="toggleModal('income')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 mb-2" viewBox="0 0 20 20"><path fill="#78c68c" d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20a10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16z"/></svg>
                <p>Receita</p>
            </button>
            <button class="expense flex flex-col border border-red-400 p-6 ml-6 rounded-xl" @click="toggleModal('expense')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 mb-2" viewBox="0 0 20 20"><path fill="#fe0000" d="M10 20a10 10 0 1 1 0-20a10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16zm5-9v2H5V9h10z"/></svg>
                <p>Despesa</p>
            </button>
        </div>
        
        <ModalQuickAccess :id="modal"></ModalQuickAccess>
    </div>
</template>