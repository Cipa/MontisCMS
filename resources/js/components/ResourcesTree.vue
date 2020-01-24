<template>
    <div>
        <div v-if="loading">Loading</div>
        <div v-else>
            <b-menu>
                <b-menu-list v-for="resource in resources" v-bind:key="resource.id">
                    <b-menu-item
                        :label="resource.title"
                        tag="router-link"
                        :to="'/' + $parent.config.path + '/resources/' + resource.id"
                    ></b-menu-item>
                </b-menu-list>
            </b-menu>
        </div>
    </div>
</template>

<script>
export default {
    name: "ResourcesList",

    components: {},

    props: ["config"],

    mounted() {
        // console.log(this.$parent.config.path);
        // console.log(this.props);
        // console.log(this.$props.config);
        // console.log(this.$root.config);
        // console.log(this.config);

        axios
            .get("/api/resources")
            .then(response => {
                this.resources = response.data.data;
                this.loading = false;
            })
            .catch(error => {
                this.loading = false;
                alert("Unable to fetch resources.");
            });
    },

    data: function() {
        return {
            loading: true,
            resources: null
        };
    }
};
</script>

