import Vue from 'vue';
import VueRouter from 'vue-router';
// import Backend from './components/Backend';
// import Backend from './components/Backend';
import ResourceOverview from './components/ResourceOverview';
import Dashboard from './components/Dashboard';
import ResourceEdit from './components/ResourceEdit';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/admin', component: Dashboard },
        { path: '/admin/resources/:id', component: ResourceOverview },
        { path: '/admin/resources/:id/edit', component: ResourceEdit },

    ],
    mode: 'history'

})

