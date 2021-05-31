<head>

<style type="text/css">

  #modal_wrapper.overlay::before {
    content: " ";
    width: 100%;
    height: 100%;
    position: fixed;
    z-index: 100;
    top: 0;
    left: 0;
    background: #000;
    background: rgba(0,0,0,0.7);
  }

  #modal_window {
    display: none;
    z-index: 200;
    position: fixed;
    left: 50%;
    top: 50%;
    width: 360px;
    overflow: auto;
    padding: 10px 20px;
    background: #fff;
    border: 5px solid #999;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
  }

  #modal_wrapper.overlay #modal_window {
    display: block;
  }

</style>

</head>

<p><button id="modal_open">Open Email Form</button></p>

<div id="modal_wrapper">
<div id="modal_window">

<div style="text-align: right;"><a id="modal_close" href="#">close <b>X</b></a></div>

<p>Complete the form below to send an email:</p>

<form id="modal_feedback" method="POST" action="#" accept-charset="UTF-8">
<p><label>Your Name<strong>*</strong><br>
<input type="text" autofocus required size="48" name="name" value=""></label></p>
<p><label>Email Address<strong>*</strong><br>
<input type="email" required title="Please enter a valid email address" size="48" name="email" value=""></label></p>
<p><label>Subject<br>
<input type="text" size="48" name="subject" value=""></label></p>
<p><label>Enquiry<strong>*</strong><br>
<textarea required name="message" cols="48" rows="8"></textarea></label></p>
<p><input type="submit" name="feedbackForm" value="Send Message"></p>
</form>

</div> <!-- #modal_window -->
</div> <!-- #modal_wrapper -->

<script type="text/javascript">

  // Original JavaScript code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.

  var checkForm = function(e)
  {
    var form = (e.target) ? e.target : e.srcElement;
    if(form.name.value == "") {
      alert("Please enter your Name");
      form.name.focus();
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
      return;
    }
    if(form.email.value == "") {
      alert("Please enter a valid Email address");
      form.email.focus();
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
      return;
    }
    if(form.message.value == "") {
      alert("Please enter your comment or question in the Message box");
      form.message.focus();
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
      return;
    }
  };

</script>

<script type="text/javascript">

  // Original JavaScript code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.

  var modal_init = function() {

    var modalWrapper = document.getElementById("modal_wrapper");
    var modalWindow  = document.getElementById("modal_window");

    var openModal = function(e)
    {
      modalWrapper.className = "overlay";
      var overflow = modalWindow.offsetHeight - document.documentElement.clientHeight;
      if(overflow > 0) {
        modalWindow.style.maxHeight = (parseInt(window.getComputedStyle(modalWindow).height) - overflow) + "px";
      }
      modalWindow.style.marginTop = (-modalWindow.offsetHeight)/2 + "px";
      modalWindow.style.marginLeft = (-modalWindow.offsetWidth)/2 + "px";
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
    };

    var closeModal = function(e)
    {
      modalWrapper.className = "";
      e.preventDefault ? e.preventDefault() : e.returnValue = false;
    };

    var clickHandler = function(e) {
      if(!e.target) e.target = e.srcElement;
      if(e.target.tagName == "DIV") {
        if(e.target.id != "modal_window") closeModal(e);
      }
    };

    var keyHandler = function(e) {
      if(e.keyCode == 27) closeModal(e);
    };

    if(document.addEventListener) {
      document.getElementById("modal_open").addEventListener("click", openModal, false);
      document.getElementById("modal_close").addEventListener("click", closeModal, false);
      document.addEventListener("click", clickHandler, false);
      document.addEventListener("keydown", keyHandler, false);
    } else {
      document.getElementById("modal_open").attachEvent("onclick", openModal);
      document.getElementById("modal_close").attachEvent("onclick", closeModal);
      document.attachEvent("onclick", clickHandler);
      document.attachEvent("onkeydown", keyHandler);
    }

  };

</script>
<script type="text/javascript">

  if(document.addEventListener) {
    document.getElementById("modal_feedback").addEventListener("submit", checkForm, false);
    document.addEventListener("DOMContentLoaded", modal_init, false);
  } else {
    document.getElementById("modal_feedback").attachEvent("onsubmit", checkForm);
    window.attachEvent("onload", modal_init);
  }

</script>