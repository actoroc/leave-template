<template>
  <div class="empleave">
    <el-form
      :model="ruleForm"
      :rules="rules"
      ref="ruleForm"
      label-width="100px"
      class="demo-ruleForm"
    >
      <el-form-item label="员工号" prop="empno">
        <el-input v-model="ruleForm.empno"></el-input>
        <input type="button" @click="search" value="查询" />
      </el-form-item>
      <el-form-item label="姓名" prop="name">
        <el-input v-model="ruleForm.name"></el-input>
      </el-form-item>

      <el-form-item label="邮箱" prop="email">
        <el-input v-model="ruleForm.email"></el-input>
      </el-form-item>
      <el-form-item label="部门" prop="dept">
        <el-select v-model="ruleForm.dept" placeholder="请选择部门">
          <el-option label="人事部" value="人事部"></el-option>
          <el-option label="技术部" value="技术部"></el-option>
          <el-option label="运营部" value="运营部"></el-option>
          <el-option label="策划部" value="策划部"></el-option>
        </el-select>
      </el-form-item>
      <el-form-item label="请假类型" prop="region">
        <el-select v-model="ruleForm.region" placeholder="请选择请假类型">
          <el-option label="事假" value="事假"></el-option>
          <el-option label="病假" value="病假"></el-option>
          <el-option label="婚假" value="婚假"></el-option>
          <el-option label="产假" value="产假"></el-option>
        </el-select>
      </el-form-item>
      <el-form-item label="请假负责人" prop="manager">
        <el-select v-model="ruleForm.manager" placeholder="请选择负责人">
          <el-option label="白鱼" value="白鱼"></el-option>
          <el-option label="红狗" value="红狗"></el-option>
          <el-option label="蓝猫" value="蓝猫"></el-option>
          <el-option label="黄虎" value="黄虎"></el-option>
        </el-select>
      </el-form-item>

      <el-form-item label="请假时间" required>
        <el-col :span="11">
          <el-form-item prop="date">
            <el-date-picker
              placeholder="日期不能为空"
              v-model="ruleForm.value"
              type="datetimerange"
              range-separator="至"
              start-placeholder="开始日期"
              end-placeholder="结束日期"
              :picker-options="datePickerOptions"
            >
            </el-date-picker>
          </el-form-item>
        </el-col>
      </el-form-item>

      <el-form-item label="请假理由" prop="desc">
        <el-input type="textarea" v-model="ruleForm.desc"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="submitForm('ruleForm')"
          >申请</el-button
        >
        <el-button @click="resetForm('ruleForm')">重置</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    var emailFun = (rule, value, callback) => {
      if (
        /^\w{1,64}@[a-z0-9]{1,256}(\.[a-z]{2,6}){1,2}$/i.test(value) == false
      ) {
        callback(new Error("邮箱格式错误"));
      } else {
        callback();
      }
    };
    var validatePass = (rule, value, callback) => {
      if (!this.ruleForm.value) {
        callback(new Error("请输入日期"));
        console.log(this.ruleForm.value);
      } else {
        if (this.ruleForm.value !== "") {
          this.$refs.ruleForm.validateField("checkPass");
        }
        callback();
      }
    };
    return {
      ruleForm: {
        name: "",
        region: "",
        desc: "",
        value: [],
        empno: "",
        dept: "",
        email: "",
        manager: "",
        day: "",
      },
      rules: {
        empno: [
          { required: true, message: "请输入员工号", trigger: "blur" },
          { min: 5, max: 5, message: "请输入5员工号", trigger: "blur" },
        ],
        region: [
          { required: true, message: "请选择请假类型", trigger: "change" },
        ],
        date: [{ required: true, trigger: "blur", validator: validatePass }],
        name: [{ required: true, message: "请填写姓名", trigger: "blur" }],
        email: [
          { required: true, message: "请输入邮箱", trigger: "blur" },
          {
            validator: emailFun,
          },
        ],
        manager: [
          { required: true, message: "请选择请假负责人", trigger: "change" },
        ],
        dept: [{ required: true, message: "请填写部门", trigger: "blur" }],
        desc: [{ required: true, message: "请填写请假理由", trigger: "blur" }],
      },
      datePickerOptions: {
        disabledDate(time) {
          return time.getTime() < Date.now() - 8.64e7;
        },
      },
    };
  },
  methods: {
    submitForm(formName) {
      let day =
        (this.ruleForm.value[1].getTime() - this.ruleForm.value[0].getTime()) /
        1000 /
        (24 * 60 * 60);
      this.ruleForm.day = day;
      this.ruleForm.value[1] =
        this.ruleForm.value[1].getFullYear() +
        "-" +
        (this.ruleForm.value[1].getMonth() + 1) +
        "-" +
        this.ruleForm.value[1].getDate() +
        " " +
        this.ruleForm.value[1].getHours();
      this.ruleForm.value[0] =
        this.ruleForm.value[0].getFullYear() +
        "-" +
        (this.ruleForm.value[0].getMonth() + 1) +
        "-" +
        this.ruleForm.value[0].getDate() +
        " " +
        this.ruleForm.value[0].getHours();
      this.ruleForm.value = this.ruleForm.value.join("-");
      this.$refs[formName].validate((valid) => {
        if (valid) {
          let obj = this.ruleForm;
          axios.post("/api/submit.php", obj);
          alert("submit!");
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    resetForm(formName) {
      this.$refs[formName].resetFields();
    },
    search() {
      let empno = this.ruleForm.empno;
      axios.post("/api/emp.php", { empno }).then((res) => {
        this.ruleForm.name = res.data.ename;
        this.ruleForm.email = res.data.email;
        this.ruleForm.dept = res.data.dept;
      });
    },
  },
  
};
</script>
<style lang="less" >
.empleave {
  flex: 1;
  margin-top: 20px;
}
.el-picker-panel__body-wrapper{
.el-date-table tr td:first-child,
  td:last-child {
    pointer-events: none;
    cursor: default;
    opacity: 0.6;
    background: #f5f7fa;
  }
}
  

</style>