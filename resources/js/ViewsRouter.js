import { createRouter, createWebHistory } from 'vue-router';
import App from '../vueFiles/app.vue';
import Auth from '../vueFiles/views/AuthenticationForm.vue';

const routes = [
  {
    path: '/',
    name: 'App',
    component: App
  },
  {
    path: '/Auth',
    name: 'Auth',
    component: Auth
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
