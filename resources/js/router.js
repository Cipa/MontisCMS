import Vue from 'vue';
import VueRouter from 'vue-router';
import Backend from './components/Backend';
// import Backend from './components/Backend';
import ResourceShow from './components/ResourceShow';
import Main from './components/Main';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/admin', component: Main },
        { path: '/admin/resources/:id', component: ResourceShow }

    ],
    mode: 'history'

})

