$(document).ready(function(){
$(document).on('click','#add-marks',function(){
let f_id = $('#faculty').val();
let current_row = $(this).closest('tr');
let stu_id = current_row.find('#stu-id').text();
let title = current_row.find('#title').val();
let marks = current_row.find('#marks').val();
let c_id = current_row.find('#c_id').val();
let exam = current_row.find('#exam').val();
if(title == '')
{
    current_row.find('#title').focus();
}
else if(marks == '')
{
    current_row.find('#marks').focus();
}
else
{
    $.ajax({
        url: "/University-Management/Controller/Faculty/addMarks.php",
        method: 'POST',
        data: {
           f_id:f_id,
           s_id:stu_id,
           title:title,
           marks:marks,
           c_id:c_id,
           exam:exam
        },
        success: function(res) {
            alert(res);
        }
    })
}
});
});