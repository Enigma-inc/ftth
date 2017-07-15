<div class="col-xs-12 col-md-6">
    <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('application.serviceType')}">
        <p class="label-text">Select Preffed Service</p>
   
     <div class="radio">
        <label>
             <input  v-validate="'required'" v-bind:value="'contract'" v-model="application.serviceType"   type="radio" name="preferred_service" checked>
                Contract
        </label>
      </div>
     <div class="radio">
            <label>
                <input v-validate="'required'" v-bind:value="'prepaid'" v-model="application.serviceType"   type="radio" name="preferred_service">
                   Prepaid
            </label>
         </div>
        <span class="help-block" v-show="errors.has('application.serviceType')">
              <strong>Please Choose One!</strong>
         </span>
    </div>
        <div class="form-group  label-floating padding-right-10" :class="{ error: errors.has('contractPackage')}">

        <label for="contractPackage" class="control-label">Select Contract Package<span class="required-star">*</span></label>

        <div class="">
            <select name="contractPackage" id="contractPackage" class="form-control "  v-model="application.contractPackage">
                        <option value=""></option>
                        <option value="2GB">2GB</option>
              
            </select> 

            <span class="help-block" v-show="errors.has('contractPackage')">
                  <strong>Select Package </strong>
              </span>
        </div>
    </div>
</div>
    
    <div class="col-xs-12 col-md-6">
      <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('existing-customer')}">
                               <p class="label-text">Are you an existing customer (Are you currently using ADSL Services)</p>

                              <div class="col-md-4">
                                <div class="radio">
                                    <label>
                                        <input  v-validate="'required'" type="radio" :value=true name="existing-customer" v-model="application.adslCustomer">
                                        Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input v-validate="'required'" type="radio" :value=false name="existing-customer" v-model="application.adslCustomer">
                                        No
                                    </label>
                                </div>
                                <span class="help-block" v-show="errors.has('existing-customer')">
                                      <strong>Please Choose One!</strong>
                                </span>
                              </div>
                              <div class="col-md-8" v-if="isAdslCutomer">
                              <div class="form-group  label-floating padding-right-10" :class="{ error: errors.has('adslNumber')}">
                            
                                <label for="adslNumber" class="control-label">Your telephone number for your ADSL connection<span class="required-star">*</span></label>

                                <div class="" v-if="isAdslCutomer">
                                    <input id="adslNumber" type="text" class="form-control" name="adslNumber" v-model="application.adslNumber" > 
                                     <span class="help-block" v-show="errors.has('adslNumber')">
                                        <strong>Please fill in your number </strong>
                                    </span>
                                </div>
                            </div>
                              </div>

                          </div>

</div>


