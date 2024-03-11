function printPrescrip(id) {
  //   document.getElementById("name").style.border = "none";
  //   document.getElementById("date").style.border = "none";
  //   document.getElementById("ocupation").style.border = "none";
  //   document.getElementById("age").style.border = "none";
  //   document.getElementById("va1").style.border = "none";
  //   document.getElementById("va2").style.border = "none";
  //   document.getElementById("ph1").style.border = "none";
  //   document.getElementById("ph2").style.border = "none";
  var printbtn = document.getElementById("printbtn");
  var pheading = document.getElementById("pheading");
  document.getElementById("btncheckclvisr").style.border = "none";
  document.getElementById("btncheckclvisl").style.border = "none";
  document.getElementById("btncheckamsvisr").style.border = "none";
  document.getElementById("btncheckamsvisl").style.border = "none";
  document.getElementById("btncheckconverr").style.border = "none";
  document.getElementById("btncheckconverl").style.border = "none";
  document.getElementById("btncheckpuprefsr").style.border = "none";
  document.getElementById("btncheckpuprefl").style.border = "none";

  // printbtn.setAttribute("hidden", "hidden");
  // pheading.setAttribute("hidden", "hidden");
  var page = document.getElementById("page").innerHTML;
  var restorePage = document.body.innerHTML;
  document.body.innerHTML = page;

  window.print();

  document.body.innerHTML = restorePage;
  // printbtn.setAttribute("hidden", "show");
  // pheading.setAttribute("hidden", "show");

  window.location = "viewCustomer.php?id=" + id;
}
function printInvoice(id) {
  var printbtn = document.getElementById("printbtn");
  var pheading = document.getElementById("pheading");

  printbtn.setAttribute("hidden", "hidden");
  pheading.setAttribute("hidden", "hidden");
  var page = document.getElementById("page").innerHTML;
  var restorePage = document.body.innerHTML;
  //   document.body.innerHTML = page;

  window.print();

  document.body.innerHTML = restorePage;

  // window.location = "invoice.php";
  window.location = "viewCustomer.php?id=" + id;
}

function addCustomer() {
  var name = document.getElementById("name");
  var address = document.getElementById("address");
  var phone = document.getElementById("etno");
  var dob = document.getElementById("dob");

  var f = new FormData();
  f.append("name", name.value);
  f.append("address", address.value);
  f.append("phone", phone.value);
  f.append("dob", dob.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "Success") {
        window.location = "addNewCustomer.php";
        alert("Customer Added Successfully");
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "addNewCustomerProcess.php", true);
  r.send(f);
}

function searchCustomer() {
  var dob = document.getElementById("searchdob");

  if (dob.value == "") {
    alert("Please Enter Date of Birth");
    // return;
  } else {
    var f = new FormData();
    f.append("dob", dob.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea").innerHTML = t;
      }
    };

    r.open("POST", "searchCustomerProcess.php", true);
    r.send(f);
  }
}

function searchCustomermobile() {
  var mobile = document.getElementById("searchmobile");

  if (mobile.value == "") {
    alert("Please Enter Mobile Number..");
    // return;
  } else {
    var f = new FormData();
    f.append("mobile", mobile.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea").innerHTML = t;
      }
    };

    r.open("POST", "searchCustomerProcessMobile.php", true);
    r.send(f);
  }
}

var signInBTN = document.getElementById("signInBTN");

function spinner2() {
  signInBTN.innerHTML = "<div class='dot-carousel'></div>";

  setTimeout(signIn, 4000);

  setTimeout(spinner2change, 3900);
}

function spinner2change() {
  signInBTN.innerHTML = "Sign In";
}

function viewPassword2() {
  var viewPassword2 = document.getElementById("viewPassword2");
  var psw2 = document.getElementById("psw");

  if (psw2.type == "text") {
    psw2.type = "password";
    viewPassword2.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
  } else {
    psw2.type = "text";
    viewPassword2.innerHTML = "<i class='bi bi-eye-fill'></i>";
  }
}

function signIn() {
  var usname = document.getElementById("usname");
  var psw = document.getElementById("psw");

  var f = new FormData();
  f.append("usname", usname.value);
  f.append("psw", psw.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "Success") {
        window.location = "home.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "signInProcess.php", true);
  r.send(f);
}

function signOut() {
  window.location = "index.php";
}

function viewCustomer(id) {
  window.location = "viewCustomer.php?id=" + id;
  // header("viewCustomer.php?id="+id, true);
}

function downloadPDF() {
  var page = document.getElementById("page");
  var opt = {
    margin: [0, 0, 0, 0],
    filename: "myfile.pdf",
    image: { type: "jpeg", quality: 0.98 },
    html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
    jsPDF: { unit: "in", format: "A5", orientation: "portrait" },
  };
  html2pdf().from(page).set(opt).save();
}

function addPrescription(id, pid) {
  var name = document.getElementById("name");
  var date = document.getElementById("date");
  var age = document.getElementById("age");
  var occupation = document.getElementById("occupation");
  var va_r = document.getElementById("va_r");
  var va_l = document.getElementById("va_l");
  var ph_r = document.getElementById("ph_r");
  var ph_l = document.getElementById("ph_l");
  var sph_r_dist = document.getElementById("sph_r_dist");
  var cyl_r_dist = document.getElementById("cyl_r_dist");
  var axis_r_dist = document.getElementById("axis_r_dist");
  var sph_r_near = document.getElementById("sph_r_near");
  var cyl_r_near = document.getElementById("cyl_r_near");
  var axis_r_near = document.getElementById("axis_r_near");
  var sph_l_dist = document.getElementById("sph_l_dist");
  var cyl_l_dist = document.getElementById("cyl_l_dist");
  var axis_l_dist = document.getElementById("axis_l_dist");
  var sph_l_near = document.getElementById("sph_l_near");
  var cyl_l_near = document.getElementById("cyl_l_near");
  var axis_l_near = document.getElementById("axis_l_near");
  var hbl_r = document.getElementById("hbl_r");
  var hbl_l = document.getElementById("hbl_l");
  var btncheckhead = document.getElementById("btncheckhead");
  var btnchecktear = document.getElementById("btnchecktear");
  var btncheckread = document.getElementById("btncheckread");
  var btncheckblurv = document.getElementById("btncheckblurv");
  var other = document.getElementById("other");
  var btncheckclvisr = document.getElementById("btncheckclvisr");
  var btncheckclvisl = document.getElementById("btncheckclvisl");
  var btncheckamsvisr = document.getElementById("btncheckamsvisr");
  var btncheckamsvisl = document.getElementById("btncheckamsvisl");
  var btncheckamsvisl = document.getElementById("btncheckconverr");
  var btncheckamsvisl = document.getElementById("btncheckconverl");
  var btncheckamsvisl = document.getElementById("btncheckpuprefsr");
  var btncheckamsvisl = document.getElementById("btncheckpuprefl");
  var remarks = document.getElementById("remarks");
  var pd = document.getElementById("pd");
  var sh = document.getElementById("sh");

  var f = new FormData();
  f.append("pid", pid);
  f.append("name", name.value);
  f.append("date", date.value);
  f.append("age", age.value);
  f.append("occupation", occupation.value);
  f.append("va_r", va_r.value);
  f.append("va_l", va_l.value);
  f.append("ph_r", ph_r.value);
  f.append("ph_l", ph_l.value);
  f.append("sph_r_dist", sph_r_dist.value);
  f.append("cyl_r_dist", cyl_r_dist.value);
  f.append("axis_r_dist", axis_r_dist.value);
  f.append("sph_r_near", sph_r_near.value);
  f.append("cyl_r_near", cyl_r_near.value);
  f.append("axis_r_near", axis_r_near.value);
  f.append("sph_l_dist", sph_l_dist.value);
  f.append("cyl_l_dist", cyl_l_dist.value);
  f.append("axis_l_dist", axis_l_dist.value);
  f.append("sph_l_near", sph_l_near.value);
  f.append("cyl_l_near", cyl_l_near.value);
  f.append("axis_l_near", axis_l_near.value);
  f.append("hbl_r", hbl_r.value);
  f.append("hbl_l", hbl_l.value);
  f.append("btncheckhead", btncheckhead.checked);
  f.append("btnchecktear", btnchecktear.checked);
  f.append("btncheckread", btncheckread.checked);
  f.append("btncheckblurv", btncheckblurv.checked);
  f.append("other", other.value);
  f.append("btncheckclvisr", btncheckclvisr.checked);
  f.append("btncheckclvisl", btncheckclvisl.checked);
  f.append("btncheckamsvisr", btncheckamsvisr.checked);
  f.append("btncheckamsvisl", btncheckamsvisl.checked);
  f.append("btncheckconverr", btncheckconverr.checked);
  f.append("btncheckconverl", btncheckconverl.checked);
  f.append("btncheckpuprefsr", btncheckpuprefsr.checked);
  f.append("btncheckpuprefl", btncheckpuprefl.checked);
  f.append("remarks", remarks.value);
  f.append("pd", pd.value);
  f.append("sh", sh.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      // alert(t);
      if (t == "Success") {
        // name.value = "";
        // date.value = "";
        // age.value = "";
        occupation.value = "";
        va_r.value = "";
        va_l.value = "";
        ph_r.value = "";
        ph_l.value = "";
        sph_r_dist.value = "";
        cyl_r_dist.value = "";
        axis_r_dist.value = "";
        sph_r_near.value = "";
        cyl_r_near.value = "";
        axis_r_near.value = "";
        sph_l_dist.value = "";
        cyl_l_dist.value = "";
        axis_l_dist.value = "";
        sph_l_near.value = "";
        cyl_l_near.value = "";
        axis_l_near.value = "";
        hbl_r.value = "";
        hbl_l.value = "";
        btncheckhead.checked = false;
        btnchecktear.checked = false;
        btncheckread.checked = false;
        btncheckblurv.checked = false;
        other.value = "";
        btncheckclvisr.checked = false;
        btncheckclvisl.checked = false;
        btncheckamsvisr.checked = false;
        btncheckamsvisl.checked = false;
        btncheckconverr.checked = false;
        btncheckconverl.checked = false;
        btncheckpuprefsr.checked = false;
        btncheckpuprefl.checked = false;
        remarks.value = "";
        pd.value = "";
        sh.value = "";

        window.location = "prescription.php?id=" + id + "&pid=" + pid;
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "addPrescriptionProcess.php?id=" + id, true);
  r.send(f);
}

function newPrescription(id) {
  window.location = "newPrescriptions.php?id=" + id;
}

function reset() {
  window.location = "customers.php";
}

function searchPrescription(id) {
  var date = document.getElementById("searchdate");

  if (date.value == "") {
    alert("Please Enter Date..");
    // return;
  } else {
    var f = new FormData();
    f.append("date", date.value);
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea").innerHTML = t;
      }
    };

    r.open("POST", "searchPrescriptionProcess.php", true);
    r.send(f);
  }
}

function searchInvoice(id) {
  var invodate = document.getElementById("searchinvodate");

  if (invodate.value == "") {
    alert("Please Enter Date..");
    // return;
  } else {
    var f = new FormData();
    f.append("invodate", invodate.value);
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea2").innerHTML = t;
      }
    };

    r.open("POST", "searchInvoiceProcess.php", true);
    r.send(f);
  }
}

function resetpres(id) {
  window.location = "viewCustomer.php?id=" + id;
}

function viewPrescription(id, pid) {
  window.location = "prescription.php?id=" + id + "&pid=" + pid;
}

function viewInvoice(custid, invoid) {
  window.location = "invoice.php?custid=" + custid + "&invoid=" + invoid;
}

function newInvoice(id) {
  window.location = "newInvoice.php?id=" + id;
}

function oldInvoice(id) {
  window.location = "oldInvoice.php?id=" + id;
}

function addInvoiceProcess() {
  var qty = document.getElementById("qty");
  var desc = document.getElementById("desc");
  var price = document.getElementById("price");
  var amount = document.getElementById("amount");
  var aftdiscount = document.getElementById("aftdiscount");

  if (qty.value == "" || desc.value == "" || price.value == "") {
    alert("Please Fill All Fields");
  } else {
    var table = document.getElementById("invoTable");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = qty.value;
    cell2.innerHTML = desc.value;
    cell3.innerHTML = price.value;
    cell4.innerHTML = price.value * qty.value;

    var finalAmount = parseInt(amount.value) + price.value * qty.value;
    amount.value = finalAmount;
    aftdiscount.value = finalAmount;

    qty.value = "";
    desc.value = "";
    price.value = "";
  }
}

function myDeleteFunction(id) {
  var enic = "<?php echo $enic; ?>";

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "Success") {
        window.location = "childDetails.php?enic=" + enic;
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "deleteChildProcess.php?id=" + id, true);
  r.send();
}

function addNewInvoice(custid, iuid) {
  var table = document.getElementById("invoTable");
  var tbodyRowCount = table.rows.length;
  var advance = document.getElementById("advance");
  var amount = document.getElementById("amount");
  var discount = document.getElementById("discount");
  var paymentOption = document.getElementById("paymentOption");
  var paymentType = document.getElementById("paymentType");
  var cash = document.getElementById("cash");
  var card = document.getElementById("card");

  if (tbodyRowCount == 1) {
    alert("Please Add Items to Invoice");
  } else if (paymentOption.value == 0) {
    alert("Please Select Payment Option");
  } else if (paymentOption.value == 2 && advance.value == 0) {
    alert("Please Enter Advance Amount");
  } else {
    if (paymentType.value == 0 && paymentOption.value != 3) {
      alert("Please Select Payment Type");
    } else if (paymentType.value == 4 && (cash.value == 0 || card.value == 0)) {
      alert("Please Enter Cash and Card Amount");
    } else {
      var f1 = new FormData();
      f1.append("custid", custid);
      f1.append("iuid", iuid);
      f1.append("advance", advance.value);
      f1.append("amount", amount.value);
      f1.append("discount", discount.value);
      f1.append("paymentOption", paymentOption.value);
      f1.append("paymentType", paymentType.value);
      f1.append("cash", cash.value);
      f1.append("card", card.value);

      var r = new XMLHttpRequest();

      r.onreadystatechange = function () {
        if (r.readyState == 4) {
          var t = r.responseText;

          if (t == "Success") {
            for (var i = 0; i < tbodyRowCount; i++) {
              var qty = table.rows[i + 1].cells[0].innerHTML;
              var desc = table.rows[i + 1].cells[1].innerHTML;
              var rate = table.rows[i + 1].cells[2].innerHTML;
              // var price = table.rows[i + 1].cells[3].innerHTML;

              var f = new FormData();
              f.append("iuid", iuid);
              f.append("qty", qty);
              f.append("desc", desc);
              f.append("rate", rate);

              var r1 = new XMLHttpRequest();

              r1.onreadystatechange = function () {
                if (r1.readyState == 4) {
                  var t1 = r1.responseText;
                  // alert(t1);
                }
              };

              r1.open("POST", "addInvoiceItemProcess.php", true);
              r1.send(f);

              if (i == tbodyRowCount - 2) {
                alert("Invoice Added Successfully");
                window.location =
                  "invoice.php?invoid=" + iuid + "&custid=" + custid;
              }
            }
          }
        }
      };
      r.open("POST", "addInvoiceProcess.php", true);
      r.send(f1);
    }
  }

  // window.location = "viewCustomer.php?id=" + custid;-1
}


function addOldInvoice(custid, iuid) {
  var table = document.getElementById("invoTable");
  var tbodyRowCount = table.rows.length;
  var advance = document.getElementById("advance");
  var amount = document.getElementById("amount");
  var discount = document.getElementById("discount");
  var paymentOption = document.getElementById("paymentOption");
  var paymentType = document.getElementById("paymentType");
  var cash = document.getElementById("cash");
  var card = document.getElementById("card");
  var date = document.getElementById("date");

  if (tbodyRowCount == 1) {
    alert("Please Add Items to Invoice");
  } else if (paymentOption.value == 0) {
    alert("Please Select Payment Option");
  } else if (paymentOption.value == 2 && advance.value == 0) {
    alert("Please Enter Advance Amount");
  } else {
    if (paymentType.value == 0 && paymentOption.value != 3) {
      alert("Please Select Payment Type");
    } else if (paymentType.value == 4 && (cash.value == 0 || card.value == 0)) {
      alert("Please Enter Cash and Card Amount");
    } else {
      var f1 = new FormData();
      f1.append("custid", custid);
      f1.append("iuid", iuid);
      f1.append("advance", advance.value);
      f1.append("amount", amount.value);
      f1.append("discount", discount.value);
      f1.append("paymentOption", paymentOption.value);
      f1.append("paymentType", paymentType.value);
      f1.append("cash", cash.value);
      f1.append("card", card.value);
      f1.append("date", date.value);

      var r = new XMLHttpRequest();

      r.onreadystatechange = function () {
        if (r.readyState == 4) {
          var t = r.responseText;

          if (t == "Success") {
            for (var i = 0; i < tbodyRowCount; i++) {
              var qty = table.rows[i + 1].cells[0].innerHTML;
              var desc = table.rows[i + 1].cells[1].innerHTML;
              var rate = table.rows[i + 1].cells[2].innerHTML;
              // var price = table.rows[i + 1].cells[3].innerHTML;

              var f = new FormData();
              f.append("iuid", iuid);
              f.append("qty", qty);
              f.append("desc", desc);
              f.append("rate", rate);

              var r1 = new XMLHttpRequest();

              r1.onreadystatechange = function () {
                if (r1.readyState == 4) {
                  var t1 = r1.responseText;
                  // alert(t1);
                }
              };

              r1.open("POST", "addInvoiceItemProcess.php", true);
              r1.send(f);

              if (i == tbodyRowCount - 2) {
                alert("Invoice Added Successfully");
                window.location =
                  "invoice.php?invoid=" + iuid + "&custid=" + custid;
              }
            }
          }
        }
      };
      r.open("POST", "addOldInvoiceProcess.php", true);
      r.send(f1);
    }
  }

  // window.location = "viewCustomer.php?id=" + custid;-1
}

function searchDailyIncome() {
  var date = document.getElementById("searchdincome");

  if (date.value == "") {
    alert("Please Enter Date..");
    // return;
  } else {
    var f = new FormData();
    f.append("date", date.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea").innerHTML = t;
      }
    };

    r.open("POST", "searchDailyIncomeProcess.php", true);
    r.send(f);
  }
}

function searchDailyCashIncome() {
  var date = document.getElementById("searchdcincome");

  if (date.value == "") {
    alert("Please Enter Date..");
    // return;
  } else {
    var f = new FormData();
    f.append("date", date.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea3").innerHTML = t;
      }
    };

    r.open("POST", "searchDailyCashIncomeProcess.php", true);
    r.send(f);
  }
}

function searchDailyCardIncome() {
  var date = document.getElementById("searchdcrincome");

  if (date.value == "") {
    alert("Please Enter Date..");
    // return;
  } else {
    var f = new FormData();
    f.append("date", date.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea5").innerHTML = t;
      }
    };

    r.open("POST", "searchDailyCardIncomeProcess.php", true);
    r.send(f);
  }
}

function searchDailyBTIncome() {
  var date = document.getElementById("searchdbtincome");

  if (date.value == "") {
    alert("Please Enter Date..");
    // return;
  } else {
    var f = new FormData();
    f.append("date", date.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea7").innerHTML = t;
      }
    };

    r.open("POST", "searchDailyBTIncomeProcess.php", true);
    r.send(f);
  }
}

function searchMonthlyIncome() {
  var date = document.getElementById("searchmincome");

  if (date.value == "") {
    alert("Please Enter Date..");
    // return;
  } else {
    var f = new FormData();
    f.append("date", date.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea2").innerHTML = t;
      }
    };

    r.open("POST", "searchMonthlyIncomeProcess.php", true);
    r.send(f);
  }
}

function searchMonthlyCashIncome() {
  var date = document.getElementById("searchmcincome");

  if (date.value == "") {
    alert("Please Enter Date..");
    // return;
  } else {
    var f = new FormData();
    f.append("date", date.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea4").innerHTML = t;
      }
    };

    r.open("POST", "searchMonthlyCashIncomeProcess.php", true);
    r.send(f);
  }
}

function searchMonthlyCardIncome() {
  var date = document.getElementById("searchmcrincome");

  if (date.value == "") {
    alert("Please Enter Date..");
    // return;
  } else {
    var f = new FormData();
    f.append("date", date.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea6").innerHTML = t;
      }
    };

    r.open("POST", "searchMonthlyCardIncomeProcess.php", true);
    r.send(f);
  }
}

function searchMonthlyBTIncome() {
  var date = document.getElementById("searchmbtincome");

  if (date.value == "") {
    alert("Please Enter Date..");
    // return;
  } else {
    var f = new FormData();
    f.append("date", date.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        document.getElementById("viewarea8").innerHTML = t;
      }
    };

    r.open("POST", "searchMonthlyBTIncomeProcess.php", true);
    r.send(f);
  }
}

function resetIncome() {
  window.location = "income.php";
}

function aftDiscount() {
  // alert("test");

  var amount = document.getElementById("amount");
  var discount = document.getElementById("discount");
  var aftdiscount = document.getElementById("aftdiscount");

  if (discount.value == "") {
    discount.value = 0;
  }

  var finalAmount = parseInt(amount.value) - parseInt(discount.value);
  aftdiscount.value = finalAmount;
}

function card() {
  var card = document.getElementById("card");
  if (card.value == "") {
    card.value = 0;
  }
}

function cash() {
  var cash = document.getElementById("cash");
  var card = document.getElementById("card");
  var advance = document.getElementById("advance");
  var aftdiscount = document.getElementById("aftdiscount");
  var paymentOption = document.getElementById("paymentOption");

  if (paymentOption.value == 2) {
    var finalAmount = parseInt(advance.value) - parseInt(cash.value);
    card.value = finalAmount;
  } else if (paymentOption.value == 1) {
    var finalAmount = parseInt(aftdiscount.value) - parseInt(cash.value);
    card.value = finalAmount;
  }

  if (cash.value == "") {
    cash.value = 0;
    card.value = 0;
  }
}

function pendingCash() {
  var cash = document.getElementById("cash");
  var card = document.getElementById("card");
  var payableamount = document.getElementById("payableamount");
  var paymentType = document.getElementById("paymentType");

  if (paymentType.value == 4) {
    var finalAmount = parseInt(payableamount.value) - parseInt(cash.value);
    card.value = finalAmount;
  } else {
  }

  if (cash.value == "") {
    cash.value = 0;
    card.value = 0;
  }
}

function advance() {
  var advance = document.getElementById("advance");
  var cash = document.getElementById("cash");
  var card = document.getElementById("card");
  if (advance.value == "") {
    advance.value = 0;
  }
  card.value = 0;
  cash.value = 0;
}

function paymentOption() {
  var paymentOption = document.getElementById("paymentOption");
  var payType = document.getElementById("payType");
  var advancediv = document.getElementById("advancediv");
  var paymentType = document.getElementById("paymentType");
  var cashdiv = document.getElementById("cashdiv");
  var carddiv = document.getElementById("carddiv");

  if (paymentOption.value == "2") {
    advancediv.removeAttribute("hidden");
    // cashdiv.removeAttribute("hidden");
    // carddiv.removeAttribute("hidden");
    payType.removeAttribute("hidden");
  } else if (paymentOption.value == "3") {
    advancediv.setAttribute("hidden", "hidden");
    payType.setAttribute("hidden", "hidden");
    paymentType.value = "0";
    cashdiv.setAttribute("hidden", "hidden");
    carddiv.setAttribute("hidden", "hidden");
  } else if (paymentOption.value == "1") {
    advancediv.setAttribute("hidden", "hidden");
    // cashdiv.removeAttribute("hidden");
    // carddiv.removeAttribute("hidden");
    payType.removeAttribute("hidden");
  } else {
    advancediv.setAttribute("hidden", "hidden");
    payType.setAttribute("hidden", "hidden");
    paymentType.value = "0";
    cashdiv.setAttribute("hidden", "hidden");
    carddiv.setAttribute("hidden", "hidden");
  }
}

function paymentType() {
  var paymentType = document.getElementById("paymentType");
  var paymentOption = document.getElementById("paymentOption");

  if (paymentType.value == "1") {
    document.getElementById("carddiv").setAttribute("hidden", "hidden");
    document.getElementById("cashdiv").setAttribute("hidden", "hidden");
  } else if (paymentType.value == "2") {
    document.getElementById("carddiv").setAttribute("hidden", "hidden");
    document.getElementById("cashdiv").setAttribute("hidden", "hidden");
  } else if (paymentType.value == "4") {
    document.getElementById("carddiv").removeAttribute("hidden");
    document.getElementById("cashdiv").removeAttribute("hidden");
  } else {
    document.getElementById("carddiv").setAttribute("hidden", "hidden");
    document.getElementById("cashdiv").setAttribute("hidden", "hidden");
  }
}

function pendingPaymentType() {
  var paymentType = document.getElementById("paymentType");
  var paymentOption = document.getElementById("paymentOption");
  var payableamount = document.getElementById("payableamount");
  var cash = document.getElementById("cash");

  if (paymentType.value == "1") {
    document.getElementById("carddiv").setAttribute("hidden", "hidden");
    document.getElementById("cashdiv").setAttribute("hidden", "hidden");
    cash.value = payableamount.value;
  } else if (paymentType.value == "2") {
    document.getElementById("carddiv").setAttribute("hidden", "hidden");
    document.getElementById("cashdiv").setAttribute("hidden", "hidden");
    document.getElementById("card").value = payableamount.value;
  } else if (paymentType.value == "4") {
    document.getElementById("carddiv").removeAttribute("hidden");
    document.getElementById("cashdiv").removeAttribute("hidden");
    document.getElementById("card").value = 0;
    document.getElementById("cash").value = 0;
  } else {
    document.getElementById("carddiv").setAttribute("hidden", "hidden");
    document.getElementById("cashdiv").setAttribute("hidden", "hidden");
  }
}

function payInvoicebalance(cusid, invoid) {
  window.location =
    "payPendingInvoice.php?cusid=" + cusid + "&invoid=" + invoid;
}

function paypenndingInvoice(invoid, cusid) {
  var total = document.getElementById("total");
  var payableamount = document.getElementById("payableamount");
  var cash = document.getElementById("cash");
  var card = document.getElementById("card");
  var paymentType = document.getElementById("paymentType");

  if (paymentType.value == 0) {
    alert("Please Select Payment Type");
  } else {
    var f = new FormData();
    f.append("total", total.value);
    f.append("payableamount", payableamount.value);
    f.append("cash", cash.value);
    f.append("card", card.value);
    f.append("paymentType", paymentType.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;

        if (t == "success") {
          window.location = "invoice.php?invoid=" + invoid + "&custid=" + cusid;
        }
        // alert(t);
      }
    };

    r.open("POST", "payPendingInvoiceProcess.php?invoid=" + invoid, true);
    r.send(f);
  }
}

function backupdb() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "Success") {
        alert("Database Backup Successfully.Check Your Email Inbox.");
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "databasebackup.php", true);
  r.send();
}

function deleteInvoice(id, invid) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        alert("Invoice Deleted Successfully");
        window.location = "viewCustomer.php?id=" + id;
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "deleteInvoice.php?invid=" + invid, true);
  r.send();
}

function deletePrescription(id, prid) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        alert("Prescription Deleted Successfully...");
        window.location = "viewCustomer.php?id=" + id;
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "prescriptionInvoice.php?prid=" + prid, true);
  r.send();
}
