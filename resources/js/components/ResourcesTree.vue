<template>
    <div>
        <div v-if="loading">Loading</div>
        <div v-else>
            <div v-for="resource in resources" v-bind:key="resource.id">
                <router-link :to="'/admin/resources/' + resource.id" class="hover:bg-gray-100">
                    <p class="text-blue-800 text-xs border-gray-300 border-b">{{ resource.title }}</p>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ResourcesList",

    components: {},

    props: [],

    mounted() {
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

