<template>
<div>
  <div  class="col-xs-12 col-sm-12">
    <div class="location-container" v-for="(location,i) in locations" :key="i">
        <!-- <img v-img={title:location.name} width="80px" src="https://v-img.review/dist/i-1.jpg?9109cbe1b575cea87f570bbe6bbf9fae" alt=""> -->
    <blockquote>
             <div class="title-container">
                <p>
                  {{location.name}}
                </p>
               
                    <!-- <div  class="btn btn-xs " :class="{ 'btn-danger': location==selectedLocation }" @click="enlargeMap(location)">View Map</div> -->
                    <apply :location="location.id"></apply>
                </div>
                <small v-if="location.description">{{location.description}}</small>
     </blockquote>
    </div>
  </div>
  <!-- <div class="col-xs-12 col-sm-6">
     <ftth-map></ftth-map>

  </div> -->
</div>
</template>
<script>
import VueImg from "v-img";
import Apply from "./apply-btn";
export default {
  components: { apply: Apply, VueImg },
  data() {
    return {
      showModal: false,
      smallMapZoom: 14,
      largeMapZoom: 16,
      selectedLocation: {},
      locations: []
    };
  },
  mounted() {
    this.fetchLocations();
    this.selectedLocation = this.locations[0];
    EventBus.$emit("show-map", this.selectedLocation);
  },
  methods: {
    enlargeMap(location) {
      this.selectedLocation = location;
      EventBus.$emit("show-map", this.selectedLocation);
    },
    fetchLocations() {
      axios.get(`/api/ftth-locations`).then(resp => {
        this.locations = resp.data;
      });
    }
  }
};
</script>
<style lang="scss" scoped>
.location-container {
  .title-container {
    display: flex;
    align-items: center;
    p {
      flex: 1;
      font-size: 0.7em;
      font-weight: 600;
    }
  }
  small {
    font-size: 0.7em;
  }

  blockquote {
    padding: 5px;
    margin: 0 0 10px;
  }
  .image-placeholder {
    //  margin:5px;
    height: 100px;
    width: 140px;
  }
}
</style>

