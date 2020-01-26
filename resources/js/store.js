import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        resourcesTree: [],
        //globalLoading: false, //not used
        //reloadTree: false //watch for reload tree - not used
    },
    actions: {
        loadResourcesTree({ commit }) {
            axios.get('/api/resources').then(result => {
                commit('LOAD_RESOURCES_TREE', result.data.data);
            }).catch(error => {
                alert("Unable to fetch the tree.");
                //throw new Error(`API ${error}`);
            });
        }
    },
    mutations: {
        // setGlobalLoading(state, globalLoading) {
        //     state.globalLoading = globalLoading;
        // },
        // reloadTree(state) {
        //     state.reloadTree = true;
        // },
        LOAD_RESOURCES_TREE(state, resourcesTree) {
            state.resourcesTree = resourcesTree;
        },
    }
})
