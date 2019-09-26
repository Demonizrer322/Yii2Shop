$(function() {



			var data = {
                "apiKey": "fc5124be2cdc467c10dd4268ab61354e",
                "modelName": "Address",
                "calledMethod": "getAreas",
                "methodProperties": {}
			};

                $.ajax({
                    url: "https://api.novaposhta.ua/v2.0/json/",
                    method: "POST",
                    data: JSON.stringify(data),
                    processData: false,
                    contentType: "application/json; charset=UTF-8"
                })
				.done(function(data) {
                    // console.log(data);
                    // console.log("1");
                    $.each(data.data, function(index, value) {
                        // console.log(value);
                        $("#oblast").append(`<option value="American">${value.Description}</option>`);
                    }); 
				})
				.fail(function(res) {
                    // console.log(res);
                    // console.log("2");
				});

// AreasCenter : "db5c88f5-391c-11dd-90d9-001a92567626"
// Description : "Львівська" 
// Ref : "71508134-9b87-11de-822f-000c2965ae0e"

// ---------------------

// Area:"71508134-9b87-11de-822f-000c2965ae0e"
// Ref:"db5c88f5-391c-11dd-90d9-001a92567626"
// SettlementType:"563ced10-f210-11e3-8c4a-0050568002cf"





    var data = {
        "modelName": "Address",
        "calledMethod": "getSettlements",
        "methodProperties": {
            "Warehouse": 1
    },
        "apiKey": "fc5124be2cdc467c10dd4268ab61354e"
    };

        $.ajax({
            url: "https://api.novaposhta.ua/v2.0/json/",
            method: "POST",
            data: JSON.stringify(data),
            processData: false,
            contentType: "application/json; charset=UTF-8"
        })
        
        .done(function(data) {
            // console.log(data);
            console.log("1");
            $.each(data.data, function(index, value) {
                console.log(value);
                console.log(value.AreaDescription);
                $("#naselenPunkt").append(`<option value="American">${value.Description}</option>`);
            }); 
        })
        .fail(function(res) {
            console.log(res);
            console.log("2");
        });
    });





//     $("#input-lists").on('input', function () {
//         var val = this.value;
//         if($('#browsers option').filter(function(){
//             return this.value.toUpperCase() === val.toUpperCase();        
//         }).length) {
//             let ref = $("#browsers option[value='" + $('#input-lists').val() + "']").attr('id');
//             otdelenie(ref);
//             $( "#otdelenie" ).focus();
//             $('#browsers').empty();
            
//         }
//     });

//     $('#input-lists').bind('input', function(){
//         let input = $('#input-lists');
//     if (input.val().length>=2){
//     let city = input.val();
//     var data = {
//         "modelName": "Address",
//         "calledMethod": "searchSettlements",
//         "methodProperties": {
//             "CityName": city,
//             "Limit": 5
//             },
//         "apiKey": "fc5124be2cdc467c10dd4268ab61354e"
//     };

//         $.ajax({
//             url: "https://api.novaposhta.ua/v2.0/json/",
//             type: "POST",
//             data: JSON.stringify(data),
//             processData: false,
//             contentType: "application/json; charset=UTF-8"
//         })
//         .done(function(data) {

//             $.each(data.data, function(index, value) {
//                 $('#browsers').empty();
//                 $.each(value.Addresses, function(index, v) {
//                     $("#browsers").append(`<option id='${v.Ref}' value="${v.Present}">`);
//                 });
//             }); 
//         })
//         .fail(function(res) {
//             console.log(res);
//         });

//     return
//     } else if (input.val().length<2){
//         $('#browsers').empty();
//     }
//     });
// });


// // поиск отделения по городу
// function otdelenie(ref) {

// 			var data = {
//                 "modelName": "AddressGeneral",
//                 "calledMethod": "getWarehouses",
//                 "methodProperties": {
//                     "SettlementRef": ref,
//                     "Language": "ru"
//                 },
//                 "apiKey": "fc5124be2cdc467c10dd4268ab61354e"
// 			};

//                 $.ajax({
//                     url: "https://api.novaposhta.ua/v2.0/json/",
//                     type: "POST",
//                     data: JSON.stringify(data),
//                     processData: false,
//                     contentType: "application/json; charset=UTF-8"
//                 })
// 				.done(function(data) {
//                     $.each(data.data, function(index, value) {
//                         $("#otdelenie").append(`<option data-id='${value.Ref}' value="American">${value.Description}</option>`);
//                     }); 
// 				})
// 				.fail(function(res) {
//                     console.log(res);
// 				});
// }; 


//Справочник населенных пунктов Украины
// $(function() {
//     $("#place_order").click(function(){
// 			var data = {
//                 "modelName": "AddressGeneral",
//                 "calledMethod": "getSettlements",
//                 "methodProperties": {
//                     "AreaRef": "71508134-9b87-11de-822f-000c2965ae0e",
//                     "Ref": "71508134-9b87-11de-822f-000c2965ae0e",
//                     "RegionRef": "71508134-9b87-11de-822f-000c2965ae0e",
//                     "Page": "1"
//                 },
//                 "apiKey": "fc5124be2cdc467c10dd4268ab61354e"
// 			};

//                 $.ajax({
//                     url: "https://api.novaposhta.ua/v2.0/json/",
//                     type: "POST",
//                     data: JSON.stringify(data),
//                     processData: false,
//                     contentType: "application/json; charset=UTF-8"
//                 })
// 				.done(function(data) {
//                     console.log(data);
//                     console.log("1");
//                     $.each(data.data, function(index, value) {
//                         console.log(value);
//                         $("#country").append(`<option value="American">${value.Description}</option>`);
//                     }); 
// 				})
// 				.fail(function(res) {
//                     console.log(res);
//                     console.log("2");
// 				});
// }); }); 

//области
// $(function() {
//     $("#place_order").click(function(){
// 			var data = {
//                 "apiKey": "fc5124be2cdc467c10dd4268ab61354e",
//                 "modelName": "Address",
//                 "calledMethod": "getAreas",
//                 "methodProperties": {}
// 			};

//                 $.ajax({
//                     url: "https://api.novaposhta.ua/v2.0/json/",
//                     type: "POST",
//                     data: JSON.stringify(data),
//                     processData: false,
//                     contentType: "application/json; charset=UTF-8"
//                 })
// 				.done(function(data) {
//                     console.log(data);
//                     console.log("1");
//                     $.each(data.data, function(index, value) {
//                         console.log(value);
//                         $("#country").append(`<option value="American">${value.Description}</option>`);
//                     }); 
// 				})
// 				.fail(function(res) {
//                     console.log(res);
//                     console.log("2");
// 				});
// }); }); 

//Справочник городов компании
// $(function() {
//     $("#input-lists").click(function(){

// 			var data = {
//                 "modelName": "Address",
//                 "calledMethod": "searchSettlements",
//                 "methodProperties": {
//                     "CityName": "солон",
//                     "Limit": 5
//                     },
//                 "apiKey": "fc5124be2cdc467c10dd4268ab61354e"
// 			};

//                 $.ajax({
//                     url: "https://api.novaposhta.ua/v2.0/json/",
//                     type: "POST",
//                     data: JSON.stringify(data),
//                     processData: false,
//                     contentType: "application/json; charset=UTF-8"
//                 })
// 				.done(function(data) {
//                     console.log(data);
//                     console.log("1");
//                     $.each(data.data, function(index, value) {
//                         console.log(value);
//                         $("#country").append(`<option value="American">${value.Description}</option>`);
//                     }); 
// 				})
// 				.fail(function(res) {
//                     console.log(res);
//                     console.log("2");
// 				});
// }); });