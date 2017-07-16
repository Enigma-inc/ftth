<script>
import {FormWizard, TabContent} from 'vue-form-wizard';
import 'vue-form-wizard/dist/vue-form-wizard.min.css';

    export default {
        components: {
                FormWizard,
                TabContent
                },
        data() {
            return {
                currentStep:1,
                isAdslCutomer:false,
                personalDetails: {
                    title: '',
                    name: 'Neo',
                    surname: 'Mokoena',
                    email: 'neo@enigma.co.ls',
                    phoneMobile: '62333344',
                    phoneHome: '28503344',
                    phoneOffice: '28503344',
                    postalAddress:'Ha Mphele, Box 25, Teyateyaneng',
                    physicalAddress:'Maseru East Next to Maseru High School',
                    passport:'RA403389',
                    location:''
                   
                  
                },
                serviceTypeDetails:{
                    serviceType:'contract',
                    package:'2GB',
                    adslCustomer:false,
                    adslNumber:''

                },
                bankingDetails:{
                    bankName:'FNB',
                    branchCode:'06602',
                    accountHolderName:'Neo Mokoena',
                    accountType:'savings',
                    accountNumber:'01439293940'
                }
            }
        },
        mounted(){
        },
        methods: {
            submitStep(){
                console.log("Changing...");
                switch(this.currentStep){
                    case 1:{
                      console.log(this.submitPersonalDetails('form-personal'));
                        break;
                    }
                    default:{
                        break;
                    }
                }

            },
            submitPersonalDetails(scope){
               return this.$validator.validateAll(scope).then(() => {
                       this.showNextFormStepMessage('Pick your prefered package on the next step');
                        // axios.post('./application/personal-details',this.personalDetails)
                        //     .then(res=>{
                        //         console.log(res);
                        //     })
                        //     .catch(error=>{
                        //         console.log(error)                
                        //         });      
                        return true;                
                })
                .catch(()=>{
                        this.showFormErrorMessage();
                        return false;
                });
            },
            submitServiceType(scope){
                   this.$validator.validateAll(scope).then((validationResults) => {
                       alert('Valide....');
                        // axios.post('./application',this.application)
                        //     .then(res=>{
                        //         console.log(res);
                        //     }) 
                        //     .catch(error=>{
                        //         console.log(error)                
                        //         });                      
                })
                .catch(()=>{
                        this.showFormErrorMessage();
                }); 
            },
            submitBankingDetails(scope){
                   this.$validator.validateAll(scope).then(() => {
                       console.log(this.bankingDetails);
                       alert('submitted');
                        // axios.post('./application',this.application)
                        //     .then(res=>{
                        //         console.log(res);
                        //     })
                        //     .catch(error=>{
                        //         console.log(error)                
                        //         });                      
                })
                .catch(()=>{
                        this.showFormErrorMessage();
                });
            },
            showFormErrorMessage(){
                  swal({
                    title: 'Oops!',
                    text: 'There are errors on the form',
                    type: 'error',
                    confirmButtonText: 'Ok'
                    })
            },
            showApplicationCompleteMessage(){
                  swal({
                    title: 'Success!',
                    text: 'Thank, You have completed your application for FTTH. We will get back to you',
                    type: 'success',
                    confirmButtonText: 'Ok'
                    })
            },
            showNextFormStepMessage(message){
                  swal({
                    title: 'Next Step',
                    text: message,
                    type: 'info',
                    confirmButtonText: 'Next Step',
                    cancelButtonText: 'Finish Later',
                    showCancelButton:true
                    })
            }

                 
        },
        computed:{
            rules(){
                return this.isAdslCutomer?'required':'';
            }
        },
        watch:{
            'serviceTypeDetails.adslCustomer': function(){
                this.isAdslCutomer=this.serviceTypeDetails.adslCustomer;
                this.serviceTypeDetails.adslNumber='';
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