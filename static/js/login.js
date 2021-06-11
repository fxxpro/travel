var verify = false;
let tg = TGTool();
$('#mpanel1').slideVerify({
  type: 1,
  success: function () {
    verify = true;
  },
  error: function () {
    verify = false;
  },
});

$('#user_login_btn').on('click', function () {
  var id = $('#user_login_name').val();
  var pwd = $('#user_login_password').val();
  if (id == '') tg.warning('请输入用户名！');
  else if (pwd == '') tg.warning('请输入密码！');
  else if (verify == false) tg.warning('请完成验证！');
  else {
    //发送登录请求
    $.ajax({
      url: 'login.php',
      type: 'POST',
      data: {
        username: $('#user_login_name').val(),
        password: $('#user_login_password').val(),
      },
      success: function (result) {
        if (result == 100) {
          tg.success('登录成功！');
          setTimeout(function () {
            window.location.reload();
          }, 3100);
        } else {
          tg.error('用户名或密码错误！');
          setTimeout(function () {
            window.location.reload();
          }, 3100);
        }
      },
    });
  }
});

//点击注册按钮弹出模态框
$('#user_register_btn').click(function () {
  //清除表单数据（表单重置）
  show_validate_msg('#name_add_input', '', '');
  show_validate_msg('#password_add_input', '', '');
  show_validate_msg('#password2_add_input', '', '');
  $('#name_add_input').val('');
  $('#password_add_input').val('');
  $('#password2_add_input').val('');
  //弹出模态框
  $('#modal-container').removeAttr('class').addClass('one');
  $('body').addClass('modal-active');
});

//显示校验提示
function show_validate_msg(ele, status, msg) {
  //首先清空当前元素
  $(ele).parent().removeClass('has-success has-error');
  $(ele).next('span').text('');
  if ('success' == status) {
    $(ele).parent().addClass('has-success');
    $(ele).next('span').text(msg);
  } else if ('error' == status) {
    $(ele).parent().addClass('has-error');
    $(ele).next('span').text(msg);
  }
}
//校验表单数据
function validate_add_form() {
  var rtn = true;
  //1.拿到要校验的数据，使用jquery正则表达式
  var userName = $('#name_add_input').val();
  var regName = /(^[a-zA-Z0-9_-]{3,16}$)|(^[\u2E80-\u9FFF]{2,5})/;
  if (!regName.test(userName)) {
    show_validate_msg('#name_add_input', 'error', '×:2-5中文或3-16英文数字');
    rtn = false;
  } else {
    show_validate_msg('#name_add_input', 'success', '√');
  }
  //2.密码校验（两次一样且不为空）
  var password1 = $('#password_add_input').val();
  var password2 = $('#password2_add_input').val();
  if (password1 == '') {
    show_validate_msg('#password_add_input', 'error', '×:密码不能为空');
    rtn = false;
  } else {
    show_validate_msg('#password_add_input', 'success', '√');
  }
  if (password2 == '') {
    show_validate_msg('#password2_add_input', 'error', '×:请再次输入密码');
    rtn = false;
  } else if (password1 != password2) {
    show_validate_msg(
      '#password2_add_input',
      'error',
      '×:输入的两次密码不相同'
    );
    rtn = false;
  } else {
    show_validate_msg('#password2_add_input', 'success', '√');
  }
  return rtn;
}

//点击保存，注册用户
$('#user_save_btn').click(function () {
  //1.前端校验表单数据
  if (!validate_add_form()) {
    tg.error('注册失败！');
    return false;
  }
  //2.发送ajax请求注册用户
  $.ajax({
    url: 'register.php',
    type: 'POST',
    data: {
      username: $('#name_add_input').val(),
      password: $('#password2_add_input').val(),
    },
    success: function (result) {
      if (result == 200) {
        tg.error('注册失败！');
        show_validate_msg('#name_add_input', 'error', '×:该用户名已存在');
      } else {
        tg.success('注册成功!');
        $('#user_login_name').val($('#name_add_input').val());
        $('#modal-container').addClass('out');
        $('body').removeClass('modal-active');
      }
    },
  });
});
//显示实时时间
function showTime() {
  var time = new Date();
  nowTime =
    time.getMonth() +
    1 +
    '-' +
    time.getDate() +
    ' ' +
    time.getHours() +
    ':' +
    time.getMinutes() +
    ':' +
    time.getSeconds();
  document.getElementById('time').innerHTML = nowTime;
}
//点击关闭模态框
setInterval('showTime()', 1000);
$('#closeBtn').click(function () {
  $('#modal-container').addClass('out');
  $('body').removeClass('modal-active');
});
