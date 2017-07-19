<template>
  
</template>

<script>
export default{
    data(){
        return{}
    },
   mounted(){       
    EventBus.$on('VALIDATION_ERROR',()=>{
        this.showFormValidationErrorMessage();
    });
    EventBus.$on('SUBMISION_ERROR',()=>{
        this.showFormSubmissionErrorMessage();
    });
    EventBus.$on('APPLICATION_COMPLETE',()=>{
        this.showApplicationCompleteMessage();
    });
    EventBus.$on('NEXT_STEP_MESSAGE',(event)=>{
        this.showNextFormStepMessage(event.message);
    });
    EventBus.$on('APPLICATION_COMPLETE_MESSAGE',(event)=>{
        this.showApplicaionCompleteMessage();
    });
   },
   methods:{
        showFormValidationErrorMessage(){
                  swal({
                    title: 'Oops!',
                    text: 'There are errors on the form',
                    type: 'error',
                    confirmButtonText: 'Ok'
                    })
            },
            showFormSubmissionErrorMessage(){
                  swal({
                    title: 'Error!',
                    text: 'An error occured while submiting a form, please try again',
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
            },
            showApplicaionCompleteMessage(){
                  swal({
                    title: 'Congratulations!',
                    text: 'You have completed your application, we will get back to you soon.',
                    type: 'success'
                    }).then(()=>{
                        window.location="../";
                    });
            }

   }
}
    
</script>

