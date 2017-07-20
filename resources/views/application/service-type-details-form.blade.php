<form class="form-horizontal" role="form" @submit.prevent="submitServiceType('form-serviceType')" data-vv-scope="form-serviceType">
        <div class="col-xs-12 col-md-6">
            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('serviceTypeDetails.serviceType')}">
                <p class="label-text">Select Preffed Service</p>
        
            <div class="radio">
                <label>
                    <input   v-bind:value="'contract'" v-model="serviceTypeDetails.serviceType"   type="radio" name="serviceType" checked>
                        Contract
                </label>
            </div>
            <div class="radio">
                    <label>
                        <input  v-bind:value="'prepaid'" v-model="serviceTypeDetails.serviceType"   type="radio" name="serviceType">
                        Prepaid
                    </label>
                </div>
                <span class="help-block" v-show="errors.has('serviceTypeDetails.serviceType')">
                    <strong>Please Choose One!</strong>
                </span>
            </div>
                <div class="form-group  label-floating padding-right-10" :class="{ error: errors.has('form-serviceType.package')}">

                <label for="package" class="control-label" style="text-transform:capitalize">Select @{{serviceTypeDetails.serviceType}} package<span class="required-star">*</span></label>

                <div class="">
                    <select name="package" id="package" class="form-control "  v-model="serviceTypeDetails.package" v-validate="{ rules: { required: true} }">
                                <option value=""></option>
                                <option :value="package.data_bundle" v-for="package in packageOptions">@{{package.data_bundle}}</option>
                    
                    </select> 

                    <span class="help-block" v-show="errors.has('form-serviceType.package')">
                        <strong>Select Package </strong>
                    </span>
                </div>
            </div>
        </div>
            
            <div class="col-xs-12 col-md-6">
            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('form-serviceType.existing-customer')}">
                                    <p class="label-text">Are you currently using ADSL</p>

                                    <div class="col-md-4">
                                        <div class="radio">
                                            <label>
                                                <input   type="radio" :value=true name="existing-customer" v-model="serviceTypeDetails.adslCustomer">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input  type="radio" :value=false name="existing-customer" v-model="serviceTypeDetails.adslCustomer">
                                                No
                                            </label>
                                        </div>
                                        <span class="help-block" v-show="errors.has('form-serviceType.existing-customer')">
                                            <strong>Please Choose One!</strong>
                                        </span>
                                    </div>
                                    <div class="col-md-8" v-show="serviceTypeDetails.adslCustomer">
                                    <div class="form-group  label-floating padding-right-10" :class="{ error: errors.has('form-serviceType.adslNumber')}">
                                    
                                        <label for="adslNumber" class="control-label">Your telephone number for your ADSL connection<span class="required-star">*</span></label>

                                        <div class="" >
                                            <input id="adslNumber" type="text" class="form-control" name="adslNumber" v-model="serviceTypeDetails.adslNumber" v-validate="rules"> 
                                            <span class="help-block" v-show="errors.has('form-serviceType.adslNumber')">
                                                <strong>Please fill in your ADSL number </strong>
                                            </span>
                                        </div>
                                    </div>
                                    </div>

                                </div>

        </div>

        <div class="col-xs-12 text-center">

        <div class="form-group label-floating padding-right-10">
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>

        </div>
        </div>                   

        
</form>
