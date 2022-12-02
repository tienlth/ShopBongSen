$('.delete-btn').each((i,e)=>{
    $(e).on('click',(evt)=>{
        let acction = $('#single-delete-form')[0].action.replace('id',evt.currentTarget.id)
        $('#single-delete-form')[0].action = acction
    })
})
let checkBoxAll = $('.all-check')
checkBoxAll.on('click',(e)=>{
    $('input[type=checkbox]:not(.all-check):not(.no-work)').each((i,e)=>{
        $(e).prop('checked', checkBoxAll.prop('checked'));
    })

    if(checkBoxAll.prop('checked')){
        $('.multi-delete-btn button').removeAttr('disabled')
        $('.multi-delete-btn').attr('data-bs-toggle', 'modal')
    }
    else {
        $('.multi-delete-btn button').prop('disabled', 'disabled')
        $('.multi-delete-btn').removeAttr('data-bs-toggle')
    }
})


$('input[type=checkbox]:not(.all-check):not(.no-work)').each((i,e)=>{
    $(e).on('click',(evt)=>{
        if($(e).prop('checked')==false) checkBoxAll.prop('checked', false)

        let test = true;
        $('input[type=checkbox]:not(.all-check):not(.no-work)').each((i,e)=>{
            if($(e).prop('checked')==false) {
                test=false
                return false;
            }
        })
        if(test) checkBoxAll.prop('checked', true)
        
        test = false
        $('input[type=checkbox]:not(.all-check):not(.no-work)').each((i,e)=>{
            if($(e).prop('checked')==true) {
                test=true
                $('.multi-delete-btn button').removeAttr('disabled')
                $('.multi-delete-btn').attr('data-bs-toggle', 'modal')
                return false;
            }   
        })

        if(!test) {
            $('.multi-delete-btn button').prop('disabled', 'disabled')
            $('.multi-delete-btn').removeAttr('data-bs-toggle')
        }
    })
})

$('input[type=checkbox]:not(.no-work)').on('click',(evt)=>{  
    $('#multi-delete-form .contain').text('')
    $('input[type=checkbox]:not(.all-check):not(.no-work)').each((i,e)=>{
        if($(e).prop('checked') == true){
            let deleteInput = document.createElement("div")
            deleteInput.innerHTML = `<input type="text" name="items[]" value="${e.id}">`
            $('#multi-delete-form .contain').append(deleteInput)
        }
    })
})

$('.multi-delete-btn').on('click',(evt)=>{
    $('#single-delete-form button[type=submit]').on('click',(evt)=>{
        evt.preventDefault()
        evt.stopPropagation()
        $('#multi-delete-form').submit()
    })
})