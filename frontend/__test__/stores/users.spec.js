import { describe, it, expect, beforeEach, test } from 'vitest' 
import { setActivePinia, createPinia } from 'pinia'
import { useUsers } from '../../src/stores/user';

describe('usersStore', () => {
    beforeEach(() => {
        setActivePinia(createPinia())
    });

    test('should return userData', () => { //Deve retornar os userData
        const store = useUsers();    
        expect(store.userData).toEqual([]);
    });

    test('should return authStatus', () => { //Deve retornar o authStatus
        const store = useUsers();
        expect(store.authStatus).toEqual([]);
    });

    test('should return authUser', () => { //Deve retornar o authUser
        const store = useUsers();
        expect(store.authUser).toEqual(false);
    });

    test('should return hasUserData', () => { //Deve retornar o hasUserData
        const store = useUsers();
        expect(store.hasUserData).toEqual(false);
    });

    test('should return hasVerified', () => { //Deve retornar o hasVerified
        const store = useUsers();
        expect(store.hasVerified).toEqual(false);
    });   
}); 