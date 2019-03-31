<template>
  <div class="modal" :class="openmodal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Modal title</p>
        <button class="delete" aria-label="close" @click="closemodal"></button>
      </header>
      <section class="modal-card-body">
        <!-- Content ... -->

        <div class="field">
          <label class="label">First Name</label>
          <div class="control">
            <input class="input" type="text" placeholder="First Name" v-model="list.firstname">
          </div>
        </div>

        <div class="field">
          <label class="label">Last Name</label>
          <div class="control">
            <input class="input" type="text" placeholder="Last Name" v-model="list.lastname">
          </div>
        </div>

        <div class="field">
          <label class="label">Phone Number</label>
          <div class="control">
            <input class="input" type="number" placeholder="Phone Number" v-model="list.phone">
          </div>
        </div>

        <div class="field">
          <label class="label">Email Address</label>
          <div class="control">
            <input class="input" type="email" placeholder="Email Address" v-model="list.email">
          </div>
        </div>

        <!-- Content ... -->
      </section>
      <footer class="modal-card-foot">
        <button class="button is-success" @click="saveContact">Add Contact</button>
        <button class="button" @click="closemodal">Cancel</button>
      </footer>
    </div>
  </div>
</template>


<script>

    export default {

        props: ["openmodal"],

        data(){
          return{
            list:{
              firstname: "",
              lastname: "",
              phone:"",
              email: "",

            }

          }
        },

        methods: {
            closemodal(){
                this.$emit('closeRequest')
            },
            saveContact(){

            axios.post('/addressbook/', this.$data.list)
            .then((response) => console.log(response))
            .catch((error)=> console.log(error))

            }
        }
    }
</script>
