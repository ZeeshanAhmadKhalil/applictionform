var request;
$(document).ready(function(){
    console.log("working11")
    var url_string=window.location.href;
    url=new URL(url_string)
    application_id=url.searchParams.get('applicationID')
    data="applicationID="+application_id
    $("#reciever_accept").click(function(){
        console.log("working2")
        request=$.ajax({
            url:"./include/reciever_accept.php",
            type:"POST",
            data:data
        })
        console.log("working3")
        request.done(function(response,textStatus,jqXHR){
            // alert(response)
            console.log("working4")
            window.location.href='./Applications.php'
        })
    })
    $('#reciever_reject').click(function(e){
        e.preventDefault()
        alert("working")
        accept_reject_comment=document.getElementById('accept_reject_comment')
        accept_reject_comment.innerHTML="<textarea name='comment' id='comment_textarea' rows='4' placeholder='Enter Comment Here'></textarea>\
        <div id='accept_reject'>\
            <span class='badge badge-primary badge-pill'><a class='btn btn-primary' role='button' href='#' id='reciever_conform'>Conform and Send</a></span></li>\
        </div>"
        $('#reciever_conform').click(function(e){
            e.preventDefault()
            $(this).html('Wait...');
            comment=document.getElementById("comment_textarea").value
            data=data+"&comment="+comment
            
            request=$.ajax({
                url:"./include/reciever_reject.php",
                type:"POST",
                data:data
            })
            request.done(function(response,textStatus,jqXHR){
                // alert(response)
                console.log("working4")
                window.location.href='./Applications.php'
            })
        })
    })
    $('#reviewer_accept').click(function(){
        comment=document.getElementById("comment_textarea").value
        data=data+"&comment="+comment
        request=$.ajax({
            url:"./include/reciever_accept.php",
            type:"POST",
            data:data
        })
        request.done(function(response,textStatus,jqXHR){
            // alert(response)
            console.log("working4")
            window.location.href='./Applications.php'
        })
    })
    $('#reviewer_reject').click(function(){
        comment=document.getElementById("comment_textarea").value
        data=data+"&comment="+comment
        request=$.ajax({
            url:"./include/reciever_reject.php",
            type:"POST",
            data:data
        })
        request.done(function(response,textStatus,jqXHR){
            // alert(response)
            console.log("working4")
            window.location.href='./Applications.php'
        })
    })
    $('#approver_accept').click(function(e){
        e.preventDefault()
        $(this).html('Wait...');
        request=$.ajax({
            url:'./include/reciever_accept.php',
            type:"POST",
            data:data
        })
        request.done(function(response){
            // alert(response)
            window.location.href='./Applications.php'
        })
    })
    $('#approver_reject').click(function(e){
        e.preventDefault()
        $(this).html('Wait...');
        $('#approver_reject,#approver_reject').prop('disabled',true)
        request=$.ajax({
            url:'./include/reciever_reject.php',
            type:"POST",
            data:data
        })
        request.done(function(response){
            // alert(response)
            window.location.href='./Applications.php'
        })
    })
})