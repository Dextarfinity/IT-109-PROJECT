import './bootstrap';
import { createApp } from 'vue';
import Auth from '../vueFiles/auth.vue'; // Adjust path

const auth = createApp(Auth);
auth.mount('#auth');
