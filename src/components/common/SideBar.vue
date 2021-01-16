<template>
  <el-col :span="5">
    <h5>功能列表</h5>
    <el-menu
      default-active="2"
      class="el-menu-vertical-demo"
      @open="handleOpen"
      @close="handleClose"
    >
      <el-menu-item index="1" @click="aboutItem">
        <i class="el-icon-location"></i>
        <span slot="title">系统首页</span>
      </el-menu-item>

      <el-submenu index="2">
        <template slot="title">
          <i class="el-icon-menu"></i>
          <span>请假管理</span>
        </template>
        <el-menu-item index="2-1" @click="EmpLeaveItem"
          ><i class="el-icon-arrow-right"></i>员工请假</el-menu-item
        >

        <el-menu-item index="2-2" @click="CheckLeaveItem" v-if="isCheck"
          ><i class="el-icon-arrow-right"></i>假条审核</el-menu-item
        >
      </el-submenu>
      <el-submenu index="3">
        <template slot="title">
          <i class="el-icon-document"></i>
          <span slot="title">日历</span>
        </template>

        <el-menu-item index="3-1" @click="CalenDarItem"
          ><i class="el-icon-arrow-right"></i>公众假期查询</el-menu-item
        >
      </el-submenu>
      <el-submenu index="4">
        <template slot="title">
          <i class="el-icon-s-custom"></i>
          <span slot="title">信息管理</span>
        </template>
        <el-menu-item index="4-1" @click="fileItem"
          ><i class="el-icon-arrow-right"></i>个人信息</el-menu-item
        >
        <el-menu-item index="4-2" v-if="isRecord"
        @click="leaveItem"
          ><i class="el-icon-arrow-right"></i>请假记录</el-menu-item
        >
      </el-submenu>
    </el-menu>
  </el-col>
</template>
   
<style>
.el-row .el-col-5 {
  width: 200px;
}

.el-menu-vertical-demo:not(.el-menu--collapse) {
  width: 200px;
  min-height: 400px;
}
</style>

<script>
export default {
  methods: {
    handleOpen(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    },
    aboutItem() {
      if (this.$store.state.count == 1) {
        this.$router.push("/testemp");
      } else {
        this.$router.push("/home");
      }
    },
    EmpLeaveItem() {
      this.$router.push("/empleave");
    },
    CalenDarItem() {
      this.$router.push("/calendar");
    },
    CheckLeaveItem() {
      this.$router.push("/checkleave");
    },
    fileItem() {
       if (this.$store.state.count == 1) {
       this.$router.push("/file");
      } else {
        this.$router.push("/mfile");
      }
      
    },
    leaveItem(){
      this.$router.push("/leaverecord");
    }
  },
  computed: {
    isRecord() {
      if (this.$store.state.count == 2) {
        return false;
      } else {
        return true;
      }
    },
    isCheck() {
      if (this.$store.state.count == 1) {
        return false;
      } else {
        return true;
      }
    },
  },
};
</script>