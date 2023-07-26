import { describe, it, expect } from 'vitest' 
import { mount } from '@vue/test-utils'
import ApplicationLogo from '../../src/components/ApplicationLogo.vue'

describe('ApplicationLogo', () => {
    
    it('should render correctly', () => { //Deve renderizar corretamente
        const wrapper = mount(ApplicationLogo);
        expect(wrapper.html()).toMatchSnapshot(); 
    })
});
//Explicação sobre o snapshot
//O snapshot é um arquivo que contém uma representação do componente no momento em que o teste foi executado.