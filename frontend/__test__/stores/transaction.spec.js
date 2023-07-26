import { describe, it, expect, beforeEach } from 'vitest' 
import { setActivePinia, createPinia } from 'pinia'
import { useTransactions } from '../../src/stores/transactions';

describe('transactionsStore', () => {
    beforeEach(() => {
        setActivePinia(createPinia())
    });

    it('should return transactions', () => { //Deve retornar as transactions
        const store = useTransactions();
        expect(store.transactions).toEqual([]);
    });

    it('should return categories', () => { //Deve retornar as categorias
        const store = useTransactions();
        expect(store.categories).toEqual([]);
    });

    it('should return incomes', () => { //Deve retornar os incomes
        const store = useTransactions();
        expect(store.incomes).toEqual([]);
    });

    it('should return expenses', () => { //Deve retornar os expenses
        const store = useTransactions();
        expect(store.expenses).toEqual([]);
    });

    it('should return modalType', () => { //Deve retornar o modalType
        const store = useTransactions();
        expect(store.modalType).toEqual(null);
    });

    it('should return monthIncomes', () => { //Deve retornar os monthIncomes
        const store = useTransactions();
        expect(store.getMonthIncomes).toEqual(0);
    });

    it('should return monthExpenses', () => { //Deve retornar os monthExpenses
        const store = useTransactions();
        expect(store.getMonthExpenses).toEqual(0);
    });

});