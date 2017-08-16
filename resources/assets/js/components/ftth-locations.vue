<template>
<div>
  <div  class="col-xs-12 col-sm-6">
    <div class="location-container" v-for="(location,i) in locations" :key="i">
    <blockquote>
             <div class="title-container">
                <p>
                  {{location.name}}
                </p>
               
                    <div v-if="location.file"  class="btn btn-xs " :class="{ 'btn-danger': location==selectedLocation }" @click="enlargeMap(location)">View On Map</div>
                </div>
                <small v-if="location.description">{{location.description}}</small>
     </blockquote>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6">
     <ftth-map></ftth-map>

  </div>
</div>
</template>
<script>
export default {
    data(){
        return{
            showModal:false,
            smallMapZoom:13,
            largeMapZoom:16,
            selectedLocation:{},
            locations:[
              {zoom:15,name:'Lower Thetsane',description:' From next to the main road through to Mr. Matekane Residential Mansion',file:'lower-thetsane'},
              {zoom:13,name:'Maseru West',description:' All the way through to Partners in Health Lesotho Headquarters',file:'maseru-west'},
              {zoom:15,name:'Maswe 3',description:'',file:'maswe-3'},
              {zoom:15,name:'Thetsane West',description:'',file:''},
              {zoom:15,name:'Thetsane East',description:'',file:''},
              {zoom:15,name:'Stationary area',description:'Lesotho Times offices and surrounding suburban homes',file:''},
              {zoom:15,name:'Hills View',description:'Entire suburb',file:''},
              {zoom:15,name:'New and Old Europa suburb areas',description:'From Khali Motel to Arrival Centre suburb',file:''},
              {zoom:15,name:'Golf Course Estates Area to Centre of Accounting Studies',description:'Through AVANI Maseru areas are also covered.',file:''},
            ],
        }
    },
    mounted(){
             this.selectedLocation=this.locations[0];
            EventBus.$emit('show-map',this.selectedLocation);
    },
     methods : {
      enlargeMap(location){
            this.selectedLocation=location;
            EventBus.$emit('show-map',this.selectedLocation);
         },
     }
  
}
</script>
<style lang="scss" scoped>
    .location-container{
        .title-container{
              display: flex;
              align-items: center;  
              p{
                  flex: 1;
                  font-size: 0.7em;
                  font-weight: 600;
              }
        }
        small{
                font-size: 0.7em;
        }
        
       blockquote{
               padding: 5px;
                margin: 0 0 10px;
       }
        .image-placeholder{
           //  margin:5px;
            height: 100px;
            width: 140px;

        }
    }
</style>

