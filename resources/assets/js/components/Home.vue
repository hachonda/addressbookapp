<template>
  <div>
    <nav class="panel column is-offset-2 is-8">
      <p class="panel-heading">
        Address Book
        <button
          class="button is-link is-small is-outlined is-pulled-right"
          @click="openAdd"
        >Add New</button>
      </p>
      <div class="panel-block">
        <p class="control has-icons-left">
          <input class="input is-small" type="text" placeholder="search by name, email or number">
          <span class="icon is-small is-left">
            <i class="fa fa-search" aria-hidden="true"></i>
          </span>
        </p>
      </div>

      <a class="panel-block" v-for="item, key in lists">
        <span class="column is-9">{{item.firstname}}</span>

        <span class="panel-icon column is-1">
          <i class="fa fa-eye has-text-primary" title="View" @click="openShow(key)"></i>
        </span>

        <span class="panel-icon column is-1">
          <i class="fa fa-edit has-text-info" title="Edit" @click="openUpdate(key)"></i>
        </span>

        <span class="panel-icon column is-1">
          <i class="fa fa-trash has-text-danger" title="Delete" @click="delContact(key, item.id)"></i>
        </span>
      </a>
    </nav>

    <Add :openmodal="addActive" @closeRequest="closeModal"></Add>
    <Show :openmodal="showActive" @closeRequest="closeModal"></Show>
    <Update :openmodal="updateActive" @closeRequest="closeModal"></Update>
  </div>
</template>

<script>
let Add = require("./Add.vue");

let Show = require("./Show.vue");

let Update = require("./Update.vue");

export default {
  components: { Add, Show, Update },
  data() {
    return {
      addActive: "",
      showActive: "",
      updateActive: "",
      lists: {},
      errors: {}
    };
  },
  mounted() {
    axios
      .post("/fetchdata/", this.$data.list)
      .then(response => (this.lists = response.data))
      .catch(error => (this.errors = error.response.data.errors));
  },
  methods: {
    openAdd() {
      this.addActive = "is-active";
    },
    openShow(key) {
      this.$children[1].list = this.lists[key];
      this.showActive = "is-active";
    },
    openUpdate(key) {
      this.$children[2].list = this.lists[key];
      this.updateActive = "is-active";
    },
    delContact(key, id) {
      //console.log(`${key}, ${id}`);
      if (confirm("Are you sure you want to delete this contact?")) {
        axios
          .delete(`/addressbook/${id}`, this.$data.list)
          .then(response => this.lists.splice(key, 1))
          .catch(error => (this.errors = error.response.data.errors));
      }
      
    },
    closeModal() {
      this.addActive = this.showActive = this.updateActive = "";
    }
  }
};
</script>
