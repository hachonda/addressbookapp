<template>
  <div class="modal" :class="openmodal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{list.firstname}}'s Contact Details</p>
        <button class="delete" aria-label="close" @click="closemodal"></button>
      </header>
      <section class="modal-card-body">
        <!-- Content ... -->

        <div class="panel-block">
          <label class="column is-4"><b>First Name:</b></label>
            {{ list.firstname}}
        </div>

        <div class="panel-block">
          <label class="column is-4"><b>Last Name:</b></label>
            {{ list.lastname}}
        </div>

        <div class="panel-block">
          <label class="column is-4"><b>Phone Number:</b></label>
            {{ list.phone}}
        </div>

        <div class="panel-block">
          <label class="column is-4"><b>Email Address:</b></label>
            {{ list.email}}
        </div>

        <!-- Content ... -->
      </section>
      <footer class="modal-card-foot">
        
        <button class="button" @click="closemodal">Close</button>
      </footer>
    </div>
  </div>
</template>


<script>

    export default {

        props: ["openmodal"],

        data(){
          return{
            list:""

          }
        },

        methods: {
            closemodal(){
                this.$emit('closeRequest')
            }
        }
    }
</script>
