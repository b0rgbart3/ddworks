<style>
input[type='text'].error {
    border:2px solid #5fff2f;
}
.contactForm {
    width:100%;
    border-radius:8px;
    padding:10%;
    margin-left:auto;
    margin-right:auto;
    background-color:#eeeeee;
    margin-bottom:0;
    box-sizing: border-box;
    padding-top:4%;
}
    input[type='submit'] {
        padding:20px;
        background-color:#888888;
        color:white;
        font-weight:bold;
        text-transform: uppercase;
        margin-top:30px;
        margin-bottom:10px;
        padding-left:40px;
        padding-right:40px;
        border-radius:4px;
        border:2px solid #888888;
        position:relative;
        outline:none;
        box-shadow:1px 1px 4px rgba(0,0,0,.25);
        cursor:pointer;
        user-select: none;
        font-size:1em;
        border:none;
    }
    input[type='submit']:hover {
        background-color:#5fff2f;
        color:black;
        outline:none;
        border:none;
    }
    input[type='submit']:active {
        background-color:#5fff2f;
        color:black;
        border-color:#5fff2f;
        top:2px;
        left:2px;
        outline:none;
        border:none;
    }
    input[type='text'] {
        border:none;
        border-radius:6px;
        display:block;
        width:100%;
        box-sizing:border-box;
        background-color:rgba(255,255,255,.4);
        cursor: pointer;
        box-shadow:0 0 19px rgba(0,0,0,.2);
        font-family: 'Roboto Condensed', sans-serif;
        font-size:1.7em;
        padding:8px;
        padding-bottom:4px;
        color:black;
        box-sizing: border-box;
    }
    input[type='text']:active, input[type='text']:focus  {
        outline-color:#5fff2f;
        background-color:white;
    }
    textarea.error {
        border:2px solid #5fff2f;
    }
    textarea {
        width:100%;
        box-sizing:border-box;
        border:none;
        box-shadow:0 0 19px rgba(0,0,0,.2);
        border-radius:6px;
        background-color:rgba(255,255,255,.4);
        padding:12px;
        font-family: 'Roboto Condensed', sans-serif;
        font-size:1.4em;
        color:black;
        box-sizing: border-box;

    }
    textarea:active, textarea:focus {
        outline-color:#5fff2f;
        background-color:white;
    }
    label {
        display:block;
        margin-bottom:.4em;
        text-transform:uppercase;
        font-weight: bold;
        color:#999999;
        margin-top:11px;
        font-size:.95em;

    }
    img.write_icon {
        box-shadow:none;
        float:left;
        display:inline-block;
        width:30%;
        max-width:180px;
        box-sizing: border-box;
        margin-left:5%;
       padding:0;
       vertical-align: top;
    
       margin-top:0;
    }

    .notify {
        color:#555555;
    }

    .contactForm p {
        line-height:2em;
        padding-top:0;
        margin-top:0;
        font-style:italic;
        font-weight:bold;
    }

    .inputFrame {
        background-color:rgba(255,255,255,.3);
        padding:35px;
        border-radius:8px;
        box-shadow:1px 1px 18px rgba(0,0,0,.4);
        padding-top:40px;
        
    }
</style>

    <!-- <img src='images/interface/ideas.svg' class='write_icon'> -->
<form class='contactForm' method='post' action='?php echo $_SERVER["PHP_SELF"]; ?' enctype="multipart/form-data">
  
        <!-- <p>Have an idea?  &nbsp;Send me a message about it. &nbsp;We can build it.</p> -->
    <br>
    <label name='firstname'>First Name</label>
    <input type='text' name='firstname' id='firstname'>
    <p class='notify'></p>

    <br clear='all'>
    <label name='lastname'>Last Name</label>
    <input type='text' name='lastname' id='lastname'>
    <p class='notify'></p>

    <br clear='all'>
    <label name='email'>Email</label>
    <input type='text' name='email' id='email'>
    <p class='notify'></p>
   
    <br clear='all'>
    <label name='message'>Message</label>
    <textarea name='message' id='message' cols='60' rows='6'></textarea>
    <p class='notify'></p>
    <br clear='all'>
    <input type='submit' name='submit' value='send' id='send'>
   
</form>

<script>
let checkValidity = function(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


$('#firstname').on('change', function() {
    $('#firstname').removeClass('error');
});
$('#lastname').on('change', function() {
    $('#lastname').removeClass('error');
});
$('#email').on('change', function() {
    $('#email').removeClass('error');
});
$('#message').on('change', function() {
    $('#message').removeClass('error');
});
$('#send').on('click', function(event) {

    let firstName = $('#firstname').val();
    let lastName = $('#lastname').val();
    let email = $('#email').val();
    let message= $('#message').val();

    let notice = $("#firstname").next('.notify');
    if (!firstName) {
        $('#firstname').addClass('error');
        
        notice.text("Please include your first name.");
    } else {
        notice.text("");
    }
    
    notice = $("#lastname").next('.notify');
    if (!lastName) {
        $('#lastname').addClass('error');
        notice.text("Please include your last name.");
    } else {
        notice.text("");
    }
    notice = $("#email").next('.notify');
    let validemail=false;
    if (!email) {
        $('#email').addClass('error');
        notice.text("Please include your email address.");
    } else {
        validemail = checkValidity(email);
        if (!validemail) {
            $('#email').addClass('error');
    
        notice.text("Please include a valid email address.");
        } else {
            notice.text("");
        }
    }
    notice = $("#message").next('.notify');
    if (!message) {
        $('#message').addClass('error');
        notice.text("Please include a message.");
 
    } else {
        notice.text("");
    }


    if( !firstName || !lastName || !email || !message || !validemail) {
        event.preventDefault();
        document.body.scrollTop = document.documentElement.scrollTop = 0;
    }

});

</script>