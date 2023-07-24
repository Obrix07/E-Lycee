import './bootstrap';

import { createApp } from 'vue';
import PairTable from './components/PairTable.vue';
import EditPair from './components/EditPair.vue'; 
import Alpine from 'alpinejs';


const app = createApp({
  components: {
    PairTable,
    EditPair,
  },
});

window.Alpine = Alpine;
app.mount('#app');
Alpine.start();
