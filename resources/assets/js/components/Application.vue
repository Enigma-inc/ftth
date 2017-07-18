<script>

    export default {
        data() {
            return {
                currentStep:2,
                isAdslCutomer:false,
                applicationMeta:{
                    applicationId:1,
                    personalDetailsId:1,
                    serviceTypeId:1,
                    bankingDetailsId:0,
                },
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
            console.log('Notifications'.notifications);
        },
        methods: {
            submitPersonalDetails(scope){
                   this.$validator.validateAll(scope).then(() => {
                        axios.post(`./application/${this.applicationMeta.applicationId}/personal-details/
                                    ${this.applicationMeta.personalDetailsId}`,
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
                          
                })
                .catch(()=>{
                       EventBus.$emit('VALIDATION_ERROR');
                });
            },
            submitServiceType(scope){
                   this.$validator.validateAll(scope).then(() => {
                      
                        axios.post(`./application/${this.applicationMeta.applicationId}/service-type/
                        ${this.applicationMeta.serviceTypeId}`
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
                })
                .catch(()=>{
                         EventBus.$emit('VALIDATION_ERROR');
                }); 
            },
            submitBankingDetails(scope){
                   this.$validator.validateAll(scope).then(() => {
                        axios.post(`./application/${this.applicationMeta.applicationId}/banking/
                        ${this.applicationMeta.bankingDetailsId}`,this.bankingDetails)
                            .then(res=>{
                                console.log(res);
                            })
                            .catch(error=>{
                                console.log(error)                
                                });                      
                })
                .catch(()=>{
                         EventBus.$emit('VALIDATION_ERROR');
                });
            } ,
                           
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