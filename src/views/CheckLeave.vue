<template>
  <div class="check">
    <template>
      <el-table
        :data="tableData"
        style="width: 100%"
        :row-class-name="tableRowClassName"
      >
        <el-table-column prop="empno" label="员工号"> </el-table-column>
        <el-table-column prop="ename" label="姓名"> </el-table-column>
        <el-table-column prop="dept" label="部门"> </el-table-column>
        <el-table-column prop="email" label="邮箱"> </el-table-column>
        <el-table-column prop="leavetype" label="请假类型"> </el-table-column>
        <el-table-column prop="ltime" label="请假时间" width="250">
        </el-table-column>
        <el-table-column prop="mname" label="经理"> </el-table-column>
        <el-table-column prop="status" label="状态"> </el-table-column>
        <el-table-column label="操作" width="180">
          <template slot-scope="scope">
            <el-button size="mini" @click="handleEdit(scope.$index, scope.row)"
              >同意</el-button
            >
            <el-button
              size="mini"
              type="danger"
              @click="handleDelete(scope.$index, scope.row)"
              >拒绝</el-button
            >
          </template>
        </el-table-column>
      </el-table>
    </template>
  </div>
</template>
<style lang="less">
.check {
  flex: 1;
  margin-top: 20px;
}
.el-table .warning-row {
  background: oldlace;
}

.el-table .success-row {
  background: #f0f9eb;
}
tbody {
  .el-table_1_column_8 {
    .cell {
      background: #d6efc7;
    }
  }
}
</style>

<script>
import axios from "axios";
export default {
  created() {
     axios.post("/api/getLeave.php").then(res=>this.tableData = res.data);
  },

  methods: {
    tableRowClassName({ row, rowIndex }) {
      if (rowIndex === 1) {
        return "warning-row";
      } else if (rowIndex === 3) {
        return "success-row";
      }
      return "";
    },
    handleEdit(index, row) {
      let obj = {
        status: "同意",
          empno : row.empno,
      };
      axios.post("/api/check.php",obj);
      setInterval(() => {
          this.$router.go(0);
      }, 500);
      
    },
    handleDelete(index, row) {
         let obj = {
        status: "拒绝",
          empno : row.empno,
      };
      axios.post("/api/check.php",obj);
      setInterval(() => {
          this.$router.go(0);
      }, 500);
    },
  },
  data() {
    return {
      tableData: [],
    };
  },
};
</script>