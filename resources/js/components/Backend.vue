<template>
    <div class="wrapper">
        <b-navbar class="has-border-bottom-width-3">
            <template slot="brand">
                <b-navbar-item
                    tag="router-link"
                    :to="{path: '/' + config.path}"
                    class="is-size-5"
                >MontisCMS</b-navbar-item>
            </template>

            <template slot="end">
                <b-navbar-item tag="div">
                    <div class="buttons">
                        <a class="button is-primary">
                            <strong>Config</strong>
                        </a>
                        <a class="button is-light">Log Out</a>
                    </div>
                </b-navbar-item>
            </template>
        </b-navbar>
        <div class="wrapper2">
            <aside class="has-border-right-width-3">
                <ResourcesTree></ResourcesTree>
            </aside>

            <main>
                <router-view :key="$route.fullPath"></router-view>
            </main>
        </div>
    </div>
</template>

<script>
import ResourcesTree from "./ResourcesTree";

export default {
    name: "Backend",
    props: ["config"],
    mounted() {},
    components: {
        ResourcesTree
    },
    data: function() {
        return {};
    }
};
</script>

