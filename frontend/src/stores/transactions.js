import { defineStore } from 'pinia'
import axios from '@/lib/axios'

export const useTransactions = defineStore('transactions', {
    state: () => ({
        transactions: [],
        categories: [],
        modalType: null
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
            })
        },
        setModalType(type){
            this.modalType = type
        }
    },

    getters: {

    }
});