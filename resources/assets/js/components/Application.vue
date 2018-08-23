<template>
<form-wizard title="Complete 2 Easy Steps Below" subtitle=""
             :finishButtonText="'Submit'" :color="'#eb443b'" 
              @on-complete="placeApplication()"> 
        <tab-content title="Package & Location Selection" >
            <div class="row">
                    <div class="col-xs-12 col-md-4 ">
                        <div class="form-group label-floating padding-right-10" :class="{ error: $v.basicDetails.name.$invalid }">
                            <label for="name" class=" control-label">Name 
                                <span class="required-star" v-if="$v.basicDetails.name.$invalid ">*</span></label>
    
                            <div class="">
                                <input  id="name" type="text" name="name" class="form-control" @input="$v.basicDetails.name.$touch()" v-model.trim="basicDetails.name"  >
                                <span class="help-block"  v-if="$v.basicDetails.name.$invalid && ($v.basicDetails.name.$dirty || showStep1Errors)">
                                    This field is required
                                </span>
                            </div>
                        </div>                       
    
                    </div>
                    <div class="col-xs-12 col-md-4">
                            
                        <div class="form-group label-floating padding-right-10" :class="{ error: $v.basicDetails.surname.$invalid}">
                            <label for="surname" class=" control-label">Surname<span class="required-star" v-if="$v.basicDetails.surname.$invalid">*</span></label>
    
                            <div class="">
                                <input id="surname" type="text" class="form-control" name="surname"  @input="$v.basicDetails.surname.$touch()" v-model.trim="basicDetails.surname"  > 
                                    <span class="help-block" v-if="$v.basicDetails.surname.$invalid && ($v.basicDetails.surname.$dirty || showStep1Errors)">
                                        This field is required 
                                     </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group label-floating padding-right-10" :class="{ error: $v.basicDetails.phone.$invalid}">
                            <label for="phone-mobile" class=" control-label">Phone<span class="required-star">*</span> </label>
    
                            <div class="">
                                <input id="phone-mobile" type="text" class="form-control" @input="$v.basicDetails.phone.$touch()" v-model.trim="basicDetails.phone" name="phone" > 
                                <span class="help-block"  v-if="$v.basicDetails.phone.$invalid && ($v.basicDetails.phone.$dirty || showStep1Errors)">
                                    <span>This field is required</span>
                                </span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
               <div class="col-xs-12 col-md-8">
                   <div class="col-xs-6">
                       <div class="form-group label-floating margin-top-0 service-type" >
                          <label class="label-text">Service Type</label>                        
                           <div class="radio-container">
                                <div class="radio margin-0">
                                <label>
                                    <input   v-bind:value="'contract'" v-model="basicDetails.serviceType"   type="radio" name="serviceType" checked>
                                       <span class="circle"></span><span class="check"></span>
                                        Contract
                                </label>
                            </div>
                            <div class="radio margin-0">
                                    <label>
                                        <input  v-bind:value="'prepaid'" v-model="basicDetails.serviceType"   type="radio" name="serviceType">
                                         <span class="circle"></span><span class="check"></span>
                                        Prepaid
                                    </label>
                                </div>
                            </div>
                           </div>
                   </div>
                <div class="col-xs-6">
                    <div class="form-group  label-floating padding-right-10" :class="{ error: $v.basicDetails.package.$invalid }">

                    <label for="package" class="control-label" style="text-transform:capitalize">Select {{basicDetails.serviceType}} package<span class="required-star">*</span></label>

                    <div class="">
                        <v-select label="data_bundle" :options="packageOptions"   v-model="selectedPackageOption" >
                                <template slot="option" scope="option">
                                    <span>{{option.data_bundle}}</span>
                                    <span>|</span>
                                    <span> M{{option.price}}</span>
                                </template>
                        </v-select> 

                        <span class="help-block" v-if="$v.basicDetails.package.$invalid && showStep2Errors">
                            <span>Select Package </span>
                        </span>
                    </div>
                     </div>
                </div>
               </div>
               <div class="col-xs-12 col-md-4">
                    <div class="form-group label-floating padding-right-10 " :class="{ error: $v.basicDetails.location.$invalid}">
                    <label for="location" class="control-label ">Select Your Area<span class="required-star">*</span></label>

                    <div class="">
                            <v-select label="name"  :options="locations" v-model="selectedLocation"></v-select>
                            <span class="help-block" v-if="$v.basicDetails.location.$invalid && ($v.basicDetails.location.$dirty || showStep1Errors)">
                            <span>Select your Area</span>
                        </span>
                    </div>
                </div>
               </div>
            </div>
                        
    
    
    
            
        </tab-content>
        <!-- :beforeChange="()=>validateStep2($v)" -->
        <tab-content title="Account" >
         <div class="row">
              <div class="col-xs-12 col-md-12 ">
                  <div class="form-group label-floating padding-right-10" :class="{ error: $v.accountDetails.email.$invalid }">
                      <label for="email" class=" control-label">Email 
                          <span class="required-star" v-if="$v.accountDetails.email.$invalid ">*</span></label>

                      <div class="">
                          <input  id="email" type="text" name="email" class="form-control"  v-model="accountDetails.email"  >
                          <span class="help-block"  v-if="$v.accountDetails.email.$invalid && ($v.accountDetails.email.$dirty || showStep1Errors)">
                              This field is required
                          </span>
                      </div>
                  </div>                       

              </div>
              
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 ">
                  <div class="form-group label-floating padding-right-10" :class="{ error: $v.accountDetails.password.$invalid }">
                      <label for="password" class=" control-label">Password 
                          <span class="required-star" v-if="$v.accountDetails.password.$invalid ">*</span></label>

                      <div class="">
                          <input  id="password" type="password" name="password" class="form-control" v-model="accountDetails.password"  >
                          <!-- <span class="help-block"  v-if="!$v.accountDetails.password.required">
                              Password is required
                          </span>
                          <span class="help-block"  v-if="!$v.accountDetails.password.minLength">
                              Password must have at least 6 charecters.
                          </span> -->
                      </div>
                  </div>                      

              </div>
                <div class="col-xs-12 col-md-6 ">
                  <div class="form-group label-floating padding-right-10" :class="{ error: $v.accountDetails.repeatPassword.$invalid }">
                      <label for="repeatPassword" class=" control-label">Confirm Password
                          <span class="required-star" v-if="$v.accountDetails.repeatPassword.$invalid ">*</span></label>

                      <div class="">
                          <input  id="repeatPassword" type="password" name="repeatPassword" class="form-control" v-model="accountDetails.repeatPassword"  >
                          <span class="help-block"  v-if="$v.accountDetails.repeatPassword.$invalid && ($v.accountDetails.repeatPassword.$dirty || showStep1Errors)">
                              This field is required
                          </span>
                      </div>
                  </div>                      

              </div>
            </div>


            
        </tab-content>
        
</form-wizard>
</template>

<script>
import {
  required,
  minLength,
  between,
  email,
  requiredIf,
  sameAs
} from "vuelidate/lib/validators";
export default {
  data() {
    return {
      showStep1Errors: false,
      showStep2Errors: false,
      showStep3Errors: false,
      accountTypes: ["Cheque", "Savings"],
      packageOptions: [],
      unFilteredpackageOptions: [],
      selectedPackageOption: "",
      locations: [],
      selectedLocation: "",
      applicationMeta: {
        applicationId: 0,
        personalDetailsId: 0,
        serviceTypeId: 0,
        bankingDetailsId: 0
      },
      basicDetails: {
        name: "",
        surname: "",
        phone: "",
        location: "",
        serviceType: "",
        package: ""
      },
      accountDetails: {
        email: "",
        password: "",
        repeatPassword: ""
      }
    };
  },
  validations: {
    basicDetails: {
      name: { required },
      surname: { required },
      phone: { required },
      package: { required },
      location: { required }
    },
    accountDetails: {
      email: { required },
      password: { required },
      password: {
        required,
        minLength: minLength(6)
      },
      repeatPassword: {
        sameAsPassword: sameAs("password")
      }
    }
  },
  mounted() {
    this.getLookups();
  },
  methods: {
    placeApplication() {
      axios
        .post(
          `./api/place-application`,
          Object.assign({}, this.basicDetails, this.accountDetails)
        )
        .then(response => {
          console.log(response);
        });
    },
    validateStep1($v) {
      this.showStep1Errors = true;
      return true;
    },
    validateStep2($v) {
      this.showStep2Errors = true;

      //   return !$v.basicDetails.package.$invalid;
    },

    submitPersonalDetails(scope) {
      axios
        .post(
          `./application/${
            this.applicationMeta.applicationId
          }/personal-details/${this.applicationMeta.personalDetailsId}`,
          this.basicDetails
        )
        .then(res => {
          EventBus.$emit("NEXT_STEP_MESSAGE", {
            message: "Pick your prefered package on the next step"
          });
          this.applicationMeta.applicationId = res.data.application.id;
          this.applicationMeta.personalDetailsId = res.data.basicDetails.id;
          this.currentStep = 2;
        })
        .catch(error => {
          EventBus.$emit("SUBMISION_ERROR");
        });
    },
    getPackagesFromServer() {
      axios.get(`/packages?type=`).then(resp => {
        this.packageOptions = resp.data;
        this.setSelectedPackgeFromParam();
      });
    },
    getFtthLocationsFromServer() {
      axios.get(`/api/ftth-locations`).then(resp => {
        this.locations = resp.data;
        this.setSelectedLocationFromParam();
      });
    },
    getLookups() {
      this.getPackagesFromServer();
      this.getFtthLocationsFromServer();
    },
    getParameterByName(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return "";
      return decodeURIComponent(results[2].replace(/\+/g, " "));
    },
    setSelectedPackgeFromParam() {
      this.packageOptions.forEach(item => {
        let packageParam = this.getParameterByName("package");
        if (packageParam) {
          this.selectedPackageOption = this.packageOptions.filter(pkg => {
            return pkg.id == packageParam;
          })[0];
        }
      });
    },
    setSelectedLocationFromParam() {
      this.packageOptions.forEach(item => {
        let locationParam = this.getParameterByName("location");
        if (locationParam) {
          this.selectedLocation = this.locations.filter(loc => {
            return loc.id == locationParam;
          })[0];
        }
      });
    }
  },
  computed: {
    rules() {
      return this.basicDetails.adslCustomer ? "required" : "";
    }
  },
  watch: {
    selectedLocation: function(newValue, oldValue) {
      if (newValue) {
        this.basicDetails.location = newValue.id;
      } else {
        this.basicDetails.location = oldValue.id;
      }
    },
    selectedPackageOption: function(newValue, oldValue) {
      if (newValue) {
        this.basicDetails.package = newValue.id;
      } else {
        this.basicDetails.package = oldValue.id;
      }
    },
    "basicDetails.serviceType": function(newValue, oldValue) {
      return this.packageOptions.filter(pkg => {
        return pkg.contract == "contract";
      });
    }
  }
};
</script>

<style lang="scss" scoped>
.form-group.error label.control-label,
.form-group.error .help-block {
  color: #f44336;
}
a,
a:hover,
a:focus {
  color: lighten(#0d47a1, 50%);
}
.container {
  padding-top: 20px;
}
.section-container {
  .section-title {
    font-weight: 600;
    font-size: 1.5rem;
    color: rgba(0, 0, 0, 0.5);
    margin-bottom: 5px;
    margin-top: 15px;
  }
  .item-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    padding: 5px 0;
    .item-title {
      font-size: 1.2rem;
      font-weight: 300;
      color: rgba(0, 0, 0, 0.5);
    }
    .item-content {
      font-size: 1.2rem;
      font-weight: 500;
      color: rgba(0, 0, 0, 0.6);
    }
  }
}
.service-type {
  margin-top: 27px !important;
  label {
    font-size: 11px;
  }
  .radio-container {
    display: flex;
    width: 100%;
    align-items: center;
  }
}
</style>