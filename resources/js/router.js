import Vue from 'vue';
import VueRouter from 'vue-router';
import Backend from './components/Backend';
import ResourceShow from './components/ResourceShow';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/admin', component: Backend },
        { path: '/admin/resources/:id', component: ResourceShow, props: true }

    ],
    mode: 'history'

})

