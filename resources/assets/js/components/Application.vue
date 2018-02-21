<template>
<form-wizard>
        <tab-content title="Personal details">
            <div class="col-xs-12">
                <div class="col-xs-12 col-md-6 ">
                        <div class="form-group label-floating padding-right-10" :class="{ error: $v.personalDetails.name.$invalid }">
                            <label for="name" class=" control-label">Name 
                                <span class="required-star" v-if="$v.personalDetails.name.$invalid ">*</span></label>
    
                            <div class="">
                                <input  id="name" type="text" name="name" class="form-control" @input="$v.personalDetails.name.$touch()" v-model.trim="personalDetails.name"  >
                                <span class="help-block"  v-if="$v.personalDetails.name.$invalid && $v.personalDetails.name.$dirty">
                                    This field is required
                                </span>
                            </div>
                        </div>
    
                        <div class="form-group label-floating padding-right-10" :class="{ error: $v.personalDetails.surname.$invalid}">
                            <label for="surname" class=" control-label">Surname<span class="required-star" v-if="$v.personalDetails.surname.$invalid">*</span></label>
    
                            <div class="">
                                <input id="surname" type="text" class="form-control" name="surname"  @input="$v.personalDetails.surname.$touch()" v-model.trim="personalDetails.surname"  > 
                                    <span class="help-block" v-if="$v.personalDetails.surname.$invalid && $v.personalDetails.surname.$dirty">
                                        This field is required 
                                     </span>
                            </div>
                        </div>
    
                        <div class="form-group label-floating padding-right-10" >
                            <label for="phone-mobile" class=" control-label">Cellphone<span class="required-star">*</span> </label>
    
                            <div class="">
                                <input id="phone-mobile" type="text" class="form-control" @input="$v.personalDetails.phoneMobile.$touch()" v-model.trim="personalDetails.phoneMobile" name="phoneMobile" > 
                                <span class="help-block" >
                                    <!-- <strong>@{{ errors.first('form-personal.phoneMobile') }}</strong> -->
                                </span>
                            </div>
                        </div>
    
                        <div class="form-group label-floating padding-right-10 " >
                            <label for="passport" class=" control-label">Pasport/ID Number<span class="required-star">*</span> </label>
    
                            <div class="">
                                <input id="passport" type="text" class="form-control" @input="$v.personalDetails.passport.$touch()" v-model.trim="personalDetails.passport" name="passport" > 
                                <span class="help-block" >
                                    <!-- <strong>@{{ errors.first('form-personal.passport') }}</strong> -->
                                </span>
                            </div>
                        </div>
    
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group  label-floating padding-right-10" >
                        
                            <label for="email" class="control-label">Email<span class="required-star">*</span></label>
    
                            <div class="">
                                <input id="email" type="text" class="form-control" name="email" @input="$v.personalDetails.email.$touch()" v-model.trim="personalDetails.email" > 
                                    <span class="help-block" >
                                    <!-- <strong>@{{ errors.first('form-personal.email') }}</strong> -->
                                </span>
                            </div>
                        </div>
                        <div class="form-group label-floating padding-right-10 " >
                            <label for="phone-home" class=" control-label">Home Phone</label>
                            <div class="">
                                <input id="phone-home" type="text" class="form-control" @input="$v.personalDetails.phoneHome.$touch()" v-model.trim="personalDetails.phoneHome" name="phone-home" >
                            </div>
                        </div>
                        <div class="form-group label-floating padding-right-10">
                            <label for="phone-office" class=" control-label">Office Phone</label>
                            <div class="">
                                <input id="phone-office" type="text" class="form-control" @input="$v.personalDetails.phoneOffice.$touch()" v-model.trim="personalDetails.phoneOffice" name="phone-office" >
                            </div>
                        </div>
                            <div class="col-xs-12 col-md-12">
    
                        <!-- <div class="form-group label-floating padding-right-10 " >
                            <label for="location" class="control-label ">Select Your Location<span class="required-star">*</span></label>
    
                            <div class="">
                                <select name="location" id="location_id" class="form-control "  v-model.trim="personalDetails.location" >
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}"><strong>{{$locatio.name}}</strong></option>
                                        @endforeach
                                    </select> 
                                    <span class="help-block" >
                                    <strong>@{{ errors.first('form-personal.location') }}</strong>
                                </span>
                            </div>
                        </div> -->
                    </div>                      
                        
    
    
                    </div>
                    <div class="col-xs-12">
                    <div class="col-md-6">
                        <div class="form-group label-floating padding-right-10" >
                            <label for="postal-address" class=" control-label">Postal Address<span class="required-star">*</span></label>
                            <textarea id="postal-address" class="form-control"  rows="5" @input="$v.personalDetails.postalAddress.$touch()" v-model.trim="personalDetails.postalAddress" >
                            </textarea>
                                    <span class="help-block" >
                                    <!-- <strong>@{{ errors.first('form-personal.postalAddress') }}</strong> -->
                                </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group label-floating padding-right-10 " >
                            <label for="physical-address" class=" control-label">Physical Address<span class="required-star">*</span></label>
                            <textarea id="physical-address" class="form-control"  rows="5" @input="$v.personalDetails.physicalAddress.$touch()" v-model.trim="personalDetails.physicalAddress" >
                            </textarea>
                                    <span class="help-block" >
                                    <!-- <strong>@{{ errors.first('form-personal.physicalAddress') }}</strong> -->
                                </span>
                        </div>
                    </div>
                        
                    </div>
                   <pre>{{$v.personalDetails}}</pre>
    
            </div>
        </tab-content>
        <tab-content title="Additional Info">
                                My second tab content
        </tab-content>
        <tab-content title="Last step">
                                Yuhuuu! This seems pretty damn simple
        </tab-content>
</form-wizard>
</template>

<script>
import { required, minLength, between,email } from 'vuelidate/lib/validators';
    export default {
        data() {
            return {
                currentStep:1,
                packageOptions:[],
                applicationMeta:{
                    applicationId:0,
                    personalDetailsId:0,
                    serviceTypeId:0,
                    bankingDetailsId:0,
                },
                personalDetails: {
                    title: '',
                    name: '',
                    surname: '',
                    email: '',
                    phoneMobile: '',
                    phoneHome: '',
                    phoneOffice: '',
                    postalAddress:'',
                    physicalAddress:'',
                    passport:'',
                    location:''
                   
                  
                },
                serviceTypeDetails:{
                    serviceType:'contract',
                    package:'',
                    adslCustomer:false,
                    adslNumber:''

                },
                bankingDetails:{
                    bankName:'',
                    branchName:'',
                    branchCode:'',
                    accountHolderName:'',
                    accountType:'',
                    accountNumber:''
                }
            }
        },
         validations: {
          personalDetails: {
                    title: {required},
                    name: {required},
                    surname: {required},
                    email: {required},
                    phoneMobile: {required},
                    phoneHome: '',
                    phoneOffice: '',
                    postalAddress:{required},
                    physicalAddress:{required},
                    passport:{required},
                    location:{required}
                   
                  
                },
        },
        mounted(){
            this.getPackagesFromServer();
        },
        methods: {
            submitPersonalDetails(scope){
                
                        axios.post(`./application/${this.applicationMeta.applicationId}/personal-details/${this.applicationMeta.personalDetailsId}`,
                                    this.personalDetails)
                            .then(res=>{
                                 EventBus.$emit('NEXT_STEP_MESSAGE',{'message':'Pick your prefered package on the next step'});
                                this.applicationMeta.applicationId=res.data.application.id;
                                this.applicationMeta.personalDetailsId=res.data.personalDetails.id;
                                this.currentStep=2;                                             
                            })
                            .catch(error=>{
                                  EventBus.$emit('SUBMISION_ERROR');             
                                });       
            },
            submitServiceType(scope){
                if(!this.serviceTypeDetails.adslNumber && this.serviceTypeDetails.adslCustomer){
                      EventBus.$emit('VALIDATION_ERROR');             

                } else{
                        axios.post(`./application/${this.applicationMeta.applicationId}/service-type/${this.applicationMeta.serviceTypeId}`
                                    ,this.serviceTypeDetails)
                            .then(res=>{
                                  EventBus.$emit('NEXT_STEP_MESSAGE',{'message':'Fill in your banking details on the next step.'});
                                this.applicationMeta.applicationId=res.data.application.id;
                                this.applicationMeta.serviceTypeId=res.data.serviceType.id;
                                this.currentStep=3; 
                            }) 
                            .catch(error=>{
                                 EventBus.$emit('SUBMISION_ERROR');                 
                                });                      
           
                }
            },
            submitBankingDetails(scope){

                        axios.post(`./application/${this.applicationMeta.applicationId}/banking-details/${this.applicationMeta.bankingDetailsId}`,this.bankingDetails)
                            .then(res=>{
                                EventBus.$emit('APPLICATION_COMPLETE_MESSAGE');
                                this.applicationMeta.applicationId=res.data.application.id;
                                this.applicationMeta.bankingDetailsId=res.data.bankingDetails.id;
                                this.currentStep=4;
                            })
                            .catch(error=>{
                                 EventBus.$emit('SUBMISION_ERROR');                 
                                });                      
            } ,
            getPackagesFromServer(){
                axios.get(`/packages?type=${this.serviceTypeDetails.serviceType}`).then((resp)=>{
                    this.packageOptions=resp.data;
                    console.log(this.packageOptions);
                });
            }
                           
        },
        computed:{
            rules(){
                return this.serviceTypeDetails.adslCustomer?'required':'';
            }
        },
        watch:{
            'serviceTypeDetails.serviceType': function(){
                this.getPackagesFromServer();               
            }
        }

    } 
</script>

<style lang="scss" scoped>
    .form-group.error label.control-label,
     .form-group.error 
     .help-block {
          color: #f44336;
          }
          a, a:hover, a:focus 
          {
         color:lighten(#0d47a1,50%);
      }
        .container{
            padding-top:20px;
        }
</style>