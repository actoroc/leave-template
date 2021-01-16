<template>
  <div class="aboutdata">
    <div class="title">
      <i class="el-icon-date"></i>
      <span>请假具体资料</span>
    </div>
    <el-table :data="tableData">
      <el-table-column type="expand">
        <template slot-scope="props">
          <el-form label-position="left" inline class="demo-table-expand">
            <el-form-item label="员工号">
              <span>{{ props.row.empno }}</span>
            </el-form-item>
            <el-form-item label="姓名">
              <span>{{ props.row.ename }}</span>
            </el-form-item>
            <el-form-item label="部门">
              <span>{{ props.row.dept }}</span>
            </el-form-item>
            <el-form-item label="邮箱">
              <span>{{ props.row.email }}</span>
            </el-form-item>
            <el-form-item label="请假负责人">
              <span>{{ props.row.mname }}</span>
            </el-form-item>
            <el-form-item label="请假类型">
              <span>{{ props.row.leavetype }}</span>
            </el-form-item>
            <el-form-item label="时间">
              <span>{{ props.row.ltime }}</span>
            </el-form-item>
             <el-form-item label="状态">
              <span>{{ props.row.status }}</span>
            </el-form-item>
          </el-form>
        </template>
      </el-table-column>
      <el-table-column label="姓名" prop="ename"> </el-table-column>
      <el-table-column label="部门" prop="dept"> </el-table-column>
      <el-table-column label="请假负责人" prop="mname"> </el-table-column>
      <el-table-column label="时间" prop="ltime"> </el-table-column>
    </el-table>
  </div>
</template>

<style>
.aboutdata {
  flex: 1;
}
.title {
  display: inline-block;
  margin: 20px 0px;
  border-bottom: solid 1px #e6e6e6;
  width: 100%;
  color: #ef4f4f;
  padding-bottom: 10px;
}
.demo-table-expand {
  font-size: 0;
}
.demo-table-expand label {
  width: 90px;
  color: #99a9bf;
}
.demo-table-expand .el-form-item {
  margin-right: 0;
  margin-bottom: 0;
  width: 50%;
}
</style>

<script>
import axios from 'axios'
export default {
  name: "Home",
  data() {
    return {
      tableData: [],
    };
  },
  created() {
  
    axios.post("/api/get.php").then((res) =>(this.tableData = res.data));
    // console.log(this.tableData);
  },
};
</script>