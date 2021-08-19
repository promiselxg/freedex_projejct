// FUNCTION TO REMOVE AN ITEM (DYNAMIC) WITH A CONFIRM DIALOG BOX
function removeItem(id, tbl) {
  swal({
    title: "Please Confirm",
    text: "Are you sure you want to delete this Record?",
    icon: "warning",
    buttons: ["Cancel", "Delete"],
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      // Ok Button was Clicked
      if (id != "" || tbl != "") {
        var ajax = ajaxObj("POST", "parser.php");
        ajax.onreadystatechange = function () {
          if (ajaxReturn(ajax) == true) {
            var response = ajax.responseText.split("|");
            //alert(response[1]);return false;
            if (response[1] == "success") {
              _(id).style.display = "none";
              swal(response[0]).then((value) => {
                window.location = window.location;
              });
            } else {
              swal("Unable to Remove Item", response[0], response[1]);
            }
          }
        };
        ajax.send("tbl=" + id + "&cat=" + tbl);
      }
    } else {
      //cancel button was clicked
      //you can decide to perform another action here.
    }
  });
}
function loginForm() {
  var u = _("uname").value;
  var p = _("pass").value;
  if (u == "" || p == "") {
    swal(
      "Empty Fields Detected",
      "Enter your Username and Password",
      "warning"
    );
  } else {
    var ajax = ajaxObj("POST", "index.php");
    _("loginBtn").innerHTML = "Please Wait...";
    ajax.onreadystatechange = function () {
      if (ajaxReturn(ajax) == true) {
        var response = ajax.responseText.split("|");
        //alert(response[1]);return false;
        if (response[1] != "success") {
          _("loginBtn").innerHTML = "Log In";
          swal("Unable to Login", response[0], response[1]);
        } else {
          window.location = "dashboard";
        }
      }
    };
    ajax.send("u=" + u + "&p=" + p);
  }
}
function notAllowed(elem) {
  var tf = _(elem);
  var rx = new RegExp();
  rx = /[&]/gi;
  tf.value = tf.value.replace(rx, "and");
}
function numbersOnly(elem) {
  var tf = _(elem);
  var rx = new RegExp();
  rx = /[^0-9]/g;
  tf.value = tf.value.replace(rx, "");
}
function blockUser(id, user, type) {
  swal({
    title: "Please Confirm",
    text: "Please confirm that you actually want to perform this Action",
    icon: "warning",
    buttons: ["Cancel", type],
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      // Ok Button was Clicked
      if (id != "" || user != "") {
        var ajax = ajaxObj("POST", "parser.php");
        ajax.onreadystatechange = function () {
          if (ajaxReturn(ajax) == true) {
            var response = ajax.responseText.split("|");
            //alert(response[1]);return false;
            if (response[1] == "success") {
              swal("User Blocked Successfully", response[0], response[1]);
            } else {
              swal("Unable to Block User", response[0], response[1]);
            }
          }
        };
        ajax.send("user=" + user + "&user_tbl=" + id + "&type=" + type);
      }
    } else {
      //cancel button was clicked
      //you can decide to perform another action here.
    }
  });
}
function changePassword() {
  var current_password = _("current_password").value;
  var new_password = _("new_password").value;
  var confirm_password = _("confirm_password").value;
  if (current_password == "" || new_password == "" || confirm_password == "") {
    swal("All Fields are Required", "Please fill out the form first", "error");
  }
  if (new_password != confirm_password) {
    swal(
      "Password Mismatch",
      "The Passwords you entered do not Match",
      "error"
    );
  }
  var ajax = ajaxObj("POST", "parser.php");
  ajax.onreadystatechange = function () {
    if (ajaxReturn(ajax) == true) {
      var response = ajax.responseText.split("|");
      //alert(response[1]);return false;
      if (response[1] == "success") {
        swal("Successfull", response[0], response[1]);
      } else {
        swal("Unable to Change Password", response[0], response[1]);
      }
    }
  };
  ajax.send(
    "current_password=" +
      current_password +
      "&new_password=" +
      new_password +
      "&confirm_password=" +
      confirm_password
  );
}
function newUser() {
  var fullname = _("fullname").value;
  var user_role = _("user_role").value;
  if (fullname == "" || user_role == "") {
    swal("All Fields are Required", "Please Fill out the form", "error");
  } else {
    var ajax = ajaxObj("POST", "parser.php");
    ajax.onreadystatechange = function () {
      if (ajaxReturn(ajax) == true) {
        var response = ajax.responseText.split("|");
        //alert(response[1]);return false;
        if (response[1] == "success") {
          swal("Successfull", response[0], response[1]);
        } else {
          swal("An Error Occured", response[0], response[1]);
        }
      }
    };
    ajax.send("fullname=" + fullname + "&user_role=" + user_role);
  }
}
