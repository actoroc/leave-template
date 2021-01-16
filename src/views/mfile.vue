<template>
  <div class="aboutdata">
    <div class="title">
      <i class="el-icon-user"></i>
      <span>个人资料</span>
    </div>
    <el-form ref="form" label-width="80px" size="mini">
      <el-form-item label="员工号">
        <span>{{ tableData.mgrno }}</span>
      </el-form-item>
      <el-form-item label="姓名">
        <span>{{ tableData.mname }}</span>
      </el-form-item>
      <el-form-item label="年龄">
        <span>{{ tableData.age }}</span>
      </el-form-item>
      <el-form-item label="性别">
        <span>{{ tableData.sex }}</span>
      </el-form-item>
      <el-form-item label="邮箱">
        <span>{{ tableData.email }}</span>
      </el-form-item>
      <el-form-item label="部门">
        <span>{{ tableData.dept }}</span>
      </el-form-item>
    </el-form>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      tableData: [],
    };
  },
  created() {
   
    let obj = {
      username: this.$store.state.user,
    };
    axios
      .post("/api/mfile.php", obj)
      .then((res) => (this.tableData = res.data));
  },
};
</script>
<style lang="less" scoped>
.aboutdata {
  flex: 1;
  margin-top: 30px;
  margin-left: 30px;
}
</style>