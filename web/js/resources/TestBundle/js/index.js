const d = document
const form = $('#form_products')
const table = $('#table_products')
const modal = $('#modal')
const btnSave = d.getElementById('btn_save')
let datatable = {}, data = {}
d.addEventListener('DOMContentLoaded', () => {
    console.log('ok')
    renderDataTable(path)
    console.log(datatable)
    
    validateForm()
})


const validateForm = () => {
    form.validate({
        rules: {
            'name': {
                required: 1
            }
        },
        message: {
            'name': {
                required: 'Required'
            }
        },
        ignore: ":hidden:not(select)",
        errorElement: "div",
        errorClass: "invalid",
        errorPlacement: function (error, element) {
            if ($(element).parent('div').find('i.material-icons').length > 0) {
                $(error).attr('icon', true);
            }
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error);
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: () => {
            addProduct(form.serialize())
        }
    })
}

const addProduct = (url, data) => {
    $.ajax({
        url,
        type: 'post',
        dataType: 'json',
        data,
        success: response => {
            if(response.status){
                alert(response.message)
                return
            }
            datatable.ajax.reload()
            alert(response.message)
        },
        error:  request => alert(request.responseText)
    })
}

const renderDataTable = url => {

    datatable = table.DataTable({
        ajax: {
            url
        },
        columns: [
            {data: 'id_product'},
            {data: 'name'},
            {
                data: {},
                render: data => `
                    <div>
                        <a class="btn green accent-3 updateProduct" data_id="${data.id_product}">
                            Update
                        </a>
                        <a class="btn  red darken-4 disableProduct"  data_id="${data.id_product}">
                            Delete
                        </a>
                    </div>`
            }
        ]
    })
}

const getProducts = url => {
    $.ajax({
        url,
        type: 'get',
        success: response => {
            if(!response.status){
                alert(response.message)
                return
            }
           data = response
        },
        error:  request => alert(request.responseText)
    })
}

$(document).on('click','.updateProduct', function(){
    /* btnSave.setAttribute('data_id', this[0].getAttribute('data_id')) */
    modal[0].showModal()
    console.log('click')
})
/* updateProduct({id: this.getAttribute('data_id')}) */