$(document).ready(function() {
    $(document).on('click', '#add_stu', function() {
     let sname = $('#fname').val();
     let address = $('#address').val();
     
     let email = $('#email').val();
     let phone = $('#phone').val();
     let password = $('#password').val();

     if(sname=='' || address==''||email==''||phone==''||password=='')
     {
        alert('Information missing. Please check..');
     }
     else
     {
        $.ajax({
            url: "/University-Management/Controller/Faculty/editFaculty.php",
            method: 'POST',
            data: {
               sname:sname,
               address:address,
               email:email,
               phone:phone,
               password:password
            },
            success: function(res) {
                alert(res);
            }
        })
     }
    });
});