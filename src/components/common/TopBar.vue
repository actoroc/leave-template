<template>
  <div class="top">
    <el-menu
      :default-active="activeIndex"
      class="el-menu-demo"
      mode="horizontal"
      @select="handleSelect"
    >
       <el-menu-item index="1" class="logo">请假模块</el-menu-item>
      <el-submenu index="2" class="user">
        <template slot="title" >{{this.$store.state.user}}</template>
        <el-menu-item index="2-1" @click="fileItem">用户信息</el-menu-item>
        <el-menu-item index="2-2" @click="quitItem">退出登录</el-menu-item>
      </el-submenu>
    </el-menu>
  </div>
</template>
<script>
export default {
  data() {
    return {
      activeIndex: "1",
      activeIndex2: "1",
    };
  },
  methods: {
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    },
    quitItem(){
      this.$store.state.user='';
      this.$store.state.count='';
      sessionStorage.clear();
      this.$router.push('/login');
    },
    fileItem(){
       if (this.$store.state.count == 1) {
       this.$router.push("/file");
      } else {
        this.$router.push("/mfile");
      }
    }
  },
 
 
};
</script>
<style lang="less">
.top {
  margin-bottom: 20px;
  .el-menu-demo{
    width: 80vw;
    position: relative;
    left: 50%;
    transform: translateX(-50%);
    .logo{
      font-size: 25px;
      color: #a3ddcb!important;
    }
    .user{
      float: right;
    }
  }
}

</style>