$(document).ready(function () {

    /**
     * CSRF Token
     */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     * REGISTER
     * USER
     */
    $('#register-user').click(function () {
        $.ajax({
            data: $('#user_form').serialize(),
            url: '/user/register',
            type: 'POST',
            dataType: 'JSON',
            success: function (response) {
                let id = response.id;
                let name = response.name;
                let email = response.email;

                let user = "<tr id='user_id_"+id+"'>" +
                               "<td>"+id+"</td>" +
                               "<td>"+name+"</td>" +
                               "<td>"+email+"</td>" +
                               "<td class='d-flex justify-content-center'><button onclick='edit_user("+id+")' data-toggle='modal' data-target='#modal-edit' class='btn btn-sm btn-warning mr-2'>Edit</button>" +
                               "<button onclick='delete_user("+id+")' class='btn btn-sm btn-danger mr-2'>Delete</button></td>" +
                           "</tr>";

                $('#users-tbody').prepend(user);
                $('#user_form').trigger("reset");
                $('#modal-register').modal("hide");
            },
            catch: function (err) {
                console.log('Error :: '+err);
            }
        });
    });


    /**
     * EDIT USER
     */
    $('#edit-user').click(function () {
        $.ajax({
           data: $('#user_form_edit').serialize(),
           url: '/user/update',
           type: 'PUT',
           success: function (response) {
               var id = response.id;
               var name = response.name;
               var email = response.email;

               var record = "<tr id='user_id_"+id+"'>" +
                               "<td>"+id+"</td>" +
                               "<td>"+name+"</td>" +
                               "<td>"+email+"</td>" +
                               "<td class='d-flex justify-content-center'><button onclick='edit_user("+id+")' data-toggle='modal' data-target='#modal-edit' class='btn btn-sm btn-warning mr-2'>Edit</button>" +
                               "<button onclick='delete_user("+id+")' class='btn btn-sm btn-danger mr-2'>Delete</button></td>" +
                            "</tr>";
               $('#user_id_'+id).replaceWith(record);
               $('#user_form_edit').trigger("reset");
               $('#modal-edit').modal("hide");

           },
            catch: function (err) {
                console.log(err);
            }
        });
    });

});

    function edit_user(id) {
        $.ajax({
            data: 'id='+id,
            url: '/user/edit',
            type: 'get',
            dataType: 'json',
            success: function (resp) {
                $('#id').val(resp.id);
                $('#namee').val(resp.name);
                $('#emaile').val(resp.email);
                $('#modal-edit').modal("show");
            },
            catch: function (err) {
                console.log('ERROR :: '+err);
            }
        });
    }



    function delete_user(id) {
        var option = confirm(':: ¿ Are you sure to delete this record ? ::');
        if (option){
            $.ajax({
               data: 'id='+id,
               url: '/user/delete',
               type: 'DELETE',
               success: function (response) {
                   $('#user_id_'+response.id).remove();
               } 
            });
        }
    }
    
