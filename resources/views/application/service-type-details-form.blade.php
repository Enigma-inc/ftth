<div class="col-xs-12 col-md-6">
    <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('application.serviceType')}">
        <p>Select Preffed Service</p>
   
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
</div>
    
    <div class="col-xs-12 col-md-6">
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


