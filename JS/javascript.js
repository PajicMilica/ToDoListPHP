$('#dodajForm').submit(function(event){
    event.preventDefault();
    console.log("Dodavanje");
    const $form =$(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);

    req = $.ajax({
        url: 'handler/add.php',
        type:'post',
        data: serijalizacija
    });

    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("Stavka uspesno dodata");
            console.log("Dodato");
            location.reload(true);
        }else console.log("Stavka nije dodata" + res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});

$('#btn-obrisi').click(function(){

    const checked = $('input[name=checked-donut]:checked');

    req = $.ajax({
        url: 'handler/delete.php',
        type:'post',
        data: {'idItem':checked.val()}
    });
  
    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
           checked.closest('tr').remove();
           alert('Stavka je obrisana');
           console.log('Obrisana stavka');
        }else {
        console.log("Stavka nije obrisana"+res);
        alert("Stavka nije obrisna");

        }
        console.log(res);
    });

});


$('#izmeniForm').submit(function(event){
    event.preventDefault();
    console.log("Izmena");
    const $form =$(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);

    req = $.ajax({
        url: 'handler/update.php',
        type:'post',
        data: serijalizacija
    });

    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("Item changed");
            console.log("Izmenjeno");
            location.reload(true);
        }else console.log("Stavka nije izmenjena" + res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});



$('#btn-izmeni').click(function () {
    const checked = $('input[name=checked-donut]:checked');
    request = $.ajax({
        url: 'handler/get.php',
        type: 'post',
        data: {'id': checked.val()},
        dataType: 'json'
    });


    request.done(function (response, textStatus, jqXHR) {
        console.log('Popunjena');
        $('#nameItem').val(response[0]['nameItem']);
        console.log(response[0]['nameItem']);

        $('#date').val(response[0]['date'].trim());
        console.log(response[0]['date'].trim());

        $('#urgent').val(response[0]['urgent'].trim());
        console.log(response[0]['urgent'].trim());

        $('#id').val(checked.val());

        console.log(response);
    });

   request.fail(function (jqXHR, textStatus, errorThrown) {
       console.error('The following error occurred: ' + textStatus, errorThrown);
   });

});

$('#btn-pretraga').click(function () {

    var para = document.querySelector('#myInput');
    console.log(para);
    var style = window.getComputedStyle(para);
    console.log(style);
    if (!(style.display === 'inline-block') || ($('#myInput').css("visibility") ==  "hidden")) {
        console.log('block');
        $('#myInput').show();
        document.querySelector("#myInput").style.visibility = "";
    } else {
       document.querySelector("#myInput").style.visibility = "hidden";
    }
});


$('#btn').click(function () {
    $('#pregled').toggle();
});