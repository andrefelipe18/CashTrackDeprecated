import { describe, it, expect } from 'vitest' 
import { mount } from '@vue/test-utils'
import Checkbox from '../../src/components/Checkbox.vue'

describe('CheckBox', () => {
    it('should render correctly', () => { //Deve renderizar corretamente com as props passadas
        const wrapper = mount(Checkbox, {name: 'remember', checked: true}); 
        expect(wrapper.html()).toMatchSnapshot();
    });    
});

/*
<script setup>

const emit = defineEmits(['update:checked'])

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        default: null,
    },
})

const proxyChecked = computed({
    get() {
        return props.checked
    },

    set(val) {
        emit('update:checked', val)
    },
});
</script>

<template>
    <input
        v-model="proxyChecked"
        type="checkbox"
        :value="value"
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
</template>
*/