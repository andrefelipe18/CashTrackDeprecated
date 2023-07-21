<script setup>
import { useUsers } from '@/stores/user'

const users = useUsers();
const user = users.userData;

const isVisible = ref(false);

const greeting = computed(() => {
    const hour = new Date().getHours();
    if (hour >= 6 && hour < 12) {
        return { message: 'Bom dia,', emoji: '🌞' };
    } else if (hour >= 12 && hour < 18) {
        return { message: 'Boa tarde,', emoji: '🌤️' };
    } else {
        return { message: 'Boa noite,', emoji: '🌙' };
    }
});
</script>
<template>
    <div class="">
        <div class="top-user-info flex justify-between">
            <div class="greeting">
                <h1 class="ml-2 text-2xl text-neutral">{{ greeting.message }}</h1>
                <p class="ml-2 text-xl text-accent capitalize font-semibold">{{ user.name }} {{ greeting.emoji }}</p>
            </div>
            <div class="amount flex">
                <div class="divisor min-h-[1em]  mr-12"></div>
                <div class="mr-12">
                    <h1 class="text-xl text-gray-800">Saldo geral</h1>
                    <p class="text-2xl text-neutral font-semibold flex items-center">
                        <span v-if="isVisible">
                            {{ user.total_amount }}
                        </span>
                        <span v-else>
                            ********
                        </span>

                        <label class="swap swap-rotate ml-2">                          
                        <input type="checkbox" v-model="isVisible"/>                                                
                        <svg xmlns="http://www.w3.org/2000/svg" class="swap-on fill-current h-8"  viewBox="0 0 16 16"><g fill="#333"><path d="M10.5 8a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7z"/></g></svg>                                            
                        <svg xmlns="http://www.w3.org/2000/svg" class="swap-off fill-current h-8" viewBox="0 0 1200 1200"><path fill="#333" d="M669.727 273.516c-22.891-2.476-46.15-3.895-69.727-4.248c-103.025.457-209.823 25.517-310.913 73.536c-75.058 37.122-148.173 89.529-211.67 154.174C46.232 529.978 6.431 577.76 0 628.74c.76 44.162 48.153 98.67 77.417 131.764c59.543 62.106 130.754 113.013 211.67 154.174c2.75 1.335 5.51 2.654 8.276 3.955l-75.072 131.102l102.005 60.286l551.416-960.033l-98.186-60.008l-107.799 183.536zm232.836 65.479l-74.927 129.857c34.47 44.782 54.932 100.006 54.932 159.888c0 149.257-126.522 270.264-282.642 270.264c-6.749 0-13.29-.728-19.922-1.172l-49.585 85.84c22.868 2.449 45.99 4.233 69.58 4.541c103.123-.463 209.861-25.812 310.84-73.535c75.058-37.122 148.246-89.529 211.743-154.174c31.186-32.999 70.985-80.782 77.417-131.764c-.76-44.161-48.153-98.669-77.417-131.763c-59.543-62.106-130.827-113.013-211.743-154.175c-2.731-1.324-5.527-2.515-8.276-3.807zm-302.636 19.483c6.846 0 13.638.274 20.361.732l-58.081 100.561c-81.514 16.526-142.676 85.88-142.676 168.897c0 20.854 3.841 40.819 10.913 59.325c.008.021-.008.053 0 .074l-58.228 100.854c-34.551-44.823-54.932-100.229-54.932-160.182c.001-149.255 126.524-270.262 282.643-270.261zm168.969 212.035L638.013 797.271c81.076-16.837 141.797-85.875 141.797-168.603c0-20.474-4.086-39.939-10.914-58.155z"/></svg>                        
                        </label>
                    </p>
                </div>
                <div class="min-h-[200%] divisor mr-6"></div>
            </div>
        </div>
        <div class="bot-user-info mt-4 flex">
            <div class="bg-primary-content shadow-xl p-5 rounded-xl ml-28 w-fit border border-emerald-400">
                <h1 class="text-lg text-gray-800 text-center">Receita mensal</h1>
                <p class="text-lg text-emerald-400 text-center font-semibold">{{ user.total_amount }}</p>
            </div>
            <div class="bg-primary-content shadow-xl p-5 rounded-xl w-fit ml-2 border border-red-400">
                <h1 class="text-lg text-gray-800 text-center">Despesa mensal</h1>
                <p class="text-lg text-red-400 text-center font-semibold">{{ user.total_amount }}</p>
            </div>
            <div class="bg-primary-content shadow-xl p-5 rounded-xl w-fit ml-2 border border-yellow-400 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="#facc15" fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61l4.15-5.073a.5.5 0 0 1 .704-.07Z"/></svg>
                <h1 class="text-lg text-gray-800 text-center ml-2">Gerar relatório</h1>                
            </div>
        </div>
    </div>
</template>
<style scoped>
.divisor {
    @apply inline-block h-24 w-0.5 self-stretch bg-black opacity-100 dark:opacity-50
}
</style>