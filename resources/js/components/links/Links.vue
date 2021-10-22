<template>
  <div>
    <v-layout row wrap justify-center>
      <v-flex xl11 sm11 md9 lg9 xl9>
        <p class="mt-10">
          Preview:
          <a
            :href="domain.replace('links', '') + JSON.parse(user).username"
            target="_blank"
          >
            {{ domain.replace("links", "") + JSON.parse(user).username }}
          </a>
        </p>

        <v-card class="mt-4" elevation="0">
          <v-card-title>Analytics</v-card-title>
          <v-divider></v-divider>
          <v-card-text v-if="JSON.parse(user).is_subscribed">
            <Analytics></Analytics>
          </v-card-text>
          <v-img
            v-else
            src="assets/images/analyticsSample.jpg"
            class="ml-3 img-fluid"
          >
          </v-img>
          <v-btn
            v-if="JSON.parse(user).is_subscribed == 0"
            href="/upgrade"
            align="center"
            justify="center"
            color="#17d8e2"
            style="
              position: absolute;
              transform: translate(-50%, -50%);
              margin-right: -50%;
              top: 50%;
              left: 50%;
              display: inline-block;
              height: auto;
              white-space: normal;
            "
          >
            <v-img
              icon
              src="assets/images/lock.png"
              class="ml-3 img-fluid"
              width="25px"
              height="25px"
              style="
                position: absolute;
                transform: translate(-50%, -50%);
                margin-right: -50%;
                top: 50%;
                left: 0%;
              "
            >
            </v-img>
            <p style="margin-bottom: 10px; margin-top: 10px; margin-left: 27px">
              Get access to powerful analytics & insights
            </p>
          </v-btn>
        </v-card>

        <v-layout row wrap justify-center class="mt-3">
          <v-flex xs12 sm12 md7 lg7 xl7 class="px-5 mb-5">
            <div v-if="links.length > 0">
              <draggable
                ghost-class="ghost"
                style="cursor: all-scroll"
                v-model="newLinks"
              >
                <v-card
                  class="my-2"
                  elevation="0"
                  v-for="(link, i) in links"
                  :key="i"
                >
                  <v-card-title class="grey--text mb-0 pb-0">{{
                    link.name
                  }}</v-card-title>
                  <v-card-text>
                    <a
                      class="cyan--text text--accent-3 text-decoration-none"
                      :href="link.link"
                      >{{ link.link }}</a
                    >
                    <p class="mr-3">
                      <label>Type: </label>
                      <span
                        :class="{
                          'success--text': link.is_active == true,
                          'red--text': link.is_active == false,
                        }"
                      >
                        {{ link.is_active ? "Active" : "Inactive" }}
                      </span>
                    </p>
                    <p>
                      <span
                        class="mx-2"
                        v-if="JSON.parse(user).is_subscribed == 1"
                      >
                        <v-icon>mdi-cursor-default-click</v-icon>
                        <span>{{ link.click.length }}</span>
                      </span>
                      <span
                        class="mx-2"
                        v-if="JSON.parse(user).is_subscribed == 1"
                      >
                        <v-icon>mdi-eye</v-icon>
                        <span>{{ link.view.length }}</span>
                      </span>
                    </p>
                    <div
                      style="display: flex; justify-content: flex-end"
                      class="mt-0"
                    >
                      <v-btn-toggle>
                        <v-btn
                          color="red accent-3"
                          elevation="0"
                          small
                          @click="deleteLink(link)"
                        >
                          <v-icon>mdi-trash-can</v-icon>
                        </v-btn>
                        <v-btn
                          color="yellow accent-3"
                          elevation="0"
                          small
                          @click="update(link)"
                        >
                          <v-icon>mdi-circle-edit-outline</v-icon>
                        </v-btn>
                        <v-btn
                          color="primary accent-3"
                          elevation="0"
                          small
                          @click="copy(link.link)"
                        >
                          <v-icon>mdi-content-copy</v-icon>
                        </v-btn>
                      </v-btn-toggle>
                    </div>
                  </v-card-text>
                </v-card>
              </draggable>
            </div>
            <div v-else>
              <v-card>
                <div class="white pa-5">You don't have any link yet</div>
              </v-card>
            </div>
            <v-btn
              color="cyan accent-3"
              class="mt-5 white--text"
              elevation="0"
              large
            >
              Save & Preview
              <v-icon>mdi-content-save</v-icon>
            </v-btn>
            <v-btn
              color="cyan accent-3"
              class="mt-5 white--text"
              elevation="0"
              large
              @click="getLinks().then((res) => (links = res.data))"
            >
              Refresh
              <v-icon>mdi-refresh</v-icon>
            </v-btn>
            <v-btn
              color="cyan accent-3"
              class="white--text mt-5"
              target="_blank"
              :href="'/' + JSON.parse(user).username"
              elevation="0"
              large
            >
              Preview <v-icon>mdi-link</v-icon>
            </v-btn>
          </v-flex>
          <v-flex xs12 sm12 md5 lg5 xl5 class="px-5 mb-5">
            <v-card elevation="0">
              <v-card-title class="grey--text text--darken-2"
                >Add a new Link</v-card-title
              >
              <v-card-text>
                <v-form ref="form" v-model="valid">
                  <errors
                    :success="success"
                    :failure="failure"
                    :message="message"
                  ></errors>
                  <v-text-field
                    label="Title"
                    v-model="title"
                    :rules="[rules.required]"
                  ></v-text-field>
                  <v-text-field
                    label="Link"
                    v-model="link"
                    :rules="[rules.required, rules.url]"
                  ></v-text-field>

                  <v-switch
                    v-model="is_active"
                    color="cyan accent-3"
                    :label="`${is_active ? 'Active' : 'Inactive'}`"
                  >
                  </v-switch>

                  <v-btn
                    color="cyan accent-3"
                    class="white--text"
                    elevation="0"
                    large
                    @click="validate"
                    >Save</v-btn
                  >
                </v-form>
              </v-card-text>
            </v-card>
            <!-- Dialog for Editing a link -->
            <v-dialog persistent max-width="600px" v-model="dialog">
              <v-card>
                <v-card-title>Modify a link</v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                  <v-form ref="formEdit" v-model="validEdit">
                    <errors
                      :success="successEdit"
                      :failure="failureEdit"
                      :message="messageEdit"
                    ></errors>
                    <v-text-field
                      label="Title"
                      v-model="titleEdit"
                      :rules="[rules.required]"
                      class="mt-2"
                    ></v-text-field>
                    <v-text-field
                      label="Link"
                      v-model="linkEdit"
                      :rules="[rules.required]"
                    ></v-text-field>
                    <v-switch
                      color="cyan accent-3"
                      label="Active"
                      v-model="is_activeEdit"
                    ></v-switch>
                    <v-btn
                      color="cyan accent-3"
                      class="white--text"
                      elevation="0"
                      large
                      @click="validateEdit(link)"
                      >Update</v-btn
                    >
                    <v-btn
                      color="cyan accent-3"
                      text
                      @click="dialog = false"
                      large
                      >Close</v-btn
                    >
                  </v-form>
                </v-card-text>
              </v-card>
            </v-dialog>
            <!-- / Dialog for Editing a link -->
            <!--<div class="mt-3">
                        <v-card elevation="0">
                            <v-card-title>Filter</v-card-title>
                            {{ clicks }}
                            <v-card-text>
                                <v-layout row wrap>
                                    <v-flex xs11 sm11 md11 lg6 xl6 class="px-4">
                                        <v-text-field type="date" label="From" v-model="from"></v-text-field>
                                    </v-flex>
                                    <v-flex xs11 sm11 md11 lg6 xl6 class="px-4">
                                        <v-text-field type="date" label="To" v-model="to"></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 sm12 md12 lg12 xl12 class="px-4">
                                        <v-btn-toggle>
                                            <v-btn color="primary" class="mb-3" @click="between = [from, to]">Submit</v-btn>
                                            <v-btn color="error" class="mb-3" @click="filtred = false" v-if="filtred">Reset</v-btn>
                                        </v-btn-toggle>
                                    </v-flex>
                                </v-layout>
                            </v-card-text>
                        </v-card>
                    </div>-->
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
  </div>
</template>

<script>
import axios from "axios";
import Errors from "../partials/Errors.vue";
import draggable from "vuedraggable";
import Analytics from "./Analytics.vue";

export default {
  name: "Links",
  components: { Errors, draggable, Analytics },
  props: ["user", "domain"],
  data() {
    return {
      links: [],
      rules: {
        required: (value) => !!value || "Required",
        url: (value) => {
          var pattern = new RegExp(
            "^(https?:\\/\\/)?" + // protocol
              "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" + // domain name
              "((\\d{1,3}\\.){3}\\d{1,3}))" + // OR ip (v4) address
              "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // port and path
              "(\\?[;&a-z\\d%_.~+=-]*)?" + // query string
              "(\\#[-a-z\\d_]*)?$",
            "i"
          ); // fragment locator
          return pattern.test(value) || "Invalid url";
        },
      },
      valid: false,
      title: "",
      link: "",
      is_active: true,
      success: false,
      failure: false,
      message: "",
      // Update dialog props
      name: "",
      link: "",
      dialog: false,
      validEdit: false,
      titleEdit: "",
      linkEdit: "",
      linkToEdit: "",
      is_activeEdit: true,
      successEdit: false,
      failureEdit: false,
      messageEdit: "",
      filtred: false,
      from: "",
      to: "",
      clicks: [],
      between: [this.from, this.to],
      // switch1: true,
    };
  },
  computed: {
    // Vue draggable
    newLinks: {
      get() {
        return this.links;
      },
      set(value) {
        value.map((newLink, index) => {
          newLink.order = index + 1;
        });
        axios
          .put("/all/links/updateAll", { newLinks: value })
          .then((res) => (this.links = res.data))
          .catch((err) => console.log("Something went wrong"));
      },
    },
  },
  methods: {
    getLinks() {
      let user_id = JSON.parse(this.$props.user).id;
      return axios.get(`/links?user_id=${user_id}`);
    },
    validate() {
      // Validate the form
      this.$refs.form.validate();
      // Check if it is valid and continue
      if (this.valid) {
        // Reset the alert to their initial values
        this.success = false;
        this.failure = false;
        this.message = "";
        // Define the link to persist
        let link = {
          name: this.title,
          link: this.link,
          is_active: this.is_active,
          order:
            this.links.length >= 1
              ? this.links[this.links.length - 1].order + 1
              : 1,
        };
        axios
          .post("/links", link)
          .then((res) => {
            // Handle the alert message
            this.success = true;
            this.failure = false;
            this.message = "Link created successfully.";
            // Reset the form
            this.$refs.form.reset();
            // document.getElementById("input-55").click();
            // Add the new link to the links array
            this.getLinks().then((res) => (this.links = res.data));
            document.getElementById("input-59").click();
            // this.links = res.data;
          })
          .catch((err) => {
            // Handle the alert message
            this.failure = true;
            this.success = false;
            console.log("this is error" + err);
            this.message = "Something went wrongsss.";
          });
      }
    },
    deleteLink(link) {
      if (
        confirm(
          "Are you sure you want to delete this link? Its analytics will be deleted as well."
        )
      ) {
        axios.delete(`/links/${link.id}`).then((res) => {
          // Get the new links
          this.getLinks().then((res) => (this.links = res.data));
        });
      }
    },
    update(link) {
      this.dialog = true;
      this.titleEdit = link.name;
      this.linkEdit = link.link;
      this.is_activeEdit = link.is_active;
      this.linkToEdit = link;
    },
    getClicks(link, time) {
      let rr = null;
      let get = async () => {
        try {
          rr = await axios.get(
            `/clicks/filter?link_id=${link.id}&from=${time[0]}&to=${time[1]}`
          );
        } catch (error) {
          console.log("Error");
        }
      };
      return get();
    },
    validateEdit() {
      let newLink = {
        id: this.linkToEdit.id,
        name: this.titleEdit,
        link: this.linkEdit,
        is_active: this.is_activeEdit,
      };
      axios
        .put(`/links/${newLink.id}`, newLink)
        .then((res) => {
          // Close the dialog
          this.dialog = false;
          // Update the links
          this.getLinks().then((res) => (this.links = res.data));
        })
        .catch((err) => console.log(err.response.data));
    },
    copy(text) {
      var toBeCopied = $("<input>").val(text).appendTo("body").select();
      document.execCommand("copy");
      alert("Link copied successfully.");
    },
  },
  created() {
    this.getLinks().then((res) => (this.links = res.data));
  },
};
</script>

<style>
.ghost {
  opacity: 0.5;
  box-shadow: 0px 0px 25px 5px rgba(0, 0, 0, 0.712);
  background-color: #74b5d34f !important;
  background: #74b5d34f !important;
}
</style>