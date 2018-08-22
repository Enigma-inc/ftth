<template>
  <a :href="link" class="btn btn-xs  btn-danger">Apply</a>
</template>
<script>
export default {
  props: ["package", "location"],
  data() {
    return {
      link: "../../application"
    };
  },
  mounted() {
    if (this.package) {
      console.log(this.package);
      this.link = this.link.concat(`?package=${this.package}`);
    }
    if (this.location) {
      this.package
        ? (this.link = this.link.concat(`&location=${this.location}`))
        : (this.link = this.link.concat(`?location=${this.location}`));
    }
  }
};
</script>
<style lang="scss" scoped>
</style>

