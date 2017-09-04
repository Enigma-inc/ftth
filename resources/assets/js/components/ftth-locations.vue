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
              {zoom:14,name:'Maseru East, Lakeside, BEDCO & Mohalalitoe',description:' ',file:'maseru-east'},
              {zoom:14,name:'Bus-stop, Cathedral, Sea-point, Stadium Area & Moshoeshoe II',description:' ',file:'bus-stop'},
              {zoom:14,name:'Maseru CBD',description:'',file:'maseru-cbd'},
              {zoom:14,name:'Fokothi & the neighbourhood',description:'',file:'fokothi'},
              {zoom:14,name:'Maseru West',description:' All the way through to Partners in Health Lesotho Headquarters',file:'maseru-west'},
              {zoom:14,name:'Maseru Industrial',description:'',file:'maseru-industrial'},
              {zoom:14,name:'Florida, Hoohlo & Border Post',description:'',file:'florida'},
              {zoom:14,name:'Arrival Centre and Prisons Gardens',description:'',file:'arrival-center'},
              {zoom:14,name:'Maseru Central, Matekane Estates and Qoatsaneng',description:'',file:'qoatsaneng'},
              {zoom:14,name:'Europa & New Parliament',description:'',file:'new-parliament'},
              {zoom:14,name:'Happy Villa & Hillsview',description:'Entire suburb',file:'hills-view'},
              {zoom:14,name:'Katlehong, White City, STC & Maseru Mall',description:'',file:'katlehong'},
              {zoom:14,name:'Stationary area',description:'Lesotho Times offices and surrounding suburban homes',file:'lower-thetsane'},
              {zoom:14,name:'Lower Thetsane',description:' From next to the main road through to Mr. Matekane Residential Mansion',file:'lower-thetsane'},
              {zoom:14,name:'Thetsane Industrial',description:'',file:'tsetsane-industrial'},
              {zoom:14,name:'Thetsane West & Lesia',description:'',file:'tsetsane-west-lesia'},
              {zoom:14,name:'Thetsane East',description:'',file:'thetsane-east'},
              {zoom:14,name:'Masowe 2',description:'',file:'maswe-3'},
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

