$("#user_add_form").on("submit", function(event){
    event.preventDefault();
    $.ajax({
        method: "POST",
        url: "/admin/user/add",
        data: { 
            user_name: $(".user_name").val(), 
            user_email: $(".user_email").val(), 
            user_status: $(".user_status:checked").length == true ? "active" : "inactive", 
            user_role: $(".user_role").val(), 
        }
      })
    .done(function( msg ) {
        // console.log(msg);
        $(".alert").show();
        window.location.href = '/admin/user';
    });
});

$("#user_update_form").on("submit", function(event){
    user_id=$(".user_id").val();
    event.preventDefault();
    $.ajax({
        method: "POST",
        url: "/admin/user/edit/" +user_id,
        data: { 
            user_name: $(".user_name").val(), 
            user_email: $(".user_email").val(), 
            user_status: $(".user_status:checked").length == true ? "active" : "inactive", 
            user_role: $(".user_role").val(), 
        }
      })
    .done(function( msg ) { 
        $(".alert").show(); 
        setTimeout(function(){
            $(".alert").hide();
       },5000);
    });
});


function user_delete(user_id){
    if(confirm("Are You Sure?")){
        $.ajax({
            method: "POST",
            url: "/admin/user/delete",
            data:{
                user_id: user_id
            }
        }).done(function( msg ) {
            $(".alert").show();
           $(".user.no"+user_id).remove();
           setTimeout(function(){
                $(".alert").hide();
           },5000);
        });
    }
}