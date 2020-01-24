<template>
    <div>
        <form @submit.prevent="submitForm">
            <div class="buttons justify-end">
                <b-button tag="input" native-type="submit" value="Save" class="button is-info" />
                <!-- <button class="button is-success">Success</button>
            <button class="button is-warning">Warning</button>
                <button class="button is-danger">Danger</button>-->
            </div>

            <b-field
                label="Title"
                :type="{'is-danger': (errors && errors.title)}"
                :message="(errors && errors.title) ? errors.title : ''"
            >
                <b-input v-model="form.title" placeholder="Title"></b-input>
            </b-field>

            <b-field
                label="Menu Title"
                :type="{'is-danger': (errors && errors.menu_title)}"
                :message="(errors && errors.menu_title) ? errors.menu_title : ''"
            >
                <b-input v-model="form.menu_title" placeholder="Menu Title"></b-input>
            </b-field>

            <b-field
                label="Alias"
                :type="{'is-danger': (errors && errors.alias)}"
                :message="(errors && errors.alias) ? errors.alias : ''"
            >
                <b-input v-model="form.alias" placeholder="Alias"></b-input>
            </b-field>

            <b-field label="Description">
                <b-input
                    v-model="form.description"
                    placeholder="Description"
                    maxlength="200"
                    type="textarea"
                ></b-input>
            </b-field>

            <editor
                v-model="form.content"
                :init="{
                    height: 200,
                    menubar: false,
                    plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar:
                    'undo redo | formatselect | bold italic backcolor | \
                    alignleft aligncenter alignright alignjustify | \
                    bullist numlist outdent indent | removeformat | code help'
                }"
            ></editor>
        </form>
    </div>
</template>


<script>
import Editor from "@tinymce/tinymce-vue";

export default {
    name: "ResourceEdit",

    components: { Editor },

    mounted() {
        axios
            .get("/api/resources/" + this.$route.params.id)
            .then(response => {
                this.form = response.data.data;
            })
            .catch(error => {
                alert(error);
            });
    },

    data: function() {
        return {
            form: {
                title: "",
                description: "",
                menu_title: "",
                alias: "",
                content: ""
                // type_id: "",
                // template_id: ""
            },

            errors: null
        };
    },

    methods: {
        submitForm: function() {
            axios
                .patch("/api/resources/" + this.$route.params.id, this.form)
                .then(response => {
                    this.$store.dispatch("loadResourcesTree");
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors;
                });
        }
    }
};
</script>
