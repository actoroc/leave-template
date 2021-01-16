<template>
  <div id="app">
    <top-bar v-if="isShow"></top-bar>
    <div class="main">
      <side-bar v-if="isShow"> </side-bar>
      <keep-alive>
        <router-view> </router-view>
      </keep-alive>
    </div>
  </div>
</template>
<script>
import TopBar from "components/common/TopBar";
import SideBar from "components/common/SideBar";
export default {
  components: {
    TopBar,
    SideBar,
  },
  computed: {
    isShow() {
      if (this.$route.path == "/" || this.$route.path == "/login") {
        return false;
      } else return true;
    },
  },
  created() {
    if (sessionStorage.getItem("user")) {
      this.$store.state.user = sessionStorage.getItem("user");
      this.$store.state.count = sessionStorage.getItem("count");
      console.log(111);
    }
  },
};
</script>
<style lang="less">
@import url("assets/css/commom.css");
.main {
  width: 80vw;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
}
</style>
