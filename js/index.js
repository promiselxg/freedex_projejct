function ajaxObj(meth, url) {
  var x = new XMLHttpRequest();
  x.open(meth, url, true);
  x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  return x;
}
function ajaxReturn(x) {
  if (x.readyState == 4 && x.status == 200) {
    return true;
  }
}
function _(x) {
  return document.getElementById(x);
}
function NumbersOnly(el) {
  var tf = _(el);
  var rx = new RegExp();
  //Track
  if (el == "Phone") {
    rx = /[^0-9+]/i;
  }
  tf.value = tf.value.replace(rx, "");
}

function validate() {
  let fname = _("First").value;
  let lname = _("Last").value;
  let email = _("Email").value;
  let phone = _("Phone").value;
  if (fname == "" || lname == "" || email == "" || phone == "") {
    swal(
      "Required Fields",
      "You left a field empty, Please fill all fields.",
      "error"
    );
  } else if (email.indexOf("@") == -1) {
    swal(
      "Invalid Email Address",
      "Please enter a valid Email Address.",
      "error"
    );
  } else {
    _("submit").innerHTML = "Please Wait...";
    _("submit").disabled = true;
    var ajax = ajaxObj("POST", "contact.php");
    ajax.onreadystatechange = function () {
      if (ajaxReturn(ajax) == true) {
        var response = ajax.responseText.split("|");
        //alert(response[1]);return false;
        if (response[1] == "success") {
          swal(response[0]).then((value) => {
            window.location = window.location;
          });
        } else {
          swal("Email Subscription Failed", response[0], response[1]);
          _("submit").innerHTML = "SEND US A MESSAGE";
          _("submit").disabled = false;
        }
      }
    };
    ajax.send(
      "fname=" +
        fname +
        "&lname=" +
        lname +
        "&email=" +
        email +
        "&phone=" +
        phone
    );
  }
}
