let email = require('emailjs/email');
let server = email.server.connect({
  user: '1274625317@qq.com', // 你的QQ用户
  password: 'vgynuljfrtylhjib', //注意，不是QQ密码，而是刚才生成的授权码,授权码在QQ邮箱'设置'>
  host: 'smtp.qq.com', // 主机，不改
  ssl: true, // 使用ssl
});
server.send(
  {
    text: '我是测试邮件内容3', //邮件内容
    from: '1274625317@qq.com', //谁发送的
    to: '3051610170@qq.com', //发送给谁的np
    subject: '员工请假', //邮件主题
  },
  function(err, message) {
    //回调函数
    console.log('err || message111');
  }
);
