<script>
    export default {
        data() {
            return {
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
                   
                  
                },
                serviceTypeDetails:{
                    serviceType:'contract',
                    package:'2GB',
                    adslCustomer:false,
                    adslNumber:'679384939'

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
            submitPersonalDetails(scope){
                   this.$validator.validateAll(scope).then(() => {
                       console.log(this.personalDetails);
                       alert('Valide....');
                        // axios.post('./application',this.application)
                        //     .then(res=>{
                        //         console.log(res);
                        //     })
                        //     .catch(error=>{
                        //         console.log(error)                
                        //         });                      
                }); 
            },
            submitServiceType(scope){
                   this.$validator.validateAll(scope).then(() => {
                       console.log(this.serviceTypeDetails);
                       alert('Valide....');
                        // axios.post('./application',this.application)
                        //     .then(res=>{
                        //         console.log(res);
                        //     })
                        //     .catch(error=>{
                        //         console.log(error)                
                        //         });                      
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
                }); 
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