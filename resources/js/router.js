import Vue from 'vue';
import VueRouter from 'vue-router';
import Backend from './components/Backend';
// import Backend from './components/Backend';
import ResourceOverview from './components/ResourceOverview';
import Main from './components/Main';
import ResourceEdit from './components/ResourceEdit';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/admin', component: Main },
        { path: '/admin/resources/:id', component: ResourceOverview },
        { path: '/admin/resources/:id/edit', component: ResourceEdit },

    ],
    mode: 'history'

})

