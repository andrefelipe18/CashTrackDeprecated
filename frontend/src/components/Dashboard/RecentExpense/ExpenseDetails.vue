<script setup>
import { useTransactions } from '@/stores/transactions';

const props = defineProps({
    expense: {
        type: Object,
    }
});

const store = useTransactions();

const removeExpense = async () => {
    await store.deleteTransaction(props.expense.id);
    const modal = document.getElementById(`expense-${props.expense.id}`);
    modal.close();
};
</script>
<template>
    <div class="">
        <dialog :id="`expense-${expense.id}`" class="modal">
            <form method="dialog" class="modal-box bg-primary-content shadow-2xl ">
                <div class="flex justify-between">
                    <div class="text-gray-600">
                        <p class="text-lg">R${{ expense.amount / 100 }}</p>
                        <p class="text-lg">{{ expense.description }}</p>
                    </div>
                    <div class="">
                        <p class="text-lg">{{ new Date(expense.created_at).toLocaleString() }}</p>
                    </div>
                </div>

                <!-- Botoes de açoes -->
                <div class="flex w-1/2 justify-between mt-6">
                    <button class="btn btn-primary" @click="editExpense()">Fechar</button>
                    <button class="btn btn-error" @click="removeExpense()">Excluir</button>
                </div>
            </form>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    </div>
</template>