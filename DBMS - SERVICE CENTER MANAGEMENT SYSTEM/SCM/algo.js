function set_error(id, error) {
  element = document.getElementById(id);
  element.getElementsByClassName("form_error")[0].innerHTML = error;
}

function clearErrors() {
  errors = document.getElementsByClassName("form_error");
  for (let item of errors) {
    item.innerHTML = "";
  }
}

//function to check all the fields
function checkall() {
  clearErrors();
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var password = document.getElementById("password").value;
  var cpassword = document.getElementById("cpassword").value;
  if (name == "") {
    set_error("name_error", "Name cannot be empty");
    return false;
  }
  if (email == "") {
    set_error("email_error", "Email cannot be empty");
    return false;
  }
  if (phone == "") {
    set_error("phone_error", "Phone cannot be empty");
    return false;
  }
  if (password == "") {
    set_error("password_error", "Password cannot be empty");
    return false;
  }
  if (cpassword == "") {
    set_error("cpassword_error", "Confirm Password cannot be empty");
    return false;
  }
  if (password != cpassword) {
    set_error("cpassword_error", "Password and Confirm Password must be same");
    return false;
  }
  return true;
}


//function t check date format
function checkdate() {
  var date = document.forms["myform"]["fdate"].value;
  var dateformat = /^\d{4}-\d{2}-\d{2}$/;
  if (date.match(dateformat)) {
    var opera1 = date.split("-");
    var lopera1 = opera1.length;
    if (lopera1 > 1) {
      var pdate = date.split("-");
    }
    var yy = parseInt(pdate[0]);
    var mm = parseInt(pdate[1]);
    var dd = parseInt(pdate[2]);
    var ListofDays = [
      31,
      28,
      31,
      30,
      31,
      30,
      31,
      31,
      30,
      31,
      30,
      31,
    ];
    if (mm == 1 || mm > 2) {
      if (dd > ListofDays[mm - 1]) {
        set_error("date", "*Invalid date format!");
        return false;
      }
    }
    if (mm == 2) {
      var lyear = false;
      if (yy % 4 == 0) {
        lyear = true;
      }
      if (lyear == false && dd >= 29) {
        set_error("date", "*Invalid date format!");
        return false;
      }
      if (lyear == true && dd > 29) {
        set_error("date", "*Invalid date format!");
        return false;
      }
    }
  } else {
    set_error("date", "*Invalid date format!");
    return false;
  }
}

//function to check vehicle number
function checkvno() {
  var vno = document.forms["myform"]["fvno"].value;
  var vnofmt = /^[A-Z]{2}\d{2}[A-Z]{2}\d{4}$/;
  if (vno.match(vnofmt)) {
    return true;
  } else {
    set_error("vno", "*Invalid vehicle number!");
    return false;
  }
}
//function to check email
function checkemail() {
  var email = document.forms["myform"]["femail"].value;
  var emailfmt = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (email.match(emailfmt)) {
    return true;
  } else {
    set_error("email", "*Invalid email!");
    return false;
  }
}
//function to check phone number
function checkphno() {
  var phno = document.forms["myform"]["fphno"].value;
  var phnofmt = /^\d{10}$/;
  if (phno.match(phnofmt)) {
    return true;
  } else {
    set_error("phno", "*Invalid phone number!");
    return false;
  }
}
//function to check password
function checkpass() {
  var pass = document.forms["myform"]["fpass"].value;
  var passfmt = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
  if (pass.match(passfmt)) {
    return true;
  } else {
    set_error("pass", "*Invalid password!");
    return false;
  }
}

