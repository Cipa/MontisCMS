import Vue from 'vue';
import VueRouter from 'vue-router';
// import Backend from './components/Backend';
// import Backend from './components/Backend';
import ResourceOverview from './components/ResourceOverview';
import Dashboard from './components/Dashboard';
import ResourceEdit from './components/ResourceEdit';

Vue.use(VueRouter);

export default new VueRouter({
    base: '/backend/', //TODO: this needs to be comming from the blade file config prop, or maybe from some global js ariable
    routes: [
        { path: '', name: 'dashboard', component: Dashboard },
        { path: '/resources/:id', name: 'resourceOverview', component: ResourceOverview },
        { path: '/resources/:id/edit', name: 'resourceEdit', component: ResourceEdit },
    ],
    mode: 'history'
})

