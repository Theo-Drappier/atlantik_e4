$('.nbPassenger').on("change", function()
{
    var nbPassengersMax = parseInt($('#nbPassengerMax').val(), 10);
    var nbKids = parseInt($('input[name=nbPassengersKids]').val(), 10);
    var nbJuniors = parseInt($('input[name=nbPassengersJuniors]').val(), 10);
    var nbAdults = parseInt($('input[name=nbPassengersAdults]').val(), 10);

    var nbPassengersGive = nbKids + nbJuniors + nbAdults;
    console.log(nbPassengersGive);

    if(nbPassengersGive > nbPassengersMax)
    {
        $('#errorPassengers').removeClass('hidden');
        $('#validate').prop("disabled", true);
    }
    else
    {
        $('#errorPassengers').addClass('hidden');
        $('#validate').prop("disabled", false);
    }
});

$('.nbVehicles').on("change", function()
{
    var nbVehicles_4 = parseInt($('#nbVehicles_4').val(), 10);
    var nbVehicles_5 = parseInt($('#nbVehicles_5').val(), 10);
    var nbVehiclesMax = parseInt($('#nbVehicleMax').val(), 10);

    var nbVehiclesGive = nbVehicles_4 + nbVehicles_5;

    if(nbVehiclesGive > nbVehiclesMax)
    {
        $('#errorVehicles').removeClass('hidden');
        $('#validate').prop("disabled", true);
    }
    else
    {
        $('#errorVehicles').addClass('hidden');
        $('#validate').prop("disabled", false);
    }
});

$('.nbVehiclesHeavy').on("change", function()
{
    var nbVehiclesFour = parseInt($('#nbVehiclesFour').val(), 10);
    var nbVehiclesCamCar = parseInt($('#nbVehiclesCamCar').val(), 10);
    var nbVehiclesCamion = parseInt($('#nbVehiclesCamion').val(), 10);
    var nbVehiclesHeavyMax = parseInt($('#nbVehicleHeavyMax').val(), 10);

    var nbVehiclesHeavyGive = nbVehiclesFour + nbVehiclesCamCar + nbVehiclesCamion;

    if(nbVehiclesHeavyGive > nbVehiclesHeavyMax)
    {
        $('#errorVehiclesHeavy').removeClass('hidden');
        $('#validate').prop("disabled", true);
    }
    else
    {
        $('#errorVehiclesHeavy').addClass('hidden');
        $('#validate').prop("disabled", false);
    }
});