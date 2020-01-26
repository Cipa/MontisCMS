<template>
    <div>
        <div v-if="loading">Loading</div>
        <div v-else>
            <div class="buttons justify-end">
                <b-button
                    tag="router-link"
                    :to="{name: 'resourceEdit', params: { id: resource.id }}"
                    type="is-primary"
                >Edit</b-button>
                <b-button tag="router-link" to="/expo" type="is-danger">Delete</b-button>
            </div>
            <p class="text-gray-600 text-sm">Title: {{resource.title}}</p>
            <p class="text-gray-600 text-sm">Menu Title: {{resource.menu_title}}</p>
            <p class="text-gray-600 text-sm">Description: {{resource.alias}}</p>
            <p class="text-gray-600 text-sm">Template: {{resource.template.name}}</p>
            <p class="text-gray-600 text-sm">Type: {{resource.type.name}}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "ResourceOverview",

    components: {},
    props: [],
    mounted() {
        axios
            .get("/api/resources/" + this.$route.params.id)
            .then(response => {
                this.resource = response.data.data;
                this.loading = false;
            })
            .catch(error => {
                this.loading = false;
                alert("Unable to fetch the resource.");
                this.$router.push("/");
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

