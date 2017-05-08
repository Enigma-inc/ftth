<script>
    export default {
        data() {
            return {
                application: {
                    title: '',
                    name: '',
                    surname: '',
                    email: '',
                    phoneMobile: '',
                    phoneHome: '',
                    phoneOffice: '',
                    passport:''
                },
            }
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