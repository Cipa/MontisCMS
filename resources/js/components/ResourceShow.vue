<template>
    <div>
        <div v-if="loading">Loading</div>
        <div v-else>
            <p class="pt-6 text-gray-600 text-sm">Title: {{resource.title}}</p>
            <p class="pt-6 text-gray-600 text-sm">Menu Title: {{resource.menu_title}}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "ResourceShow",

    components: {},
    props: ["endpoint"],
    mounted() {
        axios
            .get(this.endpoint + "/" + this.$route.params.id)
            .then(response => {
                this.resource = response.data.data;
                this.loading = false;
            })
            .catch(error => {
                this.loading = false;
                alert("Unable to fetch the resource.");
            });
    },
    data: function() {
        return {
            resource: null,
            loading: true
        };
    }
};
</script>

