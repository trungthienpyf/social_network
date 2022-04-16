var postId=0;
var postBodyElement=null;
$('.post .interaction .edit').on('click', function(event){
    event.preventDefault()
    postBodyElement=event.target.parentNode.parentNode.childNodes[1]
    let postBody=postBodyElement.textContent;
     postId=event.target.parentNode.parentNode.dataset['postid'];

   $('#post-body').val(postBody)
    $('#edit-modal').modal('show')
})

$('#modal-save').on('click', function(event){
    $.ajax({
        method: 'POST',
        url: url,
        data:{ body:  $('#post-body').val() ,postId:postId,_token:token}
    }).done(function (msg) {
        $(postBodyElement).text(msg['new_body']);
        $('#edit-modal').modal('hide');
        })
        .fail(function (msg) {
            alert((msg.responseJSON.errors.body[0]));
        })
})
$('.like').on('click', function(event){
    event.preventDefault()
    var isLike = event.target.previousElementSibling==null
    postId=event.target.parentNode.parentNode.dataset['postid'];
    $.ajax({
        method: 'POST',
        url:urlLike,
        data: {isLike:isLike,postId:postId,_token: token}
    })
        .done(function (msg){
        // event.target.innerText=
        //     isLike ?
        //     event.target.innerText =='Like' ? 'You Like this post' : 'Like'
        //     : event.target.innerText =='Dislike' ? 'You don\'t like this post' :'Dislike';
        if(isLike){
           if(event.target.innerText =='Like'){
               event.target.innerText='You like this post'
           }else{
               event.target.innerText='Like'
           }
            event.target.nextElementSibling.innerText='Dislike';
        }else{
            if(event.target.innerText =='Dislike'){
                event.target.innerText='You don\'t  this post'
            }else {
                event.target.innerText = 'Dislike'
            }
            event.target.previousElementSibling.innerText='Like';
        }
        })
})
