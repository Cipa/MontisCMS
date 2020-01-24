import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        globalLoading: false
    },
    mutations: {

        setGlobalLoading(state, globalLoading) {
            state.globalLoading = globalLoading;
        },
    }
})
