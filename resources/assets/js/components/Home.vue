<template>
  <div>
    <nav class="panel column is-offset-2 is-8">
      <p class="panel-heading">
        Address Book

        <button class="button is-link is-small is-outlined is-pulled-right" @click="openAdd">
          Add New
        </button>
      </p>
        <div class="panel-block">
          <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="search by name, email or number">
            <span class="icon is-small is-left">
              <i class="fa fa-search" aria-hidden="true"></i>
            </span>
          </p>
        </div>


      <a class="panel-block">

        <span class="column is-9">
        marksheet
        </span>

        <span class="panel-icon column is-1">
          <i class="fa fa-trash has-text-danger" title="Delete"></i>
        </span>

        <span class="panel-icon column is-1">
          <i class="fa fa-edit has-text-info" title="Edit"></i>
        </span>

        <span class="panel-icon column is-1">
          <i class="fa fa-eye has-text-primary" title="View"></i>
        </span>

      </a>
    </nav>

    <Add :openmodal = "addActive" @closeRequest="closeAdd"></Add>

  </div>

</template>

<script>

    let Add = require('./Add.vue');

    export default {

      components: {Add},
      data(){
        return {

          addActive: ""

        }
      },
      methods: {
        openAdd(){
          this.addActive = "is-active";
        },
        closeAdd(){
          this.addActive = "";
        }

      }
      


    }
</script>
