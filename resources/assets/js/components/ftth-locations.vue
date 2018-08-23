<template>
<div>
  <div  class="col-xs-12 col-sm-12">
    <div class="location-container" v-for="(location,i) in locations" :key="i">
        <img v-img={title:location.name} :src=location.image_path alt="">
      <div class="blockquote">
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
  </div>
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
.flex-1 {
  flex: 1;
}

.location-container {
  display: flex;
  img {
    height: 50px;
  }
  .blockquote {
    display: flex;
    width: 100%;

    blockquote {
      width: 100%;
      min-height: 80px;
      .title-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        p {
          flex: 1;
          font-size: 0.7em;
          font-weight: 600;
        }
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
}
</style>

