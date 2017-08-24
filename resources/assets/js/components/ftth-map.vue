<template>
<div>
     <gmap-map
        :center="center"
        :zoom="zoom"
        style="width: 100%; height: 600px"
      >
      <gmap-polygon v-if="paths.length > 0" :paths="paths" 
              ref="polygon">
          </gmap-polygon>
      </gmap-map>
</div>

</template>
<script>
export default {
  data(){
      return{
          center: { lat:-29.348272, lng:27.512021},
          mapType:'satellite',
          locationFile:'',
          zoom:15,
            paths: [],
        }
      },
      mounted(){
        EventBus.$on('show-map',(location)=>{
          this.locationFile=location.file;
          this.zoom=location.zoom;
           this.getMapData();
          
        });
      },
     methods:{
        getMapData(){
        axios.get(`./data/${this.locationFile}.json`).then(response=>{
          this.paths=response.data;
          let center =(this.paths.length/2).toFixed(0);
          this.center=this.paths[center];
        
          
        });
      }
     }
}
</script>

