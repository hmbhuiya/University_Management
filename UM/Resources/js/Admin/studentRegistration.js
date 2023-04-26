$(document).ready(function() {
    $(document).on('click', '#courseReg', function() {
        let currentRow = $(this).closest('tr');
        let stu_id = currentRow.find('#stu_id').text();
       let c_id = currentRow.find('#course').val();
       $.ajax({
        url: "/University-Management/Controller/Admin/studentRegistration.php",
        method: 'POST',
        data: {
           stu_id:stu_id,
           c_id:c_id,
        },
        success: function(res) {
            alert(res);
        }
    })
    })
    });