<template>
    <b-menu>
        <b-menu-list v-for="resource in resourcesTree" v-bind:key="resource.id">
            <b-menu-item
                :label="resource.title"
                tag="router-link"
                :to="{name: 'resourceOverview', params: { id: resource.id }}"
            ></b-menu-item>
        </b-menu-list>
    </b-menu>
</template>

<script>
import { mapState } from "vuex";

export default {
    name: "ResourcesTree",
    computed: mapState(["resourcesTree"]),
    created() {
        this.$store.dispatch("loadResourcesTree");
    }
};
</script>

