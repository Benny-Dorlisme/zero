$(document).ready(function(){

    $("#bold_button").click(function(e){
        e.preventDefault()

    })
    $("#underline_button").click(function(e){
        e.preventDefault()

    })
    $("#italic_button").click(function(e){
        e.preventDefault()

    })
    $("#linebreak_button").click(function(e){
        e.preventDefault()
        var t =  $("#article").val()
        $("#article").val(t+"<br />")
    })
})
