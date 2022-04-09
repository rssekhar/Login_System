function myFunction() {
    var x = document.getElementById("mypswd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }