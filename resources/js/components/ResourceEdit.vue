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

            <div class="columns">
                <b-field label="Resource Type" class="column">
                    <b-select placeholder="Select a type" v-model="form.type_id" expanded>
                        <option
                            v-for="type in types"
                            :value="type.id"
                            :key="type.id"
                        >{{ type.name }}</option>
                    </b-select>
                </b-field>
                <b-field label="Template" class="column">
                    <b-select placeholder="Select a template" v-model="form.template_id" expanded>
                        <option
                            v-for="template in templates"
                            :value="template.id"
                            :key="template.id"
                        >{{ template.name }}</option>
                    </b-select>
                </b-field>
            </div>

            <div class="field">
                <label class="label">Content</label>
                <div class="control">
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
                </div>
            </div>
        </form>
    </div>
</template>


<script>
import Editor from "@tinymce/tinymce-vue";

export default {
    name: "ResourceEdit",

    components: { Editor },
    data: function() {
        return {
            form: {
                title: "",
                description: "",
                menu_title: "",
                alias: "",
                content: "",
                type_id: "",
                template_id: ""
            },

            types: [],
            templates: [],

            errors: null
        };
    },
    mounted() {
        axios
            .get("/api/resources/" + this.$route.params.id)
            .then(response => {
                this.form = response.data.data;
            })
            .catch(error => {
                alert(error);
            });

        this.getTypes();
        this.getTemplates();
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
                    throw new Error(`API ${errors}`);
                });
        },
        getTypes: function() {
            axios
                .get("/api/types")
                .then(response => {
                    this.types = response.data.data;
                })
                .catch(error => {
                    alert(error);
                });
        },
        getTemplates: function() {
            axios
                .get("/api/templates")
                .then(response => {
                    this.templates = response.data.data;
                })
                .catch(error => {
                    alert(error);
                });
        }
    }
};
</script>
