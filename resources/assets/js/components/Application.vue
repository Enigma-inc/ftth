<template>
<form-wizard title="FTTH Application Form" subtitle="Complete the steps below!"
             :finishButtonText="'Submit'" :color="'#eb443b'"
              @on-complete="placeApplication()"> 
        <tab-content title="Personal details" :beforeChange="()=>validateStep1($v)">
            <div class="col-xs-12">
                <div class="col-xs-12 col-md-6 ">
                        <div class="form-group label-floating padding-right-10" :class="{ error: $v.personalDetails.name.$invalid }">
                            <label for="name" class=" control-label">Name 
                                <span class="required-star" v-if="$v.personalDetails.name.$invalid ">*</span></label>
    
                            <div class="">
                                <input  id="name" type="text" name="name" class="form-control" @input="$v.personalDetails.name.$touch()" v-model.trim="personalDetails.name"  >
                                <span class="help-block"  v-if="$v.personalDetails.name.$invalid && ($v.personalDetails.name.$dirty || showStep1Errors)">
                                    This field is required
                                </span>
                            </div>
                        </div>
    
                        <div class="form-group label-floating padding-right-10" :class="{ error: $v.personalDetails.surname.$invalid}">
                            <label for="surname" class=" control-label">Surname<span class="required-star" v-if="$v.personalDetails.surname.$invalid">*</span></label>
    
                            <div class="">
                                <input id="surname" type="text" class="form-control" name="surname"  @input="$v.personalDetails.surname.$touch()" v-model.trim="personalDetails.surname"  > 
                                    <span class="help-block" v-if="$v.personalDetails.surname.$invalid && ($v.personalDetails.surname.$dirty || showStep1Errors)">
                                        This field is required 
                                     </span>
                            </div>
                        </div>
    
                        <div class="form-group label-floating padding-right-10" :class="{ error: $v.personalDetails.phoneMobile.$invalid}">
                            <label for="phone-mobile" class=" control-label">Cellphone<span class="required-star">*</span> </label>
    
                            <div class="">
                                <input id="phone-mobile" type="text" class="form-control" @input="$v.personalDetails.phoneMobile.$touch()" v-model.trim="personalDetails.phoneMobile" name="phoneMobile" > 
                                <span class="help-block"  v-if="$v.personalDetails.phoneMobile.$invalid && ($v.personalDetails.phoneMobile.$dirty || showStep1Errors)">
                                    <span>This field is required</span>
                                </span>
                            </div>
                        </div>
    
                        <div class="form-group label-floating padding-right-10 " :class="{ error: $v.personalDetails.passport.$invalid}">
                            <label for="passport" class=" control-label">Pasport/ID Number<span class="required-star">*</span> </label>
    
                            <div class="">
                                <input id="passport" type="text" class="form-control" @input="$v.personalDetails.passport.$touch()" v-model.trim="personalDetails.passport" name="passport" > 
                                <span class="help-block" v-if="$v.personalDetails.passport.$invalid && ($v.personalDetails.passport.$dirty || showStep1Errors)">
                                    <span>This field is required</span>
                                </span>
                            </div>
                        </div>
    
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group  label-floating padding-right-10" :class="{ error: $v.personalDetails.email.$invalid}">
                        
                            <label for="email" class="control-label">Email<span class="required-star">*</span></label>
    
                            <div class="">
                                <input id="email" type="text" class="form-control" name="email" @input="$v.personalDetails.email.$touch()" v-model.trim="personalDetails.email" > 
                                    <span class="help-block" v-if="$v.personalDetails.email.$invalid && ($v.personalDetails.email.$dirty || showStep1Errors)">
                                    <span>This field is required</span>
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
    
                        <div class="form-group label-floating padding-right-10 " :class="{ error: $v.personalDetails.location.$invalid}">
                            <label for="location" class="control-label ">Select Your Location<span class="required-star">*</span></label>
    
                            <div class="">
                                 <v-select label="name"  :options="locations" v-model="selectedLocation"></v-select>
                                    <span class="help-block" v-if="$v.personalDetails.location.$invalid && ($v.personalDetails.location.$dirty || showStep1Errors)">
                                    <span>Select your location</span>
                                </span>
                            </div>
                        </div>
                    </div>                      
                        
    
    
                    </div>
                    <div class="col-xs-12">
                    <div class="col-md-6">
                        <div class="form-group label-floating padding-right-10" :class="{ error: $v.personalDetails.postalAddress.$invalid}">
                            <label for="postal-address" class=" control-label">Postal Address<span class="required-star">*</span></label>
                            <textarea id="postal-address" class="form-control"  rows="5" @input="$v.personalDetails.postalAddress.$touch()" v-model.trim="personalDetails.postalAddress" >
                            </textarea>
                                    <span class="help-block" v-if="$v.personalDetails.postalAddress.$invalid && ($v.personalDetails.postalAddress.$dirty || showStep1Errors)">
                                    <span>This field is required</span>
                                </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group label-floating padding-right-10 " :class="{ error: $v.personalDetails.physicalAddress.$invalid}">
                            <label for="physical-address" class=" control-label">Physical Address<span class="required-star">*</span></label>
                            <textarea id="physical-address" class="form-control"  rows="5" @input="$v.personalDetails.physicalAddress.$touch()" v-model.trim="personalDetails.physicalAddress" >
                            </textarea>
                                    <span class="help-block" v-if="$v.personalDetails.physicalAddress.$invalid && ($v.personalDetails.physicalAddress.$dirty || showStep1Errors)">
                                    <span>This field is required</span>
                                </span>
                        </div>
                    </div>
                        
                    </div>
    
            </div>
            
        </tab-content>
        
        <tab-content title="Service Details" :beforeChange="()=>validateStep2($v)">
            <div class="col-xs-12 margin-bottom-60">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group label-floating padding-right-10" >
                                <p class="label-text">Select Preffed Service</p>
                        
                            <div class="radio">
                                <label>
                                    <input   v-bind:value="'contract'" v-model="serviceTypeDetails.serviceType"   type="radio" name="serviceType" checked>
                                       <span class="circle"></span><span class="check"></span>
                                        Contract
                                </label>
                            </div>
                            <div class="radio">
                                    <label>
                                        <input  v-bind:value="'prepaid'" v-model="serviceTypeDetails.serviceType"   type="radio" name="serviceType">
                                         <span class="circle"></span><span class="check"></span>
                                        Prepaid
                                    </label>
                                </div>
                            </div>
                            <div class="form-group  label-floating padding-right-10" :class="{ error: $v.serviceTypeDetails.package.$invalid }">

                                <label for="package" class="control-label" style="text-transform:capitalize">Select {{serviceTypeDetails.serviceType}} package<span class="required-star">*</span></label>

                                <div class="">
                                    <v-select label="data_bundle" :options="packageOptions"   v-model="selectedPackageOption" >
                                          <template slot="option" scope="option">
                                                <span>{{option.data_bundle}}</span>
                                                <span>|</span>
                                                <span> M{{option.price}}</span>
                                            </template>
                                    </v-select> 

                                    <span class="help-block" v-if="$v.serviceTypeDetails.package.$invalid && showStep2Errors">
                                        <span>Select Package </span>
                                    </span>
                                </div>
                            </div>

                         </div>
                            
                        <div class="col-xs-12 col-md-6">
                                    <div class="form-group label-floating padding-right-10" :class="{ error: ''}">
                                                            <p class="label-text">Are you currently using ADSL</p>

                                                            <div class="col-md-4">
                                                                <div class="radio">
                                                                    <label>
                                                                        <input   type="radio" :value=true name="existing-customer" v-model="serviceTypeDetails.adslCustomer">
                                                                       <span class="circle"></span><span class="check"></span>
                                                                        Yes
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input  type="radio" :value=false name="existing-customer" v-model="serviceTypeDetails.adslCustomer">
                                                                        <span class="circle"></span><span class="check"></span>
                                                                        No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8" v-show="serviceTypeDetails.adslCustomer">
                                                            <div class="form-group  label-floating padding-right-10" :class="{ error:$v.serviceTypeDetails.adslNumber.$invalid}">
                                                            
                                                                <label for="adslNumber" class="control-label">Your telephone number for your ADSL connection<span class="required-star">*</span></label>

                                                                <div class="" >
                                                                    <input id="adslNumber" type="text" class="form-control" name="adslNumber" v-model="serviceTypeDetails.adslNumber" > 
                                                                    <span class="help-block" v-if="$v.serviceTypeDetails.adslNumber.$invalid">
                                                                        <span>Please fill in your ADSL number </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            </div>

                                                        </div>

                        </div>
            </div>
        </tab-content>
        <tab-content title="Banking Details" :beforeChange="()=>validateStep3($v)">
            <div class="col-xs-12 margin-bottom-50">
                    <div class="col-xs-12 col-md-6 ">
                            <div class="form-group label-floating padding-right-10" :class="{ error: '$v.bankingDetails.bankName.$invalid '}">
                                <label for="bankName" class=" control-label">Bank Name <span class="required-star">*</span></label>

                                <div class="">
                                    <input  id="bankName" type="text" name="bankName" class="form-control" @input="$v.bankingDetails.bankName.$touch()" v-model.trim="bankingDetails.bankName"  >
                                    <span class="help-block" v-if="$v.bankingDetails.bankName.$invalid && showStep3Errors">
                                        <span>This field is required</span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10" :class="{ error: '$v.bankingDetails.branchCode.$invalid'}">
                                <label for="branchCode" class=" control-label">Branch Code<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="branchCode" type="text" class="form-control" name="branchCode" @input="$v.bankingDetails.branchCode.$touch()" v-model.trim="bankingDetails.branchCode" > 
                                     <span class="help-block" v-if="$v.bankingDetails.branchCode.$invalid && showStep3Errors">
                                        <span>This field is required</span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10" :class="{ error: '$v.bankingDetails.accountNumber.$invalid'}">
                                <label for="accountNumber" class=" control-label">Account Number<span class="required-star">*</span> </label>

                                <div class="">
                                    <input id="accountNumber" type="text" class="form-control" @input="$v.bankingDetails.accountNumber.$touch()" v-model.trim="bankingDetails.accountNumber" name="accountNumber" > 
                                   <span class="help-block" v-if="$v.bankingDetails.accountNumber.$invalid && showStep3Errors">
                                        <span>This field is required</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group  label-floating padding-right-10" :class="{ error: '$v.bankingDetails.branchName.$invalid'}">
                            
                                <label for="branchName" class="control-label">Branch Name<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="branchName" type="text" class="form-control" name="branchName" @input="$v.bankingDetails.branchName.$touch()" v-model.trim="bankingDetails.branchName" > 
                                     <span class="help-block" v-if="$v.bankingDetails.branchName.$invalid && showStep3Errors">
                                        <span>This field is required</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group label-floating padding-right-10 " :class="{ error: '$v.bankingDetails.accountHolderName.$invalid'}">
                                <label for="accountHolderName" class=" control-label">Account Holder's Name</label>
                                <div class="">
                                    <input id="accountHolderName" type="text" class="form-control" @input="$v.bankingDetails.accountHolderName.$touch()" v-model.trim="bankingDetails.accountHolderName" name="accountHolderName">
                                    <span class="help-block" v-if="$v.bankingDetails.accountHolderName.$invalid && showStep3Errors">
                                        <span>This field is required</span>
                                    </span>
                                </div>
                            </div>
                          
                            <div class="form-group label-floating padding-right-10" :class="{error:$v.bankingDetails.accountType.$invalid}">
                                <label for="accountType" class="control-label ">
                                    Account Type<span class="required-star">*</span></label>

                                <div class="margin-top-10">
                                    <v-select  :options="accountTypes" v-model="bankingDetails.accountType"></v-select>
                                        
                               <span class="help-block" v-if="$v.bankingDetails.accountType.$invalid && showStep3Errors" >
                                        <span>Select Account Type</span>
                                    </span>
                                </div>
                            </div>


                        </div>

            </div>
        </tab-content>
        <tab-content title="Review & Submission">
             <div class="section-container">
                 <div class="section-title">Personal Details</div>
                     <div class="item-container">
                     <div class="item-title">Names</div>
                     <div class="item-content">{{personalDetails.name}} {{personalDetails.surname}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Email</div>
                     <div class="item-content">{{personalDetails.email}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Cellphone</div>
                     <div class="item-content">{{personalDetails.phoneMobile}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Home Telephone</div>
                     <div class="item-content">{{personalDetails.phoneHome}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Office Telephone</div>
                     <div class="item-content">{{personalDetails.phoneOffice}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Location</div>
                     <div class="item-content">{{selectedLocation.name}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Postal Address</div>
                     <div class="item-content">{{personalDetails.postalAddress}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Physical Address</div>
                     <div class="item-content">{{personalDetails.physicalAddress}}</div>
                </div>
             </div>
            <div class="section-container">
                 <div class="section-title">Service Details</div>
                     <div class="item-container">
                     <div class="item-title">Type</div>
                     <div class="item-content">{{selectedPackageOption.type}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Package</div>
                     <div class="item-content">{{selectedPackageOption.data_bundle}} {{selectedPackageOption.data_bundle?"| M":''}}{{selectedPackageOption.price}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">ADSL Customer?</div>
                     <div class="item-content">{{serviceTypeDetails.adslCustomer?"YES":"NO"}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">ADSL Number</div>
                     <div class="item-content">{{serviceTypeDetails.adslCustomer?serviceTypeDetails.adslNumber:"-"}}</div>
                </div>               
             </div>
            <div class="section-container">
                 <div class="section-title">Banking Details</div>
                     <div class="item-container">
                     <div class="item-title">Type</div>
                     <div class="item-content">{{selectedPackageOption.type}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Bank Name</div>
                     <div class="item-content">{{bankingDetails.bankName}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Branch</div>
                     <div class="item-content">{{bankingDetails.branchName}}</div>
                </div>
                <div class="item-container">
                     <div class="item-title">Branch Code</div>
                     <div class="item-content">{{bankingDetails.branchCode}}</div>
                </div>               
                <div class="item-container">
                     <div class="item-title">Account Holder's Name</div>
                     <div class="item-content">{{bankingDetails.accountHolderName}}</div>
                </div>               
                <div class="item-container">
                     <div class="item-title">Account Number</div>
                     <div class="item-content">{{bankingDetails.accountNumber}}</div>
                </div>               
                <div class="item-container">
                     <div class="item-title">Account Type</div>
                     <div class="item-content">{{bankingDetails.accountType}}</div>
                </div>               
             </div>
        </tab-content>
        
</form-wizard>
</template>

<script>
import { required, minLength, between,email,requiredIf} from 'vuelidate/lib/validators';
    export default {
        data() {
            return {
                showStep1Errors:false,
                showStep2Errors:false,
                showStep3Errors:false,
                accountTypes:['Cheque','Savings' ],
                packageOptions:[],
                selectedPackageOption:'',
                locations:[],
                selectedLocation:'',
                applicationMeta:{
                    applicationId:0,
                    personalDetailsId:0,
                    serviceTypeId:0,
                    bankingDetailsId:0,
                },
                personalDetails: {
                    title: 'Mr',
                    name: 'Neo',
                    surname: 'Mokoena',
                    email: 'neo@enigma.co.ls',
                    phoneMobile: '+266 62333344',
                    phoneHome: '-',
                    phoneOffice: '22333344',
                    postalAddress:'PO Box 245',
                    physicalAddress:'Maseru East, Bochabela Street',
                    passport:'RS256789',
                    location:''
                   
                  
                },
                serviceTypeDetails:{
                    serviceType:'contract',
                    package:'',
                    adslCustomer:false,
                    adslNumber:''

                },
                bankingDetails:{
                    bankName:'FNB',
                    branchName:'Pioneer',
                    branchCode:'6645',
                    accountHolderName:'Neo Mokoena',
                    accountType:'Savings',
                    accountNumber:'04662535'
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
                 serviceTypeDetails:{
                    package:{required},
                    adslNumber:{
                            requiredIf:requiredIf(function() {
                        return this.serviceTypeDetails.adslCustomer;
                    })}

                },
                bankingDetails:{
                    bankName:{required},
                    branchName:{required},
                    branchCode:{required},
                    accountHolderName:{required},
                    accountType:{required},
                    accountNumber:{required}
                                 }
         },
        mounted(){
            this.getLookups();

        },
        methods: {
            placeApplication(){
                axios.post(`./api/place-application`,Object.assign({}, this.personalDetails,this.serviceTypeDetails,this.bankingDetails)).then(response=>{
                    console.log(response);
                });
            },
            validateStep1($v){
                this.showStep1Errors =true;
                   
                return  !$v.personalDetails.name.$invalid && !$v.personalDetails.surname.$invalid && !$v.personalDetails.email.$invalid 
                        && !$v.personalDetails.phoneMobile.$invalid && !$v.personalDetails.postalAddress.$invalid && !$v.personalDetails.physicalAddress.$invalid
                        && !$v.personalDetails.passport.$invalid && !$v.personalDetails.location.$invalid;
            },
            validateStep2($v){
                this.showStep2Errors =true;
                   
                return  !$v.serviceTypeDetails.package.$invalid && !$v.serviceTypeDetails.adslNumber.$invalid  ;
            },
            validateStep3($v){
                this.showStep3Errors =true;
                return  !$v.bankingDetails.bankName.$invalid && !$v.bankingDetails.branchName.$invalid,
                        !$v.bankingDetails.branchCode.$invalid && !$v.bankingDetails.accountHolderName.$invalid,  
                        !$v.bankingDetails.accountType.$invalid && !$v.bankingDetails.accountNumber.$invalid;
            },
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
                });
            },
            getFtthLocationsFromServer(){
                axios.get(`/api/ftth-locations`).then((resp)=>{
                    console.log(resp);
                    this.locations=resp.data;
                    console.log("locations",this.locations);
                });
            },
            getLookups(){
                this.getPackagesFromServer();
                this.getFtthLocationsFromServer();
            }
                           
        },
        computed:{
            rules(){
                return this.serviceTypeDetails.adslCustomer?'required':'';
            }
        },
        watch:{
            'serviceTypeDetails.adslCustomer': function(){
                this.serviceTypeDetails.adslNumber='';               
            },
            'serviceTypeDetails.serviceType': function(){
                this.getPackagesFromServer();               
            },
            selectedLocation:function(newValue,oldValue){
                this.personalDetails.location=newValue.id;
            },
            selectedPackageOption:function(newValue,oldValue){
                this.serviceTypeDetails.package=newValue.id;
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
        .section-container{
            .section-title{
                    font-weight: 600;
                    font-size: 1.5rem;
                    color: rgba(0,0,0,0.5);
                    margin-bottom: 5px;
                    margin-top: 15px;
            }
            .item-container{
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(0,0,0,0.2);
            padding: 5px 0;
            .item-title{
                    font-size: 1.2rem;
                    font-weight: 300;
                    color: rgba(0,0,0,0.5);
            }
            .item-content{
                    font-size: 1.2rem;
                    font-weight: 500;
                    color: rgba(0,0,0,0.6);
            }
    }
        }
</style>