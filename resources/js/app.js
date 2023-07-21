import './bootstrap';

import { createApp } from 'vue';
import ExampleTest from './components/ExempleTest.vue'

const app = createApp({
    components: {
        ExampleTest
    }
});

app.mount('#app')
