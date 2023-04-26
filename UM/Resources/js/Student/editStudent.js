$(document).ready(function() {
    $(document).on('click', '#add_stu', function() {
     let sname = $('#sname').val();
     let fname = $('#fname').val();
     let mname = $('#mname').val();
     let address = $('#address').val();
     let email = $('#email').val();
     let phone = $('#phone').val();
     let password = $('#password').val();

     if(sname=='' || fname==''||mname==''||address==''||email==''||phone==''||password=='')
     {
        alert('somthing is null');
     }
     else
     {
        $.ajax({
            url: "/University-Management/Controller/Student/editStudent.php",
            method: 'POST',
            data: {
               sname:sname,
               fname:fname,
               mname:mname,
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