<template>
<form-wizard title="Complete 2 Easy Steps Below" subtitle=""
             :finishButtonText="'Submit'" :color="'#eb443b'" 
              @on-complete="placeApplication()" > 
        <tab-content title="Package & Location Selection" :beforeChange="()=>validateStep1($v)">
            <div class="row">
                    <div class="col-xs-12 col-md-4 ">
                        <div class="form-group label-floating padding-right-10" :class="{ error: $v.basicDetails.name.$invalid }">
                            <label for="name" class=" control-label">Name 
                                <span class="required-star" v-if="$v.basicDetails.name.$invalid ">*</span></label>
    
                            <div class="">
                                <input  id="name" type="text" name="name" class="form-control" @input="$v.basicDetails.name.$touch()" v-model.trim="basicDetails.name"  >
                                <span class="help-block"  v-if="$v.basicDetails.name.$invalid && ($v.basicDetails.name.$dirty || showStep1Errors)">
                                    Name is required
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
                                        Surname is required 
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
                                    <span>Phone is required</span>
                                </span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row margin-top-20">
               <div class="col-xs-12 col-md-8">
                   <div class="col-xs-6">
                       <div class="form-group label-floating margin-top-0 service-type" :class="{ error: $v.basicDetails.serviceType.$invalid }">
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
                          <div class="help-block" v-if="$v.basicDetails.serviceType.$invalid && showStep1Errors">
                            <span>Select Service Type </span>
                           </div>
                           </div>
                   </div>
                <div class="col-xs-6">
                    <div class="form-group  label-floating padding-right-10" :class="{ error: $v.basicDetails.package.$invalid }">

                    <label for="package" class="control-label" style="text-transform:capitalize">Select {{basicDetails.serviceType}} package<span class="required-star">*</span></label>

                    <div class="">
                        <v-select label="data_bundle" :options="packageOptions"   v-model="selectedPackageOption" >
                                <template slot="option" slot-scope="option">
                                    <span>{{option.data_bundle}}</span>
                                    <span>|</span>
                                    <span> M{{option.price}}</span>
                                </template>
                        </v-select> 

                        <div class="help-block" v-if="$v.basicDetails.package.$invalid && showStep1Errors">
                            <span>Select Package </span>
                        </div>
                    </div>
                     </div>
                </div>
               </div>
               <div class="col-xs-12 col-md-4">
                    <div class="form-group label-floating padding-right-10 " :class="{ error: $v.basicDetails.location.$invalid}">
                    <label for="location" class="control-label ">Select Your Area<span class="required-star">*</span></label>

                    <div class="">
                            <v-select label="name"  :options="locations" v-model="selectedLocation"></v-select>
                            <div class="help-block" v-if="$v.basicDetails.location.$invalid && ($v.basicDetails.location.$dirty || showStep1Errors)">
                               <span>Select your Area</span>
                             </div>
                    </div>
                </div>
               </div>
            </div>
                        
    
    
    
            
        </tab-content>
        <tab-content title="Account" :beforeChange="()=>validateStep2($v)">
         <div class="row">
              <div class="col-xs-12 col-md-12 ">
                  <div class="form-group label-floating padding-right-10" :class="{ error: $v.accountDetails.email.$invalid }">
                      <label for="email" class=" control-label">Email 
                          <span class="required-star" v-if="$v.accountDetails.email.$invalid ">*</span></label>

                      <div class="">
                          <input  id="email" type="text" name="email" class="form-control"  v-model="accountDetails.email"  >
                          <span class="help-block"  v-if="$v.accountDetails.email.$invalid && ($v.accountDetails.email.$dirty || showStep2Errors)">
                              Provide valid email address
                          </span>
                      </div>
                  </div>                       

              </div>
              
            </div>

            <div class="row margin-top-20 margin-bottom-20">
                <div class="col-xs-12 col-md-6 ">
                  <div class="form-group label-floating padding-right-10" :class="{ error: $v.accountDetails.password.$invalid }">
                      <label for="password" class=" control-label">Password 
                          <span class="required-star" v-if="$v.accountDetails.password.$invalid ">*</span></label>

                      <div class="">
                          <input  id="password" type="password" name="password" class="form-control" v-model="accountDetails.password"  >
                          <span class="help-block"  v-if="!$v.accountDetails.password.required && ($v.accountDetails.password.$dirty || showStep2Errors)">
                              Password is required
                          </span>
                          <span class="help-block"  v-if="!$v.accountDetails.password.minLength">
                              Password must have at least 6 charecters.
                          </span>
                      </div>
                  </div>                      

              </div>
                <div class="col-xs-12 col-md-6 ">
                  <div class="form-group label-floating padding-right-10 error" >
                      <label for="repeatPassword" class=" control-label">Confirm Password
                          <span class="required-star" v-if="$v.accountDetails.repeatPassword.$invalid ">*</span></label>
                      <div class="">
                          <input  id="repeatPassword" type="password" name="repeatPassword" class="form-control" v-model="accountDetails.repeatPassword"  >
                          <span class="help-block"  v-if="(!$v.accountDetails.password.$invalid && $v.accountDetails.password.$minLength) || passwordNotConfirmed">
                              Not Matching
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
      location: { required },
      serviceType: { required }
    },
    accountDetails: {
      email: { required },
      password: { required },
      password: {
        required,
        minLength: minLength(6)
      },
      repeatPassword: {
        required,
        sameAsPassword: sameAs("password")
      }
    }
  },
  mounted() {
    this.setpackgeTypeFromParam();
    this.getLookups();
  },
  methods: {
    placeApplication() {
      axios
        .post(
          `./place-application`,
          Object.assign({}, this.basicDetails, this.accountDetails)
        )
        .then(response => {
          this.$noty
            .success("Application Placed! We shall get back to you.", {
              theme: "metroui",
              layout: "center"
            })
            .on("onClose", function() {
              window.location.href=`../admin/users/${response.data.user_id}/applications`


            });
        })
        .catch(error => {
          this.$noty.error("Oops! An error has occured. Please try again.", {
            theme: "metroui",
            layout: "center"
          });
        });
    },
    validateStep1($v) {
      this.showStep1Errors = true;
      return (
        !$v.basicDetails.name.$invalid &&
        !$v.basicDetails.surname.$invalid &&
        !$v.basicDetails.package.$invalid &&
        !$v.basicDetails.location.$invalid &&
        !$v.basicDetails.serviceType.$invalid
      );
    },
    validateStep2($v) {
      this.showStep2Errors = true;

      return (
        !$v.accountDetails.email.$invalid &&
        !$v.accountDetails.password.$invalid &&
        !$v.accountDetails.repeatPassword.$invalid &&
        !this.passwordNotConfirmed
      );
    },
    getPackagesFromServer() {
      axios.get(`/packages?type=`).then(resp => {
        this.packageOptions = [];
        resp.data.filter(item => {
          if (item.type == this.basicDetails.serviceType) {
            this.packageOptions.push(item);
          }
        });
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
    setpackgeTypeFromParam() {
      let packageTypeParam = this.getParameterByName("type");
      if (packageTypeParam) {
        this.basicDetails.serviceType = packageTypeParam;
      }
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
    passwordNotConfirmed() {
      return this.accountDetails.password != this.accountDetails.repeatPassword;
    },
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
      if (newValue && newValue.id) {
        this.basicDetails.package = newValue.id;
      } else if (oldValue && oldValue.id) {
        this.basicDetails.package = oldValue.id;
      } else {
        this.basicDetails.package = "";
      }
    },
    "basicDetails.serviceType": function(newValue, oldValue) {
      this.getPackagesFromServer();
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