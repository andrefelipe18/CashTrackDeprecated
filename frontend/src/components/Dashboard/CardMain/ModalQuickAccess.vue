<script setup>
const props = defineProps({
    id: {
        type: String,        
    }
});
</script>
<template>
    <div class="">        
        <dialog :id="id" class="modal">
        <form method="dialog" class="modal-box bg-primary-content shadow-2xl">
            <div v-if="id == 'income'">
                <FormIncome></FormIncome>
            </div>
            <div v-else-if="id == 'expense'">
                
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
        </dialog>
    </div>
</template>