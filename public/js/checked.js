let idData = [];
let Otable;

$(document).on('click', '.update-status', function(e){
   
    e.preventDefault();
    let url = $(this).data('url');
    let dStatus= $(this).attr('data-status');
    console.log(dStatus);
    alertify.confirm('Data SatyaLancana ini akan diupdate, Apa anda yakin ?', function () {
        // console.log(idData);
        $.ajax({
            data: {
                id : idData,
                status : dStatus,
            }, //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
            url: "/admin/satyalancana/update", //url simpan data
            type: "POST", //karena simpan kita pakai method POST
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function () { //jika berhasil
                // console.log(data);
                var oTable = $('#datatable1')
                .dataTable(); //inialisasi datatable
                oTable.fnDraw(false); //reset datatable
                 $('#checkAll').html('');
                 $('#checkAll').html(`<input type="checkbox" class="checkall" id="emailCheck">`);
                 idData = [];
                 $(".update-status").prop('disabled', true);
                 $('#lengthcek').html(' ('+idData.length+')');
                alertify.success('Data Berhasil Diperbaharui !!');
                
            },
            error: function (data) { //jika error tampilkan error pada console
                console.log('Error:', data);
                $('#tombol-simpan').html('Simpan');
            }
        });
        

    }, function () {
        alertify.error('Cancel')
    });
    


});

$(document).on('change', '.checkboks', function(e){
    let id = $(this).val();
    if($(this).is(':checked')){
        idData.push(id);
        checkedContent();
    }else {
        removeA(idData, id);
        uncheckedContent();
    }
    DeleteAll();
});

$(document).on('click', '.checkall', function(e){
    var ischecked= $(this).is(':checked');
    if(ischecked){
        $('input[type=checkbox]').prop('checked', 'checked');
        checkAll();
    }else {
        $('input[type=checkbox]').prop('checked', '');
        uncheckAll();
    }
    DeleteAll();
});

function removeA(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}

function checkedContent()
{
    $.each(idData, function(index, value){
        $('#select'+value).prop("checked", true);
    });

    var numberOfChecked = $('input:checkbox[name=check_data]:checked').length;
    var numberChecked = $('input:checkbox[name=check_data]').length;


    if(numberOfChecked > 0 && numberOfChecked < numberChecked)
    {
        $('#checkAll').html('<span id="unchecked" style="cursor: pointer;"><i class="fa fa-minus-square text-primary"></i></span>');
    }
    if(numberOfChecked === 0){
        $('#checkAll').html('');
    }

    if(numberChecked > 0 && numberOfChecked <= 0){
        $('#checkAll').html(`<input type="checkbox" class="checkall" id="emailCheck">`);
    }
    if(numberOfChecked === numberChecked)
    {
        if(numberOfChecked === 0 && numberChecked === 0)
        {
            $('#checkAll').html(``);
        }else {
            $('#checkAll').html(`<input type="checkbox" class="checkall" id="emailCheck" checked>`);
        }

    }
}

function uncheckedContent()
{
    var numberOfChecked = $('input:checkbox[name=check_data]:checked').length;

    var numberChecked = $('input:checkbox[name=check_data]').length;
    if(numberOfChecked === 0){
        $('#checkAll').html(`<input type="checkbox" class="checkall"/>`);
    }
    if(numberOfChecked > 0){
        $('#checkAll').html(`<span id="unchecked" style="cursor: pointer;"><i class="fa fa-minus-square text-primary"></i></span>`);
    }
}

function checkAll()
{
    $("input:checkbox[name=check_data]:checked").each(function(){
        idData.push($(this).val());
    });
}

function uncheckAll(){
    $("input:checkbox[name=check_data]").each(function(){
        var val = $(this).val();
        idData.splice(idData.indexOf(val), 1);
    });
}

function DeleteAll()
{
    if(idData.length > 0)
    {
        $('.delete-all').show();
        $(".update-status").prop('disabled', false);
        $('#lengthcek').html(' ('+idData.length+')');
    } else {
        $('.delete-all').hide();
        $(".update-status").prop('disabled', true);

    }
}
