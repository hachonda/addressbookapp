<template>
  <div class="modal" :class="openmodal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Add New Contact</p>
        <button class="delete" aria-label="close" @click="closemodal"></button>
      </header>
      <section class="modal-card-body">
        <!-- Content ... -->

        <div class="field">
          <label class="label">First Name</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.firstname}" type="text" placeholder="First Name" v-model="list.firstname">
          </div>
          <small v-if="errors.firstname" class="has-text-danger">{{ errors.firstname[0]}}</small>
        </div>

        <div class="field">
          <label class="label">Last Name</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.lastname}" type="text" placeholder="Last Name" v-model="list.lastname">
          </div>
          <small v-if="errors.lastname" class="has-text-danger">{{ errors.lastname[0]}}</small>
        </div>

        <div class="field">
          <label class="label">Phone Number</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.phone}" type="number" placeholder="Phone Number" v-model="list.phone">
          </div>
          <small v-if="errors.phone" class="has-text-danger">{{ errors.phone[0]}}</small>
        </div>

        <div class="field">
          <label class="label">Email Address</label>
          <div class="control">
            <input class="input" :class="{'is-danger':errors.firstname}" type="email" placeholder="Email Address" v-model="list.email">
          </div>
          <small v-if="errors.email" class="has-text-danger">{{ errors.email[0]}}</small>
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
            },
            errors:{

            }

          }
        },

        methods: {
            closemodal(){
                this.$emit('closeRequest')
            },
            saveContact(){
				axios.post('/addressbook',this.$data.list).then((response)=> {
					this.closemodal()
          this.$parent.lists.push(response.data)
          
          /** sorting bug fix */
					this.$parent.lists.sort(function(a,b){
						if (a.firstname > b.firstname) {
							return 1;
						}else if(a.firstname < b.firstname){
							return -1;
						}
          })
          
          /** empty list when adding new contact*/
					this.list = "";
				})
				  .catch((error) => this.errors = error.response.data.errors)
			}
		}
    }
</script>
