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
            smallMapZoom:14,
            largeMapZoom:16,
            selectedLocation:{},
            locations:[
              {zoom:14,name:'Maseru East',description:' ',file:'maseru-east'},
              {zoom:14,name:'Maseru West',description:' All the way through to Partners in Health Lesotho Headquarters',file:''},
              {zoom:14,name:'Happy Villa & Hillsview',description:'Entire suburb',file:'hills-view'},
              {zoom:14,name:'Stationary area',description:'Lesotho Times offices and surrounding suburban homes',file:'lower-thetsane'},
              {zoom:14,name:'Lower Thetsane',description:' From next to the main road through to Mr. Matekane Residential Mansion',file:'lower-thetsane'},
              {zoom:14,name:'Thetsane Industrial',description:'',file:'tsetsane-industrial'},
              {zoom:14,name:'Thetsane West & Lesia',description:'',file:'tsetsane-west-lesia'},
              {zoom:14,name:'Thetsane East',description:'',file:'thetsane-east'},
              {zoom:14,name:'Masowe',description:'',file:'maswe-3'},
              {zoom:14,name:'New and Old Europa suburb areas',description:'From Khali Motel to Arrival Centre suburb',file:''},
              {zoom:14,name:'Golf Course Estates Area to Centre of Accounting Studies',description:'Through AVANI Maseru areas are also covered.',file:''},
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

