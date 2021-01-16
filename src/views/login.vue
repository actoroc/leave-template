<template>
  <div class="login">
    <el-card style="width: 400px">
      <div slot="header" class="clearfix">
        <span>登录</span>
      </div>
      <table>
        <tr>
          <td>用户名</td>
          <td>
            <el-input
              v-model="user.username"
              placeholder="请输入用户名"
            ></el-input>
          </td>
        </tr>
        <tr>
          <td>密码</td>
          <td>
            <el-input
              type="password"
              v-model="user.password"
              placeholder="请输入密码"
              @keydown.enter.native="doLogin"
            ></el-input>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <el-button style="width: 150px" type="primary" @click="doLogin"
              >员工登录</el-button
            >
            <el-button style="width: 150px" type="primary" @click="doLogin1"
              >经理登录</el-button
            >
          </td>
        </tr>
      </table>
    </el-card>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "login",
  data() {
    return {
      user: {
        username: "",
        password: "",
      },
    };
  },
  methods: {
    doLogin() {
      axios.post("/api/emplogin.php", this.user).then((res) => {
        if (res.data) {
          sessionStorage.setItem("user", res.data.ename);
          this.$store.state.user = sessionStorage.getItem("user");
          sessionStorage.setItem("count", 1);
          this.$store.state.count = sessionStorage.getItem("count");
          if (this.$route.query.Rurl) {
            this.$router.push(this.$route.query.Rurl);
          } else {
            this.$router.push("/testemp");
          }
        } else {
          alert("账号或密码错误！");
        }
      });
      console.log();
    },
    doLogin1() {
      axios.post("/api/mgrlogin.php", this.user).then((res) => {
        if (res.data) {
          sessionStorage.setItem("user", res.data.mname);
          this.$store.state.user = sessionStorage.getItem("user");
          sessionStorage.setItem("count", 2);
          this.$store.state.count = sessionStorage.getItem("count");
          if (this.$route.query.Rurl) {
            this.$router.push(this.$route.query.Rurl);
          } else {
            this.$router.push("/home");
          }
        } else {
          alert("账号或密码错误！");
        }
      });
    },
  },
};
</script>
<style lang="less" scoped>
.login {
  display: flex;
  justify-content: center;
  margin-top: 50vh;
  margin-left: 50vw;
  transform: translate(-100%, -80%);
}
</style>