<template>
  <a :href="link" class="btn btn-xs  btn-danger">Apply</a>
</template>
<script>
export default {
  props: ["package", "location", "packageType"],
  data() {
    return {
      link: "../../application"
    };
  },
  mounted() {
    if (this.package) {
      this.link = this.link.concat(`?package=${this.package}`);
    }
    if (this.location) {
      this.package
        ? (this.link = this.link.concat(`&location=${this.location}`))
        : (this.link = this.link.concat(`?location=${this.location}`));
    }

    if (this.packageType) {
      this.location || this.package
        ? (this.link = this.link.concat(`&type=${this.packageType}`))
        : (this.link = this.link.concat(`?type=${this.packageType}`));
    }
  }
};
</script>
<style lang="scss" scoped>
.btn {
  margin: 3px;
}
</style>

