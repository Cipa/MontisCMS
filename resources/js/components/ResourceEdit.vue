<template>
    <div>
        <form @submit.prevent="submitForm" class="is-relative has-padding-bottom-20">
            <div class="buttons justify-end" id="FloatingActions">
                <b-button tag="input" native-type="submit" value="Save" class="button is-info" />
                <!-- <button class="button is-success">Success</button>
            <button class="button is-warning">Warning</button>
                <button class="button is-danger">Danger</button>-->
            </div>

            <b-field
                label="Title"
                label-for="title"
                :type="{'is-danger': (errors && errors.title)}"
                :message="(errors && errors.title) ? errors.title : ''"
            >
                <b-input v-model="form.title" placeholder="Title" id="title"></b-input>
            </b-field>

            <b-field
                label="Menu Title"
                label-for="menu_title"
                :type="{'is-danger': (errors && errors.menu_title)}"
                :message="(errors && errors.menu_title) ? errors.menu_title : ''"
            >
                <b-input v-model="form.menu_title" placeholder="Menu Title" id="menu_title"></b-input>
            </b-field>

            <b-field
                label="Alias"
                label-for="alias"
                :type="{'is-danger': (errors && errors.alias)}"
                :message="(errors && errors.alias) ? errors.alias : ''"
            >
                <b-input v-model="form.alias" placeholder="Alias" id="alias"></b-input>
            </b-field>

            <b-field label="Description" label-for="description">
                <b-input
                    v-model="form.description"
                    placeholder="Description"
                    maxlength="200"
                    type="textarea"
                    id="description"
                ></b-input>
            </b-field>

            <div class="columns">
                <b-field label="Resource Type" class="column" label-for="type_id">
                    <b-select
                        placeholder="Select a type"
                        v-model="form.type_id"
                        expanded
                        id="type_id"
                    >
                        <option
                            v-for="type in types"
                            :value="type.id"
                            :key="type.id"
                        >{{ type.name }}</option>
                    </b-select>
                </b-field>
                <b-field label="Template" class="column" label-for="template_id">
                    <b-select
                        placeholder="Select a template"
                        v-model="form.template_id"
                        expanded
                        id="template_id"
                    >
                        <option
                            v-for="template in templates"
                            :value="template.id"
                            :key="template.id"
                        >{{ template.name }}</option>
                    </b-select>
                </b-field>
            </div>

            <div class="field">
                <label class="label" id="content">Content</label>
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
            <hr />
            <div id="ResourceCustomTvsWrp">
                <b-field
                    v-for="(tv_value, id) in form.tv_values"
                    :key="id"
                    :label="tv_value.tv.caption"
                    :label-for="'tv_value['+id+'][value]'"
                    :type="{'is-danger': (errors && errors.tv_1)}"
                >
                    <b-input
                        v-if="tv_value.tv.type_id === 1"
                        v-model="tv_value.value"
                        :id="'tv_value['+id+'][value]'"
                    ></b-input>

                    <editor
                        v-if="tv_value.tv.type_id === 2"
                        v-model="tv_value.value"
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

                    <b-input
                        v-if="tv_value.tv.type_id === 3"
                        v-model="tv_value.value"
                        type="textarea"
                        :id="'tv_value['+id+'][value]'"
                    ></b-input>
                </b-field>
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
                template_id: "",
                tv_values: []
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

                // this.form.title = response.data.data.title;
                // this.form.description = response.data.data.description;
                // this.form.menu_title = response.data.data.menu_title;
                // this.form.alias = response.data.data.alias;
                // this.form.content = response.data.data.content;
                // this.form.type_id = response.data.data.type_id;
                // this.form.template_id = response.data.data.template_id;

                // response.data.data.template.tvs.forEach(element => {
                //     console.log(element);

                //     this.form.tvs[] =
                // });
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

                    // this.$router.push({
                    //     name: "resourceOverview",
                    //     params: { id: response.data.data.id }
                    // });
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors;
                    // console.log(this.$refs);
                    // console.log();

                    // throw new Error(`API ${errors}`);
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
