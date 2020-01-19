<template>
    <div class="py-2 px-4">
        <div v-if="loading">Loading</div>
        <div v-else>
            <div class="float-right">
                <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Edit</button>
                <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Delete</button>
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
    name: "ResourceShow",

    components: {},
    props: ["config"],
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

