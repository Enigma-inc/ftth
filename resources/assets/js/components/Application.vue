<script>
    export default {
        data() {
            return {
                isAdslCutomer:false,
                application: {
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
                    serviceType:'contract',
                    contractPackage:'2GB',
                    adslCustomer:false,
                    adslNumber:'679384939',

                    //Banking Details
                    bankName:'FNB',
                    branchCode:'06602',
                    accountHolderName:'Neo Mokoena',
                    accountType:'savings',
                    accountNumber:'01439293940'
                },
            }
        },
        mounted(){
        },
        methods: {
            placeApplication(){
                   this.$validator.validateAll().then(() => {
                        axios.post('./application',this.application)
                            .then(res=>{
                                console.log(res);
                            })
                            .catch(error=>{
                                console.log(error)                
                                });                      
                }); 
            }
                 
        },
        watch:{
            'application.adslCustomer': function(){
                this.isAdslCutomer=this.application.adslCustomer;
                this.application.adslNumber='';
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