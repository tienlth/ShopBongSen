$('.price-convert').each((i,e)=>{
    $(e).text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format($(e).text()))
})

$('input.price-convert').each((i,e)=>{
    $(e).val(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format($(e).val()))
})

$('input').on('focus',(evt)=>{
    $(evt.currentTarget).removeClass('is-invalid')
    $(evt.currentTarget).next('.error-mess').hide()
})