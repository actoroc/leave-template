import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from 'views/Home';
const empleave = () => import('views/EmpLeave');
const calendar = () => import('views/CalenDar');
const checkleave = () => import('views/CheckLeave');
const login = () => import('views/login');
const testemp = () => import('views/TestEmp');
const file = () => import('views/file');
const mfile = () => import('views/mfile');
const leaverecord = () => import('views/leaveRecord');
Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    redirect: '/login',
  },
  {
    path: '/login',
    name: 'login',
    component: login,
  },
  {
    path: '/home',
    name: 'home',
    component: Home,
  },
  {
    path: '/empleave',
    name: 'EmpLeave',
    component: empleave,
    meta: {
      auth: true,
    },
  },
  {
    path: '/calendar',
    name: 'CalenDar',
    component: calendar,
  },
  {
    path: '/checkleave',
    name: 'CheckLeave',
    component: checkleave,
  },
  {
    path: '/testemp',
    name: 'TestEmp',
    component: testemp,
  },
  {
    path: '/file',
    name: 'file',
    component: file,
  },
  {
    path: '/mfile',
    name: 'mfile',
    component: mfile,
  },
  {
    path: '/leaverecord',
    name: 'leaverecord',
    component: leaverecord,
  },
];
const originalPush = VueRouter.prototype.push;
VueRouter.prototype.push = function push(location) {
  return originalPush.call(this, location).catch((err) => err);
};
const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
});
router.beforeEach((to, from, next) => {
  if (to.matched.some((m) => m.meta.auth)) {
    if (sessionStorage.getItem('user')) {
      next();
    } else {
      next({ path: '/login', query: { Rurl: to.fullPath } });
    }
  } else {
    next();
  }
});
export default router;
