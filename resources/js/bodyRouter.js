import { createRouter, createWebHistory } from 'vue-router';
import Body from '../vueFiles/body.vue';
import Profile from '../vueFiles/views/UserProfile.vue'
import Dashboard from '../vueFiles/views/DashBoard.vue'


const routes = [
  {
    path: '/main',
    name: 'Dashboard',
    component: Dashboard
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
