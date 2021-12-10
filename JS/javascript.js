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



$('#btn').click(function () {
    $('#pregled').toggle();
});