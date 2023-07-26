import { defineStore } from 'pinia'
import axios from '@/lib/axios'
import { useStorage } from '@vueuse/core';

export const useTransactions = defineStore('transactions', {
    state: () => ({
        transactions: [],
        categories: [],
        incomes: useStorage('incomes', []),
        expenses: useStorage('expenses', []),        
        modalType: null,
    }),

    actions: {
        async getTransactions() { //Funçao para retornar todas as transactions do Laravel
            await axios.get('/api/transactions').then(response => {
                this.transactions = response.data
            })
        },   
        async getCategories(){
            await axios.get('/api/categories').then(response => {
                this.categories = response.data
            })
        },
        async createTransaction(transaction){            
            await axios.post('/api/transactions', transaction).then(response => {
               this.transactions.push(response.data)               
                this.monthTransactions()
            })
        },
        setModalType(type){
            this.modalType = type
        },
        async monthTransactions(){
            await axios.get('api/transactions/monthly').then(response => {                                
                this.incomes = response.data.incomes
                this.expenses = response.data.expenses
            })
        }
    },

    getters: {
        getMonthIncomes(){
            let total = 0
            this.incomes.forEach(income => {
                total += income.amount
            })

            return total/100
        },
        getMonthExpenses(){
            let total = 0
            this.expenses.forEach(expense => {
                total += expense.amount
            })

            return total/100
        }
    }
});