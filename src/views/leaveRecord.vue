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
        <el-table-column prop="day" label="请假时长(天)"> </el-table-column>
        <el-table-column label="操作" width="180">
          <template slot-scope="scope">
            <el-button
              size="mini"
              type="danger"
              @click="handleDelete(scope.$index, scope.row)"
              >删除</el-button
            >
          </template>
        </el-table-column>
      </el-table>
      <div class="total">
        <span>请假总天数:</span><span>{{ item }}</span>
      </div>
    </template>
  </div>
</template>



<style lang="less">
.check {
  flex: 1;
  margin-top: 20px;
}
.total {
  margin-right: 200px;
  float: right;
  font-size: 20px;
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
    axios
      .post("/api/allLeave.php", { username: this.$store.state.user })
      .then((res) => {
        this.tableData = res.data;
      });
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
    handleDelete(index, row) {
      let obj = {
        ltime: row.ltime,
      };
      axios.post("/api/delLeave.php", obj);
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
  computed: {
    item() {
      return this.tableData.reduce((tolal, cur) => (tolal += cur.day * 1), 0);
    },
  },
};
</script>