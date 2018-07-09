<template>
  <v-layout row justify-center>
    <v-dialog v-model="openAddRequest" persistent max-width="700px">
      <v-card>
        <v-card-title fixed>
          <span class="headline">Add Client</span>
        </v-card-title>
        <v-card-text>
          <v-container grid-list-md>
            <v-layout wrap>
              <div>
                  <v-tabs
                    v-model="active"
                    color="cyan"
                    dark
                    slider-color="yellow"
                  >
                    <v-tab
                      v-for="n in 7"
                      :key="n"
                      ripple
                    >
                      Item {{ n }}

                    </v-tab>
                    <!-- Tab 1 Start -->
                    <v-tab-item>
                      <v-card flat>
                        <v-card-text>
                               <v-form ref="form" @submit.prevent>
                                 <v-container grid-list-xl fluid>
                                   <v-layout wrap>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.name"
                                       :rules="rules.name"
                                       color="blue darken-2"
                                       label="Full name"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.name">{{ errors.name[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.email"
                                       :rules="emailRules"
                                       color="blue darken-2"
                                       label="Email"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.email">{{ errors.email[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.id_no"
                                       color="blue darken-2"
                                       label="Id Number"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.id_no">{{ errors.id_no[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.address"
                                       :rules="rules.name"
                                       color="blue darken-2"
                                       label="Address"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.address">{{ errors.address[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.city"
                                       :rules="rules.name"
                                       color="blue darken-2"
                                       label="City"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.city">{{ errors.city[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6> 
                                        <v-slider
                                          v-model="form.age"
                                          :rules="rules.age"
                                          color="orange"
                                          label="Age"
                                          hint="Be honest"
                                          min="1"
                                          max="100"
                                          thumb-label
                                        ></v-slider>
                                      </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.country"
                                       :rules="rules.name"
                                       color="blue darken-2"
                                       label="Country"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.country">{{ errors.country[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.phone"
                                       :rules="rules.name"
                                       color="blue darken-2"
                                       label="Phone"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small> -->
                                     </v-flex>
                                     <div class="form-group col-md-6">
                                       <label for="password" class="col-md-8 col-form-label text-md-right">Role</label>
                                       <div class="col-md-12">
                                           <select class="custom-select" v-model="form.role">
                                             <option v-for="element in Showrole" data-subtext="" :value="element.id">{{element.name}}</option>
                                           </select>
                                       </div>
                                     </div>
                               </v-layout>
                             </v-container>
                             <v-card-actions>
                               <v-btn flat @click="resetForm">reset</v-btn>
                               <v-btn flat @click="close">Close</v-btn>
                               <v-spacer></v-spacer>
                               <v-btn
                               :disabled="loading"
                               :loading="loading"
                               flat
                               color="primary"
                               @click="save"
                               >Submit</v-btn>
                             </v-card-actions>
                           </v-form>
                        </v-card-text>
                      </v-card>
                    </v-tab-item>
                    <!-- Tab 1 End -->

                    <!-- Tab 2 Start-->
                    <v-tab-item>
                      <v-card flat>
                        <v-card-text>
                               <v-form ref="form" @submit.prevent>
                                 <v-container grid-list-xl fluid>
                                   <v-layout wrap>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.name"
                                       :rules="rules.name"
                                       color="blue darken-2"
                                       label="Full name"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.name">{{ errors.name[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.email"
                                       :rules="emailRules"
                                       color="blue darken-2"
                                       label="Email"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.email">{{ errors.email[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.id_no"
                                       color="blue darken-2"
                                       label="Id Number"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.id_no">{{ errors.id_no[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.address"
                                       :rules="rules.name"
                                       color="blue darken-2"
                                       label="Address"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.address">{{ errors.address[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.city"
                                       :rules="rules.name"
                                       color="blue darken-2"
                                       label="City"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.city">{{ errors.city[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                        <v-slider
                                          v-model="form.age"
                                          :rules="rules.age"
                                          color="orange"
                                          label="Age"
                                          hint="Be honest"
                                          min="1"
                                          max="100"
                                          thumb-label
                                        ></v-slider>
                                      </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.country"
                                       :rules="rules.name"
                                       color="blue darken-2"
                                       label="Country"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.country">{{ errors.country[0] }}</small> -->
                                     </v-flex>
                                     <v-flex xs12 sm6>
                                       <v-text-field
                                       v-model="form.phone"
                                       :rules="rules.name"
                                       color="blue darken-2"
                                       label="Phone"
                                       required
                                       ></v-text-field>
                                     <!-- <small class="has-text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small> -->
                                     </v-flex>
                                     <div class="form-group col-md-6">
                                       <label for="password" class="col-md-8 col-form-label text-md-right">Role</label>
                                       <div class="col-md-12">
                                           <select class="custom-select" v-model="form.role">
                                             <option v-for="element in Showrole" data-subtext="" :value="element.id">{{element.name}}</option>
                                           </select>
                                       </div>
                                     </div>
                               </v-layout>
                             </v-container>
                             <v-card-actions>
                               <v-btn flat @click="resetForm">reset</v-btn>
                               <v-btn flat @click="close">Close</v-btn>
                               <v-spacer></v-spacer>
                               <v-btn
                               :disabled="loading"
                               :loading="loading"
                               flat
                               color="primary"
                               @click="save"
                               >Submit</v-btn>
                             </v-card-actions>
                           </v-form>
                        </v-card-text>
                      </v-card>
                    </v-tab-item>
                    <!-- Tab 2 End -->
 
                    <!-- Tab 3 Start-->
                    <!-- Tab 3 End -->

                  </v-tabs>

                  <div class="text-xs-center mt-3">
                    <v-btn @click="next">next tab</v-btn>
                  </div>
                </div>
              
        </v-layout>
      </v-container>
    </v-card-text>
  </v-card>
</v-dialog>
</v-layout>
</template>

<script>
export default {
  props: ['openAddRequest', 'Showrole'],
  components: {
  },
  data() {
      const defaultForm = Object.freeze({
        name: '',
        password: '',
        email: '',
        phone: null,
        city: '',
        country: '',
        id_no: '',
        role: '',
        // age: null,
      })
    return{
      address: '',
      companies: {},
      errors: {},
      defaultForm,
      loading: false,
      active: null,
      form: Object.assign({}, defaultForm),
      emailRules: [
        v => {
          return !!v || 'E-mail is required'
        },
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
      ],
      rules: {
        age: [
          val => val < 10 || `I don't believe you!`
        ],
        name: [val => (val || '').length > 0 || 'This field is required']
      },
    }
  },
  methods: {
   next () {
     const active = parseInt(this.active)
     this.active = (active < 2 ? active + 1 : 0)
   },
    save() {
      this.loading=true
      axios.post('/users', {form:this.$data.form, location: this.address}).
      then((response) => {
        this.loading=false
        console.log(response.data);
        // this.close;
        this.resetForm();
        this.$emit('closeRequest');
        this.$emit('alertRequest');
        this.$parent.Allusers.push(response.data.form) 

      })
      .catch((error) => {
        this.loading=false
        this.errors = error.response.data.errors
      })
    },
    resetForm () {
        this.form = Object.assign({}, this.defaultForm)
        this.$refs.form.reset()
      },
    close() {
      this.$emit('closeRequest')
    },
  },
    mounted() {
    axios.post('getCompanyAdmin')
    .then((response) => {
      this.Allusers = response.data
    })
    .catch((error) => {
        this.errors = error.response.data.errors
      })


      axios.post('getCompanies')
      .then((response) => {
        this.companies = response.data
      })
      .catch((error) => {
        this.errors = error.response.data.errors
      })
    },
  computed: {
   formIsValid () {
     return (
       this.form.name &&
       this.form.email &&
       this.form.phone &&
       this.form.password
     )
   },
 },
}
</script>
 